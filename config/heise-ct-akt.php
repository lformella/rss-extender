<?php

include(__DIR__ . "/heise.php");

$config['author']		= "Sven Fischer";
$config['author_url']	= "http://blog.strubbl.de/";
$config['url']			= "http://www.heise.de/ct/rss/artikel-atom.xml";
$config['content'] = array("#(<div class=\"(article_page_text|meldung_wrapper|output_text)\">|<div id=\"artikel\".*\">|<section>)(.*)(</article>|<div class=\"clear\"></div>\s</div>|<\/div>(\s+<!-- RSPEAK_STOP -->)?\s+<!--googleoff: all-->|</section>)#Uis", 3);
$config['test_urls'] = array("http://heise.de/-3100718", "http://heise.de/-3120565");

?>
