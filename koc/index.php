<?php
ini_set("display_errors",1); 

//tweetduvardb
//tweetduvardbuser
//Greytoad64
	

	define("HOST", "205.178.146.102");
	// Database user
	define("DBUSER", "tweetduvardbuser");
	// Database password
	define("PASS", "Greytoad64");
	// Database name
	define("DB", "tweetduvardb");
	/*
	
	define("HOST", "mysql5.sadecehosting.com");
	// Database user
	define("DBUSER", "perseferdbuser");
	// Database password
	define("PASS", "greytoad64");
	// Database name
	define("DB", "perseferdb");
*/
############## Make the mysql connection ###########
$conn = mysql_connect(HOST, DBUSER, PASS) or die (mysql_error().'Could not connect !<br />Please contact the site\'s administrator.');
 
$db = mysql_select_db(DB) or die (mysql_error().'Could not connect to database !<br />Please contact the site\'s administrator.');
mysql_query("SET NAMES utf8");

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>TweetDuvarım - Koç Üniversitesi Girişimcilik Kulübü</title>
        <link rel="apple-touch-icon" href="images/Apple-Touch-Icon.png"/>

	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js" type="text/javascript" ></script>
	<script src="http://gsgd.co.uk/sandbox/jquery/easing/jquery.easing.compatibility.js" type="text/javascript" ></script>
	<script src="jquery.livetwitter2.js" type="text/javascript"></script>
    	<script>
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

<link href="css/style.css" rel="stylesheet" type="text/css" />

</head>
<body>
<?php include_once("analyticstracking.php") ?>

 	<img src="images/bg2.jpg" id="bg" alt="">
    
    <?php
		$sql = "SELECT * FROM konuklar WHERE campaign = '1'";
		$result = mysql_query($sql) or die("Error code 93269591".mysql_error());
		if(mysql_num_rows($result)) {
			$row = mysql_fetch_array($result);
			extract($row);
			if($konuk_4 != "") echo "<div id=\"konuklar\" style=\"top:24%;\">".$konuk_1."<br>".$konuk_2."<br>".$konuk_3."<br>".$konuk_4;
			elseif($konuk_3 != "") echo "<div id=\"konuklar\">".$konuk_1."<br>".$konuk_2."<br>".$konuk_3;
			elseif($konuk_2 != "") echo "<div id=\"konuklar\">".$konuk_1."<br>".$konuk_2;
			elseif($konuk_1 != "") echo "<div id=\"konuklar\"><br>".$konuk_1."<br><br>";
			echo "</div>";
			
		}

	?>

    <div id="scroll">
		<div id="twitterSearch" class="tweets"></div>
	</div>


	<script type="text/javascript">

		// Basic usage
		$('#twitterSearch').liveTwitter('', {limit: 4, rate: 30000, imageSize: 70});

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
    
</body>
</html>
