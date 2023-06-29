<?php 

include 'navigation.php';
include 'connection.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/home.css">
    <title>HOME</title>
</head>
<body>
<div class="slideshow-container">
  <?php
    mysqli_select_db($conn, 'trr'); 
    $result = mysqli_query($conn, "SELECT `image` FROM web WHERE banner_id >= 1 AND banner_id <= 8 ORDER BY banner_id");  
    while($row = mysqli_fetch_array($result)) {
      $filePath =  $row['image'];
      echo '<div class="mySlides fade">';
      echo '<img src="users/admin/css/banners/'.$filePath.'" alt="">';
      echo '</div>';
    }
  ?>
</div>

<div style="text-align:center; padding: 5px; background: #ffc001;">
  <?php
    mysqli_data_seek($result, 0);
    $index = 0;
    while($row = mysqli_fetch_array($result)) {
      $filePath =  $row['image'];
      echo '<img src="users/admin/css/banners/'.$filePath.'" alt="" class="thumbnail" onclick="currentSlide('.($index + 1).')">';
      $index++;
    }
  ?>
</div>

<script>
  let slideIndex = 0;
  showSlides(slideIndex);

  function plusSlides(n) {
    showSlides(slideIndex += n);
  }

  function currentSlide(n) {
    showSlides(slideIndex = n);
  }

  function showSlides(n) {
    let i;
    let slides = document.getElementsByClassName("mySlides");
    let thumbnail = document.getElementsByClassName("thumbnail");

    if (n > slides.length) {
      slideIndex = 1;
    }
    
    if (n < 1) {
      slideIndex = slides.length;
    }

    for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
    }

    slideIndex++;

    if (slideIndex > slides.length) {
      slideIndex = 1;
    }

    for (i = 0; i < thumbnail.length; i++) {
      thumbnail[i].className = thumbnail[i].className.replace(" active", "");
    }

    slides[slideIndex-1].style.display = "block";
    thumbnail[slideIndex-1].className += " active";

    setTimeout(showSlides, 5000);
  }
