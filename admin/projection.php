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
.projection_setup {
	width: 100%;
	float: left;
	margin:10px;
	padding: 12px;
	background: #eee;
	-webkit-border-radius: 20px; -moz-border-radius: 20px; border-radius: 20px;
	border: solid #FFF 6px;
	box-shadow:inset 2px 2px 8px rgba(0,0,0,0.8);
	-moz-box-shadow:inset 5px 5px 20px rgba(0,0,0,0.9);
	-webkit-box-shadow:inset 5px 5px 20px rgba(0,0,0,0.9);
}
.template_icon {
	float: left;
	margin:7px;
	padding: 10px;
	width: 300px;
	height: 300px;
	-webkit-border-radius: 10px; -moz-border-radius: 10px; border-radius: 10px;
	border: solid #000 2px;
	box-shadow:1px 1px 4px rgba(0,0,0,0.8);
	-moz-box-shadow:5px 5px 4px rgba(0,0,0,0.9);
	-webkit-box-shadow:5px 5px 4px rgba(0,0,0,0.9);
	text-decoration: none;
}
.template_icon:hover {
	border: solid #00a2ff 2px;

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

<div style="width:100%; text-align:center;"><div style="width: 1000px; margin: 0px auto; text-align:left;">

<div class="projection_setup">
	<h2>Projection Screen - <b>Step 1</b> -> Step 2 -> Step 3</h2>

Select your Projection screen template<br>
Don't forget that you can change anything and very easily later.<br><br>

<a class="template_icon" href="projection_setup_2.php?template_id=1"><img src="images/template_1.jpg" style="text-align:center;"><br>If your projection screen is small, use this template for bigger tweet fonts</a>
<a class="template_icon" href="projection_setup_2.php?template_id=2"><img src="images/template_2.jpg"><br>If you have many presentation sessions, use this template for introducing session title and speaker name.</a>


</div>

</div></div>



	</body>
	</html>