<?php

$config['url']			= "http://url.of.the.feed/fedd.rss";
$config['base_url']		= "http://normal.url.of.the.website";
$config['content']		= array("#(.*)#Uis", 1);
$config['search	']		= array("#<ads>.*<\/ads>#Uis",);
$config['replace']		= array("");
$config['use_utf8']		= true;
$config['cdata_tags']	= array("some-special-feed-tag");

?>
