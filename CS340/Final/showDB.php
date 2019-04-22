<!DOCTYPE html>
<!-- showDB.php -->
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="style.css">
		<title>Sign-Up</title>
	</head>
<body>
	<div class="container">
		<h1>Sign-Up Form</h1>
		<?php include 'connectvarsEECS.php'; include 'formInsert.php'; ?>
		<form id="subButton" method='post' autocomplete="off" class="register-form">
			<input type="text" name="username" id="username" pattern=".{1,20}" title="Maximum of 20 characters" placeholder="username" required /><br />
			<input type="text" name="firstName" id="firstName" pattern="[A-Za-z]{1,20}" title="Maximum of 20 characters and letters only" placeholder="first name" required /><br />
			<input type="text" name="lastName" id="lastName" pattern="[A-Za-z]{1,20}" title="Maximum of 20 characters and letters only" placeholder="last name" required /><br />
			<input type="email" name="email" id="email" pattern=".{1,40}" title="Maximum of 40 characters" placeholder="email address" required /><br />
			<input type="text" name="password" id="password" pattern=".{1,20}" title="Max of 20 characters" placeholder="password (20 max)" required /><br />
			<input type="number" name="age" id="age" pattern="{3}" min="13" max="150" title="Must be at least the age of 13" placeholder="age (13+)" /><br />
			<input type="submit" name="entry" value="Submit" id="entry" />
		</form>

		<form method='post' action='showTable.php'>
			<input type="submit" name="view" value="List Users" id="view" />
		</form>
	</div>
</body>

</html>