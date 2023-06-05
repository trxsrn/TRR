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
    <link rel="stylesheet" href="css/papers.css">
     <!-- FONT AWESOME ICONS -->
     <link rel="stylesheet" href="fontawesome-library/css/all.css">
    
    <!--J Query -->
    <script src="js/jquery-3.6.3.min.js"></script>

</head>
<body id="accounts">
    <section id="content">
                <div class="content-body">
                <div class="activity-log">
                        <table>
                            <tr>
                                <th colspan="4" style="text-align: left">List of for approval of Account</th>
                            </tr>
                            <tr>
                                <th colspan="4"><input type="search" placeholder="Authors Name"></th>
                            </tr>
                                <tr>
                                    <th>USER TYPE</th>
                                    <th>USER ID</th>
                                    <th>FULL NAME </th>
                                    <th>ACTION </th>
                                </tr>
                                <tbody id="trr">
                                    <?php
                                    mysqli_select_db($conn,'trr');
                                    $sql = mysqli_query($conn, "SELECT * FROM activity_log ORDER BY 'timestamp' Desc");
                                    if (! $sql)
                                    {
                                        die('Could not get data: ' . mysql_error());
                                    }
                                    while ($row = mysqli_fetch_array($sql, MYSQLI_ASSOC)) //displays the list of the employees fetched from the database
                                    {
                                        echo "<tr><td>" . $row['fullname']. "</td>
                                        <td>" . $row['user_type']. "</td>
                                        <td><a href='paper.php'>" . $row['action'] . "</a></td>
                                        <td>" . $row['timestamp']   . "</td>";
                                        echo '</tr>';		  		
                                    }
                                    mysqli_free_result($sql);
                                    echo "</table>";
                                    
                                    ?>
                                </tbody>
                        </table>
                </div>
            </div>
    </section>
<!-- Responsive Navigation Bar -->
<script src="js/admin-active-navbar.js"></script> <!--highlights the active tab --> 
<script src="js/user-page-responsive.js"></script>
</body>
</html>