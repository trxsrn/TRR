<?php

include '../connection.php';

if (isset($_POST['post-announcement'])) {
    $subject = $_POST['subject'];
    $details = $_POST['announcement-details'];
    $allowed = array("jpg" => "image/jpeg", "png" => "image/png", "gif" => "image/gif");
    $filename = $_FILES["image"]["name"];
    $filetype = $_FILES["image"]["type"];
    $filesize = $_FILES["image"]["size"];

    // Verify file extension
    $ext = pathinfo($filename, PATHINFO_EXTENSION);
    if (!array_key_exists($ext, $allowed)) {
        die("Error: Please select a valid file format.");
    }

    // Verify file size
    $maxsize = 5 * 1024 * 1024; // 5MB
    if ($filesize > $maxsize) {
        die("Error: File size is larger than the allowed limit.");
    }

    // Verify MIME type
    if (in_array($filetype, $allowed)) {
        // Upload file
        $uploadDir = "../css/announcements/";
        $path = $uploadDir . $filename;
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $path)) {
            // Database insertion
            mysqli_select_db($conn, 'trr');
            $insertQuery = "INSERT INTO announcements (`subject`, `announcement`, `attachment`, `posted_by`) 
                            VALUES ('$subject', '$details', '$filename', '')";
            if (mysqli_query($conn, $insertQuery)) {
                echo '<script type="text/javascript"> alert("POSTED SUCCESSFULLY"); location="../website.php"; </script>';
            } else {
                echo "Error: There was a problem inserting data into the database. Please try again.";
            }
        } else {
            echo "Error: There was a problem uploading your file. Please try again.";
        }
    } else {
        echo "Error: Invalid file type. Please select an image file (JPEG, PNG, GIF).";
    }
}


if (isset($_POST['save-banner'])) {
    // Iterate through each banner
    for ($bannerId = 1; $bannerId <= 8; $bannerId++) {
        $imageFile = $_FILES['img' . $bannerId]['name']; // Assuming the file input names are 'img1', 'img2', etc.

        // Check if an image is uploaded
        if (!empty($imageFile)) {
            // Move the uploaded file to the desired directory
            $targetDirectory = '../css/banners/';
            $targetFile = $targetDirectory . basename($imageFile);
            move_uploaded_file($_FILES['img' . $bannerId]['tmp_name'], $targetFile);

            // Update the database with the new image file name for the current banner
            mysqli_select_db($conn, 'trr');
            $updateQuery = "UPDATE web SET image = ? WHERE banner_id = ?";
            $stmt = mysqli_prepare($conn, $updateQuery);
            mysqli_stmt_bind_param($stmt, 'si', $imageFile, $bannerId);
            mysqli_stmt_execute($stmt);
        }
    }

    // Redirect back to the form or any other page
    header('Location: ../website.php');
    exit();
}

?>