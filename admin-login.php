<?php 

include 'navbar.php';
include 'connection.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <!-- JS JQUERY -->
    <script src="/js/jquery-3.6.3.min.js"></script>
     <!-- FONT AWESOME ICONS -->
     <script src="https://kit.fontawesome.com/bde1b71c86.js" crossorigin="anonymous"></script>
     <!-- ALERT -->
     <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <title>Document</title>
</head>
<body>
    <section class="user-form">
        <div class="form-frame">
            <div class="form-container">
                <div class="slideshow">
                    <div class="slide-images-frame">
                        <div class="slide-images-container" >
                            <div class="n-image m1" style="background-color: blue;">
                                <img src="css/img/covers/1.jpg" alt="" srcset="" class="slide-image">
                            </div>
                            <div class="n-image" style="background-color: red;">
                                <img src="css/img/covers/2.jpg" alt="" srcset="" class="slide-image">
                            </div>
                            <div class="n-image" style="background-color: green;">
                                <img src="css/img/covers/3.jpg" alt="" srcset="" class="slide-image">
                            </div>
                            <div class="n-image" style="background-color: orange;">
                                <img src="css/img/covers/4.jpg" alt="" srcset="" class="slide-image">
                            </div>
                            <div class="n-image" style="background-color: white;">
                                <img src="css/img/covers/5.jpg" alt="" srcset="" class="slide-image">
                            </div>
                            <div class="n-image m1" style="background-color: blue;">
                                <img src="css/img/covers/1.jpg" alt="" srcset="" class="slide-image">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="fillup-form">

                    <form method="POST" action="login-verification.php" id="login-form" style ="height:100%;">    
                         
                        <div class="RTU-RDC-Admin">
                            <i class="fa-sharp fa-solid fa-user-secret"></i>
                            <h1>Admin Login</h1>
                        </div>
                        <div class="forms">
                            <div class="inp">
                                <input type="text" name="username"  placeholder="&#xf007 Username" id="username" required>
                            </div>
                            <div class="inp">
                                <input type="password" name="password" placeholder="&#xf023 Password" id="username" required>
                            </div>
                        
                            <div class="forgot-container">
                                <a href="#">Forgot Username/Password?</a>
                            </div>

                            <button type="submit" class="button_submit" name="login">Log In &nbsp <i class="fa-solid fa-right-to-bracket"></i></button>
                        </div>
                    </form>
                    <div class="error-message"></div>
                    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                    <script src="login.js"></script>
                </div>
            </div>
        </div>
    </section>
<script src="/js/switch.js"></script>  
<!-- <script src="script.js"></script> -->
</body>
</html>

<?php include 'footer.php' ?>