<?php
session_start();
require '../../database/database.php';
require '../../models/employee.model.php';

// Catch manager's id
$managerId = $_SESSION['user']['user_id'];

// Get all employees request leave relate with manager
$members = alertMessage($managerId);

// Count numbers of request and convert it into the notification
echo json_encode(count($members));

