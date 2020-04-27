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

function mean(arr) {
    var i,
        sum = 0, 
        len = arr.length; 
    for (i = 0; i < len; i++) { 
        sum += arr[i];
    }
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
    	$redirectURL = "https://app.prolific.ac/submissions/complete?cc=T2FQ8X93";
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

showResults = function(stimulusType) {

    if (stimulusType == 'bath') {myArray = ["educated_BATH", "posh_BATH", "fake_BATH", "wealthy_BATH"];
        document.getElementById('bathResults').innerHTML = "your results";
        }
    else {myArray = ["educated_GAS", "posh_GAS", "fake_GAS", "wealthy_GAS"];
        document.getElementById('gasResults').innerHTML = "your results";
        }
    myArray.forEach(function(item){
        value = getCookie(item);
        // Set height of bars
        document.getElementById(item).style.height = value * 250 + "px";

        // Add tooltip text
        scaleName = item.split("_")[0];
        if (scaleName == "workingClass") {scaleName = "working class"}
        else if (scaleName == "posh") {scaleName = "like the person wants to sound posh"}
        else if (scaleName == "south") {scaleName = "like the person is from the south of England"}
        else if (scaleName == "fake") {scaleName = "like the person is faking an accent"}
        else if (scaleName == "wealthy") {scaleName = "like the person comes from a wealthy background"}

        if (value < .3) {toolText = "SHORT-A sounds more"}
        else if (value < .5) {toolText = "SHORT-A sounds slightly more"}
        else if (value < .5) {toolText = "SHORT-A sounds slightly more"}
        else if (value < .7) {toolText = "LONG-AH sounds slightly more"}
        else {toolText = "LONG-AH sounds more"}
        toolText = "You: " + toolText + " " + scaleName

        if (value == .5) {toolText = "You: No difference between LONG-AH and SHORT-A"}
        document.getElementById(item).setAttribute('data-tooltip', toolText);
    });   
}

showCharResults = function(stimulusType) {
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
        document.getElementById('bathCharResults').innerHTML = "your results";
        }
    else {myArray = ["posh_GAS", "fakePosh_GAS", "wc_GAS"];
        document.getElementById('gasCharResults').innerHTML = "your results";
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
        document.getElementById(item + "_char").style.height = (value + 1) * 250/2 + "px";
        if (value==-1) {document.getElementById(item + "_char").style.height = "10px"}

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
        document.getElementById(item + "_char").setAttribute('data-tooltip', toolText);
    });   
}

