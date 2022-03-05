<?php
include_once("db.php");

		$query2 = "UPDATE tweets 
						SET 
							is_active = '".$_REQUEST['val']."'
						WHERE
							tweet_id = '".$_REQUEST['tweet_id']."' LIMIT 1";
							
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