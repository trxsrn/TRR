<?php
include_once 'navbar.php'; 
include 'connection.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DASHBOARD</title>
    <!--style-->
    <link rel="stylesheet" href="css/account-approval.css">
    <!-- FONT AWESOME ICONS -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://kit.fontawesome.com/1688d1e392.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    <!-- ALERT -->
    <script src="js/jquery-3.6.3.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <!-- Search and Pagination -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css" rel="stylesheet"/>
    <link href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap4.min.css" rel="stylesheet"/>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap4.min.js"></script>


</head>
<body id="account-approval">
    <section id="content">
        <div class="content-body">
            <div class="content">
                <h3> Account Creation Request </h3>
                <hr>
                <table class="table table-bordered table-stripped table-hover">
                    <thead>
                        <tr>
                            <th>User Type</th>
                            <th>Name</th>
                            <th>Discipline</th>
                            <th>Qualification</th>
                            <th>Designation</th>
                            <th>Affiliation</th>
                            <th>Documents</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="table-data">
                        <?php
                        $sql = mysqli_query($conn, "SELECT * FROM for_approval_of_account ");
                        while($row = $sql->fetch_assoc()) {
                            ?>
                            <tr>
                                <td><?= $row['user_type'] ?></td>
                                <td><?= $row['fullname'] ?></td>
                                <td><?= $row['discipline'] ?></td>
                                <td><?= $row['qualification'] ?></td>
                                <td><?= $row['designation'] ?></td>
                                <td><?= $row['affiliation'] ?></td>
                                <td>
                                    <a style='color: black; text-decoration: underline;' href='Data/cv_files/<?= $row['cv'] ?> '><?= $row['cv'] ?></a>
                                    <a style='color: black; text-decoration: underline;' href='Data/intent_files/<?= $row['intent'] ?> '><?= $row['intent'] ?></a>
                                </td>
                                <td>
                                    <a href="#" onclick="confirmAccept(<?= $row['id'] ?>)"><i class="fa-solid fa-check"></i></a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
<script type="text/javascript">
  $(document).ready(function() {
    $('table').DataTable();
  });

  function confirmAccept(id) {
    Swal.fire({
      title: 'Are you sure?',
      text: 'You are about to accept this account creation request.',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, accept it!'
    }).then((result) => {
      if (result.isConfirmed) {
        // Call accept function here
        acceptRequest(id);
      }
    });
  }

  function acceptRequest(id) {
    $.ajax({
      url: 'accept.php',
      type: 'POST',
      data: {
        id: id
      },
      success: function(response) {
        Swal.fire(
          'Accepted!',
          'The account creation request has been accepted.',
          'success'
        ).then(function() {
          location.reload(); // Reload the table after acceptance
        });
      },
      error: function() {
        Swal.fire(
          'Error',
          'An error occurred while accepting the account creation request.',
          'error'
        );
      }
    });
  }
</script>
</body>
</html>
