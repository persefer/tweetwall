<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>

<body>
<?php
include_once("catch_foursquare.php");


$sql = "SELECT * FROM foursquare_venues ORDER BY last_contol_date ASC LIMIT 1";
$result = mysql_query($sql) or die("Error in cron sql: ".mysql_error());
if(mysql_num_rows($result))
{
	$row = mysql_fetch_array($result);
	extract($row);

	date_default_timezone_set('Europe/Istanbul');
	$date = date('Y-m-d H:i:s', time());


	$checkin_count = getFoursquareCheckins($venue_id);

	echo "There are ".$checkin_count." checkin(s) in ".$venue_name." at the moment.<br>";


	$query2 = "UPDATE
					foursquare_venues 
				SET 
							last_contol_date = '".$date."'
				WHERE
							venue_id = '".$venue_id."' ";
	$result2 = mysql_query($query2) or die ("Error code 1702 mr_request.php".mysql_error());
	if($result2) echo "Date updated"; else echo "Error in date update";



}


?>

</body>
</html>