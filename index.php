<?php
    require_once("./phpQuery-onefile.php");
    require_once("./util/tomi_news_scraping.php");
    require_once("./util/post_tweet.php");

    list($dateArray, $newsArray) = getNews();

    $tweet = "富田美憂さん最新NEWS\r\n\r\n";
    for ($i=0; $i<2; $i++) {
        $tweet = $tweet . $dateArray[$i] . "\r\n";
        $tweet = $tweet . $newsArray[$i] . "\r\n\r\n";
    }
    
    $isPosted = postTweet($tweet);
    if (!$isPosted) {
        echo "post faild\n";
        return;
    }
    echo "post success\n";
?>  