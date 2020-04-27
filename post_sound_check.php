<?php include('header.php'); ?>

<?php

$fields = array("prolificID");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $filename = 'applesToOranges/id_' . $_COOKIE["ParticipantID"];
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
window.location = "LD_story.php";
</script>      
    <?php

}

?>

<p> You got it! </p>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  

<p class="question"> Now, please enter your Prolific ID to continue.</p>
<input type="textbox" name="prolificID" />
<br /><br />
<a href="LD_story.php"><input type="submit" class="submit"></a>

</form>


<?php include('footer.php') ?>