<?php
require "database/database.php";
require "models/admin.model.php";
$sumAmount = getAmount();
$users = getUsers();
// Get managers
$manager = managers();
// Get all type leave
$typeLeave = typeLeaves();
require 'views/employees/manager/manager.view.php';