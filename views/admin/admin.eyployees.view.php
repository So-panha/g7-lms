<!-- header -->
<div class="col-xl-9 col-lg-8 col-md-12">
    <div class="quicklink-sidebar-menu ctm-border-radius shadow-sm grow bg-white p-4 mb-4 card">
        <ul class="list-group list-group-horizontal-lg">
            <li class="list-group-item text-center active button-5"><a href="/admin_employees" class="text-white">All</a></li>
            <li class="list-group-item text-center button-6"><a href="/admin_employees_team" class="text-dark">Add Team</a></li>
            <li class="list-group-item text-center button-6"><a href="documents.html" class="text-dark">Add Office</a></li>
        </ul>
    </div>
    <!-- header -->

    <!-- content -->
    <div class="d-flex justify-content-between bg-secondary bg-light mb-3 p-3 ctm-border-radius shadow-sm border-none grow">
        <?php
        $users = getusers();
        $numberEmployees = count($users);
        ?>

        <div class="p-2 bg-light"><?php echo $numberEmployees; ?> Employees</div>
        <a href="/add_employee" class="btn btn-theme text-white ctm-border-radius float-right button-1">Add Employee</a>
    </div>
    <!-- content -->

    <!-- list of users -->
    <div class="d-flex flex-wrap justify-content-center bg-secondary bg-light mb-5 p-3 ctm-border-radius shadow-sm border-none grow">
        <?php
        // Call the getusers function to retrieve the user data
        $users = getusers();
        $positions = getpositions();

        // Loop through the user data and generate user cards
        foreach ($users as $user) {
            // Extract the user details from the current user data
            $id = $user['user_id'];
            $name = $user['fname'] . ' ' . $user['lname'];
            $gender = $user['gender'];

            // Find the position name based on the position ID
            $positionName = '';
            foreach ($positions as $position) {
                if ($user['position_id'] == $position['position_id']) {
                    $positionName = $position['position_name'];
                    break;
                }
            }
        ?>
            <div class="user-card card shadow-sm bg-white text-center ctm-border-radius grow mr-2 ml-2 mt-4">
                <a href="/information_user?id=<?php echo urlencode($id); ?>">
                    <div class="user-info card-body" style="width:260px;">
                        <div class="user-avatar mb-4">
                            <?php if ($gender == "Male") : ?>
                                <img src="assets/images/profile/male.jpg" alt="User Avatar" class="img-fluid rounded-circle" width="70">
                            <?php else : ?>
                                <img src="assets/images/profile/female.jpg" alt="User Avatar" class="img-fluid rounded-circle" width="70">
                            <?php endif; ?>
                        </div>
                        <div class="user-details">
                            <h5><b><?php echo strtoupper($name); ?></b></h5>
                            <p><?php echo $positionName; ?></p>
                            <input type="hidden" value="<?= $id ?>">


                        </div>
                    </div>


                </a>
            </div>
        <?php
        }
        ?>
    </div>
</div>
<!--  -->
</div>
</div>