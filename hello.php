<html>

<header>
	<title> hello </title>
	<link rel="stylesheet" type="text/css" href="style.css">
</header>

<body>

<script>
function play() {
    document.getElementById('audio1').play();
}
</script>

<a href="#" onClick="play()">
<div class="audio">
<audio id="audio1" src="sample.wav"></audio>
<img src="speaker.png" width=100px /><br />
replay
</div>
</a>

<div id="main">

<progress max="30" value="1"></progress> <br />
1/30

<?php echo '<p>Hello World</p>'; ?> 

<div class="question">
	<p> How <b>educated</b> does this person sound? </p>
	<div class="slider"> not very educated <input type='range' min=0 max=1000 /> very educated </div>
</div>

<div class="question">
	<p> How <b>pretentious</b> does this person sound? </p>
	<div class="slider"> not very pretentious <input type='range' min=0 max=1000 /> very pretentious </div>
</div>

<div class="question">
	<p> How <b>upper class</b> does this person sound? </p>
	<div class="slider"> working class <input type='range' min=0 max=1000 /> upper class </div>
</div>

<div class="question">
	<p> How <b>friendly</b> does this person sound? </p>
	<div class="slider"> not very friendly <input type='range' min=0 max=1000 /> very friendly </div>
</div>

<div class="question">
	<p> How <b>black</b> does this person sound? </p>
	<div class="slider"> definitely not black <input type='range' min=0 max=1000 /> definitely black </div>
</div>

<div class="question">
	<p> How <b>Southern</b> does this person sound? </p>
	<div class="slider"> definitely not Southern <input type='range' min=0 max=1000 /> definitely Southern </div>
</div>

<a href="blah.html">
<div class="button"> Next </div>
</a>

</div>



</body>

</html>