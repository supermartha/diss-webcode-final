<?php

    $filename = 'results/testing.php';

	$res_file = fopen($filename, "w") or die("Unable to open file!");

	fwrite($res_file, "does it work?");

	fclose($res_file);


?>

hi