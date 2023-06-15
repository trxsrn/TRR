<?php
include_once 'connection.php';

if(isset($_POST['submit']))
{       
    $file = addslashes(file_get_contents($_FILES["file_pdf"]["tmp_name"]));  
    $query = "UPDATE employees SET em_photo = '$file' WHERE id = $id"; 
    mysqli_select_db($conn, 'hr_system'); 
    if(mysql_query($query, $conn))  
    {  
           echo ('<script type="text/javascript"> alert("Upload Success"); location="employees.php"; </script>');   
    }  
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST">
    <input type="file" name="file_pdf">
    <input type="submit" name="submit">
</body>
</html>