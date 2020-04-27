<?php include('audio_header.php'); ?>


<script type="text/javascript">
	function check_word() {
		var word = document.getElementById('soundcheck').value.toLowerCase().replace(/(^\s+|\s+$)/g,'');
		if (word == 'tomato' || word == 'tomatoe') {window.location = "post_sound_check.php"; return false}
		else {document.getElementById('try_again').innerHTML = '';
			window.setTimeout(write_message,300)
			document.getElementById('soundcheck').value = ''; return false}
	}

	function write_message() {document.getElementById('try_again').innerHTML = '<b>Sorry, try again!</b>'; }
</script>      



<script>
document.getElementById('audio1').src = "soundcheck.wav"
document.getElementById('replay_text').innerHTML = "play"
</script>

<h1>Sound Check</h1>

<p>To complete this experiment, you'll need to have working sound. Click the "play" button on the right-hand side of the page, then type the word that you hear. (Hint: it will be a food and spoken in an American accent.)</p>

<p id="try_again"></p>

<form class="demographics">  

<input type="textbox" id="soundcheck" /><br /><br />

<input type="submit" class="submit" onClick="return check_word()">

</form>

<?php include('footer.php'); ?>