<?php

$config['author']		= "Lars Formella";
$config['author_url']	= "http://www.larsformella.de/portfolio/programme-software/rss-extender/";
$config['url']			= "http://ticker.gulli.com/rss/";
$config['base_url']		= "http://www.gulli.com";
$config['content']		= array("#<h2 class=\"newsTeaser\">(.*)<div class=\"_bookmark\"><div id=\"socialshareprivacy\"></div></div>#Uis", 1);
$config['search']		= array("#<script type='text\/javascript'>.*<\/noscript>#Uis",
								"#<h4>.*</h4>#Uis",
								"#<div class=\"BreadCrumb\">.*<div class=\"inside\">#Uis",
								"#<div class=\"NewsHeading\">.*<\/div>#Uis",
								"#<!-- AddThis Button BEGIN -->.*<!-- AddThis Button END -->#Uis",
								"#<div class=\"BreadCrumb\">.*#is",
								"#<script type=\"text/javascript\">.*</script>#Uis",
								"#http://exit.gulli.com/url/#Uis", // stupid gulli puts crap in html
								"#<embed src=.*</embed>#Uis"); // no flash crap pls
$config['replace']		= array("",
								"",
								"<div>",
								"",
								"",
								"",
								"",
								"",
								"");
#$config['test_urls'] = array("http://www.gulli.com/news/27142-john-mcafee-will-iphone-fuer-die-us-regierung-knacken-2016-02-19", 
#                             "http://www.gulli.com/news/27118-russland-zensiert-oeffentliche-sperrliste-2016-02-15"
#                            );

?>
