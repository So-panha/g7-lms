<?php
require 'database/database.php';
require 'models/employee.model.php';

$type_requests = getTypeRequest();
$users = getUsers();
$user = $_SESSION['user'];
$manager_id = $user['user_id'];
$requests = requestLeave($manager_id);
require "views/leaves/leave.view.php";
