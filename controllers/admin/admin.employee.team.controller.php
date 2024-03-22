<?php
// Require data
require 'database/database.php';
require 'models/admin.model.php';

// Get all manager
$mangers = managers();

// Require view of page
require "views/admin/admin.employee.team.view.php";