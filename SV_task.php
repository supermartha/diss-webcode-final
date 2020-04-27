<?php include('header.php'); ?>

<!---<script src="js/select_SV_stimuli.js"> </script>--->
<script src="js/functions.js"> </script>

<script>
stimuliA1 = ["north-f-1_sweeping_IN", "south-m-1_baskets_bath", "north-f-1_think_F", "north-m-2_south_TH", "south-m-2_trap_bath_spliced", "south-f-1_brag_trap_spliced", "north-m-2_passes_bath", "south-m-1_something_ING", "north-f-1_bath_bath", "north-f-1_gas_trap", "south-f-1_thick_F", "south-m-2_with_F", "south-f-1_baffled_bath_spliced", "south-m-1_rattle_trap", "south-f-1_task_trap", "south-f-2_walking_ING", "south-m-2_athlete_trap", "attention_checkA", "south-m-1_birthday_TH", "north-m-2_crab_bath_spliced", "south-m-1_passage_bath", "south-f-2_classic_bath", "south-f-1_disgusting_IN", "south-f-2_paddle_trap", "south-f-2_keith_TH", "south-m-2_crafty_trap", "south-f-2_laugh_trap_spliced", "north-m-2_listening_ING", "north-f-1_tablet_trap", "south-m-2_running_IN", "north-m-2_massive_bath_spliced"];
stimuliB1 = ["north-f-1_sweeping_ING", "south-m-1_baskets_trap_spliced", "north-f-1_think_TH", "north-m-2_south_F", "south-m-2_trap_trap", "south-f-1_brag_bath", "north-m-2_passes_trap_spliced", "south-m-1_something_IN", "north-f-1_bath_trap_spliced", "north-f-1_gas_bath_spliced", "south-f-1_thick_TH", "south-m-2_with_TH", "south-f-1_baffled_trap", "south-m-1_rattle_bath_spliced", "south-f-1_task_bath_spliced", "south-f-2_walking_IN", "south-m-2_athlete_bath_spliced", "attention_checkC", "south-m-1_birthday_F", "north-m-2_crab_trap", "south-m-1_passage_trap_spliced", "south-f-2_classic_trap_spliced", "south-f-1_disgusting_ING", "south-f-2_paddle_bath_spliced", "south-f-2_keith_F", "south-m-2_crafty_bath_spliced", "south-f-2_laugh_bath", "north-m-2_listening_IN", "north-f-1_tablet_bath_spliced", "south-m-2_running_ING", "north-m-2_massive_trap"];

stimuliA2 = ["north-f-1_sweeping_IN","south-f-1_crafty_trap_spliced","north-f-1_think_F","north-m-2_south_TH","north-m-2_tablet_bath_spliced","north-f-1_brag_bath_spliced","south-m-2_laugh_bath_spliced","south-m-1_something_ING","north-m-2_baskets_trap","south-m-2_classic_bath_spliced","south-f-1_thick_F","south-m-2_with_F","south-m-1_passage_trap_spliced","south-m-2_paddle_trap_spliced","north-f-1_bath_bath_spliced","south-f-2_walking_ING","north-m-2_athlete_bath","attention_checkA","south-m-1_birthday_TH","south-m-1_trap_bath_spliced","north-f-1_massive_trap","south-f-1_gas_trap","south-f-1_disgusting_IN","south-f-1_rattle_bath_spliced","south-f-2_keith_TH","south-m-1_task_trap_spliced","south-f-2_passes_bath","north-m-2_listening_ING","south-f-2_crab_bath","south-m-2_running_IN","south-f-2_baffled_bath"];
stimuliB2 = ["north-f-1_sweeping_ING","south-f-1_crafty_bath","north-f-1_think_TH","north-m-2_south_F","north-m-2_tablet_trap","north-f-1_brag_trap","south-m-2_laugh_trap","south-m-1_something_IN","north-m-2_baskets_bath_spliced","south-m-2_classic_trap","south-f-1_thick_TH","south-m-2_with_TH","south-m-1_passage_bath","south-m-2_paddle_bath","north-f-1_bath_trap","south-f-2_walking_IN","north-m-2_athlete_trap_spliced","attention_checkC","south-m-1_birthday_F","south-m-1_trap_trap","north-f-1_massive_bath_spliced","south-f-1_gas_bath_spliced","south-f-1_disgusting_ING","south-f-1_rattle_trap","south-f-2_keith_F","south-m-1_task_bath","south-f-2_passes_trap_spliced","north-m-2_listening_IN","south-f-2_crab_trap_spliced","south-m-2_running_ING","south-f-2_baffled_trap_spliced"];

