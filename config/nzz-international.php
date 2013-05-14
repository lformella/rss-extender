<?php

$config['author']       = "Thilo-Alexander Ginkel";
$config['author_url']   = "https://blog.ginkel.com";
$config['url']          = "http://www.nzz.ch/aktuell/international.rss";
$config['base_url']     = "http://www.nzz.ch/aktuell/international/";
$config['content']      = array("#</hgroup></header>(.*)<footer>#Uis", 1);
$config['search']       = array(
                            "#<div class=\"socialMediaFloaterArticleView group\">.*<!-- END div.social-media-floater --><\/div>#Uis",
                            "#<figcaption>.*<\/figcaption>#Uis",
                            "#<h5>(.*)<\/h5>#Uis"
                          );
$config['replace']      = array(
                            "",
                            "",
                            "<div><p>$1</p></div>"
                          );
?>
