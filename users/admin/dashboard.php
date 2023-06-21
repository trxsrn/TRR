<?php 

include_once 'navbar.php'; 
include 'connection.php';

if (!isset($_SESSION['username'])) {

    header('Location: nopermission.php');
    exit();
  }

    $username = $_SESSION['username'];
    $result = mysqli_query($conn, "SELECT * FROM trr_admin_accounts WHERE username='$username'");
    $row = mysqli_fetch_assoc($result);
    $fullName = $row['FullName'];
    $email = $row['email'];
    $number = $row['contact_number'];
    $affiliation = $row['affiliation'];

    $sql = "SELECT * FROM papers";

    $result = $conn->query($sql);
    
    // Create an empty array to store discipline counts
    $disciplines = array("Digital & Transformative Education", 
                        "Culture, Arts, and Humanities", 
                        "Psychology & Social Sciences", 
                        "Business Innovation & Technopreneurship", 
                        "Human Kinetics & Sports Science", 
                        "Engineering & Technology", 
                        "Policy & International Studies", 
                        "Urban Agriculture & Plant Biotechnology", 
                        "Mushroom Biotechnology", 
                        "Gender & Inclusive Education Studies", 
                        "Research to Extension", 
                        "Astronomy & Space Science Satellite Technology", 
                        "Environmental & Climate Change Studies", 
                        "Data Science & Smart Analytics");


    $counts = array();
    foreach ($disciplines as $discipline) {
        $counts[$discipline] = 0;
    }

    // Query the database to count the occurrences of each discipline
    $query = "SELECT discipline FROM papers WHERE status ='PUBLISHED'";
    $result = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_assoc($result)) {
        $discipline_list = explode("/", $row['discipline']);
        foreach ($discipline_list as $discipline) {
            if (array_key_exists($discipline, $counts)) {
                $counts[$discipline]++;
            }
        }
    }

    // Sort the disciplines by count in descending order
    arsort($counts);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DASHBOARD</title>
    <!-- FONT AWESOME ICONS -->
    <link rel="stylesheet" href="../../../fontawesome-library/css/all.css">
    <!-- STYLESHEET -->
    <link rel="stylesheet" href="css/Dashboard.css">
