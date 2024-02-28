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
    $user_id = $_POST['user_id'];

    //call function insert request leave
    $insert = insertLeaveRequest($leaveType, $from, $to, $checked, $reason, $user_id);
    header('Location:/leaves');
}