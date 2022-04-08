<!DOCTYPE html>

<html lang="en">
<head>
<meta charset="utf-8">
<title>JukeJive</title>
<link rel="icon" 
      type="image/png" 
      href="jj-logo.png">


<style>
    body {
        font: 14px Arial,sans-serif; 
        margin: 0px;
    }
    .header {
        padding: 5px 20px;
        background: #acb3b9; 
	font-size: 24px;
    }
    .header h1 {
	font-size: 24px;
    }
    .container {
        width: 100%;
        background: #f2f2f2; 
    }
    .nav, .section {
        float: left; 
        padding: 20px;
        min-height: 170px;
        box-sizing: border-box;
    }
    .nav {            
        width: 10%;             
        background: #d4d7dc;
    }
    .section {
        width: 90%;
    }
    .nav ul {
        list-style: none; 
        line-height: 24px;
        padding: 0px; 
    }
    .nav ul li a {
        color: #333;
    }    
    .clearfix:after {
        content: ".";
        display: block;
        height: 0;
        clear: both;
        visibility: hidden;
    }
    .footer {
        background: #acb3b9;            
        text-align: center;
        padding: 5px;
    }
    th, td {
	padding: 7px;
    }

    np::after{
	content: "";
	display: table;
	clear: both;	
    }
    npimage {
	float: left;
	width: 100px;
	height: 90px;
	/*background: #ff0000; */
	padding: 0px;

    }
    npdata {
	float:left;
	width: 70%;
	/*background: #00ff00; */
	padding: 0px;
    }


</style>
</head>

<body style="margin:0px;">

    <div class="container">
        <div class="header">
            <img src="jj-logo.png" width=75pz><b>JukeJive Web Jukebox</b>
        </div>
        <div class="wrapper clearfix">
            <div class="nav">
<!--
		<button type="button" onclick="refreshNowPlaying()">Now Playing</button>
		<button type="button" onclick="requestByArtist()">Request by Artist</button>
-->
<?php include('nav.php'); ?>
	    </div>
            <div class="section">
		<div id="about">
		<h1>Donate!</h1>
		<p>So you want to donate? That's easy: just find Joshi and buy him a beer!</p></div>
            </div>
        </div>
        <div class="footer">
            <p>copyright &copy; Joshi Fullop</p>
        </div>
    </div>




</body>
</html>



