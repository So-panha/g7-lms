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
    <form style="height: 50%;" action="../../controllers/login/OTP.confirm.controller.php" method="post">
        <h3>Verify Your OTP</h3>
       
        <label for="OTP">OTP</label>
        <input style="height: 8vh;width: 98%;margin-top: 10px;color: black;padding: 0 10px;" type="text" placeholder="OTP" name="OTP" class="form-control  <?= $wrongOTP ?>" required>
        <?php
        //show the message error when wrong email
        session_start();
        ?>
        <?php if (isset($_SESSION['failed'])) :?>
            <?php if ($_SESSION['failed'] === 'fail') :?>
            <div class="invalid-feedback">
                <h6>Please try your OTP agian!</h6>
            </div>
            <?php endif; ?>
        <?php endif; ?>
       
       
        </div>
        <div class="login_btn">
            <button  class="btn_login">Verify</button>
        </div>
        

    </form>
</body>

</html>