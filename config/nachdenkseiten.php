<?php

$config['author']		= "Sven Fischer";
$config['author_url']		= "http://blog.strubbl.de/";
$config['url']			= "http://www.nachdenkseiten.de/?feed=atom";
$config['base_url']		= "http://www.nachdenkseiten.de";
$config['content']		= array("#<div class=\"entry\">(.*)<div class=\"hr_wrap\"><hr /></div>#Uis", 1);
$config['use_utf8']		= true;
$config['cdata_tags']		= array("author_name", "link_replies");

?>
