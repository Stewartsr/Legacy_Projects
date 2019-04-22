<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="Search_Style.css">
<link rel="stylesheet" type="text/css" href="pageStyle.css">
<title>Movie Search</title>
<link rel="shortcut icon" href="./images/icon.ico" />
<script src="jquery-1.12.0.min.js"></script>
<!-- <h2>Display Movies Info</h2> -->
</head>
<body>

<nav>
<?php include("navlinks.html");
?>
</nav>

<!-- Search Bar -->
<div id = "top_bar" class="top_bar">
	<!-- Search Bar -->
	<input type="search" id="search_Bar" placeholder="Search for Movie" class="search">
	<button onclick="Display_Search()">Search</button>
</div>


<!-- Current Movie and Info -->
<div id = "Current_Info" class="currentInfo">
	<img id = "current_image" src="" width="150" style="margin-right: 15px; float: left;">

	<!-- Star Rating -->
	<div class="star-ratings-css">
	  <div id = "stars" class="star-ratings-css-top" style="width:0%"><span>★</span><span>★</span><span>★</span><span>★</span><span>★</span></div>
	</div> 

	<!-- Current Info -->
	<p id = "Current_Title" class="lookUpInfo">Title</p>
	<p id = "Current_Release" class="lookUpInfo">Release Date</p>
	<p id = "Current_Overview" class="lookUpInfo">Overview</p>		


</div>


<!-- Results Display -->
<div style="width:1000; height:800px; overflow:auto">
	<div id = "Posters" style="width: 1440; height: 750px;">

	</div>
</div>







<script>
	var movie_info = [];
</script>




<script>
$("#Current_Info").hide();


//Search Bar Function
function Display_Search() {
    var query = document.getElementById("search_Bar").value;
    $.ajax({
		method:"get",
		url:"Get_Movie_Info2.php?query="+query,
		dataType:"json",
		error:function() { alert('error!');},
		success:function(data) {
			movie_info = []; //Clears Arrary
			Clear_Display(); //Clears Current Items
			for (var i = 0; i < data.length; i++){
				var movie = data[i];
				movie_info.push(movie);
				Image_Function(movie.image_link, i);
			}
		}
	});
}



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
    // a.setAttribute("href","https://image.tmdb.org/t/p/original" + link);			//THIS CONTROLS WHERE CLICKING WILL BE SENT
    

	var text = JSON.stringify(movie_info[i]);   //Do PHP Echo maybe
	var RequestText = encodeURIComponent(text);
	

    a.setAttribute("href",'Display_Movie.php?query=' + RequestText);


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
	
    	$("#Current_Info").show();
	var index = obj.id.substring(5);
	var selected = movie_info[index];
	obj.setAttribute("width", '155');
	document.getElementById("current_image").src = obj.src;
	document.getElementById("Current_Title").innerHTML= selected.title;
	document.getElementById("Current_Release").innerHTML = selected.release_date;
	document.getElementById("Current_Overview").innerHTML = selected.overview;
	var percent = selected.rating*10*1.25;
	document.getElementById("stars").style.width = percent + "px";
	//console.log(movie_info[index]);									
}


function mOut(obj) {
	obj.setAttribute("width", '150');
}

</script>




</body>
</head>

