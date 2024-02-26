<?php
require '../../database/database.php';
require '../../models/admin.model.php';
$datas = getPosition();
echo json_encode($datas);

