<?php
require 'database/database.php';
require 'models/admin.model.php';
// Call all managers
$managers = managers();
// Call all employee
$employees = getUsers();
require "views/companies/company.view.php";