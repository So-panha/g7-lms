<?php
require "../../database/database.php";
require "../../models/admin.model.php";
// catch data from POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (
        !empty($_POST['fname'])
        && !empty($_POST['lname'])
        && !empty($_POST['password'])
        && !empty($_POST['email'])
        && !empty($_POST['send_invite'])
        && !empty($_POST['gender'])
        && !empty($_POST['country'])
        && !empty($_POST['role'])
        && !empty($_POST['position'])
        && !empty($_POST['amount'])
        && !empty($_POST['place'])
        && !empty($_POST['manager'])
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
        $amount = $_POST['amount'];
        $place = $_POST['place'];
        $manager = $_POST['manager'];

        // Project Script javaScript
        $fname = htmlspecialchars($fname);
        $lname = htmlspecialchars($lname);
        $password = htmlspecialchars($password);
        $email = htmlspecialchars($email);
        $amount = htmlspecialchars($amount);

        // trim space data from form
        $fname = trim($fname);
        $Iname = trim($lname);
        $password = trim($password);
        $email = trim($email);
        $amount = trim($amount);

        // Encript password
        $pwdEncript = password_hash($password, PASSWORD_BCRYPT);

        // Insert employee data into the database
        $insert = insertEmployee($fname, $lname, $pwdEncript, $email, $sendInvite, $gender, $country, $role, $position_id, $amount, $place, $manager);

        if ($insert) {
            header("Location:/admin_employees");
        } else {
            echo "Failed to insert employee.";
        }
    }else{
        header("Location:/add_employee");
    }
}
