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

    <!-- SEARCH AND PAGINATION -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css" rel="stylesheet"/>
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

            <div class="form-box">
                <div class="button-box">
                    <div id="btn"></div>
                        <button type="button" class="toggle-btn" onclick="leftClick()" id="acceptedBtn">ACCEPTED</button>
                        <button type="button" class="toggle-btn" onclick="rightClick()" id="declinedBtn">DECLINED</button>
                    </div>
            </div>
            <div class="content" style="margin: 25px;">
                <table class="table table-bordered table-stripped table-hover">
                <thead id="heading">
                    <tr>
                            <th>User Type</th>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Action</th>
                    </tr>
                </thead>
                <tbody id="table-data">
                    <?php
                    $sql1 = mysqli_query($conn, "SELECT * FROM author_profile");
                    while ($row = $sql1->fetch_assoc()) {
                        echo '
                            <tr>
                                <td>AUTHOR</td>
                                <td>' . $row['id_number'] . '</td>
                                <td>' . $row['fullname'] . '</td>
                                <td><a href="authorprofile_view.php?id=' . $row['id_number'] . '" class="accept"><i class="fa-regular fa-eye"></i> VIEW</a></td>
                            </tr>';
                    }

                    $sql2 = mysqli_query($conn, "SELECT * FROM reviewer_profile");
                    while ($row = $sql2->fetch_assoc()) {
                        echo '
                            <tr>
                                <td>REVIEWER</td>
                                <td>' . $row['id_number'] . '</td>
                                <td>' . $row['fullname'] . '</td>
                                <td><a href="reviewerprofile_view.php?id=' . $row['id_number'] . '" class="accept"><i class="fa-regular fa-eye"></i> VIEW</a></td>
                            </tr>';
                    }
                    ?>
                </tbody>
                </table>
            </div>

        
        </div>
    </section>
<script src="JS/toggle-swiper.js"></script>

<script>
    $(document).ready(function() {
    $('table').DataTable();
    });

    function leftClick() {
        $.ajax({
            url: 'accepted_data.php', // PHP script to fetch data from the accepted table
            type: 'GET',
            success: function(response) {
                $('#table-data').html(response); // Update the table with the fetched data
            }
        });
    }

    function rightClick() {
        $.ajax({
            url: 'declined_data.php', // PHP script to fetch data from the declined table
            type: 'GET',
            success: function(response) {
                $('#table-data').html(response); // Update the table with the fetched data
            }
        });
    }
</script>

</body>
</html>