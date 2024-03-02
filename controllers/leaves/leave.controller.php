<?php
require 'database/database.php';
require 'models/employee.model.php';

// Catch manager's id
$managerId = $_SESSION['user']['user_id'];

// Get all employees request leave relate with manager
$members = alertMessage($managerId);

$type_requests = getTypeRequest();
$users = getUsers();
$user = $_SESSION['user'];
$manager_id = $user['user_id'];
$requests = requestLeave($manager_id);
require "views/leaves/leave.view.php";
