<?php include('header.php'); ?>


<?php

$fields = array("city1","state1","country1","age1","city2","state2","country2","age2","city3","state3","country3","age3","city4","state4","country4","age4","additionalLocations","nativeLanguages","hearingDisorder","gender","gender_text", "race_white","race_black","race_latino","race_asian","race_american_indian","race_pacific_islander","race_other","race_text","year_of_birth","occupation","degree","experiment_purpose","comments");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $filename = 'results/demographicsUS_' . $_COOKIE["ParticipantID"];
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
window.location = "debriefing.php";
</script>      
    <?php

}

?>

<script>
var count = 0
function addPlace() {
    document.getElementById('add_another').innerHTML = 'Add another place'
  if (count == 0) {
  document.getElementById('more_locations').innerHTML = '<table><tr><td> city:</td><td> <input type="text" name="city2" /></td></tr><tr><td>state/province/county: </td><td><input type="text" name="state2"> </td></tr><tr>  <td>country (if not US): </td><td><input type="text" name="country2"></td></tr><tr> <td>ages lived there: </td><td><input type="text" name="age2"></td></tr></table><br />'; }
  if (count == 1) {document.getElementById('more_locations2').innerHTML = '<table><tr><td> city:</td><td> <input type="text" name="city3" /></td></tr><tr><td>state/province/county: </td><td><input type="text" name="state3"> </td></tr><tr>  <td>country (if not US): </td><td><input type="text" name="country3"></td></tr><tr>  <td>ages lived there: </td><td><input type="text" name="age3"></td></tr></table><br />'}
    if (count == 2) {document.getElementById('more_locations3').innerHTML = '<table><tr><td> city:</td><td> <input type="text" name="city4" /></td></tr><tr><td>state/province/county: </td><td><input type="text" name="state4"> </td></tr><tr>  <td>country (if not US): </td><td><input type="text" name="country4"></td></tr><tr>  <td>ages lived there: </td><td><input type="text" name="age4"></td></tr></table><br />'}
        if (count == 3) {document.getElementById('more_locations4').innerHTML = "If you've lived in more than 4 places, please list the additional places and approximate ages you lived there below.<br /><textarea name='additionalLocations' rows='5' cols='40'></textarea>";
            document.getElementById('add_another').innerHTML = ''}

  count = count + 1
}
</script>

<h3>Demographic Questionnaire</h3>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="demographics">  


<p class="question">Please list the places you have lived since you were 5 years old (including where you live now).</p>
<table>
  <tr>  <td>city:</td><td> <input type="text" name="city1" /></td></tr>
<tr>  <td>state/province/county: </td><td><input type="text" name="state1"> </td></tr>
<tr>  <td>country (if not US): </td><td><input type="text" name="country1"></td></tr>
<tr>  <td>ages lived there: </td><td><input type="text" name="country1"></td></tr>
<tr> <td id="add_age1"></td> <td id="add_age2"></td></tr>
</table>

<br />

<div id="more_locations"></div>
<div id="more_locations2"></div>
<div id="more_locations3"></div>
<div id="more_locations4"></div>

<a href="#/" onClick="addPlace()" id="add_another" style="text-decoration: underline">Add another place.</a>

<p class="question"> What language(s) could you speak by the time you were 5 years old? </p>
<input type="textbox" name="nativeLanguages" />

<p class="question"> Have you ever been diagnosed with a hearing disorder?</p>
<input type="radio" name="hearingDisorder" value="yes" /> yes <br />
<input type="radio" name="hearingDisorder" value="no" /> no <br />

<p class="question"> Gender: </p>
<input type="radio" name="gender" value="female" /> female <br />
<input type="radio" name="gender" value="male" /> male <br />
<input type="radio" name="gender" value="other" /> something else: <input type="text" name="gender_text">

<p class="question"> Race/Ethnicity: </p>
<input type="checkbox" name="race_white" /> White <br />
<input type="checkbox" name="race_black" /> Black / African-American <br />
<input type="checkbox" name="race_latino" /> Hispanic / Latino/a <br />
<input type="checkbox" name="race_asian" /> Asian <br />
<input type="checkbox" name="race_american_indian" /> American Indian or Alaska Native <br />
<input type="checkbox" name="race_pacific_islander" /> Native Hawaiian or other Pacific Islander <br />
<input type="checkbox" name="race_other" /> something else: <input type="text" name="race_text">

<p class="question"> What year were you born?</p>  <input type="textbox" name="year_of_birth" />

<p class="question"> What is your current occupation?</p> <input type="textbox" name="occupation" />

<p class="question"> Highest educational level completed:</p> <select name="degree">
  <option value="some_hs">Some high school</option>
  <option value="hs_diploma">High school diploma</option>
  <option value="ged">GED or equivalent</option>
  <option value="some_college">Some college</option>
  <option value="associates">Associate's degree / 2-year college</option>
  <option value="bachelors">Bachelor's degree / 4-year college</option>
  <option value="some_grad_school">Some graduate school</option>
  <option value="masters">Master's degree</option>
  <option value="phd">PhD or professional graduate degree</option>
</select>

<p class="question"> What did you think this experiment was about? </p> <textarea name="experiment_purpose" rows="5" cols="40"></textarea>

<p class="question"> Any comments for the researchers?</p> <textarea name="comments" rows="5" cols="40"></textarea>
<br /><br />

<a href="SVP_debriefing.php"><input type="submit" class="submit"></a>

</form>

<br /><br />
<progress max="2" value="2" id="progressbar"></progress>  <span class="progress_count"> Page 2 / 2 </span>
<br /><br />

<?php include('footer.php') ?>