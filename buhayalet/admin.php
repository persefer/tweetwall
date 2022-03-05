<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>BuHayalet</title>
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
	margin:10px;
	width:30px;
	height:30px;
}
	</style>

</head>
<body>
<?php

if(isset($_REQUEST['time']) AND $_REQUEST['time'] != "")
{
	$timer = $_REQUEST['time'];
	$jquery_timer = $_REQUEST['time'] * 1000;
}
else
	die("time boş?");
?>

<form name="counter"><input type="text" size="8" 
name="d2"></form> 	
    

		<div id="twitterSearch" class="tweets"></div>
	
	<script type="text/javascript">
	
<!-- 
// 
 var second = <? echo $timer; ?>; 
 document.counter.d2.value='30' 

function display(){ 
	if(second <= 0)
		second = <? echo $timer; ?>;
    second-=1; 
    document.counter.d2.value=second; 
    setTimeout("display()",990);
} 
display();
--> 	
	
	
	
	
	
	

		// Basic usage
//		$('#twitterSearch').liveTwitter('markafoni OR beyazshow OR orcun OR okan', {limit: 9, rate: 5000, imageSize: 40});
		$('#twitterSearch').liveTwitter('buhayalet OR sinaafra OR zagortenay76', {rate: <? echo $jquery_timer; ?>, imageSize: 40, lang: "tr"});

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
$(function() {

	  $("checkbox").click(function(){
			alert(this.checked);
	  });    
 });
 
 
 var yasakla = function(id) { 
 		$.post("yasakla.php", { tweet_id: id });
  };


	</script>
    <br /><br /><br />
</body>
</html>
