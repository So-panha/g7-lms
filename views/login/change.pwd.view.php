<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="../../vendor/css/login.css">


</head>

<body>
    <div class="background_login">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>
    <form style="height: 65%;" action="../../controllers/login/change.password.controller.php" method="POST">

        <label class="lablepwd" for="password">Your New Password</label>
        <div class="pwds">
            <div class="child">
                <input style="height: 8vh;width: 98%;margin-top: 10px;color: black;padding: 0 10px;" type="password" placeholder="New Password" name="new_password" class="form-control password <?= $wrongPwd ?>" required>
                <?php if (isset($test)) : ?>
                    <?php if ($_SESSION['failed'] === 'fail') : ?>
                        <div class="invalid-feedback">
                            <h6>Please your password is not match!</h6>
                        </div>
                    <?php endif; ?>
                <?php endif; ?>
            </div>
        </div>

        <label class="lablepwd" for="password">Confirm Your Password</label>
        <div class="pwds">
            <div class="child">
                <input style="height: 8vh;width: 98%;margin-top: 10px;color: black;padding: 0 10px;" type="password" placeholder="Confrim Password" name="confirm_password" class="form-control password <?= $wrongPwd ?>" required>
                <?php if (isset($_SESSION['failed'])) : ?>
                    <?php if ($_SESSION['failed'] === 'fail') : ?>
                        <div class="invalid-feedback">
                            <h6>Please your password is not match!</h6>
                        </div>
                    <?php endif; ?>
                <?php endif; ?>
            </div>
        </div>
        <div style="display: flex;justify-content: center;margin-top: 50px;">
            <button class="btn_login">Confirm</button>
        </div>
    </form>
</body>

</html>