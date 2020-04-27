<?php include('header.php'); ?>

<script src="js/functions.js"> </script>

<script>

  sounds = ["south-m-1_listening_IN", "north-f-1_healthy_TH", "south-f-2_crab_trap", "north-f-1_healthy_TH", "south-m-1_south_TH", "south-f-1_trap_trap_spliced", "south-f-2_anything_TH", "south-f-2_walking_IN", "south-f-1_thick_F", "north-m-2_going_ING", "south-f-2_crab_bath_spliced", "south-f-2_bath_bath_spliced", "south-f-1_classic_trap_spliced", "south-f-2_baffled_bath_spliced", "south-m-1_baskets_bath_spliced", "south-m-1_athlete_bath_spliced", "north-m-2_going_IN", "south-m-1_baskets_trap", "north-f-1_task_bath", "south-m-2_brag_trap", "north-f-1_gas_bath", "north-f-1_tablet_bath", "north-m-2_month_TH", "north-f-1_running_IN", "north-m-2_singing_IN", "south-m-2_laugh_bath", "south-f-1_mouth_TH", "north-f-1_running_IN", "south-m-1_athlete_trap", "south-f-2_keith_F", "south-f-2_bath_bath_spliced", "south-m-1_paddle_bath_spliced", "south-f-2_bath_trap", "south-f-2_keith_F", "north-f-1_running_ING", "north-m-2_month_F", "north-f-1_gas_trap_spliced", "north-m-2_month_TH", "south-f-1_mouth_TH", "north-f-1_task_trap_spliced", "south-f-2_walking_IN", "south-m-2_morning_IN", "south-f-1_thick_TH", "south-m-1_listening_ING", "north-f-1_building_ING", "south-m-1_listening_IN", "south-f-1_trap_trap_spliced", "south-m-2_massive_trap_spliced", "north-f-1_tablet_trap_spliced", "south-f-1_disgusting_ING", "south-f-1_crafty_bath", "south-m-2_massive_bath", "south-m-1_paddle_trap", "south-f-1_disgusting_IN", "north-m-2_passage_trap", "south-m-2_brag_trap", "south-m-2_birthday_TH", "south-m-1_listening_ING", "north-f-1_tablet_bath", "south-m-2_laugh_bath", "south-f-2_crab_bath_spliced", "south-f-2_bath_trap", "north-m-2_singing_ING", "south-m-1_baskets_trap", "south-m-1_paddle_bath_spliced", "south-f-1_classic_bath", "north-m-2_passage_trap", "south-f-2_keith_F", "north-m-2_going_ING", "south-m-2_laugh_trap_spliced", "south-f-1_disgusting_IN", "north-m-2_rattle_bath", "south-m-1_baskets_bath_spliced", "south-f-2_bath_bath_spliced", "south-f-2_walking_ING", "north-m-2_passes_bath_spliced", "north-f-1_running_ING", "north-f-1_building_ING", "south-m-2_birthday_F", "south-m-1_something_ING", "south-m-1_athlete_trap", "north-m-2_passes_trap", "south-f-1_mouth_TH", "south-f-2_anything_F", "north-m-2_going_IN", "south-f-1_thick_TH", "north-m-2_rattle_trap_spliced", "north-m-2_passes_bath_spliced", "north-f-1_gas_bath", "north-f-1_healthy_F", "south-m-1_something_ING", "south-f-1_mouth_F", "north-f-1_task_trap_spliced", "south-m-2_things_TH", "south-m-2_morning_IN", "south-f-2_walking_IN", "south-m-2_things_TH", "south-f-1_disgusting_ING", "south-f-2_baffled_trap", "south-f-2_crab_bath_spliced", "north-f-1_healthy_F", "south-f-2_anything_F", "north-m-2_passage_trap", "south-f-2_crab_trap", "south-f-2_baffled_trap", "south-m-1_paddle_bath_spliced", "north-m-2_singing_IN", "south-f-2_baffled_bath_spliced", "south-f-1_classic_trap_spliced", "south-m-2_things_F", "north-f-1_running_IN", "south-m-1_listening_IN", "south-f-1_crafty_trap_spliced", "south-m-1_baskets_bath_spliced", "south-m-1_athlete_bath_spliced", "south-m-2_massive_bath", "south-m-2_things_TH", "north-m-2_month_F", "south-f-1_trap_bath", "north-f-1_tablet_trap_spliced", "north-f-1_task_bath", "south-m-1_athlete_bath_spliced", "north-f-1_task_trap_spliced", "south-f-1_classic_bath", "south-m-2_morning_ING", "south-m-1_south_F", "south-f-1_mouth_F", "south-m-2_things_F", "north-f-1_running_ING", "south-m-1_south_F", "south-m-2_laugh_bath", "south-m-2_brag_bath_spliced", "north-m-2_going_IN", "north-f-1_healthy_TH", "north-f-1_gas_bath", "south-f-1_crafty_trap_spliced", "north-m-2_passes_trap", "south-f-1_mouth_F", "south-f-1_thick_F", "north-f-1_tablet_bath", "north-m-2_month_TH", "south-f-1_trap_bath", "north-f-1_gas_trap_spliced", "north-m-2_singing_ING", "north-m-2_going_ING", "south-f-2_baffled_trap", "south-m-2_morning_ING", "south-m-1_something_IN", "south-f-1_classic_trap_spliced", "north-m-2_rattle_bath", "south-f-1_crafty_bath", "north-f-1_building_IN", "south-m-1_something_IN", "south-m-1_paddle_trap", "south-f-2_anything_TH", "south-f-1_trap_trap_spliced", "south-m-1_south_F", "south-f-2_anything_F", "south-m-2_brag_bath_spliced", "north-f-1_building_IN", "south-f-2_walking_ING", "north-f-1_building_IN", "south-m-2_birthday_TH", "south-m-2_massive_trap_spliced", "south-m-2_morning_ING", "north-f-1_gas_trap_spliced", "south-f-1_crafty_trap_spliced", "south-f-2_walking_ING", "south-f-1_classic_bath", "north-m-2_singing_ING", "south-m-2_brag_bath_spliced", "south-f-2_keith_TH", "north-f-1_building_ING", "south-f-2_bath_trap", "south-f-1_thick_F", "north-m-2_passage_bath_spliced", "north-m-2_passes_bath_spliced", "north-m-2_rattle_bath", "south-m-1_something_ING", "south-f-1_crafty_bath", "north-m-2_singing_IN", "south-m-2_things_F", "south-f-2_baffled_bath_spliced", "south-m-2_massive_bath", "north-m-2_passage_bath_spliced", "south-m-1_something_IN", "north-m-2_month_F", "north-f-1_tablet_trap_spliced", "north-m-2_rattle_trap_spliced", "south-m-1_paddle_trap", "north-m-2_rattle_trap_spliced", "north-m-2_passes_trap", "south-f-1_trap_bath", "south-m-2_birthday_F", "south-m-1_athlete_trap", "south-m-2_laugh_trap_spliced", "south-m-2_birthday_F", "south-f-2_keith_TH", "south-m-2_morning_IN", "south-m-2_laugh_trap_spliced", "south-f-1_thick_TH", "north-f-1_task_bath", "south-m-1_baskets_trap", "north-f-1_healthy_F", "south-m-2_birthday_TH", "south-f-2_crab_trap", "south-m-2_brag_trap", "north-m-2_passage_bath_spliced", "south-m-1_south_TH", "south-m-2_massive_trap_spliced", "south-m-1_listening_ING", "south-f-1_disgusting_IN", "south-f-2_keith_TH", "south-m-1_south_TH", "south-f-2_anything_TH", "south-f-1_disgusting_ING"];

  trialTypes = ["posh v fake posh", "fake posh v working class", "fake posh v working class", "posh v fake posh", "posh v fake posh", "fake posh v working class", "posh v fake posh", "posh v working class", "posh v working class", "posh v working class", "posh v working class", "posh v fake posh", "fake posh v working class", "fake posh v working class", "fake posh v working class", "posh v working class", "posh v working class", "posh v fake posh", "posh v fake posh", "posh v working class", "fake posh v working class", "posh v fake posh", "posh v working class", "posh v working class", "posh v fake posh", "posh v working class", "fake posh v working class", "posh v fake posh", "posh v working class", "posh v fake posh", "fake posh v working class", "fake posh v working class", "posh v fake posh", "fake posh v working class", "posh v working class", "posh v working class", "posh v working class", "fake posh v working class", "posh v working class", "posh v fake posh", "posh v fake posh", "posh v working class", "posh v working class", "fake posh v working class", "posh v working class", "fake posh v working class", "posh v working class", "posh v fake posh", "posh v fake posh", "fake posh v working class", "posh v fake posh", "fake posh v working class", "fake posh v working class", "fake posh v working class", "posh v fake posh", "fake posh v working class", "posh v working class", "posh v fake posh", "fake posh v working class", "fake posh v working class", "fake posh v working class", "fake posh v working class", "posh v fake posh", "posh v working class", "posh v working class", "posh v working class", "posh v working class", "posh v working class", "fake posh v working class", "fake posh v working class", "posh v fake posh", "posh v working class", "posh v working class", "posh v working class", "posh v working class", "posh v fake posh", "posh v fake posh", "posh v fake posh", "posh v fake posh", "posh v working class", "fake posh v working class", "posh v fake posh", "posh v fake posh", "posh v fake posh", "fake posh v working class", "fake posh v working class", "posh v working class", "posh v working class", "posh v fake posh", "posh v fake posh", "fake posh v working class", "posh v fake posh", "fake posh v working class", "fake posh v working class", "posh v fake posh", "fake posh v working class", "posh v working class", "posh v working class", "posh v working class", "posh v fake posh", "fake posh v working class", "posh v working class", "fake posh v working class", "posh v fake posh", "fake posh v working class", "posh v fake posh", "fake posh v working class", "posh v working class", "posh v fake posh", "posh v working class", "fake posh v working class", "posh v working class", "fake posh v working class", "posh v fake posh", "posh v fake posh", "posh v fake posh", "posh v fake posh", "posh v fake posh", "posh v fake posh", "fake posh v working class", "posh v working class", "fake posh v working class", "posh v working class", "posh v fake posh", "posh v fake posh", "posh v fake posh", "fake posh v working class", "posh v fake posh", "fake posh v working class", "fake posh v working class", "posh v fake posh", "posh v fake posh", "posh v fake posh", "posh v working class", "posh v working class", "posh v fake posh", "posh v working class", "posh v working class", "fake posh v working class", "posh v working class", "posh v fake posh", "fake posh v working class", "posh v fake posh", "fake posh v working class", "posh v fake posh", "posh v fake posh", "posh v working class", "posh v working class", "posh v working class", "fake posh v working class", "posh v working class", "posh v working class", "fake posh v working class", "posh v fake posh", "fake posh v working class", "posh v fake posh", "posh v working class", "fake posh v working class", "posh v working class", "posh v fake posh", "fake posh v working class", "fake posh v working class", "fake posh v working class", "posh v working class", "fake posh v working class", "fake posh v working class", "posh v working class", "posh v fake posh", "fake posh v working class", "posh v working class", "fake posh v working class", "fake posh v working class", "fake posh v working class", "posh v working class", "posh v fake posh", "posh v fake posh", "fake posh v working class", "posh v fake posh", "posh v fake posh", "fake posh v working class", "posh v working class", "fake posh v working class", "posh v fake posh", "posh v working class", "fake posh v working class", "posh v fake posh", "fake posh v working class", "posh v working class", "posh v fake posh", "posh v working class", "fake posh v working class", "fake posh v working class", "posh v working class", "posh v working class", "posh v fake posh", "posh v working class", "fake posh v working class", "posh v working class", "fake posh v working class", "posh v fake posh", "posh v fake posh", "fake posh v working class", "fake posh v working class", "posh v working class", "posh v fake posh", "posh v working class", "posh v fake posh", "posh v working class", "posh v working class", "fake posh v working class", "posh v working class", "posh v working class", "posh v fake posh", "fake posh v working class", "posh v working class", "posh v fake posh"];

  whichLeftList = ["posh", "fake posh", "working class", "posh", "fake posh", "working class", "posh", "working class", "working class", "working class", "posh", "fake posh", "working class", "working class", "working class", "posh", "working class", "fake posh", "fake posh", "working class", "fake posh", "posh", "working class", "posh", "posh", "working class", "working class", "posh", "posh", "fake posh", "fake posh", "working class", "posh", "fake posh", "working class", "posh", "posh", "working class", "posh", "posh", "posh", "working class", "posh", "fake posh", "working class", "working class", "working class", "fake posh", "posh", "fake posh", "posh", "working class", "working class", "working class", "posh", "working class", "posh", "fake posh", "fake posh", "fake posh", "working class", "working class", "fake posh", "posh", "working class", "posh", "working class", "working class", "fake posh", "working class", "fake posh", "working class", "posh", "posh", "working class", "fake posh", "posh", "fake posh", "posh", "posh", "fake posh", "fake posh", "posh", "fake posh", "working class", "working class", "working class", "posh", "fake posh", "posh", "fake posh", "fake posh", "fake posh", "fake posh", "fake posh", "working class", "posh", "working class", "working class", "posh", "working class", "posh", "fake posh", "fake posh", "fake posh", "posh", "working class", "working class", "posh", "working class", "fake posh", "working class", "working class", "posh", "fake posh", "fake posh", "posh", "posh", "fake posh", "fake posh", "working class", "fake posh", "working class", "posh", "posh", "fake posh", "working class", "fake posh", "fake posh", "working class", "fake posh", "fake posh", "fake posh", "working class", "working class", "fake posh", "posh", "working class", "working class", "posh", "fake posh", "fake posh", "fake posh", "fake posh", "fake posh", "posh", "posh", "posh", "posh", "working class", "working class", "posh", "fake posh", "posh", "working class", "posh", "posh", "fake posh", "working class", "posh", "fake posh", "fake posh", "fake posh", "posh", "fake posh", "fake posh", "working class", "posh", "fake posh", "posh", "fake posh", "working class", "working class", "posh", "posh", "posh", "fake posh", "fake posh", "fake posh", "working class", "posh", "fake posh", "fake posh", "working class", "fake posh", "fake posh", "working class", "working class", "fake posh", "posh", "working class", "fake posh", "posh", "posh", "posh", "posh", "working class", "working class", "working class", "posh", "posh", "working class", "fake posh", "working class", "fake posh", "working class", "posh", "posh", "posh", "working class", "posh", "working class", "fake posh", "fake posh", "posh", "posh"];

