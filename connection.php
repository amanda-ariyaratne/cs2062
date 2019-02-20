<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "cs2062";

// Create connection
$con = new mysqli($servername, $username, $password, $database);

// Check connection
if ($con->connect_error) {
    die("Failed to connect: " . $conn->connect_error);
} 
echo "Successfully Connected!";
?>