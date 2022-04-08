<?php

include('getid3/getid3.php');

//file_put_contents("local.log","Hello World. Testing!\n",FILE_APPEND);

$use_generic = true;
if (is_int(intval($_GET['songid']))) {


//	$buf = sprintf("songid(raw): %s\n", $_GET['songid']);
//	file_put_contents("local.log",$buf,FILE_APPEND);
	

	$songid= $_GET['songid'];
	//$songid=101;
$link = mysqli_connect("localhost", "juke", "box", "jukejive");


if (mysqli_connect_errno()) {
	printf("Connection failed: %s\n", mysqli_connect_error());
	exit();
}


$query = sprintf("SELECT filename FROM songs WHERE songid=%s", $songid);
//file_put_contents("local.log",$query,FILE_APPEND);


$result = mysqli_query($link, $query);


if (mysqli_num_rows($result) > 0) {
//file_put_contents("local.log","rows > 0",FILE_APPEND);

	$row = mysqli_fetch_row($result);

	$getid3 = new getID3;
	$fileinfo = $getid3->analyze($row[0]);

	if(isset($fileinfo['comments']['picture'][0]))
	{
//echo "Found Picture";		
		header('Content-Type: ' . $fileinfo['comments']['picture'][0]['image_mime']);
		echo $fileinfo['comments']['picture'][0]['data'];
		$use_generic = false;
		//die;
	}

}

mysqli_close($link);

}

if ($use_generic){

	$fname = './mp3image.jpg';
	$fp = fopen($fname, 'rb');

	header("Content-Type: image/jpg");
	header("Content-Length: " . filesize($fname));

	fpassthru($fp);
}

?>
