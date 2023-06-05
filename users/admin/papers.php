<?php

include 'navbar.php';
include 'connection.php';


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css" rel="stylesheet"/>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css" rel="stylesheet"/>
<link href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap4.min.css" rel="stylesheet"/>
 
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap4.min.js"></script>
<link rel="stylesheet" href="css/paper.css">
</head>
<body style="background: white;">
<div class="content-body"> 
<div class="summary">
                    <div class="count-progress" style="background: #002057; padding: 20px;">
                        <div class="author_count">
                            <i class="fa-solid fa-user" style="color: white; font-size: 50px; float: left; margin: .2em;"></i>
                                    <?php 
                                            $query = mysqli_query( $conn, "SELECT * FROM papers");
                                            if($total_authors = mysqli_num_rows($query))
                                            {  
                                                echo '<p style="margin-bottom: 0;"class="count" style="color: white;"> ' . $total_authors  . '</p>';
                                            }
                                            else
                                            {
                                                echo '<p style="margin-bottom: 0;"class="count"> 0 </p>';
                                            }
                                    ?>
                                    <center>
                                    <span class="author-label"> Paper/s </span>
                                        </center>
                        </div>
                    </div>
                        <div class="count-progress">
                                    <p style="margin-bottom: 0;"class="text-label"> TO ASSIGN</p>
                                <?php
                                 $query = mysqli_query( $conn, "SELECT * FROM papers WHERE status = 'TO ASSIGN'" );
                                 if($total_paper_to_assign = mysqli_num_rows($query))
                                 {  
                                     echo '<p style="margin-bottom: 0;" class="count-number" id="toAssign-count" style="color: white;"> ' . $total_paper_to_assign  . '</p>';
                                 }
                                 else
                                 {
                                     echo '<p style="margin-bottom: 0;" class="count-number" id="toAssign-count" style="color: white;"> 0 </p>';
                                 }
                                ?>
                        </div>
                        <div class="count-progress">
                                    <p style="margin-bottom: 0;"class="text-label"> TO REVIEW</p>
                                    <?php
                                      $query = mysqli_query( $conn, "SELECT * FROM papers WHERE status = 'TO REVIEW'" );
                                      if($total_paper_to_review = mysqli_num_rows($query))
                                      {  
                                          echo '<p style="margin-bottom: 0;" class="count-number" id="toReview-count" style="color: white;"> ' . $total_paper_to_review  . '</p>';
                                      }
                                      else
                                      {
                                          echo '<p style="margin-bottom: 0;" class="count-number" id="toReview-count" style="color: white;"> 0 </p>';
                                      }
                                    ?>
                        </div>
                        <div class="count-progress">
                                    <p style="margin-bottom: 0;"class="text-label"> UNDER REVIEW</p>
                                    <?php
                                      $query = mysqli_query( $conn, "SELECT * FROM papers WHERE status = 'UNDER REVIEW'" );
                                      if($total_paper_underReview = mysqli_num_rows($query))
                                      {  
                                          echo '<p style="margin-bottom: 0;" class="count-number" id="underReview-count" style="color: white;"> ' . $total_paper_underReview  . '</p>';
                                      }
                                      else
                                      {
                                          echo '<p style="margin-bottom: 0;" class="count-number" id="underReview-count" style="color: white;"> 0 </p>';
                                      }
                                    ?>
                        </div>
                        <div class="count-progress">
                                    <p style="margin-bottom: 0;"class="text-label"> ACCEPTED</p>
                                    <?php
                                      $query = mysqli_query( $conn, "SELECT * FROM papers WHERE status = 'TO  PUBLISH'" );
                                      if($total_paper_toPublish = mysqli_num_rows($query))
                                      {  
                                          echo '<p style="margin-bottom: 0;" class="count-number" id="toPublish-count" style="color: white;"> ' . $total_paper_toPublish  . '</p>';
                                      }
                                      else
                                      {
                                          echo '<p style="margin-bottom: 0;" class="count-number" id="toPublish-count" style="color: white;"> 0 </p>';
                                      }
                                    ?>
                        </div>
                    </div>

      <div class="content" style="margin: 25px;">
        <table class="table table-bordered table-stripped table-hover">
          <thead>
            <tr>
              <th>ID</th>
              <th>Research Title</th>
              <th>Author/s</th>
              <th>Co-Author/s</th>
              <th>Reviewer/s</th>
              <th>Submitted Date</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody id="table-data">
            <?php
             function getButton($status, $id) {
              if($status == "to assign") {
                return '<a href="assign.php?id='.$id.'" class="assign-btn" >ASSIGN</a>';
              } else if ($status == "under reviewing") {
                return '<a href="#" class="assign-btn">CONTINUE REVIEWING</a>';
              } else if ($status == "to publish"){
                return '<a href="#" class="assign-btn">PUBLISH</a>';
              } else {
                return '<a href="#" class="assign-btn">VIEW</a>';
              } 
            }
            $sql = mysqli_query($conn, "SELECT * FROM papers");
            while($row= $sql -> fetch_assoc())
            {
            ?>
            <tr>
              <td><?= $row['id'] ?> </td>
              <td><?= $row['research_title'] ?> </td>
              <td><?= $row['author'] ?> </td>
              <td><?= $row['Co-Author'] ?> </td>
              <td><?= $row['reviewer'] ?> </td>
              <td><?= $row['last_modified'] ?> </td>
              <td><?= $row['status'] ?> </td>
              <td><center><?= getButton(strtolower($row['status']), $row['id'] ) ?></center></td>
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
            url: 'papers_get_record_list.php',
            success: function(data) {
                $('#table-data').html(data);
            }
        });
    }, 5000);
});
</script>
        </div>

    </section>
<script src="js/papers_auto_update.js"></script>
  
</body>
</html>