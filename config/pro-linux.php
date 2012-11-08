<?php

$config['author']		= "Lars Formella";
$config['author_url']	= "http://www.larsformella.de/portfolio/programme-software/rss-extender/";
$config['url']			= "http://www.pro-linux.de/rss/1/3/rss20_alles.xml";
$config['base_url']		= "http://www.pro-linux.de";
$config['content']		= array("#<div class=\"introtext\">(.*)<div class=\"endline\"></div>#Uis", 1);
$config['split']		= array("#<a href=\"http://www.pro-linux.de([^\"]*)\" class=\"nav_title\" title=\"nächste\">Nächste</a>#Uis", 1);
$config['search'] 		= array("#<div class=\"item_linkbox\">#Uis");
$config['replace'] 		= array("");

?>
