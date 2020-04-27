<?php include('header.php'); ?>

<script>

function play(audioName) {
    document.getElementById(audioName).play(); }

  function showFinishButton() {
  document.getElementById('finishbutton').innerHTML = '<div class="button" onclick="goToQuestions()"> Next >> </div>'; 
  }

  function goToQuestions() {location.href="LD_story_questions.php"}
</script>

<audio id="audio1" src="sounds/south-f-1_duckling.wav" onended="showFinishButton()"></audio>


<h1>Section 1 of 3</h1>

<h2>Instructions</h2>
<p> Click the "play" button below to listen to an English woman reading an excerpt from a children's story. Listen the way you would normally listen to a children's story. When you are finished listening, we will ask you a few questions about what happened in the story.</p>

<p class="smaller">Note: The story will be about 45 seconds long. You will only hear the story once.</p>


<a href="#/" id="finishbutton"><div class="button" onclick="play('audio1')"> Play </div> </a>

<?php include('footer.php') ?>