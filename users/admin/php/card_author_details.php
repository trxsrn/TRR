<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include '../connection.php';

$authorId = $_POST['authorId'];

// Query the database to retrieve the author's details
$query = "SELECT * FROM author_profile WHERE id_number = '$authorId'";
$result = mysqli_query($conn, $query);

if ($result && mysqli_num_rows($result) > 0) {
  $authorData = mysqli_fetch_assoc($result);

  // Retrieve the author's details
  $authorId = $authorData['id_number'];
  $fullname = $authorData['fullname'];
  $discipline = $authorData['discipline'];
  $designation = $authorData['designation'];
  $qualification = $authorData['qualification'];
  $affiliation = $authorData['affiliation'];

  // Prepare the author's details as an array
  $authorDetails = array(
    'id_number' => $authorId,
    'fullname' => $fullname,
    'discipline' => $discipline,
    'designation' => $designation,
    'qualification' => $qualification,
    'affiliation' => $affiliation
  );

  // Return the author's details as a JSON response
  $response = $authorDetails;
} else {
  $response = array('error' => 'Author details not found.');
}

// Close the database connection
mysqli_close($conn);

// Set the content type header to JSON
header('Content-Type: application/json');

// Encode the response as JSON and send it back
echo json_encode($response);
?>
    