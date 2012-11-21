<?php

$config['author']       = "Bernd Distler";
$config['author_url']   = "http://blog.bernd-distler.net";
$config['url']          = "http://www.airbuspilot.ch/feed/"; // just add the url to rss feed
$config['base_url']     = "http://www.airbuspilot.ch"; // add the normal url of the page
$config['content']      = array("#<!-- begin content -->.*<div class=\"entry\">(.*)<!-- Social Bookmarks BEGIN -->#Uis", 1);

?>
