<?php include('header.php'); ?>

<?php

$fields = array("animal", "food", "activity");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $filename = 'results/storyComprehension_' . $_COOKIE["ParticipantID"];
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


window.location = "LD_task.php";
</script>      
    <?php

}

?>


<h2>Questions</h2>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="demographics">  

<p class="question">1. Which animal was the story about?</p>
<input type="radio" name="animal" value="turtle" /> a turtle<br />
<input type="radio" name="animal" value="dog" /> a dog<br />
<input type="radio" name="animal" value="duck" /> a duck<br />
<input type="radio" name="animal" value="alligator" /> an alligator<br />

<p class="question">2. Which food did the animal in the story <b>NOT</b> eat?</p>
<input type="radio" name="food" value="chips" /> a bag of potato chips<br />
<input type="radio" name="food" value="iceCream" /> an ice cream cone<br />
<input type="radio" name="food" value="hamSandwich" /> a ham sandwich<br />
<input type="radio" name="food" value="spaghetti" /> spaghetti and meatballs<br />

<p class="question">3. What did the animal do at the end of the story?</p>
<input type="radio" name="activity" value="nap" /> took a long nap<br />
<input type="radio" name="activity" value="swim" /> went for a swim<br />
<input type="radio" name="activity" value="song" /> sang a song<br />
<input type="radio" name="activity" value="mother" /> visited his mother<br />

<br /><br />

<a href="LD_task.php"><input type="submit" class="submit"></a>

</form>



<?php include('footer.php') ?>