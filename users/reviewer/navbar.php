<?php
include 'connection.php';
session_start();

if (!isset($_SESSION['username'])) {

    // header('Location: dashboard.php');  Error message that you doesn't have an access to this page
    // exit();
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- GOOGLE FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500&display=swap" rel="stylesheet">
    <!-- FONT AWESOME ICONS -->
    <link rel="stylesheet" href="../../fontawesome-library/css/all.css">
    <!-- JQUERY JS CONNECTION -->
    <script src="js/jquery-3.6.3.min.js"></script>
    <!-- CSS STYLE -->
    <link rel="stylesheet" href="css/navigation.css">
    <link rel="stylesheet" href="css/Dashboard.css">
</head>
<body>
    <!-- Navigation Area -->
    <nav>
        <div class="nav__bar">
            <div class="nav__content">
                <span style="align-self: end;padding: .5em;box-sizing: border-box;"><i class="fa-solid fa-xmark"></i></span>
                <div class="logo__container">
                        <!-- <?php
                            mysqli_select_db($conn, 'trr'); 
                            $result = mysqli_query($conn, "SELECT `profile_picture` FROM trr_admin_accounts WHERE id = '?'");  
                                while($row = mysqli_fetch_array($result))  
                                {  
                                    echo '<img src="data:image/jpeg;base64,'.base64_encode($row['profile_picture']).'" alt="">';
                                }
                        ?> -->
                </div>
                <div class="logo__label__container">
                    <!-- <?php
                            echo "<p classs='Username__Author' style='color: var(--Nav_List);'>" . $_SESSION['username'] . "</p>";
                    ?> -->
                    <p class="label__Author" style="color:var(--Second_Color);">Reviewer</p>
                </div>
                <ul class="navigation__links">
                    <li><a href="dashboard.php">DASHBOARD</a></li>
                    <li><a href="MyTask.php">MY TASKS</a></li>
                    <li class="submission__btn "><a href="#">PAPERS &nbsp &nbsp &nbsp<i id="drp--dwn" class="fa-solid fa-caret-down"></i></a></li>
                    <div class="sub__submission__btn" style="display: none;">
                        <li style="padding-left: 1em;"><a href="account-list.php">TO REVIIEW</a></li>   
                        <li style="padding-left: 1em;"><a href="account-approval.php">REVIEWING</a></li>
                    </div>
                   

                </ul>
            </div>
        </div>
    </nav>
    <!-- Navigation Area -->

    <!-- Header -->
       <!-- DashBoard -->
    <nav class="header__nav">
        <header>
            <div class="header__box">
                <div style="display:flex;">
                    <i class="fa-solid fa-bars menu"></i>
                    <p>DASHBOARD</p>
                </div>
                <div style="display: flex;">
                    <p id="date">MARCH 01,2023</p>
                    <p id="clock" style="width:150px;">00:00AM</p>
                    <p class="bell" style="position: relative;">
                        <i class="fa-regular fa-bell"></i>
                    </p>
                    <p class="settings" style="position: relative;border-right: none;"><i class="fa-sharp fa-solid fa-gear"></i></p>
                </div>
            </div>
            
        </header>
        <section class="Upper__Nav">
            <div class="Notification__block">
                <h5 class="notif__head">Notifications</h5>
                <div class="notif__messages">
                    <div class="message">
                        <p style="font-weight: 500;">Your research has been under reviewing.</p>
                        <p>
                            <span>March 1 2023</span>&nbsp&nbsp&nbsp&nbsp
                            <span>00:00</span>
                        </p>
                    </div>
                    <div class="message">
                        <p style="font-weight: 500;">Your research has been under reviewing.</p>
                        <p>
                            <span>March 1 2023</span>&nbsp&nbsp&nbsp&nbsp
                            <span>00:00</span>
                        </p>
                    </div>
                    <div class="message">
                        <p style="font-weight: 500;">Your research has been under reviewing.</p>
                        <p>
                            <span>March 1 2023</span>&nbsp&nbsp&nbsp&nbsp
                            <span>00:00</span>
                        </p>
                    </div>
                </div>
            </div>
            <div class="Settings__block">
                <h4>Settings</h4>
                <ul>
                    <li><a href="#"><i class="fa-regular fa-moon"></i>&nbspDark Mode</a></li>
                    <li><a href="profile.php"><i class="fa-regular fa-address-card"></i>&nbspMy Information</a></li>
                    <li><a href="#"><i class="fa-solid fa-lock"></i>&nbspChange Password</a></li>
                    <li><a href="logout.php"><i class="fa-solid fa-right-from-bracket"></i>&nbspLog Out</a></li>
                </ul>
            </div>
        </section>
    </nav>
    <!-- Header -->
    <!-- Put Content Under this Comment -->
   
<script src="js/nav_control.js"></script>
</body>
</html>