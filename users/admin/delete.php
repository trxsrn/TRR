<?php
include 'connection.php';

if (isset($_GET['id_number'])) {
    $id_number = $_GET['id_number'];

    // Perform the delete operation
    $delete_query = "DELETE FROM author_profile WHERE id_number = '$id_number'";
    $result = mysqli_query($conn, $delete_query);

    if ($result) {
        // Delete successful
        echo "success";
    } else {
        // Delete failed
        echo "error";
    }
}
?>
