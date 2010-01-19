<?php

$config['author']		= "Rafael Bugajewski";
$config['author_url']	= "http://www.juicycocktail.com/";
$config['url']		= "http://rss.macworld.com/macworld/feeds/main";
$config['base_url']	= "http://www.macworld.com";
$config['content']	= array("#<div id=\"articleText\">(.*)<div class=\"mac_tags\">#Uis", 1);
$config['search']       = array("#<div id=\"loomia\".*<div id=\"loomia_display\"><\/div>#Uis");
$config['replace']      = array("<div>");

?>