</script>

        <div class="current">
            <img src="css/img/covers/COVER ISSUE SAMPLE.png" class="cover-page">
                <div class="current-issue">
                    <h1 class="current-title"> CURRENT </h1>
                    <h2 class="current-sub"> VOLUME NO. # ISSUE NO. </h2>
                    <h1 class="current-issue-count"">1</h1>
                    <a href="current.php" class="current-link">LEARN MORE</a>
                </div>
        </div>
    <div class="content">
        <div class="values">
            <h2> FOREWORD</h2>
                    <p>The Rizalian Review (TRR) is Rizal Technological 
                        University’s official peer-reviewed academic journal. 
                        It publishes all research across disciplines in order 
                        to create a common medium for the communication of 
                        information and research in various areas of scientific, 
                        academic, and professional interests.
                    </p>
            <h2 id="A1"> PHILOSOPHY </h2>
            <p>The Rizal Technological University believes in nurturing the creative potentials 
                of Filipinos to excel in a dynamic world order and advocates commitment
                to global peace and sustainable development along with sense of moral 
                responsibility and cultural patronage.
            </p>

            <h2 id="A2"> VISION </h2>
            <p>A leading technology-driven university responsive to the development needs of changing societies.
            </p>
            <h2 id="A3"> MISSION </h2>
            <p>To develop globally competitive and socially responsible professionals through 
                technology-driven instructions, innovative researches,
                sustainable extension programs that will enhance the lives 
                of people in the communities.
            </p>
            <h2 id="A4">FOCUS AND SCOPE</h2>
            <p>The Rizalian Review is a scholarly publication dedicated to the advancement of education 
                and new approaches to teaching. To further develop TTR's research goals, the following 
                research agenda must be practiced:</p>
                <li style="padding-left: 20px;" class="goal">RTU's reputation as a research institution needs to be established.</li>
                <li style="padding-left: 20px;" class="goal">Improve the connection between classroom instruction, academic inquiry, and creative output.</li>
                <li style="padding-left: 20px;" class="goal">Make both professors and students more productive in their research.</li>
                <li style="padding-left: 20px;" class="goal">Encourage a lively culture of research and an environment for research.</li>
                <li style="padding-left: 20px;" class="goal">Obtain research sponsorships</li>
                <li style="padding-left: 20px;" class="goal">Pursue RTU-government-business-industry synergistic partnerships.</li>
              
                <p>The main aim of research at RTU is to enhance knowledge and improve its educational programs, leading to a more enriching learning environment and supporting the economic growth of both the local community and the nation as a whole. To expand its research efforts, the Research and Development Center encourages collaboration between different departments to generate fresh perspectives, concepts, and approaches, ultimately leading to new ways of thinking.
            </p>
            <h2 id="A5"> CORE VALUES OF RESEARCH </h2>
            <p><li style="padding-left: 20px;"><a onclick="document.getElementById('excellence-desc').style.display='block'" style="text-decoration: underline">Excellence</a>
                        <p id="excellence-desc" style="display:none">
                        Excellence is a top priority at the university in all disciplines. When offering programs and services, our administration, instructors, and professional staff do it with skill and compassion. Our mission is to provide students with a research-based education emphasizing creativity, innovation, and a culture of excellence. Excellence in research, creative work, teaching, and community involvement are values we hold in high regard. Excellence requires constant improvement and the rejection of complacency.</p>
                </li>
                <li style="padding-left: 20px;"><a onclick="document.getElementById('integrity-desc').style.display='block'" style="text-decoration: underline">Integrity</a>
                        <p id="integrity-desc" style="display:none">
                        Our university operates with a strong commitment to integrity and transparency, upholding the highest ethical standards to earn and maintain the trust of our community. As a public institution, we take seriously our responsibility to educate and develop responsible citizens and address societal challenges. We hold ourselves accountable for our use of public resources and for delivering high-quality education.
 
                        </p>
                </li>
                <li style="padding-left: 20px;"><a onclick="document.getElementById('responsiveness-desc').style.display='block'" style="text-decoration: underline">Responsiveness</a>
                        <p id="responsiveness-desc" style="display:none">
                        In providing useful and beneficial programs and services, our top priority is to produce graduates who are better prepared to meet the demands and expectations of the labor market. To ensure that our programs remain relevant and up-to-date with regional and national needs, we consistently review, update, and establish new policies and standards. Our goal is to foster a sense of community by engaging in various support and service activities; encouraging environmental awareness and disaster readiness. All our work is carried out with a strong ethical and moral consciousness, and with a service-oriented leadership approach.

                </p></li>
                <li style="padding-left: 20px;"><a onclick="document.getElementById('cultural_diversity-desc').style.display='block'" style="text-decoration: underline">Cultural Diversity</a>
                        <p id="cultural_diversity-desc" style="display:none">
                        Our institution is committed to promoting multicultural awareness in education and civic engagement. We encourage collaboration and teamwork while valuing and respecting individual differences, including age, culture, race, religion, and sexual orientation. Our students, as well as our teaching staff and administrative personnel, are actively encouraged to participate in a variety of partnerships and collaborations that make a positive impact on communities not only locally but also nationally and internationally.



                </p>
                </li>
            </p>
            <h2 id="A6"> QUALITY STANDARDS </h2>
            <p><li style="padding-left: 20px;"><a onclick="document.getElementById('acad-excellence-desc').style.display='block'" style="text-decoration: underline">Academic Excellence</a>
                        <p id="acad-excellence-desc" style="display:none">
                        In their area of expertise, a skilled practitioner demonstrates a firm grasp of fundamental principles and techniques essential to their work. They are capable of locating, evaluating, applying, and integrating relevant information and innovative technology to facilitate their continuous learning. Practitioners in their area of specialization exhibit the ability to generate innovative solutions to problems and complete tasks efficiently. They actively engage in research and integrate new knowledge and emerging technologies into their practices to continuously improve. Their expertise enables them to perform their duties with excellence, utilizing a range of skills and knowledge.
                <li style="padding-left: 20px;"><a onclick="document.getElementById('comms-skills-desc').style.display='block'" style="text-decoration: underline">Communication Skills</a>
                        <p id="comms-skills-desc" style="display:none">
                        In the field of practice, effective communication is a key skill, encompassing verbal, written, and visual modes of conveying information. A competent practitioner should possess the ability to not only present technical, graphical, and numerical data but also listen attentively to the perspectives of others. Additionally, they must be able to articulate their ideas with clarity and brevity.
                        </p>
                </li>
                <li style="padding-left: 20px;"><a onclick="document.getElementById('creative-thinking-desc').style.display='block'" style="text-decoration: underline">Creative and Analytical Thinking</a>
                        <p id="creative-thinking-desc" style="display:none">
                        A practitioner applies their analytical reasoning capacity, problem-solving abilities to resolve issues, creative thinking to generate innovative ideas, and critical thinking to develop original solutions leading to new outcomes. A practitioner exhibits their talent in formulating creative and distinctive approaches to problems, as well as the foresight to anticipate future requirements.

                </p></li>
                <li style="padding-left: 20px;"><a onclick="document.getElementById('productivity-desc').style.display='block'" style="text-decoration: underline">Productivity</a>
                        <p id="productivity-desc" style="display:none">
                        The steadfast dedication of a practitioner to continuously improve oneself and society includes refining their abilities, gaining information via experience, and honing their expertise and personal attributes for improved performance. Further, practitioners in the field know how to best employ technology to boost national development.
                </p>
                </li>

                <li style="padding-left: 20px;"><a onclick="document.getElementById('lifelong-desc').style.display='block'" style="text-decoration: underline">Lifelong Learning</a>
                        <p id="lifelong-desc" style="display:none">
                        A practitioner is a lifelong learner who can keep learning and thinking about the world and himself to understand them both better. They strive to understand and navigate the complexities of their chosen field while also maintaining a broad perspective on the world and their place within it. A practitioner is motivated to have a positive impact on society and their community by contributing their knowledge and skills to the greater good.

                <li style="padding-left: 20px;"><a onclick="document.getElementById('inter-skills-desc').style.display='block'" style="text-decoration: underline">Interpersonal Skills</a>
                        <p id="inter-skills-desc" style="display:none">
                        A practitioner must possess a high degree of skill in teamwork, which involves effective collaboration and cooperation within agreed-upon frameworks. This requires being sensitive to the unique demands of intergenerational, gender, and cross-cultural environments, as well as practicing mutual respect for others and utilizing conflict reduction strategies to negotiate productive outcomes. Additionally, a practitioner should be capable of leading a team in a constructive, sensitive, and proactive manner. They should take initiative and engage others towards achieving common goals, always striving to drive positive outcomes. These qualities enable graduates to excel in a dynamic and constantly-evolving professional landscape.

                </li>
                <li style="padding-left: 20px;"><a onclick="document.getElementById('job-skills-desc').style.display='block'" style="text-decoration: underline">Job Skills</a>
                        <p id="job-skills-desc" style="display:none">
                        As a practitioner, it is essential to have a solid understanding of the fundamental theoretical and technical principles that support your field and to be able to interpret them within your work. In addition, a graduate must show high learning abilities and demonstrate a commitment to continued personal and professional development. This comprises maintaining and enhancing knowledge and skills directly applicable to one's position and industry. A practitioner can keep up with the newest trends and practices and satisfy the needs of their professional environment by continual learning and adaptation.

                </p></li>
                <li style="padding-left: 20px;"><a onclick="document.getElementById('attitude-desc').style.display='block'" style="text-decoration: underline">Attitude</a>
                        <p id="attitude-desc" style="display:none">
                        A practitioner exemplifies a strong work ethic and a willingness to climb the professional ladder. They value obedience and exhibit respect towards authority figures while also practicing the principles of thriftiness. Beyond these qualities, a practitioner also demonstrates a high level of ethical awareness and a deep sense of compassion. They are dedicated to performing to the best of their abilities in any given situation, adapting to the diverse, challenging, and unpredictable nature of today's work environment.

                </p>
                </li>
            </p>
    </div>
    <div class="events-column">
        <h3 class="recent-events">Recent Events </h3>
        <iframe src="https://www.facebook.com/plugins/post.php?href=https%3A%2F%2Fwww.facebook.com%2Fpermalink.php%3Fstory_fbid%3Dpfbid03c92eymp5gyL6xcURLXbx2nEScFPG6aZMs3cZ4jtwxDd5AhX8r4dPzsawEA388mql%26id%3D100063883637726&show_text=true&width=500" width="325" height="225 " style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
        <iframe src="https://www.facebook.com/plugins/post.php?href=https%3A%2F%2Fwww.facebook.com%2Fpermalink.php%3Fstory_fbid%3Dpfbid0kZZv3D1j3ptiE1KxrwczXAnn67zN8f4dRX4W8SMKjfa6g3F3Y7qXUrUSwk8ZTcUSl%26id%3D100063883637726&show_text=false&width=500" width="325" height="225" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
        <iframe src="https://www.facebook.com/plugins/post.php?href=https%3A%2F%2Fwww.facebook.com%2Fpermalink.php%3Fstory_fbid%3Dpfbid0FAFbYYpvZJV1zySZZpFVDpzpiHhAuCzxiThvtY51EQTek1LNCqeB4Jmk9e1wpXpZl%26id%3D100063883637726&show_text=false&width=500" width="325" height="225" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
    </div>
</body>
</html>

<?php include 'footer.php' ?>