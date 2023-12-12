<?php
require_once 'database.php';
session_start();
use lib\Database;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize user input
    $username = trim($_POST["login-username"]);
    $password = trim($_POST["login-password"]);
    // Perform validation and authentication
    $database = new Database(); // Update with your actual Database class instantiation
    // Validate the login
    if ($database->validateLogin($username, $password)) {
        // Authentication successful, redirect to admin.php
        $_SESSION['username'] = $username; // Store username in the session
        header("Location: ../2129_crispy_kitchen/admin.php");
    } else {
        // Authentication failed, set error message
        $_SESSION['login_error'] = "Incorrect credentials!";
    }
    exit();
}