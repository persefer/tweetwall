Client id A3GICCKGMI4TM25PJE1MTWOCELGPB11BSRGVZKF5CKJ3HT3W<br><br>
Client secret VZ0Z1MAHFPAISBMWTGL0GENPFK4WRKCW2200IEKSO5SXP5BR<br><br>

https://foursquare.com/oauth2/authenticate
    ?client_id=YOUR_CLIENT_ID
    &response_type=code
    &redirect_uri=YOUR_REGISTERED_REDIRECT_URI<br><br>

Taksim meydanı : 4b64c88af964a520d4cf2ae3<br>
Fitslim Sport Center : 4caca53bd971b1f7a35a32e1<br><br>


    <a href="
https://foursquare.com/oauth2/authenticate?client_id=A3GICCKGMI4TM25PJE1MTWOCELGPB11BSRGVZKF5CKJ3HT3W&response_type=code&redirect_uri=http://www.tweetduvar.im/fitslim/test.php">
https://foursquare.com/oauth2/authenticate?client_id=A3GICCKGMI4TM25PJE1MTWOCELGPB11BSRGVZKF5CKJ3HT3W&response_type=code&redirect_uri=http://www.tweetduvar.im/fitslim/test.php</a><br><br>

<?php

if(isset($_REQUEST['code']) AND $_REQUEST['code'] != "")
{
    echo "Code: ".$_REQUEST['code']."<br>";
    $a = file_get_contents("https://foursquare.com/oauth2/access_token?client_id=A3GICCKGMI4TM25PJE1MTWOCELGPB11BSRGVZKF5CKJ3HT3W&client_secret=VZ0Z1MAHFPAISBMWTGL0GENPFK4WRKCW2200IEKSO5SXP5BR&grant_type=authorization_code&redirect_uri=http://www.tweetduvar.im/fitslim/test.php&code=".$_REQUEST['code']);
    echo sizeof($a)."<hr>";
    print_r($a)."<hr>";
    print_r(json_decode($a))."<hr>";
    var_dump($a)."<hr>";
    $json = json_decode($a)."<br>";
    var_dump($json)."<hr>";
    echo "<a href=\"https://foursquare.com/oauth2/access_token?client_id=A3GICCKGMI4TM25PJE1MTWOCELGPB11BSRGVZKF5CKJ3HT3W&client_secret=VZ0Z1MAHFPAISBMWTGL0GENPFK4WRKCW2200IEKSO5SXP5BR&grant_type=authorization_code&redirect_uri=http://www.tweetduvar.im/fitslim/test.php&code=".$_REQUEST['code']."\">get token</a><br><br>";


      
    $ch = curl_init();  
    curl_setopt($ch, CURLOPT_POST, false); //POST Metodu kullanarak verileri gönder  
    curl_setopt($ch, CURLOPT_HEADER, false); //Serverdan gelen Header bilgilerini önemseme.  
    curl_setopt($ch, CURLOPT_URL, "https://foursquare.com/oauth2/access_token?client_id=A3GICCKGMI4TM25PJE1MTWOCELGPB11BSRGVZKF5CKJ3HT3W&client_secret=VZ0Z1MAHFPAISBMWTGL0GENPFK4WRKCW2200IEKSO5SXP5BR&grant_type=authorization_code&redirect_uri=http://www.tweetduvar.im/fitslim/test.php&code=".$_REQUEST['code']); //Bağlanacağı URL  
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); //Transfer sonuçlarını return et. Onları kullanacağım!  
    curl_setopt($ch, CURLOPT_TIMEOUT, 20); //20 saniyede işini bitiremezsen timeout ol.  
    $data = curl_exec($ch);  
    curl_close($ch);  
      
    echo "data".$data;  


}
else
{
    echo "token yok<br><br>";
}
?>

<hr>
<br>



https://api.foursquare.com/v2/simulate/venues/4caca53bd971b1f7a35a32e1/stats?oauth_token=SHYVI01HWSHCWXQJB5HL3NAWW0E4ZELLJTDS0CE3CEGSXDKU&v=20130126


var endpoint = "https://api.foursquare.com/v2/multi?requests=";
var numbers = new Array();
numbers[0] ="/venues/4caca53bd971b1f7a35a32e1";
numbers[1] = "/venues/50d8208ee4b0be097bf2f2e3";
var auth_string = "&client_id=A3GICCKGMI4TM25PJE1MTWOCELGPB11BSRGVZKF5CKJ3HT3W&client_secret=VZ0Z1MAHFPAISBMWTGL0GENPFK4WRKCW2200IEKSO5SXP5BR&v=20130110";
    var checkins = 0;
    var tips = 0;
    $.each(numbers,function(index,value) {
        $.getJSON(endpoint + numbers[index] + auth_string,function(json){
            $.each(json.response.responses,function(index){
                checkins = checkins + json.response.responses[index].response.venue.stats.checkinsCount;
                tips = tips + json.response.responses[index].response.venue.stats.tipCount;
            });
            $("#foursq1").html("Checkins: " + checkins + "<br />");
            $("#foursq2").html("Tips: " + tips);
        });
    });


https://api.foursquare.com/v2/venues/4caca53bd971b1f7a35a32e1/herenow?oauth_token=SHYVI01HWSHCWXQJB5HL3NAWW0E4ZELLJTDS0CE3CEGSXDKU&v=20130112


https://irs3.4sqi.net/img/user/YANNWBOUVJXE0W25.jpg
https://is0.4sqi.net/userpix_thumbs/YANNWBOUVJXE0W25.jpg



https://api.foursquare.com/v2/venues/4caca53bd971b1f7a35a32e1/herenow?oauth_token=SHYVI01HWSHCWXQJB5HL3NAWW0E4ZELLJTDS0CE3CEGSXDKU



