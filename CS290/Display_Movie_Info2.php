<html>
<body>

<h3>Display Movie</h3>
<p id="Text"></p>
<script src="jquery-1.12.0.min.js"></script>



<?php
// Connection Info
ini_set('display_errors', 'On');

$servername = "oniddb.cws.oregonstate.edu";
$username = "goertzel-db";
$password = "UAKL4j3lHyW90qJ5";
$dbname = "goertzel-db";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname) or die("Error " . mysqli_error($connection));
// Check connection
if ($conn->connect_error) {die("Connection failed: " . $conn->connect_error);} 



//Movie Query
$name = "The Matrix";



//Fetch table rows from database
$sql = ("SELECT * FROM movie_list WHERE title LIKE '%" . $name . "%'");
$result = mysqli_query($conn, $sql) or die("Error in Selecting " . mysqli_error($conn));

//Create an arrayi
$emparray = array();
while($row =mysqli_fetch_assoc($result))
{
    $emparray[] = $row;
}

$json = json_encode($emparray);
echo $json;


//Close the db connection
mysqli_close($conn);

?>






<script>
</script>




</body>
</html>