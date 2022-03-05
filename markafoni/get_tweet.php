<?php

include_once("db.php");

$id_str_1 = $id_str_2 = $id_str_3 = $id_str_4 = $id_str_5 = $new_text = "0";

$reg_exUrl = "/(http|https|ftp|ftps)\:\/\/[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(\/\S*)?/";


if(isset($_REQUEST['id_str_1']) AND $_REQUEST['id_str_1'] != "") $id_str_1 = $_REQUEST['id_str_1'];
if(isset($_REQUEST['id_str_2']) AND $_REQUEST['id_str_2'] != "") $id_str_2 = $_REQUEST['id_str_2'];
if(isset($_REQUEST['id_str_3']) AND $_REQUEST['id_str_3'] != "") $id_str_3 = $_REQUEST['id_str_3'];
if(isset($_REQUEST['id_str_4']) AND $_REQUEST['id_str_4'] != "") $id_str_4 = $_REQUEST['id_str_4'];

$sql = "SELECT * FROM tweets WHERE
			campaign_id = '3' AND
			tweet_id NOT IN (
		'".$id_str_1."',
		'".$id_str_2."',
		'".$id_str_3."',
		'".$id_str_4."'
	) AND
			is_active = '1' ORDER BY view_count ASC LIMIT 1";
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



$new_text = preg_replace($reg_exUrl, '', stripslashes($text));

	array_push($JSON["results"],
		array(
			"id_str" => $tweet_id,
			"from_user" => stripslashes($from_user),
			"from_user_name" => stripslashes($from_user_name),
			"profile_image_url" => stripslashes($profile_image_url),
			"created_at" => remainingTime($date_orj),
			"text" => $new_text
		)
	);
	
//	$query2 = "UPDATE tweets SET is_active = ($is_active + 1) WHERE tweet_id = '".$tweet_id."'";
//	$result2 = mysql_query($query2) or die ("Error code 1702 mr_request.php");

	// İstemciye json_encode fonksiyonu ile JSON'a çevirip yollayalım
}
		++$view_count;
		$query = "UPDATE tweets SET view_count = '".$view_count."' WHERE tweet_id = '".$tweet_id."'";
		$result = mysql_query($query) or die (mysql_error()."Error code 1702 mr_request.php");

	echo json_encode($JSON);
}
else
	echo "tweet yok";

?>

