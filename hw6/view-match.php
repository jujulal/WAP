<!-- CSE 190 M, Homework 4 (NerdLuv)
     This provided file searches for the matching name from the singles.txt file
     and the matching result will be displayed -->
<?php include("top.html");

include("db-connection.php");

$name=filter_input(INPUT_GET,"name");
$password = filter_input(INPUT_GET,"password");
$is_member=false;



$stmt = $db->prepare("SELECT * FROM singles WHERE name = :name AND pass = :pass");

$stmt->bindParam(':name', $name);
$stmt->bindParam(':pass', $pass_hash);

$pass_hash = hash("sha256", $password . $name);



try{
if($stmt->execute())
{
    $row = $stmt->fetch();
    if($row['name']==$name){
        $is_member=true;
    }
    
}


$gender =  $row['gender'];
$min = $row['min'];
$max = $row['max'];
$type1 = $row['type1'];
$type2 = $row['type2'];
$type3 = $row['type3'];
$type4 = $row['type4'];


$stmt = $db->prepare("SELECT * FROM singles WHERE gender <> :gender 
AND age >= :min AND age <= :max AND os = :os AND 
(type1 = :type1 OR type2 = :type2 OR type3 = :type3 OR type4 = :type4)");

$stmt->bindParam(':gender',$gender);
$stmt->bindParam(':min', $min);
$stmt->bindParam(':max', $max);
$stmt->bindParam(':os', $row['os']);
$stmt->bindParam(':type1', $type1);
$stmt->bindParam(':type2', $type2);
$stmt->bindParam(':type3', $type3);
$stmt->bindParam(':type4', $type4);


//$persons = $stmt->setFetchMode(PDO::FETCH_ASSOC);
$stmt->execute();
$persons = $stmt->fetch();
//print_r($persons);
// read the file in line

$personality_type1 = $type1 . $type2 . $type3 . $type4;

}catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>

<?php
$matches=array();
if($is_member == true)
{
    foreach($persons as $person)
    {
    	//split the row base on , and populate in the list's respective parameters
    	list($name1,$gender1,$age1,$personality_type1,$favOS1,$min1,$max1)=explode(",",$person);
        //print_r($person);
        if($gender != $gender1 && ($max > $age1 && $min< $age1) &&
         $favOS==$favOS1 && similar_text($personality_type,$personality_type1)>0)
        {
        	
            array_push($matches,$person);
        }
    }
}
?>

<?php
// display all the matched singles
if($matches == null) {
    ?>
    <h1>Matches for <?= $req_name ?> couldn't be found. Sorry!</h1>
    <?php
}else {
    foreach ($matches as $match) {
        list($name1, $gender1, $age1, $personality_type1, $favOS1, $min1, $max1) = explode(",", $match);
        ?>
        <h1>Matches for <?= $name ?></h1>
        <div class="match">
            <p>
                <img src="./images/user.jpg" alt="Image">
                <q>
                    <?= $name1 ?>
                </q>
            </p>
            <ul>
                <li><strong>gender</strong><?= $gender1 ?></li>
                <li><strong>age</strong><?= $age1 ?></li>
                <li><strong>type</strong><?= $personality_type1 ?></li>
                <li><strong>OS</strong><?= $favOS1 ?></li>
            </ul>
        </div>

        <?php
    }
}
?>

<?php include("bottom.html"); ?>