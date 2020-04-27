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

function mean(arr) { // it's ok to use short variable names in short, simple functions
    // set all variables at the top, because of variable hoisting
    var i,
        sum = 0, // try to use informative names, not "num"
        len = arr.length; // cache arr.length because accessing it is usually expensive
    for (i = 0; i < len; i++) { // arrays start at 0 and go to array.length - 1
        sum += arr[i]; // short for "sum = sum + arr[i];"
    } // always use brackets. It'll save you headaches in the long run
    // don't mash your computation and presentation together; return the result.
    return sum / len;
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
	trap_answers = JSON.parse(getCookie("trap_answers"));
	bath_answers = JSON.parse(getCookie("bath_answers"));
	filler_word = JSON.parse(getCookie("filler_word"));
	filler_nonce = JSON.parse(getCookie("filler_nonce"));

	document.getElementById("trap_answers").style.height = mean(trap_answers) * 250 + "px";
	document.getElementById("bath_answers").style.height = mean(bath_answers) * 250 + "px";
  document.getElementById("filler_words").style.height = mean(filler_word) * 250 + "px";
  document.getElementById("filler_nonce").style.height = mean(filler_nonce) * 250 + "px";
	console.log(mean(trap_answers))

    // Get cookie for whether it's a US or UK participant
    participantCountry = getCookie('Country');
    console.log(participantCountry);
    if (participantCountry=='US') {redirectURL = 'https://app.prolific.ac/submissions/complete?cc=GFWK4YGE'}
    else {redirectURL = 'https://app.prolific.ac/submissions/complete?cc=T2FQ8X93'}
    document.getElementById('submitLink').href = redirectURL;

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

<p>This experiment focused on a linguistic pattern called the <u><a href="https://en.wikipedia.org/wiki/Trap-bath_split">TRAP-BATH split</a></u>. In the south of England, words like <i>bath</i>, <i>grass</i>, and <i>laugh</i> are pronounced with a long-ah sound, like the vowel in <i>father</i>. In other parts of the UK, however, these words are all pronounced with a short-a sound, like the vowel in <i>cat</i>. These words are also pronounced with short-a in most dialects of American English.


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

<p>We are studying whether Americans and northern British people know which words have the long-ah versus the short-a sound in the south of England. For example, an American imitating a British accent might incorrectly pronounce <i>gas</i> with a long-ah, even though it's actually pronounced with short-a.</p>


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

<p>We tested your knowledge of southern British English by asking you to decide whether words pronounced with long-ah were real words or not. (If you are from the south of England, you are in our "control group" to make sure that the experiment is working properly.) In the experiment, you heard four kinds of words:</p>

<ul>
	<li><b>BATH words</b> - words that are pronounced with long-ah in southern British English. You heard these pronounced with long-ah in the experiment. We predict that both Americans and British people will say that these are real words.</li>
  <br />
	<li><b>GAS words</b> - words that are pronounced with short-a in southern British English, but that you heard pronounced in this experiment with long-ah (e.g. <i>gahs</i> for <i>gas</i>). We predict that southern British people will say these are NOT real words, but that Americans will say they ARE real words (and that northern British people might be somewhere in between).</li>
  <br />
	<li><b>filler real words</b> - real words that didn't have any "a" vowel in them. These were chosen to distract you from the purpose of the experiment and to make sure you were paying attention. We predict that everyone should say these are real words.</li>
  <br />
	<li><b>filler non-words</b> - made-up words. Again, these were chosen to distract you from the purpose of the experiment and to make sure you were paying attention. We predict that everyone should say these are NOT real words.</li>
</ul>

<h3>Our Predictions</h3>
Here's what a "perfect" score should look like. We predict that results for people from the south of England should look similar to this, but that people from other places should have a higher percentage of "real word" responses for GAS words (the second bar from the left).

<ul id="q-graph">

<li class="qtr" id="q1"> BATH words
<ul>
<li class="sent bar" style="height: 250px;"> </li>
</ul>
</li>

<li class="qtr" id="q2"> GAS words
<ul>
<li class="sent bar" style="height: 10px;"> </li>
</ul>
</li>

<li class="qtr" id="q3"> filler real words
<ul>
<li class="sent bar" style="height: 250px;"> </li>
</ul>
</li>

<li class="qtr" id="q4">filler non-words
<ul>
<li class="sent bar" style="height: 10px;"> </li>
</ul>
</li>


<li id="ticks">
<div class="tick" style="height: 50px;"><p></p></div>
<div class="tick" style="height: 120px;"><p>100%</p></div>
<div class="tick" style="height: 120px;"><p>% "real word" responses</p></div>
<div class="tick" style="height: 0px;"><p>0%</p></div>
</li>

</ul>

<h3>Your Results</h3>
Did your answers match our predictions?

<ul id="q-graph">

<li class="qtr" id="q1"> BATH words
<ul>
<li class="sent bar" style="height: 250px;" id="bath_answers"> </li>
</ul>
</li>

<li class="qtr" id="q2"> GAS words
<ul>
<li class="sent bar" style="height: 10px;" id="trap_answers"> </li>
</ul>
</li>

<li class="qtr" id="q3"> filler real words
<ul>
<li class="sent bar" style="height: 250px;" id="filler_words"> </li>
</ul>
</li>

<li class="qtr" id="q4">filler non-words
<ul>
<li class="sent bar" style="height: 10px;" id="filler_nonce"> </li>
</ul>
</li>


<li id="ticks">
<div class="tick" style="height: 50px;"><p></p></div>
<div class="tick" style="height: 120px;"><p>100%</p></div>
<div class="tick" style="height: 120px;"><p>% "real word" responses</p></div>
<div class="tick" style="height: 0px;"><p>0%</p></div>
</li>

</ul>




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