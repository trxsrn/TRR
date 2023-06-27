<?php
   session_start();
   include 'connection.php';
   include 'navbar.php';
   if(isset($_SESSION['id'])) header("location:users/admin/dashboard.php");
?>

<!DOCTYPE html>
<!-- Created By CodingNepal -->
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>LogIn TRR</title>
      <!-- FONT AWESOME ICONS -->
      <link rel="stylesheet" href="fontawesome-library/css/all.css">
      <link rel="stylesheet" href="css/login.css">
      <link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet">
      <script src="js/jquery-3.6.3.min.js"></script>
   </head>
   <body>
      <div class="container">
         <div class="slide-container">
            <div class="slide-form-area">
               <div class="slide-form">
                  <div>
                     <img src="css/img/covers/The Rizalian Review Cover Page.png" alt="" srcset="" class="covers" style="background-color: red;">
                  </div>
                  <div>
                     <img src="css/img/covers/The Rizalian Review Cover Page.png" alt="" srcset="" class="covers" style="background-color: green;">
                  </div>
                  <div>
                     <img src="css/img/covers/The Rizalian Review Cover Page.png" alt="" srcset="" class="covers" style="background-color: yellow;">
                  </div>
                  <div>
                     <img src="css/img/covers/The Rizalian Review Cover Page.png" alt="" srcset="" class="covers" style="background-color: orange;">
                  </div>
                  <div>
                     <img src="css/img/covers/The Rizalian Review Cover Page.png" alt="" srcset="" class="covers" style="background-color: orangered;">
                  </div>
                  <div>
                     <img src="css/img/covers/The Rizalian Review Cover Page.png" alt="" srcset="" class="covers" style="background-color: pink;">
                  </div>
               </div>
            </div>
         </div>

         <div class="wrap-container">
            <div class="wrapper" >
               <div class="title-text">
                  <div class="title login" >
                  <i class="fa-sharp fa-solid fa-user-secret"></i><br>ADMIN</div>
               </div>
               <div class="form-container">
                  <div class="form-inner">
                     <form action="admin_login_verify.php" class="login" method="POST" >
                        <div class="field">
                           <input type="text" name="username" placeholder="&#xf007 Username" required>
                        </div>
                        <div class="field">
                           <input type="password" name ="password" placeholder="&#xf023 Password" required>
                        </div>
                        <div class="pass-link">
                           <a href="#">Forgot password?</a>
                        </div>
                        <div class="field btn">
                           <div class="btn-layer"></div>
                           <input type="submit" value="Login &#xf2f6" style="font-weight: bold;">
                        </div>
                        <div class="signup-link">
                           Create Author Account? <a href="register_author.php">Signup now</a>
                        </div>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </body>
</html>

<?php include 'footer.php'; ?>
