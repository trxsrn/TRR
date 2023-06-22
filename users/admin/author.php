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
    <title>WEBSITE</title>
    <!--style-->
    <link rel="stylesheet" href="css/author.css">
    <!-- FONT AWESOME ICONS -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://kit.fontawesome.com/1688d1e392.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- J Query -->
    <script src="js/jquery-3.6.3.min.js"></script>

    <!-- Search and Pagination -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="css/navigation.css">
    <link href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap4.min.css" rel="stylesheet" />

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap4.min.js"></script>

    <!-- SWEET ALERT FOR REMOVING THE AUTHOR -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    
</head>

<body id="author">
    <section id="content">
    <div class="content-body">
            <div class="summary">
                <div class="count-progress" style="background: #002057; padding: 20px;">
                    <div class="author_count">
                        <i class="fa-solid fa-user" style="color: white; font-size: 50px; float: left; margin: .2em;"></i>
                        <?php
                        $query = mysqli_query($conn, "SELECT * FROM author_profile");
                        if ($total_authors = mysqli_num_rows($query)) {
                            echo '<p style="margin-bottom: 0;" class="count" style="color: white;"> ' . $total_authors  . '</p>';
                        } else {
                            echo '<p style="margin-bottom: 0;" class="count"> 0 </p>';
                        }
                        ?>
                        <center>
                            <span class="author-label"> Author/s </span>
                        </center>
                    </div>
                </div>
                <div class="count-progress">
                    <p style="margin-bottom: 0;" class="text-label"> IDLE</p>
                    <?php
                    $query = mysqli_query($conn, "SELECT * FROM author_profile WHERE status = 'IDLE'");
                    if ($total_author_idle = mysqli_num_rows($query)) {
                        echo '<p style="margin-bottom: 0;" class="count-number" id="idle-count" style="color: white;"> ' . $total_author_idle  . '</p>';
                    } else {
                        echo '<p style="margin-bottom: 0;" class="count-number" id="idle-count" style="color: white;"> 0 </p>';
                    }
                    ?>
                </div>
                <div class="count-progress">
                    <p style="margin-bottom: 0;" class="text-label"> ACTIVE</p>
                    <?php
                    $query = mysqli_query($conn, "SELECT * FROM author_profile WHERE status = 'ACTIVE'");
                    if ($total_author_active = mysqli_num_rows($query)) {
                        echo '<p style="margin-bottom: 0;" class="count-number" id="active-count" style="color: white;"> ' . $total_author_active  . '</p>';
                    } else {
                        echo '<p style="margin-bottom: 0;" class="count-number" id="active-count" style="color: white;"> 0 </p>';
                    }
                    ?>
                </div>
                <div class="count-progress">
                    <p style="margin-bottom: 0;" class="text-label"> PUBLISHED</p>
                    <?php
                    $query = mysqli_query($conn, "SELECT * FROM author_profile WHERE status = 'PUBLISHED'");
                    if ($total_author_published = mysqli_num_rows($query)) {
                        echo '<p style="margin-bottom: 0;" class="count-number" id="published-count" style="color: white;"> ' . $total_author_published  . '</p>';
                    } else {
                        echo '<p style="margin-bottom: 0;" class="count-number" id="published-count" style="color: white;"> 0 </p>';
                    }
                    ?>
                </div>
            </div>
            <div class="content" style="margin: 25px;">
                <table class="table table-bordered table-stripped table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Discipline</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="table-data">
                        <?php
                        $sql = mysqli_query($conn, "SELECT * FROM author_profile ");
                        while ($row = $sql->fetch_assoc()) {
                            ?>
                            <tr data-id="<?= $row['id_number'] ?>">
                                <td><?= $row['id_number'] ?></td>
                                <td><?= $row['fullname'] ?></td>
                                <td><?= $row['discipline'] ?></td>
                                <td><?= $row['status'] ?></td>
                                <td>
                                    <a href="authorprofile_view.php?id_number=<?= $row['id_number'] ?>"><i class="fa-regular fa-eye"></i>VIEW</a>
                                    <a href="#" onclick="confirmDelete('<?= $row['id_number'] ?>')"><i class="fa-solid fa-trash"></i>REMOVE</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    <script>
    $(document).ready(function() {
        var table = $('table').DataTable({
            "lengthMenu": [10, 25, 50, 100], // Set the available options for rows per page
            "pageLength": 10, // Set the initial number of rows per page
            "ajax": {
                "url": "php/author_get_record_list.php",
                "dataSrc": "" // Set the property from which data should be read
            },
            "columns": [
                { "data": "id_number" },
                { "data": "fullname" },
                { "data": "discipline" },
                { "data": "status" },
                {
                    "data": null,
                    "render": function(data, type, row) {
                        return '<center><a class="view" href="authorprofile_view.php?id_number=' + row.id_number + '"><i class="fa-regular fa-eye"></i></a>' +
                            '<a class="remove" href="#" onclick="confirmDelete(\'' + row.id_number + '\')"><i class="fa-solid fa-trash"></i></a></center>';
                    }
                }
            ]
        });

        // Handle the change event of the length dropdown
        $('table').on('length.dt', function(e, settings, len) {
            table.page.len(len).draw(); // Set the new page length and redraw the table
        });

        // Set an interval to auto-update the table
        setInterval(function() {
            table.ajax.reload(null, false); // Reload the table data without resetting the current page
        }, 5000);
    });




        function confirmDelete(id) {
            Swal.fire({
                title: 'Are you sure?',
                text: 'You are about to remove this author.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, remove!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Call delete function here
                    deleteItem(id);
                }
            });
        }

        function deleteItem(id) {
            $.ajax({
                url: 'php/delete.php',
                type: 'POST',
                data: {
                    id: id
                },
                success: function(response) {
                    Swal.fire(
                        'Deleted!',
                        'The item has been deleted.',
                        'success'
                    ).then(function() {
                        location.reload(); // Reload the table after deletion
                    });
                },
                error: function() {
                    Swal.fire(
                        'Error',
                        'An error occurred while deleting the item.',
                        'error'
                    );
                }
            });
        }

        // JavaScript function to retrieve and display the number of idle, active and published records
        function updateRecordCounts() {
         // Use AJAX to call the PHP script and retrieve the number of idle, active and published records
            $.ajax({
            url: 'php/author_get_record_counts.php',
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                // Update the HTML elements that will display the total number of idle, active and published records
                $('#idle-count').text(response.idleCount);
                $('#active-count').text(response.activeCount);
                $('#published-count').text(response.publishedCount);
            }
            });
        }
        
        // Set an interval for the function to be called periodically
        setInterval(updateRecordCounts, 5000); // 5000 milliseconds = 5 seconds

        // Function to load the data from the server and update the table
    </script>
</body>

</html>
