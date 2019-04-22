<!DOCTYPE html>
<!-- logIn.php -->
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="style.php">
		<title>Sign-Up</title>
	</head>
<body>
	<ul class="nav">
		<li style="float: left; font-size: 2em; padding: 0;"><a href="#">Rental Services</a></li>
		<li><a href="index.php">About Us</a></li>
		<li><a href="userPage.php">My Account</a></li>
		<li><a class="active" href="logIn.php">Sign Up/Login</a></li>
		<li><a href="vehicle.php">Vehicles</a></li>
	</ul>

<div class="wrap">
	<div class="container">
		<h1>Log-In</h1>
				
		
	<form id="subButton" method='post' autocomplete="off" class="register-form">
			<input type="text" name="userName" id="userName" pattern=".{1,20}" title="Maximum of 20 characters" placeholder="username" required /><br />
			<input type="text" name="password" id="password" pattern=".{1,20}" title="Max of 20 characters" placeholder="password" required /><br />
			<input type="submit" name="entry" value="Submit" id="entry" />
			<a href="newUser.php">Dont have an Account?</a>
		</form>
</div>

	
</body>

</html>