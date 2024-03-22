<?php
require "database/database.php";
require "models/reports.model.php";
//
$employees = employee();
require "views/reports/report.view.php";