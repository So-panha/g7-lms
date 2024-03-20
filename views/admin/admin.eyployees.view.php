<!-- header -->
<div class="col-xl-9 col-lg-8 col-md-12">
    <!-- Alert when it success for updating or not -->
    <?php if (isset($_SESSION['update'])) { ?>
        <?php if ($_SESSION['update'] == 'Success') { ?>
            <div class="alert alert-success alert-dismissible grow" id="alert">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong><?= $_SESSION['update'] . ' for update information of your employee!' ?></strong>
            </div>
        <?php } ?>
        <?php if ($_SESSION['update'] == 'Unsuccess') { ?>
            <div class="alert alert-danger alert-dismissible grow" id="alert">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong><?= $_SESSION['update'] . ' for update information of your employee please fill form before you submit!' ?></strong>
            </div>
        <?php } ?>
        <!-- remove session alert -->
        <?php unset($_SESSION['update']) ?>
        <!-- remove message -->
        <script>
            let showALert = document.querySelector('.alert');
            setTimeout(function() {
                showALert.remove();
            }, 4000);
        </script>
    <?php } ?>
    <div class="quicklink-sidebar-menu ctm-border-radius shadow-sm grow bg-white p-4 mb-4 card">
        <ul class="list-group list-group-horizontal-lg">
            <!-- <li class="list-group-item text-center button-5"><a href="" class="text-white">All</a></li> -->
            <li class="list-group-item text-center button-5 active"><a href="" class="text-white">All</a></li>
            <li class="list-group-item text-center button-6"><a href="/admin_employees_team" class="text-dark">Add Team</a></li>

            <form action="" style="position: absolute;right:30%;">
                <select class="form-control me-2" id="select-role">
                    <option disabled selected>Employees Roles</option>
                    <option value="">All</option>
                    <option value="Manager">Manager</option>
                    <option value="Employee">Employees</option>
                </select>
            </form>

            <form class="d-flex" style="position: absolute;right: 1.5%;">
                <input class="form-control me-2" type="text" placeholder="Search" id="search-employees">
                <button class="btn btn-warning" type="button">Search</button>
            </form>
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
    <div class="d-flex flex-wrap justify-content-center bg-secondary bg-light mb-5 p-3 ctm-border-radius shadow-sm border-none grow" id="main-hole-card">
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
            $image = $user['picture'];

            // Find the position name based on the position ID
            $positionName = '';
            foreach ($positions as $position) {
                if ($user['position_id'] == $position['position_id']) {
                    $positionName = $position['position_name'];
                    break;
                }
            }
        ?>
            <div class="user-card card shadow-sm bg-white text-center ctm-border-radius mr-2 ml-2 mt-4" id="main_card_user">
                <a href="/information_user?id=<?php echo urlencode($id); ?>">
                    <div class="user-info card-body" style="width:260px;">
                        <div class="user-avatar mb-4">
                            <?php if ($gender == "Male") : ?>
                                <img src="assets/images/profiles/<?= $image ?>" alt="User Avatar" class="rounded-circle" width="100px" height="100px">
                            <?php else : ?>
                                <img src="assets/images/profiles/<?= $image ?>" alt="User Avatar" class="rounded-circle" width="100px" height="100px">
                            <?php endif; ?>
                        </div>
                        <div class="user-details">
                            <h5><b><?php echo strtoupper($name); ?></b></h5>
                            <input hidden type="text" value="<?= $user['role']; ?>">
                            <p><?php echo $positionName; ?></p>
                            <input type="hidden" value="<?= $id ?>">
                        </div>
                    </div>


                </a>
            </div>
        <?php
        }
        ?>
    <h2 style="display: none;" class="noData">No have data of the user</h2>
    </div>
</div>
<!-- Script search bar and select -->
<script>
    var users = document.querySelectorAll("#main_card_user");
    document.getElementById('search-employees').addEventListener('input', (e) => {
        var countCard = 0;
        users.forEach(user => {
            var name = document.getElementById('search-employees').value.toLocaleLowerCase();
            let userName = user.children[0].children[0].children[1].children[0].children[0].textContent.toLowerCase();
            if (userName.includes(name) === true) {
                user.style.display = 'block';
                document.querySelector('.noData').style.display = 'none';
            } else {
                countCard += 1;
                user.style.display = 'none';
                if(countCard == users.length){
                    document.querySelector('.noData').style.display = 'block';
                }
            }
        });
    });
    
    document.getElementById('select-role').addEventListener('change',(e)=>{
        countCard = 0;
        users.forEach(user => {
            var roles = document.getElementById('select-role').value.toLocaleLowerCase();
            let userName = user.children[0].children[0].children[1].children[1].value.toLocaleLowerCase();
            if (userName.includes(roles) === true) {
                user.style.display = 'block';
                document.querySelector('.noData').style.display = 'none';
            } else {
                user.style.display = 'none';
                countCard += 1;
                if(countCard == roles.length){
                    document.querySelector('.noData').style.display = 'block';
                }
            }
        });
    });
</script>
<!--  -->
</div>
</div>