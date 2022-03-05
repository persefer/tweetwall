<?php
if(isset($_REQUEST['campaign_id']) AND  $_REQUEST['campaign_id'] > 0)
	$campaign_id = $_REQUEST['campaign_id'];
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>TweetDuvar.im - Boğaziçi Üniversitesi İşletme ve Ekonomi Kulübü</title>
        <link rel="apple-touch-icon" href="images/Apple-Touch-Icon.png"/>

	<script src="jquery.min.js" type="text/javascript" ></script>

  <link href="css/style.css" rel="stylesheet" type="text/css" />

	<style type="text/css" media="screen">
</style>

<script type="text/javascript">
var docElm = document.documentElement;
if (docElm.requestFullscreen) {
    docElm.requestFullscreen();
}
else if (docElm.mozRequestFullScreen) {
    docElm.mozRequestFullScreen();
}
else if (docElm.webkitRequestFullScreen) {
    docElm.webkitRequestFullScreen();
}



$(function() {   		

	var theWindow        = $(window),
	    $bg              = $("#bg"),
	    aspectRatio      = $bg.width() / $bg.height();
	    			    		
	function resizeBg() {
		
		if ( (theWindow.width() / theWindow.height()) < aspectRatio ) {
		    $bg
		    	.removeClass()
		    	.addClass('bgheight');

		} else {
		    $bg
		    	.removeClass()
		    	.addClass('bgwidth');

		}
					
	}
	                   			
	theWindow.resize(function() {
		resizeBg();
	}).trigger("resize");

});
</script>




<body>

<img src="images/1024x768.jpg" id="bg" alt="">
<div id="tweet_header"><img src="images/twitter_logo.png">Sorularınız için: <b>#aslında</b></div>




<div id="speaker"><br>Sorularınızı Twitter ile gönderebilirsiniz.<br><br>#aslında</div>

<div id="tweets">
	<div class="tweet"></div>
	<div class="tweet"></div>
	<div class="tweet"></div>
	<div class="tweet"></div>
	<div class="tweet"></div>
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


function getCheckin()
{
    $.getJSON("get_checkin.php", function(json) {
      if(json.results[0])
      {
        tweet = '<div class="tweet"><div class="tweet_box"><img src="https://is0.4sqi.net/userpix_thumbs'+json.results[0].foursquare_image_url+'" class="profile_image"><img src="images/foursquare.png" class="social"><span class="from_user_name" style="font-size:22px; margin-left:38px; margin-top:10px;">' + json.results[0].firstName + ' ' + json.results[0].lastName + '</span><span class="text" style="font-size:20px; margin-left:120px;"><br>Şu an PR Professional İletişim Günleri\'nde.</span></div></div>'; 
        $(tweet).animate({height: 'toggle'},2000).insertBefore("#tweets .tweet:first-child");
        $("#tweets .tweet:last-child").remove();
      }
      else
        getTweet();
    });  
}

function getTweet()
{
	$.getJSON("get_tweet.php", {
								campaign_id: <?=$campaign_id;?>,
								id_str_1: tweetId_Array[0],
	  							id_str_2: tweetId_Array[1],
	  							id_str_3: tweetId_Array[2],
	  							id_str_4: tweetId_Array[3],
	  							id_str_5: tweetId_Array[4],
	  							campaign_id: <?=$campaign_id;?>
	  						},
	  							 function(json) {

		tweetId_Array.push(json.results[0].id_str);
		tweetId_Array.shift();
		tweet = '<div class="tweet"><div class="tweet_box"><img src="'+json.results[0].profile_image_url+'"><img src="images/twitter.png" class="social"><span class="from_user_name">' + json.results[0].from_user_name + '</span><span class="text"> ' + json.results[0].text + ' </span><span class="time">' + relativeTime(json.results[0].created_at) + '</span></div></div>'; 
		$(tweet).animate({height: 'toggle'},2000).insertBefore("#tweets .tweet:first-child");
		$("#tweets .tweet:last-child").remove();
    }); 
}

function getSpeaker()
{
		$.getJSON("get_speaker.php", {campaign_id: <?=$campaign_id;?>},
	  							 function(json) {
	  							 	$('#speaker').html('<br><div id="title">'+json.results[0].title+'<br><br></div>'+json.results[0].speaker_1+'<br>'+json.results[0].speaker_2+'<br>'+json.results[0].speaker_3+'<br>'+json.results[0].speaker_4);
    	});
}


var tweetId_Array = new Array(4);
var tweet = "";
var second = 0;

function display(){ 
    second += 1;
  
  if(!(second%19))
    getCheckin();  	
  else if(!(second%9))
  	getSpeaker(); 
  else
    getTweet();

  setTimeout("display()",15000);
} 
display();


</script>
<div id="fullscreen_div">
	<a id="fullscreen">Click here for fullscreen</a>&nbsp;
	<a href="#" id="cancel_fullscreen"> - Cancel</a>
	<br><br>
	<b>To cancel fullscreen, press <font color="red">ESC</font> key on keyboard.<br><br>
	To activate fullscreen press <font color="red">F11</font> key on keyboard.</b>
</div>
<script src="js/fullscreen.js"></script>
</body>
</html>




