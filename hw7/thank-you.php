<?php session_start();
include("top.html");?>
<strong>Thank you!</strong>
<p>Welcome to NerdLuv, <?= $_SESSION['username']; ?>!</p>
<p>Now <a href="view-match.php">continue on to see your matches</a></p>
<?php
include("bottom.html");
?>