<!-- CSE 190 M, Homework 4 (NerdLuv)
     This provided file searches for the matching name from the singles.txt file
     and the matching result will be displayed -->
<?php include("top.html");

$req_name=filter_input(INPUT_GET,"name");
$is_member=false;
$persons = file("singles.txt");
// read the file in line
foreach($persons as $person){
	//split the row base on , and populate in the list's respective parameters
    list($name,$gender,$age,$personality_type,$favOS,$min,$max)=explode(",",$person);
    //check if the searched name is already member
    if($req_name == $name){
    	
        $is_member=true;
        break;
    }
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