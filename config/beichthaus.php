<?php

$config['author']		= "Sven Fischer";
$config['author_url']		= "http://blog.strubbl.de/";
$config['url']			= "http://www.beichthaus.com/feed.rss2";
$config['base_url']		= "http://www.beichthaus.com";
$config['content']		= array("#<div class=bodytext style=\"padding:0 0 20px 12px;width:100%px;\">(.*)<iframe src=\"http://www.facebook.com/plugins/like.php#Uis", 1);
$config['search']		= array("#<nobr>#Uis",
					"#<a href=\"#Uis",
					"#<script type=\"text/javascript\"> initMap\(.*\); </script>#Uis",
					"#<script.*>.*</script>#Uis",
					"#align:left;#Uis",
					"#<object.*>.*</object>#Uis");
$config['replace']		= array("",
					"<a href=\"".$config['base_url'],
					"",
					"",
					"",
					"");
$config['use_utf8']		= true;
$config['cdata_tags']		= array("comments","guid");

?>
