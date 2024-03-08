<!-- form edit  information user by admin-->
<div class="col-xl-9 col-lg-8  col-md-12 grow ">
    <div class="d-flex "  style="height:560px;">
    <!-- Get all data of user -->
        <div class="col" style="background-color: #ACABCC; text-align: center;">
            <img src="assets/images/profiles/img-2.jpg" alt="Lights" style="width: 225px; height:218px; border-radius: 52%;" class="rounded-circle mt-5">
            <div class="caption mt-4  Font-weight: bold " style="color: black;">
                <h3><?php echo strtoupper($member['fname'] . " " . $member['lname']); ?></h3>
            </div>
        </div>
        <!-- fistname -->
        <div class="col-7" style="background-color:whitesmoke;">
            <div class="col mt-5">
                <p>First Name: <?= $member['fname']; ?></p>
                <hr>
            </div>
            <!-- lastname -->
            <div class="col mt-5">
                <p>Last Name: <?= $member['lname']; ?></p>
                <hr>
            </div>
            <!-- position -->
            <div class="col mt-5">
                <p>Position: <?= $member['position_name'] ?>
                </p>
                <hr>
            </div>
            <!-- province -->
            <div class="col mt-5">
                <p>Province: <?= $member['place']; ?></p>
                <hr>
            </div>
            <!-- salary-->
            <div class="col mt-5">
                <p>Salary: <?= $member['amount'] . "$"; ?></p>
                <hr>
            </div>
            <div class="d-flex justify-content-end mt-5 mr-4">
                <a href="/edit_employee?id=<?php echo urlencode($member['user_id']); ?>"><button type="button" class="btn btn-primary mr-2 ml-2" style="width:80px;">Edit</button></a>
                <a href="controllers/admin/admin.employee.delete.controler.php?id=<?php echo urlencode($member['user_id']); ?>"><button type="button" class="btn btn-danger mr-2 ml-2" style="width:80px;">Delete</button></a>
            </div>
        </div>

    </div>
</div>