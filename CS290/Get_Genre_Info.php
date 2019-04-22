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


$genre_id = $_REQUEST["genre"];


$mylist = array();
if ($result = $conn->query("SELECT * FROM movie_list WHERE genre LIKE '%" . $genre_id . "%'")) {
    while($obj = $result->fetch_object()){ 
	$movie = array(
		"id"=>$obj->id,
		"title"=>$obj->title,
		"rating"=>$obj->rating,
		"release_date"=>$obj->release_date,
		"genre"=>$obj->genre,
		"overview"=>$obj->overview,
		"image_link"=>$obj->image_link,
		"backdrop_link"=>$obj->backdrop_link
	);
	array_push($mylist, $movie);
    } 

    $result->close();
}

$data = json_encode($mylist);
echo $data;

?>