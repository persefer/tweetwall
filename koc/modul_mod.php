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
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

</head>

<body>
<?php

if(isset($_REQUEST['id']) AND $_REQUEST['id'] != "") $id = $_REQUEST['id']; else $id = 0;
$query = "SELECT * FROM tweets
				WHERE 
					(campaign_id = '1' AND is_active > '0' AND id > '".$id."' AND moderator < '1') ORDER BY id ASC LIMIT 1";
$result = mysql_query($query) or die("app_list: ".mysql_error());
if(mysql_num_rows($result))
{
	$row = mysql_fetch_array($result);
	extract($row);
	echo "<div class=\"tweet\"><img src=\"".$profile_image_url."\" align=\"left\" style=\"margin-right:10px;\"><b>".$from_user_name.":</b> ".stripslashes($text)."</div>";

	$query2 = "UPDATE tweets SET moderator = 1 WHERE id = '".$id."'";
	$result2 = mysql_query($query2) or die ("Error code 1702 mr_request.php".mysql_error());

}



?>
</body>
</html>