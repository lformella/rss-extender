<?php

$config['author']		= "Lars Formella";
$config['author_url']	= "http://www.larsformella.de/portfolio/programme-software/rss-extender/";
$config['url']			= "http://www.aptgetupdate.de/feed/"; // just add the url to rss feed
$config['base_url']		= "http://www.aptgetupdate.de/"; // add the normal url of the page
$config['content']		= array("#<div class=\"entry-content\">(.*)</div>\s*<!-- end .entry-content -->#Uis", 1);

?>
