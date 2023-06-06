<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/navbar.css">
    <!-- <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<header class="header">
    <div class="wrap flex">
        <div class="logo flex"><img src="css/img/rtuxrdc1.png" class="rtuheader_logo"></div>
        <nav class="navbar">
            <button class="close-nav">&#10006;</button>
            <ul class="flex">
              <li><a href="index.php" class="links">HOME</a>
              <ul>
                    <li><a href="#A1" class="links">Philosophy</a></li>
                    <li><a href="#A2" class="links">Vision</a></li>
                    <li><a href="#A3" class="links">Mission</a></li>
                    <li><a href="#A4" class="links">Focus and Scope</a></li>
                    <li><a href="#A5" class="links">Core Values</a></li>
                    <li><a href="#A6" class="links">Quality Standards</a></li>
                </ul>
              </li>
              <li><a href="current.php"  class="links">CURRENT</a></li>
              <li><a href="archive.php"  class="links">ARCHIVE</a></li>
              <li><a href="publication.php"  class="links">PUBLICATION ETHICS <i class="fas -solid fa-caret-down"></i></a>
                <ul>
                    <li><a href="" class="links">SOP</a></li>
                    <li><a href="" class="links">Author Responsibilities</a></li>
                    <li><a href="" class="links">Reviewer Responsibilities</a></li>
                    <li><a href="" class="links">Editor Responsibilities</a></li>
                    <li><a href="" class="links">Publication Responsibilities</a></li>
                </ul>
                </li>
              <li><a href="ol_submission.php" class="links">ONLINE SUBMISSION <i class="fas -solid fa-caret-down"></i></a>
                <ul>
                    <li><a href="" class="links">Reviewer Application Guidelines</a></li>
                    <li><a href="" class="links">Author Guidelines</a></li>
                    <li><a href="" class="links">Submission Format</a></li>
                </ul>
              </li>
              <li><a href="announcements.php" class="links" >ANNOUNCEMENTS</a></li>
              <li><a href="announcements.php" class="links" >DOWNLOADS <i class="fas -solid fa-caret-down"></i></a>
              <ul>
                    <li><a href="" class="links" >Forum & Colloquium</a></li>
                    <li><a href="" class="links" >REC Form</a></li>
                    <li><a href="register_author.php" class="links" >Author Application Form</a></li>
                    <li><a href="" class="links" >Reviewer Application Form</a></li>
                    <li><a href="" class="links" >Copyright Agreement</a></li>
                </ul>
              </li>
              <li><a href="about.php" class="links" >ABOUT</a></li>
              <li class="login-btn" class="sign-in" ><a href="login.php">SIGN IN</a>
            </li>
            <ul>
        </nav>
        <div class="icon-bar flex" class="links" ><span></span></div>
    </div>
</header>




<script>

let openMenu = document.querySelector('.icon-bar');
let closeMenu = document.querySelector('.close-nav');
let navMenu = document.querySelector('.navbar');
let bodyEl = document.querySelector('body');
openMenu.addEventListener('click',function(){
    navMenu.classList.add('nav-scale');
    bodyEl.classList.add('overflow-none');
});
closeMenu.addEventListener('click',function(){
    navMenu.classList.remove('nav-scale');
    bodyEl.classList.remove('overflow-none');
});

</script>

<script>
</script>
</body>
</html>