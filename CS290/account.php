<?php include_once("_header.php") ?>
<?php $sendBackTo = isset($_REQUEST["sendBackTo"]) ? $_REQUEST["sendBackTo"] : './login.php';?>
<head>
<link rel="stylesheet" type="text/css" href="pageStyle.css">
<title>My Account</title>
<link rel="shortcut icon" href="./images/icon.ico" />
</head>

<nav>
<?php include("navlinks.html");?>
</nav>

<p>User Account page. Will redirect to login if not logged in.</p>

<?php
if (!(isset($_SESSION["loggedin"]))) {
	echo "<script type='text/javascript'>alert('Need to be logged in!');</script>";
	echo "<script>location.replace(".json_encode($sendBackTo).");</script>";
}
?>