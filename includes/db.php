<?php
// Database connection
$host = 'localhost';
$db = 'inventorysystem'; // Database name
$user = 'root';
$pass = '';

$conn = new mysqli($host, $user, $pass, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
 