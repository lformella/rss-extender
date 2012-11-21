<?php

$config['author']		= "lightonflux";
$config['author_url']	= "http://znn.info";
$config['url']			= "http://scienceblogs.com/feed"; // just add the url to rss feed
$config['base_url']		= "http://scienceblogs.com/"; // add the normal url of the page
$config['content']		= array("#<div class=\"content entry-content\">(.*)<div class=\"footer\">#Uis", 1);

?>
