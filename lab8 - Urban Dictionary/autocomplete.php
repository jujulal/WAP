
<?php
$word =$_POST['words'].'%';

$db =  new PDO("mysql:dbname=dictionary;host=localhost", "BigWords", "Rconfusing");
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$matchlist = $db->prepare("SELECT word FROM entries WHERE word like :word order by wordtype limit 5");

$matchlist->execute(array(":word" => $word));
$result = $matchlist->fetchAll();
//echo $ret = json_encode($result);


foreach ($result as $rs) {
	
	$dic_word = str_replace($_POST['words'], '<b>'.$_POST['words'].'</b>', $rs['word']);
    echo '<li onclick="set_item(\''.str_replace("'", "\'", $rs['word']).'\')">'.$dic_word.'</li>';
}
    
?>


