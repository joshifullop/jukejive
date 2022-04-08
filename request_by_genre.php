<!DOCTYPE html>

<html lang="en">
<head>
<meta charset="utf-8">
<title>JukeJive</title>
<link rel="icon" 
      type="image/png" 
      href="jj-logo.png">
<link rel="stylesheet" href="jukejive.css">

</head>

<body style="margin:0px;">

    <div class="container">
        <div class="header">
		<?php include 'header.php'; ?>	    
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
		<div id="RBA">
		<h2>Artists</h2>
		<table width=80%><tr>
<?php
		$link = mysqli_connect("localhost", "juke", "box", "jukejive");
		if (mysqli_connect_errno()) {
			printf("Connection failed: %s\n", mysqli_connect_error());
			exit();
		}
		//$genre = $_GET['genre'];
		//$encoded_genre = urlencode($genre);
		$query = sprintf("SELECT DISTINCT BINARY(genre) FROM songs ORDER BY genre");
		//echo "Query: $query <br><br>";

		$result = mysqli_query($link, $query);

		if (mysqli_num_rows($result) > 0) {
			while ($row = mysqli_fetch_row($result)){
			//$encoded_genre = urlencode($row[0]);
			echo "<td><a href=\"request_by_genre.php?genre=$row[0]\"<a>$row[0]</td>";
			//echo "-----<br>";
		}

		}else{
			echo "No Artists in this genre.<br>";
		}


?>
		</tr></table><br><hr><br>
<?php

	$genre="";
	if (isset($_GET['genre'])){
       		if(is_int(intval($_GET['genre']))) {
			$genre=mysqli_real_escape_string($link, $_GET['genre']);
			//echo "Got INT for genre: $genre <br>";
		}
	}

	if (strlen($genre) > 0 ){

		$encoded_genre = urlencode($genre);
		$query = sprintf("SELECT DISTINCT BINARY(artist) FROM songs WHERE genre='%s' ORDER by artist ASC", $genre);
		//echo "Query: $query <br><br>";

		$result = mysqli_query($link, $query);

		if (mysqli_num_rows($result) > 0) {
			while ($row = mysqli_fetch_row($result)){
			$encoded_artist = urlencode($row[0]);
			echo "<a href=\"songs_by_artist.php?artist=$encoded_artist\">$row[0]<a><br>";
			//echo "-----<br>";
		}

		}else{
			echo "No Artists in this genre.<br>";
		}

		mysqli_close($link);	
			
	}

?>
		</div>
            </div>
        </div>
        <div class="footer">
            <p>copyright &copy; Joshi Fullop</p>
        </div>
    </div>




</body>
</html>



