<?php

$config['author']		= "Lars Formella";
$config['author_url']	= "http://www.larsformella.de/portfolio/programme-software/rss-extender/";
$config['url']			= "http://feeds2.feedburner.com/gbo-zitate";
$config['base_url']		= "http://german-bash.org";
$config['content']		= array("#<div class=\"zitat\">(.*)</div>.*<div class=\"pre_next\">#Uis", 1);
$config['search']		= array("#</span>#Uis");
$config['replace']		= array("</span><br>");

?>
