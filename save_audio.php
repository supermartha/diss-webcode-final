<?
// pull the raw binary data from the POST array
$data = substr($_POST['data'], strpos($_POST['data'], ",") + 1);
$word = substr($_POST['fname'], strpos($_POST['fname'], ","));
// decode it
$decodedData = base64_decode($data);

$length = strlen($decodedData);

// Check to make sure the file's not crazy big
if ($length < 2000000000000) {
	// Save to server
	$filename = "results/part2_" . $_COOKIE["ParticipantID"] . "_" . $word . ".wav";
	$fp = fopen($filename, 'wb');
	fwrite($fp, $decodedData);
	fclose($fp); 
	// Change permissions so that participant can hear it
	chmod($filename,0755);
	}
else {
	$filename = "results/part2_" . $_COOKIE["ParticipantID"] . "_" . $word . "_TOOBIG.txt";
	$fp = fopen($filename, 'wb');
	fwrite($fp, 'too big');
	fclose($fp); }

?>