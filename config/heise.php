<?php

$config['author']	= "http://www.larsformella.de/portfolio/programme-software/rss-extender/";
$config['url']		= "http://www.heise.de/newsticker/heise-atom.xml";
$config['base_url']	= "http://www.heise.de";
$config['content']	= array("#<!--googleon: index-->(.*)<!--googleoff: index-->#Uis", 1);
$config['search']	= array("#<span class=\"bildunterschrift\">.*<\/span>#Uis",
							"#<span class=\"source\">.*<\/span>#Uis",
							"#<h1>.*<\/h1>#Uis",
							"#<!-- RSPEAK_STOP -->#Uis",
							"#<!-- RSPEAK_START -->#Uis",
							"#<script.*>.*<\/script>#Uis");
$config['replace']	= array("",
							"",
							"",
							"",
							"",
							"",
							"");

?>
