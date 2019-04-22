<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="./Search_Style.css">
<link rel="stylesheet" type="text/css" href="./pageStyle.css">
<title>Genres</title>
<link rel="shortcut icon" href="./images/icon.ico" />
<script src="jquery-1.12.0.min.js"></script>

</head>

<nav>
<?php include("navlinks.html");
?>
</nav>
<body>
<h2>Individual Genre</h2>

<!-- Current Movie and Info -->
<div id = "Current_Info" style="width: 1440; background-color:lightblue; padding:10px; border-width:4px; border-style:solid; border-color:black; min-height:230px">
	<img id = "current_image" src="" width="150" style="margin-right: 15px; float: left;">

	<!-- Star Rating -->
	<div class="star-ratings-css">
	  <div id = "stars" class="star-ratings-css-top" style="width:0%"><span>★</span><span>★</span><span>★</span><span>★</span><span>★</span></div>
	</div> 

	<!-- Current Info -->
	<p id = "Current_Title">Title</p>
	<p id = "Current_Release">Release Date</p>
	<p id = "Current_Overview">Overview</p>		

</div>


<!-- Results Display -->
<div style="width:1000; overflow:auto">
	<div id = "Posters" style="width: 1440; height: 750px;">

	</div>
</div>




<script>
	//var genre_ids = QueryString.c;
	var genre_id = window.location.search.substring(7);
	console.log(genre_id);
	console.log("./Get_Genre_Info.php?genre="+window.location.search.substring(7))

	var movie_info = [];


$(document).ready(function() {
    $.ajax({
		method:"get",
		url:"./Get_Genre_Info.php?genre="+window.location.search.substring(7),
		dataType:"json",
		error:function() { alert('error!');},
		success:function(data) {
			movie_info = []; //Clears Arrary
			Clear_Display(); //Clears Current Items
			for (var i = 0; i < data.length; i++){
				var movie = data[i];

				console.log(movie);

				movie_info.push(movie);
				Image_Function(movie.image_link, i);
			}
		}
	});
});



function Image_Function(link, i) {
    var x = document.createElement("IMG");
    x.setAttribute("id", "image"+i);
    x.setAttribute("src", "https://image.tmdb.org/t/p/original" + link);
    x.setAttribute("width", "150");
    x.setAttribute("style","padding:20px");
    x.setAttribute("onmouseover", "mOver(this)");
    x.setAttribute("onmouseout", "mOut(this)");
    x.setAttribute("usemap", "#map"+i);

    var a = document.createElement("AREA");
    a.setAttribute("style", "rect");
    a.setAttribute("coords","0,0,150,220");
    
	var text = JSON.stringify(movie_info[i]);   
	var RequestText = encodeURIComponent(text);
    a.setAttribute("href",'./Display_Movie.php?query=' + RequestText);


    var m = document.createElement("MAP");
    m.setAttribute("name", "map"+i);
    m.appendChild(a);

    x.appendChild(m);
    document.getElementById("Posters").appendChild(x);
}
				

function Clear_Display() {
	var element = document.getElementById("Posters");
	var numberOfChildren = element.children.length
	for (var i=0; i < numberOfChildren; i++) {document.getElementById("image"+i).remove(); }
}


function mOver(obj) {
	var index = obj.id.substring(5);
	var selected = movie_info[index];
	obj.setAttribute("width", '155');
	document.getElementById("current_image").src = obj.src;
	document.getElementById("Current_Title").innerHTML= selected.title;
	document.getElementById("Current_Release").innerHTML = selected.release_date;
	document.getElementById("Current_Overview").innerHTML = selected.overview;
	var percent = selected.rating*10*1.25;
	document.getElementById("stars").style.width = percent + "px";
}


function mOut(obj) {
	obj.setAttribute("width", '150');
}



    //"string".split(" ").map(function(cv,idx,self){return parseInt(cv);});

</script>





</body>
</head>
