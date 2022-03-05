<?php

include_once("db.php");

$reg_exUrl = "/(http|https|ftp|ftps)\:\/\/[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(\/\S*)?/";

$JSON["results"]=array();

function getFoursquareCheckins($venue_id)
{
	$url = "https://api.foursquare.com/v2/venues/".$venue_id."/herenow?oauth_token=SHYVI01HWSHCWXQJB5HL3NAWW0E4ZELLJTDS0CE3CEGSXDKU&v=".date("Ymd");
	
    $ch = curl_init();  
    curl_setopt($ch, CURLOPT_POST, false); //POST Metodu kullanarak verileri gönder  
    curl_setopt($ch, CURLOPT_HEADER, false); //Serverdan gelen Header bilgilerini önemseme.  
    curl_setopt($ch, CURLOPT_URL, $url); //Bağlanacağı URL  
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); //Transfer sonuçlarını return et. Onları kullanacağım!  
    curl_setopt($ch, CURLOPT_TIMEOUT, 10); //20 saniyede işini bitiremezsen timeout ol.  
    $data = curl_exec($ch);  

    curl_close($ch);  

	$json = json_decode($data);
	if($json->response->hereNow->count)
	{
		foreach($json->response->hereNow->items as $value)
			setFoursquareCheckins($value,$venue_id);
		return $json->response->hereNow->count;
	}
	else
		return 0;
}

function setFoursquareCheckins($value,$venue_id)
{
//	echo $value->user->id."<br>";
	if(!checkFoursquareCheckin($value))
	{
		$query = "INSERT INTO foursquare_checkins (`foursquare_user_id`,
										`checkin_id`,
										`checkin_time`,
										`venue_id`
										) 
								VALUES ('".$value->user->id."',
										'".$value->id."',
										'".$value->createdAt."',
										'".$venue_id."'
										)";
		$result = mysql_query($query) or die("Error: setFoursquareCheckins() : ".mysql_error());

		setFoursquareUserDetails($value);
	}
}

function checkFoursquareCheckin($value)
{
	$sql = "SELECT * FROM foursquare_checkins WHERE checkin_id = '".$value->id."' LIMIT 1";
	$result = mysql_query($sql) or die("Error: checkFoursquareUser() : ".mysql_error());
	if(mysql_num_rows($result))
		return TRUE;
	else
		return FALSE;
}

function setFoursquareUserDetails($value)
{
	if(!checkFoursquareUser($value))
	{
		$query = "INSERT INTO foursquare_users (`foursquare_user_id`,
												`firstName`,
												`lastName`,
												`gender`,
												`foursquare_image_url`
												)
								VALUES ('".$value->user->id."',
										'".addslashes($value->user->firstName)."',
										'".addslashes($value->user->lastName)."',
										'".$value->user->gender."',
										'".$value->user->photo->suffix."'
										)";
		$result = mysql_query($query) or die("Error: function setFoursquareUserDetails() : ".mysql_error());
	}
}

function checkFoursquareUser($value)
{
	$sql = "SELECT * FROM foursquare_users WHERE foursquare_user_id = '".$value->user->id."' LIMIT 1";
	$result = mysql_query($sql) or die("Error: checkFoursquareUser() : ".mysql_error());
	if(mysql_num_rows($result))
		return TRUE;
	else
		return FALSE;
}


//$venue_id = addslashes($_REQUEST["venue_id"]); // "4d0f1bd65584f04de33e5016"; // Markafoni

//getFoursquareCheckins($venue_id);



?>

