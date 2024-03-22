<?php
require '../../database/database.php';
require '../../models/calendars.model.php';

// Get query id from the url
$event_id = $_POST['event_id'];
$calEvent = $_POST['calEvent'];
$eventStart = $_POST['start'];
$eventEnd = $_POST['end'];
// Call function model to edit event on the calendar
if(!empty($event_id) && !empty($calEvent) && !empty($calEvent) && !empty($calEvent)){
    editEvent($event_id,$calEvent,$eventStart,$eventEnd);
}
