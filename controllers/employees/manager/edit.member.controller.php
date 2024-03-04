<?php
// include databases
require 'database/database.php';
// include model of employee
require 'models/employee.model.php';

// catch data form the id of the memebr
$memberId = $_GET['id'];
// echo $memberId;

// Call the member who match with the id
$member = inforOfMember($memberId);


// request file view edit
require 'views/employees/manager/edit.member.view.php';
