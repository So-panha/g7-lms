<?php

require "database/database.php";
require "models/employee.model.php";

// get id
$employeeId = $_SESSION['user']['user_id'];

// get data
$personalHistoryRequest = personalHistoryOfRequest($employeeId);
// get type_leave_request
$typeRequests = getTypeRequest();

require "views/reviews/review.view.php";