<?php

$config['author']		= "Sven Fischer";
$config['author_url']	= "http://blog.strubbl.de/";
$config['url']			= "http://dilbert.com/feed";
$config['base_url']		= "http://dilbert.com";
$config['content']		= array("#<div class=\"img-comic-container\">(.*)<meta itemprop=\"isFamilyFriendly\"#Uis", 1);
$config['search'] = array("#src=\"http://dilbert.com#Uis");
$config['replace'] = array("src=\"https:");
$config['test_urls'] = array("http://dilbert.com/strip/2016-02-21", "http://dilbert.com/strip/2016-02-15");

?>
