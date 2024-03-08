<?php
require "database/database.php";
require "models/admin.model.php";
// call function from database

// Get all type leave
$typeLeave = typeLeaves();
require 'views/employees/manager/manager.view.php';