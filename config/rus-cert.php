<?php

$config['author']		= "Sven Fischer";
$config['author_url']		= "http://blog.strubbl.de/";
$config['url']			= "http://cert.uni-stuttgart.de/ticker/rus-cert.xml";
$config['base_url']		= "http://cert.uni-stuttgart.de";
$config['content']		= array("#<h1>RUS-CERT-Meldung</h1>(.*)<P><B>Hinweis</B><BR>#Uis", 1);
$config['test_urls'] = array("https://cert.uni-stuttgart.de/ticker/article.php?mid=1740",
                             "https://cert.uni-stuttgart.de/ticker/article.php?mid=1728"
                            );

?>
