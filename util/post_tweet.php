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

        $statusCode = $twitter->getLastHttpCode();
        if ($statusCode != 200) {
            $errMsgs = getError($twitter->getLastBody());
            foreach ($errMsgs as $msg) {
                echo "error msg : " . $msg . "\r\n";
            }
            return false;
        }
        return true;
    }

    function getError($lastBody) {
        $errorMessages = [];
        foreach (($lastBody->errors) as $key => $stdObj) {
            $errorMessages[$key] = $stdObj->message;
        }
        return $errorMessages;
    }
?>