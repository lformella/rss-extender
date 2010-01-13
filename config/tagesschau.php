<?php

$config['author']	= "http://blog.bernd-distler.net/";
$config['url']      = "http://www.tagesschau.de/xml/rss2";
$config['base_url'] = "http://www.tagesschau.de";
$config['content']  = array("#<span class=\"topline\">(.*)<div class=\"standDatum\">#Uis", 1);
$config['use_utf8'] = true;

?>
