<?php

include 'connection.php';

// Query the database and retrieve the number of to assign records
$sql = "SELECT COUNT(*) AS count FROM papers WHERE status = 'TO ASSIGN'";
$result = mysqli_query($conn, $sql);

// Check for errors
if (!$result) {
  echo json_encode(['error' => 'Failed to retrieve record counts: ' . mysqli_error($conn)]);
  exit();
}

// Fetch the result and store it as the idle count
$row = mysqli_fetch_assoc($result);
$toAssignCount = $row['count'];

// Query the database and retrieve the number of active records
$sql = "SELECT COUNT(*) AS count FROM papers WHERE status = 'TO REVIEW'";
$result = mysqli_query($conn, $sql);

// Check for errors
if (!$result) {
  echo json_encode(['error' => 'Failed to retrieve record counts: ' . mysqli_error($conn)]);
  exit();
}

// Fetch the result and store it as the active count
$row = mysqli_fetch_assoc($result);
$toReviewCount = $row['count'];

// Query the database and retrieve the number of idle records
$sql = "SELECT COUNT(*) AS count FROM papers WHERE status = 'UNDER REVIEW'";
$result = mysqli_query($conn, $sql);

// Check for errors
if (!$result) {
  echo json_encode(['error' => 'Failed to retrieve record counts: ' . mysqli_error($conn)]);
  exit();
}

// Fetch the result and store it as the idle count
$row = mysqli_fetch_assoc($result);
$underReviewCount = $row['count'];

$sql = "SELECT COUNT(*) AS count FROM papers WHERE status = 'TO PUBLISH'";
$result = mysqli_query($conn, $sql);

// Check for errors
if (!$result) {
  echo json_encode(['error' => 'Failed to retrieve record counts: ' . mysqli_error($conn)]);
  exit();
}

// Fetch the result and store it as the idle count
$row = mysqli_fetch_assoc($result);
$toPublishCount = $row['count'];

// Close the database connection
mysqli_close($conn);

// Return the counts as a JSON object
echo json_encode(['toAssignCount' => $toAssignCount, 'toReviewCount' => $toReviewCount, 'underReviewCount' => $underReviewCount, 'toPublishCount' => $toPublishCount]);


?>
