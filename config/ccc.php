<?php

$config['author']		= "Sven Fischer";
$config['author_url']		= "http://blog.strubbl.de/";
$config['url']			= "http://ccc.de/de/rss/updates.rdf";
$config['base_url']		= "http://ccc.de/";
$config['content']		= array("#<div class=\"abstract\">(.*)<div id=\"footer\">#Uis", 1);
$config['search'] 		= array("#<div(.*)>#Uis",
					"#</div>#Uis");
$config['replace'] 		= array("",
					"");
#$config['test_urls'] = array("https://www.ccc.de/de/updates/2016/smarthome", "https://www.ccc.de/de/updates/2014/ursel");

?>
