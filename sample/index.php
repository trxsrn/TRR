<!DOCTYPE html>
<html>
<head>
	<title>Login Form</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="login">
		<h1>Login</h1>
		<form method="post" action="login.php">
			<label for="username">Username</label>
			<input type="text" name="username" required>
			<label for="password">Password</label>
			<input type="password" name="password" required>
			<button type="submit" name="login">Login</button>
		</form>
	</div>
</body>
</html>