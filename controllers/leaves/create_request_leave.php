<?php
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

echo $date_request;
    // Call the insertLeaveRequest function
    $insert = insertLeaveRequest($leaveType, $from, $to, $checked, $reason, $date_request, $user_id);

    // Check if the leave request was successfully inserted
    if ($insert) {
        header('Location: /leaves');
        exit;
    } else {
        echo "Failed to insert leave request.";
    }
}