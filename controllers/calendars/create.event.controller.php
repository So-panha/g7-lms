<?php
session_start();
require '../../database/database.php';
require '../../models/calendars.model.php';

// Retrieve the event data from the request
$title = $_POST['title'];
$start = $_POST['start'];
$end = $_POST['end'];
$category = $_POST['category'];

// Clean data
function protectScript($data)
{
    $fillData = htmlspecialchars($data);
    $fillData = trim($data);
    return $fillData;
}

// Datas have been clean
$eventName = protectScript($title);
$eventStart = protectScript($start);
$eventEnd = protectScript($end);
$category = protectScript($category);


// User id
$userId = $_SESSION['user']['user_id'];

// Put it into the models of the data
if (!empty($eventName) && !empty($eventStart) && !empty($eventEnd) && !empty($category)) {
    // insert evet data into databases
    CreateEvent($eventName, $eventStart, $eventEnd, $category, $userId);
}

