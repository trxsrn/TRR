<?php

include 'connection.php';
include 'navbar.php';

$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM author_profile WHERE id = $id " );
$row = mysqli_fetch_assoc($result);  

$fullname = $row['fullname'];
$username = $row['username'];
$descipline = $row['discipline'];
$number = $row['contact_number'];
$bday = $row['birthdate'];
$address = $row['unit'] . " " . $row['street'] . " " . $row['barangay'] . " " . $row['city'] . " " . $row['province'] . " " . $row['country'];  
$qualification = $row['qualification'];
$designation = $row['designation'];
$affiliation = $row['affiliation'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/authorprofile_view.css">
    <title>Document</title>
</head>
<body>
    <div class="content-body">
        <h3><a href="author.php" class="header-back">AUTHORS</a> <i class="fa-solid fa-chevron-left"></i> <?php echo $fullname ; ?></h3>
        <div class="author-details">
            <div class="card1">
                <?php echo '<img src="data:image/jpeg;base64,'.base64_encode($row['profile_picture'] ).'" alt="">'; ?>
            </div>
            <div class="card2">
                <table>
                        <tr>
                            <td>ID:</td>
                            <td> <?php echo "<p><strong>" . $id . "</strong><br>";?> </td>
                        </tr>
                        <tr>
                            <td>Name / Username:</td>
                            <td> <?php  echo "<strong>" . $fullname . " </strong>/ " . $username . "<br>" ; ?> </td>
                        </tr>
                        <tr>
                            <td>Disciplines:</td>
                            <td> <?php echo $descipline  ?> </td>
                        </tr>
                </table>
                <table>
                        <tr>
                            <td width="20%">Designation:</td>
                            <td width="30%"> <?php echo $designation ;?> </td>
                            <td width="20%">Contact Number:</td>
                            <td width="30%"> <?php echo $number ;?> </td>
                        </tr>
                        <tr>
                            <td width="20%">Qualification:</td>
                            <td width="30%"> <?php echo $qualification ;?> </td>
                            <td width="20%">Address:</td>
                            <td width="30%"> <?php echo $address ;?> </td>
                        </tr>
                        <tr>
                            <td width="20%">Affiliation:</td>
                            <td width="30%"> <?php echo $affiliation ;?> </td>
                            <td width="20%">Contact Number:</td>
                            <td width="30%"> <?php echo $number ;?> </td>
                        </tr>
                </table>
            </div>
        </div>
        

        <table>
            <tr>
                <th width="50%";>Research Title</th>
                <th>Co-Authors</th>
                <th>Status</th>
                <th>Submitted Date </th>
            </tr>
        </table>
</div>
</body>
</html>