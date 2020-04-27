<?php
# layout.php
require_once('PageTemplate.php');
?>

<!DOCTYPE HTML>
<html>
<header>
	<title> Experiment </title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<?php if(isset($TPL->ContentHead)) { include $TPL->ContentHead; } ?>

	<script>
		function shuffleArray(array) {
    	for (var i = array.length - 1; i > 0; i--) {
        	var j = Math.floor(Math.random() * (i + 1));
        	var temp = array[i];
        	array[i] = array[j];
        	array[j] = temp;
    	}
	}
	</script>
</header>

<?php include_once 'functions.php'
 ?>

<body>

<div id="main">
    <?php if(isset($TPL->ContentBody)) { include $TPL->ContentBody; } ?>
</div>

<div class="dev">
	<a href="part1_instructions.php">@part1</a> | 
	<a href="part2_instructions.php">@part2</a> | 
	<a href="part3_instructions.php">@part3</a> | 
	<a href="part4_instructions.php">@part4</a> | 
	<a href="part5_instructions.php">@part5</a> | 
</div>

</body>
</html>