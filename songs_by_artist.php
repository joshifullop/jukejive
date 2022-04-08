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
		<div id="SBA">
<?php

/*
	//$group=0;
	if (is_int(intval($_GET['group']))) {
		$group=intval($_GET['group']);
		echo "Got INT for group: $group <br>";
	}
	if ( ($group < 1) || ($group > 5)) { $group=0; }
	echo "Group: $group <br>";
 */


	$link = mysqli_connect("localhost", "juke", "box", "jukejive");
	if (mysqli_connect_errno()) {
		printf("Connection failed: %s\n", mysqli_connect_error());
		exit();
	}

	$artist = urldecode($_GET['artist']);
	echo "<h2>Songs by $artist</h2>";
	$e_artist = mysqli_real_escape_string($link, $artist);
	//echo "<h2>Songs by $escaped</h2>";

	if (strlen($artist) > 0 ){

		$query = sprintf("SELECT DISTINCT album, year_released FROM songs WHERE artist='%s' ORDER BY year_released ASC", $e_artist);
		//echo "Query: $query <br><br>";

		$result = mysqli_query($link, $query);

		if (mysqli_num_rows($result) > 0) {
			while ($row = mysqli_fetch_row($result)){
				echo "<h3>$row[0] ($row[1])</h3>";
				$e_album = mysqli_real_escape_string($link, $row[0]);
				$query2 = sprintf("SELECT songid, title, track FROM songs WHERE artist='%s' AND album='%s' ORDER BY track ASC",$e_artist,$e_album);		
				$result2 = mysqli_query($link, $query2);
				while ($row2 = mysqli_fetch_row($result2)) {
					//echo "<button type=\"button\" onclick=\"requestSong($row2[0])\">Request</button>($row2[2]) $row2[1] [$row2[0]]<br>";

					echo "<button type=\"button\" onclick=\"requestSong($row2[0])\">Request</button>($row2[2]) $row2[1]<br>";


				}	

				echo "<br>";
		}

		}else{
			echo "No Artists in this group.<br>";
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

<script>
function requestSong(songid) {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
	//document.getElementById("now_playing").innerHTML = this.responseText;
	alert("Your request has been submitted.");
    }else{
	//TODO: report on submission failure    
	//alert("There was a problem in making your request.");
    }	    
  };
  xhttp.open("GET", "request_song.php?songid="+songid, true);
  xhttp.send(); 
}

</script>


</body>
</html>



