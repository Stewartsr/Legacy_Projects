<?php include_once("_header.php")?>
<head>
<link rel="stylesheet" type="text/css" href="pageStyle.css">
<title>Login</title>
<link rel="shortcut icon" href="./images/icon.ico" />
</head>

<body>
<nav>
<?php include("navlinks.html");?>
</nav>

<div class="logInBox" align="center">
<h1> Log In </h1>

<?php //include("_header.php");
// where is the user trying to get back to, after logging in?
$sendBackTo = isset($_REQUEST["sendBackTo"]) ? $_REQUEST["sendBackTo"] : './homepage.php';

if (isset($_SESSION["loggedin"])) {
	echo "<script type='text/javascript'>alert('Already logged in!');</script>";
	echo "<script>location.replace(".json_encode($sendBackTo).");</script>";
}

if (isset($_POST["username"]) && isset($_POST["password"])) {
	// user is trying to log in; if valid login, then redirect to where the user is trying to get back to
	$username = $_POST["username"];
	$password = $_POST["password"];
	$hashedPassword = base64_encode(hash('sha256',$password . $username));

	$query = mysqli_query($mysqli, "SELECT username FROM Login WHERE username = '$username' and password = '$hashedPassword';");
		
	if(mysqli_num_rows($query) == 1) {
		//Checks for matching username passwoed combo
		//$row = mysqli_fetch_array($query);
		//3$row['username'];
		$_SESSION['loggedin'] = true;
		$_SESSION['username'] = $username; // $username coming from the form, such as $_POST['username']
		echo "<script type='text/javascript'>alert('Welcome, $username');</script>";
		echo "<script>location.replace(".json_encode($sendBackTo).");</script>";
		//print_r($_SESSION);
	}
	else {
		echo "Please enter a valid username and password.";
	}
}
?>

<form method="post" action="login.php">
	<span>Username: </span><input type="text" name="username"><br>
	<br />
	<span>Password: </span><input type="password" name="password"><br>
	<br />
	<input type="submit" value="Submit">
	<input type="hidden" name="sendBackTo" 
		value="<?= htmlspecialchars($sendBackTo) ?>">
</form>

<p>New User? <a href="./newuser.php">Register Here!</a></p>
</div>
</body>