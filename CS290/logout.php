<?php include_once("_header.php");
$sendBackTo = isset($_REQUEST["sendBackTo"]) ? $_REQUEST["sendBackTo"] : './homepage.php';
$sendBackToLogin = isset($_REQUEST["sendBackTo"]) ? $_REQUEST["sendBackTo"] : './login.php';?>
<head>
<link rel="stylesheet" type="text/css" href="pageStyle.css">
<title>Logout</title>
<link rel="shortcut icon" href="./images/icon.ico" />
</head>

<body>
<nav>
<?php include("navlinks.html");?>
</nav>
<h1>Logout</h1>
<?php
if (!(isset($_SESSION["loggedin"]))) {
	echo "<script type='text/javascript'>alert('Need to be logged in!');</script>";
	echo "<script>location.replace(".json_encode($sendBackToLogin).");</script>";
}
else {
	session_destroy(); // Is Used To Destroy All Sessions;
	echo "<script type='text/javascript'>alert('Sucessfully logged out');</script>";
	echo "<script>location.replace(".json_encode($sendBackTo).");</script>";
}
?>