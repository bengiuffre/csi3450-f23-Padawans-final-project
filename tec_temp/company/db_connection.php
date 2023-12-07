<?php
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "tec_temp_employment";

// Server connection
$conn = new mysqli($servername, $username, $password, $dbname);

// If connection fails
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
