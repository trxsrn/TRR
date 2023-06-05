<?php
session_start();

// Redirect to login page if user is not logged in
if (!isset($_SESSION['username'])) {
	header('location: login.html');
}

// Personalized welcome message
$username = $_SESSION['username'];
$message = "Welcome, $username!";

// Display welcome message
echo "<h1>$message</h1>";
?>