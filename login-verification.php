<?php
    include 'connection.php';

    if (isset($_POST['Reviewer_username']) && isset($_POST['Reviewer_password']) && isset($_POST['name'])) {
      $Reviewer_username = $_POST['Reviewer_username'];
      $Reviewer_password = md5($_POST['Reviewer_password']);

      $sql = "SELECT * FROM reviewer_profile WHERE username = ? AND password = ?";
      $stmt = mysqli_prepare($conn, $sql);
      mysqli_stmt_bind_param($stmt, 'ss', $reviewer_username, $reviewer_password);
      mysqli_stmt_execute($stmt);
      $res = mysqli_stmt_get_result($stmt);

      if (mysqli_num_rows($res) > 0) {
          $row = mysqli_fetch_assoc($res);
          $_SESSION['id'] = $row['id'];
          $arr = array("status" => 'success', 'message' => 'Logged in successfully');

          $id = $_SESSION['id'];
          $sql = "SELECT * FROM reviewer_profile WHERE id = ?";
          $stmt = mysqli_prepare($conn, $sql);
          mysqli_stmt_bind_param($stmt, 's', $id);
          mysqli_stmt_execute($stmt);
          $res = mysqli_stmt_get_result($stmt);
          $row = mysqli_fetch_assoc($res);
          $User = $row['username'];

      } else {
          $arr = array("status" => 'error', 'message' => 'Check username or password');
      }

      echo json_encode($arr);

    } elseif (isset($_POST['Author_username']) && isset($_POST['Author_password'])) {
        $Author_username = $_POST['Author_username'];
        $Author_password = md5($_POST['Author_password']);

        $sql = "SELECT * FROM author_profile WHERE username = ? AND password = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, 'ss', $Author_username, $Author_password);
        mysqli_stmt_execute($stmt);
        $res = mysqli_stmt_get_result($stmt);

        if (mysqli_num_rows($res) > 0) {
            $row = mysqli_fetch_assoc($res);
            $_SESSION['id'] = $row['id'];
            $arr = array("status" => 'success', 'message' => 'Logged in successfully');

            $id = $_SESSION['id'];
            $sql = "SELECT * FROM author_profile WHERE id = ?";
            $stmt = mysqli_prepare($conn, $sql);
            mysqli_stmt_bind_param($stmt, 's', $id);
            mysqli_stmt_execute($stmt);
            $res = mysqli_stmt_get_result($stmt);
            $row = mysqli_fetch_assoc($res);
            $User = $row['username'];

            // $User_folder = '../../../Data/';
            // $upload_dir = '../../../Data/'.$User.'/'.'db_documents/';
            // //If User Folder does not exist, create a folder for him/her
            // if (!file_exists($User_folder.$User)) {
            //     mkdir($User_folder.$User, 0755);  //Create Folder for User
            //     mkdir($User_folder.$User."/db_documents", 0755); //for pre-submitted documents of user 
            //     mkdir($User_folder.$User."/db_images", 0755); //for pre-submitted images of user
            //     mkdir($User_folder.$User."/CV_files", 0755);  //for pre-submitted CV files of user
            // }

        } else {
            $arr = array("status" => 'error', 'message' => 'Check username or password');
        }

        echo json_encode($arr);
    } else {

    }
?>
