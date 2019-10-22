<?php
 function getNews() {
    $html = file_get_contents("https://columbia.jp/tomitamiyu/index.html");
    
    $dateArray = array();
    $newsArray = array();
    
    for ($i=0; $i<2; $i++) {
        $dateArray[$i] = phpQuery::newDocument($html)
        ->find("#wrapper")
        ->find(".container")
        ->find(".col2.clearfix")
        ->find(".newsCol")
        ->find(".articleWrap")
        ->find("dl")
        ->find("dt:eq(".$i.")")
        ->text();

        $newsArray[$i] = phpQuery::newDocument($html)
        ->find("#wrapper")
        ->find(".container")
        ->find(".col2.clearfix")
        ->find(".newsCol")
        ->find(".articleWrap")
        ->find("dl")
        ->find("dd:eq(".$i.")")
        ->text();
    }
    return [$dateArray, $newsArray];
}
?>