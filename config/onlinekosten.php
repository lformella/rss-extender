<?php

$config['author']	= "Bernd Distler";
$config['author_url']	= "http://blog.bernd-distler.net/";
$config['url']      	= "http://www.onlinekosten.de/news/feeds/atom";
$config['base_url']	= "http://www.onlinekosten.de";
$config['content']  	= array("#<div class=\"newstxt\">(.*)<div style=\"clear: both; line-height: 1px;\"></div>#Uis", 1);
$config['search']   	= array("#<table.*</table>#Uis");
$config['replace']  	= array("");
$config['cdata_tags']	= array("author_name");
$config['use_utf8']	= true;

?>
