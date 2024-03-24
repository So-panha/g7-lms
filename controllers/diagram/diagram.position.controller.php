<?php
require '../../database/database.php';
require '../../models/admin.model.php';

// Catch all positions
$datas = getPosition();
echo json_encode($datas);

// // Catch all leave 
// $dataLeave = totalLeave();
// echo json_encode($dataLeave);

