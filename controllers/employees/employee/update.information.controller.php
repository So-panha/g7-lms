<?php
session_start();
require '../../../database/database.php';
require '../../../models/admin.model.php';
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
    $place = $_POST['place'] ?? '';
    $newPwd = $_POST['newPwd'] ?? '';
    $oldPwd = $_POST['oldPwd'] ?? '';
    $manager = $_POST['manager'] ?? '';


    function cleanData($data)
    {
        $data = htmlspecialchars($data);
        $data = trim($data);
        return $data;
    }

    $fname = cleanData($fname);
    $lname = cleanData($lname);
    $password = cleanData($password);
    $email = cleanData($email);



    $_SESSION['user']['fname'] = $fname;
    $_SESSION['user']['lname'] = $lname;
    $_SESSION['user']['password'] = $password;
    $_SESSION['user']['email'] = $email;
    $_SESSION['user']['sendInvite'] = $sendInvite;
    $_SESSION['user']['gender'] = $gender;
    $_SESSION['user']['country'] = $country;
    $_SESSION['user']['role'] = $role;
    $_SESSION['user']['position_id'] = $position_id;
    $_SESSION['user']['place'] = $place;


    // Set new password
    if ($newPwd != '') {
        // Encrypt password
        $pwdEncript = password_hash($password, PASSWORD_BCRYPT);
        // Update but still keep old password
        // Update password
        updateOwnAcc($user_id, $fname, $lname, $pwdEncript, $email, $sendInvite, $gender, $country, $role, $position_id, $place, $manager);
        $_SESSION['update'] = 'Success';
        header('Location: /user_profile');
    } else {
        // Update password
        updateOwnAcc($user_id, $fname, $lname, $oldPwd, $email, $sendInvite, $gender, $country, $role, $position_id, $place, $manager);
        $_SESSION['update'] = 'Success';
        header('Location: /user_profile');
    }
} else {
    $_SESSION['update'] = 'Unsuccess';
    header('Location: /user_profile');
}
