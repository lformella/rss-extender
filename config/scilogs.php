<?php

$config['author']		= "lightonflux";
$config['author_url']	= "http://znn.info";
$config['url']			= "http://www.scilogs.de/"; // just add the url to rss feed
$config['base_url']		= "http://www.scilogs.de/wblogs/feed/rss.php"; // add the normal url of the page
$config['content']		= array("#<div class=\"entrybody\">(.*)<div class=\"entrybody\">#Uis", 1);

?>
