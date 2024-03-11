<!-- header -->
<div class="col-xl-9 col-lg-8 col-md-12">
    <div class="quicklink-sidebar-menu ctm-border-radius shadow-sm grow bg-white p-4 mb-4 card">
        <ul class="list-group list-group-horizontal-lg">
            <li class="list-group-item text-center active button-5"><a href="/admin_employees" class="text-white" style="width:60px;">All</a></li>
        </ul>
    </div> <!-- header -->

    <!-- content -->
    <div class="d-flex justify-content-between bg-secondary bg-light mb-3 p-3 ctm-border-radius shadow-sm border-none grow">
        <div class="p-2 bg-light"><?php echo $numberOfMembers; ?> Employees</div>
    </div>
    <!-- content -->

    <!-- list of users -->
    <div class="d-flex flex-wrap justify-content-center bg-secondary bg-light mb-5 p-3 ctm-border-radius shadow-sm border-none grow">
        <?php

        // Loop through the user data and generate user cards
        foreach ($allMembers as $members) {
            // Extract the user details from the current user data
            $id = $members['user_id'];
            $name = $members['fname'] . ' ' . $members['lname'];
            $gender = $members['gender'];
            $position_id = $members['position_id'];

            // Find the position name based on the position ID
            $positionName = '';
            foreach ($positions as $position) {

                if ($position_id == $position['position_id']) {
                    $positionName = $position['position_name'];
                    break;
                }
            }
        ?>
            <div class="user-card card shadow-sm bg-white text-center ctm-border-radius grow mr-2 ml-2 mt-4">
                <a href="/infomation_members?id=<?php echo urlencode($id); ?>">
                    <div class="user-info card-body" style="width:260px;">
                        <div class="user-avatar mb-4">
                            <?php if ($gender == "Male") : ?>
                                <img src="assets/images/profiles/<?= $members['picture'] ?>"" alt=" User Avatar" class=" rounded-circle" width="100px" height="100px">
                            <?php else : ?>
                                <img src="assets/images/profiles/<?= $members['picture'] ?>"" alt=" User Avatar" class=" rounded-circle" width="100px" height="100px">
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