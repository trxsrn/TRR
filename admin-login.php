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
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.min.css">
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.all.min.js"></script>
      <script src="js/jquery-3.6.3.min.js"></script>
   </head>
   <body>
      <div class="container">
         <div class="slide-container">
            <div class="slide-form-area">
               <div class="slide-form">
                  <div>
                     <img src="css/img/covers/COVER ISSUE SAMPLE.png" alt="" srcset="" class="covers" style="background-color: red;">
                  </div>
                  <div>
                     <img src="css/img/covers/COVER ISSUE SAMPLE.png" alt="" srcset="" class="covers" style="background-color: green;">
                  </div>
                  <div>
                     <img src="css/img/covers/COVER ISSUE SAMPLE.png" alt="" srcset="" class="covers" style="background-color: yellow;">
                  </div>
                  <div>
                     <img src="css/img/covers/COVER ISSUE SAMPLE.png" alt="" srcset="" class="covers" style="background-color: orange;">
                  </div>
                  <div>
                     <img src="css/img/covers/COVER ISSUE SAMPLE.png" alt="" srcset="" class="covers" style="background-color: orangered;">
                  </div>
                  <div>
                     <img src="css/img/covers/COVER ISSUE SAMPLE.png" alt="" srcset="" class="covers" style="background-color: pink;">
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
                     <form action="#" class="login" id="LoginAdmin">
                        <div class="field">
                           <input type="text" name="Admin_username" placeholder="&#xf007 Username" required>
                        </div>
                        <div class="field">
                           <input type="password" name ="Admin_password" placeholder="&#xf023 Password" required>
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
      
      <script src="js/jquery-3.6.3.min.js"></script>
      <script src="js/sweetalert2.min.js"></script>
      <script>
         $(() => {
            $("#LoginAdmin").submit((e) => {
               e.preventDefault();
               
               var form_login = $("#LoginAdmin").serialize();
               $.ajax({
                  url: "admin_login_verify.php",
                  method: 'post',
                  data: form_login,
                  success: function(response) {
                     if (response.status === 'success') {
                        const Toast = Swal.mixin({
                           toast: true,
                           position: 'top-end',
                           showConfirmButton: false,
                           timer: 2000,
                           timerProgressBar: true,
                           didOpen: (toast) => {
                              toast.addEventListener('mouseenter', Swal.stopTimer)
                              toast.addEventListener('mouseleave', Swal.resumeTimer)
                           }
                        });
                        Toast.fire({
                           icon: 'success',
                           title: 'Signed in successfully'
                        }).then(function() {
                           window.location = 'users/reviewer/dashboard.php';
                        });
                     } else {
                        Swal.fire({
                           icon: 'error',
                           title: 'Invalid Input!',
                           text: 'Username or password is incorrect',
                        });
                     }
                  },
                  error: function(xhr, status, error) {
                     Swal.fire({
                        icon: 'error',
                        title: 'AJAX Error',
                        text: 'An error occurred while making the AJAX request: ' + error,
                     });
                  }
               });
            });
         });
      </script>
   </body>
</html>

<?php include 'footer.php'; ?>
