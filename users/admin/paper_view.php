<?php 

include 'connection.php';
include 'navbar.php';

$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM papers WHERE id = '$id'");

if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);

    $title = $row['research_title'];
    $author = $row['author'];
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
  </head>
  <body>
  <section id="content">
    <div class="content-body">
        <h1><?php echo $title ?> </h1>
    </div> 
  </section>
  </body>
</html>
