<?php
ini_set("display_errors",1); 

//tweetduvardb
//tweetduvardbuser
//Greytoad64
	

	define("HOST", "205.178.146.102");
	// Database user
	define("DBUSER", "tweetduvardbuser");
	// Database password
	define("PASS", "Greytoad64");
	// Database name
	define("DB", "tweetduvardb");
	/*
	
	define("HOST", "mysql5.sadecehosting.com");
	// Database user
	define("DBUSER", "perseferdbuser");
	// Database password
	define("PASS", "greytoad64");
	// Database name
	define("DB", "perseferdb");
*/
############## Make the mysql connection ###########
$conn = mysql_connect(HOST, DBUSER, PASS) or die (mysql_error().'Could not connect !<br />Please contact the site\'s administrator.');
 
$db = mysql_select_db(DB) or die (mysql_error().'Could not connect to database !<br />Please contact the site\'s administrator.');
mysql_query("SET NAMES utf8");

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>Admin - TweetDuvarım</title>
    <link rel="apple-touch-icon" href="images/Apple-Touch-Icon.png"/>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js" type="text/javascript" ></script>
	<script src="jquery.livetwitter.js" type="text/javascript"></script>
    
	<style type="text/css" media="screen">
		body {
			background: #E1EBFF;
			font-family: Verdana;
			font-size: 13px;
			color: #111;
			margin: 0;
			line-height: 1.4;
		}
		h2 {
			margin-top: 40px;
			font-family: Helvetica, Arial, sans-serif;
			font-size: 24px;
			font-weight: bold;
		}
		a, a:visited {
			color: #066999;
		}
		a:hover {
			color: #111;
		}
		.tweet {
			background: #fff;
			margin: 4px 0;
			width: 99%;
			-moz-border-radius: 8px;
			-webkit-border-radius: 8px;
		}
		.tweet img {
			float: left;
			margin: 0 8px 4px 0;
		}
		.tweet .text {
			margin: 0;
		}
		.tweet .time a {
			font-size: 80%;
			color: #888;
			white-space: nowrap;
			text-decoration: none;
		}
		.tweet .time a:hover {
			text-decoration: underline;
		}
		#twitterSearch .tweet {
			min-height: 24px;
		}
		#twitterSearch .tweet .text {
			margin-left: 32px;
		}

		
.checkbox {
	
	margin-left:-10px;
	width:40px;
	height:40px;
}
._submit, ._text, ._select {
	width:300px; height:50px; font-size:24px;}
	</style>

	<script type="text/javascript">
	
    $(function() {
		$('.checkbox').live("click", function() {

			var id = $(this).val();
			if(this.checked)
			{
		 		$.post("validate.php", { tweet_id: id, val: 1 });
			}
			else
		 		$.post("validate.php", { tweet_id: id, val: 0 });
		}); 
    });


	
	
	
	
	</script>


</head>
<body>
<?php

if($_REQUEST['kelime_1'] != "") {
	$kelime_1 = addslashes(str_replace('#', '', str_replace(' ', '', $_REQUEST['kelime_1'])));
	if($_REQUEST['kelime_2'] != "") {
		$kelime_2 = addslashes(str_replace('#', '', str_replace(' ', '', $_REQUEST['kelime_2'])));
		if($_REQUEST['kelime_3'] != "") {
			$kelime_3 = addslashes(str_replace('#', '', str_replace(' ', '', $_REQUEST['kelime_3'])));
			if($_REQUEST['kelime_4'] != "") {
				$kelime_4 = addslashes(str_replace('#', '', str_replace(' ', '', $_REQUEST['kelime_4'])));
			}
		}
	}
}
if($kelime_1 != "") {
	$query = $kelime_1;
	if($kelime_2 != "") {
		$query .= " OR ".$kelime_2;
		if($kelime_3 != "") {
			$query .= " OR ".$kelime_3;
			if($kelime_4 != "") {
				$query .= " OR ".$kelime_4;
			}
		}
	}
}

	
	
