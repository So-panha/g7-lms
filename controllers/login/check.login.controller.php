<?php
session_start();
require '../../database/database.php';
require '../../models/login.model.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!empty($_POST['email']) && !empty($_POST['password'])) {
        // protect query of injection
        $email = htmlspecialchars($_POST['email']);
        $pwd = htmlspecialchars($_POST['password']);

        echo $email;
        echo $pwd;

        // Password encrytion
        $password = password_hash($pwd, PASSWORD_BCRYPT);

        // Get user
        $user = checkUser($email);

        // if match user in data
        if (count($user) > 0) {
            
            // user password
            $userPwd = $user[3];

            // compare password in data of user with password encrytion
            if (password_verify($userPwd, $password)) {
                header('location: /admin');
                $_SESSION['user'] = $user;
            }
        }else {
            echo 'Invalid password.';
        }
    }else{
        require '../../views/errors/404.php';
    }
}
?>