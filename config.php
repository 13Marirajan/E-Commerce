<?php
$host = "localhost";
$user = "root";  // Default XAMPP username
$password = "";  // Leave empty (default)
$database = "project"; // Your database name

$conn = new mysqli($host, $user, $password, $database);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
