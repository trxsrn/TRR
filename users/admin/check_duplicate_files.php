<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "testingdb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

    $id = $_SESSION['id'];
    $sql = "Select * from author_profile where id = '$id'";
    $res = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($res);
    $User=$row['username'];

    $User_folder = '../../../Data/';
    $upload_dir = '../../../Data/'.$User.'/'.'db_documents/';
    //If User Folder does not exist, create a folder for him/her
    if (!file_exists($User_folder.$User)) {
      mkdir($User_folder.$User, 0755);  //Create Folder for User
      mkdir($User_folder.$User."/db_documents", 0755); //for pre-submitted documents of user 
      mkdir($User_folder.$User."/db_images", 0755); //for pre-submitted images of user
      mkdir($User_folder.$User."/CV_files", 0755);  //for pre-submitted CV files of user
    }

  if(isset($_FILES['files'])){
    $file_count = count($_FILES['files']['name']);
      $Duplicate_File=0;

      for($i=0; $i<$file_count; $i++){
        $current_time = time();
        $formatted_time = date("Y-m-d H:i:s", $current_time);
        $ArticleType = $_POST["ArticleType"];;
        $tmp_file = $_FILES['files']['tmp_name'][$i];
        $file_name = $_FILES['files']['name'][$i];
        
        if (!file_exists($upload_dir . $file_name)) { // check if file exists in directory
          $sql = "INSERT INTO pre_submission_author (Author_Username,Description,Filename,Last_Modified) VALUES ('$User','$ArticleType','$file_name','$formatted_time')";
          if ($conn->query($sql) !== TRUE) {
                echo "Error: " . $sql . "<br>" . $conn->error;
                exit;
          }
          move_uploaded_file($tmp_file, $upload_dir . $file_name);
        }
        else{
            $Duplicate_File++;
        }
      }
      if ($Duplicate_File > 0) {
        echo $Duplicate_File;
      }
      }
?>