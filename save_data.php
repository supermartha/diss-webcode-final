<?php

if(isset($_POST['results']))
{

    $results = $_POST['results'];
    # First item of results is part #, use this to name file and set up CSV
    $part_num = $results[0];
    $results = array_slice($results, 1);
    $filename = 'results/part' . $part_num . '_' . $_COOKIE["ParticipantID"];

	$res_file = fopen($filename, "w") or die("Unable to open file!");

	$header = $part_num;

	# Part 1 = sentence version pilot, 3 adjectives task
	if ($part_num == 1) {$header = "stimulus \t adjective1 \t adjective2 \t adjective3 \t whereFrom \t comments \t timestamp \t x"; }
	# Part 2 = sentence version pilot, comparison task
	elseif ($part_num == 2) {$header = "stimulusA \t stimulusB \t response \t timestamp \t x"; }
	# Part 3 = lexical decision pilot
	elseif ($part_num == 3) {$header = "stimulus \t response \t audioEndTimestamp \t responseTimestamp \t x"; }
	# Part 4 = sentence version task
	elseif ($part_num == 4) {$header = "stimulusA \t stimulusB \t educated \t workingClass \t correct \t posh \t southOfEngland \t fakingAccent \t wealthy \t comments \t timestamp \t x"; }
	# Part 5 = scale-rating task (Experiment 3)
	elseif ($part_num == 5) {$header = "stimulus \t educated \t posh \t fakingAccent \t wealthy \t fromEngland \t timestamp \t x"; }
	# Part 6 = character selection quiz (Experiment 2)
	elseif ($part_num == 6) {$header = "questionNum \t response \t timestamp \t x"; }
	# Part 7 = character selection task (Experiment 2)
	elseif ($part_num == 7) {$header = "stimulus \t response \t audioEndTimestamp \t responseTimestamp \t x"; }
	# Part 5 = sentence version task with 5 dims
	elseif ($part_num == 8) {$header = "stimulusA \t stimulusB \t educated \t posh \t fakingAccent \t wealthy \t fromEngland \t timestamp \t x"; }

	fwrite($res_file, $header . "\n");

	foreach ($results as $item) {
		$item = explode(':',$item);
		foreach ($item as $element) {fwrite($res_file, $element . "\t"); };
		fwrite($res_file, "\n");
	}

	fclose($res_file);

}

?>