<?php

$config['author']		= "Markus Alexander Kuppe";
$config['author_url']		= "https://www.lemmster.de/";
$config['url']			= "http://feeds.dzone.com/javalobby/frontpage";
$config['base_url']		= "http://java.dzone.com";
$config['content']		= array("#<span class='print-link'></span>(.*)<div style=\"clear: both;\"></div>#Uis", 1);
//$config['search']		= array("", "");
//$config['replace']		= array("", "");
//$config['search']		= array("#<script.*>([^<]*)<\/script>#Uis","#<a name=\"fb_share\".*</a></div>#Uis");
//$config['replace']		= array("","");
?>
