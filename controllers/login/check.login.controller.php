<?php
// require pages
session_start();
require '../../database/database.php';
require '../../models/login.model.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!empty($_POST['email']) && !empty($_POST['password'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        // Protect script javaScrip
        $email = htmlspecialchars($email);
        $password = htmlspecialchars($password);

        // Trim space from data input
        $email = trim($email);
        $password = trim($password);

        // Check match user
        $user = checkUser($email);

        if ($user) {
            // check password user in encript form
            if (password_verify($password, $user[3])) {
                $_SESSION['user'] = $user;
                header('location: /');
                // alert when success in login
                $_SESSION['alert'] = 'Success!';
            } else {
                // alert when password is wrong
                header('location: /login');
                $_SESSION['pwd'] = 'wrongPwd';
            }
        } else {
            // alert when email is wrong
            header('location: /login');
            $_SESSION['email'] = 'wrongEmail';
        };
    } elseif (empty($_POST['email'])) {
        // alert when no have Email
        header('location: /login');
        $_SESSION['alert'] = 'Email is required!';
    } elseif (empty($_POST['password'])) {
        // alert when no have password
        header('location: /login');
        $_SESSION['alert'] = 'Password is required!';
    }
}
