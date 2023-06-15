<?php 

include_once 'navbar.php'; 
include 'connection.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WEBSITE</title>
    <!--style-->
    <link rel="stylesheet" href="css/website.css">
     <!-- FONT AWESOME ICONS -->
     <link rel="stylesheet" href="fontawesome-library/css/all.css">

</head>
<body id="website">
    <section id="content">
        <div class="content-body">
        <div class="customize-banner">
    <form action="php/submit-details.php" method="post" enctype="multipart/form-data">
        <table>
            <tr>
                <th class="title">BANNERS</th>
                <th class="action"> <input type="submit" value="SAVE CHANGES" name="save-banner"> </th>
            </tr>
        </table>
        <div class="form">
            <div class="grid">
                <?php
                $bannerIds = [1, 2, 3, 4, 5, 6, 7, 8];
                mysqli_select_db($conn, 'trr'); 
                foreach ($bannerIds as $bannerId) {
                    $result = mysqli_query($conn, "SELECT `image` FROM web WHERE banner_id = '$bannerId'");
                    $imageData = '';
                    while ($row = mysqli_fetch_array($result)) {
                        $imageData = $row['image'];
                    }
                    $imageSrc = 'css/banners/' . $imageData;
                ?>
                <div class="form-element">
                    <input type="file" id="file-<?php echo $bannerId; ?>" accept="image/*" name="img<?php echo $bannerId; ?>">
                    <label for="file-<?php echo $bannerId; ?>" id="file-<?php echo $bannerId; ?>-preview">
                        <?php if (!empty($imageSrc) && file_exists($imageSrc)) { ?>
                        <img src="<?php echo $imageSrc; ?>" alt="">
                        <?php } ?>
                        <div>
                            <span>+</span>
                        </div>
                    </label>
                </div>
                <?php } ?>
            </div>
        </div>
        <script>
            function previewBeforeUpload(id) {
                document.querySelector("#" + id).addEventListener("change", function (e) {
                    if (e.target.files.length == 0) {
                        return;
                    }
                    let file = e.target.files[0];
                    let url = URL.createObjectURL(file);
                    document.querySelector("#" + id + "-preview div").innerText = file.name;
                    document.querySelector("#" + id + "-preview img").src = url;
                });
            }

            <?php foreach ($bannerIds as $bannerId) { ?>
            previewBeforeUpload("file-<?php echo $bannerId; ?>");
            <?php } ?>
        </script>
    </form>
</div>


            <div class="announcements">
                <table >
                    <tr>
                        <th class="title">ANNOUNCEMENTS</th>
                        <th class="action"> <button class="add-announcement" onclick="openForm()" style="cursor: pointer;">NEW</button> </th>
                    </tr>        
                </table>
                <table class="past-announcements">
                    <tr>
                        <th>SUBJECT</th>
                        <th>DESCRIPTION</th>
                        <th>ATTACHMENT</th>
                        <th>Date Posted</th>
                    </tr>
                    <tbody>
                                    <?php
                                    mysqli_select_db($conn,'trr');
                                    $sql = mysqli_query($conn, "SELECT * FROM announcements ORDER BY posted_timestamp DESC ");
                                    if (! $sql)
                                    {
                                        echo "<p> No available announcement. </p>";
                                    }
                                    while ($row = mysqli_fetch_array($sql, MYSQLI_ASSOC)) //displays the list of the employees fetched from the database
                                    {
                                        if ($row == 0)
                                        {
                                            echo "<p> No available announcement. </p>";
                                        }
                                        else
                                        {
                                            //additional - call for pop up windows that shows full announcement
                                            echo "<tr><td>" . $row['subject']. "</a></td>
                                            <td>" . $row['announcement'] . "</td>
                                            <td>" . $row['attachment'] . "</td>
                                            <td>"  . $row['posted_timestamp']. "</td>";
                                            echo '</tr>';	
                                        }	  		
                                    }

                                    mysqli_free_result($sql);
                                    echo "</table>";
                                    
                                    ?>
                    </tbody>
                </table>
            </div>
            <div class="announcement-form" id="announcement-form">
                <div class="announcement-details">
                    <form action="php/submit-details.php" method="post" enctype="multipart/form-data">
                        <h1 class="new-announcement-header"> NEW ANNOUNCEMENT </h1>
                        <div class="announcement-form-body">
                            <div class="subject">
                                Subject: <input type="text" name="subject" class="subject-input">
                            </div>
                            <div class="description">
                                Description: 
                                <textarea name="announcement-details" class="textarea-input"></textarea>
                            </div>
                            <div class="attachment">
                                Attachment: <br>
                                <div class="drag-area">
                                        <span class="visible">
                                            <i class="fas fa-image" style="font-size: 25px;"></i><br>
                                            DRAG AND DROP A PHOTO 
                                            <br> OR <br>
                                            <span class="select" role="button">Browse</span>
                                        </span>
                                        <span class="on-drop">Drop images here</span>
                                        <input name="image" type="file" class="file" multiple />
                                </div>

                                    <!-- IMAGE PREVIEW CONTAINER -->
                                <div class="container"></div>
                                </div>
                            </div>
                            <center>
                                <button type="button" onclick="closeForm()" class="close-btn">CANCEL</button>
                                <input type="submit" value="POST" name="post-announcement" style="background: #002057;   border-radius: 10px; margin: 2em;">
                            </center>
                        </div>
                    </div>
            </div>
            <script>
                function openForm() 
                {
                    document.getElementById("announcement-form").style.display = "block";
                }

                function closeForm() 
                {
                    document.getElementById("announcement-form").style.display = "none";
                }
            </script>
        </div>
        </form>
    </section>

<!-- Responsive Navigation Bar -->
<script src="js/admin-active-navbar.js"></script> 
<script src="js/file_chooser.js"></script> 
</body>
</html>

