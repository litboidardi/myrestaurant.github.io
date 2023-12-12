<?php
require_once 'database.php'; // Adjust the path accordingly
use lib\Database;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $db = new Database();
    $name = $_POST["comment-name"];
    $email = $_POST["comment-email"];
    $message = $_POST["comment"];
    // Additional validation can be added here
    $db->insertComment($name, $email, $message);
    header("Location: ../index.php");
    exit();
}
