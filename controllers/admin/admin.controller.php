<?php
require "database/database.php";
require "models/admin.model.php";
$sumAmount = getAmount();
$users = getUsers();
require "views/admin/admin.view.php";
