<?php

$config['author']	= "http://blog.bernd-distler.net/";
$config['url']      = "http://www.onlinekosten.de/news/feeds/atom";
$config['base_url'] = "http://www.onlinekosten.de";
$config['content']  = array("#<td class=\"newstxt\" colspan=\"3\">(.*)<br \/>\s*<\/td>\s*<\/tr>\s*<tr>\s*<td class=\"whitet#");
$config['search']   = array("#<table.*</table>#Uis");
$config['replace']  = array("");
$config['use_utf8'] = false;

?>
