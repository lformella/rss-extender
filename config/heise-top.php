<?php

$config['author']		= "Lars Formella";
$config['author_url']	= "http://www.larsformella.de/portfolio/programme-software/rss-extender/";
$config['url']			= "http://www.heise.de/newsticker/heise-top-atom.xml";
$config['base_url']		= "http://www.heise.de";
$config['content']		= array("#<div class=\"(meldung_wrapper|output_text|kicker_toc|article-content)\">(.*)</div>(\s+<!-- RSPEAK_STOP -->)?\s+<!--googleoff: all-->#Uis", 2);
$config['search']		= array("#<span class=\"bildunterschrift\">.*<\/span>#Uis",
								"#<span class=\"source\">.*<\/span>#Uis",
								"#<h1>.*<\/h1>#Uis",
								"#<!-- [a-z_-]+ -->#Uis",
								"#<script.*>.*<\/script>#Uis",
								"#<noscript>.*<\/noscript>#Uis",
								"#<div class=\"video_titel\">[^<]*<\/div>#Uis",
								"#<section class=\"themenseite_preisvergleich.*<\/section>#Uis",
								"#http://www.heise.de//#Uis");
$config['replace']		= array("",
								"",
								"",
								"",
								"",
								"",
								"",
								"",
								"//");

?>
