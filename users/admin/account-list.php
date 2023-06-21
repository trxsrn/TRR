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
            <h3 style="text-align:center;">Official Account List</h3>
            <hr>
            <div class="content" style="margin: 25px;">
                <table class="table table-bordered table-stripped table-hover">
                    <thead id="heading">
                        <tr>
                            <th>User Type</th>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Username</th>
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
                                    <td>' . $row['username'] . '</td>
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
                                    <td>' . $row['username'] . '</td>
                                    <td><a href="reviewerprofile_view.php?id=' . $row['id_number'] . '" class="accept"><i class="fa-regular fa-eye"></i> VIEW</a></td>
                                </tr>';
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <center>
            <button onclick="printData()">PRINT</button>
        </center>
    </section>

    <script src="js/toggle-swiper.js"></script>
    
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap4.min.js"></script>

    <script>
    $(document).ready(function() {
    $('table').DataTable();
    });
function printData() {
    var printWindow = window.open('', '', 'height=600,width=800');
    printWindow.document.write('<html><head><title>Print</title>');
    printWindow.document.write('<style>');
    printWindow.document.write('@media print {');
    printWindow.document.write('    table { width: 100%; border-collapse: collapse; }');
    printWindow.document.write('    th, td { padding: 8px; text-align: left; border-bottom: 1px solid #ddd; }');
    printWindow.document.write('    h3 { margin-top: 0; }');
    printWindow.document.write('    .no-print, .no-print ~ td { display: none; }'); // Hide both header and content of excluded columns
    printWindow.document.write('}');
    printWindow.document.write('</style>');
    printWindow.document.write('</head><body>');
    printWindow.document.write('<h3>Account List</h3>');
    printWindow.document.write('<table>');
    printWindow.document.write('<thead>');
    printWindow.document.write('<tr>');
    printWindow.document.write('<th>User Type</th>');
    printWindow.document.write('<th>ID</th>');
    printWindow.document.write('<th>Name</th>');
    printWindow.document.write('<th>Username</th>');
    printWindow.document.write('</tr>');
    printWindow.document.write('</thead>');
    printWindow.document.write('<tbody>');
    var tableRows = document.getElementById("table-data").querySelectorAll("tr");
    for (var i = 0; i < tableRows.length; i++) {
        var rowData = tableRows[i].querySelectorAll("td");
        printWindow.document.write('<tr>');
        for (var j = 0; j < rowData.length; j++) {
            if (j !== rowData.length - 1) { // Exclude the last column (Action column)
                printWindow.document.write('<td>' + rowData[j].innerHTML + '</td>');
            }
        }
        printWindow.document.write('</tr>');
    }
    printWindow.document.write('</tbody>');
    printWindow.document.write('</table>');
    printWindow.document.write('</body></html>');
    printWindow.document.close();
    printWindow.print();
}
</script>


</body>
</html>
