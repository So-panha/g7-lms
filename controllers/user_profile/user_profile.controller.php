<?php
require 'database/database.php';
// require 'models/admin.model.php';
require 'models/employee.model.php';

$positions = getpositions();

require 'views/user_profile/user_profile.view.php';