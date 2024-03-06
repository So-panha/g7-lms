<?php
session_start();

require '../../database/database.php';
require '../../models/addPicture.model.php';
$_POST['image'] = $_FILES['image'];
if ($_FILES['image']) {
    $userID = $_SESSION['user']['user_id'];
    $imgProfile = $_FILES['image'];
}
// Image upload
$directory = "../../assets/images/profiles/";
$target_file = $directory . '.' . basename($_FILES['image']['name']);
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
$checkImageSize = getimagesize($_FILES["image"]["tmp_name"]);
if ($checkImageSize) {
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
        $_SESSION['error'] = "Wrong Image extension!";
        header('Location: /user_profile');
    } else {

        $imageExtension = explode('.', $target_file)[6];
        $newFileName = uniqid();
        $nameInDirectory = $directory . $newFileName . '.' . $imageExtension;
        $nameInDB = $newFileName . '.' . $imageExtension;

        $_SESSION['user']['picture'] = $nameInDB;

        move_uploaded_file($_FILES["image"]["tmp_name"], $nameInDirectory);
        addPicture($userID, $nameInDB);
        header('location: /user_profile');
        $_SESSION['success'] = "Account successfully created";
    }

} else {
    $_SESSION['error'] = "Not Image file!";
    header('location: /user_profile');
}
