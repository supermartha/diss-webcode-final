<?php
# layout.php
require_once('PageTemplate.php');
?>

<!DOCTYPE HTML>
<html>
<header>
	<title> Experiment </title>
	<link rel="stylesheet" type="text/css" href="style.css" />
	<?php if(isset($TPL->ContentHead)) { include $TPL->ContentHead; } ?>
	<script>
		function shuffleArray(array) {
    	for (var i = array.length - 1; i > 0; i--) {
        	var j = Math.floor(Math.random() * (i + 1));
        	var temp = array[i];
        	array[i] = array[j];
        	array[j] = temp;
    	}
	}
	</script>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script> <!--include AJAX-->
</header>
<?php include_once 'functions.php'
 ?>
<body>

<script>
function play() {
    document.getElementById('audio1').play();
}
</script>

<a href="#/" onClick="play()">
<div class="audio" id="audioDiv" style="display: none">
<audio id="audio1" src="sample.wav"></audio>
<img src="speaker.png" width=100px /><br />
<div id="replay_text">replay</div>
</div>
</a>


<div id="main">

<!----- Instructions ------------->
<div id="instructions">

<h2>Instructions</h2>
<p> In this experiment, you will listen to some people saying short sentences. We'll ask you about your opinion of each person based on their voice.</p>

<p>Try to respond based on how the people talk, rather than what words they are saying.</p>

<a href="#/" id="finishbutton"><div class="button" onclick="showContent()"> Start >> </div> </a>
</div>



