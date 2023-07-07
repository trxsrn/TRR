<?php

include 'connection.php';

if (isset($_POST['username'])) {
    $username = $_POST['username'];
    
    // Perform a database query to check if the username exists
    $query = "SELECT * FROM author_profile WHERE username = '$username'";
    $result = mysqli_query($conn, $query);
    
    if (mysqli_num_rows($result) > 0) {
        echo 'taken';
    } else {
        echo 'available';
    }
}

?>
