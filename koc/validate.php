<?php
ini_set("display_errors",1); 

	define("HOST", "205.178.146.102");
	// Database user
	define("DBUSER", "tweetduvardbuser");
	// Database password
	define("PASS", "***");
	// Database name
	define("DB", "tweetduvardb");
	/*
	
	define("HOST", "mysql5.sadecehosting.com");
	// Database user
	define("DBUSER", "perseferdbuser");
	// Database password
	define("PASS", "***");
	// Database name
	define("DB", "perseferdb");
*/
############## Make the mysql connection ###########
$conn = mysql_connect(HOST, DBUSER, PASS) or die (mysql_error().'Could not connect !<br />Please contact the site\'s administrator.');
 
$db = mysql_select_db(DB) or die (mysql_error().'Could not connect to database !<br />Please contact the site\'s administrator.');
mysql_query("SET NAMES utf8");

		$query2 = "UPDATE tweets 
						SET 
							is_active = '".$_REQUEST['val']."'
						WHERE
							tweet_id = '".$_REQUEST['tweet_id']."' ";
							
		$result2 = mysql_query($query2) or die ("Error code 1702 mr_request.php".mysql_error());
		if($result2) echo "Updated"; else echo "Error";
/*	
	$query = "INSERT INTO tweets (	tweet_id,
									from_user,
									from_user_name,
									profile_image_url,
									`text`,
									`date`,
									result_type) 
						VALUES (	'".$_REQUEST['tweet_id']."',
									'".addslashes($_REQUEST['from_user'])."',
									'".addslashes($_REQUEST['from_user_name'])."',
									'".addslashes($_REQUEST['profile_image_url'])."',
									'".addslashes($_REQUEST['text'])."',
									'".$date."',
									'".$result_type."')";
	$result = mysql_query($query) or die("title details eklenemedi: ".mysql_error());
*/
?>

</body>
</html>
