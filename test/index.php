
<!doctype html>
<html>
	<head>
	<style type="text/css">
		#main{
			font-family: verdana,arial;
		}

		#main  > div { 
			background-color: yellow;
		 }

		 #banner > div{
		 	
		 }
		 #nav ul {
		 	
		 }
		 #nav ol{
		 	
		 }
	</style>
</head>
<body>

	<div id="main">
		<div id="banner">
			<p>Welcome Banner</p>
			<div><img src="" alt="Logo Image"></div>
		</div>
		<div id="nav">
			<ul>
				<ol>Home</ol>
				<ol>Page1</ol>
				<ol>Page2</ol>
				<ol>Page3</ol>
			</ul>
		</div>
		<div id="content">
			<?php 

				$content = file("file.txt");
				foreach($content as $line){
					print ("$line<br>");
				}
			?>
		</div>
	</div>
<?php 
	$arr=array("ram","hari","shyam");
	if(in_array("hari",$arr))
		print("Yes found <br>");

?>

	<?php 

	echo "Fibonaaci numbers <br>";

	$first=0;
	$second=1;
	for($i=1;$i<=20;$i++){
		print("$first,<br/>");
		$tmp =$second;
		$second+=$first;
		$first=$tmp;
	}
	?>

</body>
</html>