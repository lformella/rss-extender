<?php

$config['author']		= "Bernd Distler";
$config['author_url']	= "http://blog.bernd-distler.net/";
$config['url']			= "http://www.tagesschau.de/xml/rss2";
$config['base_url'] 	= "http://www.tagesschau.de";
$config['content']  	= array("#<span class=\"topline\">(.*)<div class=\"standDatum\">#Uis", 1);

?>
