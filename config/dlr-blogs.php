<?php

$config['author']		= "lightonflux";
$config['author_url']	= "http://znn.info";
$config['url']			= "http://feeds.feedburner.com/DLR_blogs?format=xml"; // just add the url to rss feed
$config['base_url']		= "http://dlr.de/blogs"; // add the normal url of the page
$config['content']		= array("#<div class=\"blogsdetailview\">(.*)Trackback URL#Uis", 1);

?>
