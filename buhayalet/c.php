<?php
ini_set("display_errors",1); 

/*
	define("HOST", "localhost");
	// Database user
	define("DBUSER", "persefer");
	// Database password
	define("PASS", "***");
	// Database name
	define("DB", "istiyorum");
	*/
	
	define("HOST", "205.178.146.102");
	// Database user
	define("DBUSER", "tweetduvardbuser");
	// Database password
	define("PASS", "****");
	// Database name
	define("DB", "tweetduvardb");

############## Make the mysql connection ###########
$conn = mysql_connect(HOST, DBUSER, PASS) or die (mysql_error().'Could not connect !<br />Please contact the site\'s administrator.');
 
$db = mysql_select_db(DB) or die (mysql_error().'Could not connect to database !<br />Please contact the site\'s administrator.');
mysql_query("SET NAMES utf8");





if(isset($_REQUEST['id']) AND $_REQUEST['id'] != "")
$sql = "SELECT * FROM tweets WHERE id= '".$_REQUEST['id']."' ";
else
$sql = "SELECT * FROM tweets WHERE is_active= 0 ";


$sql .= " ORDER BY id ASC LIMIT 1";

$result = mysql_query($sql) or die("Error code 93269591".mysql_error());
$JSON["results"]=array();
while ($row = mysql_fetch_array($result) )
{
	extract($row);
	// Diziye veriyi diziler halinde  girelim
	array_push($JSON["results"],
		array(
			"id_str" => $tweet_id,
			"from_user" => stripslashes($from_user),
			"from_user_name" => stripslashes($from_user_name),
			"profile_image_url" => stripslashes($profile_image_url),
			"created_at" => stripslashes($date_orj),
			"text" => stripslashes($text)
		)
	);
	
	$query2 = "UPDATE tweets SET is_active = 1 WHERE tweet_id = '".$tweet_id."'";
	$result2 = mysql_query($query2) or die ("Error code 1702 mr_request.php");

	// İstemciye json_encode fonksiyonu ile JSON'a çevirip yollayalım
}
	echo json_encode($JSON);
?>

