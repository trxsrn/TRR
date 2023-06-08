<?php
session_start();
include 'connection.php';

if(isset($_POST['Admin_username']) && isset($_POST['Admin_password'])) {
   $username = $_POST['Admin_username'];
   $password = $_POST['Admin_password'];

   // Perform your verification logic here
   // Example: Check the username and password against the database
   $stmt = $connection->prepare("SELECT * FROM users WHERE username = ?");
   $stmt->bind_param("s", $username);
   $stmt->execute();
   $result = $stmt->get_result();

   if($result->num_rows === 1) {
      $row = $result->fetch_assoc();
      $storedPassword = $row['password'];

      // Verify the password
      if(password_verify($password, $storedPassword)) {
         // Authentication successful
         $_SESSION['id'] = $row['id'];
         if($row['role'] === 'admin') {
            $response = [
               'status' => 'success',
               'message' => 'Login successful'
            ];
            echo json_encode($response);
            exit;
         } else {
            // Redirect to user dashboard or homepage
            header("Location: users/user/dashboard.php");
            exit;
         }
      }
   }
}

// Invalid username or password
$response = [
   'status' => 'error',
   'message' => 'Invalid username or password'
];
echo json_encode($response);
exit;
?>
