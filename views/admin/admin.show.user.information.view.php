<!-- form edit -->
<div class="col-xl-9 col-lg-8  col-md-12 grow ">
    <div class="d-flex ">
        <?php
        $user = getUser($user_id);
        $userPositionID = $user['position_id'];
        $positions = getpositions();


        ?>
        <div class="col" style="background-color: #ACABCC; text-align: center;">
            <img src="assets/images/profiles/img-2.jpg" alt="Lights" style="width:60%; height:40%; border-radius: 50%;" class="rounded-circle mt-5">
            <div class="caption mt-4  Font-weight: bold " style="color: black;">
                <h3><?php echo $user['fname']; ?></h3>
                <h3><?php echo $user['lname']; ?></h3>
            </div>
        </div>
        <div class="col-7" style="background-color:whitesmoke;">
            <div class="col mt-4">
                <p>First Name: <?php echo $user['fname']; ?></p>
                <p></p>
                <hr>
            </div>
            <div class="col mt-5">
                <p>Last Name: <?php echo $user['lname']; ?></p>
                <p></p>
                <hr>
            </div>
            <div class="col mt-5">
                <p>Position:
                    <?php
                    foreach ($positions as $position) {
                        if ($userPositionID === $position['position_id']) {
                            echo $position['position_name'];
                        }
                    }
                    ?>
                </p>
                <p></p>
                <hr>
            </div>
            <div class="col mt-5">
                <p>Province: <?php echo $user['place']; ?></p>
                <p></p>
                <hr>
            </div>
            <div class="col mt-5">
                <p>Salary: <?php echo $user['amount']."$"; ?></p>
                <p></p>
                <hr>
            </div>
            <div class="d-flex justify-content-end pb-3 mr-4;">
                <button type="button" class="btn btn-danger mr-3" style="width:80px;">Edit</button>
            </div>
        </div>

    </div>
</div>