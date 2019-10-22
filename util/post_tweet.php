<?php
    require_once("./service/service_key.php");
    require "vendor/autoload.php";
    use Abraham\TwitterOAuth\TwitterOAuth;
    
    function postTweet($tweet) {
        $twitter = new TwitterOAuth(
            CONSUMER_KEY,
            CONSUMER_SECRET,
            ACCESS_TOKEN,
            ACCESS_TOKEN_SECRET
        );
    
        $result = $twitter->post(
            "statuses/update",
            array("status" => $tweet)
        );

        if ($twitter->getLastHttpCode() == 200) {
            return true;
        }
        return false;
    }
?>