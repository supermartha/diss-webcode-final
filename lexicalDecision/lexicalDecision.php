<?php include('../headerforSubfolders.php'); ?>

<script src="../js/select_lexicalDecision_stimuli.js"> </script>

<script>

function play(audioName) {
    document.getElementById(audioName).play(); }

  // var audio = <?php echo json_encode($audio_list); ?>;
  var audio = stimuli; // use this for the real version
  console.log(audio)
  var stimuli_dir = "../sounds/lexicalDecisionWords/";
  // var max = audio.length;
  // console.log(audio)
  var max = 200; // how many stimuli should each participant hear
  var count = 0;

  // Play first sound on page load

  window.onload = function() {
    document.getElementById('audio1').src = stimuli_dir + audio[0] + '.wav';
    document.getElementById('audio1').play();
  }

    function fadeArrow(newState) {
      setTimeout(function(){
          if(newState == -1){document.getElementById('r').style.color = '#333333';
            document.getElementById('u').style.color = '#333333'}
      }, 200);
  }

    // Pause 500ms(?) before playing next stimulus 
    function playAudio(newState) {
      setTimeout(function(){
          if(newState == -1){document.getElementById('audio1').play(); }
      }, 500);
  }


  function changeText() {
    count = count + 1;
    if (count == max) {
      sendResults();;
      }
    else {
      document.getElementById('progressbar').value = document.getElementById('progressbar').value + 1;
      document.getElementById('audio1').src = stimuli_dir + audio[count] + '.wav';
      playAudio(-1); }
    }

function sendResults(){
  document.getElementById('main').innerHTML = "<p>...saving responses...</p>"
    $.ajax({url: '../save_data.php',
    data: {results : results},
    type: 'POST',
    success: function(){location.href="../part3_instructions.php"}} // Redirect to part 2 when finished
    );
  }

  var results = [1];


  function record_responses(keystroke) {
    console.log(keystroke);
    responses = [audio[count],
      keystroke,
      audioFinish,
      Date.now()], // get current timestamp
    results.push(responses.join(':'));
    // Keep track of ratings to be able to show participants at end
    console.log(results)
    changeText();
  }

</script>

<audio id="audio1" src="../daniel_stimuli/DL_northern_bath.wav"></audio>

<table style="width: 100%; margin-top: 50px;">
<tr>
  <td><b id="r">r</b><br />real word</td>
  <td style="text-align: right"><b id="u">u</b><br />non-word</td>
</tr>
</table>


<script type="text/javascript">
// Use arrow keys to move slider
document.addEventListener('keydown', function(event) {
    if (event.keyCode == 82) { //r
      record_responses('r-realword');
      document.getElementById('r').style.color = "#fff";
      fadeArrow(-1);
    }

    else if (event.keyCode == 85) { //l
      record_responses('u-nonword');
      document.getElementById('u').style.color = "#fff";
      fadeArrow(-1);
    }
}, true);

  audio1 = document.getElementById("audio1");

  audio1.onended = function() {
    audioFinish = Date.now();
  };
    </script>




<br /><br />
<progress max="200" value="1" id="progressbar"></progress>
<br /><br />

<?php include('../footer.php') ?>