<?php 

include_once 'navbar.php'; 
include 'connection.php';

if (!isset($_SESSION['username'])) {

    header('Location: login.php');
    exit();
  }

    $username = $_SESSION['username'];
    $result = mysqli_query($conn, "SELECT * FROM trr_admin_accounts WHERE username='$username'");
    $row = mysqli_fetch_assoc($result);
    $fullName = $row['FullName'];
    $email = $row['email'];
    $number = $row['contact_number'];
    $affiliation = $row['affiliation'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PROFILE</title>
    <!--style-->
    <link rel="stylesheet" href="css/profile.css">
     <!-- FONT AWESOME ICONS -->
     <link rel="stylesheet" href="fontawesome-library/css/all.css">
     <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    
    <!--J Query -->
    <script src="js/jquery-3.6.3.min.js"></script>

</head>
<body id="profile">
    <section id="content">
    <div class="content-body">
            <form method="post" enctype="multipart/form-data" action="#">

                <div class="picture">
                    <?php
                            mysqli_select_db($conn, 'trr'); 
                            $result = mysqli_query($conn, "SELECT `profile_picture` FROM trr_admin_accounts WHERE id = $row[id]");  
                            while($row = mysqli_fetch_array($result))  
                            {  
                                echo '<img src="data:image/jpeg;base64,'.base64_encode($row['profile_picture']).'" alt="">';
                            }

                    ?>
                    <br>
                    <button class="save-changes-btn">EDIT PROFILE</button>
                    <br>
                    <input type="submit" value="SAVE CHANGES" class="save-changes-btn">
                </div>
                <table>
                    <tr>
                        <th>USER NAME</th>
                        <td><input type="text" class="personal-info" value="<?php echo  $username; ?>"></td>
                    </tr>
                    <tr>
                        <th>FULL NAME</th>
                        <td><input type="text" class="personal-info" value="<?php echo  $fullName; ?>"></td>
                    </tr>
                    <tr>
                        <th>BIRTH DATE</th>
                        <td><input type="text" class="personal-info" value="<?php echo  $email; ?>"S>                              </td>
                    </tr>
                    <tr>
                        <th>MOBILE NUMBER</th>
                        <td><input type="text" class="personal-info" value="<?php echo  $number; ?>"></td>
                    </tr>
                    <tr>
                        <th>EMAIL ADDRESS</th>
                        <td><input type="text" class="personal-info" value="<?php echo  $email; ?>">                                  </td>
                    </tr>
                    <tr>
                        <th>HOME ADDRESS</th>
                        <td><input type="text" class="personal-info" value="<?php echo  $number; ?>"></td>
                    </tr>

                </table>
            </form>
        </div>
    </section>
<!-- Responsive Navigation Bar -->
<script src="js/admin-active-navbar.js"></script> <!--highlights the active tab --> 
<!-- <script src="js/user-page-responsive.js"></script> -->
</body>
</html>s