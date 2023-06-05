<?php

include 'connection.php';

mysqli_select_db($conn, 'trr');


$author = mysqli_query( $conn, "SELECT COUNT(*) FROM author_profiles");


?>