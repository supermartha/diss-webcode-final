<?
// pull the raw binary data from the POST array
$data = substr($_POST['data'], strpos($_POST['data'], ",") + 1);
// decode it
$decodedData = base64_decode($data);
// print out the raw data, 
echo ($decodedData);
$filename = "results/test.wav";
// write the data out to the file
$fp = fopen($filename, 'wb');
fwrite($fp, $decodedData);
fclose($fp);
?>