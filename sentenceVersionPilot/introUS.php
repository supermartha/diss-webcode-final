<?php
// Set cookie for participant ID
$rand = uniqid($more_entropy=TRUE) . $_SERVER['REMOTE_ADDR'];;
setcookie("ParticipantID", $rand);
setcookie("Experiment", "sentenceVersionPilot");
setcookie("Country", "US")
?>

<?php include('../headerForSubfolders.php') ?>

<h1> Linguistics Experiment </h1>

<p>You are being invited to participate in an experiment about the perception of British English. In this experiment, you will you will hear some sentences spoken aloud and be asked to give your opinion of people based on their voices. At the end of the experiment, we will ask you a few questions about yourself.</p> 

<p>The experiment will take about <b>[XX] minutes</b>.</p>

<p>You will be paid <b>[$XX]</b> in appreciation for your time.</p>

<div class="smaller">
<p><b>Consent agreement:</b></p>

<p>By clicking the "Begin" button below you agree to participate in this experiment, which is conducted by researchers at The Ohio State University. Participation in this experiment is voluntary. You may skip any question you do not wish to answer. You may withdraw from this experiment at any time without penalty or loss of benefits, including loss or reduction of payment. If you do withdraw from the study before the end, please contact the researchers for information on how to collect payment (austen dot 14 at osu dot edu). By law, payments to participants are considered taxable income. The data collected will be anonymous and confidential.</p>

<p>If you have any questions, you may contact the requester through the Prolific Academic platform, or directly by emailing Martha Austen at austen dot 14 at osu dot edu. For questions about your rights as a participant in this study or to discuss other study-related concerns or complaints with someone who is not part of the research team, you may contact Ms. Sandra Meadows in the Ohio State University Office of Responsible Research Practices at 1-800-678-6251.</p>
</div>


<a href="sound_check.php">
<div class="button"> Begin </div> 
</a>

<?php include('../footer.php') ?>