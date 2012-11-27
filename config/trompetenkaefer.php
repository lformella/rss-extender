<?php

$config['author']		= "lightonflux";
$config['author_url']	= "http://znn.info";
$config['url']			= "http://trompetenkaefer.wordpress.com/feed/"; // just add the url to rss feed
$config['base_url']		= "http://trompetenkaefer.wordpress.com"; // add the normal url of the page
$config['content']		= array("#<div class=\"post_content\">(.*)<div class=\"wpadvert\" style=\"position: relative; width:300px; text-align: center; padding: 0; margin: 10px auto; overflow: hidden;\">#Uis", 1);

?>
