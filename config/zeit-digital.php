<?php

$config['author']		= "lightonflux";
$config['author_url']   	= "http://znn.info";
$config['url']			= "http://newsfeed.zeit.de/digital/index"; // just add the url to rss feed
$config['base_url']		= "http://www.zeit.de/"; // add the normal url of the page
$config['content']		= array("#<!--AB HIER IHR CONTENT-->(.*)<div class="show_smk" id="smk-plug"> </div>#Uis", 1);
$config['use_utf8']		= true;

?>

