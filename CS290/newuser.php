<head>
<link rel="stylesheet" type="text/css" href="pageStyle.css">
<title>Sign Up!</title>
<link rel="shortcut icon" href="./images/icon.ico" />
</head>

<body>
<nav>
<?php include("navlinks.html");?>
</nav>

<div class="logInBox" align="center">
<h1>Create Your Account</h1>
<form method="post" action="newuser_recieve.php">
	<span>Username: </span><input type="text" name="username"><br>
	<br />
	<span>Password: </span><input type="password" name="password"><br>
	<br />
	<input type="submit" value="Submit">
</form>

</div>
</body>