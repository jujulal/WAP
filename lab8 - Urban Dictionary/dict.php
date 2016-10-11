<?php


$word = $_POST['search'];

//$db = new PDO("mysql:dbname=entries;host=localhost", "root", "");
$db =  new PDO("mysql:dbname=dictionary;host=localhost", "BigWords", "Rconfusing");
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$matchlist = $db->prepare("SELECT * FROM entries WHERE word = :word order by wordtype");
$matchlist->execute(array(":word" => $word));
$result = $matchlist->fetchAll();
echo $ret = json_encode($result);
?>