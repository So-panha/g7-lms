<?php
require "database/database.php";
require "models/reports.model.php";
// compare id and call functiono
$id = $_GET['id'] ? $_GET['id'] : null;
$users = employeeLeave($id);
$typeLeave = typeLeave();
require "views/reports/detail.report.view.php";