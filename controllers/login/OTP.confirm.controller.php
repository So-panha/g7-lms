<?php
require '../../database/database.php';
require '../../models/login.model.php';

// Start session
session_start();

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(!empty($_POST['OTP'])){
        $OTP = $_POST['OTP'];
        $OTP = htmlspecialchars($OTP);
        $OTP = trim($OTP);
        $isConfirm = confirmOTP($OTP);
        if($isConfirm){
            $_SESSION['failed'] = 'success';
            require '../../views/login/change.pwd.view.php';
        }
        else{
            $_SESSION['failed'] = 'fail';
            header('location: /controllers/login/verification.controller.php');
        }
    }
}