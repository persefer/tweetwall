<?php

include_once("db.php");

$speaker_1=$speaker_2=$speaker_3=$speaker_4=$hashtag_1 = $hashtag_2 = $hashtag_3=$hashtag_4=$title=$campaign_id=$tweet_query="";
$refresh_time = 30;

	$campaign_id = 2;

if(isset($_REQUEST['title']) AND $_REQUEST['title'] != "")
	$title = check($_REQUEST['title']);
if(isset($_REQUEST['refresh_time']) AND $_REQUEST['refresh_time'] != "")
	$refresh_time = check($_REQUEST['refresh_time']);

if(isset($_REQUEST['speaker_1']) AND $_REQUEST['speaker_1'] != "")
	$speaker_1 = check($_REQUEST['speaker_1']);
if(isset($_REQUEST['speaker_2']) AND $_REQUEST['speaker_2'] != "")
	$speaker_2 = check($_REQUEST['speaker_2']);
if(isset($_REQUEST['speaker_3']) AND $_REQUEST['speaker_3'] != "")
	$speaker_3 = check($_REQUEST['speaker_3']);
if(isset($_REQUEST['speaker_4']) AND $_REQUEST['speaker_4'] != "")
	$speaker_4 = check($_REQUEST['speaker_4']);

if(isset($_REQUEST['hashtag_1']) AND $_REQUEST['hashtag_1'] != "") 
	$hashtag_1 = addslashes(str_replace('#', '', str_replace(' ', '', $_REQUEST['hashtag_1'])));
if(isset($_REQUEST['hashtag_2']) AND $_REQUEST['hashtag_2'] != "") 
	$hashtag_2 = addslashes(str_replace('#', '', str_replace(' ', '', $_REQUEST['hashtag_2'])));
if(isset($_REQUEST['hashtag_3']) AND $_REQUEST['hashtag_3'] != "") 
	$hashtag_3 = addslashes(str_replace('#', '', str_replace(' ', '', $_REQUEST['hashtag_3'])));
if(isset($_REQUEST['hashtag_4']) AND $_REQUEST['hashtag_4'] != "")
	$hashtag_4 = addslashes(str_replace('#', '', str_replace(' ', '', $_REQUEST['hashtag_4'])));

/*
echo "speaker_1: ".$speaker_1."<br>";
echo "hashtag_1: ".$hashtag_1."<br>";
echo "campaign_id: ".$campaign_id."<br>";
echo "title: ".$title."<br>";
*/

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>TweetDuvar.im - Fitslim Spor ve Sağlıklı Yaşam Merkezi</title>
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
			margin: 4px 10px;
			padding: 6px;
			width: 98%;
			-moz-border-radius: 8px;
			-webkit-border-radius: 8px;
			font-family: Helvetica, Arial, sans-serif;
			font-size: 14px;
			font-weight: bold;

		}
		.tweet img {
			float: left;
			margin: 0 8px 4px 0;
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
			font-size: 18px;
			font-weight: bold;
		}

		
.checkbox {
	
	margin:2px;
	width:30px;
	height:30px;
}


.button {
	float:left;
font-size:26px; padding:2px 8px; text-decoration:none;  margin:20px;
border:#000 solid 2px;
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

<a href="projection.php?campaign_id=2" class="button"> B a ş l a </a>
<a href="index.php?campaign_id=2" class="button">İptal Edilen Tweetleri Temizle</a>
<a href="statistics.php?campaign_id=2" class="button"> İstatistik </a>

<br /><br /><br><br><br>

<?php
$sql = "SELECT * FROM tweets WHERE is_active = '1' AND campaign_id = '2' ORDER BY id DESC";
$result = mysql_query($sql) or die("Error code 93269591".mysql_error());

if(mysql_num_rows($result))
{
	echo "<div id=\"twitterSearch\">";
	while ($row = mysql_fetch_array($result) )
	{
		extract($row);
		echo "<div class=\"tweet\"> <input type=\"checkbox\" value=\"".$tweet_id."\" class=\"checkbox\" CHECKED>
		".$from_user_name.": ".stripslashes($text)." (".remainingTime($date_orj).")</div>";
	}
	echo "</div>";
}
?>




<script type="text/javascript">
	
<!-- 
// 

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

	
    <br />
    <a href="index.php?campaign_id=2" class="button">İptal Edilen Tweetleri Temizle</a>
<a href="projection.php?campaign_id=2" class="button"> B a ş l a </a>
<br>
</body>
</html>
