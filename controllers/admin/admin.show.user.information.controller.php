<?php
require 'database/database.php';
require 'models/admin.model.php';
$user_id = $_GET['id'] ? $_GET['id'] : null;
$users = getUser($user_id);
$position=getpositions();
$allusers = getUsers();
require "views/admin/admin.show.user.information.view.php";