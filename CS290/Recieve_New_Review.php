<?php include_once("_header.php")?>
<html>
<head>
<script src="jquery-1.12.0.min.js"></script>
<h2>Receive New Movie Review</h2>
</head>
<body>

<?php 
	// Connection Info
	$servername = "oniddb.cws.oregonstate.edu";
	$username = "goertzel-db";
	$password = "UAKL4j3lHyW90qJ5";
	$dbname = "goertzel-db";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {die("Connection failed: " . $conn->connect_error);}	




	$Text = ($_REQUEST['textarea']);
	$Id_num = ($_REQUEST['id_num']);
	$username = $_SESSION['username'];
	$review = $username.': '.$Text;

	$conn->query("INSERT INTO reviews (id, review) VALUES ($Id_num,'$review')");

	//echo $Text;
	//echo $Id_num;
	//echo $user_id.append($text);
	//echo $username;
	
	echo '<p>Review Submitted! Click below to go back.';
	
?>

<button onclick="goBack()">Go Back</button>

<script>
function goBack() {
    window.history.back();
}
</script>

</body>
</head>
