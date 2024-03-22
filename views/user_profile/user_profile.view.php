<!-- form edit  information user by admin-->
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
    <div class=" grow col-xl-9 col-lg-8 col-md-12 grow ">
        <div class="background">
        </div>
        <?php
        $user = $_SESSION['user'];
        $userPositionID = $_SESSION['user']['position_id'];
        $positions = getpositions();
        ?>
        <form class="form_add_employee bg-white form ctm-border-radius" action="../../controllers/user_profile/update_profile.controller.php" method="post" enctype="multipart/form-data">
            <div class="c-profile ">
                <img class="profile" style="width: 225px; height:218px; border-radius: 52%;" class="rounded-circle mt-5" src="assets/images/profiles/<?= $_SESSION['user']['picture'] ?>" alt="Preview Image" style="width:200px; height:200px; border-radius: 50%;" id="profile" class="rounded-circle mt-5">
                <div class="rightRound" style="background-color:blue; width:40px; height: 40px; border-radius:50%; border:3px solid #ACABCC;margin-left:20%; margin-top:-7% ;">
                    <input type="file" name="image" id="fpicture" class="form-control-file" accept=".jpg,.jpeg,.png" style="transform:scale(2);opacity:0;">
                    <i class="fa fa-camera" id="icon" style="position:relative;top:-90%;font-size:135%; color:white; padding:6px;" class="rounded-circle mt-5"></i>
                </div>
                <div class="text">
                    <h2><?php echo $user['fname'] . ' ' . $user['lname'] ?></h2>
                </div>
                <button hidden id="upload" type="submit"></button>
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
                        <p>Place:</p>
                        <p>Country:</p>
                    </div>
                    <div class="infor_right">
                        <p>
                            <?php
                            foreach ($positions as $position) {
                                if ($userPositionID == $position['position_id']) {
                                    echo $position['position_name'];
                                }
                            } ?></p>
                        <p><?php echo $user['role']; ?></p>
                        <p><?php echo $user['email']; ?></p>
                        <p><?php echo $user['place']; ?></p>
                        <p><?php echo $user['country']; ?></p>

                    </div>
                </div>
            </div>
            <div class="main_btn">
                <a href="/"><button type="button" class="btn-btn1 mr-2 ml-2" style="width:80px;">Back</button></a>
                <a href="/edit_information">
                    <button type="button" class="mr-2 ml-2 text-center center-btn" style="width:80px;">Edit</button>
                </a>
            </div>
        </form>
        <!-- script for change picture of  user profile -->
        <script>
            $('#icon').click(() => {
                // Aotu click on input file
                $('#fpicture').trigger('click');
                // Call input file to allow for upload image
                $('#fpicture').change(function() {
                    // Check if file is already upload
                    if ($('#fpicture') != null) {
                        // Check type of file that upload
                        if (this.files && this.files[0] && this.files[0].name.match(/\.(jpg|jpeg|png|gif)$/)) {
                            // Check size of file 
                            if (this.files[0].size > 1048576) {
                                alert('File size is larger than 1MB!');
                            } else {
                                // Ask for confirm to change
                                confirm();
                            }
                            // if file is not type of image
                        } else alert('This is not an image file!');

                    }
                })
            })

            // Confirm for change
            function confirm() {
                $("#myModal").modal("show");

                // Button cancel
                $("#cancel").click(() => {
                    $("#myModal").modal("hide");
                });

                // Button confirm
                $("#confirm").click(() => {
                    if (this) {
                        $(document).ready(function() {
                            $('#upload').trigger('click');
                        })
                    }
                })
            }
        </script>

        <!-- Add dialog for asking when want to change photo -->
        <!-- Dialog to comfirm for concel -->
        <!-- The Modal -->
        <div class="modal" id="myModal">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header d-flex justify-content-center bg-danger">
                        <h4 class="modal-title text-white">Are you sure to Change your profile?</h4>
                        <button style="position:absolute;right:20px;border:none" type="button" class="btn-close bg-danger" data-bs-dismiss="modal"><i class="fa fa-close text-white" style="font-size:20px"></i></button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <p class="text-center">Click on button to confirm change your profile</p>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" data-bs-toggle="modal" id="cancel" class="btn btn-danger d-flex justify-content-center confirm-btn">Cancel</button>
                        <button type="button" data-bs-toggle="modal" id="confirm" class="btn btn-primary d-flex justify-content-center confirm-btn">Confirm</button>
                    </div>

                </div>
            </div>
        </div>
</body>

</html>