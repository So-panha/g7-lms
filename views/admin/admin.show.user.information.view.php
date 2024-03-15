<!-- form edit  information user by admin-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="vendor/css/form_user.css">

</head>

<body>
    <?php
    $users = getUser($user_id);
    $userPositionID = $users['position_id'];
    $positions = getpositions();
    ?>
    <div class="user_profile grow">
        <div class="background">
        </div>
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
                            }?></p>
                        <p><?= $users['role'] ?></p>
                        <p><?= $users['email'] ?></p>
                        <p><?= $users['place'] ?></p>
                        <p><?= $users['country'] ?></p>

                    </div>
                </div>
            </div>
            <div class="main_btn">
                <a href="controllers/admin/admin.employee.delete.controler.php?id=<?php echo urlencode($users['user_id']); ?>"><button type="button" class="btn-btn1 mr-2 ml-2" style="width:80px;">Delete</button></a>
                <a href="/edit_employee?id=<?php echo urlencode($users['user_id']); ?>">
                    <button type="button" class="mr-2 ml-2 text-center center-btn" style="width:80px;">Edit</button>
                </a>
            </div>
        </div>

</body>

</html>