<?php
// Check if participant ID cookie already exists, if not then set it
$rand = uniqid($more_entropy=TRUE);
if (!isset($_COOKIE["ParticipantID"]))
    setcookie("ParticipantID", $rand, time() + (86400 * 30));
?>

<?php include('header.php') ?>

<!--- Consent for character selection task --->

<h1> Linguistics Experiment</h1>

<p>You are being invited to participate in an experiment about the perception of British English. In this experiment, you will be introduced to some characters on an imaginary British TV show. Later, you will listen to some words spoken aloud and be asked to decide which character you think is saying the words.</p> 

<p>The experiment will take about <b id="experiment_time">15 minutes</b>.</p>

<p>You will be paid <b id="experiment_payment">$2.14</b> in appreciation for your time.</p>

<div class="smaller">
<p><b>Consent agreement:</b></p>

<p>By clicking the "Begin" button below you agree to participate in this experiment, which is conducted by researchers at The Ohio State University. Participation in this experiment is voluntary. You may skip any question you do not wish to answer. You may withdraw from this experiment at any time without penalty or loss of benefits, including loss or reduction of payment. If you do withdraw from the study before the end, please contact the researchers for information on how to collect payment (austen dot 14 at osu dot edu). By law, payments to participants are considered taxable income. The data collected will be anonymous and confidential.</p>

<p> If you have any questions, you may contact the requester through the Prolific Academic platform, or directly by emailing Martha Austen at austen dot 14 at osu dot edu. For questions about your rights as a participant in this study or to discuss other study-related concerns or complaints with someone who is not part of the research team, you may contact Ms. Sandra Meadows in the Ohio State University Office of Responsible Research Practices at 1-800-678-6251.</p>
</div>


<a href="CS_getID.php">
<div class="button"> Begin </div> 
</a>


<script type="text/javascript">
	
	window.onload = function() {
		// Get participant country from URL (#US, #UK)
		thisURL = window.location.href;
		thisURL = thisURL.slice(-2);
		console.log(thisURL);
		document.cookie = "Country=" + thisURL;
		// Default payments = US
		if (thisURL=="UK") {
			document.getElementById('experiment_payment').innerHTML = '$2.71 (about 2.08 pounds)'; }
	}
</script> 

<?php include('footer.php') ?>