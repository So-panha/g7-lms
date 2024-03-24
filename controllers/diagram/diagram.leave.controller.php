<?php
require '../../database/database.php';
require '../../models/admin.model.php';

// // Catch all leave 
$dataLeave = totalLeave();
echo json_encode($dataLeave);

