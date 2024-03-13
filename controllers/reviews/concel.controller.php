<?php
// require data and model
require "../../database/database.php";
require "../../models/employee.model.php";

// Ask for request from server
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $leaveID = $_POST['leave'];
    cancelLeave($leaveID);
}
