<?php

$config['author']		= "Lars Formella";
$config['author_url']	= "http://www.larsformella.de/portfolio/programme-software/rss-extender/";
$config['url']			= "http://www.heise.de/newsticker/heise-atom.xml";
$config['base_url']		= "http://www.heise.de";
$config['content'] = array("#<article[^>]*>(.*)<\/article>#Uis", 1);
$config['search']	= array(
  "#<h1.*>.*<\/h1>#Uis",
  "#<script.*>.*<\/script>#Uis",
  "#<noscript>.*<\/noscript>#Uis",
  "#<footer.*</footer>#Uis",
  "#<nav.*</nav>#Uis",
  "#<a-pvg.*<\/a-pvg>#Uis",
  "#<a-tabs class=\"a-pvgs\">.*</a-tabs>#Uis",
  "#<div class=\"article-actions\">.*</div>#Uis",
  "#<div class=\"a-article-teaser.*</div>#Uis",
  "#<div class=\"akwa.*</div>#Uis",
  "#<(div|ul) class=\"article_tags.*</(div|ul)>#Uis",
  "#<section class=\"article-sidebar\">.*</section>#Uis",
  "#<section class=\"rectangle_ad.*</section>#Uis",
  "#<section class=\"teaser.*</section>#Uis",
  "#<section class=\"a-grid.*</section>#Uis",
  "#<(figure|div|section|h3) class=\"a-x-card.*</(figure|div|section|h3)>#Uis",
  "#<aside.*</aside>#Uis",
  "#<header class=\"title\">.*</header>#Uis",
  "#<p class=\"forum\">.*</p>#Uis",
  "#<a href=\".*\" class=\"comment\" name=\"spalte.mac-and-i.forenbeitrag.[0-9]+\">.*</a>#Us",
  "#<div id=\"zett_kasten.*</div>#Uis",
  "#http://www.heise.de//#Uis"
  );
$config['replace'] = array(
  "",
  "",
  "",
  "",
  "",
  "",
  "",
  "",
  "",
  "",
  "",
  "",
  "",
  "",
  "",
  "",
  "",
  "",
  "",
  "",
  "",
  "//"
  );

?>
