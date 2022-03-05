<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang=tr lang="tr">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>TweetDuvar.im - Markafoni</title>
        <link rel="apple-touch-icon" href="images/Apple-Touch-Icon.png"/>

	<script src="jquery.min.js" type="text/javascript" ></script>
	<script src="jquery.livetwitter.js" type="text/javascript"></script>

  <link href="css/style.css" rel="stylesheet" type="text/css" />

	<style type="text/css" media="screen">
</style>

<script type="text/javascript">

$("#target").click(function() {
alert("Handler for .click() called.");
});


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



</script> 

<script src="js/jquery.backstretch.min.js"></script>
<script>
    var images = [
       "images/2.jpg",
       "images/3.jpg",
       "images/4.jpg",
       "images/5.jpg",
       "images/6.jpg",
       "images/7.jpg",
       "images/8.jpg",
       "images/9.jpg",
       "images/10.jpg",
       "images/11.jpg",
       "images/12.jpg",
       "images/13.jpg",
       "images/14.jpg",
       "images/16.jpg",
       "images/17.jpg",
       "images/1.png",
       "images/2.png",
       "images/3.png"
    ];
    $(images).each(function () {
        $('<img/>')[0].src = this;
    });
    var index = 0;
    $.backstretch(images[index], { speed: 1000 });
    setInterval(function () {
        index = (index >= images.length - 1) ? 0 : index + 1;
        $.backstretch(images[index]);
    }, 10000);
</script>


</head>
<body>


<div id="tweets">
	<div class="tweet"></div>
	<div class="tweet"></div>
	<div class="tweet"></div>
  <div class="tweet"></div>
  <div class="tweet"></div>
  <div class="tweet"></div>
  <div class="tweet"></div>
</div>

<div id="player"></div>



<script type="text/javascript">
var player;

var tweetId_Array = new Array(3);
tweetId_Array[0] = tweetId_Array[1] = tweetId_Array[2] = 0;

var tweet = "";

var second = 0;

function TwitterDateConverter(time){
  var date = new Date(time),
    diff = (((new Date()).getTime() - date.getTime()) / 1000),
    day_diff = Math.floor(diff / 86400);
 
  if ( isNaN(day_diff) || day_diff < 0 || day_diff >= 31 )
    return;
 
  return day_diff == 0 && (
      diff < 60 && "just now" ||
      diff < 120 && "1 minute ago" ||
      diff < 3600 && Math.floor( diff / 60 ) + " minutes ago" ||
      diff < 7200 && "1 hour ago" ||
      diff < 86400 && Math.floor( diff / 3600 ) + " hours ago") ||
    day_diff == 1 && "Yesterday" ||
    day_diff < 7 && day_diff + " days ago" ||
    day_diff < 31 && Math.ceil( day_diff / 7 ) + " weeks ago";
}

function getTweet()
{
    $.getJSON("get_tweet.php", {
                  id_str_1: tweetId_Array[0],
                    id_str_2: tweetId_Array[1],
                    id_str_3: tweetId_Array[2],
                    id_str_4: tweetId_Array[3]
                  },
                     function(json) {

      tweetId_Array.push(json.results[0].id_str);
      tweetId_Array.shift();
      tweet = '<div class="tweet"><div class="tweet_box"><img src="'+json.results[0].profile_image_url+'" class="profile_image"><img src="images/twitter.png" class="social"><span class="from_user_name">' + json.results[0].from_user_name + '</span><span class="text"> ' + json.results[0].text + '</span> <span class="time"> ' + json.results[0].created_at + '</span></div></div>'; 

      $(tweet).animate({height: 'toggle'},2000).insertBefore("#tweets .tweet:first-child");
      $("#tweets .tweet:last-child").remove();

    });  
}

function getCheckin()
{
    $.getJSON("get_checkin.php", function(json) {
      if(json.results[0])
      {
        tweet = '<div class="tweet"><div class="tweet_box"><img src="https://is0.4sqi.net/userpix_thumbs'+json.results[0].foursquare_image_url+'" class="profile_image"><img src="images/foursquare.png" class="social"><span class="from_user_name" style="font-size:40px; margin-left:30px;">' + json.results[0].firstName + ' ' + json.results[0].lastName + '</span><span class="text" style="font-size:40px; margin-left:100px;"><br>Şu an Markafoni\'de. Hoşgeldiniz :)</span></div></div>'; 
        $(tweet).animate({height: 'toggle'},2000).insertBefore("#tweets .tweet:first-child");
        $("#tweets .tweet:last-child").remove();
      }
      else
        getTweet();
    });  
}


function getYoutubeVideo()
{
    $.getJSON("get_video.php", function(json) {
      if(json.results[0])
      {
        $('#player').show();
        player = new YT.Player('player', {
          height: '390',
          width: '640',
          videoId: json.results[0].video_id,
          events: {
            'onReady': onPlayerReady,
            'onStateChange': onPlayerStateChange
          }
        });
      }
      else
        getTweet();
    });  
}



function display(){ 
    second += 1;
  
  if(!(second%9)) 
    getCheckin();
  else
    getTweet();

  setTimeout("display()",16000);
  
  if(!(second%11)) 
  {
    $('#twitterSearch').liveTwitter('markafoni', {limit: 9, rate: 300000, imageSize: 80});
  }

} 
display();

</script>


<script>

      var tag = document.createElement('script');

      // This is a protocol-relative URL as described here:
      //     http://paulirish.com/2010/the-protocol-relative-url/
      // If you're testing a local page accessed via a file:/// URL, please set tag.src to
      //     "https://www.youtube.com/iframe_api" instead.
      tag.src = "https://www.youtube.com/iframe_api";
      var firstScriptTag = document.getElementsByTagName('script')[0];
      firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

      // 3. This function creates an <iframe> (and YouTube player)
      //    after the API code downloads.


      // 4. The API will call this function when the video player is ready.
      function onPlayerReady(event) {
        event.target.playVideo();
      }

      // 5. The API calls this function when the player's state changes.
      //    The function indicates that when playing a video (state=1),
      //    the player should play for six seconds and then stop.
      var done = false;
      function onPlayerStateChange(event) {
        if (event.data == YT.PlayerState.PLAYING) {
          setTimeout(stopVideo, 60000);
          done = true;
        }
      }


</script>

<div id="info">TweetDuvar.im - By Ozan Dikerler - info@tweetduvar.im</div>
<div id="twitterSearch" style="display: none;"></div>
</body>
</html>




