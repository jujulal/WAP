<!DOCTYPE html>
<html>
	<!-- This is a test page that you can use to make sure you're able to
	     perform queries in MySQL properly on the server. -->
	
	<head>
		<title>CS472 Database Query Test</title>
	</head>

	<body>
		<ul>
			<?php
			# connect to the imdb_small database
			//$db = new PDO("mysql:dbname=imdb", "traveler", "packmybags");
			$db = new PDO("mysql:dbname=imdb", "root", "");
			$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			# query the database to see the movie names
			//$rows = $db->prepare("SELECT name FROM movies WHERE year = 2000");
			$rows = $db->prepare("select first_name, last_name from actors inner join roles on actors.id = roles.actor_id where roles.movie_id in (select id from movies where name like 'Kill Bill%')");
			$rows->execute();
			foreach ($rows as $row) {
				?>

				<p> <?= $row[0] ?> </p>

				<?php
			}
			?>
		</ul>
	</body>
</html>
