<?php include('header.php'); ?>


<?php

$fields = array("east-anglia-younger", "east-midlands-younger", "greater-london-younger", "north-east-younger", "north-west-younger", "south-east-younger", "south-west-younger", "west-midlands-north-younger", "west-midlands-south-younger", "yorkshire-younger", "northern-ireland-younger", "scotland-younger", "wales-younger", "other-country-younger", 
  "east-anglia_age", "east-midlands_age", "greater-london_age", "north-east_age", "north-west_age", "south-east_age", "south-west_age", "west-midlands-north_age", "west-midlands-south_age", "yorkshire_age", "northern-ireland_age", "scotland_age", "wales_age", "lived_in_uk", "lived_in_us", "uk_age-of-arrival", "uk_age-of-departure", "us_age-of-arrival", "us_age-of-departure", "us_places", "list_other_countries",
  "nativeLanguages","hearingDisorder","gender","gender_text", "race_white","race_black","race_latino","race_asian","race_american_indian","race_pacific_islander","race_other","race_text","year_of_birth","occupation","degree","experiment_purpose","comments");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $filename = 'results/demographicsUS-UK_' . $_COOKIE["ParticipantID"];
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



<style>
.parent {
  position: relative;
  top: 0;
  left: 0;
}

.parent img {width: 300px;
  border: 0;}

.image1 {
  position: relative;
  top: 0;
  left: 0;
}
.image2 {
  position: absolute;
  top: 0;
  left: 0;
  display: none;

.invisible {
    visibility: hidden;
    position: absolute;
    top: -9999px;
}

.visible {
    visibility: visible;
    position: static;
}
}
span.verySmall {font-size: 70%}

</style>

<script>

checkedCount = 0;
checkedPlaces = {};

moreInfoText = "<p>You indicated that you've lived in more than one place in the United Kingdom. Can you tell us <b>what ages</b> you lived in each of these places?</p> <ul>";

function toTitleCase(str) {
    return str.replace(/\w\S*/g, function(txt){
        return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();
    });
}

function colormap(areaName) {
  if (areaName != 'other-country') { // color / uncolor map
    currentState = document.getElementById(areaName).style.display;
    if (currentState == 'block') {document.getElementById(areaName).style.display = 'none'}
    else {document.getElementById(areaName).style.display = 'block'};
  }
  if (areaName.substr(areaName.length - 1)!="2") {
    isClicked = document.getElementById(areaName + '-younger').checked;
    if (isClicked==true) {
      checkedCount++; 
      checkedPlaces[areaName] = 1;}
    else {checkedCount = checkedCount - 1;
      delete checkedPlaces[areaName]}
    if (checkedCount > 1) {
      resText = moreInfoText;
      for (placeName in checkedPlaces) {
        resLine = "<li>" + toTitleCase(placeName.replace('-', ' ')) +  ": <input type='text' name='" + placeName + "_age'> </li>";
        resText = resText + resLine;
      }
      document.getElementById('multiplePlaces').innerHTML = resText + "</ul>";
    }
    else {document.getElementById('multiplePlaces').innerHTML = ''}
  }
  console.log(checkedCount);
}

uk_arrive_text = 'How old were you when you first came to the United Kingdom? <br />(answer "0" if you were born there) <input type="text" name="uk_age-of-arrival" />';
uk_leave_text = 'How old were you when you left the United Kingdom? <input type="text" name="uk_age-of-departure" />';

us_arrive_text = 'How old were you when you first came to the United States? <br />(answer "0" if you were born there) <input type="text" name="us_age-of-arrival" />';
us_leave_text = 'How old were you when you left the United States? <input type="text" name="us_age-of-departure" />';

us_places_textbox = '<p class="question">Please list the places you have lived (or currently live in) <b>in the United States</b>, and the approximate ages you lived there:</p><textarea name="us_places" rows="5" cols="40"></textarea>'

other_countries_textbox = '<p class="question">Please list any other countries you have lived in, and the approximate ages you lived there: </p><textarea name="list_other_countries" rows="5" cols="40"></textarea>'

