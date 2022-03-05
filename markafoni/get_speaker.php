<?php

include_once("db.php");

$sql = "SELECT * FROM campaigns WHERE campaign_id = '1' LIMIT 1";
$result = mysql_query($sql) or die("Error code 93269591".mysql_error());
	//	if($result) echo "---------0------";

if(mysql_num_rows($result))
{

$JSON["results"]=array();
while ($row = mysql_fetch_array($result) )
{
	extract($row);
//	echo "<br>is_active".$is_active."<br>";
	// Diziye veriyi diziler halinde  girelim
	array_push($JSON["results"],
		array(
			"title" => $title,
			"speaker_1" => stripslashes($speaker_1),
			"speaker_2" => stripslashes($speaker_2),
			"speaker_3" => stripslashes($speaker_3),
			"speaker_4" => stripslashes($speaker_4)
		)
	);
	
//	$query2 = "UPDATE tweets SET is_active = ($is_active + 1) WHERE tweet_id = '".$tweet_id."'";
//	$result2 = mysql_query($query2) or die ("Error code 1702 mr_request.php");

	// İstemciye json_encode fonksiyonu ile JSON'a çevirip yollayalım
}
	echo json_encode($JSON);
}
else
	echo "tweet yok";
?>

