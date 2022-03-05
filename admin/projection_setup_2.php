<!doctype html>
 
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>jQuery UI Resizable - Default functionality</title>
    <link rel="stylesheet" href="css/jquery-ui.css" />
    <script src="js/jquery-1.8.3.js"></script>
    <script src="js/jquery-ui.js"></script>
    <style>
    #resizable { width: 150px; height: 150px; padding: 0.5em; }
    #resizable h3 { text-align: center; margin: 0; }
    #projection { width: 800px; height: 600px; display: block; border: solid 1px black; overflow: hidden;}
    #projection_left {width: 248px; height: 590px; border: solid 1px black; float:left; }
    #projection_right {width: 548px; height: 598px;border: solid 1px #ddd; float:left; }
#upload_logo {
  position:absolute;
  left:50%;
  top:-100px;
  width:500px;
  height:200px;
  margin-left:-250px;
  margin-top:-50px;
  border: solid 1px #ddd;
}
    </style>
    <script>
    $(function() {
        $( "#resizable" ).resizable().draggable({ containment: "parent", cursor: "hand", delay: 100 });

$('#menu').click(function() {
  $('#upload_logo').animate({
        top: '50%'
  }, 1000, function() {

 $('#upload_logo').load('ajax/index.php', function() {
  alert('Load was performed.');
});   
    // Animation complete.
  });
});



    });



    </script>
</head>
<body>
 
<div id="projection">
    
    <div id="projection_left">
        <div id="resizable" class="ui-widget-content">
            <a href="#" id="menu">Click here to add a Logo</a>    
        </div>
    </div>

    <div id="projection_right"></div>


</div>
 

<div id="upload_logo"></div>

</body>
</html>