function play(audioName) {
    document.getElementById(audioName).play(); }

  var audio = sounds;
  console.log(audio)
  var stimuli_dir = "sounds/characterSelectionWords/";
  // var max = audio.length;
  // console.log(audio)
  var max = 216; // how many stimuli should each participant hear - 216
  var count = 0;

  // Store results as cookie to show participants at the end
  BATH_bath_res = [];
  BATH_trap_res = [];
  GAS_bath_res = [];
  GAS_trap_res = [];

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
            document.getElementById('leftImage').style.border ="solid 1px #000";
            document.getElementById('rightImage').style.border ="solid 1px #000";
      }, 200);
  }

    // Pause 500ms(?) before playing next stimulus 
    function playAudio(newState) {
      setTimeout(function(){
          if(newState == -1){
            document.getElementById('audio1').play(); 

            // Figure out word, speaker from stimulus
            word = audio[count].split('_')[1];
            speaker = audio[count].split('_')[0];
            gender = 'female';
            if (speaker == "north-m-2" || speaker == "south-m-1" || speaker=="south-m-2") {gender='male'; }
            trialType = trialTypes[count];
            whichLeft = whichLeftList[count];
            if (gender=='female') {
              poshImg = "1";
              fakeImg = "3";
              wcImg = "6"; }
            else {
              poshImg = "4";
              fakeImg = "5";
              wcImg = "2";
            }
            if (trialType=='posh v fake posh') {
              if (whichLeft=='posh') {leftImg = poshImg; rightImg = fakeImg;}
              else {leftImg = fakeImg; rightImg = poshImg;}
            }
            else if (trialType=='posh v working class') {
              if (whichLeft=='posh') {leftImg = poshImg; rightImg = wcImg;}
              else {leftImg = wcImg; rightImg = poshImg;}
            }
            else if (trialType=='fake posh v working class') {
              if (whichLeft=='fake posh') {leftImg = fakeImg; rightImg = wcImg;}
              else {leftImg = wcImg; rightImg = fakeImg;}
            }

            // Update word, pictures
            document.getElementById('word').innerHTML = word;
            document.getElementById('leftImage').src = "images/characterSelection/character" + leftImg + ".png";
            document.getElementById('rightImage').src = "images/characterSelection/character" + rightImg + ".png";
          }
      }, 500);
  }


  function changeText() {
    count = count + 1;
    if (count == max) {
      sendResults_generic('CS_questionnaire.php');
      }
    else {
      document.getElementById('progressbar').value = document.getElementById('progressbar').value + 1;
      document.getElementById('audio1').src = stimuli_dir + audio[count] + '.wav';
      console.log(audio[count]);
      playAudio(-1); }
    }


  var results = [7];


  function record_responses(keystroke) {
    console.log(keystroke);
    responses = [audio[count],
      keystroke,
      audioFinish,
      Date.now()], // get current timestamp
    results.push(responses.join(':'));
    // Keep track of responses to be able to show participants at end
    word = audio[count].split('_')[1];
    guise = audio[count].split('_')[2];
    trialType = trialTypes[count];
    whichLeft = whichLeftList[count];
    // Figure out which character was selected
    if (keystroke=='leftImage') {selected=whichLeft;}
    else {
      if (trialType=='posh v fake posh') {
        oppositeImg = 'posh'
        if (whichLeft=='posh') {oppositeImg='fake posh'}
      }
      else if (trialType=='posh v working class') {
        oppositeImg = 'posh'
        if (whichLeft=='posh') {oppositeImg='working class'}
      }
      else if (trialType=='fake posh v working class') {
        oppositeImg = 'fake posh'
        if (whichLeft=='fake posh') {oppositeImg='working class'}
      }
      selected=oppositeImg;
    }

    if (['bath', 'laugh', 'task', 'crafty', 'passes', 'baskets'].includes(word)) {
      if (guise=="bath") {BATH_bath_res.push(selected);}
      else {BATH_trap_res.push(selected);}
    }
    if (['gas', 'baffled', 'massive', 'passage', 'athlete', 'classic', 'rattle', 'paddle', 'tablet', 'crab', 'trap', 'brag'].includes(word)) {
      if (guise=="bath") {GAS_bath_res.push(selected);}
      else {GAS_trap_res.push(selected);}
    }
    document.cookie = "BATH_bath_res=" + JSON.stringify(BATH_bath_res) + "; max-age=3153600";
    document.cookie = "BATH_trap_res=" + JSON.stringify(BATH_trap_res) + "; max-age=3153600";
    document.cookie = "GAS_bath_res=" + JSON.stringify(GAS_bath_res) + "; max-age=3153600";
    document.cookie = "GAS_trap_res=" + JSON.stringify(GAS_trap_res) + "; max-age=3153600";
    console.log(BATH_bath_res);
    console.log(BATH_trap_res);
    console.log(GAS_bath_res);
    console.log(GAS_trap_res);
    changeText();
  }

