<?php

$config['author']		= "lightonflux";
$config['author_url']	= "http://znn.info";
$config['url']			= "http://www.dlr.de/blogs/en/contentXXL/services/blogsexport/rss.asmx/getrssblogsbytabid?tabid=7023"; // just add the url to rss feed
$config['base_url']		= "http://dlr.de/blogs/en"; // add the normal url of the page
$config['content']		= array("#<div class=\"blogsdetailview\">(.*)Trackback URL#Uis", 1);

?>
