<?php

include 'connection.php';

// Query the database and retrieve the number of idle records
$sql = "SELECT COUNT(*) AS count FROM reviewer_profile WHERE status = 'IDLE'";
$result = mysqli_query($conn, $sql);

// Check for errors
if (!$result) {
  echo json_encode(['error' => 'Failed to retrieve record counts: ' . mysqli_error($conn)]);
  exit();
}

// Fetch the result and store it as the idle count
$row = mysqli_fetch_assoc($result);
$idleCount = $row['count'];

// Query the database and retrieve the number of active records
$sql = "SELECT COUNT(*) AS count FROM reviewer_profile WHERE status = 'ACTIVE'";
$result = mysqli_query($conn, $sql);

// Check for errors
if (!$result) {
  echo json_encode(['error' => 'Failed to retrieve record counts: ' . mysqli_error($conn)]);
  exit();
}

// Fetch the result and store it as the active count
$row = mysqli_fetch_assoc($result);
$activeCount = $row['count'];

// Query the database and retrieve the number of idle records
$sql = "SELECT COUNT(*) AS count FROM reviewer_profile WHERE status = 'PUBLISHED'";
$result = mysqli_query($conn, $sql);

// Check for errors
if (!$result) {
  echo json_encode(['error' => 'Failed to retrieve record counts: ' . mysqli_error($conn)]);
  exit();
}

// Fetch the result and store it as the idle count
$row = mysqli_fetch_assoc($result);
$publishedCount = $row['count'];

// Close the database connection
mysqli_close($conn);

// Return the counts as a JSON object
echo json_encode(['idleCount' => $idleCount, 'activeCount' => $activeCount, 'publishedCount' => $publishedCount]);


?>
