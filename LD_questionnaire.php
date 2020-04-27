<?php include('header.php'); ?>

<?php

$fields = array("experiment_purpose","comments");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $filename = 'results/LDquestionnaire_' . $_COOKIE["ParticipantID"];
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
window.location = "LD_final.php";
</script>      
    <?php

}

?>

<h1>Section 3 of 3</h1>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="demographics">  


<p class="question"> What did you think this experiment was about? </p> <textarea name="experiment_purpose" rows="5" cols="40"></textarea>

<p class="question"> Any comments for the researchers?</p> <textarea name="comments" rows="5" cols="40"></textarea>
<br /><br />

<a href="LD_final.php"><input type="submit" class="submit"></a>

</form>

<?php include('footer.php'); ?>