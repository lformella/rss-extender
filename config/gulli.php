<?php

$config['author']		= "Lars Formella";
$config['author_url']	= "http://www.larsformella.de/portfolio/programme-software/rss-extender/";
$config['url']			= "http://ticker.gulli.com/rss/";
$config['base_url']		= "http://www.gulli.com";
$config['content']		= array("#</h2>[\r\n\t]*(<p>|)(.*)</p>[\r\n\t]*<p class=\"_redakteur( Right P0|)\">#Uis", 2);
$config['search']		= array("#<script type='text\/javascript'>.*<\/noscript>#Uis",
								"#<h4>.*</h4>#Uis",
								"#<div class=\"BreadCrumb\">.*<div class=\"inside\">#Uis",
								"#<div class=\"NewsHeading\">.*<\/div>#Uis",
								"#<!-- AddThis Button BEGIN -->.*<!-- AddThis Button END -->#Uis",
								"#<div class=\"BreadCrumb\">.*#is",
								"#<script type=\"text/javascript\">.*</script>#Uis",
								"#http://exit.gulli.com/url/#Uis"); // stupid gulli puts crap in html
$config['replace']		= array("",
								"",
								"<div>",
								"",
								"",
								"",
								"",
								"");

?>
