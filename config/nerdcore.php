<?php

$config['author']		= "Lars Formella";
$config['author_url']	= "http://www.larsformella.de/portfolio/programme-software/rss-extender/";
$config['url']			= "http://feeds2.feedburner.com/NerdcoreRSS2";
$config['base_url']		= "http://www.nerdcore.de";
$config['content']		= array("#<div class=\"entry-content\">(.*)</div> <!-- CLOSING ENTRY CONTENT -->#Uis", 1);

$config['search'] =  array("#<div id=\"socialbuttons\">.*</div> <!-- CLOSING SOCIALBUTTONS -->#Uis",
                           "#&middot; <span class=\"commentscommentscomments\"><a href=.*Comments loading…</a></span>#Uis");
$config['replace'] = array("",
                           "");

?>
