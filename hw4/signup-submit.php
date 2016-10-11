<!-- CSE 190 M, Homework 4 (NerdLuv)
     This provided file is to handle all the input submited by signup.php page -->
<?php 
$name =  filter_input(INPUT_POST, "name");
$gender =  filter_input(INPUT_POST, "gender");
$age =  filter_input(INPUT_POST, "age");
$personality_type =  filter_input(INPUT_POST, "personality");
$favOS =  filter_input(INPUT_POST, "favOS");
$min =  filter_input(INPUT_POST, "min");
$max = filter_input(INPUT_POST, "max");

//concatinate all the input value in the linear data
$info = "$name,$gender,$age,$personality_type,$favOS,$min,$max\n";

//save the data in the file singles.txt
file_put_contents("singles.txt", $info,FILE_APPEND);

//redirect the page to the result.php with parameter name
header("location: result.php?name=".$name);
die();
?>
