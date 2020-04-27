<?php include('header.php'); ?>

<script src="../js/select_pilot_stimuli.js"> </script>

<script>

function play(audioName) {
    document.getElementById(audioName).play(); }

  // var audio = <?php echo json_encode($audio_list); ?>;
  var audio = stimuli; // use this for the real version
  console.log(audio)
  var stimuli_dir = "../sounds/sentenceVersionPilot/";
  // var max = audio.length;
  // console.log(audio)
  var max = 12; // how many stimuli should each participant hear
  var count = 0;

  // Play first sound on page load

  window.onload = function() {
    document.getElementById('audio1').src = stimuli_dir + audio[0] + '.wav';
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
    $.ajax({url: 'save_pilot_data.php',
    data: {results : results},
    type: 'POST',
    success: function(){location.href="part2_instructions.php"}} // Redirect to part 2 when finished
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
    // Keep track of ratings to be able to show participants at end
    console.log(results)
    changeText();
  }

</script>


<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="demographics">  

<table class="sentence_version">
<tr>
  <td></td>
  <td><a href="#/" onClick="play('audio1')">
<div class="audio">
<audio id="audio1" src="daniel_stimuli/DL_northern_bath.wav"></audio>
<img src="speaker.png" width=100px /><br />
Click to replay
</div>
</a></td>
  <td></td>
</tr>
</table>

<p class="question">Based on their voice, please list three words or phrases to describe this speaker.</p>
<input type="text" id="adjective1" class="larger" /><br />
<input type="text" id="adjective2" class="larger" /><br />
<input type="text" id="adjective3" class="larger" /><br />

<br />

<p class="question" style="margin-bottom: 0px;"> Where do you think this speaker is from?</p> 
<p style="margin-top: 0px">Be as specific as you can.</p>
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
<progress max="12" value="1" id="progressbar"></progress>  <span class="progress_count"> <span id="completed_count">1</span> / 12 </span>
<br /><br />

<?php include('footer.php') ?>