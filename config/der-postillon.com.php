<?php
$config['author']     = "Markus Alexander Kuppe";
$config['author_url'] = "https://www.lemmster.de/";

$config['url']        = "http://feeds.feedburner.com/blogspot/rkEL";
$config['base_url']   = "http://der-postillon.com";

//$config['content']    = array("#<div class='post-body entry-content' id='.*' itemprop='articleBody'>(.*)<div class=\"separator\" style=\"clear: both; text-align: center;\"></div>#Uis", 1);
$config['content']    = array("#<div class='post-body entry-content' id='.*' itemprop='articleBody'>(.*)<div style='clear: both;'></div>#Uis", 1);

/* search[i] match is replaced with corresponding replace[i] */
//$config['search']     = array("");
//$config['replace']    = array("");

$config['use_utf8']	= false;
?>