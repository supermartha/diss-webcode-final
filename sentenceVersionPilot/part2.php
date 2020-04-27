<?php include('../headerforSubfolders.php'); ?>


<script src="../js/select_pilot_stimuli2.js"> </script>

<script>

function play(audioName) {
    document.getElementById(audioName).play(); }

  var stimuli_dir = "../sounds/sentenceVersionPilot/";

  var max = 4; // how many stimuli should each participant hear
  var count = 0;

  // Load first sounds upon page load (but don't play automatically)
  window.onload = function() {
    document.getElementById('audioA').src = stimuli_dir + stimuliA[0] + '.wav';
    document.getElementById('audioB').src = stimuli_dir + stimuliB[0] + '.wav';
  }



  function changeText() {
    count = count + 1;
    if (count == max) {
      sendResults();;
      }
    else {
      document.getElementById('progressbar').value = document.getElementById('progressbar').value + 1;
      document.getElementById('completed_count').innerHTML = document.getElementById('progressbar').value;
      document.getElementById('comments').value = '';
      document.getElementById('audioA').src = stimuli_dir + stimuliA[count] + '.wav';
      document.getElementById('audioB').src = stimuli_dir + stimuliB[count] + '.wav';
      }
    }

function sendResults(){
  document.getElementById('main').innerHTML = "<p>...saving responses...</p>"
    $.ajax({url: '../save_data.php',
    data: {results : results},
    type: 'POST',
    success: function(){location.href='part3_instructions.php'}} // Redirect to demographics/Br Eng questionnaire when finished
    );
  }

  var results = [2];


  function record_responses() {
    responses = [stimuliA[count], stimuliB[count],
      document.getElementById('comments').value,
      Date.now()], // get current timestamp
    results.push(responses.join(':'));
    console.log(results)
    changeText();
  }

</script>


<form>  

<table class="sentence_version">
<tr>
  <td></td>
  <td><a href="#/" onClick="play('audioA')">
<div class="audio2">
<audio id="audioA" src="../daniel_stimuli/DL_northern_bath.wav"></audio>
<img src="../speaker.png" width=100px /><br />
<div id="replay_text">Version A</div>
</div>
</a></td>
  <td><a href="#/" onClick="play('audioB')">
<div class="audio2">
<audio id="audioB" src="../daniel_stimuli/DL_southern_bath.wav"></audio>
<img src="../speaker.png" width=100px /><br />
<div id="replay_text">Version B</div>
</div>
</a></td>
</tr>
</table>

<p class="smaller">Click to play</p>

<p class="question">What sounds different between these two versions? Compared to Version A, how would hearing Version B change your opinion of a speaker?</p> <textarea id="comments" rows="5" cols="40"></textarea>
<br /><br />

<a href="#">
<div class="button" onclick="record_responses()"> Next </div> 
</a>

</form>

<br /><br />
<progress max="5" value="1" id="progressbar"></progress>  <span class="progress_count"> <span id="completed_count">1</span> / 4 </span>
<br /><br />

<?php include('../footer.php') ?>