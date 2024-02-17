<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $sendInvite = isset($_POST['send_invite']) ? $_POST['send_invite'] : '';
    $country = $_POST['country'];
    $role = $_POST['role'];
    $position = $_POST['position'];
    $amount = $_POST['amount'];
    $place = $_POST['place'];

    echo "First Name: " . $fname . "<br>";
    echo "Last Name: " . $lname . "<br>";
    echo "Email: " . $email . "<br>";
    echo "Send Invite: " . $sendInvite . "<br>";
    echo "Country: " . $country . "<br>";
    echo "Role: " . $role . "<br>";
    echo "Position: " . $position . "<br>";
    echo "Amount: " . $amount . "<br>";
    echo "Place: " . $place . "<br>";
}