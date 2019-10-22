<?php
    require_once("./phpQuery-onefile.php");
    require_once("./util/tomi_news_scraping.php");
    require_once("./util/post_tweet.php");

    list($dateArray, $newsArray) = getNews();

    $tweet = "富田美憂さんの最新ニュース\r\n\r\n";
    for ($i=0; $i<2; $i++) {
        $tweet = $tweet . $dateArray[$i] . "\r\n";
        $tweet = $tweet . $newsArray[$i] . "\r\n\r\n";
    }
    
    if (!postTweet($tweet)) {
        echo "post faild\n";
        return;
    }
    echo "post success\n";
?>  