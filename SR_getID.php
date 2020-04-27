<?php include('header.php'); ?>

<?php

$fields = array("prolificID");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $filename = 'applesToOranges/idSR_' . $_COOKIE["ParticipantID"];
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
window.location = "SR_task.php";
</script>      
    <?php

}

?>


<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  

<p class="question"> Please enter your Prolific ID.</p>
<input type="textbox" name="prolificID" />
<br /><br />

<a href="SR_task.php"><input type="submit" class="submit"></a>

</form>


<?php include('footer.php') ?>