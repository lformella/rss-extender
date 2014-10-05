<?php

$config['author']     = "Sven Fischer";
$config['author_url'] = "http://blog.strubbl.de/";
$config['url']        = "http://www.nachdenkseiten.de/?feed=rss2";
$config['base_url']   = "http://www.nachdenkseiten.de";
$config['content']    = array("#<div class=\"entry single\">(.*)</div>\s*<!-- spendenfoerdern - BEGIN -->#Uis", 1);

$config['search']     = array("#<small>\s*<span class=\"upTop\">.*</small>#Uis");
$config['replace']    = array("");

?>
