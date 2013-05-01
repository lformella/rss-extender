<?php

$config['author']		= "Lars Formella";
$config['author_url']	= "http://www.larsformella.de/portfolio/programme-software/rss-extender/";
$config['url']			= "http://feeds.feedburner.com/UbuntuGeek";
$config['base_url']		= "http://www.ubuntugeek.com";
$config['content']		= array("#</center>(.*)<center>#Uis", 1);
$config['search']		= array("#<script.*><\/script>#Uis");
$config['replace']		= array("");

?>
