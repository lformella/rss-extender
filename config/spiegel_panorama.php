<?php

$config['author']		= "Lars Formella";
$config['author_url']	= "http://www.larsformella.de/portfolio/programme-software/rss-extender/";
$config['url']			= "http://www.spiegel.de/panorama/index.rss";
$config['base_url']		= "http://www.spiegel.de/";
$config['content']		= array("#<div id=\"spArticleColumn\">(.*)<div id=\"spArticleFunctionsBottom\"#Uis", 1);
$config['search']		= array(	"#<div id=\"spArticleFunctions\">.*<\/div>#Uis",
									"#<iframe.*</iframe>#Uis",
									"#<div id=\"spFbTwitterBarTop\">.*<\/div>#Uis",
									"#<div id=\"spFbTwitterBarInfoTextTop\".*<\/div>#Uis");
$config['replace']		= array(	"",
									"",
									"",
									"");
$config['use_utf8']		= true;

?>
