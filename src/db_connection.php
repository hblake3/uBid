<?php

// Start session
session_start();

// Configure database
$host = 'localhost'; // host
$dbUsername = 'root'; // username (default)
$dbPassword = ''; // password (empty)
$dbName = 'ubid'; // name

// Create new MySQLi instance for database connection
$conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}




/*
session_start();

// Configure database
$host = 'mysql'; // Docker service name
$dbUsername = 'root'; // MySQL username
$dbPassword = ''; // MySQL password (if any)
$dbName = 'ubid'; // MySQL database name
$dbPort = 3306; // MySQL port

// Create new MySQLi instance for database connection
$conn = new mysqli($host, $dbUsername, $dbPassword, $dbName, $dbPort);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} */
?>