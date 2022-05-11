<?php
$servername = "127.0.0.1:3307";
$username = "dung";
$userpassword = "anhdung0403";
$dbname = "lab456_webservices";


// Create connection
$conn = new mysqli($servername, $username, $userpassword);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    $conn->close();
}

$conn->select_db($dbname);
