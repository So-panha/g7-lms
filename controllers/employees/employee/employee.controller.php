<?php
require "database/database.php";
require "models/employee.model.php";
// Start session
$managerId = $_SESSION['user']['manager'];

// Get members
$members = getMember($managerId);

//id user
$id = $_SESSION['user']['user_id'];
//get all respond
$responds = getChecked($id);
require 'views/employees/employee/employee.view.php';