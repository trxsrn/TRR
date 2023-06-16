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
                return '<a href="#" onclick="openForm()" class="assign-btn">PUBLISH</a>';
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
  <div class="publish-form" id="publish-form">
                <div class="publish-details">
                    <form action="php/submit-details.php" method="post" enctype="multipart/form-data">
                        <h1 class="new-publish-header"> PUBLISH NEW PAPER </h1>
                        <div class="publish-form-body">
                            <div class="subject">
                                Subject: <input type="text" name="subject" class="subject-input">
                            </div>
                            <div class="description">
                                Description: 
                                <textarea name="publish-details" class="textarea-input"></textarea>
                            </div>
                            <div class="attachment">
                                Attachment: <br>
                                <div class="drag-area">
                                        <span class="visible">
                                            <i class="fas fa-image" style="font-size: 25px;"></i><br>
                                            DRAG AND DROP A PHOTO 
                                            <br> OR <br>
                                            <span class="select" role="button">Browse</span>
                                        </span>
                                        <span class="on-drop">Drop images here</span>
                                        <input name="image" type="file" class="file" multiple />
                                </div>

                                    <!-- IMAGE PREVIEW CONTAINER -->
                                <div class="container"></div>
                                </div>
                            </div>
                            <center>
                                <button type="button" onclick="closeForm()" class="close-btn">CANCEL</button>
                                <input type="submit" value="POST" name="post-announcement" style="background: #002057;   border-radius: 10px; margin: 2em;">
                            </center>
                        </div>
                    </div>
            </div>
<script>
  $(document).ready(function()
  {
    $('table').DataTable();
  });

  $(document).ready(function() {
      setInterval(function() {
          $.ajax({
              url: 'php/papers_get_record_list.php',
              success: function(data) {
                  $('#table-data').html(data);
              }
          });
      }, 5000);
  });

  function updateRecordCounts() {
  $.ajax({
        url: 'php/papers_get_record_counts.php',
        type: 'GET',
        dataType: 'json',
        success: function(response) {
          $('#toReview-count').text(response.toReviewCount);
          $('#underReview-count').text(response.underReviewCount);
          $('#toPublish-count').text(response.toPublishCount);
        }
      });
    }
    setInterval(updateRecordCounts, 5000);

  function openForm() 
  {
    document.getElementById("publish-form").style.display = "block";
  }
  function closeForm() 
  {
    document.getElementById("publish-form").style.display = "none";
  }
</script>
</div>
  
</body>
</html>