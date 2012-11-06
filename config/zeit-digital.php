<?php

$config['author']		= "lightonflux";
$config['author_url']	= "http://znn.info";
$config['url']			= "http://newsfeed.zeit.de/digital/index"; // just add the url to rss feed
$config['base_url']		= "http://http://www.zeit.de/digital/index"; // add the normal url of the page
$config['content']		= array("#<!--AB HIER IHR CONTENT-->(.*)<div class="articlefooter af">#Uis", 1);
#$config['search	']		= array("#<ads>.*<\/ads>#Uis",);
#$config['replace']		= array("");
$config['use_utf8']		= true;
#$config['cdata_tags']	= array("some-special-feed-tag"); // if there are some tags in this feed with htmlspecialchars or something, add them here

?>

