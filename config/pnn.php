<?php
$config['author']		= "Lars Formella";
$config['author_url']	= "http://www.larsformella.de/portfolio/programme-software/rss-extender/";
$config['url']			= "https://www.pnn.de/contentexport/feed/home";
$config['base_url']		= "https://www.pnn.de/";

$config['content']  	= array('#<article[^>]*>(.*)</article>#Uis', 1);

$config['search']		= array('#<div[^>]*class="[^"]*ts-ad[^"]*"[^>]*>.*</div>#Uis',
								'#<aside[^>]*class="[^"]*(ts-ad|ts-html-box|ts-homepage-link)[^"]*"[^>]*>.*</aside>#Uis',
								'#<address[^>]*class="ts-authors-contact"[^>]*>.*</address>#Uis',
								'#<figure[^>]*class="[^"]*ts-gallery[^"]*"[^>]*data-command="articleGallery"[^>]*>.*</nav>[^>]*</figure>#Uis',
								'#<div class="ts-meta">.*</div>#Uis',
								'#<h1[^>]*class="ts-title"[^>]*>.*</h1>#Uis',
								'#<header[^>]*class="ts-article-header">.*<div[^>]*class="ts-subpage-header">.*</header>#Uis',
								'#<div[^>]*class="ts-subpage-index">.*</a>.*</div>#Uis'
								);
$config['replace']		= array('',
								'',
								'',
								'',
								'',
								'',
								'',
								''
								);

?>
