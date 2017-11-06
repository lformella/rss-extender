<?php
$config['author']		= 'Carsten Braune';
$config['author_url']	= 'http://www.carsten-braune.de';
$config['url']			= 'http://www.tagesspiegel.de/contentexport/feed/home';
$config['base_url'] 	= 'http://www.tagesspiegel.de';
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
								
$config['use_utf8']		= false;

$config['split']		= array('#<div[^>]*class="ts-subpage-index"[^>]*>.*<a[^>]*rel="next"[^>]*href="([^"]*)"[^>]*>.*</ul>.*</a>.*</div>#Uis', 1);

?>
