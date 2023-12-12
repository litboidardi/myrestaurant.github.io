<?php
require_once 'database.php'; // Adjust the path accordingly
session_start();
use lib\Database;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize user input
    $username = trim($_POST["register-username"]);
    $password = trim($_POST["register-password"]);
    // Perform validation and user registration
    $database = new Database(); // Update with your actual Database class instantiation
    // Check if the username already exists
    if ($database->getUserByUsername($username)) {
        $_SESSION['register_error'] = "Username already exists!";
        header("Location: ../2129_crispy_kitchen/admin.php");
        exit();
    }
    // Register the user
    if ($database->registerAdmin($username, $password)) {
        $_SESSION['registration_success'] = "Registration successful! You can now log in.";
    } else {
        $_SESSION['register_error'] = "Registration failed. Please try again.";
    }
    header("Location: ../2129_crispy_kitchen/admin.php");
    exit();
}
