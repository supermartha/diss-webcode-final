<?php include('header.php'); ?>

<script src="js/select_pilot_stimuli.js"> </script>

<script>

function play(audioName) {
    document.getElementById(audioName).play(); }

  var audio = stimuli; // use this for the real version
  console.log(audio)
  var stimuli_dir = "sounds/sentenceVersionPilot/";
  var max = 6; // how many stimuli should each participant hear
  var count = 0;
  trap_dict = {};
  bath_dict = {};
  trap_places = {};
  bath_places = {};

  // Load first sound
  window.onload = function() {
    document.getElementById('audio1').src = stimuli_dir + audio[0] + '.wav';
  }

  function showContent() {
    document.getElementById('instructions').innerHTML = '';
    document.getElementById('content').style.display = 'block';
    document.getElementById('audio1').play();
  }

  function changeText() {
    count = count + 1;
    if (count == max) {
      sendResults();;
      }
    else {
      document.getElementById('progressbar').value = document.getElementById('progressbar').value + 1;
      document.getElementById('completed_count').innerHTML = document.getElementById('progressbar').value;
      document.getElementById('adjective1').value = '';
      document.getElementById('adjective2').value = '';
      document.getElementById('adjective3').value = '';
      document.getElementById('whereFrom').value = '';
      document.getElementById('comments').value = '';
      document.getElementById('audio1').src = stimuli_dir + audio[count] + '.wav';
      document.getElementById('audio1').play(); }
    }

function sendResults(){
  document.getElementById('main').innerHTML = "<p>...saving responses...</p>"
    $.ajax({url: 'save_data.php',
    data: {results : results},
    type: 'POST',
    success: function(){location.href="SVP_part2_instructions.php"}} // Redirect to part 2 when finished
    );
  }

  var results = [1];


  function record_responses() {
    console.log(document.getElementById('adjective1').value);
    responses = [audio[count],
      document.getElementById('adjective1').value, 
      document.getElementById('adjective2').value,
      document.getElementById('adjective3').value,
      document.getElementById('whereFrom').value,
      document.getElementById('comments').value,
      Date.now()], // get current timestamp
    results.push(responses.join(':'));
    // Keep track of which adjectives participants use, to be able to show them during debriefing
    wordClass = (audio[count].replace('_spliced', '')).split('_').pop();
    whereFrom = responses[4];
    if (wordClass=='trap') {
      if (whereFrom in trap_places) {trap_places[whereFrom] = trap_places[whereFrom] + 1}
      else {trap_places[whereFrom] = 1}
    }
    else {
      if (whereFrom in bath_places) {bath_places[whereFrom] = bath_places[whereFrom] + 1}
      else {bath_places[whereFrom] = 1}
    }
    [responses[1], responses[2], responses[3]].forEach(function(adj) {
      console.log(adj);
      if (wordClass=='trap') {
        if (adj in trap_dict) {trap_dict[adj] = trap_dict[adj] + 1}
        else {trap_dict[adj] = 1}
      }
      else {
        if (adj in bath_dict) {bath_dict[adj] = bath_dict[adj] + 1}
        else {bath_dict[adj] = 1}
      }
    })
    document.cookie = "trap_dict=" + JSON.stringify(trap_dict);
    document.cookie = "bath_dict=" + JSON.stringify(bath_dict);
    document.cookie = "trap_places=" + JSON.stringify(trap_places);
    document.cookie = "bath_places=" + JSON.stringify(bath_places);
    changeText();
  }

</script>


<div id="instructions">
  
<h1>Part 1 of 3</h1>
<h2>Instructions</h2>

<p>In this section of the experiment, you'll listen to some speakers reading sentences aloud. We'll ask you to describe each speaker based on how their voice sounds. Please answer based on the speaker's voice/accent, rather than what words they say.</p>

<a href="#/">
<div class="button" onclick="showContent()"> Next >> </div> 
</a>
</div>

<div id="content" style="display: none">

<form>  

<table class="sentence_version">
<tr>
  <td></td>
  <td><a href="#/" onClick="play('audio1')">
<div class="audio">
<audio id="audio1" src="sounds/sentenceVersionPilot/south-m-2_crafty_trap_spliced.wav"></audio>
<img src="speaker.png" width=100px /><br />
replay
</div>
</a></td>
  <td></td>
</tr>
</table>

<p class="question">Based on their voice, please list three words or phrases to describe this speaker.</p>
<p class="smaller">For example, you might think try to guess what the speaker's personality is like, what kind of job they have, what they look like, what their lifestyle is like, how educated they are, etc. Your answers don't have to be accurate--just make your best guess based on their voice!</p>

<input type="text" id="adjective1" class="larger" /><br />
<input type="text" id="adjective2" class="larger" /><br />
<input type="text" id="adjective3" class="larger" /><br />


<p class="question" style="margin-bottom: 0px;"> Where do you think this speaker is from?</p> 
<p style="margin-top: 0px; font-size: 70%">Be as specific as you can.</p>
<textarea id="whereFrom" rows="3" cols="40"></textarea>
<br />

<p class="question"> Additional comments about this speaker (optional):</p> <textarea id="comments" rows="5" cols="40"></textarea>
<br /><br />

</form>

<a href="#">
<div class="button" onclick="record_responses()"> Next </div> 
</a>

</form>

<br /><br />
<progress max="6" value="1" id="progressbar"></progress>  <span class="progress_count"> <span id="completed_count">1</span> / 6 </span>
<br /><br />

</div>

<?php include('footer.php') ?>