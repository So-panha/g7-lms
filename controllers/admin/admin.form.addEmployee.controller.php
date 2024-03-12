<?php
require 'database/database.php';
require 'models/admin.model.php';
// Positions
$positions = positions();
// Managers
$managers = managers();

require 'views/admin/admin.form.addEmployee.view.php';
