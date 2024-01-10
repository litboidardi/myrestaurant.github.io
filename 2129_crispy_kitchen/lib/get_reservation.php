<?php
require_once 'database.php';
use lib\Database;
header('Content-Type: application/json');

$database = new Database(); // Vytvorenie inštancie vašej databázovej triedy

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $userId = $_GET['id']; // Presunuté z 'reservationId' na 'userId', pretože vaša funkcia očakáva 'userId'

    if (empty($userId)) {
        echo json_encode(["error" => "No user ID provided"]);
        exit();
    }

    $reservationData = $database->getReservationById($userId);

    if ($reservationData) {
        echo json_encode($reservationData); // Vráti údaje rezervácie ako JSON
    } else {
        echo json_encode(["error" => "Reservation not found"]);
    }
} else {
    echo json_encode(["error" => "Invalid Request Method"]);
}
?>