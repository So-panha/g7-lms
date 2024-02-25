<div class="container mt-5 " style="background-color:rebeccapurple;width:60%;height:70vh; display:flex; flex-direction:column;  padding: 10px; border-radius: 20px;">
    <div class="top" style="background-color:rebeccapurple; height: 100%; width: 100%; display:flex; flex-direction:column">
        <div class="title" style="background-color:rebeccapurple; text-align: center; color:white; height: 15%; margin-bottom: 1%;">
            <h2 class="h2" style="font-weight: bold; font-size: 50px; ">LOGIN</h2>
        </div>
        <div class="d-flex bg-white" style="height: 78%; width: 100%;">
            <div class="border-right" style="height: 100%; width:50%; display:flex; justify-content:center; align-items:center; margin-right:1%">
                 <img src="/views/login/image/profile.png" class="img-circle" width="100%" height="100%" > 
            </div>
            <div class="" style=" background-color: white; height: 100%; width: 50%; ">
                 <form action="controllers/login/check.login.controller.php" method="POST" style="width: 100%;">
                <?php if (isset($_SESSION['alert'])) { ?>
                    <?php
                            $alert = 'alert-danger';
                    ?>
                    <div class="alert <?= $alert ?>">
                        <h5><?= $_SESSION['alert'] ?></h5>
                    </div>
                <?php } ?> 
                    <div class="form-group" style="margin-top:7%; width: 90%; margin-left: auto; margin-right:auto;">
                        <input type="email" class="form-control" placeholder="Enter email" id="email" name="email" style="height: 10vh; font-size:large;" required />
                    </div>
                    <div class="input-group" style="width:90%;margin:auto; margin-top: 4%;">
                        <input class="form-control password" id="password" class="block mt-1 w-full" placeholder="Enter Password" type="password" name="password" value="" style="height: 10vh; font-size:large;" required />
                        <span class="input-group-text togglePassword" id="" style="margin-top: 3%;">
                            <i data-feather="eye" style="cursor: pointer;"></i>
                        </span>
                    </div>
                    <button type="submit" class="btn btn-primary hover-btn d-flex justify-content-center align-items-center" style="width: 40%; height:7vh; font-size: 20px; margin:auto; margin-top: 7%; ">Login</button>
                    <style>
                        .hover-btn:hover {
                            background-color: orange;
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
                        console.log(type);
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
                    <h6 class="" style="margin: auto;" >Reset Password</h6>
                </a>
            </div>
        </div>
    </div>
</div>