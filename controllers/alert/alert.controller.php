<?php
// include file database and model
require 'database/database.php';
require 'models/employee.model.php';
// Catch manager's id
$managerId = $_SESSION['user']['user_id'];

// Get all employees request leave relate with manager
$members = alertMessage($managerId);

// include file for view message of the request leave
require 'views/alert/alertForm.view.php';