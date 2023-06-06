<?php
   session_start();
   include 'connection.php';
   include 'navbar.php';
   if(isset($_SESSION['id'])) header("location:users/reviewer/dashboard.php");
?>
<!DOCTYPE html>
<!-- Created By CodingNepal -->
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <title>Login and Registration Form in HTML</title>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <!-- JS JQUERY -->
      <script src="js/jquery-3.6.3.min.js"></script>
      <!-- FONT AWESOME ICONS -->
      <link rel="stylesheet" href="fontawesome-library/css/all.css">
      <link rel="stylesheet" href="css/login.css">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.min.css">
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.all.min.js"></script>

      <title>LogIn TRR</title>
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
                  <i class="fa-duotone fa-pen-nib"></i>&nbspAuthor</div>
                  <div class="title signup" >
                  <i class="fa-solid fa-book-open-reader"></i>&nbspReviewer</div>
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
                     <form action="#" class="login" id="LoginAuthor">
                        <div class="field">
                           <input type="text" name="Author_username" placeholder="&#xf007 Username" required>
                        </div>
                        <div class="field">
                           <input type="password" name ="Author_password" placeholder="&#xf023 Password" required>
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
                     <form action="#" class="signup" id="LoginReviewer">
                        <div class="field">
                              <input type="text" name="Reviewer_username" placeholder="&#xf007 Username" required>
                        </div>
                        <div class="field">
                           <input type="password" name ="Reviewer_password" placeholder="&#xf023 Password" required>
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
      
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
      <script>
         const loginText = document.querySelector(".title-text .login");
         const loginForm = document.querySelector("form.login");
         const loginBtn = document.querySelector("label.login");
         const signupBtn = document.querySelector("label.signup");
         const signupLink = document.querySelector("form .signup-link a");
         signupBtn.onclick = (()=>{
           loginForm.style.marginLeft = "-50%";
           loginText.style.marginLeft = "-50%";
         });
         loginBtn.onclick = (()=>{
           loginForm.style.marginLeft = "0%";
           loginText.style.marginLeft = "0%";
         });
         signupLink.onclick = (()=>{
           signupBtn.click();
           return false;
         });

         $("#LoginReviewer").submit( (e) => {
            e.preventDefault();
            var form = $("#LoginReviewer").serialize();
            
            $.ajax({
               url : "ajax.php",
               method: 'post',
               data: form,
               success: function(res) {
                  alert(res);
                  $("#LoginReviewer")[0].reset();
                  
               }
            })
         })


         $("#LoginAuthor").submit( (e) => {
            e.preventDefault();
            
            var form_login = $("#LoginAuthor").serialize();
            $.ajax({
               url : "login-verification.php",
               method: 'post',
               data: form_login,
               success: function(res) {
                  var data = $.parseJSON(res);
                  if (data.status == 'success') {
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
                     })
                     Toast.fire({
                     icon: 'success',
                     title: 'Signed in successfully'
                     }).then(function () {
                        window.location = 'users/reviewer/dashboard.php';   
                        });
                     
                  }else{
                     Swal.fire({
                     icon: 'error',
                     title: 'Invalid Input!',
                     text: 'Username or password is incorrect',
                     });
                  }
               }
            })
         })
      </script>
   </body>
</html>
<?php include 'footer.php'; ?>
