<?php
require "../../database/database.php";
require "../../models/employee.model.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["approved"])) {
        $approvedValue = $_POST["approved"];
        $leave_id = $_POST["leave_id"];

        $reaction= reactions($approvedValue,$leave_id);
        header('Location:/view_alert');
    } elseif (isset($_POST["rejected"])) {
        $rejectedValue = $_POST["rejected"];
        $leave_id = $_POST["leave_id"];

        $reaction= reactions($rejectedValue,$leave_id);
        header('Location:/view_alert');
    }
}
?>