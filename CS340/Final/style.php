<?php
	header("Content-type: text/css; charset: UTF-8");

	$accent = "#4286f4";
?>

*{
    box-sizing:border-box;
    padding: 0;
    margin: 0;
    font-family: sans-serif;
}
body {
	background-color: <?php echo $accent; ?>;
}

.nav {
	background-color: #f2f2f2;
	list-style-type: none;
	overflow: hidden;
	line-height: 1em;
}
.nav li {float: right;}
.nav li a {
	display: block;
	color: <?php echo $accent; ?>;
	text-transform: uppercase;
	text-align: center;
	padding: 14px 16px;
	text-decoration: none;
}
.active {
	color: white !important;
	background-color: <?php echo $accent; ?>;
}

.wrap {
	margin-top: 4%;
	display: flex;
	flex-wrap: wrap;
	justify-content: center;
}
.container{
    display: inline-block;
    z-index: 1;
    background: #FFFFFF;
    max-width: 450px;
    margin: 0 2%;
    padding: 45px;
    text-align: center;
    box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.3);
}

.container input {
    outline: 0;
    background: #f2f2f2;
    width: 100%;
    border: 0;
    margin: 0 0 15px;
    padding: 15px;
    box-sizing: border-box;
    font-size: 14px;
}

.container input:focus {
	border: 1px solid <?php echo $accent; ?>;
	background: #f9f9f9;
}

.container input::placeholder {
	opacity: .5;
}

#entry, #view{
	text-transform: uppercase;
	outline: 0;
	background: <?php echo $accent; ?>;
	width: 100%;
	border: 0;
	padding: 15px;
	color: #FFFFFF;
	font-size: 14px;
	-webkit-transition: all 0.3 ease;
	transition: all 0.3 ease;
	cursor: pointer;
}

#entry:hover, #view:hover,#entry:active, #view:active,#entry:focus, #view:focus {
	background: #444444;
}

h1{
	text-transform: uppercase;
	font-size: 24pt;
	margin-bottom: 15px;
}
p {
	margin: 0 15px;
	text-transform: uppercase;
	font-size: 9pt;
	letter-spacing: 1px;
}
table {
	width: 100%;
	border-collapse: collapse;
	border: none;
	text-align: left;
	font-size: 11pt;
}
td {
	padding: 3px;
	text-align: left;
}
th {
	text-transform: uppercase;
	font-size: 10pt;
}