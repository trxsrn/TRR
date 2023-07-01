<?php
session_start();
include 'connection.php';

// Function to sanitize input values
function sanitize($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   // Get the login form data
   $username = sanitize($_POST['username']);
   $password = sanitize($_POST['password']);

   // Perform login verification logic
   if ($_POST['user_type'] === 'author') {
      $query = "SELECT * FROM author_profile WHERE username = '$username' AND password = '$password'";
   } elseif ($_POST['user_type'] === 'reviewer') {
      $query = "SELECT * FROM reviewer_profile WHERE username = '$username' AND password = '$password'";
   }

   $result = mysqli_query($connection, $query);
   $row = mysqli_fetch_assoc($result);

   if ($row) {
      // Login successful
      $_SESSION['id'] = $row['id'];
      $_SESSION['username'] = $row['username'];
      $_SESSION['user_type'] = $_POST['user_type'];

      $response = array(
         'status' => 'success',
         'message' => 'Login successful!'
      );
   } else {
      // Invalid username or password
      $response = array(
         'status' => 'error',
         'message' => 'Invalid username or password'
      );
   }

   // Send the response back to the AJAX request
   echo json_encode($response);
}
?>
