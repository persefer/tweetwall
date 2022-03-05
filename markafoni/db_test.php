<?php

include_once("db.php");


$sql = "SELECT * FROM tweets WHERE is_active = '1' AND campaign_id = '2' ORDER BY view_count DESC";
$result = mysql_query($sql) or die("Error code 93269591".mysql_error());
	//	if($result) echo "---------0------";

if(mysql_num_rows($result))
{
	echo "<div id=\"twitterSearch\">";
	while ($row = mysql_fetch_array($result) )
	{
		echo $row[0]."-".$row[1]."-".$row[2]."-".$row[3]."-".$row[4]."-".$row[5]."-".$row[6]."<br>";
	}
	echo "</div>";
}


?>