stimuliA3 = ["north-f-1_sweeping_IN","south-f-1_laugh_bath","north-f-1_think_F","north-m-2_south_TH","south-f-2_rattle_bath_spliced","south-m-1_brag_bath","north-m-2_bath_bath","south-m-1_something_ING","south-m-1_crafty_trap","south-m-1_massive_trap","south-f-1_thick_F","south-m-2_with_F","north-m-2_baffled_bath_spliced","north-f-1_crab_bath","south-f-2_baskets_trap_spliced","south-f-2_walking_ING","south-m-2_athlete_trap_spliced","attention_checkA","south-m-1_birthday_TH","south-f-1_tablet_trap_spliced","south-f-2_classic_bath_spliced","south-f-1_gas_bath","south-f-1_disgusting_IN","north-m-2_paddle_bath_spliced","south-f-2_keith_TH","north-f-1_passes_bath_spliced","south-m-2_task_bath_spliced","north-m-2_listening_ING","south-m-2_trap_trap","south-m-2_running_IN","north-f-1_passage_bath_spliced"];
stimuliB3 = ["north-f-1_sweeping_ING","south-f-1_laugh_trap_spliced","north-f-1_think_TH","north-m-2_south_F","south-f-2_rattle_trap","south-m-1_brag_trap_spliced","north-m-2_bath_trap_spliced","south-m-1_something_IN","south-m-1_crafty_bath_spliced","south-m-1_massive_bath_spliced","south-f-1_thick_TH","south-m-2_with_TH","north-m-2_baffled_trap","north-f-1_crab_trap_spliced","south-f-2_baskets_bath","south-f-2_walking_IN","south-m-2_athlete_bath","attention_checkC","south-m-1_birthday_F","south-f-1_tablet_bath","south-f-2_classic_trap","south-f-1_gas_trap_spliced","south-f-1_disgusting_ING","north-m-2_paddle_trap","south-f-2_keith_F","north-f-1_passes_trap","south-m-2_task_trap","north-m-2_listening_IN","south-m-2_trap_bath_spliced","south-m-2_running_ING","north-f-1_passage_trap"];

stimuliA4 = ["north-f-1_sweeping_IN","south-m-2_baskets_trap_spliced","north-f-1_think_F","north-m-2_south_TH","south-m-2_paddle_trap","south-f-2_rattle_bath_spliced","south-f-2_laugh_bath_spliced","south-m-1_something_ING","south-m-1_crafty_trap","south-f-2_massive_trap","south-f-1_thick_F","south-m-2_with_F","north-f-1_gas_bath","north-f-1_trap_trap_spliced","north-f-1_passes_trap","south-f-2_walking_ING","north-m-2_classic_bath","attention_checkA","south-m-1_birthday_TH","north-m-2_tablet_trap","south-f-1_athlete_bath_spliced","south-m-1_passage_trap_spliced","south-f-1_disgusting_IN","south-m-1_brag_bath","south-f-2_keith_TH","north-m-2_bath_trap","south-f-1_task_bath","north-m-2_listening_ING","south-f-1_crab_trap","south-m-2_running_IN","south-m-2_baffled_trap"];
stimuliB4 = ["north-f-1_sweeping_ING","south-m-2_baskets_bath","north-f-1_think_TH","north-m-2_south_F","south-m-2_paddle_bath_spliced","south-f-2_rattle_trap","south-f-2_laugh_trap","south-m-1_something_IN","south-m-1_crafty_bath_spliced","south-f-2_massive_bath_spliced","south-f-1_thick_TH","south-m-2_with_TH","north-f-1_gas_trap_spliced","north-f-1_trap_bath","north-f-1_passes_bath_spliced","south-f-2_walking_IN","north-m-2_classic_trap_spliced","attention_checkC","south-m-1_birthday_F","north-m-2_tablet_bath_spliced","south-f-1_athlete_trap","south-m-1_passage_bath","south-f-1_disgusting_ING","south-m-1_brag_trap_spliced","south-f-2_keith_F","north-m-2_bath_bath_spliced","south-f-1_task_trap_spliced","north-m-2_listening_IN","south-f-1_crab_bath_spliced","south-m-2_running_ING","south-m-2_baffled_bath_spliced"];


