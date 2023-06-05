<?php 
include 'connection.php';
include 'navbar.php';
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- GOOGLE FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500&display=swap"
rel="stylesheet"/>
    
    <!-- FONT AWESOME ICONS -->
    <link rel="stylesheet" href="fontawesome-library/css/all.css"/>
    
    <!-- JQUERY JS CONNECTION -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <!-- CSS STYLE -->
    <link rel="stylesheet" href="css/navigation.css" />
    <link rel="stylesheet" href="css/content.css" />
  </head>
  <body>
    <section id="content">
      <div class="content-body">
        <div class="contentWrapper">
          <h1> My Tasks </h1>
          <div class="searchDrop">
            <div class="search-bar">
              <input class="search" type="text" placeholder="Search..." />
              <button class="searchButton">
                <i class="fa-solid fa-magnifying-glass"></i>
              </button>
            </div>
            <div class="barDrop">
              <select>
                <option value=" " disabled selected hidden>Status</option>
                <option value="all">To Review</option>
                <option value="books">Reviewed</option>
              </select>
            </div>
          </div>
          <div class="outerdiv">
            <br>
            <br>
            <br>
            <table id="myTable">
              <tbody>
                <?php
                  function getButton($status) {
                    if($status == "to review") {
                      return '<a href="research_overview.php" class="btn" >START REVIEWING</a>';
                    } else if ($status == "under reviewing") {
                      return '<a href="reviewer_form.php" class="btn">CONTINUE REVIEWING</a> <a href="#" class="btn">MARK AS DONE</a>';
                    } else {
                      return '<a href="#" class="btn">VIEW</a>';
                    }
                  }
                  mysqli_select_db($conn,'trr');
                  $sql = mysqli_query($conn, "SELECT * FROM papers");
                  if (! $sql)
                  {
                      die('Could not get data: ' . mysql_error());
                  }
                  while ($row = mysqli_fetch_array($sql, MYSQLI_ASSOC)) 
                  {
                      echo "<tr><td class='data'>" . $row['research_title'] . 
                                            "<br>" . $row['discipline'] .
                                            "<br>" . $row['author'] . "</td>";
                      echo "<td align='center'>". getButton(strtolower($row['status'])) . "</td>";
                      echo '</tr>';			
                  }
                  mysqli_free_result($sql);
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </section>

    <!-- <script>
      $(document).ready(function() {
        setInterval(function() {
          $.ajax({
            url: "MyTask.php",
            success: function(data) {
              $('#myTable').html(data);
}
});
}, 5000); // 5000 milliseconds = 5 seconds
});
</script> -->
