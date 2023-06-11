<?php
include 'connection.php';

// Check if the ID parameter is provided
if (isset($_POST['id'])) {
    $id = $_POST['id'];

    // Perform the deletion query
    $deleteQuery = "DELETE FROM author_profile WHERE id_number = '$id'";

    if (mysqli_query($conn, $deleteQuery)) {
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
