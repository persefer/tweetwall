<!DOCTYPE html>
<html>
<head>
  <script src="http://code.jquery.com/jquery-latest.js"></script>
</head>
<body>
  <form action="/" id="searchForm">
   <input type="text" name="s" placeholder="Search..." />
   <input type="submit" value="Search" />
  </form>
  <!-- the result of the search will be rendered inside this div -->
  <div id="result"></div>

<script>
  /* attach a submit handler to the form */
  $("#searchForm").submit(function(event) {

    /* stop form from submitting normally */
    event.preventDefault(); 
        
    /* get some values from elements on the page: */
    var $form = $( this ),
        term = $form.find( 'input[name="s"]' ).val(),
        url = $form.attr( 'action' );

    /* Send the data using post and put the results in a div */
    $.post( url, { s: term },
      function( data ) {
          var content = $( data ).find( '#content' );
          $( "#result" ).empty().append( content );
      }
    );
  });
  
  
  
  $.post("test.php", { name: "John", time: "2pm" } );
  $.post("test.php", { 'choices[]': ["Jon", "Susan"] });
  
  $.post("test.php", { "func": "getNameAndTime" },
 function(data){
   console.log(data.name); // John
   console.log(data.time); //  2pm
 }, "json");
  
jQuery.ajax({
          url: "http://www",
          type: "POST",
          data: {name: "amit", id:1 },
          dataType: "json",
          beforeSend: function(x) {
            if (x && x.overrideMimeType) {
              x.overrideMimeType("application/j-son;charset=UTF-8");
            }
          },
          success: function(result) {
 	     //Write your code here
          }
});  
  
</script>
<?php
echo $_REQUEST[name];
?>
</body>
</html>