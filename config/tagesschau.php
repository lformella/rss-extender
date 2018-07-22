<?php

$config['author']		= "Bernd Distler";
$config['author_url']	= "http://blog.bernd-distler.net/";
$config['url']			= "http://www.tagesschau.de/xml/rss2";
$config['base_url'] 	= "http://www.tagesschau.de";
$config['content']  	= array("#(<div class=\"section sectionZ sectionArticle\".*>|<article.*>)(.*)(<div class=\"section section.*\"|<\/article>)#Uis", 2);
$config['search']		= array("#<div class=\"teaser\">(.*)<!-- teaser -->#Uis",
								"#<iframe .*>.*<\/iframe>#Uis",
								"#<div class=\"mediaInfo\">.*<p class=\"infotext\">(.*)<\/p>.*<div class=\"button\" title=\"Video.*512x288px.*<a href=\"(.*)\".*<!-- media -->#Uis",
								"#<div class=\"shareCon\">.*<!-- .*Share Con -->#Uis",
								"#<div class=\"metablockwrapper\">.*<!--.*Meta-Trackback-Block -->*.</div>.*</div>#Uis",
								"#<div class=\"tweet\">(.*)<!-- teaser -->#Uis",
								"#<p class=\"teasertext.*>.*<!-- media .*-->#Uis",
								"#<a href=\".*\" class=\"icon galerie\"><img .*></a>#Uis",
								"#<div class=\"module voll\">.*<h3>#Uis",
								"#<section class=\"w100 svb hasbackground\" >.*#is",
								"#<div class=\"detail_top\">.*<div class=\"detail_inlay\">#Uis",
								"#<div class=\"socialMedia\">.*<div class=\"shareCon\">.*<\/div>.*<\/div>.*<\/div>#Uis",
								"#<div class=\"zoomtt\">.*<\/div>#Uis");
$config['replace']		= array("",
								"",
								'<video preload="none" controls="" width="100%"><source type="video/mp4" src="${2}"></source></video>${1}',
								"",
								"",
								"",
								'<blockquote>$1</blockquote>',
								"</div></div></div></div>",
								"",
								"<h3>",
								"</div>",
								"<div class=\"detail_inlay\">",
								"");
$config['test_urls']	= array("https://www.tagesschau.de/ausland/brexit-grossbritannien-103.html",
								"https://www.tagesschau.de/inland/kindergeld-eu-auslaender-101.html");
?>
