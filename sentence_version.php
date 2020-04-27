<?php include('header.php'); ?>

<script>
function chooseButton(buttonID, oppositeButtonID) {
	document.getElementById(buttonID).style.background = "#21bfb9";
	document.getElementById(buttonID).style.color = "#fff";
	document.getElementById(oppositeButtonID).style.background = "none";
	document.getElementById(oppositeButtonID).style.color = "#333333";
}

function play(audioName) {
    document.getElementById(audioName).play();
}

</script>

<table class="sentence_version">
<tr>
	<td></td>
	<td><a href="#/" onClick="play('audioA')">
<div class="audio">
<audio id="audioA" src="daniel_stimuli/DL_northern_bath.wav"></audio>
<img src="speaker.png" width=100px /><br />
<div id="replay_text">Version A</div>
</div>
</a></td>
	<td><a href="#/" onClick="play('audioB')">
<div class="audio">
<audio id="audioB" src="daniel_stimuli/DL_southern_bath.wav"></audio>
<img src="speaker.png" width=100px /><br />
<div id="replay_text">Version B</div>
</div>
</a></td>
</tr>
<tr>
	<td class="openingQuestion"><b>Which version sounds more...</b></td>
	<td></td>
	<td></td>
</tr>
<tr>
	<td>... posh?</td>
	<td><div class="check" id="q1a" onclick="chooseButton('q1a', 'q1b')">A</div></td>
	<td><div class="check" id="q1b" onclick="chooseButton('q1b', 'q1a')">B</div></td>
</tr>

<tr>
	<td>... like a BBC radio announcer?</td>
	<td><div class="check" id="q2a" onclick="chooseButton('q2a', 'q2b')">A</div></td>
	<td><div class="check" id="q2b" onclick="chooseButton('q2b', 'q2a')">B</div></td>
</tr>

<tr>
	<td>... like the speaker is putting on an accent?</td>
	<td><div class="check" id="q3a" onclick="chooseButton('q3a', 'q3b')">A</div></td>
	<td><div class="check" id="q3b" onclick="chooseButton('q3b', 'q3a')">B</div></td>
</tr>

<tr>
	<td>... like the speaker is from the south of England?</td>
	<td><div class="check" id="q4a" onclick="chooseButton('q4a', 'q4b')">A</div></td>
	<td><div class="check" id="q4b" onclick="chooseButton('q4b', 'q4a')">B</div></td>
</tr>

<tr>
	<td>... like the speaker is talking the way they normally talk?</td>
	<td><div class="check" id="q5a" onclick="chooseButton('q5a', 'q5b')">A</div></td>
	<td><div class="check" id="q5b" onclick="chooseButton('q5b', 'q5a')">B</div></td>
</tr>

<tr>
	<td><p class="question">Comments (optional):</p> <textarea name="experiment_purpose" rows="5" cols="40"></textarea>
</td>
	<td></td>
	<td></td>
</tr>

</table>



<?php include('footer.php'); ?>