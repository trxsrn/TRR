<?php

session_start();

include 'connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $username = $_POST['username'];
  $password = md5($_POST['password']);

  $sql = mysqli_query($conn, "SELECT * FROM trr_admin_accounts WHERE username='$username' AND password='$password'");
  if (mysqli_num_rows($sql) > 0) {
    $_SESSION['username'] = $username;
    header('Location: users/admin/dashboard.php');
  } else {
    echo ('<script type="text/javascript"> alert("Logged in Failed"); location="admin-login.php"; </script>');
  }
}   


?>
