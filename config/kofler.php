<?php

$config['author']  	= "lightonflux";
$config['author_url']	= "http://znn.info";
$config['url']			= "http://kofler.info/feeds/blogfeed.rss"; // just add the url to rss feed
$config['base_url']		= "http://kofler.info/blog";
$config['content']		= array("#<div id=\"CGBlogPostDetailSummary\">(.*)<a href=\"feeds/blogfeed.rss\">#Uis", 1);

?>
