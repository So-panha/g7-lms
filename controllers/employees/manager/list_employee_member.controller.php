<?php
// require data

require 'database/database.php';
require 'models/employee.model.php';

// get all user
$users = getUsers();

// manage id
$managerId = $_SESSION['user']['user_id'];

// get all members
$allMembers = getMember($managerId); 

// call positons
$positions = getpositions();

// number of member
$numberOfMembers = count($allMembers);

// manager require
require 'views/employees/manager/list_employees_member.view.php';