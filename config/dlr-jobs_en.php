<?php

$config['author']		= "lightonflux";
$config['author_url']	= "http://znn.info";
$config['url']			= "http://feeds.feedburner.com/DLR_jobs_en?format=xml"; // just add the url to rss feed
$config['base_url']		= "http://dlr.de/en"; // add the normal url of the page
$config['content']              = array("#<div id=\"jobs-details-contentarea\">(.*) <div id=\"jobs-details-data\" style=\"display:none\">#Uis", 1);

?>
