<?php

include_once("db.php");

$speaker_1=$speaker_2=$speaker_3=$speaker_4=$hashtag_1 = $hashtag_2 = $hashtag_3 = $hashtag_4=$title=$campaign_id="";

if(isset($_REQUEST['campaign_id']) AND  $_REQUEST['campaign_id'] > 0)
	$campaign_id = $_REQUEST['campaign_id'];

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
ol {float: left; margin-left: 20px; }
li {border: 1px solid #000000; }

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
<a href="setup.php?campaign_id=<?=$campaign_id;?>" class="button">Setup</a>
<a href="tweets.php?campaign_id=<?=$campaign_id;?>" class="button">Capture Tweets</a>
<a href="projection.php?campaign_id=<?=$campaign_id;?>" class="button">Projection Screen</a>
<a href="ipad.php?campaign_id=<?=$campaign_id;?>" class="button">Tablet Screen</a>
<a href="statistics.php?campaign_id=<?=$campaign_id;?>" class="button">Statistics</a>
<br><br><br>
<?php
	
function getTweetCount($from_user)
{
	$sql = "SELECT COUNT(*) AS count FROM tweets WHERE from_user = '".$from_user."' AND campaign_id = '".$campaign_id."'";
	$result = mysql_query($sql) or die("Error code 93269591".mysql_error());

	if(mysql_num_rows($result))
	{
		while ($row = mysql_fetch_array($result) )
		{
			extract($row);
			return $count;
		}
	}
}
function getFoursquareCount($foursquare_user_id)
{
	$sql = "SELECT COUNT(*) AS count FROM  foursquare_checkins WHERE venue_id='4dc8e48bd164033c57340a71' foursquare_user_id = '".$foursquare_user_id."'";
	$result = mysql_query($sql) or die("Error code 93269591".mysql_error());
	if(mysql_num_rows($result))
	{
		while ($row = mysql_fetch_array($result) )
		{
			extract($row);
			return $count;
		}
	}
}

function getFoursquareUserDetails($foursquare_user_id)
{
	$sql = "SELECT firstName,lastName FROM foursquare_users WHERE foursquare_user_id='".$foursquare_user_id."' LIMIT 1";
	$result = mysql_query($sql) or die("Error code 93269591".mysql_error());
	if(mysql_num_rows($result))
	{
		while ($row = mysql_fetch_array($result) )
		{
			extract($row);
			return $firstName." ".$lastName;
		}
	}
}









	$sql = "SELECT distinct(from_user_name) FROM tweets where campaign_id = '".$campaign_id."' ";
	$result = mysql_query($sql) or die("Error code 93269591".mysql_error());
	if(mysql_num_rows($result)) {
		echo "<ol>Tweets Toplam: ".mysql_num_rows($result)."<br>";
		while ($row = mysql_fetch_array($result) )
		{
			extract($row);
			echo "<li>".$from_user_name."</li>";
		}
	}
	echo "</ol>";

	$sql = "SELECT distinct(foursquare_user_id) FROM foursquare_checkins where venue_id = '4dc8e48bd164033c57340a71' ";
	$result = mysql_query($sql) or die("Error code 93269591".mysql_error());
	if(mysql_num_rows($result)) {
		echo "<ol>Checkins Toplam: ".mysql_num_rows($result)."<br>";
		while ($row = mysql_fetch_array($result) )
		{
			extract($row);
			echo "<li>".getFoursquareUserDetails($foursquare_user_id)."</li>";
		}
	}
	echo "</ol>";


?>
</ol>

	</body>
	</html>