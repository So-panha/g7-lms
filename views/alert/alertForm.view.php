<div class="card-body grow">
    <div class="table-responsive">
        <ul class="list-group ">
            <!-- Count number of member message -->
            <?php   $_SESSION['message'] = count($members); ?>
            <?php for ($i = 0; $i < count($members) ; $i++) : ?>
                <?php if($members[$i]['checked'] === 'Pending') :?>
                    <!-- count depend on the messages -->
                    <!-- Create message for the message based on team members -->
                    <li class="list-group-item  d-flex justify-content-between align-items-center d-flex flex-row " style="height: 15vh; list-style-type: none;">
                        <a href="<?= $members[$i]['user_id'] ?>"><img src="/assets/images/profiles/img-2.jpg" alt="Linda Craver" class="rounded-circle img-thumbnail shadow-sm" style="width: 60px; height: 60px; "></a>
                        <a href="<?= $members[$i]['user_id'] ?>">
                            <h6 class="mr-5"><?= $members[$i]['fname'].' '.$members[$i]['lname'] ?></h6>
                        </a>
                        <h6 class="mr-0">Leave-Time : <?= $members[$i]['start_leave']." - ".$members[$i]['end_leave'] ?></h6>
                        <h6 class="mr-0"><?= $members[$i]['type_leave_name'] ?></h6>
                        <h6 class="mr-0"><?= $members[$i]['date_request'] ?></h6>
                        <a href="<?= $members[$i]['user_id'] ?>" class="btn btn-outline-primary btn-sm" style="margin-left: 100px;">Approve</a>
                        <a href="<?= $members[$i]['user_id'] ?>" class="btn btn-outline-danger btn-sm">Not Approve</a>
                    </li>
                    <!-- Set numbers of the message into the the global variable -->
                <?php endif; ?>
            <?php endfor; ?>
        </ul>
    </div>
</div>