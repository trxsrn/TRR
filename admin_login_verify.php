<?php

session_start();

include 'connection.php';

$username = $_POST['username'];
$password = md5($_POST['password']);

$sql = mysqli_query($conn, "SELECT * FROM trr_admin_accounts WHERE username = '$username' AND password='$password'");
$num = mysqli_num_rows($sql);
   
if($num > 0) 
{
        $row = mysqli_fetch_array($sql);
        $query = mysqli_query($conn, "SELECT * FROM trr_admin_accounts WHERE username = '$username' AND password='$password'");
        $num = mysqli_num_rows($query);
        if ($num)
        {
            $_SESSION['username'] = $row['username'];
            header("location:users/admin/dashboard.php");
        } 

}

else {
    echo ('<script type="text/javascript"> alert("Invallid username or password."); location="admin-login.php"; </script>');
}
?>
