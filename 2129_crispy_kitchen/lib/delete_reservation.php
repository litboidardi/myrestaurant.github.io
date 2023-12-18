<?php
// delete_reservation.php

require_once 'database.php'; // Adjust the path accordingly
use lib\Database;

if (isset($_GET['id'])) {
    $reservationId = $_GET['id'];
    $db = new Database();
    $db->deleteReservation($reservationId);
}
