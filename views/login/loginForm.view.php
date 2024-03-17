<?php
?>

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
    <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>
    <form action="controllers/login/check.login.controller.php" method="POST">
        <h3>Login Here</h3>
        <?php
        $wrongPwd = '';
        $wrongEmail = '';
        //show the message error when wrong email
        if (isset($_SESSION['email'])) {
            if ($_SESSION['email'] === 'wrongEmail') {
                $wrongEmail = 'is-invalid';
            }
        }
        //show the message error when wrong password
        if (isset($_SESSION['pwd'])) {
            if ($_SESSION['pwd'] === 'wrongPwd') {
                $wrongPwd = 'is-invalid';
            };
        };
        ?>

        <label for="username">Email</label>
        <input type="email" placeholder="Email" id="email_login" name="email" class="form-control <?= $wrongEmail ?>" required>
        <div class="invalid-feedback">
            <h6>Please try your email agian!</h6>
        </div>

        <label class="lablepwd" for="password">Password</label>
        <div class="pwds">
            <div class="child">
                <input type="password" placeholder="Password" id="password_login" name="password" class="form-control password <?= $wrongPwd ?>" required>
                <div class="invalid-feedback">
                    <h6>Please try your password agian!</h6>
                </div>
            </div>
            <div class=" togglePassword" id="eye">
                <i class="icone" data-feather="eye"></i>
            </div>
        </div>
        <div class="login_btn">
            <button  class="btn_login">Log In</button>
        </div>
       

        <!-- script for change to see password or close password  -->
        <script>
            feather.replace({
                'aria-hidden': 'true'
            });

            $(".togglePassword").click(function(e) {
                e.preventDefault();
                var type = $(this).parent().parent().find(".password").attr("type");
                if (type == "password") {
                    $("svg.feather.feather-eye").replaceWith(feather.icons["eye-off"].toSvg());
                    $(this).parent().parent().find(".password").attr("type", "text");
                } else if (type == "text") {
                    $("svg.feather.feather-eye-off").replaceWith(feather.icons["eye"].toSvg());
                    $(this).parent().parent().find(".password").attr("type", "password");
                }
            });
        </script>
    </form>
</body>

</html>