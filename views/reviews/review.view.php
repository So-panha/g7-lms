<div class="col-xl-9 col-lg-8  col-md-12">
	<div class="quicklink-sidebar-menu ctm-border-radius shadow-sm bg-white card grow">
		<div class="card-body">
			<div class="flex-row list-group list-group-horizontal-lg" id="v-pills-tab" role="tablist" aria-orientation="vertical">
				<a class=" active list-group-item" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Overview</a>
				<a class="list-group-item" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Review Types</a>
			</div>
		</div>
	</div>
	<div class="card shadow-sm ctm-border-radius grow">
		<div class="card-header d-flex align-items-center justify-content-between">
			<h4 class="card-title mb-0 d-inline-block">Reviews</h4>
		</div>
		<div class="card-body align-center">
			<div class="tab-content" id="v-pills-tabContent">

				<!-- Tab1-->
				<div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
					<div class="employee-office-table">
						<div class="table-responsive">
							<table class="table custom-table table-hover">
								<thead class="text-center">
									<tr>
										<th>type leave</th>
										<th>date request</th>
										<th>Start leave</th>
										<th>Back leave</th>
										<th>Progressive</th>
									</tr>
								</thead>

								<tbody class="text-center">
									<?php

									$employeeId = $_SESSION['user']['user_id'];

									$typeRequests = getTypeRequest();
									$personalHistoryRequest = personalHistoryOfRequest($employeeId);
									// print_r($personalHistoryRequest);
									foreach ($personalHistoryRequest as $request) {


										if ($request['checked'] == "Pending" && $request['process'] == "progress") {

											if ($employeeId === $request['user_id']) {
									?>

												<tr>
													<td>
														<?php foreach ($typeRequests as $typeRequest) {

															if ($request['type_leave'] === $typeRequest['type_leave_id']) {
																echo $typeRequest['type_leave_name'];
															}
														} ?>
													</td>
													<td>
														<h2><?php echo $request['date_request']; ?></h2>
													</td>
													<td><?php echo $request['start_leave']; ?></td>
													<td><?php echo $request['end_leave']; ?></td>
													<td>
														<?php
														if ($request['checked'] === "Approved") {
															echo '<button  style="color:white; border:none; border-radius:10%; background:green; width: 45%;">' . $request['checked'] . '</button>';
														} else {
															echo '<button  style="color:white; border:none; border-radius:10%; background:red; width: 45%;">' . $request['checked'] . '</button>';
														}
														?>
													</td>
													<td>
														<button class="btn-danger btn-cancel" style="color:white; border:none; border-radius:10%;" data-btn-id=<?= $request['leave_id'] ?>>Cancel</button>
													</td>

												</tr>

												<!-- Script for button cancel -->
												<script>
													let cancen_btn = document.querySelectorAll('.btn-cancel');
													cancen_btn.forEach(btn => {
														btn.addEventListener('click', function(e) {
															let leaveID = this.getAttribute('data-btn-id');
															let tr = e.target.closest("tr");
															showModal(leaveID,tr)
														})
													});
												</script>
									<?php
											}
										}
									}
									?>

								</tbody>
							</table>
						</div>
					</div>
				</div>
				<!--/Tab 1-->


				<!-- Tab2-->
				<div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
					<div class="employee-office-table">
						<div class="table-responsive">
							<table class="table custom-table table-hover">
								<thead>
									<tr>
										<th>Name</th>
										<th>Created By</th>
										<th>Scheduled For</th>
										<th>Actions</th>
									</tr>
								</thead>
								<tbody>

									<tr>
										<td>Monthly Review</td>
										<td>
											<a href="employment.html" class="avatar"><img class="img-fluid" alt="avatar image" src="assets/img/profiles/img-10.jpg"></a>
											<h2><a href="employment.html"> Richard Wilson</a></h2>
										</td>
										<td>
											Everyone
										</td>
										<td>
											<div class="table-action">
												<a href="edit-review.html" class="btn btn-sm btn-outline-success">
													<span class="lnr lnr-pencil"></span> Edit
												</a>
												<a href="javascript:void(0);" class="btn btn-sm btn-outline-danger" data-toggle="modal" data-target="#delete">
													<span class="lnr lnr-trash"></span> Delete
												</a>
											</div>
										</td>
									</tr>
									<tr>
										<td>Employees Review</td>
										<td>
											<a href="employment.html" class="avatar"><img class="img-fluid" alt="avatar image" src="assets/img/profiles/img-10.jpg"></a>
											<h2><a href="employment.html"> Richard Wilson</a></h2>
										</td>
										<td>
											Everyone
										</td>
										<td>
											<div class="table-action">
												<a href="edit-review.html" class="btn btn-sm btn-outline-success">
													<span class="lnr lnr-pencil"></span> Edit
												</a>
												<a href="javascript:void(0);" class="btn btn-sm btn-outline-danger" data-toggle="modal" data-target="#delete">
													<span class="lnr lnr-trash"></span> Delete
												</a>
											</div>
										</td>
									</tr>
									<tr>
										<td>Employees Review</td>
										<td>
											<a href="employment.html" class="avatar"><img class="img-fluid" alt="avatar image" src="assets/img/profiles/img-10.jpg"></a>
											<h2><a href="employment.html"> Richard Wilson</a></h2>
										</td>
										<td>
											Everyone
										</td>
										<td>
											<div class="table-action">
												<a href="edit-review.html" class="btn btn-sm btn-outline-success">
													<span class="lnr lnr-pencil"></span> Edit
												</a>
												<a href="javascript:void(0);" class="btn btn-sm btn-outline-danger" data-toggle="modal" data-target="#delete">
													<span class="lnr lnr-trash"></span> Delete
												</a>
											</div>
										</td>
									</tr>
									<tr>
										<td>Employees Review</td>
										<td>
											<a href="employment.html" class="avatar"><img class="img-fluid" alt="avatar image" src="assets/img/profiles/img-10.jpg"></a>
											<h2><a href="employment.html"> Richard Wilson</a></h2>
										</td>
										<td>
											Everyone
										</td>
										<td>
											<div class="table-action">
												<a href="edit-review.html" class="btn btn-sm btn-outline-success">
													<span class="lnr lnr-pencil"></span> Edit
												</a>
												<a href="javascript:void(0);" class="btn btn-sm btn-outline-danger" data-toggle="modal" data-target="#delete">
													<span class="lnr lnr-trash"></span> Delete
												</a>
											</div>
										</td>
									</tr>
									<tr>
										<td>Employees Review</td>
										<td>
											<a href="employment.html" class="avatar"><img class="img-fluid" alt="avatar image" src="assets/img/profiles/img-10.jpg"></a>
											<h2><a href="employment.html"> Richard Wilson</a></h2>
										</td>
										<td>
											Everyone
										</td>
										<td>
											<div class="table-action">
												<a href="edit-review.html" class="btn btn-sm btn-outline-success">
													<span class="lnr lnr-pencil"></span> Edit
												</a>
												<a href="javascript:void(0);" class="btn btn-sm btn-outline-danger" data-toggle="modal" data-target="#delete">
													<span class="lnr lnr-trash"></span> Delete
												</a>
											</div>
										</td>
									</tr>

								</tbody>
							</table>
						</div>
					</div>
				</div>
				<!-- /Tab 2-->

			</div>
		</div>
		
		<!-- dalog to comfirm for concel -->
		<!-- The Modal -->
		<div class="modal" id="myModal">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">

					<!-- Modal Header -->
					<div class="modal-header d-flex justify-content-center bg-danger">
						<h4 class="modal-title text-white">Are you sure to concel you leaving?</h4>
						<button style="position:absolute;right:20px;border:none" type="button" class="btn-close bg-danger" data-bs-dismiss="modal"><i class="fa fa-close text-white" style="font-size:20px"></i></button>
					</div>

					<!-- Modal body -->
					<div class="modal-body">
						<p class="text-center">Click on button confirm to remove your leaving</p>
					</div>

					<!-- Modal footer -->
					<div class="modal-footer">
						<button type="button" data-bs-toggle="modal" class="btn btn-danger d-flex justify-content-center confirm-btn">Confirm</button>
					</div>

				</div>
			</div>
		</div>
		<!-- Script for cancel leave -->
		<script>
			function showModal(leaveID,tr) {
				// Open modal for confirm
				$("#myModal").modal('show');
				// Catch button confirm
				let cancel_btn = document.querySelector(".confirm-btn");
				// Add action to button confirm
				cancel_btn.addEventListener('click', function() {
					// Function for call to back-end to remove
					$(document).ready(() => {
						$.post("../../controllers/reviews/concel.controller.php", {
							leave: leaveID,
						});
					});
					// Remove main leave
					tr.remove();
				});
			}
		</script>
		<!--  -->
	</div>
</div>
</div>
</div>
</div>
<!--/Content-->

</div>
<!-- Inner Wrapper -->

<div class="sidebar-overlay" id="sidebar_overlay"></div>