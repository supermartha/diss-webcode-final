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

function predictionText(myText) {window.alert(myText)}
	</script>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

  <script>
  $(function() {
    var tooltip = $("#tooltip");
    $('[data-tooltip]').bind('mouseover', function() {
        var $this = $(this), offset = $this.offset(), posX = offset.left, posY = offset.top;
        posX += $this.find('span').innerWidth();
        tooltip.
            css({left: posX + "px", top: posY + "px"}).
            text($this.attr('data-tooltip')).
            removeClass("nd");
    }).bind('mouseout', function() { tooltip.addClass('nd'); });
});
</script>
</header>

<?php include_once 'functions.php'; ?>


<?php

$fields = array("comments");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $filename = 'results/CS_pilot_debriefing_' . $_COOKIE["ParticipantID"];
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

getCharPerc = function(character, res_array) {
  // Get percentage of responses which are a particular character
  char_count = 0;
  for (response in res_array) {
    if (res_array[response]==character) {char_count = char_count + 1}
  }
  // Figure out number of relevant trials - 2/3rds of total length
  total = res_array.length * 2 / 3;
  return(char_count/total)
}

window.onload = function() {
    // Get cookie for whether it's a US or UK participant
    participantCountry = getCookie('Country');
    console.log(participantCountry);
    if (participantCountry=='US') {redirectURL = 'https://app.prolific.ac/submissions/complete?cc=GFWK4YGE'}
    else {redirectURL = 'https://app.prolific.ac/submissions/complete?cc=T2FQ8X93'}
    document.getElementById('submitLink').href = redirectURL;



  }

