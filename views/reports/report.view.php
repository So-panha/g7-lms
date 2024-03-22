<div class="col-xl-9 col-lg-8 col-md-12 grow">
	<div class="card shadow-sm grow ctm-border-radius">
		<div class="card-body align-center">
			<div class="tab-content" id="pills-tabContent">
				<div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
					<div class="employee-office-table">
						<div class="table-responsive">
							<table id="reportTable" class="table custom-table" style="width: 100%;">
								<thead>
									<tr class="bg-warning">
										<th>Name</th>
										<th>Gender</th>
										<th>Remaining</th>
										<th>Taken</th>
										<th>Action</th>

									</tr>
								</thead>
								<tbody>
									<?php
									$employees = employee();
									foreach ($employees as $report) {
									?>
										<tr>
											<td>
												<h2><?php echo strtoupper($report['fname']) ?><h2>
											</td>
											<td>
												<?php echo $report['gender'] ?>
											</td>
											<td>
												<?php echo $report['day_can_leave'] ?>
											</td>
											<td>
												<?php echo $report['taken'] ?>
											</td>
											<td>
												<a href="report_detail?id=<?php echo urlencode($report['user_id']); ?>"><button class="btn btn-primary">Detail</button></a>
											</td>
										</tr>
									<?php } ?>

								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>