<script>

	list1 = ['south-m-2_with_F', 'south-m-1_something_ING', 'south-f-2_paddle_bath', 'south-m-2_trap_bath_spliced', 'north-f-1_laugh_trap', 'south-m-2_crafty_trap_spliced', 'north-m-2_south_TH', 'south-m-2_gas_trap', 'north-m-2_passes_trap_spliced' ,'north-m-2_rattle_bath', 'south-f-1_task_trap_spliced', 'south-f-2_passage_bath', 'north-f-1_think_F', 'south-f-1_disgusting_IN' , 'south-f-1_thick_F', 'north-f-1_sweeping_IN', 'south-f-2_walking_ING', 'north-f-1_tablet_bath', 'south-m-1_athlete_bath_spliced', 'north-f-1_baffled_bath', 'south-f-2_passage_trap_spliced', 'south-m-1_athlete_trap', 'north-f-1_sweeping_ING' , 'north-f-1_laugh_bath_spliced', 'north-f-1_think_TH', 'north-m-2_south_F', 'north-f-1_baffled_trap_spliced', 'south-m-2_trap_trap', 'north-m-2_rattle_trap_spliced', 'south-f-2_walking_IN', 'south-m-2_gas_bath_spliced', 'south-m-1_something_IN', 'north-m-2_passes_bath', 'south-m-2_crafty_bath', 'south-f-1_task_bath', 'south-f-2_paddle_trap_spliced', 'south-f-1_thick_TH', 'south-f-1_disgusting_ING', 'south-m-2_with_TH' ,'north-f-1_tablet_trap_spliced'];

	list2 = ['south-f-2_walking_ING', 'north-f-1_sweeping_IN', 'south-f-2_rattle_bath_spliced', 'south-f-1_passage_bath_spliced', 'south-m-2_with_F', 'north-m-2_south_TH', 'north-f-1_bath_trap_spliced', 'south-m-2_brag_trap_spliced', 'south-m-2_crafty_bath', 'north-f-1_baffled_bath', 'north-f-1_think_F', 'north-m-2_athlete_trap', 'south-m-1_something_ING', 'south-f-1_thick_F', 'north-m-2_paddle_trap', 'south-f-2_task_trap_spliced', 'south-f-1_disgusting_IN', 'south-f-1_laugh_trap', 'north-f-1_trap_trap', 'south-m-1_gas_trap', 'south-m-2_brag_bath', 'south-m-2_with_TH' ,'north-f-1_bath_bath', 'south-f-2_rattle_trap', 'south-f-1_thick_TH', 'south-f-2_walking_IN', 'north-f-1_trap_bath_spliced', 'north-f-1_baffled_trap_spliced', 'south-m-1_something_IN', 'south-f-2_task_bath', 'south-f-1_laugh_bath_spliced', 'north-f-1_think_TH', 'south-f-1_disgusting_ING', 'north-f-1_sweeping_ING', 'south-m-1_gas_bath_spliced', 'south-f-1_passage_trap', 'north-m-2_paddle_bath_spliced', 'south-m-2_crafty_trap_spliced', 'north-m-2_athlete_bath_spliced', 'north-m-2_south_F'];

	list3 = ['north-m-2_south_TH', 'north-f-1_tablet_trap', 'south-m-1_passage_trap_spliced', 'south-m-2_passes_bath_spliced', 'south-m-1_paddle_bath_spliced', 'south-m-2_with_F', 'south-f-1_thick_F', 'north-m-2_baffled_trap', 'south-m-1_task_bath', 'south-f-2_bath_bath_spliced', 'south-f-2_trap_bath', 'south-f-1_brag_bath', 'south-f-2_athlete_trap', 'south-f-1_massive_bath_spliced', 'south-f-2_walking_ING', 'north-f-1_sweeping_IN', 'south-m-1_something_ING', 'north-f-1_baskets_trap_spliced', 'south-f-1_disgusting_IN', 'north-f-1_think_F', 'south-f-1_brag_trap_spliced', 'south-f-2_bath_trap', 'north-m-2_baffled_bath_spliced', 'south-m-2_with_TH', 'south-m-2_passes_trap', 'south-f-1_thick_TH', 'south-f-2_trap_trap_spliced', 'north-m-2_south_F', 'north-f-1_tablet_bath_spliced', 'north-f-1_baskets_bath', 'south-f-2_athlete_bath_spliced', 'north-f-1_sweeping_ING', 'south-m-1_something_IN', 'south-f-2_walking_IN', 'south-m-1_paddle_trap', 'south-f-1_massive_trap', 'south-f-1_disgusting_ING', 'north-f-1_think_TH', 'south-m-1_passage_bath', 'south-m-1_task_trap_spliced'];

	list4 = ['north-f-1_think_F', 'south-f-2_walking_ING', 'south-f-2_classic_trap_spliced', 'north-m-2_gas_trap', 'north-f-1_passes_trap', 
	'south-f-2_crab_trap', 'south-m-1_crafty_trap', 'south-f-1_task_bath', 'north-f-1_trap_trap', 'south-m-2_with_F', 'north-f-1_sweeping_IN', 'south-m-1_brag_trap_spliced', 'south-m-2_baffled_trap', 'south-f-1_thick_F', 'north-m-2_south_TH', 'south-f-2_baskets_bath_spliced', 'south-f-1_massive_trap_spliced', 'south-f-1_disgusting_IN', 'south-m-1_something_ING', 'south-f-1_tablet_trap', 'south-f-1_thick_TH','north-f-1_think_TH', 'south-m-2_with_TH', 'south-f-1_task_trap_spliced', 'south-f-1_tablet_bath_spliced', 'south-f-2_classic_bath', 'south-m-1_brag_bath', 'south-f-2_walking_IN', 'south-f-2_baskets_trap', 'north-m-2_gas_bath_spliced', 'north-m-2_south_F', 'north-f-1_passes_bath_spliced', 'south-m-1_crafty_bath_spliced', 'south-f-2_crab_bath_spliced', 'north-f-1_trap_bath_spliced', 'south-m-1_something_IN', 'south-f-1_massive_bath', 'south-m-2_baffled_bath_spliced', 'south-f-1_disgusting_ING', 'north-f-1_sweeping_ING'];

	// Randomly choose one of the four lists
	function randomSample(items, n) {
		shuffleArray(items);
		return(items.slice(0,n))
	}

	listObject = randomSample([list1, list2, list3, list4], 1);

	var audio = listObject[0];
	var stimuli_dir = "sounds/sentenceVersionPilot/";
	var max = audio.length;

	console.log(audio);
	var count = 0;

	var bath_words = ["bath", "task", "crafty", "baskets", "passes", "laugh"];
	var trap_words = ["massive", "classic", "baffled", "athlete", "gas", "passage", "tablet", "brag", "paddle", "rattle", "crab", "trap"];

	function getStimulusText() {
		audioName = audio[count];
		console.log(audioName);
		thisWord = audioName.split('_')[1];
		if (thisWord=='bath') {res = 'He took a nice long bath.'}
		else if (thisWord=='task') {res = 'Could you explain the task?'}
		else if (thisWord=='crafty') {res = "Foxes are crafty."}
		else if (thisWord=='baskets') {res = "She makes baskets."}
		else if (thisWord=='passes') {res = "Where are the movie passes?"}
		else if (thisWord=='laugh') {res = "She's got a loud laugh."}
		else if (thisWord=='massive') {res = "Elephants are massive."}
		else if (thisWord=='classic') {res = "This book's a classic."}
		else if (thisWord=='baffled') {res = "My sister was totally baffled."}
		else if (thisWord=='athlete') {res = "Who's your favorite athlete?"}
		else if (thisWord=='gas') {res = "Please turn on the gas."}
		else if (thisWord=='passage') {res = "She read the passage."}
		else if (thisWord=='tablet') {res = "We drew a picture on the tablet."}
		else if (thisWord=='brag') {res = "He likes to brag."}
		else if (thisWord=='paddle') {res = "You're up the creek without a paddle."}
		else if (thisWord=='rattle') {res = "The baby lost his rattle."}
		else if (thisWord=='crab') {res = "My favorite food is crab."}
		else if (thisWord=='trap') {res = "The fox was caught in the trap."}
		else if (thisWord=='listening') {res = "The girl wasn't listening."}
		else if (thisWord=='running') {res = "The boy is running."}
		else if (thisWord=='walking') {res = "We started walking."}
		else if (thisWord=='disgusting') {res = "Carrots are disgusting."}
		else if (thisWord=='something') {res = "Do you want something?"}
		else if (thisWord=='sweeping') {res = "My least favorite chore is sweeping."}
		else if (thisWord=='think') {res = "What do you think?"}
		else if (thisWord=='birthday') {res = "Tomorrow is her birthday."}
		else if (thisWord=='thick') {res = "The porridge is very thick."}
		else if (thisWord=='with') {res = "Who are you going with?"}
		else if (thisWord=='south') {res = "Bristol is in the south."}
		else if (thisWord=='keith') {res = "This is my friend Keith."}

		document.getElementById('stimulus_sentence').innerHTML = '&ldquo;' + res + '&rdquo;';
	}

	function changeText() {
		count = count + 1;
		if (count == max) {
			sendResults();;
			}
		else {
			document.getElementById('progressbar').value = count + 1;
			document.getElementById('completed_count').innerHTML = count + 1;
			document.getElementById('educated').value = 0;
			document.getElementById('wealthy').value = 0;
			document.getElementById('posh').value = 0;
			document.getElementById('fakingAccent').value = 0;
			document.getElementById('english').value = 0;
			getStimulusText();
			document.getElementById('audio1').src = stimuli_dir + audio[count] + '.wav';
			document.getElementById('audio1').play(); }
		}

