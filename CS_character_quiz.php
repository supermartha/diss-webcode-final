<?php include('header.php'); ?>



<!----- Instructions ------------->
<div id="instructions">
<h1>Section 2 of 4</h1>

<p>Now let's check how well you learned.</p>

<p>We'll ask you a question and show you two of the characters. To respond, use the 'r' and 'u' letters on your keyboard.</p>

<ul>
  <li>Type <b>'r'</b> to select the character on the <b>left</b>.</li>
  <br />
  <li>Type <b>'u'</b> to select the character on the <b>right</b>.</li>
</ul>


<a href="#/" id="finishbutton"><div class="button" onclick="showContent()"> Next >> </div> </a>
</div>


<!----- Main Content ------------->
<div id="content" style="display: none; ">

<table style="width: 100%; margin-top: 50px;">
<tr>
  <td><b id="r">r</b></td>
  <td style="text-align: right"><b id="u">u</b></td>
</tr>
</table>
 <br />

<div style="text-align: center; ">
<p style="font-weight: bold" id="quizQuestion">Which character attended Oxford University?</p>
</div>

<table style="width: 100%">
  <tr>
    <td style="text-align: center"> <a href="#/"><img src="images/characterSelection/characterA.png" width="300px" id="leftImage" onclick="changeCharacter()" class="quizImage" /></a> </td>
    <td style="text-align: center"> <a href="#/"><img src="images/characterSelection/character6.png" width="300px" id="rightImage" onclick="changeCharacter()" class="quizImage" /></a></td>
  </tr>
</table>

</div>

<!----- Javascript ------------->
<script src="js/functions.js"></script>
<script>
questionCount = 1;

// Initialize variables so they're global
imgA = '1';
imgB = '6';
correctCount = 0;
results = [6];


function showContent() {
    document.getElementById('instructions').innerHTML = '';
    document.getElementById('content').style.display = 'block';
  }

  function changeCharacter() {
  	questionCount = questionCount + 1;
  	if (questionCount == 6) {
      document.getElementById('content').innerHTML = 'You answered <b>' + correctCount + ' out of 5</b> correctly.<br /><br /><a href="#/"> <div class="button" onclick="sendResults_generic(' + "'CS_sound_check.php'" + ')" > Next >> </div> </a>';
      // setTimeout(goToNextPage, 500);
    };
  	if (questionCount == 2) {characterText = 'Which character grew up poor but is now wealthy?';
      imgA = '2';
      imgB = '3'};
   	if (questionCount == 3) {characterText = "Which character tells people that he went to Oxford or Cambridge, even though he never attended university?";
      imgA = '4';
      imgB = '5'};
   	if (questionCount == 4) {characterText = "Which character works at the Bank of England?";
      imgA = '3';
      imgB = '4';
   };
   	if (questionCount == 5) {characterText = "Which character is working class?";
      imgA = '6';
      imgB = '4';};

  if (questionCount < 6) {
    document.getElementById('quizQuestion').innerHTML = characterText;
	   document.getElementById('leftImage').src = 'images/characterSelection/character' + imgA + '.png';
    document.getElementById('rightImage').src = 'images/characterSelection/character' + imgB + '.png';
    }
  }

  function record_responses(response) {
      responses = [questionCount,
      response,
      Date.now()], // get current timestamp
    results.push(responses.join(':'));

    // First, check if response correct
    if (questionCount == 1 || questionCount == 5) {correctAnswer = 'leftImage'}
    else {correctAnswer = 'rightImage'}

    wrongAnswer = 'leftImage';
    if (correctAnswer == 'leftImage') {wrongAnswer = 'rightImage'};

    selectedImage = imgA;
    if (response=='rightImage') {selectedImage = imgB};
    console.log(response);
    console.log(selectedImage);

    // If correct, reward them with a nice check mark
    if (response==correctAnswer) {
      document.getElementById(correctAnswer).src = 'images/characterSelection/character' + selectedImage + '_check.png';
      correctCount = correctCount + 1;
    }
    else {document.getElementById(wrongAnswer).src = 'images/characterSelection/character' + selectedImage + '_x.png';}
    setTimeout(changeCharacter, 800);
  }

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

 </script>

<?php include('footer.php') ?>