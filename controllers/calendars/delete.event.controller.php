<?php
require '../../database/database.php';
require '../../models/calendars.model.php';
// Get query id from the url
$event_id = $_POST['event_id'];
// Call function model to delete event on the calendar
if(!empty($event_id)){
    deleteEvent($event_id);
}