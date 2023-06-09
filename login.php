<?php
   session_start();
   include 'connection.php';
   include 'navigation.php';
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <title>Login and Registration Form in HTML</title>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <script src="js/jquery-3.6.3.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
      <link rel="stylesheet" href="fontawesome-library/css/all.css">
      <link rel="stylesheet" href="css/login.css">
      <link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet">   
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.min.css">
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.all.min.js"></script>
      <title>Login TRR</title>
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
            <div class="wrapper">
               <div class="title-text">
                  <div class="title login">
                     <i class="fa-duotone fa-pen-nib"></i>&nbspAuthor
                  </div>
                  <div class="title signup">
                     <i class="fa-solid fa-book-open-reader"></i>&nbspReviewer
                  </div>
               </div>
               <div class="form-container">
                  <div class="slide-controls">
                     <input type="radio" name="slide" id="login" checked>
                     <input type="radio" name="slide" id="signup">
                     <label for="login" class="slide login"><i class="fa-sharp fa-solid fa-pen-nib"></i>&nbsp Author</label>
                     <label for="signup" class="slide signup"><i class="fa-solid fa-book-open-reader"></i>&nbsp Reviewer</label>
                     <div class="slider-tab"></div>
                  </div>
                  <div class="form-inner">
                     <form action="login-verification.php" class="login" id="loginForm" method="POST">
                        <input type="hidden" name="user_type" value="author">
                        <div class="field">
                           <input type="text" name="username" placeholder="&#xf007 Username" required>
                        </div>
                        <div class="field">
                           <input type="password" name="password" placeholder="&#xf023 Password" required>
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
                     <form action="login-verification.php" class="signup" id="signupForm" method="POST">
                        <input type="hidden" name="user_type" value="reviewer">
                        <div class="field">
                           <input type="text" name="username" placeholder="&#xf007 Username" required>
                        </div>
                        <div class="field">
                           <input type="password" name="password" placeholder="&#xf023 Password" required>
                        </div>
                        <div class="pass-link">
                           <a href="#">Forgot password?</a>
                        </div>
                        <div class="field btn">
                           <div class="btn-layer"></div>
                           <input type="submit" value="Login &#xf2f6" style="font-weight: bold;">
                        </div>
                        <div class="signup-link">
                           Create Reviewer Account? <a href="register_reviewer.php">Signup now</a>
                        </div>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>

      <script>
         const loginText = document.querySelector(".title-text .login");
         const loginForm = document.querySelector("form.login");
         const loginBtn = document.querySelector("label.login");
         const signupBtn = document.querySelector("label.signup");
         const signupLink = document.querySelector("form.signup-link a");

         signupBtn.onclick = () => {
            loginForm.style.marginLeft = "-50%";
            loginText.style.marginLeft = "-50%";
         };

         loginBtn.onclick = () => {
            loginForm.style.marginLeft = "0%";
            loginText.style.marginLeft = "0%";
         };

         signupLink.onclick = () => {
            const activeForm = document.querySelector("input[name='slide']:checked").id;
            if (activeForm === "login") {
               window.location.href = "register_author.php";
            } else if (activeForm === "signup") {
               window.location.href = "register_reviewer.php";
            }
            return false;
         };

            $(document).ready(function() {
         $('#loginForm').submit(function(event) {
            event.preventDefault();

            var formData = $(this).serialize();

            Swal.fire({
               title: 'Logging In',
               html: 'Please wait...',
               allowOutsideClick: false,
               showConfirmButton: false,
               onBeforeOpen: function() {
                  Swal.showLoading();
               }
            });

            $.ajax({
               url: $(this).attr('action'),
               type: $(this).attr('method'),
               data: formData,
               success: function(response) {
                  if (response.trim() === 'success') {
                     Swal.fire({
                        icon: 'success',
                        title: 'Login Successful',
                        text: 'Redirecting to the dashboard...',
                        showConfirmButton: false,
                        timer: 3000, // 3-second delay
                        timerProgressBar: true,
                        onBeforeOpen: function() {
                           Swal.showLoading();
                        },
                        onClose: function() {
                           var userType = $("input[name='user_type']:checked").val();
                           if (userType === 'author') {
                              window.location.href = 'users/author/dashboard.php';
                           } else if (userType === 'reviewer') {
                              window.location.href = 'users/reviewer/MyTask.php';
                           }
                        }
                     });
                  } else {
                     Swal.fire({
                        icon: 'error',
                        title: 'Login Failed',
                        text: response,
                     });
                  }
               },
               error: function() {
                  Swal.fire({
                     icon: 'error',
                     title: 'Login Failed',
                     text: 'An error occurred during the login process. Please try again later.',
                  });
               },
               complete: function() {
                  Swal.close();
               }
            });
         });
      });


      </script>
   </body>
</html>
