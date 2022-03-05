<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Untitled Document</title>
</head>

<body>

<?php
ini_set("display_errors",1); 

//tweetduvardb
//tweetduvardbuser
//Greytoad64
	

	define("HOST", "205.178.146.102");
	// Database user
	define("DBUSER", "tweetduvardbuser");
	// Database password
	define("PASS", "Greytoad64");
	// Database name
	define("DB", "tweetduvardb");
	/*
	
	define("HOST", "mysql5.sadecehosting.com");
	// Database user
	define("DBUSER", "perseferdbuser");
	// Database password
	define("PASS", "greytoad64");
	// Database name
	define("DB", "perseferdb");
*/
############## Make the mysql connection ###########
$conn = mysql_connect(HOST, DBUSER, PASS) or die (mysql_error().'Could not connect !<br />Please contact the site\'s administrator.');
 
$db = mysql_select_db(DB) or die (mysql_error().'Could not connect to database !<br />Please contact the site\'s administrator.');
mysql_query("SET NAMES utf8");

$query = "SELECT tweet_id FROM tweets
				WHERE 
					tweet_id = '".$_REQUEST['tweet_id']."'
				LIMIT 1";
$result = mysql_query($query) or die("app_list: ".mysql_error());
if(!mysql_num_rows($result))
{	
	
	

		
	
	
	
//	$date = date("Y-m-d H:i:s", strtotime($_REQUEST['date']));
	
	if($_REQUEST['result_type'] == "recent")
		$result_type = 1;
	elseif($_REQUEST['result_type'] == "popular")
		$result_type = 2;
	else
		$result_type = 0;
$is_active = 0;
		
$unwanted = array("fuck","tecavüz","saçma","salak","aptal","gerikalı","amk","orospu");
foreach ($unwanted as $value)
	if (preg_match("/$value/i", $_REQUEST['text']))
		$is_active = 1;
		
	$query = "INSERT INTO tweets (	`tweet_id`,
									`campaign_id`,
									`from_user`,
									`from_user_name`,
									`profile_image_url`,
									`text`,
									`date_orj`,
									`result_type`,
									`is_active`) 
						VALUES (	'".$_REQUEST['tweet_id']."',
									'1',
									'".addslashes($_REQUEST['from_user'])."',
									'".addslashes($_REQUEST['from_user_name'])."',
									'".addslashes($_REQUEST['profile_image_url'])."',
									'".addslashes($_REQUEST['text'])."',
									'".$_REQUEST['date']."',
									'".$result_type."',
									'".$is_active."')";
	$result = mysql_query($query) or die("title details eklenemedi: ".mysql_error());
}
?>

</body>
</html>