US_UK = [0,0];

function place_button(qNum) {
  if (qNum == 'uk1') {
    // No additional questions if always lived in UK, but display map
    document.getElementById('uk_questions').innerHTML = '';
    document.getElementById('uk_map').style = 'visibility: visible; position: static';
    US_UK[1] = 1;
  }
  else if (qNum == 'uk2') {
    // Moved to UK, ask about arrival and show map
    document.getElementById('uk_questions').innerHTML = '<br />' + uk_arrive_text;
    document.getElementById('uk_map').style = 'visibility: visible; position: static';
    US_UK[1] = 1;
  }
  else if (qNum == 'uk3') {
    // Moved away from UK, ask and arrival and leaving, and show map
    document.getElementById('uk_questions').innerHTML = '<br />' + uk_arrive_text + '<br /><br />' + uk_leave_text;
    document.getElementById('uk_map').style = 'visibility: visible; position: static';
    US_UK[1] = 1;
  }
  else if (qNum == 'uk4') {
    // Never lived there, no additional questions & don't show map
    document.getElementById('uk_questions').innerHTML = '';
    document.getElementById('uk_map').style = 'visibility: invisible; position: absolute; top: -9999px;';
    US_UK[1] = 0;
  }
  if (qNum == 'us1') {
    // No additional questions if always lived in US, but ask where
    document.getElementById('us_questions').innerHTML = '<br />' + us_places_textbox;
    US_UK[0] = 1;
  }
  else if (qNum == 'us2') {
    // Moved to US, ask about arrival
    document.getElementById('us_questions').innerHTML = '<br />' + us_arrive_text + '<br /><br />' + us_places_textbox;
    US_UK[0] = 1;
  }
  else if (qNum == 'us3') {
    // Moved away from US, ask and arrival and leaving
    document.getElementById('us_questions').innerHTML = '<br />' + us_arrive_text + '<br /><br />' + us_leave_text + '<br /><br />' + us_places_textbox;
    US_UK[0] = 1;
  }
  else if (qNum == 'us4') {
    // Never lived there, no additional questions
    document.getElementById('us_questions').innerHTML = '';
    US_UK[0] = 0;
  }

  // Ask about other countries if US & UK
  console.log(US_UK);
  console.log(US_UK == [1,1]);
  if (US_UK[0] + US_UK[1] == 2) {
    document.getElementById('other_country_questions').innerHTML = '<br />' + other_countries_textbox;
  }
  else {
    document.getElementById('other_country_questions').innerHTML = '';
  }
}

</script>

<h3>Demographic Questionnaire</h3>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="demographics">  

<p class="question"> Have you ever lived in the United Kingdom?</p>
<input type="radio" name="lived_in_uk" value="entire_life" onclick="place_button('uk1')" /> yes, I've lived there my entire life <br />
<input type="radio" name="lived_in_uk" value="now" onclick="place_button('uk2')" /> yes, I currently live there, but lived somewhere else in the past<br />
<input type="radio" name="lived_in_uk" value="in_past" onclick="place_button('uk3')" /> yes, but I live somewhere else now<br />
<input type="radio" name="lived_in_uk" value="never" onclick="place_button('uk4')" /> no <br />

<div id="uk_questions"></div>

<div id="uk_map" style="visibility: hidden; position: absolute; top: -9999px;">
<table>
  <tr>
    <td>

