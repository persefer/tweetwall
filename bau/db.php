<?php
ini_set("display_errors",1);

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


session_start();

if(isset($_REQUEST['q']) AND $_REQUEST['q'] == "die") session_destroy();

	# Connect to the database
	define("HOST", "205.178.146.102");
	// Database user
	define("DBUSER", "tweetduvardbuser");
	// Database password
	define("PASS", "***");
	// Database name
	define("DB", "tweetduvardb");
/*	# Connect to the database
	define("HOST", "localhost");
// Database user
define("DBUSER", "persefer");
// Database password
define("PASS", "***");
// Database name
define("DB", "tweetduvarim");
}
 */

$conn = mysql_connect(HOST, DBUSER, PASS) or die (mysql_error().'Error 35: Could not connect !<br />Please contact the site\'s administrator.');
 
$db = mysql_select_db(DB) or die (mysql_error().'Error 37: Could not connect to database !<br />Please contact the site\'s administrator.');
mysql_query("SET NAMES utf8");
mysql_set_charset('utf8',$conn);

$date = date("Y-m-d", time());



?>
