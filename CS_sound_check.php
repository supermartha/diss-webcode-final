<?php include('header.php'); ?>

<div id="instructions">
  
<h1>Section 3 of 4</h1>

<!----- Sound Check ------------->
<h2>Sound Check</h2>
<p>Please make sure that your volume is adjusted properly before proceeding. Click the 'play' button below and adjust your sound until you can clearly hear the word 'tomato'.</p>

<a href="#/" onClick="play('soundcheck')">
  <div class="audio_inline">
  <audio id="soundcheck" src="soundcheck.wav"></audio>
  <img src="speaker.png" width=100px /><br />
  <div id="replay_text">play</div>
</div>
</a>

<br /><br /><br />

<a href="CS_task.php">
<div class="button"> Next >> </div> 
</a>

<script>
	function play(audioName) {
    document.getElementById(audioName).play(); }
 </script>

<?php include('footer.php') ?>