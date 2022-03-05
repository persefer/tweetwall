<?php

	define("HOST", "mysql51.sadecehosting.com:3306");
	// Database user
	define("DBUSER", "mnvdbuser");
	// Database password
	define("PASS", "greytoad64");
	// Database name
	define("DB", "mnvdb");

$conn = mysql_connect(HOST, DBUSER, PASS) or die (mysql_error().'Error 35: Could not connect !<br />Please contact the site\'s administrator.');
 
$db = mysql_select_db(DB) or die (mysql_error().'Error 37: Could not connect to database !<br />Please contact the site\'s administrator.');
mysql_query("SET NAMES utf8");
mysql_set_charset('utf8',$conn);

$speaker_1=$speaker_2=$speaker_3=$speaker_4=$hashtag_1 = $hashtag_2 = $hashtag_3 = $hashtag_4=$title=$campaign_id="";

if(isset($_REQUEST['campaign_id']) AND  $_REQUEST['campaign_id'] > 0)
	$campaign_id = $_REQUEST['campaign_id'];

	$sql = "SELECT * FROM campaigns where campaign_id = '".$campaign_id."' ";
	$result = mysql_query($sql) or die("Error code 93269591".mysql_error());
	if(mysql_num_rows($result)) {
		$row = mysql_fetch_array($result);
		extract($row);
	}
	echo $title;
	echo $speaker_1;
	echo $speaker_2;

?>
