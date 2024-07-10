<?php
// Connect to database
require_once 'db_connection.php'; {
    if (isset($_SESSION['loggedin'])) {
        session_unset(); // Unset session variables
        session_destroy(); // Destroy the session
        header("Location: index.php"); // Redirect to homepage
        echo "LOGIN ATTEMPTS: ", $_SESSION['loginAttempts'];
        exit;
    } else {
        // Redirect to welcome page
        header("Location: index.php");
    }

}