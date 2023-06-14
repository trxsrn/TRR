<?php
include_once 'navbar.php';
include 'connection.php';

// Function to delete a record from the author_profile table
function deleteAuthorProfile($id) {
    global $conn;
    $deleteQuery = "DELETE FROM author_profile WHERE id_number = '$id'";
    return mysqli_query($conn, $deleteQuery);
}

// Function to delete a record from the reviewer_profile table
function deleteReviewerProfile($id) {
    global $conn;
    $deleteQuery = "DELETE FROM reviewer_profile WHERE id_number = '$id'";
    return mysqli_query($conn, $deleteQuery);
}

// Check if the ID parameter is provided
if (isset($_POST['id'])) {
    $id = $_POST['id'];

    // Perform the deletion query for both tables
    $deleteAuthorResult = deleteAuthorProfile($id);
    $deleteReviewerResult = deleteReviewerProfile($id);

    if ($deleteAuthorResult && $deleteReviewerResult) {
        // Deletion successful
        echo "success";
    } else {
        // Deletion failed
        echo "error";
    }
} else {
    // ID parameter not provided
    echo "missing_id";
}
?>