function sendResults(){
	document.getElementById('main').innerHTML = "<p>...saving responses...</p>"
    $.ajax({url: 'save_data.php',
		data: {results : results},
		type: 'POST',
		success: function(){location.href="SR_questionnaire.php"}} // Redirect to debriefing when finished
		);
	}

	var results = [5];

	// Store ratings for each scale
	// 0 = BATH short
	// 1 = BATH long
	// 2 = GAS/TRAP short
	// 3 = GAS/TRAP long
	var educated = [0,0,0,0];
	var wealthy = [0,0,0,0];
	var posh = [0,0,0,0];
	var fakingAccent = [0,0,0,0];
	var english = [0,0,0,0];

	function record_responses() {
		responses = [audio[count],
			document.getElementById('educated').value, 
			document.getElementById('wealthy').value,
			document.getElementById('posh').value,
			document.getElementById('fakingAccent').value,
			document.getElementById('english').value,
			Date.now()], // get current timestamp
		results.push(responses.join(':'));

		// Keep track of ratings to be able to show participants at end
		if ((audio[count].indexOf("bath") > -1) || (audio[count].indexOf("trap") > -1)) { // Check if filler
			var word = audio[count].split("_")[1];
			console.log(word);
			var guise = audio[count].split("_")[2].replace(".wav","");
			underlying = 'na';
			cat = -1;
			console.log(guise);
			if (bath_words.indexOf(word) > -1) {
				if (guise == 'trap') {cat = 0}
				else {cat = 1}
			}
			else if (trap_words.indexOf(word) > -1) {
				if (guise == 'trap') {cat = 2}
				else {cat = 3}
			}
			console.log(audio[count]);
			console.log(cat);
			if (cat > -1) {
				educated[cat] = educated[cat] + Number(document.getElementById('educated').value);
				wealthy[cat] = wealthy[cat] + Number(document.getElementById('wealthy').value);
				posh[cat] = posh[cat] + Number(document.getElementById('posh').value);
				fakingAccent[cat] = fakingAccent[cat] + Number(document.getElementById('fakingAccent').value);
				english[cat] = english[cat] + Number(document.getElementById('english').value);
				document.cookie = "educated=" + educated + "; max-age=3153600";
				document.cookie = "wealthy=" + wealthy + "; max-age=3153600";
				document.cookie = "posh=" + posh + "; max-age=3153600";
				document.cookie = "fakingAccent=" + fakingAccent + "; max-age=3153600";
				document.cookie = "english=" + english + "; max-age=3153600";
			}
			console.log(educated);
		}

		changeText();
	}

	function showContent() {
    	document.getElementById('instructions').innerHTML = '';
    	document.getElementById('content').style.display = 'block';
    	document.getElementById('audioDiv').style.display = 'block';
    	getStimulusText();
		document.getElementById('audio1').src = stimuli_dir + audio[count] + '.wav';
		document.getElementById('audio1').play();
	}
	

