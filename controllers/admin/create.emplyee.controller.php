<?php
require "../../database/database.php";
require "../../models/admin.model.php";

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
        && !empty($_POST['country'])
        && !empty($_POST['role'])
        && !empty($_POST['position'])
        && !empty($_POST['place'])
    ) {
        // Retrieve the values from the form
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        $sendInvite = isset($_POST['send_invite']) ? $_POST['send_invite'] : '';
        $gender = $_POST['gender'];
        $country = $_POST['country'];
        $role = $_POST['role'];
        $position_id = $_POST['position'];
        $place = $_POST['place'];
        // $manager = $_POST['manager'];
        $day_can_leave = 2;

        // Project Script javaScript
        $fname = htmlspecialchars($fname);
        $lname = htmlspecialchars($lname);
        $password = htmlspecialchars($password);
        $email = htmlspecialchars($email);

        // trim space data from form
        $fname = trim($fname);
        $Iname = trim($lname);
        $password = trim($password);
        $email = trim($email);

        // if account no have manager
        // if ($manager === null) {
        //     $manager = 0;
        // }
        $manager = 0;

        // Encript password
        $pwdEncript = password_hash($password, PASSWORD_BCRYPT);

        // Insert employee data into the database
        $insert = insertEmployee($fname, $lname, $pwdEncript, $email, $sendInvite, $gender, $country, $role, $position_id, $place, $manager,$day_can_leave);

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
            $mail->Port       = 465;  //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom('johnchoan047@gmail.com', 'LMS System');
            $mail->addAddress($email, $fname.' '.$Iname); //Add a recipient
        
            // $mail->addAttachment('../../assets/document/Company List.xlsx', 'Company Name');    //Optional name
            // $mail->addAttachment('../../assets/images/testing_image.png', 'Image Test');    //Optional name

            //Content
            $mail->isHTML(true); //Set email format to HTML
            $mail->Subject = 'Here is the the link for login with your account';
            $mail->Body    = "Link for go into login your account";
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
            // Sent to the Gmail
            $mail->send();
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }

        // Back into to old place
        if ($insert) {
            header("Location:/admin_employees");
        } else {
            echo "Failed to insert employee.";
        }
    } else {
        header("Location:/add_employee");
    }
}