<p class="question">Please check the places you have lived (or currently live in) in the United Kingdom:</p>
England:</br />
<div style='padding-left: 40px;' class="places">
  <input type="checkbox" name="east-anglia-younger" id="east-anglia-younger" onclick="colormap('east-anglia')" /> East Anglia <span class="verySmall">(Cambridgeshire, Norfolk, Suffolk)</span><br />
  <input type="checkbox" name="east-midlands-younger" id="east-midlands-younger" onclick="colormap('east-midlands')" /> East Midlands <span class="verySmall">(Derbyshire, Leicestershire, Lincolnshire, Northamptonshire, Nottinghamshire)</span><br />
  <input type="checkbox" name="greater-london-younger" id="greater-london-younger" onclick="colormap('greater-london')" /> Greater London<br />
  <input type="checkbox" name="north-east-younger" id="north-east-younger" onclick="colormap('north-east')" /> North East <span class="verySmall">(Durham, Newcastle, Northumberland, Teesside)</span><br />
  <input type="checkbox" name="north-west-younger" id="north-west-younger" onclick="colormap('north-west')" /> North West <span class="verySmall">(Cheshire, Cumbria, Lancashire, Manchester, Merseyside)</span><br />
  <input type="checkbox" name="south-east-younger" id="south-east-younger" onclick="colormap('south-east')" /> South East <span class="verySmall">(Bedfordshire, Berkshire, Buckinghamshire, Essex, Hampshire, Hertfordshire, Kent, Oxfordshire, Surrey, Sussex)</span><br />
  <input type="checkbox" name="south-west-younger" id="south-west-younger" onclick="colormap('south-west')" /> South West <span class="verySmall">(Avon/Bristol, Cornwall, Devon, Dorset, Gloucestershire, Somerset, Wiltshire)</span><br />
  <input type="checkbox" name="west-midlands-north-younger" id="west-midlands-north-younger" onclick="colormap('west-midlands-north')" /> West Midlands - Birmingham or north of Birmingham <span class="verySmall">(Shropshire, Staffordshire, West Midlands)</span><br />
  <input type="checkbox" name="west-midlands-south-younger" id="west-midlands-south-younger" onclick="colormap('west-midlands-south')" /> West Midlands - south of Birmingham <span class="verySmall">(Hereford and Worcestershire, Warwickshire)</span><br />
  <input type="checkbox" name="yorkshire-younger" id="yorkshire-younger" onclick="colormap('yorkshire')" /> Yorkshire and the Humber<br />
</div>
<input type="checkbox" name="northern-ireland-younger" id="northern-ireland-younger" onclick="colormap('northern-ireland')" /> Northern Ireland<br />
<input type="checkbox" name="scotland-younger" id="scotland-younger" onclick="colormap('scotland')" /> Scotland<br />
<input type="checkbox" name="wales-younger" id="wales-younger" onclick="colormap('wales')" /> Wales<br />


  </td>

  <td>
  <div class="parent">
  <img src="images/area_map_large.png" class="image1" />
  <img src="images/map_east-anglia.png" class="image2" id="east-anglia" />
  <img src="images/map_east-midlands.png" class="image2" id="east-midlands" />
  <img src="images/map_greater-london.png" class="image2" id="greater-london" />
  <img src="images/map_north-east.png" class="image2" id="north-east" />
  <img src="images/map_north-west.png" class="image2" id="north-west" />
  <img src="images/map_northern-ireland.png" class="image2" id="northern-ireland" />
  <img src="images/map_south-east.png" class="image2" id="south-east" />
  <img src="images/map_south-west.png" class="image2" id="south-west" />
  <img src="images/map_west-midlands-north.png" class="image2" id="west-midlands-north" />
  <img src="images/map_west-midlands-south.png" class="image2" id="west-midlands-south" />
  <img src="images/map_yorkshire.png" class="image2" id="yorkshire" />
  <img src="images/map_scotland.png" class="image2" id="scotland" />
  <img src="images/map_wales.png" class="image2" id="wales" />
  </div>
  </td>
  </tr>
</table>

</div>

<div id="multiplePlaces"></div>


<p class="question"> Have you ever lived in the United States?</p>
<input type="radio" name="lived_in_us" value="entire_life" onclick="place_button('us1')" /> yes, I've lived there my entire life <br />
<input type="radio" name="lived_in_us" value="now" onclick="place_button('us2')" /> yes, I currently live there, but lived somewhere else in the past<br />
<input type="radio" name="lived_in_us" value="in_past" onclick="place_button('us3')" /> yes, but I live somewhere else now<br />
<input type="radio" name="lived_in_us" value="never" onclick="place_button('us4')" /> no <br />

<div id="us_questions"></div>

<div id="other_country_questions"></div>




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



<?php include('footer.php') ?>