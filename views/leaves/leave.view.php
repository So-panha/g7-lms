<div class="col-xl-9 col-lg-8 col-md-12">

	<div class="row">
		<div class="col-md-12">
			<div class="card ctm-border-radius shadow-sm grow">
				<div class="card-header">
					<h4 class="card-title mb-0">Apply Leaves</h4>
				</div>
				<div class="card-body">
					<form method="POST" action="controllers/leaves/create_request_leave.php">
						<!-- user_id -->
						<?php
						$user = $_SESSION['user'];
						?>

						<div class="row">
							<input type="hidden" value="<?= $user['user_id'] ?>" name="user_id">
							<!-- type leave -->
							<div class="col-sm-6">
								<div class="form-group">
									<label>Leave Type <span class="text-danger">*</span></label>
									<select class="form-control select" name="leaveType">
										<option value="">Select Leave</option>
										<option value="1">Vacation</option>
										<option value="2">Sick leave</option>
										<option value="3">Personal leave</option>
										<option value="4">Maternity leave</option>
										<option value="5">Paternity leave</option>
										<option value="6">Bereavement leave</option>
										<option value="7">Training leave</option>
									</select>
								</div>
							</div>

							<div class="col-sm-6 leave-col">
								<div class="form-group">
									<label>Remaining Leaves</label>
									<input type="text" class="form-control" placeholder="10" disabled>
								</div>
							</div>
						</div>
						<!-- date leave -->
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<label>From</label>
									<input type="text" class="form-control datetimepicker" name="from">
								</div>
							</div>
							<div class="col-sm-6 leave-col">
								<div class="form-group">
									<label>To</label>
									<input type="text" class="form-control datetimepicker" name="to">
								</div>
							</div>
						</div>
						<!-- date comback -->
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<label>Half Day <span class="text-danger">*</span></label>
									<select class="form-control select" name="halfDay">
										<option value="">Select</option>
										<option value="First Half">First Half</option>
										<option value="Second Half">Second Half</option>
									</select>
								</div>
							</div>
							<!-- days can leave -->
							<div class="col-sm-6 leave-col">
								<div class="form-group">
									<label>Number of Days Leave</label>
									<input type="text" class="form-control" placeholder="2" disabled>
								</div>
							</div>
						</div>
						<!-- reason leave -->
						<div class="row">
							<div class="col-sm-12">
								<div class="form-group mb-0">
									<label>Reason</label>
									<textarea class="form-control" rows="4" name="reason"></textarea>
								</div>
							</div>
						</div>
						<!-- button for action -->
						<div class="text-center">
							<button type="submit" class="btn btn-theme button-1 text-white ctm-border-radius mt-4">Apply</button>
							<a href="/"> <button type="button" class="btn btn-danger text-white ctm-border-radius mt-4">Cancel</button></a>

						</div>
					</form>
				</div>
			</div>
		</div>
		<?php if ($_SESSION['user']['role'] === 'manager') : ?>
			<div class="col-md-12">
				<div class="card ctm-border-radius shadow-sm grow">
					<div class="card-header">
						<h4 class="card-title mb-0">Leave Details</h4>
					</div>
					<div class="card-body">
						<div class="employee-office-table">
							<div class="table-responsive">
								<table class="table custom-table mb-0">
									<thead>
										<tr>
											<th>Date</th>
											<th>Total Employees</th>
											<th>First Half</th>
											<th>Second Half</th>
											<th>Working From Home</th>
											<th>Absent</th>
											<th>Today Aways</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>05 May 2019</td>
											<td>7</td>
											<td>6</td>
											<td>6</td>
											<td>1</td>
											<td>0</td>
											<td>1</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-12">
				<div class="card ctm-border-radius shadow-sm grow">
					<div class="card-header">
						<h4 class="card-title mb-0">Request Leaves</h4>
					</div>
					<div class="card-body">
						<div class="employee-office-table">
							<div class="table-responsive">
								<table class="d-flex-column table custom-table mb-0 align-content-center">
									<thead class="text-center">
										<tr>
											<th>Employee</th>
											<th>Leave Type</th>
											<th>From</th>
											<th>To</th>
											<th>Reason</th>
											<th>Status</th>
										</tr>
									</thead>
									<tbody class="text-center">
										<form method="POST" action="controllers/leaves/respond.controller.php">
											<?php
											//function type request
											$type_requests = getTypeRequest();
											// call funcion get all users
											$users = getUsers();
											//call function request 
											$requests = requestLeave($manager_id);

											foreach ($requests as $request) {
											?>
												<tr>
													<!-- employee naem-->
													<td>
														<a href="employment.html" class="avatar"><img alt="avatar image" src="assets/img/profiles/img-5.jpg" class="img-fluid"></a>
														<h2>
															<?php foreach ($users as $user) : ?>
																<?php if ($user['user_id'] === $request['user_id']) : ?>
																	<a href="employment.html"><?php echo strtoupper($user['fname']); ?></a>
																	<input type="hidden" name="user_id" value="<?php echo $request['user_id'] ?>">
																<?php endif; ?>
															<?php endforeach; ?>
														</h2>
													</td>
													<!-- type request -->
													<td>
														<?php foreach ($type_requests as $type_request) : ?>
															<?php if ($type_request['type_leave_id'] === $request['type_leave']) : ?>
																<?php echo ($type_request['type_leave_name']); ?>
															<?php endif; ?>
														<?php endforeach; ?>
													</td>

													</td>
													<!-- date start -->
													<td><?= $request['start_leave'] ?></td>
													<!-- date come back -->
													<td><?= $request['start_leave'] ?></< /td>
														<!-- reason -->
													<td><?= $request['reason'] ?></< /</td>
														<!-- respond -->

													<td>
														<button class="btn btn-primary" value="Approved" name="approved">Approved</button>
														<button class="btn btn-danger" value="Rejected" name="rejected">Rejected</button>
													</td>

												</tr>
											<?php
											}
											?>
										</form>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
	</div>
</div>
</div>
</div>
</div>
<!--/Content-->
<?php endif; ?>

</div>
<!-- Inner Wrapper -->

<div class="sidebar-overlay" id="sidebar_overlay"></div>

<!--Delete The Modal -->
<div class="modal fade" id="delete">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">

			<!-- Modal body -->
			<div class="modal-body">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title mb-3">Are You Sure Want to Delete?</h4>
				<button type="button" class="btn btn-danger ctm-border-radius text-white text-center mb-2 mr-3" data-dismiss="modal">Cancel</button>
				<button type="button" class="btn btn-theme ctm-border-radius text-white text-center mb-2 button-1" data-dismiss="modal">Delete</button>
			</div>
		</div>
	</div>
</div>