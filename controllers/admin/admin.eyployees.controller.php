<?php
require "database/database.php";
require "models/admin.model.php";
$users = getUsers();
$positions = getpositions();
require "views/admin/admin.eyployees.view.php";
