<!DOCTYPE html>

<html lang="en">
<head>
<meta charset="utf-8">
<title>JukeJive</title>

<style>
    body {
        font: 14px Arial,sans-serif; 
        margin: 0px;
    }
    .header {
        padding: 10px 20px;
        background: #acb3b9; 
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
	width: 5%;
	height: 100px;
	background: #ff0000;
	padding: 0px;

    }
    npdata {
	float:left;
	width: 95%;
	background: #00ff00;
	padding: 0px;
    }

</style>
</head>

<body style="margin:0px;">

    <div class="container">
        <div class="header">
            <h1>JukeJive Web Jukebox</h1>
        </div>
        <div class="wrapper clearfix">
            <div class="nav">
                <button type="button" onclick="refreshNowPlaying()">Now Playing</button>
		<ul>
		    <li><a href="#">Home</a></li>
                    <li><a href="#">About</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
            </div>
            <div class="section">
               <!-- <h2>Now Playing</h2>
		<p id="now_playing">Here you will see what's playing</p>
		<p id="queue">Here is what is next.</p>
-->
	    <div id="now_playing">
	    <np>
		<npimage>IMG</npimage>
		<npdata style="height=100px">
			<div style="height:20px;background-color:#999999;padding:0px;"><i>Now Playing</i></div>
			<div style="height:50px;padding:5px">Song Title Here</div>
			<div style="height:20px;">track info here</div>
		</npdata>
	    </np>
	    </div>

		<p>Queue or selection stuff here.</p>

	    </div>
        </div>
        <div class="footer">
            <p>copyright &copy; Joshi Fullop</p>
        </div>
    </div>


