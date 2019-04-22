<head>
<link rel="stylesheet" type="text/css" href="pageStyle.css">
<title>Genres</title>
<link rel="shortcut icon" href="./images/icon.ico" />
</head>

<html>
<nav>
<?php include("navlinks.html");?>
</nav>

<body>
<div class="movieBack">
	
<h1 class="movieTitle">Featured Genres</h1>

<div align="center">
<a href="./Individual_Genre_Page.php?genre=28"><img src="./genres/action_image.png" alt="Action"
height="92" width="443"></a>
&nbsp;
<img src="./genres/linediv.png" alt="" height="92" width="2">
&nbsp;
<a href="./Individual_Genre_Page.php?genre=16"><img src="./genres/anim_image.png" alt="Animation" 
height="92" width="443"></a>

<br><br>
<hr width="70%">
<br><br>

<a href="./Individual_Genre_Page.php?genre=35"><img src="./genres/comedy_image.png" alt="Comedy" height="92" width="443"></a>
&nbsp;
<img src="./genres/linediv.png" alt="" height="92" width="2">
&nbsp;
<a href="./Individual_Genre_Page.php?genre=80"><img src="./genres/crime_image.png" alt="Crime" height="92" width="443"></a>

<br><br>
<hr width="70%">
<br><br>


<a href="./Individual_Genre_Page.php?genre=18"><img src="./genres/drama_image.png" alt="Drama" height="92" width="443"></a>
<img src="./genres/linediv.png" alt="" height="92" width="2">
&nbsp;
<a href="./Individual_Genre_Page.php?genre=14"> <img src="./genres/fantasy_image.png" alt="Fantasy" height="92" width="443"></a>
&nbsp;
<br><br>
<hr width="70%">
<br><br>



<a href="./Individual_Genre_Page.php?genre=27"><img src="./genres/horror_image.png" alt="Horror"" height="92" width="443"></a>
<img src="./genres/linediv.png" alt="" height="92" width="2">
&nbsp;
&nbsp;
<a href="./Individual_Genre_Page.php?genre=10749"><img src="./genres/romance_image.png" alt="Romance" height="92" width="443"></a>
<br><br>
<hr width="70%">
<br><br>




<a href="./Individual_Genre_Page.php?genre=878"> <img src="./genres/sfiction_image.png" alt="Science Fiction" height="92" width="443"></a>
&nbsp;



<br><br>
<hr width="70%">
<br><br>

</div>
<h1 class="movieTitle">All Genres</h1>
<?php include("Genre_Display.php");?>
</div>
</body>
</html>
