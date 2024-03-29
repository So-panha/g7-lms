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
    <div class=" col-xl-9 col-lg-8 col-md-12 grow">
        <div class="background">
        </div>
        <div class="form_add_employee form bg-white">
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
                        <p>Role:</p>
                        <p>Department:</p>
                        <p>Gmail:</p>
                        <p>Current Place:</p>
                        <p>Country:</p>
                    </div>
                    <div class="infor_right">
                        <p>
                        <p><?= $users['role'] ?></p>
                            <?php
                            foreach ($positions as $position) {
                                if ($userPositionID === $position['position_id']) {
                                    echo $position['position_name'];
                                }
                            }?></p>
                        <p><?= $users['position_name'] ?></p>
                        <p><?= $users['email'] ?></p>
                        <p><?= $users['place'] ?></p>
                        <p><?= $users['country'] ?></p>

                    </div>
                </div>
            </div>
        </div>

</body>

</html>