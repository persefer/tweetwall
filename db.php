<?php
ini_set("display_errors",1);
date_default_timezone_set('Europe/Istanbul');
$date = date('Y-m-d H:i:s', time());

session_start();

function check($a) {return trim(addslashes($a));}

function remainingTime($time)
{
	$result = 0;
	
	$diff = time()-strtotime(stripslashes($time));
	if($diff < 60) $result = $diff." saniye önce";
	elseif($diff < 3600) $result = (int)($diff/60)." dakika önce";
	elseif($diff < 86400) $result = (int)($diff/3600)." saat önce";
	elseif($diff > 86400) $result = (int)($diff/86400)." gün önce";

	return $result;
}


	# Connect to the database
	define("HOST", "mysql51.sadecehosting.com");
	// Database user
	define("DBUSER", "ltdbuser");
	// Database password
	define("PASS", "greytoad64");
	// Database name
	define("DB", "lifxtimerdb");
//	*/
	/*
	# Connect to the database
	define("HOST", "localhost");
// Database user
define("DBUSER", "persefer");
// Database password
define("PASS", "greytoad64");
// Database name
define("DB", "tweetduvarim");
//*/
 

$conn = mysql_connect(HOST, DBUSER, PASS) or die (mysql_error().'Error 35: Could not connect !<br />Please contact the site\'s administrator.');
 
$db = mysql_select_db(DB) or die (mysql_error().'Error 37: Could not connect to database !<br />Please contact the site\'s administrator.');
mysql_query("SET NAMES utf8");
mysql_set_charset('utf8',$conn);




?>