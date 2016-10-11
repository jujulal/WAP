<!DOCTYPE html>
<html>
	<head>
		<title>TMNT - Rancid Tomatoes</title>
		<link rel="shortcut icon" type="image/gif" href="images/rotten.gif"/>
		<meta charset="utf-8" />
		<link href="movie.css" type="text/css" rel="stylesheet" />
	</head>

	<body>
	<?php 
				if(isset($_GET["film"])){
				$movie = $_GET["film"];
				}
				else{
					$movie = "tmnt";
				}

				$info = fopen($movie.'/info.txt',"r");
					$title = fgets($info);
					$year = fgets($info);
					$rating = fgets($info);
						
					
	?>
			
		<div id="banner">
			<img src="images/banner.png" alt="Rancid Tomatoes" />
		</div>
			
		
		<h1><?php echo "$title ($year)";?></h1>
		<div id="mainContainer">
		<div id="leftContainer">
		<div>
			<img src="<?php echo "$movie/overview.png"; ?>" alt="general overview" />
		</div>
		
		
        <div id="textList">
			<?php 
				$overview = fopen($movie.'/overview.txt',"r");
				if(!is_null($movie)){
					
				}
			?>
		<dl>
			<?php
			while($title = fgets($overview)){
				
				echo "<dt>". substr($title, 0,stripos($title,":")) . "</dt>";

				echo "<dd>". str_ireplace(",","<br>",substr($title,stripos($title,":")+1)) . "</dd>";
			}
				
			?>



			<dt>LINKS</dt>
			<dd>
				<ul id="linkBullet">
					<li><a href="http://www.ninjaturtles.com/">The Official TMNT Site</a></li>
					<li><a href="http://www.rottentomatoes.com/m/teenage_mutant_ninja_turtles/">RT Review</a></li>
					<li><a href="http://www.rottentomatoes.com/">RT Home</a></li>
					<li><a href="http://mumstudents.org/cs472/">CS472</a></li>
				</ul>
			</dd>
		</dl>
		</div>
</div>

<!--// movie review -->

<div id="rightContainer">
		<div id="innerBanner">
			 <img src="images/rottenbig.png" alt="Rotten" />
			<span id="num"><?php echo "$rating%"; ?></span>
		</div>
		
		
		<?php 

	$reviews = glob($movie . '/review*.txt');
	$reviewCount = count($reviews);
	

?> 
		<div id="leftCol">
		<?php  
			$i=0;
			foreach($reviews as $review){
				$i++;

			
				if($i <= $reviewCount/2){
				
				$reviewText = fopen($review, "r");
				if($reviewText){
					echo '
							<p class="review">
							<img src="images/rotten.gif" alt="Rotten"  class="imageTop"/>
						';
					echo  '<q>' . fgets($reviewText) . '</q>';
					echo '</p>'; 
					echo '<p class="rev">';
					echo '<img src="images/critic.gif" alt="Critic" />'; 
					echo fgets($reviewText). '<br/>'; 
					echo '<span class="italics">'. fgets($reviewText) . '</span></p>'; 
					}
					
					//echo '</q></p>';
				}
				
			
		?>
</div>

<div id="rightCol">
	<?php 
		if($i <= $reviewCount/2){
				
				$reviewText = fopen($review, "r");
				if($reviewText){
					echo '
							<p class="review">
							<img src="images/rotten.gif" alt="Rotten"  class="imageTop"/>
						';
					echo  '<q>' . fgets($reviewText) . '</q>';
					echo '</p>'; 
					echo '<p class="rev">';
					echo '<img src="images/critic.gif" alt="Critic" />'; 
					echo fgets($reviewText). '<br/>'; 
					echo '<span class="italics">'. fgets($reviewText) . '</span></p>'; 
					}
					
					//echo '</q></p>';
				}
	}

	?>

</div>
		

		</div>
		<p id="bottomtext">(1-10) of 88</p>
		</div>
		<div id="link">
			<a href="http://validator.w3.org/check/referer"><img src="images/w3c-html.png" alt="Valid HTML5" /></a> <br />
			<a href="http://jigsaw.w3.org/css-validator/check/referer"><img src="images/w3c-css.png" alt="Valid CSS" /></a>
		</div>
		
	</body>
</html>
