<html>
<body>

<h3>Populate Database with Calls to API For Movie Info</h3>


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



$url_base = "http://api.themoviedb.org/3/movie/top_rated";
$key = "?api_key=0b7002af73c8208c98a186ce0ad066b4";
$page = "&language=en&page=";


//Iterate Through Pages
for ($p = 1; $p <= 228; $p++) {

	//Create URL to call
	$page_num =  $p; 	
	$url = $url_base . $key . $page . $page_num;

	//Call API for Top Rated Movies
	$jsondata = file_get_contents($url);
	//echo htmlspecialchars($jsondata);

	//convert json object to php associative array
	$data = json_decode($jsondata, true);

	//Prepare Statement to Insert to Database
	if ($stmt = $conn->prepare("insert into movie_list(id,title,rating,genre,release_date,overview,image_link,backdrop_link) values(?,?,?,?,?,?,?,?)")) {
	  	for ($i = 0; $i <= 19; $i++) {
		    $id = $data['results'][$i][id];
		    $title = $data['results'][$i]['title'];   
		    $genre = implode(" ", $data['results'][$i]['genre_ids']);
		    $rating = $data['results'][$i]['vote_average'];
		    $release_date = $data['results'][$i]['release_date'];
		    $overview = $data['results'][$i]['overview'];
		    $poster_path = $data['results'][$i]['poster_path'];
		    $backdrop_path = $data['results'][$i]['backdrop_path'];
		    
		   
		    /*
			echo "<br><br><br>";
			echo "ID: $id<br>";
			echo "TITLE: $title<br>";
			echo "GENRE IDS: $genre<br>";	
			echo "RATING: $rating<br>";
			echo "RELEASE DATE: $release_date<br>";
			echo "OVERVIEW: $overview<br>";
			echo "POSTER PATH: $poster_path<br>";
			echo "BACKDROP PATH: $backdrop_path<br>";
			*/

	    	$stmt->bind_param("isdsssss", $id,$title,$rating,$genre,$release_date,$overview,$poster_path,$backdrop_path);
	    	$stmt->execute();
	  	}
	  	$stmt->close();
	} else {
	  printf("Error: %s\n", $conn->error);
	}

}

$conn->close();
?>

</body>
</html>