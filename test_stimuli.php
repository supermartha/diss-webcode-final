<?php
// Set cookie for participant ID
$rand = uniqid($more_entropy=TRUE) . $_SERVER['REMOTE_ADDR'];
setcookie("ParticipantID", $rand);
?>

<?php include('audio_header.php'); ?>

<?php $audio_list = array_slice(scandir('final_spliced/'), 2); ?>

<script>
	var audio = <?php echo json_encode($audio_list); ?>;
	var total = audio.length;
	//var total = ;
	
	function getSentences(keyword) {
		if (keyword=='emily') {s1 = "My cousin's name is <b>Emily</b>."; s2 = "My cousin's name is <b>Imily</b>."; }
		else if (keyword=='gelpen') {s1 = "She wrote the letter with a gel <b>pen</b>."; s2 = "She wrote the letter with a gel <b>pin</b>."; }
		else if (keyword=='grin') {s1 = "He had a huge <b>grin</b> on his face."; s2 = "He had a huge <b>gren</b> on his face."; }
		else if (keyword=='gym') {s1 = "I'm going to go lift weights at the <b>gym</b>."; s2 = "I'm going to go lift weights at the <b>gem</b>."; }
		else if (keyword=='hens') {s1 = "I need to go buy feed for my <b>hens</b> and the rooster."; s2 = "I need to go buy feed for my <b>hins</b> and the rooster."; }
		else if (keyword=='hint') {s1 = "Could you please give me a <b>hint</b>?"; s2 = "Could you please give me a <b>hent</b>?"; }
		else if (keyword=='jen') {s1 = "I don't like <b>Jen</b>."; s2 = "I don't like <b>gin</b>."; }
		else if (keyword=='ken') {s1 = "Barbie and her partner <b>Ken</b> are going to the beach."; s2 = "Barbie and her partner <b>Kin</b> are going to the beach."; }
		else if (keyword=='member') {s1 = "He's a <b>member</b> of the bowling league."; s2 = "He's a <b>mimber</b> of the bowling league."; }
		else if (keyword=='mental') {s1 = "It takes a lot of <b>mental</b> effort to do that."; s2 = "It takes a lot of <b>mintal</b> effort to do that."; }
		else if (keyword=='mint') {s1 = "We had the lamb with <b>mint</b> sauce."; s2 = "We had the lamb with <b>meant</b> sauce."; }
		else if (keyword=='minutes') {s1 = "It took me twelve <b>minutes</b>."; s2 = "It took me twelve <b>menutes</b>."; }
		else if (keyword=='pen') {s1 = "Could you hand me a <b>pen</b>?"; s2 = "Could you hand me a <b>pin</b>?"; }
		else if (keyword=='reaganpin') {s1 = "He was wearing a 'vote for Reagan' <b>pin</b>."; s2 = "He was wearing a 'vote for Reagan' <b>pen</b>."; }
		else if (keyword=='sense') {s1 = "That doesn't make any <b>sense</b>."; s2 = "That doesn't make any <b>since</b>."; }
		else if (keyword=='twin') {s1 = "I have a <b>twin</b> sister."; s2 = "I have a <b>twen</b> sister."; }
		else if (keyword=='windy') {s1 = "Yesterday it was <b>windy</b> and rainy."; s2 = "Yesterday it was <b>wendy</b> and rainy."; }
		else if (keyword=='zen') {s1 = "What do you think of <b>Zen</b> Buddhism?"; s2 = "What do you think of <b>Zin</b> Buddhism?"; }
		return [s1, s2]
	}
	
	shuffleArray(audio);
	var count = 0;
	// words.push(['','']); // empty string so nothing displays after final click

	// Play first sound on page load
	document.getElementById('audio1').src = "final_spliced/" + audio[count];
	document.getElementById('audio1').play();
	// Get sentences
	keyword = audio[count].split("_")[1];
	sentences = getSentences(keyword);
	window.onload = function() {document.getElementById('s1').innerHTML = sentences[0];
	 document.getElementById('s2').innerHTML = sentences[1]; 
	 document.getElementById('progressbar').max = total;
	 document.getElementById('total_count').innerHTML = total;}

	function changeText() {
		count = count + 1;
		if (count == total) {
			sendResults();
			}
		document.getElementById('progressbar').value = count + 1;
		document.getElementById('completed_count').innerHTML = count + 1;
		keyword = audio[count].split("_")[1];
		sentences = getSentences(keyword);
		document.getElementById('s1').innerHTML = sentences[0];
		document.getElementById('s2').innerHTML = sentences[1];
		document.getElementById('audio1').src = "final_spliced/" + audio[count];
		document.getElementById('audio1').play();
		// Reset checkboxes etc.
		document.getElementById("sounds_weird").checked = false;
		document.getElementById("comments").value = "";
	}

function sendResults(){
    $.ajax({url: 'save_data.php',
		data: {results : results},
		type: 'POST',
		success: function(){location.href="thanks.php"}} // Redirect to part 2 when finished
		);
	}

	var results = [0];

	// Will also need to record which stimuli were played
	function record_responses() {
		var sentence = getRadioVal(document.getElementById("form"), "sentence");
		var sounds_weird = document.getElementById("sounds_weird").checked;
		var comments = document.getElementById("comments").value;
		responses = [audio[count], sentence, sounds_weird, comments,
			Date.now()], // get current timestamp
		console.log(responses)
		results.push(responses.join(':'));
		changeText();
	}

	function getRadioVal(form, name) {
    var val;
    // get list of radio buttons with specified name
    var radios = form.elements[name];
    
    // loop through list of radio buttons
    for (var i=0, len=radios.length; i<len; i++) {
        if ( radios[i].checked ) { // radio checked?
            val = radios[i].value; // if so, hold its value in val
            break; // and break out of for loop
        }
    }
    return val; // return value of checked radio or undefined if none checked
}

</script>



<form id="form">

<p class="question"> <i>Select the sentence you hear:</i></p>
<input type="radio" name="sentence" value="s1" /> <span id="s1"> hi </span> <br /><br />
<input type="radio" name="sentence" value="s2" /> <span id="s2"> hi </span> <br /><br />
<input type="radio" name="sentence" value="cant_tell" /> can't tell <br /><br />
<input type="radio" name="sentence" value="other" /> neither (sounds like something else) <br />

<br /><br />
<hr />
<input type="checkbox" id="sounds_weird" /> <b>This stimulus sounds weird/unnatural.</b><br />

<p class="question"> Comments:</p> <textarea id="comments" rows="5" cols="40"></textarea><br /><br />

<a href="#">
<div class="button" onclick="record_responses()"> Next </div> 
</a>

</form>

<br /><br />
<progress max="30" value="1" id="progressbar"></progress>  <span class="progress_count"> <span id="completed_count">1</span> / <span id="total_count">30</span> </span>
<br /><br />

<?php include('footer.php'); ?>
