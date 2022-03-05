<?php

include_once("db.php");



?>

    <div id="player"></div>

    <script src="http://www.youtube.com/player_api"></script>

    <script>

        // create youtube player
        var player;
        function onYouTubePlayerAPIReady() {
            player = new YT.Player('player', {
              height: '100%',
              width: '100%',
              videoId: 'QJFulqICzbI',
              allowfullscreen: 'true',
              suggestedQuality: 'small',
              events: {
                'onReady': onPlayerReady,
                'onStateChange': onPlayerStateChange
              }
            });
        }

        // autoplay video
        function onPlayerReady(event) {
            event.target.playVideo();
        }

        // when video ends
        function onPlayerStateChange(event) {        
            if(event.data === 0) {          
                $('#player').hide('slow');
            }
        }

    </script>