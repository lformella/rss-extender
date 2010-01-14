<?php

$config['author']		= "Lars Formella";
$config['author_url']	= "http://www.larsformella.de/portfolio/programme-software/rss-extender/";
$config['url']			= "http://ticker.gulli.com/rss/";
$config['base_url']		= "http://www.gulli.com";
$config['content']		= array("#<!-- start ContentLeft -->(.*)<!-- end ContentLeft -->#Uis", 1);
$config['search']		= array("#<script type='text\/javascript'>.*<\/noscript>#Uis",
								"#<h4>.*</h4>#Uis",
								"#<div class=\"BreadCrumb\">.*<div class=\"inside\">#Uis",
								"#<div class=\"NewsHeading\">.*<\/div>#Uis",
								"#<!-- AddThis Button BEGIN -->.*<!-- AddThis Button END -->#Uis",
								"#<div class=\"BreadCrumb\">.*#is");
$config['replace']		= array("",
								"",
								"<div>",
								"",
								"",
								"");
$config['use_utf8']		= true;

?>
