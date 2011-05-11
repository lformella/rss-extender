<?php

$config['author']		= "Lars Formella";
$config['author_url']	= "http://www.larsformella.de/portfolio/programme-software/rss-extender/";
$config['url']			= "http://www.pro-linux.de/NB3/rss/index1.html";
$config['base_url']		= "http://www.pro-linux.de";
$config['content']		= array("#<div>Von\n<a href=\"http://www.pro-linux.de/user/2/(.*)</a>\n</div>\n\n(.*)</div>\n<div class=\"endline\"></div>\n<div id=\"item_npinfo\">#Uis", 2);
$config['split']		= array("#<a href=\"http://www.pro-linux.de([^\"]*)\" class=\"nav_title\" title=\"nächste\">Nächste</a>#Uis", 1);

?>
