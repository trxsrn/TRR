<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/footer.css">
    <!-- <link rel="stylesheet" href="https://kit.fontawesome.com/0a5defdf8d.css" crossorigin="anonymous"> -->
     <!-- FONT AWESOME ICONS -->
     <script src="https://kit.fontawesome.com/bde1b71c86.js" crossorigin="anonymous"></script>

    <title>Document</title>
</head>
<body>
    <footer class="footer-banner">
        <div class="footer-container">
            <div class="grid-content">
                <div class="collab-container">
                    <div class="collab-frame">
                        <div class="collab-img-container">
                            <img src="css/img/RTU_Seal.png" alt="" srcset="" class="logo-1">
                            <img src="css/img/RDC logo.png" alt="" srcset="" class="logo-2">
                        </div>
                    </div>
                    
                </div>
                <div class="footer-content">
                    <div class="footer-infos">
                        <div class="footer-description">
                            <h3>THE RIZALIAN REVIEW</h3>
                            <p>The Rizalian Review (TRR) is Rizal Technological University’s official peer-reviewed academic journal. It publishes all research across disciplines in order to create a common medium for the communication of information and research in various areas of scientific, academic, and professional interests.</p>
                        </div>
                        <div class="footer-contacts">
                            <div class="contacts">
                                <h3>Contact Us On:</h3>
                                <div>
                                    <p><strong><i class="fa-solid fa-phone"></i>&nbsp Telephone:</strong> 28534232</p>
                                    <?php
                                        $recipient = "tlsoriano@rtu.edu.ph"; // Replace with the desired recipient's email address
                                        $subject = "Your email subject"; // Replace with the desired subject for the email

                                        // Generate the URL for composing a new email in Gmail
                                        $gmailComposeUrl = "https://mail.google.com/mail/?view=cm&fs=1&to=" . urlencode($recipient) . "&su=" . urlencode($subject);

                                        // Generate the HTML link
                                        $linkHtml = '<p><strong><a href="' . $gmailComposeUrl . '" style="color: white; text-decoration: none;" ><i class="fa-solid fa-envelope"></i>&nbsp Email:</strong> rdc@rtu.edu.ph</a></p>';

                                        echo $linkHtml;
                                    ?>
                                    <p><strong><a href="https://www.rtu.edu.ph/" target="_blank" style="color: white; text-decoration: none;"><i class="fa-solid fa-link"></i>&nbsp Link:</strong> rtu.edu.ph</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>

