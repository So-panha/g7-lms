<?php
require "../../database/database.php";
require "../../models/admin.model.php";

// Start session
session_start();

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
//Load Composer's autoloader
require '../../vendor/autoload.php';


// catch data from POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (
        !empty($_POST['fname'])
        && !empty($_POST['lname'])
        && !empty($_POST['password'])
        && !empty($_POST['email'])
        && !empty($_POST['gender'])
        && !empty($_POST['role'])
        && !empty($_POST['department'])
        && !empty($_POST['position'])
    ) {
        // Retrieve the values from the form
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        $sendInvite = isset($_POST['send_invite']) ? $_POST['send_invite'] : '';
        $gender = $_POST['gender'];
        $role = $_POST['role'];
        $depament_id = $_POST['department'];
        $position = $_POST['position'];
        $manager = $_POST['manager'];
        $day_can_leave = 2;

        // Project Script javaScript
        $fname = htmlspecialchars($fname);
        $lname = htmlspecialchars($lname);
        $password = htmlspecialchars($password);
        $email = htmlspecialchars($email);
        $position = htmlspecialchars($position);

        // trim space data from form
        $fname = trim($fname);
        $Iname = trim($lname);
        $password = trim($password);
        $email = trim($email);
        $position = trim($position);

        // if account no have manager
        if ($manager === null) {
            $manager = 0;
        }
        // $manager = 0;
        if ($gender == "Male") {
            $picture = "man.png";
        } else {
            $picture = "female.jpg";
        }

        // Encript password
        $pwdEncript = password_hash($password, PASSWORD_BCRYPT);

        // Check acount already has or not
        $isHasAcc = checkAcc($email);
        
        // Insert employee data into the database
        if(!$isHasAcc){
            $insert = insertEmployee($fname, $lname, $pwdEncript, $email, $sendInvite, $gender, $role, $depament_id, $manager, $day_can_leave, $picture,$position);

            // send to email by Gmail
            //Create an instance; passing `true` enables exceptions
            if ($_POST['send_invite'] == true) {
                $mail = new PHPMailer(true);
    
                try {
                    //Server settings
                    $mail->isSMTP();  //Send using SMTP
                    $mail->Host       = 'smtp.gmail.com'; //Set the SMTP server to send through
                    $mail->SMTPAuth   = true; //Enable SMTP authentication
                    $mail->Username = "Sopanha0328@gmail.com"; //SMTP Username
                    $mail->Password   = 'oqkk yndz lmin mmkd';  //SMTP password
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; //Enable implicit TLS encryption
                    $mail->Port       = 465;  //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    
                    //Recipients
                    $mail->setFrom('Sopanha0328@gmail.com', 'LMS System');
                    $mail->addAddress($email, $fname . ' ' . $Iname); //Add a recipient
    
                    //Content
                    $mail->isHTML(true); //Set email format to HTML
                    $mail->Subject = 'Here is the the link for login with your account';
                    $mail->Body    = "Link for go into login your account please Click link to login your account";
                    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
                    // Sent to the Gmail
                    $mail->send();
                    echo 'Message has been sent';
                } catch (Exception $e) {
                    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                }
                $_SESSION['createNew'] = 'done';
            }
            // Back into to old place
            if ($insert) {
                header("Location:/admin_employees");
                $_SESSION['createNew'] = 'done';
            } else {
                echo "Failed to insert employee.";
                $_SESSION['createNew'] = 'notDone';
            }
        }else {
            $_SESSION['createNew'] = 'notDone';
            header("Location:/add_employee");
        }
    } else {
        header("Location:/add_employee");
    }
}
