<?php

$config['author']		= "lightonflux";
$config['author_url']	= "http://znn.info";
$config['url']			= "http://www.scilogs.de/kosmo/rss.php?summary=1"; // just add the url to rss feed
$config['base_url']		= "http://www.scilogs.de/kosmo/"; // add the normal url of the page
$config['content']		= array("#<div class=\"entrybody\">(.*)<div id=\"socialshareprivacy\">#Uis", 1);

?>
