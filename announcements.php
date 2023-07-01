<?php
include 'navigation.php';
include 'connection.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Announcement</title>
    <link rel="stylesheet" href="css/announce.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.image-link').click(function(e) {
                e.preventDefault();
                $(this).find('img').toggleClass('enlarged-image');
            });
        });
    </script>
</head>
<body>
<div class="topic">
    <h1>ANNOUNCEMENT</h1>
    <br>
    <div class="card">
        <?php
        $sql = mysqli_select_db($conn, 'trr');
        $query = mysqli_query($conn, "SELECT * FROM announcements ORDER BY id DESC LIMIT 1");

        if (!$query || mysqli_num_rows($query) === 0) {
            echo '<h3 style="color: white;">No announcements available</h3>';
        } else {
            $row = mysqli_fetch_array($query, MYSQLI_ASSOC);
            $timestamp = $row['posted_timestamp'];
            $formattedTimestamp = date('F j, Y', strtotime($timestamp));

            if (!empty($row['attachment'])) {
                $imagePath = "users/admin/css/announcements/" . $row['attachment'];
                if (file_exists($imagePath)) {
                    echo "<center><a href='#' class='image-link'><img src='" . $imagePath . "' alt='Announcement Image' style='max-width: 100%; height: auto;'></a></center>";
                } else {
                    echo "Image not found";
                }
            }

            echo "<div class='announce_details'>";
            echo "<p class='subject-heading'>" . $row['subject'] . "</p>";
            echo "<p class='announcement-body'>" . $row['announcement'] . "</p>";
            echo "<p class='timestamp-date'>Date Posted: " . $formattedTimestamp . "</p>";
            echo "</div>";
        }
        ?>
    </div>
</div>

<div class="past-announce">
    <h2 class="sub-title">Past Announcements</h2>
    <?php
    $query = mysqli_query($conn, "SELECT * FROM announcements ORDER BY id DESC LIMIT 10 OFFSET 1");

    if (!$query || mysqli_num_rows($query) === 0) {
        echo '<h3 style="color: white;">No past announcements available</h3>';
    } else {
        while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
            $timestamp = $row['posted_timestamp'];
            $formattedTimestamp = date('F j, Y', strtotime($timestamp));

            echo "<div class='past-announcement'>";
            
            if (!empty($row['attachment'])) {
                $imagePath = "users/admin/css/announcements/" . $row['attachment'];
                if (file_exists($imagePath)) {
                    echo "<center><a href='#' class='image-link'><img src='" . $imagePath . "' alt='Announcement Image' style='max-width: 100%; height: auto;'></a></center>";
                } else {
                    echo "Image not found";
                }
            }

            echo "<div class='announce_details'>";
            echo "<p class='past-subject-heading'>" . $row['subject'] . "</p>";
            echo "<p class='past-announcement-body'>" . $row['announcement'] . "</p>";
            echo "<p class='past-timestamp-date'>Date Posted: " . $formattedTimestamp . "</p>";
            echo "</div>";
            echo "</div>";
            echo "<hr>"; 
        }
    }
    ?>
</div>

</body>
</html>
<?php include 'footer.php' ?>
