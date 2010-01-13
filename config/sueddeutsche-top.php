<?

$config['url']		= "http://rss.sueddeutsche.de/rss/Topthemen";
$config['base_url']	= "http://www.sueddeutsche.de";
$config['content']	= array("#<div id=\"contentcolumn\" class=\"entry-content\" role=\"main\">(.*)<p class=\"quelle\">#Uis", 1);
#$config['search']	= array("");
#$config['replace']	= array("");
$config['use_utf8']	= true;

?>
