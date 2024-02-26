<?php
require "database/database.php";
require "models/admin.model.php";
// call function from database
$sumAmount = getAmount();
$users = getUsers();
require "views/admin/admin.view.php";
