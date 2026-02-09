<?php
$servername = "localhost";
$username = "root";  // Change if your database has a different username
$password = "";      // Add your database password if needed
$dbname = "voxel_vault";  // Your database name

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
