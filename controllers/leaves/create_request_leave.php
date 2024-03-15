<?php
session_start();
require '../../database/database.php';
require '../../models/employee.model.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the values from the form
    $leaveType = $_POST['leaveType'];
    $from = $_POST['from'];
    $to = $_POST['to'];
    $halfDay = $_POST['halfDay'];
    $reason = $_POST['reason'];
    $checked = "Pending";
    $date_request = $_POST['date'];
    $user_id = $_POST['user_id'];
    $day = $_POST['day'];

    // Convert dates to DateTime objects
    $dateFrom = DateTime::createFromFormat('d/m/Y', $from);
    $dateTo = DateTime::createFromFormat('d/m/Y', $to);

    // Get the timestamps from DateTime objects
    $timestampFrom = $dateFrom->getTimestamp();
    $timestampTo = $dateTo->getTimestamp();

    // Calculate the difference in days
    $dayDifference = floor(($timestampTo - $timestampFrom) / (60 * 60 * 24));
    $dayRemind = $day - $dayDifference;
    //taken
    $taken += $dayDifference;
    
    // Check if the 'to' date is earlier than the 'from' date
    if ($timestampTo < $timestampFrom) {
        //session alert for request leave error 
        $_SESSION['leave'] ='Unsuccess'; 
        header('Location: /leaves');
    } else {

        // Call the insertLeaveRequest function
        $insert = insertLeaveRequest($leaveType, $from, $to, $checked, $reason, $date_request, $user_id);
        $days = days($dayRemind,$user_id);
        $taken = taken($taken,$user_id);

        // Check if the leave request was successfully inserted
        if ($insert) {
            // session alert when request successfully
            $_SESSION['leave'] = 'Success';
            header('Location: /leaves');
            exit;
        }
    }
}
