<div class="col-xl-9 col-lg-8  col-md-12">
	<!-- Show alert when success in login -->
	<?php if (isset($_SESSION['alert'])) { ?>
		<div class="alert alert-success alert-dismissible grow" id="alert">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			<strong><?= $_SESSION['alert'] ?></strong>

			<!-- remove session alert -->
			<?php unset($_SESSION['alert']) ?>
		</div>
		<!-- remove message -->
		<script>
			let showALert = document.querySelector('.alert');
			setTimeout(function() {
				showALert.remove();
			}, 5000);
		</script>
	<?php } ?>
	<div class="quicklink-sidebar-menu ctm-border-radius shadow-sm bg-white card grow">
		<div class="card-body">
			<ul class="list-group list-group-horizontal-lg">
				<li class="list-group-item text-center active button-5"><a href="index.html" class="text-white">Admin Dashboard</a></li>
			</ul>
		</div>
	</div>
	<!-- Widget -->
	<div class="row">
		<div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
			<div class="card dash-widget ctm-border-radius shadow-sm grow">
				<div class="card-body">
					<div class="card-icon bg-primary">
						<i class="fa fa-users" aria-hidden="true"></i>
					</div>
					<div class="card-right">
						<?php
						$users = getusers();
						$numberEmployees = count($users);
						?>
						<h4 class="card-title">Employees</h4>
						<p class="card-text"><?php echo $numberEmployees; ?></p>
					</div>
				</div>
			</div>
		</div>
		<div class="col-xl-3 col-lg-6 col-sm-6 col-12">
			<div class="card dash-widget ctm-border-radius shadow-sm grow">
				<div class="card-body">
					<div class="card-icon bg-warning">
						<i class="fa fa-building-o"></i>
					</div>
					<div class="card-right">
						<h4 class="card-title">Companies</h4>
						<p class="card-text">1</p>
					</div>
				</div>
			</div>
		</div>
		<div class="col-xl-3 col-lg-6 col-sm-6 col-12">
			<div class="card dash-widget ctm-border-radius shadow-sm grow">
				<div class="card-body">
					<div class="card-icon bg-danger">
						<i class="fa fa-suitcase" aria-hidden="true"></i>
					</div>
					<div class="card-right">
						<h4 class="card-title">Leaves</h4>
						<p class="card-text"><?php echo count($typeLeave); ?></p>
					</div>
				</div>
			</div>
		</div>
		<div class="col-xl-3 col-lg-6 col-sm-6 col-12">
			<div class="card dash-widget ctm-border-radius shadow-sm grow">
				<div class="card-body">
					<div class="card-icon bg-success">
						<i class="fa fa-money" aria-hidden="true"></i>
					</div>
					<div class="card-right">
						<h4 class="card-title">Salary</h4>
						<!-- call function for get sum amount -->
						<?php
						$sumAmount = getAmount();
						?>
						<p class="card-text"><?php echo $sumAmount; ?>$</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- / Widget -->

	<!-- Chart -->
	<div class="row">
		<div class="col-md-6 d-flex">
			<div class="card ctm-border-radius shadow-sm flex-fill grow">
				<div class="card-header">
					<h4 class="card-title mb-0">Total Employees</h4>
				</div>
				<div class="card-body">
					<canvas id="pieChart"></canvas>
				</div>
			</div>
		</div>
		<div class="col-md-6 d-flex">
			<div class="card ctm-border-radius shadow-sm flex-fill grow">
				<div class="card-header">
					<h4 class="card-title mb-0">Total Salary By Unit</h4>
				</div>
				<div class="card-body">
					<canvas id="lineChart"></canvas>
				</div>
			</div>
		</div>
	</div>
	<!-- / Chart -->

	<div class="row">
		<div class="col-lg-6">
			<div class="card ctm-border-radius shadow-sm grow">
				<div class="card-header">
					<h4 class="card-title mb-0 d-inline-block">Today</h4>
					<a href="javascript:void(0)" class="d-inline-block float-right text-primary"><i class="lnr lnr-sync"></i></a>
				</div>
				<div class="card-body recent-activ">
					<!-- call function -->
					<?php
					$typeLeave = typeLeaves();

					?>

					<div class="recent-comment">
						<?php
						foreach ($typeLeave as $leave) {
							// if ($leave['type_leave_name'] === "Birthday") {
						?>
							<a href="javascript:void(0)" class="dash-card text-dark">
								<div class="dash-card-container">
									<?php

									?>
									<!-- <div class="dash-card-icon text-primary">
											<i class="fa fa-birthday-cake" aria-hidden="true"></i>
										</div> -->
									<div class="dash-card-content">
										<h6 class="mb-0"><?php echo strtoupper($leave['fname']) . " is " . $leave['type_leave_name'] . " today "; ?></h6>
									</div>
									<div class="dash-card-avatars">
										<!-- <div class="e-avatar"> -->
										<img src="assets/images/profiles/<?= $leave['picture']?>" class="rounded-circle" width="40px" height="40px">
										<!-- </div> -->
									</div>
								</div>
							</a>
							<hr>
						<?php
						}
						?>
					</div>
				</div>
			</div>
		</div>
		<div class="col-lg-6 col-md-12 d-flex">

			<!-- Team Leads List -->
			<div class="card flex-fill team-lead shadow-sm grow">
				<div class="card-header">
					<h4 class="card-title mb-0 d-inline-block">Manager</h4>
					<a href="employees.html" class="dash-card float-right mb-0 text-primary">Manage Team </a>
				</div>
				<div class="card-body">
					<?php for ($i = 0; $i < count($manager); $i++) : ?>
						<div class="media mb-3">
							<div class="e-avatar avatar-online mr-3"><img class="img-fluid" src="assets/images/profiles/img-2.jpg" alt="Linda Craver"></div>
							<div class="media-body">
								<h6 class="m-0"><?= $manager[$i]['fname'] . ' ' . $manager[$i]['lname'] ?></h6>
								<p class="mb-0 ctm-text-sm"><?= $manager[$i]['position_name'] ?></p>
							</div>
						</div>
						<hr>
					<?php endfor; ?>
				</div>
			</div>
		</div>

		<div class="col-lg-6 col-md-12 d-flex">
		</div>
	</div>
</div>
</div>
<!--/Content-->