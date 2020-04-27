<?php include('header.php'); ?>


<?php

$fields = array("city1","state1","country1","city2","state2","country2","city3","state3","country3","city4","state4","country4","city5","state5","country5","age1","age2","age3","age4","age5","lg","gender","gender_text", "race_white","race_black","race_latino","race_asian","race_american_indian","race_pacific_islander","race_other","race_text","year_of_birth","occupation","degree","zip_code","experiment_purpose","comments");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $filename = 'results/part5_' . $_COOKIE["ParticipantID"];
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
window.location = "finish.php";
</script>      
    <?php

}

?>


<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="demographics">  

<table class="sentence_version">
<tr>
  <td></td>
  <td><a href="#/" onClick="play('audioA')">
<div class="audio">
<audio id="audioA" src="daniel_stimuli/DL_northern_bath.wav"></audio>
<img src="speaker.png" width=100px /><br />
<div id="replay_text">Version A</div>
</div>
</a></td>
  <td><a href="#/" onClick="play('audioB')">
<div class="audio">
<audio id="audioB" src="daniel_stimuli/DL_southern_bath.wav"></audio>
<img src="speaker.png" width=100px /><br />
<div id="replay_text">Version B</div>
</div>
</a></td>
</tr>
</table>

<p class="question">What sounds different between these two versions? Compared to Version A, how would hearing Version B change your opinion of a speaker?</p> <textarea name="comments" rows="5" cols="40"></textarea>
<br /><br />

<a href="finish.php"><input type="submit" class="submit"></a>

</form>

<?php include('footer.php') ?>