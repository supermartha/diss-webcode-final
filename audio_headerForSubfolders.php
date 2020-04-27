<?php
# layout.php
require_once('../PageTemplate.php');
?>

<!DOCTYPE HTML>
<html>
<header>
	<title> Experiment </title>
	<link rel="stylesheet" type="text/css" href="../style.css">
	<?php if(isset($TPL->ContentHead)) { include $TPL->ContentHead; } ?>
	<script>
		function shuffleArray(array) {
    	for (var i = array.length - 1; i > 0; i--) {
        	var j = Math.floor(Math.random() * (i + 1));
        	var temp = array[i];
        	array[i] = array[j];
        	array[j] = temp;
    	}
	}

	function getCookie(name) {
  var value = "; " + document.cookie;
  var parts = value.split("; " + name + "=");
  if (parts.length == 2) return parts.pop().split(";").shift();
}
	</script>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script> <!--include AJAX-->
</header>
<?php include_once '../functions.php'
 ?>
<body>

<script>
function play() {
    document.getElementById('audio1').play();
}
</script>

<a href="#/" onClick="play()">
<div class="audio">
<audio id="audio1" src="../sample.wav"></audio>
<img src="../speaker.png" width=100px /><br />
<div id="replay_text">replay</div>
</div>
</a>



<div id="main">