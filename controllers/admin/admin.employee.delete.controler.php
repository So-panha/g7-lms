<?php
require '../../database/database.php';
// compare id for catch information
$user_id = $_GET['id'] ? $_GET['id'] : null;
if (isset($user_id)) {
    require '../../models/admin.model.php';
    deleteuser($user_id);
    header('Location: /admin_employees');
}
