<!DOCTYPE html>
<!-- userPage.php -->
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="style.php">
		<title>Member Account</title>
	</head>
<body>

	<ul class="nav">
		<li style="float: left; font-size: 2em; padding: 0;"><a href="#">Rental Services</a></li>
		<li><a href="index.php">About Us</a></li>
		<li><a class="active" href="userPage.php">My Account</a></li>
		<li><a href="logIn.php">Sign Up/Login</a></li>
		<li><a href="vehicle.php">Vehicles</a></li>
	</ul>
<div class="wrap">
<?php
	include 'connectvarsEECS.php'; 

	$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	if (!$conn) {
		die('Could not connect: ' . mysql_error());
	}

	$table = Members;
	$query = "SELECT userName as 'User', firstName as 'First Name' FROM $table ";
	
	$result = mysqli_query($conn, $query);
	if (!$result) {
		die("Query to show fields from table failed");
	}

	echo "<div class='container'>";
		$fields_num = mysqli_num_fields($result);
		echo "<h1>{$table} list</h1>";
		echo "<table border='hidden'><tr>";
		// printing table headers
		for($i=0; $i<$fields_num; $i++) {	
			$field = mysqli_fetch_field($result);	
			echo "<th>{$field->name}</th>";
		}
		echo "</tr>\n";
		while($row = mysqli_fetch_row($result)) {	
			echo "<tr>";	
			// $row is array... foreach( .. ) puts every element
			// of $row to $cell variable	
			foreach($row as $cell)		
				echo "<td>$cell</td>";	//each element -- place between td for inline additions
			echo "</tr>\n";
		}
	echo "</div>";

	$sql = "INSERT INTO $table (username, firstName, lastName, city, state, address, zip, password) 
			VALUES ($username, $firstName, $lastName, $city, $state, $address, $zip, $password)";


	mysqli_free_result($result);
	mysqli_close($conn);
	?>

	<!--<form method='post' action='newUser.php'>
		<input type="submit" name="view" value="Sign-Up" id="view" />
	</form>-->
	</div>
</body>

</html>
