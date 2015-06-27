<?php

$config['author']		= "lightonflux";
$config['author_url']	= "http://znn.info";
$config['url']			= "http://feeds.feedburner.com/blogspot/rkEL?format=xml"; // just add the url to rss feed
$config['base_url']             = "http://www.der-postillon.com"; // add the normal url of the page
$config['content']              = array("#<h3 class=\'post-title entry-title\' itemprop=\'name\'>(.*)<div class=\'post-footer\'>#Uis", 1);
$config['search	']		= array("#<ads>.*<\/ads>#Uis");
$config['replace']		= array("");

?>
