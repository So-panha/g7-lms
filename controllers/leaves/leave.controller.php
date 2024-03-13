<?php
require 'database/database.php';
require 'models/employee.model.php';

// Catch manager's id
$managerId = $_SESSION['user']['user_id'];

// users
$user = $_SESSION['user'];
// users
$users = getUser($user['user_id']);

// Get all employees request leave relate with manager
$members = alertMessage($managerId);
$members_request = memberRequest($managerId);

require "views/leaves/leave.view.php";
