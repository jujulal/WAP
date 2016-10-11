<?php session_start();?>
<!-- CSE 190 M, Homework 4 (NerdLuv)
     This provided file searches for the matching name from the database
     and the matching result will be displayed -->
<?php include("top.html");

include("db-connection.php");

if(!isset($_SESSION['username'])):
 header("Location: login.php?error=Please login first");

else:
	//print_r($member_detail);
	$req_name = $_SESSION['username'];
	$matches = $_SESSION['matches'];

	
	// display all the matched singles
	if(count($matches) <= 0) {
	    ?>
	    <h1>Matches for <?= $req_name ?> couldn't be found. Sorry!</h1>
	    <?php
	}else {
		$match_no = filter_input(INPUT_GET, "match");
		$match_no = is_numeric($match_no)? $match_no: 0;
		
		$count = count($matches);
		$row = $matches[$match_no]; 
		
		// create html link for the Next and Previous Match
		$prevoius_link = $match_no == 0 ? "Previous Match" : "<a href='view-match.php?match=".($match_no-1)."'>Previous Match</a>";
		$next_link = $match_no == ($count-1) ? "Next Match" : "<a href='view-match.php?match=".($match_no+1)."'>Next Match</a>";
		
		if($count > $match_no){
	        
?>
	        <h1>Matches for <?= $req_name ?> &nbsp;&nbsp;&nbsp;&nbsp;<a href="logout.php">Logout</a></h1>
	        <div class="match">
	            <p>
	                <img src="./images/user.jpg" alt="Image">
	                <q>
	                    <?= $row['name'] ?>
	                </q>
	            </p>
	            <ul>
	                <li><strong>gender</strong><?= $row['gender'] ?></li>
	                <li><strong>age</strong><?= $row['age'] ?></li>
	                <li><strong>type</strong><?= $row['type1'] ?></li>
	                <li><strong>OS</strong><?= $row['os'] ?></li>
	            </ul>
	        </div>
			
	<?php
		 echo "<p>".$prevoius_link."&nbsp;|&nbsp;".$next_link."</p>";
		}
	    ?>
	    
	    <?php 
	}
endif;

?>
<br><br>
<?php include("bottom.html"); ?>

