<?php 

include 'connection.php';
include 'navbar.php';

$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM papers WHERE id = '$id'");

if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);

    $title = $row['research_title'];
    $author = $row['author'];

    $authornameGet = mysqli_query($conn, "SELECT fullname FROM author_profile WHERE id_number = '$author'");
    $authorData = mysqli_fetch_assoc($authornameGet);
    $authorName = $authorData['fullname'];

    $discipline = $row['discipline'];
    $co_author = $row['Co-Author'];
    $reviewer = $row['reviewer'];

} else {
    // Handle the case when no rows are found or query execution fails
    echo "No reviewer profile found for the given ID.";
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/paper_view.css">

    <!-- TABLE  -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap4.min.css" rel="stylesheet" />

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap4.min.js"></script>

  </head>
  <body>
  <section id="content">
    <div class="content-body">
        <h3><a href="papers.php"><?php echo $title ?></a></h3>
        <h6>Discipline: <?php echo $discipline ?> </h6>
        <h6>Author: <?php echo $authorName ?></a></h6>
        <h6>Co-Author/s: <?php echo $co_author ?></a></h6>
        <table class="table table-bordered table-stripped table-hover" id="papers_tbl">
          <tr>
            <th>Filename</th>
            <th>Submitted Date</th>
            <th>Remark</th>
          </tr>

        </table>
    </div> 
  </section>
  <script>
     $(document).ready(function() {
      $('#papers_tbl').DataTable();
    });
  </script>
  </body>
</html>
