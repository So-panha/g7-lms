<?php
require "database/database.php";
require "models/admin.model.php";
// Catch all admin
$allAdmin = getAdmin();

require "views/manages/manage.view.php";