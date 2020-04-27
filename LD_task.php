<?php include('header.php'); ?>

<script src="js/select_lexicalDecision_stimuli2.js"> </script>
<script src="js/functions.js"> </script>
<!-- use '<script src="js/select_lexicalDecision_stimuli.js"> </script>' for original (pilot) stimulus selection script -->

<script>

function play(audioName) {
    document.getElementById(audioName).play(); }

  var audio = stimuli;
  console.log(audio)
  var stimuli_dir = "sounds/lexicalDecisionWords/";
  // var max = audio.length;
  // console.log(audio)
  var max = 200; // how many stimuli should each participant hear
  var count = 0;

  // Store results as cookie to show participants at the end
  trap_answers = [];
  bath_answers = [];
  filler_word = [];
  filler_nonce = [];

  trapGasWords = ["gas","baffled","raffle", "hassle", "massive","passage","athlete","classic","traffic","acid", "gasket","scaffold", "cattle", "rattle", "tackle", "paddle", "sadly","acted","exact","tracking", "tactic", "tablet", "rapids", "flattens", "dad","tag", "rap","glad", "trap", "snap", "crab","slack","strap","brag","stab", "tacky"];

  // Load first sound
  window.onload = function() {
    document.getElementById('audio1').src = stimuli_dir + audio[0] + '.wav';
  }

  function showContent() {
    document.getElementById('instructions').innerHTML = '';
    document.getElementById('content').style.display = 'block';
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
      sendResults_generic('LD_questionnaire.php');
      }
    else {
      document.getElementById('progressbar').value = document.getElementById('progressbar').value + 1;
      document.getElementById('audio1').src = stimuli_dir + audio[count] + '.wav';
      console.log(audio[count]);
      playAudio(-1); }
    }


  var results = [3];


  function record_responses(keystroke) {
    console.log(keystroke);
    responses = [audio[count],
      keystroke,
      audioFinish,
      Date.now()], // get current timestamp
    results.push(responses.join(':'));
    // Keep track of responses to be able to show participants at end
    word = audio[count].split('_')[1];
    response_binary = 0;
    if (keystroke=='r-realword') {response_binary = 1};
    if (realFillers.indexOf(word) > -1) {filler_word.push(response_binary)}
      else if (nonWords.indexOf(word) > -1) {filler_nonce.push(response_binary)}
        else if (trapGasWords.indexOf(word) > -1) {trap_answers.push(response_binary)}
          else {bath_answers.push(response_binary)}
    // console.log(trap_answers);
    document.cookie = "trap_answers=" + JSON.stringify(trap_answers) + "; max-age=3153600";
    document.cookie = "bath_answers=" + JSON.stringify(bath_answers) + "; max-age=3153600";
    document.cookie = "filler_word=" + JSON.stringify(filler_word) + "; max-age=3153600";
    document.cookie = "filler_nonce=" + JSON.stringify(filler_nonce) + "; max-age=3153600";
    //console.log(results)
    changeText();
  }

</script>

<div id="instructions">
  
<h1>Section 2 of 3</h1>

<h2>Instructions</h2>

<p>In this section of the experiment, you'll hear some recordings. Some of the recordings will be of real words, and some will be of made-up words. Your task is to decide if you hear a real word, or a non-word.</p>

<ul>
  <li>Type <b>'r'</b> if you hear a <b>real word</b>.</li>
  <br />
  <li>Type <b>'u'</b> if you hear a <b>non-word</b>.</li><br />
  <li>Some of the non-words will sound very similar to real words. For example, if you hear 'woman' pronounced as 'wooman', you should say it is a non-word.</li><br />
  <li>Try to respond as quickly as you can without making mistakes.</li>
  <br />
  <li>If you don't hear a word or aren't sure, just make a guess. The next word won't play until you've responded to the previous one.</li>
</ul>
<a href="#/">
<div class="button" onclick="showContent()"> Next >> </div> 
</a>
</div>

<div id="content" style="display: none">

<audio id="audio1" src="daniel_stimuli/DL_northern_bath.wav"></audio>

<table style="width: 100%; margin-top: 50px;">
<tr>
  <td><b id="r">r</b><br />real word</td>
  <td style="text-align: right"><b id="u">u</b><br />non-word</td>
</tr>
</table>


<script type="text/javascript">
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

</div>

<?php include('footer.php') ?>