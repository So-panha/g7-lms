<?php
require "database/database.php";
require "models/admin.model.php";
// call function from database
// Get all users
$users = getUsers();
// Get managers
$manager = managers();
// Get all type leave
$typeLeave = typeLeaves();
//id user
$id = $_SESSION['user']['user_id'];
//get all respond
$responds = getChecked($id);
require 'views/employees/employee/employee.view.php';