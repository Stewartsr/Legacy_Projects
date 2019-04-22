<!DOCTYPE html>
<?php include_once("_header.php")?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="Search_Style.css">
<link rel="stylesheet" type="text/css" href="pageStyle.css">
<title>Movie Result</title>
<script src="jquery-1.12.0.min.js"></script>
<link rel="shortcut icon" href="./images/icon.ico" />
<!-- <h2>Display Movies Info</h2> -->
</head>

<nav>
<?php include("navlinks.html");
?>
</nav>
<body>

<div class="movieBack">

<div id = "Info" style="width: 1440; background-color:lightblue; padding:10px; border-width:4px; border-style:solid; border-color:black; min-height:230px">
	<img id = "movie_image" src="" width="150" style="margin-right: 15px; float: left;">


	<div class="star-ratings-css">
	  <div id = "stars" class="star-ratings-css-top" style="width:0%"><span>★</span><span>★</span><span>★</span><span>★</span><span>★</span></div>
	</div> 

	<p id = "movie_title">Title</p>
	<p id = "movie_release">Release Date</p>
	<p id = "movie_overview">Overview</p>		

</div>
<br>



<?php 
// Connection Info
ini_set('display_errors', 'On');

$servername = "oniddb.cws.oregonstate.edu";
$username = "goertzel-db";
$password = "UAKL4j3lHyW90qJ5";
$dbname = "goertzel-db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 




$Text = urldecode($_REQUEST['query']);
$Json = json_decode($Text);

$j = 1;
if ($result = $conn->query("SELECT review FROM reviews WHERE id = $Json->id")) {
    while($obj = $result->fetch_object()){ 

    	$review_text = $obj->review;
    	//echo $review_text;

		echo '<div id = "review'.$j.'" style="width: 1440; background-color:lightblue; padding:10px; border-width:4px; border-style:solid; border-color:black;">
				<p id = "item'.$j.'"> '."$review_text".'</p>
			  </div><br>';
		$j++;
	}
	$result->close();
}
$conn->close();


if (isset($_SESSION["loggedin"])) {
echo '<p>Enter Your Own Review Here</p>
<form action="./Recieve_New_Review.php" method="POST">
	<textarea name="textarea"></textarea>
	<input type="hidden" name="id_num" value="'.$Json->id.'">
	<input type="submit">
</form>';
}
else {
	echo"Log in to submit a review!";
}

?>



 
<script>
	document.getElementById("movie_image").src = 'https://image.tmdb.org/t/p/original/' + '<?php echo $Json->image_link; ?>';
	document.getElementById("movie_title").innerHTML= "<?php echo $Json->title; ?>";
	document.getElementById("movie_release").innerHTML = "<?php echo $Json->release_date; ?>";
	document.getElementById("movie_overview").innerHTML = "<?php echo $Json->overview; ?>";
</script>

 

</div>



</body>
</head>

