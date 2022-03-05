<?php
include_once("db.php");
$sql = "SELECT * FROM youtube_videos ORDER BY play_count ASC LIMIT 1";
$result = mysql_query($sql) or die("Error code 93269591".mysql_error());
$JSON["results"]=array();
if(mysql_num_rows($result))
{
$row = mysql_fetch_array($result);
extract($row);
$play_count++;

  array_push($JSON["results"],
    array(
      "video_id" => $video_id
    )
  );
echo json_encode($JSON);

		$query = "UPDATE youtube_videos SET play_count = '".$play_count."' WHERE youtube_videos_table_id = '".$youtube_videos_table_id."'";
		$result = mysql_query($query) or die (mysql_error()."Error code 1702 mr_request.php");

}
?>