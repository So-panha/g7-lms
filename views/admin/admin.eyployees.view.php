<!-- header -->
<div class="col-xl-9 col-lg-8  col-md-12">
    <div class="quicklink-sidebar-menu ctm-border-radius shadow-sm grow bg-white p-4 mb-4 card">
        <ul class="list-group list-group-horizontal-lg">
            <li class="list-group-item text-center active button-5"><a href="/admin_employees" class="text-white">All</a></li>
            <li class="list-group-item text-center button-6"><a href="/admin_employees_team" class="text-dark">Add Team</a></li>
            <li class="list-group-item text-center button-6"><a href="documents.html" class="text-dark">Add Office</a></li>

        </ul>
    </div>
    <!-- header -->

    <!-- content -->
    <div class=" d-flex justify-content-between bg-secondary bg-light mb-3 p-3 ctm-border-radius shadow-sm border-none">
        <div class=" p-2 bg-light">7 People</div>
        <a href="/add_employee" class="btn btn-theme text-white ctm-border-radius float-right button-1">Add Person</a>

    </div>
    <!-- content -->


    <!-- list of users -->
    <div class="d-flex flex-wrap justify-content-center bg-secondary bg-light mb-5 p-3 ctm-border-radius shadow-sm border-none">

        <?php
        // Call the getusers function to retrieve the user data
        $users = getusers();
        $positions = getpositions();

        // Loop through the user data and generate user cards
        foreach ($users as $user) {
            // Extract the user details from the current user data
            $id = $user['user_id'];
            $name = $user['fname'] . ' ' . $user['lname'];
            $email = $user['email'];

            // Find the position name based on the position ID
            $positionName = '';
            foreach ($positions as $position) {
                if ($user['position_id'] == $position['position_id']) {
                    $positionName = $position['position_name'];
                    break;
                }
            }
        ?>

            <div class="user-card card shadow-sm bg-white text-center ctm-border-radius grow mr-4 mt-4">
                <a href="/information_user.php?id=<?php echo urlencode($id); ?>">
                    <div class="user-info card-body" style="width:260px;">
                        <div class="user-avatar mb-4">
                            <img src="assets/images/logo.png" alt="User Avatar" class="img-fluid rounded-circle" width="70">
                        </div>
                        <div class="user-details">
                            <h5><b><?php echo $name; ?></b></h5>
                            <p><?php echo $positionName; ?></p>
                            <p><?php echo $email; ?></p>
                            <input type="hidden" value="<?= $id ?>">
                            <div class="d-inline-block float-right" data-toggle="modal">
                                <span data-toggle="modal">
                                    <a href="" class="btn btn-theme ctm-border-radius text-white" data-placement="bottom"><i class="fa fa-pencil"></i></a>
                                </span>
                                <span data-toggle="modal">
                                    <a href="controllers/admin/admin.employee.delete.controler.php?id=<?php echo urlencode($id); ?>" class="btn btn-theme ctm-border-radius text-white" data-placement="bottom" title="Delete"><i class="fa fa-trash"></i></a>
                                </span>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

        <?php
        }
        ?>
    </div>
</div>
</div>
<!--  -->
</div>