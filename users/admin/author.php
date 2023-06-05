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
     <link rel="stylesheet" href="fontawesome-library/css/all.css">
     <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
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

</head>
<body id="author">
    <section id="content">
        <div class="content-body">
            <div class="summary">
                    <div class="count-progress" style="background: #002057; padding: 20px;">
                        <div class="author_count">
                            <i class="fa-solid fa-user" style="color: white; font-size: 50px; float: left; margin: .2em;"></i>
                                    <?php 
                                            $query = mysqli_query( $conn, "SELECT * FROM author_profile");
                                            if($total_authors = mysqli_num_rows($query))
                                            {  
                                                echo '<p style="margin-bottom: 0;" class="count" style="color: white;"> ' . $total_authors  . '</p>';
                                            }
                                            else
                                            {
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
                                 $query = mysqli_query( $conn, "SELECT * FROM author_profile WHERE status = 'IDLE'" );
                                 if($total_author_idle = mysqli_num_rows($query))
                                 {  
                                     echo '<p style="margin-bottom: 0;" class="count-number" id="idle-count" style="color: white;"> ' . $total_author_idle  . '</p>';
                                 }
                                 else
                                 {
                                     echo '<p style="margin-bottom: 0;" class="count-number" id="idle-count" style="color: white;"> 0 </p>';
                                 }
                                ?>
                    </div>
                    <div class="count-progress">
                                <p style="margin-bottom: 0;" class="text-label"> ACTIVE</p>
                                <?php
                                 $query = mysqli_query( $conn, "SELECT * FROM author_profile WHERE status = 'ACTIVE'" );
                                 if($total_author_active = mysqli_num_rows($query))
                                 {  
                                     echo '<p style="margin-bottom: 0;" class="count-number" id="active-count" style="color: white;"> ' . $total_author_active  . '</p>';
                                 }
                                 else
                                 {
                                     echo '<p style="margin-bottom: 0;" class="count-number" id="active-count" style="color: white;"> 0 </p>';
                                 }
                                ?>
                    </div>
                    <div class="count-progress">
                                <p style="margin-bottom: 0;" class="text-label"> PUBLISHED</p>
                                <?php
                                 $query = mysqli_query( $conn, "SELECT * FROM author_profile WHERE status = 'PUBLISHED'" );
                                 if($total_author_published = mysqli_num_rows($query))
                                 {  
                                     echo '<p style="margin-bottom: 0;" class="count-number" id="published-count" style="color: white;"> ' . $total_author_published  . '</p>';
                                 }
                                 else
                                 {
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
              <th>Descipline</th>
              <th>Status</th>
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
              <td><?= $row['id'] ?> </td>
              <td><?= $row['fullname'] ?> </td>
              <td><?= $row['discipline'] ?> </td>
              <td><?= $row['status'] ?> </td>
              <td><a href="authorprofile_view.php?id=<?= $row['id'] ?>" class="accept"><i class="fa-regular fa-eye"></i> VIEW</a></td>
            </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
<script type="text/javascript">
  $(document).ready(function()
  {
    $('table').DataTable();
  });
</script>

<script>
$(document).ready(function() {
    setInterval(function() {
        $.ajax({
            url: 'author_get_record_list.php',
            success: function(data) {
                $('#table-data').html(data);
            }
        });
    }, 5000);
});
</script>
        </div>

    </section>
<script src="js/author_auto_update.js"></script>
</body>
</html>