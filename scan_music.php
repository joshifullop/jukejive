<?php

include('getid3/getid3.php');

$link = mysqli_connect("localhost", "juke", "box", "jukejive");


if (mysqli_connect_errno()) {
	printf("Connection failed: %s\n", mysqli_connect_error());
	exit();
}



$getID3 = new getID3;


exec('find "/media/usb/music/"', $ffiles);
foreach ($ffiles as $filename) {
	
	$i = 0;
	$i = strpos($filename, ".mp3");
	if ($i > 0) {
		
	printf("Processing: %s\n", $filename);
	

$fileinfo = $getID3->analyze($filename);


//$tag = id3_get_tag('chr.mp3');
//print_r($fileinfo['tags']['id3v2']);

$tags = $fileinfo['tags']['id3v2'];

$title = mysqli_real_escape_string($link, $tags['title'][0]);
$artist = mysqli_real_escape_string($link, $tags['artist'][0]);
//$band = mysqli_real_escape_string($link, $tags['band'][0]);
$album = mysqli_real_escape_string($link, $tags['album'][0]);
$track_raw = mysqli_real_escape_string($link, $tags['track_number'][0]);
$set_part = mysqli_real_escape_string($link, $tags['part_of_a_set'][0]);
$year_released = mysqli_real_escape_string($link, $tags['year'][0]);
//$copyright = mysqli_real_escape_string($link, $tags['copyright_message'][0]);
$publisher = mysqli_real_escape_string($link, $tags['publisher'][0]);
//$comment = mysqli_real_escape_string($link, $tags['comment'][0]);
$bpm = mysqli_real_escape_string($link, $tags['bpm'][0]);
$genre = mysqli_real_escape_string($link, $tags['genre'][0]);

$track = strtok($track_raw, '/- ');
if ($bpm == NULL) { $bpm="0"; }
if ($year_released == NULL) { $year_released=0; }

$iquery = sprintf("INSERT INTO songs (title, artist, album, track, set_part, year_released, publisher, bpm, genre, filename) VALUES ('%s', '%s', '%s', %s, '%s', %s, '%s', %s, '%s', '%s')", $title, $artist, $album, $track, $set_part, $year_released, $publisher, $bpm, $genre, mysqli_real_escape_string($link, $filename)); 




//printf("Query: %s\n", $iquery);

$ires = mysqli_query($link, $iquery);
if ($ires == 0) {
	echo "Error: " . mysqli_error($link);
}




	}
}

//print_r(get_included_files());


mysqli_close($link);

?>
