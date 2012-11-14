<?php

$config['author']		= "Lars Formella";
$config['author_url']	= "http://www.larsformella.de/portfolio/programme-software/rss-extender/";
$config['url']			= "http://rss.sueddeutsche.de/rss/Topthemen";
$config['base_url']		= "http://www.sueddeutsche.de";
$config['content']		= array("#<div id=\"contentcolumn\" class=\"entry-content\" role=\"main\">(.*)<p class=\"quelle\">#Uis", 1);

?>
