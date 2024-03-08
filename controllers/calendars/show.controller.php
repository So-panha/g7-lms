<?php
require '../../database/database.php';
require '../../models/calendars.model.php';

$allEvent = events();
echo json_encode($allEvent);