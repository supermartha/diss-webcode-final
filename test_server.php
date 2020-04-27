<?php
$servername = "localhost";
$username = "root";
//$password = "password";

// Create connection
$conn = new mysql($servername, $username);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully";
?>