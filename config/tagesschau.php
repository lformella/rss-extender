<?php

$config['author']		= "Bernd Distler";
$config['author_url']	= "http://blog.bernd-distler.net/";
$config['url']			= "http://www.tagesschau.de/xml/rss2";
$config['base_url'] 	= "http://www.tagesschau.de";
$config['content']  	= array("#<div class=\"section sectionZ sectionArticle\".*>(.*)<div class=\"section section.*\">#Uis", 1);
$config['search']		= array("#<div class=\"teaser\">(.*)<!-- teaser -->#Uis",
								"#<iframe .*>.*</iframe>#Uis",
								"#<div class=\"shareCon\">.*<!-- .*Share Con -->#Uis",
								"#<div class=\"metablockwrapper\">.*<!-- / Meta-Trackback-Block -->*.</div>.*</div>#Uis",
								"#<p class=\"infotext\">(.*)</p>#Uis",
								"#<div class=\"tweet\">(.*)<!-- teaser -->#Uis",
								"#<form .*>.*<div class=\"button\" title=\"MP3.*>.*<a (.*)>.*</a>.*</div>.*<div class=\"button\" title=\"Ogg.*>.*<a (.*)>.*</a>.*</div>.*</form>#Uis",
								"#<form .*>.*<div class=\"button\" title=\"Video.*>.*<a (.*)>.*</a>.*</div>.*<div class=\"button\" .*>.*<a (.*)>.*</a>.*<div class=\"button\" .*>.*<a (.*)>.*</a>.*</div>.*<div class=\"button\" .*>.*<a (.*)>.*</a>.*</div>.*<div class=\"button\" .*>.*<a (.*)>.*</a>.*</div>.*<div class=\"button\" .*>.*<a (.*)>.*</a>.*</div>.*</form>#Uis",
								"#<p class=\"teasertext.*>.*<!-- media .*-->#Uis",
								"#<a href=\".*\" class=\"icon galerie\"><img .*></a>#Uis");
$config['replace']		= array("",
								"",
								"",
								"",
								"",
								"<blockquote>$1</blockquote>",
								"<blockquote>$1</blockquote>",
								"<blockquote><a $1>MP3</a> | <a $2>OGG</a></blockquote>",
								"<blockquote><a $1>h.264 (klein)</a> | <a $2>h.264 (mittel)</a> | <a $3>WebM (mittel)</a> | <a $4>h.264 (groß)</a> | <a $5>WebM (groß)</a> | <a $6>h.264 (HD)</a></blockquote>",
								"</div></div></div></div>",
								"");
$config['test_urls']	= array("https://www.tagesschau.de/ausland/brexit-grossbritannien-103.html",
								"https://www.tagesschau.de/inland/kindergeld-eu-auslaender-101.html");
?>