// randomly assign list
myArray = [1,2,3,4];
randNum = myArray[Math.floor(Math.random() * myArray.length)];

if (randNum == 1) {stimuliA = stimuliA1;
  stimuliB = stimuliB1; }
else if (randNum == 2) {stimuliA = stimuliA2;
  stimuliB = stimuliB2; }
else if (randNum == 3) {stimuliA = stimuliA3;
  stimuliB = stimuliB3; }
else if (randNum == 4) {stimuliA = stimuliA4;
  stimuliB = stimuliB4; }


var results = [8];
var stimuli_dir = "sounds/sentenceVersionPilot/";
var max = 31; // how many stimuli should each participant hear
var count = 0;
var BATH_res = ['', [], [], [], [], [], [], []];
var GAS_res = ['', [], [], [], [], [], [], []];
all_items = ['q1a', 'q1b', 'q2a', 'q2b', 'q3a', 'q3b', 'q4a', 'q4b', 'q5a', 'q5b'];
clickedDict = {}; // Dictionary of which buttons are clicked
// Populate dictionary
all_items.forEach(function(item) {
	clickedDict[item] = 0;
});
 
 window.onload = function() {
    document.getElementById('audioA').src = stimuli_dir + stimuliA[0] + '.wav';
    document.getElementById('audioB').src = stimuli_dir + stimuliB[0] + '.wav';

    console.log(stimuliA);
    console.log(stimuliB);

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

function chooseButton(buttonID, oppositeButtonID) {
	document.getElementById(buttonID).style.background = "#21bfb9";
	document.getElementById(buttonID).style.color = "#fff";
	document.getElementById(oppositeButtonID).style.background = "none";
	document.getElementById(oppositeButtonID).style.color = "#333333";
	clickedDict[buttonID] = 1;
	clickedDict[oppositeButtonID]= 0;
}

function play(audioName) {
    document.getElementById(audioName).play();
}

function getCookie(name) {
  var value = "; " + document.cookie;
  var parts = value.split("; " + name + "=");
  if (parts.length == 2) return parts.pop().split(";").shift();
}

function changeText() {
count = count + 1;
if (count == max) {
  sendResults_generic('SVP_part3_instructions.php');
  }
else {
	all_items.forEach(function(item) {
		document.getElementById(item).style.background = '#bcbcbc';
		document.getElementById(item).style.color = "#333333";
	});
 	document.getElementById('progressbar').value = document.getElementById('progressbar').value + 1;
  document.getElementById('completed_count').innerHTML = document.getElementById('progressbar').value;
  document.getElementById('audioA').src = stimuli_dir + stimuliA[count] + '.wav';
  document.getElementById('audioB').src = stimuli_dir + stimuliB[count] + '.wav';
  }
}

function sendResults(){
  document.getElementById('main').innerHTML = "<p>...saving responses...</p>"
    $.ajax({url: 'save_data.php',
    data: {results : results},
    type: 'POST',
    success: function(){location.href='SVP_part3_instructions.php'}} // Redirect to demographics/Br Eng questionnaire when finished
    );
  }

  function record_responses() {
  	console.log('sup');
    responses = [stimuliA[count], stimuliB[count]];
    for (var n = 1; n < 6; n++) {
    	console.log(n);
    	itemA = clickedDict['q' + n + 'a'];
    	itemB = clickedDict['q' + n + 'b'];
    	if (itemA == 1) {responses.push('A')}
    	else if (itemB == 1) {responses.push('B')}
    	else {responses.push('neither')}
    	// Save responses to show participants their results later
    	guiseA = stimuliA[count].split('_')[2];
    	guiseB = stimuliB[count].split('_')[2];
    	word = stimuliA[count].split('_')[1];
    	if (itemA == 1) {selected=guiseA}
    	else if (itemB == 1) {selected=guiseB}
    	else {selected='n/a'}
    	if (['bath', 'laugh', 'task', 'crafty', 'passes', 'baskets'].includes(word)) {
    		if (selected=='bath') {BATH_res[n].push(1)}
    		else if (selected=='trap') {BATH_res[n].push(0)}
    	};
    	if (['gas', 'baffled', 'massive', 'passage', 'athlete', 'classic', 'rattle', 'paddle', 'tablet', 'crab', 'trap', 'brag'].includes(word)) {
    		if (selected=='bath') {GAS_res[n].push(1)}
    		else if (selected=='trap') {GAS_res[n].push(0)}
    	};
    }
    // Save responses as cookies
	document.cookie = "educated_BATH=" + mean(BATH_res[1]) + "; max-age=3153600";
	document.cookie = "posh_BATH=" + mean(BATH_res[2]) + "; max-age=3153600";
	document.cookie = "fake_BATH=" + mean(BATH_res[3]) + "; max-age=3153600";
	document.cookie = "wealthy_BATH=" + mean(BATH_res[4]) + "; max-age=3153600";

	document.cookie = "educated_GAS=" + mean(GAS_res[1]) + "; max-age=3153600";
	document.cookie = "posh_GAS=" + mean(GAS_res[2]) + "; max-age=3153600";
	document.cookie = "fake_GAS=" + mean(GAS_res[3]) + "; max-age=3153600";
	document.cookie = "wealthy_GAS=" + mean(GAS_res[4]) + "; max-age=3153600";

	responses.push(Date.now()); 
    results.push(responses.join(':'));
    console.log(results);
    changeText();
  }


</script>

<table class="sentence_version">
<tr>
	<td></td>
	<td><a href="#/" onClick="play('audioA')">
<div class="audio2">
<audio id="audioA" src="daniel_stimuli/DL_northern_bath.wav"></audio>
<img src="speaker.png" width=100px /><br />
<div id="replay_text">A</div>
</div>
</a></td>
	<td><a href="#/" onClick="play('audioB')">
<div class="audio2">
<audio id="audioB" src="daniel_stimuli/DL_southern_bath.wav"></audio>
<img src="speaker.png" width=100px /><br />
<div id="replay_text">B</div>
</div>
</a></td>
</tr>

<tr>
	<td class="openingQuestion"><b>Which version sounds more like the person...</b></td>
	<td><p class="smaller" style="font-style: italic">Click to play</p></td>
	<td></td>
</tr>
<tr>
	<td>... is well-educated?</td>
	<td><div class="check" id="q1a" onclick="chooseButton('q1a', 'q1b')">A</div></td>
	<td><div class="check" id="q1b" onclick="chooseButton('q1b', 'q1a')">B</div></td>
</tr>

<tr>
	<td>... wants to sound posh?</td>
	<td><div class="check" id="q2a" onclick="chooseButton('q2a', 'q2b')">A</div></td>
	<td><div class="check" id="q2b" onclick="chooseButton('q2b', 'q2a')">B</div></td>
</tr>

<tr>
	<td>... is faking an accent?</td>
	<td><div class="check" id="q3a" onclick="chooseButton('q3a', 'q3b')">A</div></td>
	<td><div class="check" id="q3b" onclick="chooseButton('q3b', 'q3a')">B</div></td>
</tr>

<tr>
	<td>... comes from a wealthy background?</td>
	<td><div class="check" id="q4a" onclick="chooseButton('q4a', 'q4b')">A</div></td>
	<td><div class="check" id="q4b" onclick="chooseButton('q4b', 'q4a')">B</div></td>
</tr>

<tr>
  <td>... is from England? <span id="tooltipSpan"> </span> </td>
  <td><div class="check" id="q5a" onclick="chooseButton('q5a', 'q5b')">A</div></td>
  <td><div class="check" id="q5b" onclick="chooseButton('q5b', 'q5a')">B</div></td>
</tr>


<tr>
	<td style="vertical-align: bottom; padding-top: 50px; "><a href="#"><div class="button" onclick="record_responses()"> Next </div> </a></td>
	<td></td>
</tr>

</table>

<div style="text-align: center;">

<br /><br />
<br /><br /><br />
<progress max="31" value="1" id="progressbar"></progress>  <span class="progress_count"> <span id="completed_count">1</span> / 31 </span>
<br /><br />
</div>

<script>
    participantCountry = getCookie('Country');

  console.log(participantCountry);

  if (participantCountry=="UK") {
    document.getElementById('tooltipSpan').innerHTML = '<div class="tooltip"><sup style="color: #196f77; font-weight: bold; font-size: 50%; ">(?)</sup><span class="tooltiptext">If both versions sound equally like the person is from England, please choose the version that sounds more like the person is from the SOUTH of England.</span></div>';
  }
</script>

<?php include('footer.php'); ?>