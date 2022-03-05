<?php

include_once("db.php");

$id_str_1 = $id_str_2 = $id_str_3 = $id_str_4 = $id_str_5 = $new_text = "0";

$reg_exUrl = "/(http|https|ftp|ftps)\:\/\/[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(\/\S*)?/";

$venue_id = "4caca53bd971b1f7a35a32e1"; // Fitslim

if(isset($_REQUEST['id_str_1']) AND $_REQUEST['id_str_1'] != "") $id_str_1 = $_REQUEST['id_str_1'];
if(isset($_REQUEST['id_str_2']) AND $_REQUEST['id_str_2'] != "") $id_str_2 = $_REQUEST['id_str_2'];
if(isset($_REQUEST['id_str_3']) AND $_REQUEST['id_str_3'] != "") $id_str_3 = $_REQUEST['id_str_3'];
if(isset($_REQUEST['id_str_4']) AND $_REQUEST['id_str_4'] != "") $id_str_4 = $_REQUEST['id_str_4'];

### 43200 --> son 12 saat içindeki checkinlerin listesini çeker
$sql = "SELECT * FROM foursquare_checkins WHERE (".time()."-checkin_time) < 172800 AND
			venue_id = '".$venue_id."'
ORDER BY view_count ASC LIMIT 1";
$result = mysql_query($sql) or die("Error code 93269591".mysql_error());

$JSON["results"]=array();

if(mysql_num_rows($result))
{
	while ($row = mysql_fetch_array($result) )
	{
		extract($row);
//		echo "foursquare_user_id: ".$foursquare_user_id."<br>";
//		echo "checkin_id: ".$checkin_id."<br>";

		extract(getFoursquareUserDetails($foursquare_user_id));

		array_push($JSON["results"],
			array(
				"foursquare_user_id" => $foursquare_user_id,
				"firstName" => stripslashes($firstName),
				"lastName" => stripslashes($lastName),
				"foursquare_image_url" => stripslashes($foursquare_image_url)
			)
		);

		++$view_count;
		$query2 = "UPDATE foursquare_checkins SET view_count = '".$view_count."' WHERE checkin_id = '".$checkin_id."'";
		$result2 = mysql_query($query2) or die ("Error code 1702 mr_request.php");
	}


	### İstemciye json_encode fonksiyonu ile JSON'a çevirip yollayalım
	echo json_encode($JSON);
}
else
{

	echo json_encode($JSON);
}

function getFoursquareUserDetails($foursquare_user_id)
{
	$row = 0;
	$sql = "SELECT * FROM foursquare_users WHERE foursquare_user_id = '".$foursquare_user_id."' LIMIT 1";
	$result = mysql_query($sql) or die("Error: checkFoursquareUser() : ".mysql_error());
	if(mysql_num_rows($result))
		$row = mysql_fetch_array($result);
	return $row;
}

?>

