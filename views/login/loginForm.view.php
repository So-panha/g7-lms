<div class="container mt-5 " style="background-color:rebeccapurple;width:60%;height:79vh; display:flex; flex-direction:column;  padding: 10px; border-radius: 20px;">
    <div class="top" style="background-color:rebeccapurple; height: 100%; width: 100%; display:flex; flex-direction:column">
        <div class="title" style="background-color:rebeccapurple; text-align: center; color:white; height: 14%; margin-bottom:-1%;">
            <h2 class="h2" style="font-weight: bold; font-size: 50px; ">LOGIN</h2>
        </div>
        <div class="d-flex bg-white" style="height: 80%; width: 100%;">
            <div class="border-right" style="height: 100%; width:50%; display:flex; justify-content:center; align-items:center; margin-right:1%">
                <img src="/views/login/image/profile.png" class="img-circle" width="100%" height="100%">
            </div>
            <div class="" style=" background-color: white; height: 100%; width: 50%; ">
                <form action="controllers/login/check.login.controller.php" method="POST" style="width: 100%;">
                    <?php 
                    $wrongPwd = '';
                    $wrongEmail = '';
                    //show the message error when wrong email
                    if (isset($_SESSION['email'])){
                        if($_SESSION['email'] === 'wrongEmail'){
                            $wrongEmail = 'is-invalid';
                        }
                    }
                    //show the message error when wrong password
                    if(isset($_SESSION['pwd'])){
                        if($_SESSION['pwd'] === 'wrongPwd'){
                            $wrongPwd = 'is-invalid';
                        };
                    };
                    ?>
                    <div class="col-12 mt-5">
                        <div class="form-group ">
                            <input type="email" class="form-control <?= $wrongEmail ?>" placeholder="Enter email" id="email" name="email" style="height: 10vh; font-size:large;" required />
                            <div class="invalid-feedback">
                                <h6>Please try your email agian!</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 mt-1">
                        <div class="form-group ">
                            <div class="input-group">
                                <input class="form-control password <?= $wrongPwd?> "id="password" class="block mt-1 w-full " placeholder="Enter Password" type="password" name="password" value="" style="height: 10vh; font-size:large;" required />
                                <span class="input-group-text togglePassword" id="" style="margin-top: 3.40%; border-radius:0%">
                                    <i data-feather="eye" style="cursor: pointer;"></i>
                                </span>
                                <div class="invalid-feedback">
                                    <h6>Please try your password agian!</h6>
                                </div>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary hover-btn d-flex justify-content-center align-items-center" style="width: 40%; height:7vh; font-size: 20px; margin:auto; margin-top: 8%; ">Login</button>
                    <style>
                        .hover-btn:hover {
                            background-color: rebeccapurple;
                        }
                    </style>
                    </button>
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
                <hr>
                <a href="" class="d-flex">
                    <h5 class="" style="margin: auto;">Reset Password</h5>
                </a>
            </div>
        </div>
    </div>
</div>