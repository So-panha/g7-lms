<?php
require '../../database/database.php';
require '../../models/calendars.model.php';

// Get query id from the url
$event_id = $_POST['event_id'];
$calEvent = $_POST['calEvent'];
// Call function model to edit event on the calendar
if(!empty($event_id) && !empty($calEvent)){
    editEvent($event_id,$calEvent);
}