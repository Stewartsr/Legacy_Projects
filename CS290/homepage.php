<?php include_once("_header.php")?>
<head>
<link rel="stylesheet" type="text/css" href="pageStyle.css">
<title>Movie Review Homepage</title>
<link rel="shortcut icon" href="./images/icon.ico" />
</head>

<html>
<nav>
<?php include("navlinks.html");
?>
</nav>

<body>
<div class="movieBack">
<h1 class="movieTitle">Super Cool Movie Database!</h1>
<h2 class="movieTitle">Featured Movie</h2>
<hr />
<?php include("featured.php")
?>
</div>
</body>
</html>