</script>

<div id="instructions">
  


<!----- Instructions ------------->
<h2>Instructions</h2>

<p>In the next part of the experiment, you will hear a word and see two of the characters. When you hear the word, imagine that you are listening to an actor pretending to be one of the characters. Your task is to try and <b>guess who the actor is pretending to be</b>, by selecting one of the characters. Listen carefully to the way each word is pronounced, and choose the character who you think is the best match.</p>

<p>To select the character, place your fingers on the ‘r’ and ‘u’ keys.</p>

<ul>
  <li>Type <b>'r'</b> to select the character on the <b>left</b>.</li>
  <br />
  <li>Type <b>'u'</b> to select the character on the <b>right</b>.</li>
  <br />
  <li>Your response times will be recorded, so please respond as quickly as possible.</li>
  <br />
  <li>Sometimes you might feel that none of the characters really match the sound you hear. If that’s the case, just make your best guess.</li>
</ul>

<br />


<a href="#/">
<div class="button" onclick="showContent()"> Next >> </div> 
</a>
</div>

<!----- Main Content ------------->
<div id="content" style="display: none">

<audio id="audio1" src="daniel_stimuli/DL_northern_bath.wav"></audio>

<table style="width: 100%; margin-top: 50px;">
<tr>
  <td><b id="r">r</b></td>
  <td style="text-align: right"><b id="u">u</b></td>
