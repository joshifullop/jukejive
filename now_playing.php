<?php


$link = mysqli_connect("localhost", "juke", "box", "jukejive");

if (mysqli_connect_errno()) {
	printf("Connection failed: %s\n", mysqli_connect_error());
	exit();
}

$query = "SELECT songid, title, artist, band, album, track, set_part, year_released, copyright, publisher, comment, bpm, genre, filename, status FROM SongQueue WHERE status=1";

$result = mysqli_query($link, $query);

if (mysqli_num_rows($result) > 0) {

	$row = mysqli_fetch_row($result);

	echo "<np>";
	echo "	<npimage><img src=\"get_song_img.php?songid=$row[0]\" height=90px width=90px></npimage>";
	echo "	<npdata style=\"\">";
	echo "		<div style=\"height:20px;padding:0px;\"><i>Now Playing</i></div>";
	echo "		<div style=\"height:40px;padding:3px;font-size:225%\">$row[1]</div>";
	echo "		<div style=\"height:20px;padding:2px\">Artist: <b>$row[2]</b> Album: <b>$row[4]</b>, (Track: $row[5]), Year: $row[7]</div>";
	echo "	</npdata>";
	echo "</np>";

}else{
	echo "Nothing currently playing.<br>";
}

//$CurTime = strftime("%F %T", time());
//echo "<br>Current Time: $CurTime<br>";


mysqli_close($link);

?>
