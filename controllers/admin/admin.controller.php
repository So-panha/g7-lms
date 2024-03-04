<?php
require "database/database.php";
require "models/admin.model.php";
// call function from database
$sumAmount = getAmount();
$users = getUsers();
// Get managers
$manager = managers();

// Get all manager

require "views/admin/admin.view.php";
