<?php

$config['author']		= "chrugail";
$config['author_url']	= "http://blog.chrugail.ch/";
$config['url']			= "http://www.planet3dnow.de/rss/rss2.rdf";
$config['base_url']		= "http://www.planet3dnow.de";
$config['content']		= array("#<span id=\"intelliTxt\">(.*)<\/span>#Uis", 1);
$config['search	']		= array("#<ads>.*<\/ads>#Uis",);
$config['replace']		= array("");
$config['use_utf8']		= true;

?>
