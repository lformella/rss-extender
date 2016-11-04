<?php
include(__DIR__ . "/heise.php");

$config['url']			= "http://www.heise.de/tp/news-atom.xml";
$config['content']  = array("#(<figure class=\"aufmacherbild\">|<p class=\"lead beitraganriss\">)(.*)<footer class=\"beitragsfooter\">#Uis", 2);
#$config['split']    = array("#<a href=\"([^\"]*)\" class=\"page next\" rel=\"next\">Nächste Seite</a>#Uis", 1); #split does not work here due to crippled website. we would need guid and 1st match here to create link to second page
$config['search'] = array("#srcset=\".*>#Uis");
$config['replace'] = array(">");

$config['test_urls'] = array("http://www.heise.de/tp/artikel/47/47452/1.html",
  "http://www.heise.de/tp/news/Erdgas-EU-Kommission-will-Notfallplaene-3112645.html",
  "http://heise.de/-3455305"
                            );
?>
