<?php
// Connect to the database
include 'connection.php'

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Query the database to get the latest data
$sql = "SELECT * FROM author_profile ORDER BY id DESC LIMIT 10";
$result = mysqli_query($conn, $sql);

// Create a new array to store the data
$data = array();
while ($row = mysqli_fetch_assoc($result)) {
	$data[] = $row;
}

// Return the data as JSON
header('Content-Type: application/json');
echo json_encode($data);
mysqli_close($conn);
?>
