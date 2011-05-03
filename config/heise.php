<?php

$config['author']		= "Lars Formella";
$config['author_url']	= "http://www.larsformella.de/portfolio/programme-software/rss-extender/";
$config['url']			= "http://www.heise.de/newsticker/heise-atom.xml";
$config['base_url']		= "http://www.heise.de";
$config['content']		= array("#<!--googleon: all-->\s*<!-- RSPEAK_START -->(.*)<!-- AUTHOR-DATA-MARKER-BEGIN -->#Uis", 1);
$config['search']		= array("#<span class=\"bildunterschrift\">.*<\/span>#Uis",
								"#<span class=\"source\">.*<\/span>#Uis",
								"#<h1>.*<\/h1>#Uis",
								"#<!-- RSPEAK_STOP -->#Uis",
								"#<!-- RSPEAK_START -->#Uis",
								"#<script.*>.*<\/script>#Uis",
								"#<noscript>.*<\/noscript>#Uis");
$config['replace']		= array("",
								"",
								"",
								"",
								"",
								"",
								"",
								"");

?>
