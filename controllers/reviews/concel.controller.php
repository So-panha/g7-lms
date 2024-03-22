<?php
// Call session
session_start();
// require data and model
require "../../database/database.php";
require "../../models/employee.model.php";

// Ask for request from server
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    // Catch data from cancel btn
    $leaveID = $_POST['leave'];
    $dayLeave = $_POST['backDay'];
    // Catch id from user
    $userId = $_SESSION['user']['user_id'];

    // Call model of user to get the total leave and the day taken of a user
    $user = getUser($userId);

    // Get the total day of that user can leave and the total day that user has taken
    $totalCanLeave = $user['day_can_leave'];
    $tatalTaken = $user['taken'];

    // // Set the total day of that user can leave and the total day that user has taken
    $newTotalCanLeave = $totalCanLeave +  $dayLeave;
    $newTatalTaken =   $tatalTaken - $dayLeave;

    // Call model button cancel
    cancelLeave($leaveID);
    // Remove day leave when you cancel
    removeDayLeave($newTotalCanLeave,$newTatalTaken,$userId);
}
