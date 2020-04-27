<?php include('header.php'); ?>


<?php

$fields = array("opinionOfAccents", "beenToEngland", "whereVisitedEngland", "EnglishFamily", "whereFamilyFrom", "howOftenMedia", "whichTVShows", "otherSources");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $filename = 'results/familiarity_' . $_COOKIE["ParticipantID"];
  $res_file = fopen($filename, "w") or die("Unable to open file!");
  $header = array();

  # Make header
  foreach ($fields as $item) {
    fwrite($res_file, $item . "\t"); }
fwrite($res_file, "x");
  fwrite($res_file, "\n");

  # Add results
  foreach ($fields as $item) {
    $res = test_input2($_POST[$item]);
    fwrite($res_file, $res . "\t"); }


    fclose($res_file);

        ?>
<script type="text/javascript">
window.location = "demographicsUS.php";
</script>      
    <?php

}

?>


<h3>British English questionnaire</h3>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="demographics">  

<p class="question"> What is your opinion of British accents?</p> <textarea name="opinionOfAccents" rows="5" cols="40"></textarea>

<p class="question"> Have you ever been to England?</p>
<input type="radio" name="beenToEngland" value="yes" /> yes <br />
<input type="radio" name="beenToEngland" value="no" /> no <br />

<p class="question">If so, where? For how long?</p> <textarea name="whereVisitedEngland" rows="5" cols="40"></textarea>

<p class="question"> Do you have any family members or close friends who are from England?</p>
<input type="radio" name="EnglishFamily" value="yes" /> yes <br />
<input type="radio" name="EnglishFamily" value="no" /> no <br />

<p class="question">If so, where in England are they from? How long have you known them?</p> <textarea name="whereFamilyFrom" rows="5" cols="40"></textarea>

<p class="question">On average, how often do you watch British TV shows or movies, or listen to British radio programs?</p>

<input type='range' class="frequencySlider" min=0 max=50 id="class" value=0 name="howOftenMedia" />

<ul class="range-labels">
  <li>rarely</li>
  <li>once a month</li>
  <li>once a week</li>
  <li>daily</li>
</ul>

<br />

<p class="question">If you regularly watch British TV shows or listen to British radio programs, which ones?</p> <textarea name="whichTVShows" rows="5" cols="40"></textarea>

<p class="question">As you may have guessed, we are interested in how much British English you have listened to. Are there any other sources that you regularly hear British English from besides the ones listed above?</p> <textarea name="otherSources" rows="5" cols="40"></textarea>
<br /><br />

<a href="finish.php"><input type="submit" class="submit"></a>

</form>

<br /><br />
<progress max="2" value="1" id="progressbar"></progress>  <span class="progress_count"> Page 1 / 2 </span>
<br /><br />

<?php include('footer.php') ?>