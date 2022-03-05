<?php

include_once("db.php");

$speaker_1=$speaker_2=$speaker_3=$speaker_4=$hashtag_1 = $hashtag_2 = $hashtag_3 = $hashtag_4=$title=$campaign_id="";

if(isset($_REQUEST['campaign_id'])) $campaign_id = $_REQUEST['campaign_id'];

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>Setup - TweetDuvarım</title>
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
	.button {
	float:left;
font-size:16px; padding:1px 7px; text-decoration:none;  margin:10px;
border:#000 solid 1px;
}
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
<a href="setup.php" class="button">Setup</a>
<a href="tweets.php" class="button">Capture Tweets</a>
<a href="projection.php" class="button">Projection Screen</a>
<a href="ipad.php" class="button">Tablet Screen</a>
<br><br>
<?php
	

	$sql = "SELECT * FROM campaigns where campaign_id = '1' ";
	$result = mysql_query($sql) or die("Error code 93269591".mysql_error());
	if(mysql_num_rows($result)) {
		$row = mysql_fetch_array($result);
		extract($row);
	}

?>

<br><blockquote>
	<form action="tweets.php" method="post">
		<table>

			<tr><td>Oturum Başlığı:<br>(Zorunu değil)</td>
			<td><input type="text" name="title" value="<?=$title;?>" class="_text"></td>
		</tr>
		<tr>
			<td>Güncelleme Süresi:</td>
			<td>
	<select name="refresh_time" class="_select">
	<option value="15">15 saniye</option>
	<option value="30" selected="selected">30 saniye</option>
	<option value="45">45 saniye</option>
	<option value="60">60 saniye</option>
	</select>
</td>
	</tr>
</table>
	<br>
	<table><tr><td>
	<b>Konuşmacılar:<br></b>
	Konuk 1:<br>(Zorunlu)<input type="text" name="speaker_1" value="<?=$speaker_1;?>" maxlength="30" class="_text" /><br>
	Konuk 2: <input type="text" name="speaker_2" value="<?=$speaker_2;?>" maxlength="30" class="_text" /><br>
	Konuk 3: <input type="text" name="speaker_3" value="<?=$speaker_3;?>" maxlength="30" class="_text" /><br>
	Konuk 4: <input type="text" name="speaker_4" value="<?=$speaker_4;?>" maxlength="30" class="_text" /><br>
	</td><td>
	<b>Aranılacak hashtagler:<br></b>
	1. #:<br>(Zorunlu)<input type="text" name="hashtag_1" value="<?=$hashtag_1;?>" maxlength="30" class="_text" id="idd" /><br>
	2. #: <input type="text" name="hashtag_2" value="<?=$hashtag_2;?>" maxlength="30" class="_text" /><br>
	3. #: <input type="text" name="hashtag_3" value="<?=$hashtag_3;?>" maxlength="30" class="_text" /><br>
	4. #: <input type="text" name="hashtag_4" value="<?=$hashtag_4;?>" maxlength="30" class="_text" /><br>
	</td></tr></table>
	<br>

	<input type="hidden" name="campaign_id" value="1">
	<input type="submit" name="Başlat" value="Başlat" class="_submit" align="center">
	</form>
	</blockquote>
	</body>
	</html>