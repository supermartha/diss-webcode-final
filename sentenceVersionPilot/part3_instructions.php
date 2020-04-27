<?php include('../headerForSubfolders.php'); ?>

<script>
  window.onload = function() {
    // Get cookie for whether it's a US or UK participant
    participantCountry = getCookie('Country');
    console.log(participantCountry);
    if (participantCountry=='US') {redirectURL = '../familiarity.php'}
    else {redirectURL = '../demographicsUK.php'}
    document.getElementById('link').href = redirectURL;

  }
</script>

<h1>Part 3 of 3</h1>
<h2>Instructions</h2>

<p>Finally, we have a few questions about yourself.</p>

<a href="../familiarity.php" id="link">
<div class="button"> Next >> </div> 
</a>

<?php include('../footer.php') ?>