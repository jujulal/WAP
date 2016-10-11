<?php session_start();?>
<!-- CSE 190 M, Homework 4 (NerdLuv)
     This provided file searches for the matching name from the database
     and the matching result will be displayed -->
<?php include("top.html");

include("db-connection.php");

$req_name=filter_input(INPUT_POST,"name");
$password = filter_input(INPUT_POST,"password");

$pass_hash = hash("sha256", $password . $req_name);
//generating query
$myQuery = $db->prepare("SELECT * FROM singles WHERE name = :name AND pass = :pass");
//setting query parameter
$myQuery->bindParam(':name', $req_name);
$myQuery->bindParam(':pass', $pass_hash);


try{
	
	$myQuery->execute();	
	if($myQuery->rowCount() == 1 ){
		
		//get row of user detail
		$member_detail = $myQuery->fetch();
		
		// set username
		$_SESSION["username"] = $member_detail['name'];
		// get all the matching member list from the function
		// get_matches is a funtion in db-connection.php
		$_SESSION["matches"] = get_matches($member_detail['name'],$db);
		header("location: view-match.php");

	}else {
		
		header("Location: login.php?error=Invalid username or password");
	}

}catch(PDOException $error) {
    echo "Error: " . $error->getMessage();
}
?>
