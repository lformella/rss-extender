<?php

$config['author']		= "Rafael Bugajewski";
$config['author_url']	= "http://www.juicycocktail.com/";
$config['url']		= "http://www.taz.de/1/rss.xml";
$config['base_url']	= "http://www.taz.de/";
$config['content']	= array("#<h1>(.*)<div class=\"plugin_links\">#Uis", 1);
$config['search']       = array("#<!-- start  smarty\/plugin_morearticles.tmpl -->.*<!--  end   smarty\/plugin_morearticles.tmpl -->#Uis");
$config['replace']      = array("<div>");

?>
