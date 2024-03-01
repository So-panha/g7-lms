<?php
require "../../database/database.php";
require "../../models/employee.model.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["approved"])) {
        $approvedValue = $_POST["approved"];
        $user_id = $_POST["user_id"];

        echo "Approved value: " . $approvedValue;
        echo "user id: " . $user_id;
        $reaction= reactions($approvedValue,$user_id);
    } elseif (isset($_POST["rejected"])) {
        $rejectedValue = $_POST["rejected"];
        $user_id = $_POST["user_id"];

        echo "Rejected value: " . $rejectedValue;
        echo "user id: " . $user_id;
        $reaction= reactions($approvedValue,$user_id);
    }
}
?>