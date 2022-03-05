<?php

include_once("db.php");

if(isset($_REQUEST['id_str_1']) AND $_REQUEST['id_str_1'] != "") $id_str_1 = $_REQUEST['id_str_1'];
else $id_str_1 = 0;

$sql = "SELECT * FROM tweets WHERE id > ".$id_str_1." AND is_active = 1 AND campaign_id = 6 ORDER BY id ASC LIMIT 1";

$result = mysql_query($sql) or die("Error code 93269591".mysql_error());
	//	if($result) echo "---------0------";
if(mysql_num_rows($result))
{

	$JSON["results"]=array();
	while ($row = mysql_fetch_array($result) )
	{
		extract($row);

	}

}
else
{
	die("yok");
	$sql = "SELECT * FROM tweets WHERE id > '0' AND is_active = '1' AND campaign_id = '6'  ORDER BY id ASC LIMIT 1";
	$result = mysql_query($sql) or die("Error code 93269591".mysql_error());
	if(mysql_num_rows($result))
	{

		$JSON["results"]=array();
		while ($row = mysql_fetch_array($result) )
		{
			extract($row);
		//	echo "<br>is_active".$is_active."<br>";
			// Diziye veriyi diziler halinde  girelim
		}

	}
}

			if(date("H", time()) - date("H", strtotime($date_orj)) >= 200 )
			{
				$query2 = "UPDATE tweets 
								SET 
									is_active = '0'
								WHERE
									tweet_id = '".$tweet_id."' ";
									
				$result2 = mysql_query($query2) or die ("Error code 1702 mr_request.php".mysql_error());

				array_push($JSON["results"],
					array(
						"id_str" => $id,
						"from_user" => stripslashes($from_user),
						"from_user_name" => stripslashes($from_user_name),
						"profile_image_url" => stripslashes($profile_image_url),
						"created_at" => stripslashes($date_orj),
						"text" => stripslashes($text),
						"delete" => 1
					)
				);
			}	
			else
			{
				array_push($JSON["results"],
					array(
						"id_str" => $id,
						"from_user" => stripslashes($from_user),
						"from_user_name" => stripslashes($from_user_name),
						"profile_image_url" => stripslashes($profile_image_url),
						"created_at" => stripslashes($date_orj),
						"text" => stripslashes($text),
						"delete" => 0
					)
				);				
			}		


	echo json_encode($JSON);



?>