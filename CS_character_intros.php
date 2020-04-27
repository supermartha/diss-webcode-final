<?php include('header.php'); ?>



<!----- Instructions ------------->
<div id="instructions">
<h1>Section 1 of 4</h1>

<h2>Instructions</h2>
<p> In this section, we will introduce you to six characters on an imaginary TV show set in London. Please read the description of each character carefully. After you finish reading, you will be quizzed about the characters.</p>

<p class="smaller">Note: You do NOT need to memorize the names of the characters.</p>


<a href="#/" id="finishbutton"><div class="button" onclick="showContent()"> Start >> </div> </a>
</div>


<!----- Main Content ------------->
<div id="content" style="display: none; text-align: center; ">

<img src="images/characterSelection/characterA.png" width="500px" id="characterImage" style="border: solid 2px" />
 <p style="text-align: left" id="characterDescription">Florence Chalmondley was born and raised in London. Her parents are wealthy bankers, and she is distantly related to the royal family. After graduating from boarding school, she attended Oxford University, where she met her husband, who is a now a member of Parliament. She operates an art gallery and enjoys wearing expensive jewelry. <span id="at_weekend">At</span> the weekends, she and her husband often ride horses at their country estate.</p>

<a href="#/" id="nextbutton"><div class="button" onclick="changeCharacter()"> Next >> </div> </a>

</div>

<!----- Javascript ------------->
<script src="js/functions.js"></script>

<script>
characterCount = 1;
country = getCookie("Country");



// Variables for differences between British and American English
// Default = British
garbage = 'refuse';
football = 'football';
welfare = 'benefits';
high_school = 'secondary school';
council_housing = 'council housing';

if (country=="US") {
  garbage = 'garbage';
  football = 'football (soccer)';
  welfare = 'welfare';
  high_school = 'secondary school (high school)';
  council_housing = 'council housing (public housing)';
}



function showContent() {
    document.getElementById('instructions').innerHTML = '';
    document.getElementById('content').style.display = 'block';
    // Change "At the weekends" to "On the weekends" for Americans
  if (country == "US") {document.getElementById('at_weekend').innerHTML = 'On'};
  }

  function changeCharacter() {
  	characterCount = characterCount + 1;
  	if (characterCount == 7) {location.href="CS_character_quiz.php"};
  	if (characterCount == 2) {characterText = 'Shaun Thomas lives in York and works as a ' + garbage + ' collector. He is a big Leeds United ' + football + ' fan, and spends most of his free time watching matches and drinking with his mates at the local pub. He occasionally travels to London to attend football matches.'};
   	if (characterCount == 3) {characterText = "Jane Wimbledon comes from Manchester, although nowadays she tries to hide her northern accent. Her childhood was somewhat rough, as her parents were often unemployed and living only on " + welfare + ". At age 20, she seduced a wealthy man and convinced him to marry her. Now they live in a large house in an upscale suburb of London. As her neighbors all come from upper-class backgrounds, she tries to hide her lower-class roots and can act snobbish towards those she perceives to be 'beneath her'. When she goes home to visit her family, she likes to show off her wealth by carrying designer handbags."};
   	if (characterCount == 4) {characterText = 'Nigel White grew up in a wealthy suburb of London. In his early years, he was raised mainly by his nanny as his parents were often away on business. Later, he attended Eton College, a prestigious boarding school. After graduating from Cambridge University, his father helped him to secure a prestigious position at the Bank of England. '};
   	if (characterCount == 5) {characterText = 'Martin Samuels is from Liverpool, where he grew up near the docks. His father was a dock worker and his mother was a seamstress. After completing ' + high_school + ', he got a job as a car salesman. He turned out to be extremely successful at selling cars and quickly moved up the ranks at the company. Eventually he was transferred to an office in London. All of the money he has made has started going to his head, and now he is trying to hobnob with the upper echelons of society. Although he never attended university, he frequently tells people he went to Cambridge or Oxford&mdash;which can lead to awkward situations when he encounters someone who actually attended one of these schools.'};
   	if (characterCount == 6) {characterText = "Raychal Biggins grew up in " + council_housing + " in a small town in the north of England, but moved to London a few years ago for her then-boyfriend. She works as a cashier at Aldi. It's tough to make ends meet, but she works hard and is proud of where she came from."};
    document.getElementById('characterDescription').innerHTML = characterText;
	document.getElementById('characterImage').src = 'images/characterSelection/character' + characterCount + '.png';
  }
 </script>

<?php include('footer.php') ?>