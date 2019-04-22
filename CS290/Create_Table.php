<html>
<body>

<h3>Init</h3>


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


//Create Table
if (!$conn->query("create table movie_list (
id              int(10)  not null AUTO_INCREMENT PRIMARY KEY,
title           varchar(64),
rating 			DECIMAL(4,2),
genre           varchar(25),
release_date    varchar(25),
overview        varchar(1024),
image_link      varchar(32),
backdrop_link   varchar(32) 
 );"))
{
    printf("Cannot create info table(s).\n");
}



$conn->close();
?>

</body>
</html>