<?php

$config['author']		= "lightonflux";
$config['author_url']	= "http://znn.info";
$config['url']			= "http://newsfeed.zeit.de/digital/index"; // just add the url to rss feed
$config['base_url']		= "http://http://www.zeit.de/digital/index"; // add the normal url of the page
$config['content']		= array("#<!--AB HIER IHR CONTENT-->(.*)<div class="articlefooter af">#Uis", 1);
$config['use_utf8']		= true;

?>

