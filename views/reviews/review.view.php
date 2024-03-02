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
										<th>Begin On</th>
										<th>Due By</th>
										<th>Progressive</th>
									</tr>
								</thead>

								<tbody class="text-center">
									<?php
									
									$employeeId = $_SESSION['user']['user_id'];

									$personalHistoryRequest = personalHistoryOfRequest($employeeId);
									// print_r($personalHistoryRequest);
									foreach ($personalHistoryRequest as $request) {
										


										if ($request['checked'] !== "Pending") {
											if ($employeeId === $request['user_id']) {
									?>

												<tr>
													<td><?php echo $request['type_leave']; ?></td>
													<td>
														<h2><?php echo $request['date_request']; ?></h2>
													</td>
													<td><?php echo $request['start_leave']; ?></td>
													<td><?php echo $request['end_leave']; ?></td>
													<td><?php echo $request['checked']; ?></td>

												</tr>

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
	</div>
</div>
</div>
</div>
</div>
<!--/Content-->

</div>
<!-- Inner Wrapper -->

<div class="sidebar-overlay" id="sidebar_overlay"></div>