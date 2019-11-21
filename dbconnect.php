<?php
$servername = "localhost";
$username = "username";
$password = "password";

// Create connection
$conn = new mysqli("localhost", "php_ui", "php_ui", "publication_project_db");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>