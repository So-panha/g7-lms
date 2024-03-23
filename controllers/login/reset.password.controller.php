<?php
require '../../database/database.php';
require '../../models/login.model.php';

// Start session
session_start();

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
//Load Composer's autoloader
require '../../vendor/autoload.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!empty($_POST['email_confrim'])) {
        $isChecked = checkMail($_POST['email_confrim']);
        if ($isChecked) {
            $_SESSION['failed'] = 'success';
            $OTP = mt_rand(100000, 999999);
            $email = $_POST['email_confrim'];
            $_SESSION['email'] = $email;
            $setOPT = OPT($email, $OTP);

            // Send OPT to the user email
            // send to email by Gmail
            //Create an instance; passing `true` enables exceptions
            $mail = new PHPMailer(true);

            try {
                //Server settings
                $mail->isSMTP();  //Send using SMTP
                $mail->Host       = 'smtp.gmail.com'; //Set the SMTP server to send through
                $mail->SMTPAuth   = true; //Enable SMTP authentication
                $mail->Username = "johnchoan047@gmail.com"; //SMTP Username
                $mail->Password   = 'tjehlqvinosbzgkm';  //SMTP password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; //Enable implicit TLS encryption
                $mail->Port = 465;  //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

                //Recipients
                $mail->setFrom('johnchoan047@gmail.com', 'LMS System');
                $mail->addAddress($email,"user"); //Add a recipient

                // $mail->addAttachment('../../assets/document/Company List.xlsx', 'Company Name');    //Optional name
                // $mail->addAttachment('../../assets/images/testing_image.png', 'Image Test');    //Optional name

                //Content
                $mail->isHTML(true); //Set email format to HTML
                $mail->Subject = 'Here is the the link for login with your account';
                $mail->Body    = "<b>Dear User</b>
                <h3>We received a request to reset your password.</h3>
                <h3>So here is your verify OTP code is $OTP <br></h3
                <p>And you can also click the below link to reset your password</p>
                http://localhost/login-System/Login-System-main/reset_psw.php
                <br><br>
                <p>With regrads,</p>
                <b>Programming with Lam</b>";

                $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
                // Sent to the Gmail
                $mail->send();
                if (!$mail->send()) {
                ?>
                    <script>
                        alert("<?php echo "Register Failed, Invalid Email " ?>");
                    </script>
                <?php
                $_SESSION['failed'] = 'fail';
                header('location: /reset_password');
                } else {
                ?>
                    <script>
                        alert("<?php echo "Register Successfully, OTP sent to " . $email ?>");
                        window.location.replace('verification.controller.php');
                    </script>
                <?php
                 $_SESSION['failed'] = 'success';
                }
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }

            // // Back into to old place
            // header("Location:/admin_employees");
        }
        else {
            $_SESSION['failed'] = 'fail';
            header('location: /reset_password');
        }
    } 
    else {
        header('location: /reset_password');
    }
}
