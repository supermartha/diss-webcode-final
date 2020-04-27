<?php include('../headerForSubfolders.php'); ?>

<script>

window.onload = function() {
	trap_dict = JSON.parse(getCookie("trap_dict"));
	bath_dict = JSON.parse(getCookie("bath_dict"));
	trap_places_dict = JSON.parse(getCookie("trap_places"));
	bath_places_dict = JSON.parse(getCookie("bath_places"));
	trap_res = [];
	bath_res = [];
	trap_places_res = [];
	bath_places_res = [];
	for (key in trap_dict) {
		if (key != '') {
			if (trap_dict[key] > 1) {trap_res.push(key + ' (x' + trap_dict[key] + ')')}
			else {trap_res.push(key)};
		}
	}
	document.getElementById('trapResponses').innerHTML = trap_res.join(', ');

	for (key in bath_dict) {
		if (key != '') {
			if (bath_dict[key] > 1) {bath_res.push(key + ' (x' + bath_dict[key] + ')')}
			else {bath_res.push(key)};
		}
	}
	document.getElementById('bathResponses').innerHTML = bath_res.join(', ');

	for (key in trap_places_dict) {
		if (key != '') {
			if (trap_places_dict[key] > 1) {trap_places_res.push(key + ' (x' + trap_places_dict[key] + ')')}
			else {trap_places_res.push(key)};
		}
	}
	document.getElementById('trapPlaces').innerHTML = trap_places_res.join(', ')

	for (key in bath_places_dict) {
		if (key != '') {
			if (bath_places_dict[key] > 1) {bath_places_res.push(key + ' (x' + bath_places_dict[key] + ')')}
			else {bath_places_res.push(key)};
		}
	}
	document.getElementById('bathPlaces').innerHTML = bath_places_res.join(', ')
}



function play(audioName) {
    document.getElementById(audioName).play(); }

 </script>

<p>You're done!</p>
<p>Thanks for your participation.</p>

<div class="survey_code">
<h2>Survey Code</h2>
<p>Copy and paste the following code into the box on Mechanical Turk and click "Submit HIT" to be able to receive payment:</p>
<h2>mma73<?php echo($_COOKIE["ParticipantID"]); ?></h2>


<p>If you encounter any problems, you may contact the researcher at austen.14@osu.edu.</p>
</div>


<h2>What was this experiment about?</h2>

<p>You may have noticed that all of the sentences you heard ended with a word containing the letter "a" (for example, <i>bath</i> or <i>gas</i>). In half of the sentences, you heard the speaker pronounce the word with a <b>short-a</b> sound, like the vowel in <i>cat</i>. In the other half, you heard the speaker pronounce the word with a <b>long-ah</b> sound, like the vowel in <i>father</i>.</p>

<table class="debriefing_example">
<tr>
  <td><a href="#/" onClick="play('audioA')">
<div class="audioSmall">
<audio id="audioA" src="../sounds/debriefing/bath_short_ae.wav"></audio>
<img src="../speaker.png" width=25px /><br />
</div>
</a></td>
<td><i>bath</i> with short-a</td>
</tr>
<tr>
  <td><a href="#/" onClick="play('audioB')">
<div class="audioSmall">
<audio id="audioB" src="../sounds/debriefing/bath_long_ah.wav"></audio>
<img src="../speaker.png" width=25px /><br />
</div>
</a></td>
<td><i>bath</i> with long-ah</td>
</tr>
</table>

<p>This is related to a linguistic pattern called the <u><a href="https://en.wikipedia.org/wiki/Trap-bath_split">TRAP-BATH split</a></u>. In the south of England, words like <i>bath</i>, <i>grass</i>, and <i>laugh</i> are pronounced with a long-ah sound. In other parts of the UK, however, these words are all pronounced with short-a. These words are also pronounced with short-a in most dialects of American English.
</p>

<table>
<tr>
<td>
<table class="debriefing_example">
<tr>
  <td><a href="#/" onClick="play('audioC')">
