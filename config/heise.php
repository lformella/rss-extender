<?php

$config['author']		= "Lars Formella";
$config['author_url']	= "http://www.larsformella.de/portfolio/programme-software/rss-extender/";
$config['url']			= "http://www.heise.de/newsticker/heise-atom.xml";
$config['base_url']		= "http://www.heise.de";
$config['content']		= array("#<div class=\"meldung_wrapper\">(.*)</div>#Uis", 1);
$config['search']		= array("#<span class=\"bildunterschrift\">.*<\/span>#Uis",
								"#<span class=\"source\">.*<\/span>#Uis",
								"#<h1>.*<\/h1>#Uis",
								"#<!-- [a-z_-]+ -->#Uis",
								"#<script.*>.*<\/script>#Uis",
								"#<noscript>.*<\/noscript>#Uis");
$config['replace']		= array("",
								"",
								"",
								"",
								"",
								"");

?>
