<?php

$config['author']		= "Lars Formella";
$config['author_url']	= "http://www.larsformella.de/portfolio/programme-software/rss-extender/";
$config['url']			= "http://www.engadget.com/rss.xml"; // just add the url to rss feed
$config['base_url']		= "http://www.engadget.com"; // add the normal url of the page
$config['content']		= array("#<!-- surphace start -->(.*)<!-- surphace end -->#Uis", 1);
$config['use_utf8']		= true;

?>
