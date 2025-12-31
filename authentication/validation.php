<?php
$host = 'localhost'; // your host
$dbname = 'galaxy_academy';
$username = 'root'; // your DB username
$password = '';     // your DB password

// Create MySQLi connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
