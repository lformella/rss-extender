<?php

include(__DIR__ . "/heise.php");

$config['author']		= "Sven Fischer";
$config['author_url']	= "http://blog.strubbl.de/";
$config['url']			= "http://www.heise.de/ct/rss/artikel-atom.xml";
$config['content'] = array("#(<div class=\"(meldung_wrapper|output_text)\">|<div id=\"artikel\".*\">)(.*)(</article>|<div class=\"clear\"></div>\s</div>|<\/div>(\s+<!-- RSPEAK_STOP -->)?\s+<!--googleoff: all-->)#Us", 3);

?>
