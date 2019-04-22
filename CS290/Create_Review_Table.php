<html>
<body>

<h3>Init Review Table</h3>


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



$conn->query("drop table reviews");


//Create Table
if (!$conn->query("create table reviews (
num             int(10)  not null AUTO_INCREMENT PRIMARY KEY,
id              int(10),
text       	    varchar(2048),
 );"))
{
    printf("Cannot create review table.\n");
}



$conn->close();
?>

</body>
</html>