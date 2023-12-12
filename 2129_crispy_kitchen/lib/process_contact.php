<?php

require_once 'database.php';
use lib\Database;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $db = new Database();
    $name = $_POST["contact-name"];
    $phone = $_POST["contact-phone"];
    $email = $_POST["contact-email"];
    $message = $_POST["contact-message"];
    // Additional validation can be added here
    $db->insertContact($name, $phone, $email, $message);
    header("Location: ../index.php");
    exit();
}