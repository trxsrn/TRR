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
    <link rel="stylesheet" href="css/toggle.css">
    <!-- FONT AWESOME ICONS -->
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>

    <!-- ALERT -->
    <script src="js/jquery-3.6.3.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <!-- Search and Pagination -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap4.min.css" rel="stylesheet" />
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

</head>
<body id="account-approval">
    <section id="content">  
        <div class="content-body">
            <h3 style="text-align:center;">Declined Accounts</h3>
            <hr>
            <div class="content" style="margin: 25px;">
                <table class="table table-bordered table-stripped table-hover">
                    <thead id="heading">
                        <tr>
                            <th>User Type</th>
                            <th>Name</th>
                            <th>Username</th>
                        </tr>
                    </thead>
                    <tbody id="table-data">
                        <?php
                        $sql1 = mysqli_query($conn, "SELECT * FROM declined_accounts");
                        while ($row = $sql1->fetch_assoc()) {
                            echo '
                                <tr>
                                    <td>AUTHOR</td>
                                    <td>' . $row['fullname'] . '</td>
                                    <td>' . $row['username'] . '</td>
                                </tr>';
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
    
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap4.min.js"></script>

    <script>
    $(document).ready(function() {
    $('table').DataTable();
    });
</script>

</body>
</html>
