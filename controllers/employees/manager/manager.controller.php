<?php
require "database/database.php";
require "models//employee.model.php";

// Get all type leave
$typeLeave = typeLeaves();

//id namaager
$managerId = $_SESSION['user']['user_id'] ;

//get all employee request
$allRequests = memberRequest($managerId);

// Get members
$members = getMember($managerId);

//id user
$id = $_SESSION['user']['user_id'];

//get all respond
$responds = getChecked($id);

require 'views/employees/manager/manager.view.php';