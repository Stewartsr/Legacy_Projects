<!DOCTYPE html>
<!-- newUser.php -->
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
		<h1>Sign-Up Form</h1>
		<?php include 'connectvarsEECS.php'; include 'formInsert.php'; ?>
		<form id="subButton" method='post' autocomplete="off" class="register-form">
			<input type="text" name="userName" id="userName" pattern=".{1,20}" title="Maximum of 20 characters" placeholder="username" required /><br />
			<input type="text" name="firstName" id="firstName" pattern="[A-Za-z]{1,20}" title="Maximum of 20 characters and letters only" placeholder="first name" required /><br />
			<input type="text" name="lastName" id="lastName" pattern="[A-Za-z]{1,20}" title="Maximum of 20 characters and letters only" placeholder="last name" required /><br />
			<input type="text" name="city" id="city" pattern=".{1,20}" title="Maximum of 20 characters and letters only" placeholder="city" required /><br />
			<input type="text" name="state" id="state" pattern=".{1,20}" title="Maximum of 20 characters and letters only" placeholder="state" required /><br />
			<input type="text" name="address" id="address" pattern=".{1,40}" title="Maximum of 20 characters and letters only" placeholder="address" required /><br />
			<input type="number" name="zip" id="zip" pattern="{10}" title="Maximum of 10 numbers" placeholder="zip" required /><br />
			<input type="text" name="password" id="password" pattern=".{1,20}" title="Max of 20 characters" placeholder="password (20 max)" required /><br />
			<input type="submit" name="entry" value="Submit" id="entry" />
			<a href="logIn.php">Already Have an Account?</a>
		</form>
</div>


		
		<!--<form method='post' action='userPage.php'>
			<input type="submit" name="view" value="List Users" id="view" />
		</form>-->
		
	</div>

</body>

</html>