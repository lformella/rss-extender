<?php

$config['author']		= "Lars Formella";
$config['author_url']	= "http://www.larsformella.de/portfolio/programme-software/rss-extender/";
$config['url']			= "http://www.pro-linux.de/NB3/rss/2/3/rss20_aktuell.xml";
$config['base_url']		= "http://www.pro-linux.de";
$config['content']		= array("#<div class=\"introtext\">(.*)<div class=\"endline\"></div>\n<div id=\"item_npinfo\">#Uis", 1);
$config['split']		= array("#<a href=\"http://www.pro-linux.de([^\"]*)\" class=\"nav_title\" title=\"nächste\">Nächste</a>#Uis", 1);
$config['search'] 		= array("#<div class=\"item_linkbox\">#Uis",
	"#<a href=\"javascript:(.*)\"><img(.*)></a>#Uis",
	"#<div class=\"picto\">(.*)</div>#Uis",
	"#<div class=\"imgartbox\" style=\"width:(.*)px;float:right;\">(.*)</div>#Uis",
	"#<div(.*)>#Uis",
	"#</div>#Uis");
$config['replace'] 		= array("",
	"<img$2>",
	"",
	"$2",
	"",
	""
	);

?>
