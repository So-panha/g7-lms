<?php
require '../../database/database.php';
require '../../models/calendars.model.php';

$eventId = getEventId();
echo json_encode($eventId);