<?php
require_once 'database.php';
use lib\Database;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $reservationId = trim($_POST["reservation-id"]);
    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $phone = trim($_POST["phone"]);
    $people = trim($_POST["people"]);
    $newDate = trim($_POST["date"]);
    $newTime = trim($_POST["time"]);
    $message = trim($_POST["message"]);

    if (empty($reservationId)) {
        echo "Invalid input. Reservation ID is required.";
        exit();
    }

    $database = new Database();

    if ($database->updateReservation($reservationId, $name, $email, $phone, $people, $newDate, $newTime, $message)) {
        echo "Reservation Updated Successfully";
        exit();
    } else {
        echo "Error updating reservation. Please try again.";
        exit();
    }
} else {
    echo "Invalid Request Method";
    exit();
}
?>

