<?php 
session_start();
?>
<!-- CSE 190 M, Homework 4 (NerdLuv)
     This provided file is to handle all the input submited by signup.php page -->
<?php 
include("db-connection.php");

$stmt = $db->prepare("INSERT INTO singles VALUES(NULL, :name, :pass, :gender, :age, :type1, :type2, :type3, :type4, :os, :min, :max)");

$stmt->bindParam(':name', $name);
$stmt->bindParam(':pass', $pass_hash);
$stmt->bindParam(':gender', $gender);
$stmt->bindParam(':age', $age);
$stmt->bindParam(':type1', $type1);
$stmt->bindParam(':type2', $type2);
$stmt->bindParam(':type3', $type3);
$stmt->bindParam(':type4', $type4);
$stmt->bindParam(':os', $favOS);
$stmt->bindParam(':min', $min);
$stmt->bindParam(':max', $max);



$name =  filter_input(INPUT_POST, "name");
$password = filter_input(INPUT_POST,"password");
$gender =  filter_input(INPUT_POST, "gender");
$age =  filter_input(INPUT_POST, "age");
$personality_type =  filter_input(INPUT_POST, "personality");
$favOS =  filter_input(INPUT_POST, "favOS");
$min =  filter_input(INPUT_POST, "min");
$max = filter_input(INPUT_POST, "max");

$type1 = substr($personality_type,0,1);
$type2 = substr($personality_type,1,1);
$type3 = substr($personality_type,2,1);
$type4 = substr($personality_type,3,1);

$pass_hash = hash("sha256", $password . $name);
//concatinate all the input value in the linear data

$stmt->execute();

// set username
$_SESSION["username"] = $name;
// get all the matching member list from the function
// get_matches is a funtion in db-connection.php
$_SESSION["matches"] = get_matches($name,$db);

//redirect the page to the result.php with parameter name
header("location: thank-you.php?name=".$name);
die();
?>
