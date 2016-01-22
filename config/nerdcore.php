<?php

$config['author']		= "Lars Formella";
$config['author_url']	= "http://www.larsformella.de/portfolio/programme-software/rss-extender/";
$config['url']			= "http://www.nerdcore.de/feed/";
$config['base_url']		= "http://www.nerdcore.de";
$config['content']		= array("#<div class=\"postbody\">(.*)</div>[\n\r\s]*</div>[\n\r\s]*<!-- Load Disqus on Demand -->#Uis", 1);
$config['search'] =  array( "#<img.*data-lazy-type=\"image\".*<noscript>#Ui",
                            "#<\/noscript>#Ui"
                          );
$config['replace'] = array( "",
                            ""
                          );
?>
