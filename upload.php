<?php
// Connect to MySQL
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "trr";
 
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Prepare file data
$file_name = $_FILES['file']['name'];
$file_type = $_FILES['file']['type'];
$file_data = file_get_contents($_FILES['file']['tmp_name']);

// Insert file data into database
$sql = "INSERT INTO files (name, type, data) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $file_name, $file_type, $file_data);
$stmt->execute();

// Close connection
$stmt->close();
$conn->close();

?>