showScaleRatingResults = function(stimulusType) {

    myArray = ["educated", "wealthy", "posh", "fakingAccent", "english"];


    myArray.forEach(function(item){
        value = getCookie(item).split(",");
        console.log(item);
        console.log(value);
        if (stimulusType=='bath') {
          guiseDiff = value[1]/4 - value[0]/4; // bath - trap
          document.getElementById('bathCharResults').innerHTML = "your results";
        }
        else {
          guiseDiff = value[3]/8 - value[2]/8;
          document.getElementById('gasCharResults').innerHTML = "your results";
        }

        console.log(guiseDiff);

        // Set height of bars
        document.getElementById(item+"."+stimulusType).style.height = (guiseDiff+100)/200 * 250 + "px";

        

        // Add tooltip text
        scaleName = item.split("_")[0];
        if (scaleName == "educated") {scaleName = "is more educated"}
        else if (scaleName == "posh") {scaleName = "wants to sound posh"}
        else if (scaleName == "english") {scaleName = "is from England"}
        else if (scaleName == "fakingAccent") {scaleName = "is faking an accent"}
        else if (scaleName == "wealthy") {scaleName = "is wealthier"}

        if (guiseDiff < 0) {toolText = "SHORT-A makes you think someone"}
        else {toolText = "LONG-AH makes you think someone"}
        toolText = "You: " + toolText + " " + scaleName

        if (guiseDiff == 0) {toolText = "You: No difference between LONG-AH and SHORT-A"}
        document.getElementById(item+"."+stimulusType).setAttribute('data-tooltip', toolText);
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

<p>In the first part of this experiment, we tested your knowledge of southern British English by asking you to decide whether words pronounced with long-ah were real words or not. (If you are from the south of England, you are in our "control group" to make sure that the experiment is working properly.) In the experiment, you heard four kinds of words:</p>

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

<h2>Opinions of People based on Pronunciations</h2>

<p>In the second part of the experiment, you rated how strongly you agreed with statements like "This person sounds well-educated" based on how they talked. You may have noticed that you heard the same sentence more than once, but pronounced in different ways. In the sentences we were interested in, you heard a word pronounced both with long-ah and with short-a. We compared how strongly you agreed with a statement when you heard long-ah versus short-a to determine how strongly you associate these pronunciations with different social characteristics. (Note that these associations don't have to be conscious!)</p>

<p>Some of the sentences you heard had <b>BATH</b> words&mdash;the words that a southern British person would pronounce with long-ah. Others had <b>GAS</b> words&mdash;the words that everyone pronounces with short-a, but might be pronounced with long-ah by an American trying to imitate a British accent.</p>

<p>For <b>BATH</b> words, we predicted that hearing a person use <b>long-ah</b> would you think they were more <b>educated</b> and <b>wealthy</b>, and more like they wanted to sound <b>posh</b>. If you're American, we also thought it make you think they were more <b>English</b>. In the graph below, a higher value equals a stronger association with long-ah.</p>

<br />

<ul id="q-graph4">

<li class="qtr" id="q1">Educated
<ul>
<li class="sent bar" id="educated_nonmerged" style="height: 200px;" data-tooltip="Prediction: LONG-AH makes you think someone is more educated"> </li>
<li class="paid bar" id="educated.bath" style="height: 0px;" data-tooltip=""> </li>
</ul>
</li>

<li class="qtr" id="q2">Posh
<ul>
<li class="sent bar" id="pretentious_nonmerged" style="height: 200px;" data-tooltip="Prediction: LONG-AH makes you think someone wants to sound posh"> </li>
<li class="paid bar" id="posh.bath" style="height: 0px;" data-tooltip=""> </li>
</ul>
</li>

<li class="qtr" id="q3">Faking an Accent
<ul>
<li class="sent bar" id="class_nonmerged" style="height: 130px;" data-tooltip="Prediction: no association"> </li>
<li class="paid bar" id="fakingAccent.bath" style="height: 0px;" data-tooltip=""> </li>
</ul>
</li>

<li class="qtr" id="q4">Wealthy
<ul>
<li class="sent bar" id="class_nonmerged" style="height: 200px;" data-tooltip="Prediction: LONG-AH makes you think someone is wealthier"> </li>
<li class="paid bar" id="wealthy.bath" style="height: 0px;" data-tooltip=""> </li>
</ul>
</li>

<li class="qtr" id="q5">From England
<ul>
<li class="sent bar" id="class_nonmerged" style="height: 130px;" data-tooltip="Prediction: no association (for British participants)"> </li>
<li class="paid bar" id="english.bath" style="height: 0px;" data-tooltip=""> </li>
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
<td class="nonmerged"> </td> <td class="label">our predictions</td> <td class="merged"></td> <td class="label" id="bathCharResults"><div class="pinkButton" onclick="showScaleRatingResults('bath') ">Show your results</div></td>
</tr>
</table>
<br /><br />
<hr />
<p>For <b>GAS</b> words, we're interested in knowing:
<ul>
    <li>Do people have the same opinion about long-ah in these words as they do for BATH words?</li>
    <li>Do Americans and Brits have different opinions from one another?</li>
</ul>

<p>We're testing the prediction that Americans have similar associations about long-ah in GAS words as they do in BATH words, but that British people have different associations. We predict that British people will think a person who uses long-ah in GAS words sounds <b>less educated</b>, <b>less wealthy</b>, and <b>less English</b>, but more like they are <b>faking an accent</b> and <b> want to sound posh</b>. The graph below shows our predictions for British listeners.</p>


<ul id="q-graph4">

<li class="qtr" id="q1">Educated
<ul>
<li class="sent bar" id="educated_nonmerged" style="height: 80px;" data-tooltip="Prediction: SHORT-A makes you think someone is more educated"> </li>
<li class="paid bar" id="educated.gas" style="height: 0px;" data-tooltip=""> </li>
</ul>
</li>

<li class="qtr" id="q2">Posh
<ul>
<li class="sent bar" id="pretentious_nonmerged" style="height: 200px;" data-tooltip="Prediction: LONG-AH makes you think someone wants to sound posh"> </li>
<li class="paid bar" id="posh.gas" style="height: 0px;" data-tooltip=""> </li>
</ul>
</li>

<li class="qtr" id="q3">Faking an Accent
<ul>
<li class="sent bar" id="class_nonmerged" style="height: 200px;" data-tooltip="Prediction: LONG-AH makes you think someone is faking an accent"> </li>
<li class="paid bar" id="fakingAccent.gas" style="height: 0px;" data-tooltip=""> </li>
</ul>
</li>

<li class="qtr" id="q4">Wealthy
<ul>
<li class="sent bar" id="class_nonmerged" style="height: 80px;" data-tooltip="Prediction: SHORT-A makes you think someone is wealthier"> </li>
<li class="paid bar" id="wealthy.gas" style="height: 0px;" data-tooltip=""> </li>
</ul>
</li>

<li class="qtr" id="q5">From England
<ul>
<li class="sent bar" id="class_nonmerged" style="height: 80px;" data-tooltip="Prediction: SHORT-A makes you think someone is from England"> </li>
<li class="paid bar" id="english.gas" style="height: 0px;" data-tooltip=""> </li>
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
<td class="nonmerged"> </td> <td class="label">our predictions</td> <td class="merged"></td> <td class="label" id="gasCharResults"><div class="pinkButton" onclick="showScaleRatingResults('gas') ">Show your results</div></td>
</tr>
</table>

<br />
<hr />

<h2>Opinions about Pronunciations</h2>

<p>In the third part of the experiment, we asked you to listen to two versions of the same sentence. The sentences we were interested in contained BATH or GAS words. As you probably noticed, in one version the word was pronounced with long-ah, and the other with short-a. This was similar to Part 2 of the experiment, but here we wanted to see if making you <b>more conscious</b> of the pronunciation differences would change your responses.</p>

<p>For <b>BATH</b> words, we predicted that long-ah would sound more <b>educated</b>, like the person wants to sound <b>posh</b>, and like the person comes from a <b>wealthy background</b>.</p>

<ul id="q-graph2">

<li class="qtr" id="q1">Educated
<ul>
<li class="sent bar" id="educated_nonmerged" style="height: 250px;" data-tooltip="Prediction: LONG-AH sounds more educated"> </li>
<li class="paid bar" id="educated_BATH" style="height: 0px;" data-tooltip=""> </li>
</ul>
</li>


<li class="qtr" id="q2">Posh
<ul>
<li class="sent bar" id="friendly_nonmerged" style="height: 250px;" data-tooltip="Prediction: LONG-AH sounds more like the person wants to sound posh"> </li>
<li class="paid bar" id="posh_BATH" style="height: 0px;" data-tooltip=""> </li>
</ul>
</li>


<li class="qtr" id="q3">Faking an Accent
<ul>
<li class="sent bar" id="black_nonmerged" style="height: 130px;"  data-tooltip="No prediction"> </li>
<li class="paid bar" id="fake_BATH" style="height: 0px;" data-tooltip=""> </li>
</ul>
</li>

<li class="qtr" id="q4">Wealthy
<ul>
<li class="sent bar" id="black_nonmerged" style="height: 250px;"  data-tooltip="Prediction: LONG-AH sounds more like the person comes from a wealthy background"> </li>
<li class="paid bar" id="wealthy_BATH" style="height: 0px;" data-tooltip=""> </li>
</ul>
</li>

<li id="ticks">
<div class="tick" style="height: 50px;"><p> </p></div>
<div class="tick" style="height: 120px;"><p>100% (long-ah sounds more ___)</p></div>
<div class="tick" style="height: 120px;"><p><b>% long-ah responses</b></p></div>
<div class="tick" style="height: 0px;"><p>0% (short-a sounds more ____)</p></div>
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
<p>For <b>GAS</b> words, we're interested in whether Americans and Brits behave similarly to one another. We're testing the prediction that Americans have similar opinions about long-ah in GAS words as they do in BATH words, but that British people have different opinions. We predict that British people will think long-ah in these words sounds <b>less educated</b>, and more like the person <b>wants to sound posh</b> and is <b>faking an accent</b>. The graph below shows our predictions for British listeners.</p>


<ul id="q-graph2">

<li class="qtr" id="q1">Educated
<ul>
<li class="sent bar" id="educated_nonmerged" style="height: 10px;" data-tooltip="Prediction: SHORT-A sounds more educated"> </li>
<li class="paid bar" id="educated_GAS" style="height: 0px;" data-tooltip=""> </li>
</ul>
</li>

<li class="qtr" id="q2">Posh
<ul>
<li class="sent bar" id="friendly_nonmerged" style="height: 250px;" data-tooltip="Prediction: LONG-AH sounds more like the person wants to sound posh"> </li>
<li class="paid bar" id="posh_GAS" style="height: 0px;" data-tooltip=""> </li>
</ul>
</li>

<li class="qtr" id="q3">Faking an Accent
<ul>
<li class="sent bar" id="black_nonmerged" style="height: 250px;"  data-tooltip="Prediction: LONG-AH sounds more like the person is faking an accent"> </li>
<li class="paid bar" id="fake_GAS" style="height: 0px;" data-tooltip=""> </li>
</ul>
</li>

<li class="qtr" id="q4">Wealthy
<ul>
<li class="sent bar" id="black_nonmerged" style="height: 10px;"  data-tooltip="Prediction: SHORT-A sounds more like the person comes from a wealthy background"> </li>
<li class="paid bar" id="wealthy_GAS" style="height: 0px;" data-tooltip=""> </li>
</ul>
</li>

<li id="ticks">
<div class="tick" style="height: 50px;"><p> </p></div>
<div class="tick" style="height: 120px;"><p>100% (long-ah sounds more ___)</p></div>
<div class="tick" style="height: 120px;"><p><b>% long-ah responses</b></p></div>
<div class="tick" style="height: 0px;"><p>0% (short-a sounds more ____)</p></div>
</li>

</ul>
<div id="tooltip" class="nd"></div>
<table>
<tr>
<td class="nonmerged"> </td> <td class="label">our predictions</td> <td class="merged"></td> <td class="label" id="gasResults"><div class="pinkButton" onclick="showResults('gas')" >Show your results</div></td>
</tr>
</table>



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