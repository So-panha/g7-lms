<?php
require "database/database.php";
require "models/employee.model.php";
$historyRequest = getHistoryRequest();
require "views/history/history.view.php";