showResults = function(stimulusType) {
  BATH_bath_res = JSON.parse(getCookie("BATH_bath_res"));
  BATH_trap_res = JSON.parse(getCookie("BATH_trap_res"));
  GAS_bath_res = JSON.parse(getCookie("GAS_bath_res"));
  GAS_trap_res = JSON.parse(getCookie("GAS_trap_res"));

  all_bath_responses = [getCharPerc('posh', BATH_bath_res), getCharPerc('fake posh', BATH_bath_res), getCharPerc('working class', BATH_bath_res), getCharPerc('posh', GAS_bath_res), getCharPerc('fake posh', GAS_bath_res), getCharPerc('working class', GAS_bath_res)];
  all_trap_responses = [getCharPerc('posh', BATH_trap_res), getCharPerc('fake posh', BATH_trap_res), getCharPerc('working class', BATH_trap_res), getCharPerc('posh', GAS_trap_res), getCharPerc('fake posh', GAS_trap_res), getCharPerc('working class', GAS_trap_res)];

  // Wow you can't just subtract arrays in Javascript
  BATH_TRAP_diff = [];
  for(var i = 0;i<=all_bath_responses.length-1;i++)
    {BATH_TRAP_diff.push(all_bath_responses[i] - all_trap_responses[i]);}
  // Order: BATH posh, BATH fake posh, BATH wc, GAS posh, GAS fake posh, GAS wc

  console.log(all_bath_responses);
  console.log(all_trap_responses);
  console.log(BATH_TRAP_diff);

    if (stimulusType == 'bath') {myArray = ["posh_BATH", "fakePosh_BATH", "wc_BATH"];
        document.getElementById('bathResults').innerHTML = "your results";
        }
    else {myArray = ["posh_GAS", "fakePosh_GAS", "wc_GAS"];
        document.getElementById('gasResults').innerHTML = "your results";
        }
    myArray.forEach(function(item){
        if (item=="posh_BATH") {value=BATH_TRAP_diff[0]}
          if (item=="fakePosh_BATH") {value=BATH_TRAP_diff[1]}
            if (item=="wc_BATH") {value=BATH_TRAP_diff[2]}
              if (item=="posh_GAS") {value=BATH_TRAP_diff[3]}
          if (item=="fakePosh_GAS") {value=BATH_TRAP_diff[4]}
            if (item=="wc_GAS") {value=BATH_TRAP_diff[5]}
        console.log(value);
        console.log((value + .5) * 250 );
        // Set height of bars
        document.getElementById(item).style.height = (value + 1) * 250/2 + "px";
        if (value==-1) {document.getElementById(item).style.height = "10px"}

        // Add tooltip text
        scaleName = item.split("_")[0];
        if (scaleName == "wc") {scaleName = "working class characters"}
        else if (scaleName == "posh") {scaleName = "'posh' characters"}
        else if (scaleName == "fakePosh") {scaleName = "'fake posh' characters"}
        else if (scaleName == "fake") {scaleName = "like the person is faking an accent"}
        else if (scaleName == "wealthy") {scaleName = "like the person comes from a wealthy background"}

        if (value < -.3) {toolText = "SHORT-A associated with"}
        else if (value < .0) {toolText = "SHORT-A weakly associated with"}
        else if (value < 1.3) {toolText = "LONG-AH weakly associated with"}
        else {toolText = "LONG-AH associated with"}
        toolText = "You: " + toolText + " " + scaleName

        if (value == 0) {toolText = "You: No association"}
        document.getElementById(item).setAttribute('data-tooltip', toolText);
    });   
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



<h2>Characters and Pronunciations</h2>

<p>In this experiment, you may have noticed that you heard the same word more than once, but pronounced in different ways. In the words we were interested in, you heard the word pronounced both with long-ah and with short-a. We compared how often you selected a given character when you heard long-ah versus short-a to determine how strongly you associate different character types with different pronunciations. Some of the words you heard were <b>BATH</b> words&mdash;the words that a southern British person would pronounce with long-ah. Other words were <b>GAS</b> words&mdash;the words that everyone pronounces with short-a, but might be pronounced with long-ah by an American trying to imitate a British accent.</p>

<p>For <b>BATH</b> words, we predicted that you would strongly associate <b>long-ah</b> with <b>'posh'</b> characters (<img src="images/characterSelection/character1.png" width="50px"> <img src="images/characterSelection/character4.png" width="50px">) and less strongly with <b>'fake posh'</b> characters (<img src="images/characterSelection/character3.png" width="50px"> <img src="images/characterSelection/character5.png" width="50px">). On the other hand, we predicted that you would associate <b>short-a</b> with <b>working class</b> characters (<img src="images/characterSelection/character6.png" width="50px"> <img src="images/characterSelection/character2.png" width="50px">). In the graph below, a higher value equals a stronger association with long-ah.</p>

<br />

<ul id="q-graph3">

<li class="qtr" id="q1">'Posh' Characters <img src="images/characterSelection/character1.png" width="70px">
<ul>
<li class="sent bar" id="educated_nonmerged" style="height: 230px;" data-tooltip="Prediction: LONG-AH associated with 'posh' characters"> </li>
<li class="paid bar" id="posh_BATH" style="height: 0px;" data-tooltip=""> </li>
</ul>
</li>

<li class="qtr" id="q2">'Fake Posh' Characters <img src="images/characterSelection/character3.png" width="70px">
<ul>
<li class="sent bar" id="pretentious_nonmerged" style="height: 170px;" data-tooltip="Prediction: LONG-AH (maybe) associated with 'fake posh' characters"> </li>
<li class="paid bar" id="fakePosh_BATH" style="height: 0px;" data-tooltip=""> </li>
</ul>
</li>

<li class="qtr" id="q3">Working Class Characters <img src="images/characterSelection/character6.png" width="70px">
<ul>
<li class="sent bar" id="class_nonmerged" style="height: 10px;" data-tooltip="Prediction: SHORT-A associated with working class characters"> </li>
<li class="paid bar" id="wc_BATH" style="height: 0px;" data-tooltip=""> </li>
</ul>
</li>


<li id="ticks">
<div class="tick" style="height: 50px;"><p> </p></div>
<div class="tick" style="height: 120px;"><p>1 (<b>associate with long-ah</b>)</p></div>
<div class="tick" style="height: 120px;"><p>0 (at chance = no association)</p></div>
<div class="tick" style="height: 0px;"><p>-1 (<b>associate with short-a</b>)</p></div>
</li>

</ul>
<div id="tooltip" class="nd"></div>
<table>
<tr>
<td class="nonmerged"> </td> <td class="label">our predictions</td> <td class="merged"></td> <td class="label" id="bathResults"><div class="pinkButton" onclick="showResults('bath') ">Show your results</div></td>
</tr>
</table>
<br /><br />
<hr />
<p>For <b>GAS</b> words, we're interested in knowing:
<ul>
    <li>Do people have the same opinion about long-ah in these words as they do for BATH words?</li>
    <li>Do Americans and Brits have different opinions from one another?</li>
</ul>

<p>We're testing the prediction that Americans have similar associations about long-ah in GAS words as they do in BATH words, but that British people have different associations. We predict that British people will associate long-ah in these words in these words with the 'fake posh' characters (<img src="images/characterSelection/character3.png" width="50px"> <img src="images/characterSelection/character5.png" width="50px">), but not with the 'posh' or working class characters. The graph below shows our predictions for British listeners.</p>


<ul id="q-graph3">

<li class="qtr" id="q1">'Posh' Characters <img src="images/characterSelection/character1.png" width="70px">
<ul>
<li class="sent bar" id="educated_nonmerged" style="height: 100px;" data-tooltip="Prediction: SHORT-A associated with 'posh' characters, or no association"> </li>
<li class="paid bar" id="posh_GAS" style="height: 0px;" data-tooltip=""> </li>
</ul>
</li>

<li class="qtr" id="q2">'Fake Posh' Characters <img src="images/characterSelection/character3.png" width="70px">
<ul>
<li class="sent bar" id="pretentious_nonmerged" style="height: 230px;" data-tooltip="Prediction: LONG-AH associated with 'fake posh' characters"> </li>
<li class="paid bar" id="fakePosh_GAS" style="height: 0px;" data-tooltip=""> </li>
</ul>
</li>

<li class="qtr" id="q3">Working Class Characters <img src="images/characterSelection/character6.png" width="70px">
<ul>
<li class="sent bar" id="class_nonmerged" style="height: 100px;" data-tooltip="Prediction: SHORT-A associated with working class characters, or no association"> </li>
<li class="paid bar" id="wc_GAS" style="height: 0px;" data-tooltip=""> </li>
</ul>
</li>


<li id="ticks">
<div class="tick" style="height: 50px;"><p> </p></div>
<div class="tick" style="height: 120px;"><p>1 (<b>associate with long-ah</b>)</p></div>
<div class="tick" style="height: 120px;"><p>0 (at chance = no association)</p></div>
<div class="tick" style="height: 0px;"><p>-1 (<b>associate with short-a</b>)</p></div>
</li>

</ul>
<div id="tooltip" class="nd"></div>
<table>
<tr>
<td class="nonmerged"> </td> <td class="label">our predictions</td> <td class="merged"></td> <td class="label" id="gasResults"><div class="pinkButton" onclick="showResults('gas') ">Show your results</div></td>
</tr>
</table>

<br />
<hr />

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