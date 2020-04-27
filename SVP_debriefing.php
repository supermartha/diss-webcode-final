<!DOCTYPE HTML>
<html>
<header>
	<title> Experiment </title>
	<link rel="stylesheet" type="text/css" href="style.css">
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
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
</header>

<?php include_once 'functions.php'; ?>


<?php

$fields = array("comments");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $filename = 'results/SVPdebriefing_' . $_COOKIE["ParticipantID"];
  $res_file = fopen($filename, "w") or die("Unable to open file!");
  $header = array();

  # Make header
  foreach ($fields as $item) {
    fwrite($res_file, $item . "\t"); }
fwrite($res_file, "x");
  fwrite($res_file, "\n");

  # Add results
  foreach ($fields as $item) {
    $res = test_input2($_POST[$item]);
    fwrite($res_file, $res . "\t"); }


    fclose($res_file);

    # UK completion link
    $redirectURL = "https://app.prolific.ac/submissions/complete?cc=T2FQ8X93";

    # US completion link
    if ($_COOKIE["Country"] == "US") {
    	$redirectURL = "https://app.prolific.ac/submissions/complete?cc=GFWK4YGE";
    }

        ?>
<script type="text/javascript">
window.location = "<?php echo($redirectURL); ?>";
</script>      
    <?php

}

?>

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

    // Get cookie for whether it's a US or UK participant
    participantCountry = getCookie('Country');
    console.log(participantCountry);
    if (participantCountry=='US') {redirectURL = 'https://app.prolific.ac/submissions/complete?cc=GFWK4YGE'}
    else {redirectURL = 'https://app.prolific.ac/submissions/complete?cc=T2FQ8X93'}
    document.getElementById('link').href = redirectURL;

  }



function play(audioName) {
    document.getElementById(audioName).play(); }

 </script>

<body>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 

<div id="main">


<div class="survey_code">

<h3>Thanks for your participation. One final step!</h3>

<p>If you're curious to know what this experiment was about and want to see your results:</p>
<ul><li> keep reading this page and click the "Submit" button at the bottom of the page once you're done</li></ul>

<p>Otherwise:</p>

<ul><li>please click the "Submit" button at the bottom of the page now!</li></ul>


<p>If you encounter any problems, you may contact the researcher at austen.14@osu.edu.</p>

<p ><b>Data rights</b>: Your participant code for this study is <b><?php echo($_COOKIE["ParticipantID"]); ?></b>. Please write down this code for your records. If you ever wish to remove your data from this project, email us at austen.14@osu.edu with this code and we'll delete your data.</p>

</div>


<h2>What was this experiment about?</h2>

<p>You may have noticed that all of the sentences you heard ended with a word containing the letter "a" (for example, <i>bath</i> or <i>gas</i>). In half of the sentences, you heard the speaker pronounce the word with a <b>short-a</b> sound, like the vowel in <i>cat</i>. In the other half, you heard the speaker pronounce the word with a <b>long-ah</b> sound, like the vowel in <i>father</i>.</p>

<table class="debriefing_example">
<tr>
  <td><a href="#/" onClick="play('audioA')">
<div class="audioSmall">
<audio id="audioA" src="sounds/debriefing/bath_short_ae.wav"></audio>
<img src="speaker.png" width=25px /><br />
</div>
</a></td>
<td><i>bath</i> with short-a</td>
</tr>
<tr>
  <td><a href="#/" onClick="play('audioB')">
<div class="audioSmall">
<audio id="audioB" src="sounds/debriefing/bath_long_ah.wav"></audio>
<img src="speaker.png" width=25px /><br />
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
<audio id="audioC" src="sounds/debriefing/southern_bath.wav"></audio>
<img src="speaker.png" width=25px /><br />
</div>
</a></td>
<td>southern British speaker</td>
</tr>
<tr>
 	<td><a href="#/" onClick="play('audioD')">
	<div class="audioSmall">
	<audio id="audioD" src="sounds/debriefing/northern_bath.wav"></audio>
	<img src="speaker.png" width=25px /><br />
	</div>
	</a></td>
	<td>northern British speaker</td>
</tr>
<tr>
 	<td><a href="#/" onClick="play('audioE')">
	<div class="audioSmall">
	<audio id="audioE" src="sounds/debriefing/american_bath.wav"></audio>
	<img src="speaker.png" width=25px /><br />
	</div>
	</a></td>
	<td>American speaker</td>
</tr>
</table>
</td>
<td width="200px"><img src="trap_bath_map.png" height="200px" /><p class="smaller">purple area (approximate): <i>bath</i> pronounced with long vowel</p></td>
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

<table class="debriefing_example">
<tr>
  <td><a href="#/" onClick="play('audioF')">
<div class="audioSmall">
<audio id="audioF" src="sounds/debriefing/south-m-2_gas_bath.wav"></audio>
<img src="speaker.png" width=25px /><br />
</div>
</a></td>
<td><b>gas</b> with long-ah:
<p class="smaller">no one actually pronounces it this way</p>
<p class="smaller">(except Americans imitating British accents?)</p></td>
</tr>
<tr>
 	<td><a href="#/" onClick="play('audioG')">
	<div class="audioSmall">
	<audio id="audioG" src="sounds/debriefing/south-m-2_gas_natural.wav"></audio>
	<img src="speaker.png" width=25px /><br />
	</div>
	</a></td>
	<td><b>gas</b> with short-a:
	<p class="smaller"> actual southern British pronunciation</p></td>
</tr>
</table>

<p>In future work, we'll be examining whether the way southern British speakers actually pronounce a given word matters for that word's sociolinguistic perception. For example, if we find that <i>bath</i> sounds more posh with long-ah than with short-a, will it also be true that <i>gas</i> sounds more posh with long-ah than short-a, even though everyone pronounces it with short-a? We'll also be comparing whether British versus American listeners evaluate these words differently.</p>

<h3>Final Thoughts?</h3>

<p>If you have any additional comments about this experiment or the TRAP-BATH split after reading this page, you can let us know here or email us at austen.14@osu.edu.</p>


<textarea name="comments" rows="5" cols="40"></textarea> <br />

<br /><br /><br /><br /><br /><br />
</div>

<div style="position: fixed; bottom: 0; background: #919191; width: 100%; text-align: center; padding-bottom: 10px; border-top: solid 1px #000">
<a href="#" id="submitLink"><input type="submit" class="submit"></a>
</div>

</form>

</body>
</html>