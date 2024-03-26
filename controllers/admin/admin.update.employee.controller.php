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
        && !empty($_POST['role'])
        && !empty($_POST['department'])
        && !empty($_POST['position'])
        // && !empty($_POST['department'])
    ) {
        // Set up variable
        $user_id = $_POST['user_id'];
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $newPwd = $_POST['password'];
        $oldPwd = $_POST['oldPwd'];
        $email = $_POST['email'];
        $gender = $_POST['gender'];
        $role = $_POST['role'];
        $position_id = $_POST['department'];
        $position_name = $_POST['position'];
        $manager = $_POST['manager'];
        $oldManager = $_POST['oldmanager'];
        $picture = '';
        // $department = $_POST['department'];

        // Set new password
        if ($newPwd != '') {

            function prepare($data){
                // Prepare password
                $data = trim($data);
                $data = htmlspecialchars($data);
                return $data;
            }
            $newPwd = prepare($data);
            $email = prepare($email);
            $fname = prepare($data);
            $lname = prepare($data);
            $position_name = prepare($data);


            // Encrpt password
            $pwdEncript = password_hash($password, PASSWORD_BCRYPT);

            if ($manager != '') {
                // Update password
                updateEmployee($user_id, $fname, $lname, $pwdEncript, $email, $gender, $country, $role, $position_id, $place, $manager, $position_name);
                $_SESSION['update'] = 'Success';
                header('Location: /admin_employees');
                exit;
            } else {
                // Update password
                updateEmployee($user_id, $fname, $lname, $pwdEncript, $email, $gender, $role, $position_id, $oldManager, $position_name);
                $_SESSION['update'] = 'Success';
                header('Location: /admin_employees');
                exit;
            }
        } else {
            // Update but still keep old password
            if ($manager != '') {
                // Update password
                updateEmployee($user_id, $fname, $lname, $oldPwd, $email, $gender, $role, $position_id, $manager, $position_name);
                $_SESSION['update'] = 'Success';
                header('Location: /admin_employees');
            } elseif ($oldPwd != '') {
                // Update password
                updateEmployee($user_id, $fname, $lname, $oldPwd, $email, $gender, $role, $position_id, $oldManager, $position_name);
                $_SESSION['update'] = 'Success';
                header('Location: /admin_employees');
            } else {
                updateHeaderManager($user_id, $fname, $lname, $oldPwd, $email, $gender, $role, $position_id, $position_name);
                $_SESSION['update'] = 'Success';
                header('Location: /admin_employees');
            }
        }
    } else {
        $_SESSION['update'] = 'Unsuccess';
        header('Location: /admin_employees');
    }
}
