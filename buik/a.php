<?php
include_once("db.php");

$query = "SELECT tweet_id FROM tweets
				WHERE 
					tweet_id = '".$_REQUEST['tweet_id']."'
				LIMIT 1";
$result = mysql_query($query) or die("Error: 8 - a.php: ".mysql_error());
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
									`is_active`) 
						VALUES (	'".$_REQUEST['tweet_id']."',
									'1',
									'".addslashes($_REQUEST['from_user'])."',
									'".addslashes($_REQUEST['from_user_name'])."',
									'".addslashes($_REQUEST['profile_image_url'])."',
									'".addslashes($_REQUEST['text'])."',
									'".$_REQUEST['date']."',
									'".$is_active."')";
	$result = mysql_query($query) or die("Error: 49 - a.php: ".mysql_error());
}
?>
