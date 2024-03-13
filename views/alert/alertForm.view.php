<div class="card-body grow">
    <div class="table-responsive">
        <ul class="list-group ">
            <?php for ($i = 0; $i < count($members); $i++) : ?>
                <?php if ($members[$i]['checked'] === 'Pending') : ?>
                    <!-- count depend on the messages -->
                    <!-- Create message for the message based on team members -->
                    <li class="list-group-item  d-flex justify-content-between mb-2 align-items-center d-flex flex-row " style="height: 15vh; list-style-type: none;">
                        <a href="<?= $members[$i]['user_id'] ?>"><img src="/assets/images/profiles/<?= $members[$i]['picture'] ?>" alt="Linda Craver" class="rounded-circle img-thumbnail shadow-sm" style="width: 60px; height: 60px; "></a>
                        <a href="<?= $members[$i]['user_id'] ?>">
                            <h6 class="mr-0"><?= $members[$i]['fname'] ?></h6>
                        </a>
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
    </div>
    <!--Code for show title of no has notificaiont when the notification no has -->
    <?php if (count($members) === 0) : ?>
        <div class="container">
            <div class="card">
                <div class="card-body">
                    <div class="row d-flex justify-content-center">
                        <h2 class="text-notification"><?= 'Nothing on your notification' ?></h2>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
</div>