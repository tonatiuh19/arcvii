<?php
$servername = "mx50.hostgator.mx";
$username = "alanchat_admin";
$password = "tonatiuh19";
$dbname = "alanchat_arc";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>
