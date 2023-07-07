<?php

include 'connection.php';

if (isset($_POST['email'])) {
    $email = $_POST['email'];
    
    // Perform a database query to check if the email exists
    $query = "SELECT * FROM author_profile WHERE email = '$email'";
    $result = mysqli_query($conn, $query);
    
    if (mysqli_num_rows($result) > 0) {
        echo 'taken';
    } else {
        echo 'available';
    }
}
?>
