<?php
// request data and model function
require 'database/database.php';
require 'models/admin.model.php';
// compare id with id 
$user_id = $_GET['id'] ? $_GET['id'] : null;
$users = getUser($user_id);
// request file view edit
// Managers
$managers = managers();
require "views/admin/admin.edit.employee.view.php";
