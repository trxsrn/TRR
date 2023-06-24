<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="css/navigation.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<nav>
    <div class="logo">
      <a href="#"><img src="css/img/rtuxrdc1.png" class="rtuheader_logo"></a>
    </div>
    <ul class="nav-links">
      <li><a href="#">HOME </a></li>
      <li><a href="#">CURRENT</a></li>
      <li><a href="#">ARCHIVE</a></li>
      <li class="dropdown">
        <a href="#">PUBLICATION ETHICS &#9662;</a>
        <ul class="dropdown-content">
          <li><a href="#">Service 1</a></li>
          <li><a href="#">Service 2</a></li>
          <li><a href="#">Service 3</a></li>
        </ul>
      </li>
      <li class="dropdown">
        <a href="#">ONLINE SUBMISSION &#9662;</a>
        <ul class="dropdown-content">
          <li><a href="#">Service 1</a></li>
          <li><a href="#">Service 2</a></li>
          <li><a href="#">Service 3</a></li>
        </ul>
      </li>
      <li><a href="#">ANNOUNCEMENTS</a></li>
      <li class="dropdown">
        <a href="#">DOWNLOADS &#9662;</a>
        <ul class="dropdown-content">
          <li><a href="#">Service 1</a></li>
          <li><a href="#">Service 2</a></li>
          <li><a href="#">Service 3</a></li>
        </ul>
      </li>
      <li><a href="#">ABOUT</a></li>
      
      <li><a href="#" class="signinbtn">SIGN IN</a></li>
    </ul>
    <div class="burger">
      <div class="line1"></div>
      <div class="line2"></div>
      <div class="line3"></div>
    </div>
  </nav>

  <script>
    const navSlide = () => {
  const burger = document.querySelector('.burger');
  const nav = document.querySelector('.nav-links');
  const navLinks = document.querySelectorAll('.nav-links li');

  burger.addEventListener('click', () => {
    // Toggle Nav
    nav.classList.toggle('nav-active');

    // Animate Links
    navLinks.forEach((link, index) => {
      if (link.style.animation) {
        link.style.animation = '';
      } else {
        link.style.animation = `navLinkFade 0.5s ease forwards ${index / 7 + 0.3}s`;
      }
    });

    // Burger Animation
    burger.classList.toggle('toggle');
  });
};

navSlide();

  </script>
</body>
</html>
