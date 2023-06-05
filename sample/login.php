<?php
session_start();

if (isset($_POST['login'])) {
	// Connect to database
	$db = mysqli_connect('localhost', 'username', 'password', 'trr');

	// Get username and password from form
	$username = mysqli_real_escape_string($db, $_POST['username']);
	$password = mysqli_real_escape_string($db, $_POST['password']);

	// Check if username and password match with database
	$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
	$result = mysqli_query($db, $query);

	if (mysqli_num_rows($result) == 1) {
		// Login successful, set session variable and redirect to welcome page
		$_SESSION['username'] = $username;
		header('location: welcome.php');
	} else {
		// Login failed, display error message
		$error = "Invalid username or password";
	}
}
?>