<?php
require "../../database/database.php";
require "../../models/admin.model.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the values from the form
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $sendInvite = isset($_POST['send_invite']) ? $_POST['send_invite'] : '';
    $gender = $_POST['gender'];
    $country = $_POST['country'];
    $role = $_POST['role'];
    $position = $_POST['position'];
    $amount = $_POST['amount'];
    $place = $_POST['place'];

    // Insert employee data into the database
    $insert = insertEmployee($fname, $lname, $password, $email, $sendInvite, $gender, $country, $role, $position, $amount, $place);

    echo "First Name: " . $fname . "<br>";
    echo "Last Name: " . $lname . "<br>";
    echo "Password: " . $password . "<br>";
    echo "Email: " . $email . "<br>";
    echo "Send Invite: " . $sendInvite . "<br>";
    echo "Gender: " . $gender . "<br>";
    echo "Country: " . $country . "<br>";
    echo "Role: " . $role . "<br>";
    echo "Position: " . $position . "<br>";
    echo "Amount: " . $amount . "<br>";
    echo "Place: " . $place . "<br>";
}