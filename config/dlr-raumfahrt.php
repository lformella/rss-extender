<?php

$config['author']		= "lightonflux";
$config['author_url']	= "lightonflux@znn.info";
$config['url']			= "http://feeds.feedburner.com/DLR_raumfahrt?format=xml"; // just add the url to rss feed
$config['base_url']		= "http://http://www.dlr.de"; // add the normal url of the page
$config['content']		= array("#<div class="article-preview mt20">(.*) </div>#Uis", 1);
$config['use_utf8']		= true;

?>
