<?php

include_once("db.php");

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>TweetDuvar.im - Boğaziçi Üniversitesi İşletme ve Ekonomi Kulübü</title>
    <link rel="apple-touch-icon" href="images/Apple-Touch-Icon.png"/>
	<script src="jquery.min.js" type="text/javascript" ></script>
	<script src="jquery.livetwitter.js" type="text/javascript"></script>
    
	<style type="text/css" media="screen">
			#bg { position: fixed; top: 0; left: 0; z-index:-1; width: 100%; }

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
#tweets {
height: 100%;
width: 100%;
overflow:hidden;
z-index:10;
display:block;
}		
		.tweet {
			width: 100%;
			height:130px;
			padding: 0px;
			float: right;
			display: block;
			overflow:hidden;
		}

		.tweet_box {
			background: url(images/tweet_bg.png) repeat;
			margin: 10px 10px; /* ust */
			width: 94%;
			height:80%;
			padding-top: 4px;
			padding-right: 6px;
	border-radius: 6px; -moz-border-radius: 6px; -webkit-border-radius: 6px;
-moz-box-shadow: 0 0 10px black; -webkit-box-shadow: 0 0 10px black; box-shadow: 0 0 10px black;
		}
		.tweet_box img {
			float: left;
			margin: 10px;
			width: 75px;
			height: 80px;
	border-radius: 6px; -moz-border-radius: 6px; -webkit-border-radius: 6px;
			-moz-box-shadow: 0 0 5px #19a8d2; -webkit-box-shadow: 0 0 5px #19a8d2; box-shadow: 0 0 5px #19a8d2;
		}
		.tweet_box .text {
			font-family: Helvetica, Arial, sans-serif;
			font-size: 24px;
			font-weight: bold;
			color: #000;
			text-shadow: 1px 1px 1px #fff;
		}
		.tweet_box .from_user_name {
			font-family: Helvetica, Arial, sans-serif;
			font-size: 17px;
			font-weight: bold;
			color: #4292c8;
		}
		.tweet_box .time{
			font-size: 80%;
			color: #999;
			white-space: nowrap;
			font-size: 14px;
		}

		
.checkbox {
	
	margin-left:-10px;
	width:40px;
	height:40px;
}
._submit, ._text, ._select {
	width:300px; height:50px; font-size:24px;}
	#timer {background-color: #ff0000;
		width: 100%;
		height: 2px;}

.button {
	float:left;
font-size:16px; padding:1px 7px; text-decoration:none;  margin:10px;
border:#000 solid 1px;
}

	</style>


</head>
<body>

<img src="images/bg_ipad.jpg" id="bg" alt="">

<div id="tweets">
	<div class="tweet"></div>

</div>

<script type="text/javascript">

	function relativeTime(timeString) {
            var parsedDate = Date.parse(timeString);
            var delta = (Date.parse(Date()) - parsedDate) / 1000;
            var r = '';
            if  (delta < 60) {
              r = delta + " saniye önce";
            } else if (delta < 120) {
              r = "bir dakika önce";
            } else if (delta < (45 * 60)) {
              r = (parseInt(delta / 60, 10)).toString() + " dakika önce";
            } else if (delta < (90 * 60)) {
              r = "bir saat önce";
            } else if (delta < (24 * 60 * 60)) {
              r = '' + (parseInt(delta / 3600, 10)).toString() + " saat önce";
            } else if (delta < (48 * 60 * 60)) {
              r = "bir gün önce";
            } else {
              r = (parseInt(delta / 86400, 10)).toString() + " gün önce";
            }
            return r;
}

var tweetId = 0;
var tweet = "";

var second = 0;
function display(){ 
    second += 1;
	
	$.getJSON("get_tweet_ipad.php", {id_str_1: tweetId}, function(json) {

	tweet = '<div class="tweet '+json.results[0].id_str+'"><div class="tweet_box"><img src="'+json.results[0].profile_image_url+'"><span class="from_user_name">' + json.results[0].from_user_name + '</span><span class="text"> ' + json.results[0].text + ' </span><span class="time">' + relativeTime(json.results[0].created_at) + '</span></div></div>'; 
	if(!json.results[0].delete)
		$(tweet).animate({height: 'toggle'},2000).insertBefore("#tweets .tweet:first-child");

		tweetId = json.results[0].id_str;

    });
    setTimeout("display()",15000);
} 
display();

</script>


</body>
</html>
