<?php
require "database/database.php";
require "models/admin.model.php";
// call function from database
$sumAmount = getAmount();
$users = getUsers();
// Get managers
$manager = managers();
// Get all type leave
$typeLeave = typeLeaves();
require 'views/employees/employee/employee.view.php';