<head>
<title>Creating your account...</title>
<link rel="stylesheet" type="text/css" href="pageStyle.css">
<link rel="shortcut icon" href="./images/icon.ico" />
</head>

<body>
<nav>
<?php include("navlinks.html");?>
</nav>

<h1>Creating your account...</h1>

<?php include("_header.php");
	if (isset($_POST["username"]) && isset($_POST["password"])) {
	$username = $_POST["username"];
	$password = $_POST["password"];

	$errorMsg = "";
	if ($username == "" || $password == "") {
		$errorMsg = "Please go back and enter a username and password.";
	} else {
		// check if username is taken
		$query = $mysqli->prepare("SELECT username FROM Login WHERE username = '$username'");
		//$query->bind_param("s",$username);
		if ($query->execute()) {
  			$query->bind_result($uid);

			if($query->fetch()){ 
				// if any rows come back, then this user exists already
				$errorMsg = "That username is taken. Go back and pick another.";
    			} 

			$query->close();
		}
	}

	if ($errorMsg == "") {
		// ok, we can just insert the record
		$hashedPassword = base64_encode(hash('sha256',$password . $username));

		if ($stmt = $mysqli->prepare("insert into Login(username,password) values(?,?)")) {
			$stmt->bind_param("ss", $username, $hashedPassword);
	    		$stmt->execute();
			$stmt->close();
			echo '<p>Created... You may now <a href="./login.php">log in...</a></p>';
		} else {
	  		printf("Error: %s\n", $mysqli->error);
		}
	} else {
		echo "<h4 class='error'>".htmlspecialchars($errorMsg)."</h4>";
	}
}


?>
</body>