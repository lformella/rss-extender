<?php

$config['author']		= "Lars Formella";
$config['author_url']	= "http://www.larsformella.de/portfolio/programme-software/rss-extender/";
$config['url']			= "http://www.nerdcore.de/feed/";
$config['base_url']		= "http://www.nerdcore.de";
$config['content']		= array("#<div class=\"entry-content\">(.*)<div class=\"entry-footer\">#Uis", 1);

$config['search'] =  array("#<h1 class=\"entry-title\">.*</h1>#Uis");
$config['replace'] = array("");
?>
