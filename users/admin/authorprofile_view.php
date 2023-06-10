<?php

include 'connection.php';
include 'navbar.php';

$id = $_GET['id_number'];
$result = mysqli_query($conn, "SELECT * FROM author_profile WHERE id_number = '$id'");

if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);

    $fullname = $row['fullname'];
    $username = $row['username'];
    $discipline = $row['discipline'];
    $number = $row['contact_number'];
    $bday = $row['birthdate'];
    $address = $row['unit'] . " " . $row['street'] . " " . $row['barangay'] . " " . $row['city'] . " " . $row['province'] . " " . $row['country'];
    $qualification = $row['qualification'];
    $designation = $row['designation'];
    $affiliation = $row['affiliation'];

} else {
    // Handle the case when no rows are found or query execution fails
    echo "No author profile found for the given ID.";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/authorprofile_view.css">
    <title>Document</title>
      <!--J Query -->
      <script src="js/jquery-3.6.3.min.js"></script>

    <!-- Search and Pagination -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css" rel="stylesheet"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css" rel="stylesheet"/>
    <link href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap4.min.css" rel="stylesheet"/>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap4.min.js"></script>

    <!-- SWEET ALERT FOR REMOVING THE AUTHOR -->
    

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
                            <td> <?php echo $discipline  ?> </td>
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
        

        <table class="table table-bordered table-stripped table-hover">
          <thead>
            <tr>
              <th>PAPER ID</th>
              <th>TITLE</th>
              <th>CO-AUTHORS</th>
              <th>Status</th>
              <th>SUBMITTED DATE</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody id="table-data">
            <?php
            $sql = mysqli_query($conn, "SELECT * FROM author_profile ");
            while($row= $sql -> fetch_assoc())
            {
            ?>
            <tr>
              <td><?= $row['id_number'] ?> </td>
              <td><?= $row['fullname'] ?> </td>
              <td><?= $row['discipline'] ?> </td>
              <td><?= $row['status'] ?> </td>
              <td><?= $row['status'] ?> </td>
              <td><a href="authorprofile_view.php?id_number=<?= $row['id_number'] ?>"><i class="fa-regular fa-eye"></i></a>
                  <a href="delete.php?id_number=<?= $row['id_number'] ?>"><i class="fa-solid fa-trash"></i></a>
              </td>
            </tr>
            <?php } ?>
          </tbody>
        </table>
        <script type="text/javascript">
  $(document).ready(function()
  {
    $('table').DataTable();
  });
</script>
</div>

<center>    
    <p>####INCLUDE FILE VERSION HISTORY ####</p>
</center>
</body>
</html>