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
			<td><a href="request_by_artist.php?group=1">A-E</a></td>
			<td><a href="request_by_artist.php?group=2">F-J</td>
			<td><a href="request_by_artist.php?group=3">H-L</td>
			<td><a href="request_by_artist.php?group=4">M-Q</td>
			<td><a href="request_by_artist.php?group=5">R-Z</td>
		</tr></table><br><hr><br>
<?php

	//$group=0;
	if (isset($_GET['group'])){
       		if(is_int(intval($_GET['group']))) {
			$group=intval($_GET['group']);
			//echo "Got INT for group: $group <br>";
		}
	}
	if ( ($group < 1) || ($group > 5)) { $group=0; }
	//echo "Group: $group <br>";

	if ($group > 0 ){
		switch ($group) {
			case 1:
				$group_chars = "A-Ea-e";
				break;
			case 2:
				$group_chars = "F-Jf-j";
				break;
			case 3:
				$group_chars = "H-Lh-l";
				break;
			case 4:
				$group_chars = "M-Qm-q";
				break;
			case 5:
				$group_chars = "R-Zr-z";
				break;
			default:			
				$group_chars = "A-Ea-e";
				break;
		}
		$link = mysqli_connect("localhost", "juke", "box", "jukejive");


		if (mysqli_connect_errno()) {
			printf("Connection failed: %s\n", mysqli_connect_error());
			exit();
		}

		$query = sprintf("SELECT DISTINCT BINARY(artist) FROM songs WHERE artist REGEXP '^[%s]' ORDER by artist ASC", $group_chars);
		//echo "Query: $query <br><br>";

		$result = mysqli_query($link, $query);

		if (mysqli_num_rows($result) > 0) {
			while ($row = mysqli_fetch_row($result)){
			$encoded_artist = urlencode($row[0]);
			echo "<a href=\"songs_by_artist.php?artist=$encoded_artist\">$row[0]<a><br>";
			//echo "-----<br>";
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




</body>
</html>