</head>
<body id="dashboard">
    <section id="content">
        <div class="content-body">
                <div class="summary">
                    <div class="count-summary" id="authors">
                    <i class="fa-solid fa-pen-nib" style="color: white; opacity: 50%; font-size: 30px; float: left; margin: .2em;"></i>
                        <div class="text">
                            <?php 
                                    $query = mysqli_query( $conn, "SELECT * FROM author_profile");
                                    if($total_authors = mysqli_num_rows($query))
                                    {  
                                        echo '<p class="count"> ' . $total_authors  . '</p>';
                                    }
                                    else
                                    {
                                        echo '<p class="count"> 0 </p>';
                                    }
                            ?>
                            <span class="author-label"> Author/s </span>
                        </div>
                    </div>
                    <div class="count-summary" id="reviewers">
                    <i class="fa-solid fa-book-open" style="color: white; opacity: 50%; font-size: 30px; float: left; margin: .2em;"></i>
                        <div class="text">
                        <?php 
                                    $query = mysqli_query( $conn, "SELECT * FROM reviewer_profile");
                                    if($total_reviewer = mysqli_num_rows($query))
                                    {  
                                        echo '<p class="count"> ' . $total_reviewer  . '</p>';
                                    }
                                    else
                                    {
                                        echo '<p class="count"> 0 </p>';
                                    }
                            ?>
                            <span class="reviewer-label"> Reviewer/s </span>
                        </div>
                    </div>
                </div> 
                <div class="summary">
                    <div class="count-progress" id="to_review">
                                <p class="text-label"> To Review &nbsp &nbsp<i class="fa-solid fa-chevron-right"></i></p>
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
                    <div class="count-progress" id="to_publish">
                                <p class="text-label"> To Publish &nbsp &nbsp<i class="fa-solid fa-chevron-right"></i></p>
                                <?php   
                                $query = mysqli_query( $conn, "SELECT * FROM papers WHERE status='TO PUBLISH'");
                                    if($total_papers = mysqli_num_rows($query))
                                    {  
                                        echo '<p class="count-number"> ' . $total_papers  . '</p>';
                                    }
                                    else
                                    {
                                        echo '<p class="count-number"> 0 </p>';
                                    }
                            ?>
                    </div>
                    <div class="count-progress" id="published">
                                <p class="text-label"> Published &nbsp &nbsp<i class="fa-solid fa-chevron-right"></i></p>
                                <?php   
                                $query = mysqli_query( $conn, "SELECT * FROM papers WHERE status='PUBLISHED'");
                                    if($total_papers = mysqli_num_rows($query))
                                    {  
                                        echo '<p class="count-number"> ' . $total_papers  . '</p>';
                                    }
                                    else
                                    {
                                        echo '<p class="count-number"> 0 </p>';
                                    }
                            ?>
                    </div>
                    <div class="count-progress" id="issues">
                                <p class="text-label"> Issues &nbsp &nbsp<i class="fa-solid fa-chevron-right"></i></p>
                                <?php
                                    $query = mysqli_query( $conn, "SELECT * FROM papers");
                                    if($total_authors = mysqli_num_rows($query))
                                    {  
                                        echo '<p class="count-number"> ' . $total_authors  . '</p>';
                                    }
                                    else
                                    {
                                        echo '<p class="count-number"> 0 </p>';
                                    }
                                ?>
                    </div>
                </div>
                <div class="records">
                    <div class="disciplines">
                        <table class="discipline-table">
                            <tr>
                                <!-- Based on the number of papers have been published -->
                                <th colspan="2" class="discipline-title">SUMMARY OF RESEARCH DISCIPLINES BY PUBLISHED PAPERS</th>
                            </tr>
                            <?php 

                                $i = 0;
                                foreach ($counts as $discipline => $count) {
                                    if ($i >= 8) {
                                        break;
                                    }
                                    echo "<tr>";
                                    echo "<td>" . $discipline . "</td>";
                                    echo "<td>" . $count . "</td>";
                                    echo "</tr>";
                                    $i++;
                                }
                                ?>
                            <tr>
                                <!-- Based on the number of papers have been published -->
                                <th colspan="2" class="discipline-footer"><button onclick="viewMore()">See More</button></th>
                            </tr>
                        </table>
                    </div>
                    <div class="activity-log">
                        <table class="activity-log-table">
                            <tr>
                                <th colspan="4" class="discipline-title">ACTIVITY LOG</th>
                            </tr>
                                    <tr>
                                        <th>USER TYPE</th>
                                        <th>ACTION </th>
                                        <th>TIMESTAMP </th>
                                    </tr>
                                    
                                    <?php
                                        mysqli_select_db($conn,'trr');
                                        $sql = mysqli_query($conn, "SELECT * FROM activity_log ORDER BY id DESC LIMIT 5");
                                        
                                        if (mysqli_num_rows($sql) == 0) {
                                            echo "<th colspan='4'>No activity found.</th>";
                                        } else {
                                            while ($row = mysqli_fetch_array($sql, MYSQLI_ASSOC)) {

                                                $timestamp = $row['timestamp'];
                                                $formattedTimestamp = date('F j, Y', strtotime($timestamp));
                                                echo "<tr>
                                                    <td>" .$row['user_type'] . "</td>
                                                    <td>" .$row['action'] . "</td>
                                                    <td>" .$formattedTimestamp  . "</td>";
                                                echo '</tr>';	
                                            }	  
                                        }
                                        
                                        mysqli_free_result($sql);
                                    ?>

                            <tr>
                                <th colspan="4" class="discipline-footer">See More</th>
                            </tr>
                            </table>
                    </div>
                </div>
                <div class="ranking" id="ranking" onclick="close()">
                    <div class="overall-ranking">
                        <h1 class="ranking-headers"> RANKING OF DISCIPLINES ACCORDING TO PUBLISHED PAPERS </h1>
                        <!-- <button class="" onclick="close()"><i class="fa-solid fa-xmark"></i></button> -->
                            <table>
                                <?php 
                                    foreach ($counts as $discipline => $count) {
                                        echo "<tr>";
                                        echo "<td>" . $discipline . "</td>";
                                        echo "<td>" . $count . "</td>";
                                        echo "</tr>";
                                    }
                                    ?>
                            </table>
                    </div>
                </div>
    </section>
<script>
    function viewMore() 
    {
    document.getElementById("ranking").style.display = "block";
    }

    function close() 
    {
    document.getElementById("ranking").style.display = "none";
    }
    document.getElementById("authors").addEventListener("click", function() 
    {
        window.location.href = "author.php";
    });
    document.getElementById("reviewers").addEventListener("click", function() 
    {
    window.location.href = "reviewer.php";
    });
    document.getElementById("to_review").addEventListener("click", function() 
    {
        window.location.href = "papers.php";
    });
    document.getElementById("to_publish").addEventListener("click", function() 
    {
    window.location.href = "papers.php";
    });

</script>
<script src="js/admin-active-navbar.js"></script>
</body>
</html>