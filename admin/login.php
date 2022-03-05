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
    <meta name="description" content="">
    <meta name="author" content="Ozan Dikerler">

    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="../ico/apple-touch-icon-57-precomposed.png">
    <link rel="shortcut icon" href="../ico/favicon.png">

    <title>Setup - TweetDuvarım</title>
    <link rel="apple-touch-icon" href="images/Apple-Touch-Icon.png"/>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js" type="text/javascript" ></script>
    <link href="../css/bootstrap.css" rel="stylesheet">
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


      .form-signin {
        max-width: 300px;
        padding: 19px 29px 29px;
        margin: 0 auto 20px;
        background-color: #fff;
        border: 1px solid #e5e5e5;
        -webkit-border-radius: 5px;
           -moz-border-radius: 5px;
                border-radius: 5px;
        -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
           -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                box-shadow: 0 1px 2px rgba(0,0,0,.05);
      }
      .form-signin .form-signin-heading,
      .form-signin .checkbox {
        margin-bottom: 10px;
      }
      .form-signin input[type="text"],
      .form-signin input[type="password"] {
        font-size: 16px;
        height: auto;
        margin-bottom: 15px;
        padding: 7px 9px;
      }
.menu {
  position:absolute;
  background-color:#abc;
  left:50px;
  width:300px;
  height:90px;
  margin:5px;
}
#info { z-index:900;
	height: 300px; top: 50%; margin-top: 150px;
	width:300px; margin-left: 20px;
	  	position:fixed; border-color:#333; background-color:#FFF;}

	</style>

	<script type="text/javascript">
	


		$('#info').animate({
    		left: '300px'
  		}, 5000, function() { alert("ozan");
  		});	  




$("#menu").onClick(function(){
  $("#menu").animate({"left": "+=50px"}, "slow");
});


  $('#menu').animate({
    left: '200px',
    top: 'toggle'
  }, {
    duration: 1000,
    specialEasing: {
      width: 'linear',
      height: 'easeOutBounce'
    },
    complete: function() {
 
    }
  });



	
	
	
	
	</script>


</head>
<body>

<div id="info">infookjbnjbnjnkmşooıjıjıjıjıjıjıjıjıjıjıjıjıjıjıjıjıoooo</div>


<div class="menu">

  <form class="form-signin">
    <h2 class="form-signin-heading">Please sign in</h2>
    <input type="text" class="input-block-level" placeholder="Email address">
    <input type="password" class="input-block-level" placeholder="Password">
    <label class="checkbox">
      <input type="checkbox" value="remember-me"> Remember me
    </label>
    <button class="btn btn-large btn-primary" type="submit">Sign in</button>

  </form>

</div>

<script src="../js/bootstrap.js"></script>
	</body>
	</html>