<?php 
session_start();
include("top.html"); 

?>

<div>
	<h1>Thank you!</h1>

        <p>
            Welcome to NerdLuv, <?=$_SESSION['username'];?>!<br>
            Now, <a href="view-match.php">continue on to see your matches!</a></p>
	
</div>

<?php include("bottom.html"); ?>