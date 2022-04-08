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
		<div id="now_playing">Here you will see what's playing</div>
		<div id="queue">Here is what is next.</div>
            </div>
        </div>
        <div class="footer">
            <p>copyright &copy; Joshi Fullop</p>
        </div>
    </div>




<script>
function refreshNowPlaying() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("now_playing").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "now_playing.php", true);
  xhttp.send(); 
}

function refreshQueue() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("queue").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "queue.php", true);
  xhttp.send();
}

var refQueueInterval = window.setInterval('refreshQueue()', 5000); // 5 seconds
var refNowPlayingInterval = window.setInterval('refreshNowPlaying()', 5000); // 5 seconds
/* NOTE: to pause/stop the interval: clearInterval(refQueueInterval);  and to restart: setInterval();  */	

refreshNowPlaying();
refreshQueue();




</script>

</body>
</html>



