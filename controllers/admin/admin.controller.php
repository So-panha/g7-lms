<?php
require "database/database.php";
require "models/admin.model.php";
// call function from database

// Get all user
$users = getUsers();
// Get managers
$manager = managers();

// Get all manager
$typeLeave = typeLeaves();

require "views/admin/admin.view.php";
