<?php

$config['author']	= "http://www.larsformella.de/portfolio/programme-software/rss-extender/";
$config['url']		= "http://rss1.smashingmagazine.com/feed/";
$config['base_url']	= "http://www.smashingmagazine.com";
$config['content']	= array("#<div class=\"entry-content\">(.*)</div>#Uis", 1);
$config['search']	= array("#\&lt;#Uis",
							"#\&gt;#Uis",
							"#\&quot;#Uis",
							"#\&lt;table\&gt;.*\&lt;\/table\&gt;#Uis");
$config['replace']	= array("<",
							">",
							"\"",
							"");
$config['use_feed']	= "summary";

?>
