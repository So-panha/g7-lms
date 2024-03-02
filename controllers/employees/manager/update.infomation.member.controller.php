<?php
require '../../../database/database.php';
// catch data from POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_id = $_POST['user_id'] ?? '';
    $fname = $_POST['fname'] ?? '';
    $lname = $_POST['lname'] ?? '';
    $password = $_POST['password'] ?? '';
    $email = $_POST['email'] ?? '';
    $sendInvite = $_POST['sendInvite'] ?? '';
    $gender = $_POST['gender'] ?? '';
    $country = $_POST['country'] ?? '';
    $role = $_POST['role'] ?? '';
    $position_id = $_POST['position_id'] ?? '';
    $amount = $_POST['amount'] ?? '';
    $place = $_POST['place'] ?? '';
    $pwdEncript = password_hash($password, PASSWORD_BCRYPT);
    require '../../../models/admin.model.php';

    updateEmployee($user_id, $fname, $lname, $pwdEncript, $email, $sendInvite, $gender, $country, $role, $position_id, $amount, $place);
    header('Location: /members');
    exit;
}

