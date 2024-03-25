<?php
require '../../database/database.php';
require '../../models/login.model.php';
// Start session
session_start();
$test = '';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(!empty($_POST['new_password']) && !empty($_POST['confirm_password'])){
        $newPwd = $_POST['new_password'];
        $confirmPwd = $_POST['confirm_password'];
        $email = $_SESSION['email'];
        $isMatch = 0;

        // Check script
        function cleanData($data){
            $data = htmlspecialchars($data);
            $data = trim($data);
            return $data;
        }

        $cleanNewPwd = cleanData($newPwd);
        $cleanConfirmPwd = cleanData($confirmPwd);

        echo strlen($cleanNewPwd);
        echo strlen($cleanConfirmPwd);

        // Check Pasword
        if(strlen($cleanNewPwd) == strlen($cleanConfirmPwd)){
            for($i = 0; $i < strlen($newPwd); $i++){
                if($cleanNewPwd[$i] == $cleanConfirmPwd[$i]){
                    $isMatch += 1;
                };
            }

            // Change if it stay with true condition
            if($isMatch == strlen($cleanNewPwd)){

                // Encrypt password 
                $pwdEncrypt = password_hash($cleanNewPwd,PASSWORD_BCRYPT);

                // Cnange password
                changePwd($pwdEncrypt,$email);

                // Back to your account for login
                header('location: /login');
                $_SESSION['failed'] = 'success';
            }else{
                $_SESSION['failed'] = 'fail';
                $test = 'fail';
                header('location: /views/login/change.pwd.view.php');
            }
        }else{
            $_SESSION['failed'] = 'fail';
            header('location: /views/login/change.pwd.view.php');
        }
    }else{
        $_SESSION['failed'] = 'fail';
        header('location: /views/login/change.pwd.view.php');
    }
}