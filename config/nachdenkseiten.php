<?php

$config['author']     = "Sven Fischer";
$config['author_url'] = "http://blog.strubbl.de/";
$config['url']        = "http://www.nachdenkseiten.de/?feed=rss2";
$config['base_url']   = "http://www.nachdenkseiten.de";
$config['content']    = array("#<div class=\"entry single\">(.*)</div>\s*<div class=\"spendenfoerdern\">#Uis", 1);

$config['search']     = array("#<small>\s*<span class=\"upTop\">.*</small>#Uis");
$config['replace']    = array("");
#$config['test_urls']  = array("http://www.nachdenkseiten.de/?p=31435", "http://www.nachdenkseiten.de/?p=31365");

?>
