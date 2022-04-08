<?php

echo "<br><i>Up Next</i><br>";

$link = mysqli_connect("localhost", "juke", "box", "jukejive");


if (mysqli_connect_errno()) {
	printf("Connection failed: %s\n", mysqli_connect_error());
	exit();
}

$query = "SELECT songid, title, artist, band, album, track, set_part, year_released, copyright, publisher, comment, bpm, genre, filename, status, priority FROM SongQueue WHERE status=0 ORDER BY priority DESC";

$result = mysqli_query($link, $query);

if (mysqli_num_rows($result) > 0) {
	echo "<table border=1><tr><th>Song</th><th>Artist</th><th>Album</th><th>Year</th><th>Priority</th></tr>";
	while ($row = mysqli_fetch_row($result)){
	echo "<tr><td style=\"font-size:125%\">$row[1]</td><td>$row[2]</td><td>$row[4]</td><td>$row[7]</td><td>$row[15]</td></tr>";
//	echo "Artist: <b>$row[2]</b>, ";
//	echo "Album: <b>$row[4]</b>, (Track: $row[5]), ";
//	echo "Year: $row[7]";
//	echo "Copyright: $row[8]<br>";
//	echo "Comment: $row[10]<br>";
	}
	echo "</table>";

}else{
	echo "Nothing in the queue.<br>";
}

//$CurTime = strftime("%F %T", time());
//echo "<br>Current Time: $CurTime<br>";


mysqli_close($link);

?>
