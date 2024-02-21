<?php
require '../../database/database.php';
$user_id = $_GET['id'] ? $_GET['id'] : null;
if (isset($user_id))
{
    require '../../models/admin.model.php';
    deleteuser($user_id);
    header('Location: /admin_employees');
}