</script>

<!----- Main Content ------------->
<div id="content" style="display: none; ">
<p style="font-size: 150%; margin-bottom: 50px; " id="stimulus_sentence"> . </p>

<form>

<h3>This person sounds like they...</h3>

<p class="sliderQuestion">...are well-educated.</p>
<table style="width: 100%; ">
	<tr> <td class="adjectiveRight"> strongly disagree </td> <td><div class="normingSlider"> <input type='range' min=0 max=100 value=0 id="educated" /></div> </td> <td  class="adjective"> strongly agree </td> </tr>
</table>

<p class="sliderQuestion">...want to sound posh.</p>
<table style="width: 100%; ">
	<tr> <td class="adjectiveRight"> strongly disagree </td> <td><div class="normingSlider"> <input type='range' min=0 max=100 value=0 id="posh" /></div> </td> <td  class="adjective"> strongly agree </td> </tr>
</table>

<p class="sliderQuestion">...are faking an accent.</p>
<table style="width: 100%; ">
	<tr> <td class="adjectiveRight"> strongly disagree </td> <td><div class="normingSlider"> <input type='range' min=0 max=100 value=0 id="fakingAccent" /></div> </td> <td  class="adjective"> strongly agree </td> </tr>
</table>

<p class="sliderQuestion">...come from a wealthy background.</p>
<table style="width: 100%; ">
	<tr> <td class="adjectiveRight"> strongly disagree </td> <td><div class="normingSlider"> <input type='range' min=0 max=100 value=0 id="wealthy" /></div> </td> <td  class="adjective"> strongly agree </td> </tr>
</table>

<p class="sliderQuestion">...are from England.</p>
<table style="width: 100%; ">
	<tr> <td class="adjectiveRight"> strongly disagree </td> <td><div class="normingSlider"> <input type='range' min=0 max=100 value=0 id="english" /></div> </td> <td  class="adjective"> strongly agree </td> </tr>
</table>





<br /><br />

<a href="#">
<div class="button" onclick="record_responses()"> Next </div> 
</a>

</form>

<br /><br />
<progress max="40" value="1" id="progressbar"></progress>  <span class="progress_count"> <span id="completed_count">1</span> / 40 </span>
<br /><br />

</div>

<?php include('footer.php') ?>