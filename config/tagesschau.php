<?php

$config['author']		= "Bernd Distler";
$config['author_url']	= "http://blog.bernd-distler.net/";
$config['url']			= "http://www.tagesschau.de/xml/rss2";
$config['content']	= array("#(<div class=\"section sectionZ.*>|<article.*>|<div class=\"NewsArticle-container\".*>)(.*?)#Uis", 2);

$config['search']	= array("#<\/article>.*#is",    								// swr.de, br.de, ... remove everything below article
				"#<div class=\"section sectionC.*\">.*#is",						// tagesschau.de remove everthing below article
				"#<iframe .*>.*<\/iframe>#Uis",								// remove iframes
				"#<div class=\"mediaInfo\">.*<p class=\"infotext\">(.*)<\/p>.*<div class=\"button\" title=\"Video.*512x288px.*<a href=\"(.*)\".*<!-- media -->#Uis",				// embed video
				"#<fieldset>.*Ogg Vorbis-Format.*<a href=\"(http:\/\/media.*)\">.*<\/fieldset>#Uis",	// embed audio
				"#<div class=\"shareCon\">.*<!-- .*Share Con -->#Uis",					// remove share buttons
				"#<div class=\"metablockwrapper\">.*<!--.*Meta-Trackback-Block -->*.</div>.*</div>#Uis",
				"#<div class=\"tweet\">(.*)<!-- teaser -->#Uis",
				"#class=\"icon galerie\".*>.*<\/a>#Uis",
				"#<div class=\"module voll\">.*<h3>#Uis",
				"#<section class=\"w100 svb hasbackground\" >.*#is",
				"#<div class=\"detail_top\">.*<div class=\"detail_inlay\">#Uis",
				"#<div class=\"socialMedia\">.*<div class=\"shareCon\">.*<\/div>.*<\/div>.*<\/div>#Uis",
				"#<div class=\"zoomtt\">.*<\/div>#Uis",
				"#<div class=\"commentarea jsb_ jsb_toggle\" data-jsb=\'{}\'>.*#is",
				"#<ul class=\"newSharing_func\">.*<\/ul>#Uis",
				"#<h2.*>Neuer Abschnitt<\/h2>#Uis",							// Remove "Neuer Abschnitt"
				);

$config['replace']	= array("",							// swr.de, br.de, ... remove everything below article
				"",							// tagesschau.de remove everything below article
				"",							// remove iframes
				'<video preload="none" controls="" width="100%"><source type="video/mp4" src="${2}"></source></video>${1}',		// embed video
				'<audio src="${1}">',					// embed audio
				"",							// remove share buttons
				"",
				"",
				"/>",
				"",
				"<h3>",
				"</div>",
				"<div class=\"detail_inlay\">",
				"",
				"",
				"",
				"",							// remove "Neuer Abschnitt"
				);

$config['test_urls']	= array("https://www.tagesschau.de/ausland/brexit-grossbritannien-103.html",
								"https://www.tagesschau.de/inland/kindergeld-eu-auslaender-101.html");
?>
