<!DOCTYPE html>
<html><head>
<meta http-equiv="content-type" content="text/html; charset=windows-1252">
		<title>Buy Your Way to a Better Education!</title>
		<link href="sucker_files/buyagrade.css" type="text/css" rel="stylesheet">
	</head>

	<body>

		<?php 
			//Luhn algorithm implementation function
			//$num = 'abc';
			//echo "Lun valid Number:" . $num; 
			//echo "<<================================>>";
			function validLuhn($number) {
				for ($sum = 0, $i = strlen($number) - 1; $i >= 0; $i--) {
					$digit = (int) $number[$i];
					$sum += (($i % 2) === 0) ? array_sum(str_split($digit * 2)) : $digit;
				}
				return (($sum % 10) === 0);
			}
			
			//echo "Output: ". validLuhn($num);
			//end of function
			
			if($_POST['name'] == "" OR $_POST['section'] == "" OR $_POST['creditcardno']==""){
				
		
			echo '<h1>Sorry!</h1>';
			
			echo "<p>You didn't fill out form completely. <a href='buyagrade.html'>Try Again?</a></p>";
			
		 
			}
			elseif(strlen(trim($_POST['creditcardno']))<>16){
					echo '<h1>Sorry!</h1>';
			
					echo "<p>You didn't provide a valid credit card number. <a href='buyagrade.html'>Try Again?</a></p>";
			}
			elseif(((substr($_POST['creditcardno'],0,1)==4 AND $_POST['cardType']=='Visa')) OR (substr($_POST['creditcardno'],0,1)==5 AND $_POST['cardType']=='Master')){
					echo '<h1>Sorry!</h1>';
			
					echo "<p>You didn't provide a valid credit card number. <a href='buyagrade.html'>Try Again?</a></p>";
			}
			elseif(validLuhn($_POST['creditcardno'])<>1){
					echo '<h1>Sorry!</h1>';
			
					echo "<p>You didn't provide a valid credit card number. <a href='buyagrade.html'>Try Again?</a></p>";
			} 
			else { 
		
			echo '<h1>Thanks, sucker!</h1>';

			echo '<p>Your information has been recorded.</p>';
			echo '<dl>
			<dt>Name</dt>
			<dd>' . $_POST['name'] . '</dd>';

			echo '<dt>Section</dt>
			<dd>' . $_POST['section'] .'</dd>';

			echo '<dt>Credit Card</dt>
			<dd>' . $_POST['creditcardno'] . " (" . $_POST['cardType'] . ") </dd>
			</dl>";
		
		
		
		$value = $_POST['name'] . ';' . $_POST['section'] . ';' .$_POST['creditcardno'] . " (" . $_POST['cardType'] . ");<br>";
			file_put_contents("sucker.txt",$value, FILE_APPEND);
		
		echo '<div>
		<p>Here are all the suckers who have submitted herer: </p>'
			. file_get_contents("sucker.txt") .
		'<div>';
		
			}
		?>
  </body></html>