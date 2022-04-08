<?php


if(intval($_GET['songid']) > 0){
	$songid = $_GET['songid'];
	$link = mysqli_connect("localhost", "juke", "box", "jukejive");

	if (mysqli_connect_errno()) {
		printf("Connection failed: %s\n", mysqli_connect_error());
		exit();
	}

	$query = sprintf("insert into song_queue (songid, requesterid, priority) VALUES (%s, 'test', 100)", $songid);

//$query = sprintf("INSERT INTO songs (title, artist, band, album, track, set_part, year_released, copyright, publisher, comment, bpm, genre, filename) VALUES ('%s', '%s', '%s', '%s', %s, '%s', %s, '%s', '%s', '%s', %s, '%s', '%s')", $title, $artist, $band, $album, $track, $set_part, $year_released, $copyright, $publisher, $comment, $bpm, $genre, mysqli_real_escape_string($link, $filename)); 


//printf("Query: %s\n", $iquery);

	$result = mysqli_query($link, $query);
	if ($result == 0) {
		echo "Error: " . mysqli_error($link);
	}




mysqli_close($link);
}
?>
