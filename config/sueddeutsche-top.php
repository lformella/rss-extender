<?php

$config['author']		= "Lars Formella";
$config['author_url']	= "http://www.larsformella.de/portfolio/programme-software/rss-extender/";
$config['url']			= "http://rss.sueddeutsche.de/rss/Topthemen";
$config['base_url']		= "http://www.sueddeutsche.de";
$config['content']		= array("#<section class=\"body\" id=\"article-body\">(.*)<section class=\"article-info\">#Uis", 1);

$config['search'] = array("#<div class=\"ad\".*<!-- END ad tag.* -->#Uis",
  "#<figure class=\"teaserable.*</figure>#Uis",
  "#<div id=\"article-sidebar-wrapper\".*</div>\s</div>#Uis",
  "#<section class=\"authors\">.*</section>#Uis",
  "#<script.*</script>#Uis");
$config['replace'] = array("",
                           "",
                           "",
                           "",
                           "");

$config['split'] = array("#<a href=\"http://www.sueddeutsche.de([^\"]*)\" class=\"article-paging-nav-btn\">#Uis", 1);

?>
