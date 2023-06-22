<?php

include '../connection.php';
// Retrieve the authorId from the AJAX request
$authorId = $_POST['authorId'];

$query = "SELECT * FROM author_profile WHERE id_number = '$authorId'";
$result = mysqli_query($conn, $query);
$authorData = mysqli_fetch_assoc($result);

// Check if author details were found
if ($authorData) {
    $authorName = $authorData['fullname'];
    $authorDiscipline = $authorData['discipline'];
    $authorDesignation = $authorData['designation'];
    $authorQualification = $authorData['qualification'];
    $authorAffiliation = $authorData['affiliation'];

    // Create an associative array of author details
    $authorDetails = array(
        'id' => $authorId,
        'fullname' => $authorName,
        'discipline' => $authorDiscipline,
        'designation' => $authorDesignation,
        'qualification' => $authorQualification,
        'affiliation' => $authorAffiliation
    );

    // Send the author details as a JSON response
    header('Content-Type: application/json');
    echo json_encode($authorDetails);
} else {
    // Author details not found
    echo json_encode(array('error' => 'Author not found.'));
}

// Close the database connection
mysqli_close($conn);
?>
