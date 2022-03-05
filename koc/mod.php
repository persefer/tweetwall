<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Moderatör - TweetDuvarım</title>
    <link rel="apple-touch-icon" href="images/Apple-Touch-Icon.png"/>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js" type="text/javascript" ></script>

<script type="text/javascript">

$.post("test.php", { name: "John", time: "2pm" } );


window.setInterval(function(){
	$.post('modul_mod.php', function(data) {
	  $('#result').prepend(data);
	});
}, 10000);

</script>


<style type="text/css">
.tweet {
	font-size: 24px;
	font-family:Helvetica;
	font-weight:bold;
	color: #000;
	width:96%;
	min-height:48px;
	
				background: #eee;
			margin: 24px 10px;
			padding: 8px;
			-moz-border-radius: 8px;
			-webkit-border-radius: 8px;
-moz-box-shadow: 0 0 10px black; -webkit-box-shadow: 0 0 10px black; box-shadow: 0 0 10px black;


}
</style>
</head>

<body>
<?php /*?><a href="mod.php" style="position:fixed; left:0; top:0; padding:7px 40px; text-decoration:none; background-color:#CCC; font-size:16px; border:solid 2px #000; color:#000; font-weight:bold;">Hepsini Temizle, Yenilerini Getir</a>
<?php */?>
<div id="result"></div>
</body>
</html>