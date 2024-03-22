<!-- form edit information user by admin -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="vendor/css/form_user.css">

</head>

<body>
    <?php
    $users = getUser($user_id);
    $userPositionID = $users['position_id'];
    $positions = getpositions();
    ?>
    <div class="user_profile grow">
        <div class="background"></div>
        <div class="form">
            <div class="c-profile">
                <img class="profile" style="width: 225px; height:218px; border-radius: 52%;" class="rounded-circle mt-5" src="assets/images/profiles/<?= $users['picture'] ?>" alt="">
                <div class="text">
                    <h4><?= strtoupper($users['fname'] . " " . $users['lname']) ?></h4>
                </div>
            </div>
            <div class="form-1">
                <div class="logo-1">
                    <img src="../../assets/images/profiles/pnc.png" alt="">
                </div>
                <div class="information">
                    <div class="infor_left">
                        <p>Position:</p>
                        <p>Role:</p>
                        <p>Gmail:</p>
                        <p>Current Place:</p>
                        <p>Country:</p>
                    </div>
                    <div class="infor_right">
                        <p>
                            <?php
                            foreach ($positions as $position) {
                                if ($userPositionID === $position['position_id']) {
                                    echo $position['position_name'];
                                }
                            } ?>
                        </p>
                        <p><?= $users['role'] ?></p>
                        <p><?= $users['email'] ?></p>
                        <p><?= $users['place'] ?></p>
                        <p><?= $users['country'] ?></p>
                    </div>
                </div>
            </div>
            <!-- main button for delete user -->
            <div class="main_btn">
                <button type="button" class="btn-btn1 mr-2 ml-2" id="deleteBtn" style="width: 80px;">Delete</button>
                <a href="/edit_employee?id=<?php echo urlencode($users['user_id']); ?>">
                    <button type="button" class="mr-2 ml-2 text-center center-btn" style="width: 80px;">Edit</button>
                </a>
                <!--  Button trigger modal -->
                <a href="controllers/admin/admin.employee.delete.controler.php?id=<?php echo urlencode($users['user_id']); ?>"><button hidden type="submit" id="whenDelete"></button></a> 
            </div>
        </div>
        <!-- script for delete employee -->
        <script>
            document.getElementById('deleteBtn').addEventListener('click', function() {
                $("#myModal").modal('show');
            });
            // function use for delete employee
            function deleteUser(){
                document.getElementById('whenDelete').click();
            }
        </script>

</body>
<!-- Modal for confirmation dialog -->
<div class="modal" id="myModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header d-flex justify-content-center bg-danger">
                <h4 class="modal-title text-white">Are you sure you want to delete this Employee?</h4>
                <button style="position:absolute;right:20px;border:none" type="button" class="btn-close bg-danger" data-bs-dismiss="modal"><i class="fa fa-close text-white" style="font-size:20px"></i></button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <p class="text-center">Click on button to delete employee </p>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" data-bs-toggle="modal" id="cancel" class="btn btn-danger d-flex justify-content-center confirm-btn">Cancel</button>
                <button type="button" data-bs-toggle="modal" id="confirm" class="btn btn-primary d-flex justify-content-center confirm-btn" onclick="deleteUser()">Delete</button>
            </div>


        </div>
    </div>

</div>

</html>