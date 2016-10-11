<!DOCTYPE html>
<html><!--
	Web Programming Step by Step
	Lab #3, PHP
	--><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<title>Music Viewer</title>
		<meta charset="utf-8">
		<link href="Music%20Viewer_files/viewer.css" type="text/css" rel="stylesheet">
	</head>

	<body>
		
		<h1>My Music Page</h1>
		
		<!-- Exercise 1: Number of Songs (Variables) -->
		<?php 
			$numberofSongs =1234; 
			$hours = 345;
		?>
		<p>
			I love music.
			I have <?php echo $numberofSongs; ?> total songs,
			which is over <?php echo $hours;  ?> hours of music!
		</p>

		<!-- Exercise 2: Top Music News (Loops) -->
		<!-- Exercise 3: Query Variable -->
		<div class="section">
			
			<h2>Yahoo! Top Music News</h2>
		
			<ol>
			<?php for($i=1;$i < 6;$i++){
				echo "<li><a href='http://music.yahoo.com/news/archive/$i.html'>Page $i</a></li>";
			}
			?>
			</ol>
		</div>

		<!-- Exercise 4: Favorite Artists (Arrays) -->
		<!-- Exercise 5: Favorite Artists from a File (Files) -->
		<div class="section">
			<?php 
				$artistList = array("Britney Spears","Christina Aguilera","Justin Bieber");
			?>
			<h2>My Favorite Artists</h2>
		
			<ol>
		<?php 
		$artists = array('Ariana Grande'=>'https://www.youtube.com/results?search_query=ariana+grande','Laura Marano'=>'https://www.youtube.com/results?search_query=laura+marano','Justin Bieber'=>'https://www.youtube.com/results?search_query=justin+bieber');
		foreach($artists as $key => $value) {
			echo '<li><a href="'.$value.'" target="_blank">'.$key.'</a></li>';
		}
		?>
	</ol>
		</div>
		
		<!-- Exercise 6: Music (Multiple Files) -->
		<!-- Exercise 7: MP3 Formatting -->
		<div class="section">
			<h2>My Music and Playlists</h2>

			
			<ul id="musiclist">
			
			
			<?php 
			
				$handle = glob('../resources/music/*.mp3');
					
					foreach($handle as $file){
						$ps = strripos($file,"/");	
					
						echo "<li class='mp3item'><a href='". $file ."'>" .substr($file,$ps+1) . "</a></li>";
					}
					
				//closedir($handle);
				
			
			?>
			
	

				<!-- Exercise 8: Playlists (Files) -->
				<li class="playlistitem">472-mix.m3u:
					<ul>
						<?php 
								$handle = fopen('../resources/music/472-mix.m3u',"r");
								if($handle){
									while(($line = fgets($handle))!==false){
										print("<li><a href='../resources/music/$line'>$line</a></li>");
									}
								}
							
							?>
					</ul>
				
	
				</li>
			</ul>
		</div>

		<div>
			<a href="http://validator.w3.org/check/referer">
				<img src="Music%20Viewer_files/w3c-html.png" alt="Valid HTML5">
			</a>
			<a href="http://jigsaw.w3.org/css-validator/check/referer">
				<img src="Music%20Viewer_files/w3c-css.png" alt="Valid CSS">
			</a>
		</div>
	


</body></html>