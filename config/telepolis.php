<?php
include(__DIR__ . "/heise.php");

$config['url']			= "http://www.heise.de/tp/news.rdf";
$config['content']  = array("#<div class=\"mar0\">(.*)<!--START-bottom-leiste-->#Uis", 1);
#$config['split']    = array("#<a href=\"([^\"]*)\" class=\"page next\" rel=\"next\">Nächste Seite</a>#Uis", 1); #split does not work here due to crippled website. we would need guid and 1st match here to create link to second page
array_push($config['search'],  "#<span class=\"vcard\" id=.*</span>\s*</div>#Uis");
array_push($config['replace'], "");
$config['test_urls'] = array("http://www.heise.de/tp/artikel/47/47452/1.html",
                             "http://www.heise.de/tp/news/Erdgas-EU-Kommission-will-Notfallplaene-3112645.html"
                            );

?>
