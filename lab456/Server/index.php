<?php
$servername = "127.0.0.1:3307";
$username = "dung";
$userpassword = "anhdung0403";
$dbname = "lab456_webservices";
$email = "";
$password = "";

if (isset($_POST['email'])) {
  $email = $_POST['email'];
}
if (isset($_POST['password'])) {
  $password = $_POST['password'];
}

// Create connection
$conn = new mysqli($servername, $username, $userpassword, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM sinhvien";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    if ($email == $row["email"] && $password == $row["password"]) {
      echo "id: " . $row["id"] . " - Name: " . $row["name"] . " - Scores: " . $row["scores"];
      return;
    }
  }
} else {
  echo "0 results";
}
$conn->close();
