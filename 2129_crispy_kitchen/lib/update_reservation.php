<?php
require_once 'database.php';
use lib\Database;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $reservationId = trim($_POST["reservation-id"]);
    $newDate = trim($_POST["new-date"]);
    $newTime = trim($_POST["new-time"]);

    if (empty($reservationId) || empty($newDate) || empty($newTime)) {
        echo "Invalid input. Please fill in all fields.";
        exit();
    }

    $database = new Database();

    if ($database->updateReservation($reservationId, $newDate, $newTime)) {
        header("Location: admin.php");
        exit();
    } else {
        echo "Error updating reservation. Please try again.";
        exit();
    }
} else {
    header("Location: admin.php");
    exit();
}

