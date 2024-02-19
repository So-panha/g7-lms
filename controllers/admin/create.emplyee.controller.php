<?php
require "../../database/database.php";
require "../../models/admin.model.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the values from the form
    $fname = $_POST['fname'];
    $Iname = $_POST['Iname'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $sendInvite = isset($_POST['send_invite']) ? $_POST['send_invite'] : '';
    $gender = $_POST['gender'];
    $country = $_POST['country'];
    $role = $_POST['role'];
    $position = $_POST['position'];
    $amount = $_POST['amount'];
    $place = $_POST['place'];

    // Project Script javaScript
    $fname = htmlspecialchars($fname);
    $Iname = htmlspecialchars($Iname);
    $password = htmlspecialchars($password);
    $email = htmlspecialchars($email);
    $amount = htmlspecialchars($amount);

    // trim space data from form
    $fname = trim($fname);
    $Iname = trim($Iname);
    $password = trim($password);
    $email = trim($email);
    $amount = trim($amount);

    // Encript password
    $pwdEncript = password_hash($password,PASSWORD_BCRYPT);

    // Insert employee data into the database
    $insert = insertEmployee($fname, $Iname, $pwdEncript, $email, $sendInvite, $gender, $country, $role, $position, $amount, $place);

    // Echo the captured values
    echo "First Name: " . $fname . "<br>";
    echo "Last Name: " . $Iname . "<br>";
    echo "Password: " . $pwdEncript . "<br>";
    echo "Email: " . $email . "<br>";
    echo "Send Invite: " . $sendInvite . "<br>";
    echo "Gender: " . $gender . "<br>";
    echo "Country: " . $country . "<br>";
    echo "Role: " . $role . "<br>";
    echo "Position: " . $position . "<br>";
    echo "Amount: " . $amount . "<br>";
    echo "Place: " . $place . "<br>";
}