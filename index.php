<?php
@include("db.php");



if(isset($_REQUEST['email']) AND $_REQUEST['email'] != "" AND $_REQUEST['email'] != "e-mail adresiniz")
{
		$query = "INSERT INTO tw_emails (	email) 
						VALUES ('".addslashes($_REQUEST['email'])."')";
	$result = mysql_query($query) or die("title details eklenemedi: ".mysql_error());
}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>TweetDuvar.im</title>
<link href="css/default.css" rel="stylesheet" type="text/css" />
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js" type="text/javascript" ></script>
    	<script>
		$(function() {  
		
		<?php
		if($result)
		echo "			$(\"#success\").slideDown(\"slow\");			$(\"#form\").slideUp(\"slow\");";?>
		
		$('input:text').focus(function(){
			var newValue = $(this).val();
			if($(this).val() == 'e-mail adresiniz'){
				$(this).attr('value','');
			} else {
				$(this).val(newValue);
			}
		});
		
		 
		
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

</head>

<body>
<?php include_once("analyticstracking.php") ?>

<center>

 	<img src="images/bg.jpg" id="bg" alt="">

<br />
<img src="images/logo.png" />
<br /><br /><br />

<div id="info">Duyurulardan haberdar olmak için email adresinizi bırakabilirsiniz.</div>
<br />
<div id="form">
<form method="post" action="index.php">
<input type="text" class="input" value="e-mail adresiniz" name="email" id="email" />
<input type="submit" class="submit" value="Gönder" />
</form>
</div>

<div id="success" style="display:none; margin-top:20px; font-size:14px; font-weight: bold; color: #444; text-shadow: 1px 1px 0px #888; text-shadow: 1px 1px 0px #888;">Teşekkür ederiz :)</div>

<div id="icons">
<a href="https://tr.foursquare.com/v/tweetduvarim/4ffac72be4b036acfc582239" target="_blank"><img src="images/icon_foursquare.png" /></a>
<a href="#"><img src="images/icon_google.png" /></a>
<a href="https://twitter.com/#!/TweetDuvarim" target="_blank"><img src="images/icon_twitter.png" /></a>
<a href="#"><img src="images/icon_facebook.png" /></a>
</div>

</center>
</body>
</html>