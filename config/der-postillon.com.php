<?php
$config['author']     = "Markus Alexander Kuppe";
$config['author_url'] = "https://www.lemmster.de/";

$config['url']        = "http://feeds.feedburner.com/blogspot/rkEL";
$config['base_url']   = "http://der-postillon.com";

$config['content']    = array("#<div class='post-body entry-content.*itemprop='articleBody'>(.*)<div style='clear: both;'></div>#Uis", 1);

/* search[i] match is replaced with corresponding replace[i] */
//$config['search']     = array("");
//$config['replace']    = array("");

$config['use_utf8']	= false;
$config['test_urls'] = array("http://www.der-postillon.com/2016/02/sonntagsfrage-glauben-sie-dass-die_21.html",
                             "http://www.der-postillon.com/2016/02/lg-electronics-verbietet-verwendung-von.html"
                            );
?>
