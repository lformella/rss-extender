<?php

$config['url']		= "http://www.tomshardware.com/de/feeds/rss2/tom-s-hardware-de,12-1.xml";
$config['base_url']	= "http://www.tomshardware.com";
$config['content']	= array("#<div id=\"news-content\" class=\"clearfix\">.*<div class=\"KonaBody\">(.*)</div>#Uis", 1);

?>
