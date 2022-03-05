<?php

include_once("db.php");

$sql = "SELECT * FROM tweets WHERE is_active = '1' ORDER BY id ASC LIMIT 1";
$result = mysql_query($sql) or die("Error code 93269591".mysql_error());
	//	if($result) echo "---------0------";
if(mysql_num_rows($result))
{

	while ($row = mysql_fetch_array($result) )
	{
		extract($row);
		echo $date_orj."<br>";
			if(date("H", time()) - date("H", strtotime($date_orj)) >= 2 )
				echo "sildim";
	}
}
?>