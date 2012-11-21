<?php

$config['author']       = "Bernd Distler";
$config['author_url']   = "http://blog.bernd-distler.net";
$config['url']          = "http://www.hossli.com/feed/"; // just add the url to rss feed
$config['base_url']     = "http://www.hossli.com"; // add the normal url of the page
$config['content']      = array("#<div class=\"entry-content\">(.*)</div>\s*<!-- .post -->#Uis", 1);
$config['search']       = array("#<div class=\"sharethiswidget bottom\">.*</div>#Uis");
$config['replace']      = array("");

?>
