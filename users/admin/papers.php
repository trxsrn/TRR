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
  <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap4.min.css" rel="stylesheet" />

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
          <i class="fa-solid fa-book" style="color: white; font-size: 50px; float: left; margin: .2em;"></i>
          <?php
          $query = mysqli_query($conn, "SELECT * FROM papers");
          if ($total_authors = mysqli_num_rows($query)) {
            echo '<p style="margin-bottom: 0;"class="count" style="color: white;"> ' . $total_authors  . '</p>';
          } else {
            echo '<p style="margin-bottom: 0;"class="count"> 0 </p>';
          }
          ?>
          <center>
            <span class="author-label"> Paper/s </span>
          </center>
        </div>
      </div>
      <div class="count-progress">
        <p style="margin-bottom: 0;" class="text-label"> TO ASSIGN</p>
        <?php
        $query = mysqli_query($conn, "SELECT * FROM papers WHERE status = 'TO ASSIGN'");
        if ($total_paper_to_assign = mysqli_num_rows($query)) {
          echo '<p style="margin-bottom: 0;" class="count-number" id="toAssign-count" style="color: white;"> ' . $total_paper_to_assign  . '</p>';
        } else {
          echo '<p style="margin-bottom: 0;" class="count-number" id="toAssign-count" style="color: white;"> 0 </p>';
        }
        ?>
      </div>
      <div class="count-progress">
        <p style="margin-bottom: 0;" class="text-label"> TO REVIEW</p>
        <?php
        $query = mysqli_query($conn, "SELECT * FROM papers WHERE status = 'TO REVIEW'");
        if ($total_paper_to_review = mysqli_num_rows($query)) {
          echo '<p style="margin-bottom: 0;" class="count-number" id="toReview-count" style="color: white;"> ' . $total_paper_to_review  . '</p>';
        } else {
          echo '<p style="margin-bottom: 0;" class="count-number" id="toReview-count" style="color: white;"> 0 </p>';
        }
        ?>
      </div>
      <div class="count-progress">
        <p style="margin-bottom: 0;" class="text-label"> UNDER REVIEW</p>
        <?php
        $query = mysqli_query($conn, "SELECT * FROM papers WHERE status = 'UNDER REVIEW'");
        if ($total_paper_underReview = mysqli_num_rows($query)) {
          echo '<p style="margin-bottom: 0;" class="count-number" id="underReview-count" style="color: white;"> ' . $total_paper_underReview  . '</p>';
        } else {
          echo '<p style="margin-bottom: 0;" class="count-number" id="underReview-count" style="color: white;"> 0 </p>';
        }
        ?>
      </div>
      <div class="count-progress">
        <p style="margin-bottom: 0;" class="text-label"> ACCEPTED</p>
        <?php
        $query = mysqli_query($conn, "SELECT * FROM papers WHERE status = 'TO PUBLISH'");
        if ($total_paper_toPublish = mysqli_num_rows($query)) {
          echo '<p style="margin-bottom: 0;" class="count-number" id="toPublish-count" style="color: white;"> ' . $total_paper_toPublish  . '</p>';
        } else {
          echo '<p style="margin-bottom: 0;" class="count-number" id="toPublish-count" style="color: white;"> 0 </p>';
        }
        ?>
      </div>
    </div>

    <div class="content" style="margin: 25px;">
      <table class="table table-bordered table-stripped table-hover" id="papers_tbl">
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
          function getButton($status, $id)
          {
            if($status == "to assign") {
              return '<a href="assign.php?id='.$id.'" class="assign-btn" >ASSIGN</a>';
            } else if ($status == "to review") {
              return '<a href="view.php?id='.$id.'" class="assign-btn">VIEW</a>';
            } else if ($status == "under review") {
              return '<a href="#" class="assign-btn">VIEW</a>';
            } else if  ($status == "to publish") {
              return '<a href="#" onclick="openForm()" class="assign-btn">PUBLISH</a>';
            } else {
              return '<a href="#" class="assign-btn">PUBLISHED</a>';
            }
          }
          $sql = mysqli_query($conn, "SELECT * FROM papers");
          while ($row = $sql->fetch_assoc()) {
            // Count the number of reviewers assigned
            $reviewers = explode(";", $row['reviewer']);
            $reviewer_count = count($reviewers) -1;

            $authorId = $row['author'];
            $authorQuery = mysqli_query($conn, "SELECT fullname FROM author_profile WHERE id_number = '$authorId'");
            $authorData = mysqli_fetch_assoc($authorQuery);
            $authorName = $authorData['fullname'];

            // Fetch the timestamp from the database (assuming it's in the $row['last_modified'] variable)
            $timestamp = $row['last_modified'];

            // Format the timestamp
            $formattedTimestamp = date('F j, Y', strtotime($timestamp));

            ?>
            <tr>
              <td><?= $row['id'] ?> </td>
              <td><a href="paper_view.php?id=<?= $row['id'] ?>" class="papertitle"><?= $row['research_title'] ?> </a></td>
              <td><a href="#" onclick="openProfile('<?= $authorId ?>', '<?= $authorName ?>')"><?= $authorName ?></a></td>
              <td><?= $row['Co-Author'] ?> </td>
              <td><?= $reviewer_count ?>/5</td> <!-- Display number of reviewers assigned -->
              <td><?= $formattedTimestamp ?> </td>
              <td><?= $row['status'] ?> </td>
              <td><center><?= getButton(strtolower($row['status']), $row['id']) ?></center></td>
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
            Title: <input type="text" name="subject" class="subject-input" value="" disabled> 
          </div>
          <div class="description">
            Volume: 
            <select>
            </select>
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
          <input type="submit" value="PUBLISH" name="post-announcement" style="background: #002057;   border-radius: 10px; margin: 2em;">
        </center>
      </div>
    </div>
    <div class="authorprofile" id="authorprofile" onclick="closeprofile()">
      <div class="card">
        <div class="author_photo">
          <div class="seal">
            <center>
            <img src="css/RTU_Seal 4(cropped).png" class="logo">
            <img src="css/RDC logo (cropped).png" class="logo">
          </center>
          </div>
          <img src="css/trixie.png" class="author">
        </div>
        <div class="author_table">

          <table class="author_details" id="author_details">
            <tr>
              <td>ID NUMBER</td>
              <td></td>
            </tr>
            <tr>
              <td>FULLNAME</td>
              <td></td>
            </tr>
            <tr>
              <td>DISCIPLINE</td>
              <td></td>
            </tr>
            <tr>
              <td>DESIGNATION</td>
              <td></td>
            </tr>
            <tr>
              <td>QUALIFICATION</td>
              <td></td>
            </tr>
            <tr>
              <td>AFFILIATION</td>
              <td></td>
            </tr>
          </table>
        </div>
      </div>
    </div>
  </div>
  <script>
    $(document).ready(function() {
      $('#papers_tbl').DataTable();
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

    function openForm() {
      document.getElementById("publish-form").style.display = "block";
    }

    function closeForm() {
      document.getElementById("publish-form").style.display = "none";
    }
    function openProfile(authorId, authorName) {
  $.ajax({
    url: 'php/card_author_details.php',
    type: 'POST',
    data: { authorId: authorId },
    dataType: 'json',
    success: function(response) {
      if (response.error) {
        console.log('Error:', response.error);
      } else {
        var fetchedAuthorId = response.id_number; // Use a different variable name to avoid conflict
        var fullname = response.fullname;
        var discipline = response.discipline;
        var designation = response.designation;
        var qualification = response.qualification;
        var affiliation = response.affiliation;
        
        // Update the table cells with the author's details
        $('#author_details td:nth-child(2)').eq(0).text(fetchedAuthorId); // Use the updated variable name here
        $('#author_details td:nth-child(2)').eq(1).text(fullname);
        $('#author_details td:nth-child(2)').eq(2).text(discipline);
        $('#author_details td:nth-child(2)').eq(3).text(designation);
        $('#author_details td:nth-child(2)').eq(4).text(qualification);
        $('#author_details td:nth-child(2)').eq(5).text(affiliation);
        
        // Display the author profile
        document.getElementById("authorprofile").style.display = "block";
      }
    },
    error: function(xhr, status, error) {
      console.log('AJAX Error:', error);
    }
  });
}

    function closeprofile(){
      document.getElementById("authorprofile").style.display = "none";
    }
  </script>
</div>

</body>

</html>
