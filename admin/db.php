<?php



$mysql_hostname = "mysql51.sadecehosting.com";
$mysql_user = "ltdbuser";
$mysql_password = "greytoad64";
$mysql_database = "lifxtimerdb";


$prefix = "";
$bd = mysql_connect($mysql_hostname, $mysql_user, $mysql_password) or die("Opps some thing went wrong");
mysql_select_db($mysql_database, $bd) or die("Opps some thing went wrong");

?>