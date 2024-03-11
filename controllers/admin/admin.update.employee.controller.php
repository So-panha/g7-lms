<?php
// Start session
session_start();
// Require data and model
require "../../database/database.php";
require "../../models/admin.model.php";
// catch data from POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (
        !empty($_POST['user_id'])
        && !empty($_POST['fname'])
        && !empty($_POST['lname'])
        && !empty($_POST['email'])
        && !empty($_POST['gender'])
        && !empty($_POST['country'])
        && !empty($_POST['role'])
        && !empty($_POST['position_id'])
        && !empty($_POST['place'])
    ) {
        // Set up variable
        $user_id = $_POST['user_id'];
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $newPwd = $_POST['password'];
        $oldPwd = $_POST['oldPwd'];
        $email = $_POST['email'];
        $sendInvite = $_POST['sendInvite'] ?? '';
        $gender = $_POST['gender'];
        $country = $_POST['country'];
        $role = $_POST['role'];
        $position_id = $_POST['position_id'];
        $amount = $_POST['amount'];
        $place = $_POST['place'];

        // Set new password
        if ($newPwd != '') {
            // Prepare password
            $password = htmlspecialchars($newPwd);
            $password = trim($password);
            // Encrpt password
            $pwdEncript = password_hash($password, PASSWORD_BCRYPT);
            // Update password
            updateEmployee($user_id, $fname, $lname, $pwdEncript, $email, $sendInvite, $gender, $country, $role, $position_id, $amount, $place);
            $_SESSION['update'] = 'Success';
            header('Location: /admin_employees');
            exit;
        } else {
            // Update but still keep old password
            updateEmployee($user_id, $fname, $lname, $oldPwd, $email, $sendInvite, $gender, $country, $role, $position_id, $amount, $place);
            $_SESSION['update'] = 'Success';
            header('Location: /admin_employees');
            exit;
        }
    }
    else{
        $_SESSION['update'] = 'Unsuccess';
        header('Location: /admin_employees');
    }
    
}