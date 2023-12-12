<?php

require_once 'database.php';
use lib\Database;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $db = new Database();
    // Collect form data
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $people = $_POST["people"];
    $date = $_POST["date"];
    $time = $_POST["time"];
    $message = $_POST["message"];
    // Insert reservation into the database
    $db->insertReservation($name, $email, $phone, $people, $date, $time, $message);
    if( $_POST )
            echo "<script type='text/javascript'>alert('Thank you for your reservation!')</script>";
        else
            echo "<script type='text/javascript'>alert('Reservation failed!')</script>";
    header("Location: ../index.php");
    exit();
}