<?php
session_start();
include 'connection.php';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   // Retrieve the user type from the submitted form
   $userType = $_POST['user_type'];

   // Retrieve the username and password from the submitted form
   $username = $_POST['username'];
   $password = $_POST['password'];

   // Select the appropriate table based on the user type
   $table = ($userType === 'author') ? 'author_profile' : 'reviewer_profile';

   // Prepare the SQL statement to check the user credentials
   $sql = "SELECT * FROM $table WHERE username = ?";
   $stmt = $conn->prepare($sql);
   $stmt->bind_param('s', $username);
   $stmt->execute();
   $result = $stmt->get_result();

   // Fetch the user row
   $user = $result->fetch_assoc();

   // Verify the user credentials
   if ($user) {
      // User exists, check the password
      if (md5($password) === $user['password']) {
         // Authentication successful
         $_SESSION['user'] = $user;
         $_SESSION['user_type'] = $userType;

         echo 'success';
      } else {
         // Invalid password
         echo "Invalid password";
      }
   } else {
      // User doesn't exist
      echo 'User not found';
   }

   // Close the statement
   $stmt->close();
}
?>
