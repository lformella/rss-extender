<?php
$config['author']		= "Lars Formella";
$config['author_url']	= "http://www.larsformella.de/portfolio/programme-software/rss-extender/";
$config['url']			= "http://www.pnn.de/rss.xml";
$config['base_url']		= "http://www.pnn.de/";

$config['content']		= array("#</h1>(.*)<div class=um-metabar>#Uis", 1);

$config['search']		= array("#<div class=um-content-googlad id=urban-above-the-article>.*<\/div>#Uis");
$config['replace']		= array("");

?>