<div class="audioSmall">
<audio id="audioC" src="../sounds/debriefing/southern_bath.wav"></audio>
<img src="../speaker.png" width=25px /><br />
</div>
</a></td>
<td>southern British speaker</td>
</tr>
<tr>
 	<td><a href="#/" onClick="play('audioD')">
	<div class="audioSmall">
	<audio id="audioD" src="../sounds/debriefing/northern_bath.wav"></audio>
	<img src="../speaker.png" width=25px /><br />
	</div>
	</a></td>
	<td>northern British speaker</td>
</tr>
<tr>
 	<td><a href="#/" onClick="play('audioE')">
	<div class="audioSmall">
	<audio id="audioE" src="../sounds/debriefing/american_bath.wav"></audio>
	<img src="../speaker.png" width=25px /><br />
	</div>
	</a></td>
	<td>American speaker</td>
</tr>
</table>
</td>
<td>(map here)</td>
</tr>
</table>

<p>We are interested in examining the <b>sociolinguistic perception</b> of the TRAP-BATH split: that is, how does hearing a person say <i>bath</i> or <i>grass</i> with a long-ah change a listener's opinion of that person? Based on previous research, we predict that hearing a person use long-ah should make that person sound more <b>posh</b>, <b>educated</b>, <b>upper class</b>, <b>pretentious</b>, and more likely to be <b>from the south of England</b>. We tested these predictions by asking you to give your opinions of people using long-ah versus short-a vowels.</p>

<h3>Your Results</h3>
Did your answers match our predictions?
<table class="results">
	<tr>
		<td>When you heard <b>long-ah</b>, you said the speaker was:</td> <td>When you heard <b>short-a</b>, you said the speaker was:</td>
	</tr>

	<tr>
		<td class="predictions"><b>our predictions</b>: educated; intelligent; pompous; posh; pretentious; upper class</td> <td class="predictions"><b>our predictions</b>: down-to-earth; friendly; less educated; working class</td>
	</tr>

	<tr>
		<td class="responses"><b>your answers</b>: <div id="bathResponses">oops, our code isn't working :(</div></td> <td class="responses"><b>your answers</b>: <div id="trapResponses">oops, our code isn't working :(</div></td>
	</tr>

	<tr>
		<td class="predictions"><b>our predictions about where you think the speaker is from</b>: from the south of England; from London</td> <td class="predictions"><b>our predictions about where you think the speaker is from</b>: from the north of England; cities like Manchester and Birmingham</td>
	</tr>

	<tr>
		<td class="responses"><b>your answers</b>: <div id="bathPlaces">oops, our code isn't working :(</div></td> <td class="responses"><b>your answers</b>: <div id="trapPlaces">oops, our code isn't working :(</div></td>
	</tr>
</table>

<h3>What will we do with your results?</h3>

<p>This was a pilot experiment to help us with designing a future experiment. We were trying to figure out what kinds of words or phrases people use most often to describe the difference between speakers who use the short-a versus the long-ah sound. In the next experiment, we'll use the most common words to ask people to rate speakers. For example, if lots of people use the word "posh", one of questions we will use in the next experiment might be "How posh does this person sound?".</p>

<h3>Some of those words sounded funny!</h3>

<p>If you're very familiar with southern British English or speak with a southern British accent yourself, you might have noticed some of the words you heard in the experiment were pronounced a bit funny. For example, you may have heard the word "gas" pronounced with long-ah, but in southern British English this word is actually pronounced with short-a, just like in northern British English and American English.</p>

[sound clips:]
[GAS with long-ah: no one actually pronounces it this way] [GAS with short-a: how southern British English speakers actually pronounce this word]

<p>In future work, we'll be examining whether the way southern British speakers actually pronounce a given word matters for that word's sociolinguistic perception. For example, if we find that <i>bath</i> sounds more posh with long-ah than with short-a, will it also be true that <i>gas</i> sounds more posh with long-ah than short-a, even though everyone pronounces it with short-a? We'll also be comparing whether British versus American listeners evaluate these words differently.</p>

<h3>Final Thoughts?</h3>

<p>If you have any additional comments about this experiment or the TRAP-BATH split after reading this page, you can let us know here or email us at austen.14@osu.edu.</p>

[TEXT BOX HERE] <br />

<a href="../familiarity.php">
<div class="button"> Next >> </div> 
</a>

<?php include('../footer.php') ?>