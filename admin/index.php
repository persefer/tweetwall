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
    
	<style type="text/css" media="screen">
		body {
			background: #E1EBFF;
			font-family: Verdana;
			font-size: 13px;
			color: #111;
			margin: 0;
			line-height: 1.4;
			background: url("images/bg.jpg") repeat;
		}
		h2 {
			font-family: Verdana;
			font-size: 14px;
			color: #00a2ff;
			margin-left: 10px;	
		}
		#leftmenu{float: left; height: 100%;
			top:200px;
			background-color: #eee; display: block;position: fixed;}
			#leftmenu li {text-decoration: none;}
		#leftmenu a {width: 200px;
			background: #066999;
			padding: 10px;
			color: #fff;
		}
		#leftmenu a:hover {
			background: #E1EBFF;
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
.center {
	margin-left: auto;
	margin-right: auto;
}

.box {
		width:114px;
	height: 114px;
	margin-bottom:10px;
	-moz-border-radius: 10px; 
	-webkit-border-radius: 10px;
	border: solid #FFF 4px;
	-moz-box-shadow: 0 1px 3px rgba(0,0,0,0.5);
	-webkit-box-shadow: 0 1px 3px rgba(0,0,0,5);

}
.square_200 {
	width:250px;
	height: 290px;
	float: left;
	margin:10px;
	padding-left: 12px;
	background: #eee;
	-webkit-border-radius: 20px; -moz-border-radius: 20px; border-radius: 20px;
	border: solid #FFF 6px;
	box-shadow:inset 2px 2px 8px rgba(0,0,0,0.8);
	-moz-box-shadow:inset 5px 5px 20px rgba(0,0,0,0.9);
	-webkit-box-shadow:inset 5px 5px 20px rgba(0,0,0,0.9);
}
.square_icon {
	width: 100px;
	height: 100px;
	float: left;
	margin:7px;
	-webkit-border-radius: 10px; -moz-border-radius: 10px; border-radius: 10px;
	border: solid #fff 2px;
	box-shadow:1px 1px 4px rgba(0,0,0,0.8);
	-moz-box-shadow:5px 5px 4px rgba(0,0,0,0.9);
	-webkit-box-shadow:5px 5px 4px rgba(0,0,0,0.9);

}
.square_icon:hover {
	box-shadow:1px 1px 4px #00a2ff;
	-moz-box-shadow:5px 5px 4px #00a2ff;
	-webkit-box-shadow:5px 5px 4px #00a2ff;
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

<div style="width:100%; text-align:center;"><div style="width: 900px; margin: 0px auto; text-align:left;">

<div class="square_200">
	<h2>Projection Apps</h2>
	<a class="square_icon" style="background: url(images/175.jpg);" href="projection.php"></a>
	<div class="square_icon" style="background: url(images/176.jpg);">>a</div>
	<div class="square_icon">a</div>
	<div class="square_icon">a</div>
</div>
<div class="square_200">
	<h2>Iphone Apps</h2>
	<div class="square_icon">a</div>
	<div class="square_icon">a</div>
	<div class="square_icon">a</div>
	<div class="square_icon">a</div>
</div>
<div class="square_200">
	<h2>Settings</h2>
	<div class="square_icon">a</div>
	<div class="square_icon">a</div>
	<div class="square_icon">a</div>
	<div class="square_icon">a</div>
</div>

</div></div>



<div id="leftmenu">
	<ul>
		<li><a href="#">Hashtags</a></li>
		<li><a href="#">Sessions</a></li>
	</ul>
</div>






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