<?php

$config['author']	= "http://www.larsformella.de/portfolio/programme-software/rss-extender/";
$config['url']		= "http://www.pro-linux.de/NB3/rss/index1.html";
$config['base_url']	= "http://www.pro-linux.de";
$config['content']	= array("#<div>Von(.*)(<div id=\"item_nav\">|<div class=\"item_linkbox\">|<!-- Comment main start -->)#Uis", 1);
$config['split']	= array("#<a href=\"http://www.pro-linux.de([^\"]*)\" class=\"nav_title\" title=\"nächste\">Nächste</a>#Uis", 1);

?>
