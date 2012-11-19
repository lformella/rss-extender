<?php

$config['author']		= "Please add your own name here";
$config['author_url']	= "Please add your own url here";
$config['url']			= "http://url.of.the.feed/fedd.rss"; // just add the url to rss feed
$config['base_url']		= "http://normal.url.of.the.website"; // add the normal url of the page
$config['content']		= array("#(.*)#Uis", 1);
$config['search	']		= array("#<ads>.*<\/ads>#Uis",);
$config['replace']		= array("");

?>
