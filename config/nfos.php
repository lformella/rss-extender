<?php

$config['author']		= "Lars Formella";
$config['author_url']	= "http://www.larsformella.de/portfolio/programme-software/rss-extender/";
$config['url']			= "http://www.nfos.de/rdf.php";
$config['base_url']		= "http://www.nfos.de";
$config['content']		= array("#Plot:<\/b><hr style=\"width:99\%;\"/>.*<div style=\"height:120px;overflow:auto;padding-left:5px;width:99\%;text-align:left;\">(.*)</div>#Uis", 1);
$config['use_utf8']		= true;
$config['cdata_tags']	= array("groesse", "group", "videoquality", "encoding", "soundquality", "misc");

?>
