<?php

$config['author']		= "Lars Formella";
$config['author_url']	= "http://www.larsformella.de/portfolio/programme-software/rss-extender/";
$config['url']			= "http://www.tomshardware.com/de/feeds/rss2/tom-s-hardware-de,12-1.xml";
$config['base_url']		= "http://www.tomshardware.com";
$config['content']		= array("#<div id=\"intelliTXT\">(.*)</div>#Uis", 1);
$config['search']		= array("#<strong>.*<\/strong>#Uis");
$config['replace']		= array("");

?>
