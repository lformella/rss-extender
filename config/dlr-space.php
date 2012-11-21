<?php

$config['author']		= "lightonflux";
$config['author_url']	= "http://znn.info";
$config['url']			= "http://feeds.feedburner.com/DLR_space?format=xml"; // just add the url to rss feed
$config['base_url']		= "http://www.dlr.de/en"; // add the normal url of the page
$config['content']		= array("#<div class=\"article-preview mt20\">(.*)<div class=\"article-contact\">#Uis", 1);

?>
