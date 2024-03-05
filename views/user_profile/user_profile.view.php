<!-- form information user_profile and can edit -->
<div class="col-xl-9 col-lg-8  col-md-12 grow ">
    <!-- catch data from database get all use-->
    <div class="d-flex ">
        <?php
            $user = $_SESSION['user'];
            $userPositionID = $_SESSION['user']['position_id'];
            $positions = getpositions();
        ?>

        <div class="col" name="fileImg" style="background-color: #ACABCC; text-align: center; ">
            <!-- pleace for uploaded profiles -->
            <form action="../../controllers/user_profile/update_profile.controller.php" method="post" enctype="multipart/form-data">
                <div class="upload">
                    <img id="imagePreview" src="assets/images/profiles/<?= $_SESSION['user']['picture']?>" alt="Preview Image" style="width:200px; height:200px; border-radius: 50%;" id="profile" class="rounded-circle mt-5">
                    <div class="rightRound" style="background-color:blue; width:40px; height: 40px; border-radius:50%;
                        text-align:center; overflow:hidden; z-index: 1; position: absolute; margin-left:60%;top:33%; border: 3px solid #ACABCC  ">
                        <input type="file" name="image" id="fpicture" class="form-control-file" accept=".jpg,.jpeg,.png" style="position:absolute; transform:scale(2);opacity:0;">
                        <i class="fa fa-camera" style="font-size:135%;  padding:6px; color:white;" class="rounded-circle mt-5"></i>
                    </div>
                </div>
                <button hidden id="upload" type="submit"></button>
            </form>
            <div class="caption mt-4  Font-weight: bold " style="color: black;">
                <h3><?php echo $user['fname'] . ' ' . $user['lname'] ?></h3>
            </div>

            </div>
            <!-- fistname -->
            <div class="col-7" style="background-color:whitesmoke;">
                <div class="col mt-4">
                    <p>First Name : <?php echo $user['fname']; ?></p>
                    <hr>
                </div>
                <!-- lastname -->
                <div class="col mt-5">
                    <p>Last Name : <?php echo $user['lname']; ?></p>
                    <hr>
                </div>
                <!-- gender-->
                <div class="col mt-5">
                    <p>Gender : <?php echo $user['gender']; ?></p>
                    <hr>
                </div>
                <!-- position -->
                <div class="col mt-5">
                    <p>Position :
                        <?php
                        foreach ($positions as $position) {
                            if ($userPositionID === $position['position_id']) {
                                echo $position['position_name'];
                            }
                        }
                        ?>
                    </p>
                    <hr>
                </div>
                <!-- province -->
                <div class="col mt-5">
                    <p>Province: <?php echo $user['place']; ?></p>
                    <hr>
                </div>
                <!-- email-->
                <div class="col mt-5">
                    <p>Email: <?php echo $user['email']; ?></p>
                    <hr>
                </div>
                <div class="d-flex justify-content-end pb-3 mr-4;">
                    <button type="button" class="btn btn-danger mr-3" style="width:80px;">Back</button>
                    <button type="button" class="btn btn-primary mr-3" style="width:80px;">Edit</button>
                </div>
            </div>
    </div>
<!-- script for change picture of  user profile -->
<script>
    $('#fpicture').change(function() {
        if ($('#fpicture') != null) {
            confirm('CLick ok for upload this image!')
            if (this) {
                $(document).ready(function() {
                    $('#upload').trigger('click');
                })
            }
        }
    })
</script>

