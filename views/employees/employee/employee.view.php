<div class="col-xl-9 col-lg-8 col-md-12">
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
				<li class="list-group-item text-center active button-5"><a href="index.html" class="text-white">Employee Dashboard</a></li>
			</ul>
		</div>
	</div>
    <!-- Widget -->
    <div class="quicklink-sidebar-menu ctm-border-radius shadow-sm bg-white card grow">
        <div class="card-body">
            <ul class="list-group list-group-horizontal-lg">
                <li class="list-group-item text-center active button-5">
                    <a class="text-white" href="employees-dashboard.html">Employees Dashboard</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6 col-md-12 d-flex">
            <div class="card shadow-sm flex-fill grow">
                <div class="card-header">
                    <h4 class="card-title mb-0 d-inline-block">Permission</h4>
                    <a href="leave.html" class="d-inline-block float-right text-primary"><i class="fa fa-suitcase"></i></a>
                </div>
                <div class="card-body text-center">
                    <div class="time-list">
                        <div class="dash-stats-list">
                            <span class="btn btn-outline-primary">9.00 Hrs</span>
                            <p class="mb-0">Approved</p>
                        </div>
                        <div class="dash-stats-list">
                            <span class="btn btn-outline-primary">10.00 Hrs</span>
                            <p class="mb-0">Remaining</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-12 d-flex">
            <div class="card shadow-sm flex-fill grow">
                <div class="card-header">
                    <h4 class="card-title mb-0 d-inline-block">Leave</h4>
                    <a href="leave.html" class="d-inline-block float-right text-primary"><i class="fa fa-suitcase"></i></a>
                </div>
                <div class="card-body text-center">
                    <div class="time-list">
                        <div class="dash-stats-list">
                            <span class="btn btn-outline-primary">4.5 Days</span>
                            <p class="mb-0">Taken</p>
                        </div>
                        <div class="dash-stats-list">
                            <span class="btn btn-outline-primary">7.5 Days</span>
                            <p class="mb-0">Remaining</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 d-flex">
            <div class="card shadow-sm flex-fill grow">
                <div class="card-header">
                    <h4 class="card-title mb-0 d-inline-block">Today</h4>
                    <a href="javascript:void(0)" class="d-inline-block float-right text-primary"><i class="lnr lnr-sync"></i></a>
                </div>
                <div class="card-body recent-activ">
                    <div class="card-body recent-activ">
                        <!-- call function -->
                        <?php
                        $typeLeave = typeLeaves();
                        ?>
                        <div class="recent-comment">
                            <?php
                            foreach ($typeLeave as $leave) {

                            ?>
                                <a href="javascript:void(0)" class="dash-card text-dark">
                                    <div class="dash-card-container">
                                        <div class="dash-card-content">
                                            <h6 class="mb-0"><?php echo strtoupper($leave['fname']) . " is " . $leave['type_leave_name'] . " today "; ?></h6>
                                        </div>
                                        <div class="dash-card-avatars">
                                            <!-- <div class="e-avatar"> -->
                                            <img src="assets/images/profiles/<?= $leave['picture'] ?>" class="rounded-circle" width="40px" height="40px">
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
        </div>
        <div class="col-lg-6 col-md-12 d-flex">
            <!-- Team Leads List -->
            <div class="card flex-fill team-lead shadow-sm grow">
                <div class="card-header">
                    <h4 class="card-title mb-0 d-inline-block">Team Leads</h4>
                    <a href="employees-team.html" class="dash-card d-inline-block float-right mb-0 text-primary">Manage Team
                    </a>
                </div>
                <div class="card-body">
                    <div class="media mb-3">
                        <div class="e-avatar avatar-online mr-3">
                            <img src="assets/img/profiles/img-6.jpg" alt="Maria Cotton" class="img-fluid" />
                        </div>
                        <div class="media-body">
                            <h6 class="m-0">Maria Cotton</h6>
                            <p class="mb-0 ctm-text-sm">PHP</p>
                        </div>
                    </div>
                    <hr />
                    <div class="media mb-3">
                        <div class="e-avatar avatar-online mr-3">
                            <img class="img-fluid" src="assets/img/profiles/img-5.jpg" alt="Linda Craver" />
                        </div>
                        <div class="media-body">
                            <h6 class="m-0">Danny Ward</h6>
                            <p class="mb-0 ctm-text-sm">Design</p>
                        </div>
                    </div>
                    <hr />
                    <div class="media mb-3">
                        <div class="e-avatar avatar-online mr-3">
                            <img src="assets/img/profiles/img-4.jpg" alt="Linda Craver" class="img-fluid" />
                        </div>
                        <div class="media-body">
                            <h6 class="m-0">Linda Craver</h6>
                            <p class="mb-0 ctm-text-sm">IOS</p>
                        </div>
                    </div>
                    <hr />
                    <div class="media mb-3">
                        <div class="e-avatar avatar-online mr-3">
                            <img class="img-fluid" src="assets/img/profiles/img-3.jpg" alt="Linda Craver" />
                        </div>
                        <div class="media-body">
                            <h6 class="m-0">Jenni Sims</h6>
                            <p class="mb-0 ctm-text-sm">Android</p>
                        </div>
                    </div>
                    <hr />

                    <div class="media">
                        <div class="e-avatar avatar-offline mr-3">
                            <img class="img-fluid" src="assets/img/profiles/img-8.jpg" alt="Linda Craver" />
                        </div>
                        <div class="media-body">
                            <h6 class="m-0">Stacey Linville</h6>
                            <p class="mb-0 ctm-text-sm">Testing</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-12 d-flex">
            <!-- Recent Activities -->
            <div class="card recent-acti flex-fill shadow-sm grow">
                <div class="card-header">
                    <h4 class="card-title mb-0 d-inline-block">
                        Recent Activities
                    </h4>
                    <a href="javascript:void(0)" class="d-inline-block float-right text-primary"><i class="lnr lnr-sync"></i></a>
                </div>
                <div class="card-body recent-activ admin-activ">
                    <div class="recent-comment">
                        <div class="notice-board">
                            <div class="table-img">
                                <div class="e-avatar mr-3">
                                    <img class="img-fluid" src="assets/img/profiles/img-6.jpg" alt="Maria Cotton" />
                                </div>
                            </div>
                            <div class="notice-body">
                                <h6 class="mb-0">Lorem ipsum dolor sit amet.</h6>
                                <span class="ctm-text-sm">Maria Cotton | 1 hour ago</span>
                            </div>
                        </div>
                        <hr />
                        <div class="notice-board">
                            <div class="table-img">
                                <div class="e-avatar mr-3">
                                    <img class="img-fluid" src="assets/img/profiles/img-6.jpg" alt="Maria Cotton" />
                                </div>
                            </div>
                            <div class="notice-body">
                                <h6 class="mb-0">Lorem ipsum dolor sit amet.</h6>
                                <span class="ctm-text-sm">Maria Cotton | 2 hour ago</span>
                            </div>
                        </div>
                        <hr />
                        <div class="notice-board">
                            <div class="table-img">
                                <div class="e-avatar mr-3">
                                    <img class="img-fluid" src="assets/img/profiles/img-6.jpg" alt="Maria Cotton" />
                                </div>
                            </div>
                            <div class="notice-body">
                                <h6 class="mb-0">Lorem ipsum dolor sit amet.</h6>
                                <span class="ctm-text-sm">Maria Cotton | 3 hour ago</span>
                            </div>
                        </div>
                        <hr />
                        <div class="notice-board">
                            <div class="table-img">
                                <div class="e-avatar mr-3">
                                    <img class="img-fluid" src="assets/img/profiles/img-6.jpg" alt="Maria Cotton" />
                                </div>
                            </div>
                            <div class="notice-body">
                                <h6 class="mb-0">Lorem ipsum dolor sit amet.</h6>
                                <span class="ctm-text-sm">Maria Cotton | 4 hour ago</span>
                            </div>
                        </div>
                        <hr />
                        <div class="notice-board">
                            <div class="table-img">
                                <div class="e-avatar mr-3">
                                    <img class="img-fluid" src="assets/img/profiles/img-6.jpg" alt="Maria Cotton" />
                                </div>
                            </div>
                            <div class="notice-body">
                                <h6 class="mb-0">Lorem ipsum dolor sit amet.</h6>
                                <span class="ctm-text-sm">Maria Cotton | 5 hour ago</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- / Recent Activities -->

        <div class="col-lg-6 col-md-12 d-flex">
            <!-- Today -->
            <div class="card flex-fill today-list shadow-sm grow">
                <div class="card-header">
                    <h4 class="card-title mb-0 d-inline-block">
                        Your Upcoming Leave
                    </h4>
                    <a href="leave.html" class="d-inline-block float-right text-primary"><i class="fa fa-suitcase"></i></a>
                </div>
                <div class="card-body recent-activ">
                    <div class="recent-comment">
                        <a href="javascript:void(0)" class="dash-card text-danger">
                            <div class="dash-card-container">
                                <div class="dash-card-icon">
                                    <i class="fa fa-suitcase"></i>
                                </div>
                                <div class="dash-card-content">
                                    <h6 class="mb-0">Mon, 16 Dec 2019</h6>
                                </div>
                            </div>
                        </a>
                        <hr />
                        <a href="javascript:void(0)" class="dash-card text-primary">
                            <div class="dash-card-container">
                                <div class="dash-card-icon">
                                    <i class="fa fa-suitcase"></i>
                                </div>
                                <div class="dash-card-content">
                                    <h6 class="mb-0">Mon, 23 Dec 2019</h6>
                                </div>
                            </div>
                        </a>

                        <hr />
                        <a href="javascript:void(0)" class="dash-card text-primary">
                            <div class="dash-card-container">
                                <div class="dash-card-icon">
                                    <i class="fa fa-suitcase"></i>
                                </div>
                                <div class="dash-card-content">
                                    <h6 class="mb-0">Wed, 25 Dec 2019</h6>
                                </div>
                            </div>
                        </a>
                        <hr />
                        <a href="javascript:void(0)" class="dash-card text-primary">
                            <div class="dash-card-container">
                                <div class="dash-card-icon">
                                    <i class="fa fa-suitcase"></i>
                                </div>
                                <div class="dash-card-content">
                                    <h6 class="mb-0">Fri, 27 Dec 2019</h6>
                                </div>
                            </div>
                        </a>
                        <hr />
                        <a href="javascript:void(0)" class="dash-card text-primary">
                            <div class="dash-card-container">
                                <div class="dash-card-icon">
                                    <i class="fa fa-suitcase"></i>
                                </div>
                                <div class="dash-card-content">
                                    <h6 class="mb-0">Tue, 31 Dec 2019</h6>
                                </div>
                            </div>
                        </a>
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