<?php

if($_SERVER['SERVER_NAME']=='localhost'){
	$db = new PDO("mysql:dbname=nerdluv", "root", "");
}else {
	$db = new PDO("mysql:dbname=nerdluv;host=localhost", "match-maker", "meant2B");
}


$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

function get_matches($name, $db)
{
	$matching_list = array();
	
	//get the user detail
	$query_detail = $db->prepare("SELECT * FROM singles WHERE name = :name");
	$query_detail->bindParam(':name', $name);
	$query_detail->execute();
	$member_detail = $query_detail->fetch();
	
	if($query_detail->rowCount() == 1 ){
		
		
		// get the matchings
		$query_matching = $db->prepare("SELECT * FROM singles WHERE gender <> :gender
		 AND age >= :min AND age <= :max AND os = :os AND
		 (type1 = :type1 OR type2 = :type2 OR type3 = :type3 OR type4 = :type4)
				");
		// binding the datas query
		$query_matching->bindParam(':gender', $member_detail['gender']);
		$query_matching->bindParam(':min', $member_detail['min']);
		$query_matching->bindParam(':max', $member_detail['max']);
		$query_matching->bindParam(':os', $member_detail['os']);
		$query_matching->bindParam(':type1', $member_detail['type1']);
		$query_matching->bindParam(':type2', $member_detail['type2']);
		$query_matching->bindParam(':type3', $member_detail['type3']);
		$query_matching->bindParam(':type4', $member_detail['type4']);
		
		$query_matching->execute();
		//prepare the db data rows into array
		foreach ($query_matching as $row) {
			$temp_array = array();
			$temp_array['name'] = $row['name'];
			$temp_array['gender'] = $row['gender'];
			$temp_array['age'] = $row['age'];
			$temp_array['os'] = $row['os'];
			$temp_array['type1'] = $row['type1'];
			$temp_array['type2'] = $row['type2'];
			$temp_array['type3'] = $row['type3'];
			$temp_array['type4'] = $row['type4'];
			array_push($matching_list,$temp_array);
		}
	}
	return $matching_list;
	
}
?>