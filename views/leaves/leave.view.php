<div class="col-xl-9 col-lg-8 col-md-12">
	 <!-- Alert when it success for leave -->
	 <?php if (isset($_SESSION['leave'])) { ?>
        <?php if ($_SESSION['leave'] == 'Success') { ?>
            <div class="alert alert-success alert-dismissible grow" id="alert">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong><?= $_SESSION['leave'] . ' for request leave!' ?></strong>
            </div>
        <?php } ?>
		<!-- alert when request Unsuccess for leave -->
        <?php if ($_SESSION['leave'] == 'Unsuccess') { ?>
            <div class="alert alert-danger alert-dismissible grow" id="alert">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong><?= $_SESSION['leave'] . ' for request leave!' ?></strong>
            </div>
        <?php } ?>
        <!-- remove session alert -->
        <?php unset($_SESSION['leave']) ?>
        <!-- remove message -->
        <script>
            let showALert = document.querySelector('.alert');
            setTimeout(function() {
                showALert.remove();
            }, 4000);
        </script>
    <?php } ?>

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
						$users = getUser($user['user_id']);
						$day = $users['day_can_leave'];
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
										<option value="8">Birthday</option>
										<option value="9">Work from home</option>
									</select>
								</div>
							</div>

							<div class="col-sm-6 leave-col">
								<div class="form-group">
									<label>Remaining Leaves</label>
									<?php
									$firstDayOfNextMonth = new DateTime(date('Y-m-t', strtotime('first day of next month')));
									$day = $users['day_can_leave']; // Example value for remaining leaves

									if (new DateTime() == $firstDayOfNextMonth) {
										$remainingLeaves = $day+2;
									} else {
										$remainingLeaves = $day;
									}
									?>
									<input disabled type="text" class="form-control" value="<?= $remainingLeaves ?>" name="day">
								</div>
							</div>
						</div>
						<!-- date for request -->
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

						<!-- date today -->
						<input type="hidden" name="date" value="<?php echo date("d/m/Y"); ?>">

						<div class="row">
		
							<!-- days have leave -->
							<div class="col-sm-12 leave-col">
								<div class="form-group">
									<label>Days have spent</label>
									<input disabled type="text" class="form-control" placeholder= <?= $user['taken'] ?> >
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
							<?php

							?>
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
						<h4 class="card-title mb-0">Leave Details Today</h4>
					</div>
					<div class="card-body">
						<div class="employee-office-table">
							<div class="table-responsive">
								<table class="table custom-table mb-0">
									<thead class="text-center">
										<tr>
											<th>Date</th>
											<th>Name Employees</th>
											<th>Type Leave</th>
											<th>Strat Leave</th>
											<th>End Leave</th>
											<th>Reason</th>
											<!-- <th>Absent</th>
											<th>Today Aways</th> -->
										</tr>
									</thead>
									<tbody class="text-center">
										<?php for ($i = 0; $i < count($members_request); $i++) : ?>
											<?php if ($members_request[$i]['start_leave'] == date('d/m/Y')) : ?>
												<?php if ($members_request[$i]['checked'] == "Approved") : ?>
													<tr>
														<td><?php echo date('d/m/Y'); ?></td>
														<td><?php echo $members_request[$i]['fname'] . ' ' . $members_request[$i]['lname']; ?></td>
														<td><?php echo $members_request[$i]['type_leave_name']; ?></td>
														<td><?php echo $members_request[$i]['start_leave']; ?></td>
														<td><?php echo $members_request[$i]['end_leave']; ?></td>
														<td><?php echo $members_request[$i]['reason']; ?></td>
													</tr>
												<?php endif; ?>
											<?php endif; ?>
										<?php endfor; ?>
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

						<ul class="list-group ">
							<?php for ($i = 0; $i < count($members); $i++) : ?>
								<?php if ($members[$i]['checked'] === 'Pending') : ?>
									<!-- count depend on the messages -->
									<!-- Create message for the message based on team members -->
									<li class="d-flex justify-content-between mb-2 align-items-center d-flex flex-row " style="height: 15vh; list-style-type: none;">
										<a href="<?= $members[$i]['user_id'] ?>"><img src="/assets/images/profiles/<?= $members[$i]['picture'] ?>" alt="Linda Craver" class="rounded-circle img-thumbnail shadow-sm" style="width: 60px; height: 60px; "></a>
										<h6 class="mr-0"><?= strtoupper($members[$i]['fname']) ?></h6>
										<h6 class="mr-0"><?= $members[$i]['start_leave'] . " - " . $members[$i]['end_leave'] ?></h6>
										<h6 class="mr-0"><?= $members[$i]['type_leave_name'] ?></h6>
										<h6 class="mr-0"><?= $members[$i]['date_request'] ?></h6>
										<h6 class="mr-0"><?= $members[$i]['reason'] ?></h6>
										<form method="post" action="controllers/leaves/respond.controller.php">
											<input type="hidden" value="<?= $members[$i]['leave_id'] ?>" name="leave_id">
											<button class="btn btn-outline-primary btn-sm" style="margin-left: 20px;" value="Approved" name="approved">Approved</button>
											<button class="btn btn-outline-danger btn-sm" value="Rejected" name="rejected">Rejected</button>
										</form>

									</li>
								<?php endif; ?>
							<?php endfor; ?>
						</ul>
						<?php if (count($members) === 0) : ?>
							<div class="container">
								<div class="card-body">
									<div class="row d-flex justify-content-center">
										<h2 class="text-notification"><?= 'Nothing on your notification' ?></h2>
									</div>
								</div>
							</div>
						<?php endif; ?>
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