if(isset($_REQUEST['time']) AND $_REQUEST['time'] != "" AND $_REQUEST['konuk_1'] != "" AND $kelime_1 != "" )
{
	$timer = $_REQUEST['time'];
	$jquery_timer = $_REQUEST['time'] * 1000;
	
	$sql = "SELECT * FROM konuklar WHERE campaign = '1'";
	$result = mysql_query($sql) or die("Error code 93269591".mysql_error());
	if(mysql_num_rows($result)) {
		$query2 = "UPDATE konuklar SET 
					konuk_1 = '".addslashes($_REQUEST['konuk_1'])."',
					konuk_2 = '".addslashes($_REQUEST['konuk_2'])."',
					konuk_3 = '".addslashes($_REQUEST['konuk_3'])."',
					konuk_4 = '".addslashes($_REQUEST['konuk_4'])."'
					 WHERE campaign = '1'";
		$result2 = mysql_query($query2) or die (mysql_error()."Error code 1702 mr_request.php");
	}
	else
	{
		$query = "INSERT INTO konuklar (	`campaign`,
									`konuk_1`,
									`konuk_2`,
									`konuk_3`,
									`konuk_4`) 
						VALUES (	'1',
									'".addslashes($_REQUEST['konuk_1'])."',
									'".addslashes($_REQUEST['konuk_2'])."',
									'".addslashes($_REQUEST['konuk_3'])."',
									'".addslashes($_REQUEST['konuk_4'])."')";
	$result = mysql_query($query) or die("title details eklenemedi: ".mysql_error());
	}




}
else
{
	$sql = "SELECT * FROM konuklar WHERE campaign = '1'";
	$result = mysql_query($sql) or die("Error code 93269591".mysql_error());
	if(mysql_num_rows($result)) {
		$row = mysql_fetch_array($result);
		extract($row);
	}
	echo "<br><blockquote>
	<form action=\"admin.php\" method=\"post\">
	Güncelleme Süresi:
	<select name=\"time\" class=\"_select\">
	<option value=\"15\">15 saniye</option>
	<option value=\"30\" selected=\"selected\">30 saniye</option>
	<option value=\"45\">45 saniye</option>
	<option value=\"60\">60 saniye</option>
	</select>
	
	<table><tr><td>
	<b>Konukların İsimleri:<br></b>
	Konuk 1: <input type=\"text\" name=\"konuk_1\" value=\"".$konuk_1."\" maxlength=\"30\" class=\"_text\" />(Zorunlu)<br>
	Konuk 2: <input type=\"text\" name=\"konuk_2\" value=\"".$konuk_2."\" maxlength=\"30\" class=\"_text\" /><br>
	Konuk 3: <input type=\"text\" name=\"konuk_3\" value=\"".$konuk_3."\" maxlength=\"30\" class=\"_text\" /><br>
	Konuk 4: <input type=\"text\" name=\"konuk_4\" value=\"".$konuk_4."\" maxlength=\"30\" class=\"_text\" /><br>
	</td><td>
	<b>Aranılacak hashtagler:<br></b>
	Kelime 1: <input type=\"text\" name=\"kelime_1\" value=\"#".$kelime_1."\" maxlength=\"30\" class=\"_text\" id=\"idd\" />(Zorunlu)<br>
	Kelime 2: <input type=\"text\" name=\"kelime_2\" value=\"#".$kelime_2."\" maxlength=\"30\" class=\"_text\" /><br>
	Kelime 3: <input type=\"text\" name=\"kelime_3\" value=\"#".$kelime_3."\" maxlength=\"30\" class=\"_text\" /><br>
	Kelime 4: <input type=\"text\" name=\"kelime_4\" value=\"#".$kelime_4."\" maxlength=\"30\" class=\"_text\" /><br>
	</td></tr></table>
	<br>
	<input type=\"submit\" name=\"Başlat\" value=\"Başlat\" class=\"_submit\" align=\"center\">
	</form>
	</blockquote>
	</body>
	</html>";
	die();
}
?>

<form name="counter"><font style="font-size:18px; float:left;">Güncelleme için kalan süre:</font> <input type="text" size="8" 
name="d2" style="float:left"></form><a href="admin.php?<?php
if($kelime_1 != "") {
	echo "kelime_1=".$kelime_1;
	if($kelime_2 != "") {
		echo "&kelime_2=".$kelime_2;
		if($kelime_3 != "") {
			echo "&kelime_3=".$kelime_3;
			if($kelime_4 != "") {
				echo "&kelime_4=".$kelime_4;
			}
		}
	}
}
?>" style="float:left; color:#000; font-size:16px; padding:1px 7px; text-decoration:none;  margin-left:10px; border:#000 solid 1px;">Konukların isimlerini güncelle</a> 	
<br /><br />

		<div id="twitterSearch" class="tweets"></div>
        
        	<script type="text/javascript">
	
<!-- 
// 
 var second = <? echo $timer; ?> + 1; 

function display(){ 
	if(second <= 0)
		second = <? echo $timer; ?>;
    second-=1; 
    document.counter.d2.value=second; 
    setTimeout("display()",991);
} 
display();
--> 	
	
	
	
	
	
	

		// Basic usage
//		$('#twitterSearch').liveTwitter('markafoni OR beyazshow OR orcun OR okan', {limit: 9, rate: 5000, imageSize: 40});
		$('#twitterSearch').liveTwitter('<?php echo $query; ?>', {rate: <? echo $jquery_timer; ?>, imageSize: 40, lang: "tr"});

		// Changing the query
		$('#searchLinks a').each(function(){
			var query = $(this).text();
			$(this).click(function(){
				// Update the search
				$('#twitterSearch').liveTwitter(query);
				// Update the header
				$('#searchTerm').text(query);
				return false;
			});
		});
	</script>

	
    <br /><br /><br />
</body>
</html>
