<!-- form information user_profile and can edit -->
<div class="col-xl-9 col-lg-8  col-md-12 grow ">
    <!-- catch data from database get all use-->
    <div class="d-flex ">
        <?php
        $user = $_SESSION['user'];
        $userPositionID = $_SESSION['user']['position_id'];
        $positions = getpositions();


        ?>
        <div class="col" style="background-color: #ACABCC; text-align: center;">
            <img src="assets/images/profiles/img-2.jpg" alt="Lights" style="width:55%; height:32%; border-radius: 50%;" class="rounded-circle mt-5">
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
                        if ($userPositionID == $position['position_id']) {
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
                <a href="/edit_information"><button type="button" class="btn btn-primary mr-3" style="width:80px;">Edit</button></a>

            </div>
        </div>
    </div>
</div>