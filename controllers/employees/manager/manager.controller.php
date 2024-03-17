<?php
require "database/database.php";
require "models/admin.model.php";
$users = getUsers();
// Get managers
$manager = managers();
// Get all type leave
$typeLeave = typeLeaves();
//id namaager
$manager_id = $_SESSION['user']['user_id'] ;
//get all employee request
$allRequests = memberRequest($manager_id);
//id user
$id = $_SESSION['user']['user_id'];
//get all respond
$responds = getChecked($id);
require 'views/employees/manager/manager.view.php';