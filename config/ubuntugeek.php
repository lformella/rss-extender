<?php

$config['author']		= "Lars Formella";
$config['author_url']	= "http://www.larsformella.de/portfolio/programme-software/rss-extender/";
$config['url']			= "http://feeds.feedburner.com/UbuntuGeek";
$config['base_url']		= "http://www.ubuntugeek.com";
$config['content']		= array("#<div class=\"text\">(.*)<div class=\"addtoany_share_save_container\">#Uis", 1);
$config['search']		= array("#<script.*>([^<]*)<\/script>#Uis",
								"#<a name=\"fb_share\".*</a></div>#Uis");
$config['replace']		= array("",
								"");

?>
