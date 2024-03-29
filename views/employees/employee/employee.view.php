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
			}, 3000);
		</script>
	<?php } ?>
    <!-- Widget -->
    <div class="quicklink-sidebar-menu ctm-border-radius shadow-sm bg-white card grow">
        <div class="card-body">
            <ul class="list-group list-group-horizontal-lg">
                <li class="list-group-item text-center active button-5">
                    <p class="text-white" href="employees-dashboard.html">Employees Dashboard</class=></p>
                </li>
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6 col-md-12 d-flex">
            <div class="card shadow-sm flex-fill grow">
                <div class="card-header">
                    <h4 class="card-title mb-0 d-inline-block">Show from request</h4>
                    <p class="d-inline-block float-right text-primary"><i class="fa fa-suitcase"></i></p>
                </div>
                <div class="card-body text-center">
                    <?php
                    $coundApproved = 0;
                    $coundRejected = 0;
                    $dayCanLeave = 0;
                    $taken =0;
                    $responds = getChecked($id);
                    foreach ($responds as $respond){
                        if ($respond['checked']=='Approved'){
                            $coundApproved +=1;
                            
                        }else{
                            $coundRejected +=1;
                        }
                        $dayCanLeave =$respond['day_can_leave'];
                        $taken =$respond['taken'];
                    }
                    ?>
                    <div class="time-list">
                        <div class="dash-stats-list">
                            <span class="btn btn-outline-primary"><?php echo $coundApproved ?></span>
                            <p class="mb-0">Approved</p>
                        </div>
                        <div class="dash-stats-list">
                            <span class="btn btn-outline-primary"><?php echo $coundRejected ?></span>
                            <p class="mb-0">Rejected</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-12 d-flex">
            <div class="card shadow-sm flex-fill grow">
                <div class="card-header">
                    <h4 class="card-title mb-0 d-inline-block">Leave</h4>
                    <p class="d-inline-block float-right text-primary"><i class="fa fa-suitcase"></i></p>
                </div>
                <div class="card-body text-center">
                    <div class="time-list">
                        <div class="dash-stats-list">
                            <span class="btn btn-outline-primary"><?php echo $taken ." Days" ?></span>
                            <p class="mb-0">Taken</p>
                        </div>
                        <div class="dash-stats-list">
                            <span class="btn btn-outline-primary"><?php echo $dayCanLeave ." Days" ?></span>
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
                                if ($leave['start_leave']== date('d/m/Y')){

                            ?>
                                <a href="javascript:void(0)" class="dash-card text-dark">
                                    <div class="dash-card-container">
                                        <div class="dash-card-content">
                                            <h6 class="mb-0"><?php echo strtoupper($leave['fname']) . " is " . $leave['type_leave_name'] . " today "; ?></h6>
                                        </div>
                                        <div class="dash-card-avatars">
                                            <img src="assets/images/profiles/<?= $leave['picture'] ?>" class="rounded-circle" width="40px" height="40px">
                                        </div>
                                    </div>
                                </a>
                                <hr>
                            <?php
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-12 d-flex">
             <!-- Team members List -->
             <div class="card flex-fill team-lead shadow-sm grow">
                <div class="card-header">
                    <h4 class="card-title mb-0 d-inline-block">Members</h4>
                    <?php if($_SESSION["user"]["role"] == "admin"):?>
                    <p class="dash-card float-right mb-0 text-primary">Team member</p>
                    <?php endif;?>
                </div>
                <div class="card-body">
                    <?php for ($i = 0; $i < count($members); $i++) : ?>
                        <div class="media mb-3">
                            <div class=" mr-3"><img class="rounded-circle" width="40px" height="40px" class="img-fluid" src="assets/images/profiles/<?= $members[$i]['picture'] ?>" alt="<?= $members[$i]['lname'] ?>"></div>
                            <div class="media-body">
                                <h6 class="m-0"><?= $members[$i]['fname'] . ' ' . $members[$i]['lname'] ?></h6>
                            </div>
                        </div>
                        <hr>
                    <?php endfor; ?>
                </div>
            </div>
        </div>
</div>
</div>
</div>
</div>
<!--/Content-->