</tr>
</table>

<!----- Images ------------->
<table style="width: 100%">
  <tr>
    <td style="text-align: center"> <img src="images/characterSelection/character4.png" width="300px" id="leftImage" /> </td>
    <td style="text-align: center"> <img src="images/characterSelection/character5.png" width="300px" id="rightImage" /></td>
  </tr>
</table>

<div style="width: 100%; text-align: center; ">
<p style="font-size: 150%; font-weight: bold; text-transform: uppercase;" id="word">LISTENING</p>
</div>

<!----- JS for recording responses ------------->
<script type="text/javascript">
document.addEventListener('keydown', function(event) {
    if (event.keyCode == 82) { //r
      record_responses('leftImage');
      document.getElementById('r').style.color = "#fff";
      document.getElementById('leftImage').style.border ="solid 5px #000";
      fadeArrow(-1);
    }

    else if (event.keyCode == 85) { //l
      record_responses('rightImage');
      document.getElementById('u').style.color = "#fff";
      document.getElementById('rightImage').style.border ="solid 5px #000";
      fadeArrow(-1);
    }
}, true);

  audio1 = document.getElementById("audio1");

  audio1.onended = function() {
    audioFinish = Date.now();
  };
    </script>




<br /><br />
<div style="width: 100%; text-align: center; ">
<progress max="216" value="1" id="progressbar"></progress>
</div>
<br /><br />

</div>

<?php include('footer.php') ?>