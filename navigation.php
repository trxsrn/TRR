<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="css/navigation.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet">
</head>
<body>
<nav>
  <div class="burger">
    <div class="line1"></div>
    <div class="line2"></div>
    <div class="line3"></div>
  </div>
  <div class="logo">
    <a href="index.php"><img src="css/img/rtuxrdc1.png" class="rtuheader_logo"></a>
  </div>
  <ul class="nav-links">
    <li><a href="index.php">HOME</a></li>
    <li><a href="current.php">CURRENT</a></li>
    <li class="dropdown">
      <a href="publication.php" id="publicationEthicsLink">PUBLICATION ETHICS &#9662;</a>
      <ul class="dropdown-content" id="publicationEthicsDropdown">
        <li><a href="publication.php">SOP</a></li>
        <li><a href="publication.php">Author Responsibilities</a></li>
        <li><a href="publication.php">Reviewer Responsibilities</a></li>
        <li><a href="publication.php">Editor Responsibilities</a></li>
        <li><a href="publication.php">Publication Responsibilities</a></li>
      </ul>
    </li>
    <li class="dropdown">
      <a href="ol_submission.php" id="onlineSubmissionLink">ONLINE SUBMISSION &#9662;</a>
      <ul class="dropdown-content" id="onlineSubmissionDropdown">
        <li><a href="#">Reviewer Application Guidelines</a></li>
        <li><a href="C2">Author Guidelines</a></li>
        <li><a href="#">Submission Format</a></li>
      </ul>
    </li>
    <li><a href="announcements.php">ANNOUNCEMENTS</a></li>
    <li class="dropdown">
      <a href="#" id="downloadLink">DOWNLOADS &#9662;</a>
      <ul class="dropdown-content" id="downloadDropdown">
        <li><a href="#">Forum and Colloquium</a></li>
        <li><a href="#">REC Form</a></li>
        <!-- <li><a href="#">Author Application Form</a></li>  -->
        <!-- <li><a href="#">Reviewer Application Form</a></li>  -->
        <li><a href="#">Copyright Agreement</a></li>
      </ul>
    </li>
    <li><a href="#">ABOUT</a></li>
    <li class="signinbtn"><a href="login.php">SIGN IN</a></li>
  </ul>
</nav>

<script>
  const navSlide = () => {
    const burger = document.querySelector('.burger');
    const nav = document.querySelector('.nav-links');
    const navLinks = document.querySelectorAll('.nav-links li');
    const publicationEthicsLink = document.getElementById('publicationEthicsLink');
    const onlineSubmissionLink = document.getElementById('onlineSubmissionLink');
    const publicationEthicsDropdown = document.getElementById('publicationEthicsDropdown');
    const onlineSubmissionDropdown = document.getElementById('onlineSubmissionDropdown');
    const downloadLink = document.getElementById('downloadLink');
    const downloadDropdown = document.getElementById('downloadDropdown');

    burger.addEventListener('click', () => {
      // Toggle nav-active class on the nav element
      nav.classList.toggle('nav-active');
      
      // Toggle the visibility of navLinks using the forEach loop
      navLinks.forEach((link, index) => {
        if (link.style.animation) {
          link.style.animation = '';
        } else {
          link.style.animation = `navLinkFade 0.5s ease forwards ${index / 7 + 0.3}s`;
        }
      });
      
      // Toggle the toggle class on the burger element
      burger.classList.toggle('toggle');
    });

    publicationEthicsLink.addEventListener('click', (e) => {
      e.preventDefault();
      publicationEthicsDropdown.classList.toggle('active');
      onlineSubmissionDropdown.classList.remove('active');
      downloadDropdown.classList.remove('active');
    });

    onlineSubmissionLink.addEventListener('click', (e) => {
      e.preventDefault();
      onlineSubmissionDropdown.classList.toggle('active');
      publicationEthicsDropdown.classList.remove('active');
      downloadDropdown.classList.remove('active');
    });

    downloadLink.addEventListener('click', (e) => {
      e.preventDefault();
      downloadDropdown.classList.toggle('active');
      onlineSubmissionDropdown.classList.remove('active');
      publicationEthicsDropdown.classList.remove('active');
    });
  };

  navSlide();
</script>

</body>
</html>
