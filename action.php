<?php

include 'connection.php';

$img = $_POST['file'];

$sql = "INSERT INTO web VALUES ('', '$img', '', '')";

$sql = mysqli_query($conn, "SELECT * FROM web WHERE image = '".$_POST['file']."'");
 if($retval)
    {
        echo ('<script type="text/javascript"> alert("Registered Successfully"); location="login.php"; </script>');
    }

?>