<?php

$config['author']		= "Lars Formella";
$config['author_url']	= "http://www.larsformella.de/portfolio/programme-software/rss-extender/";
$config['url']			= "http://www.nerdcore.de/feed/";
$config['base_url']		= "http://www.nerdcore.de";
$config['content']		= array("#<div class=\"entry-content\">(.*)</div>#Uis", 1);

$config['search'] =  array("#<div id=\"socialbuttons\">.*</div>#Uis",
                           "#&middot; <span class=\"commentscommentscomments\"><a href=.*Comments loading…</a></span>#Uis",
                           "#<h1 class=\"entry-title\">.*</h1>#Uis",
                           "#<p class=\"postmeta\">.*</p>#Uis");
$config['replace'] = array("",
                           "",
                           "",
                           "");

?>
