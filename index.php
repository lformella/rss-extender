<?php
//  
//  Copyright (C) 2009 Lars Formella <ich@larsformella.de>
// 
//  This program is free software: you can redistribute it and/or modify
//  it under the terms of the GNU General Public License as published by
//  the Free Software Foundation, either version 3 of the License, or
//  (at your option) any later version.
// 
//  This program is distributed in the hope that it will be useful,
//  but WITHOUT ANY WARRANTY; without even the implied warranty of
//  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
//  GNU General Public License for more details.
// 
//  You should have received a copy of the GNU General Public License
//  along with this program.  If not, see <http://www.gnu.org/licenses/>.
// 

// version 0.2

require("./magpierss-0.72/rss_fetch.inc");
require("./httprequest.php");

/* ------------------------------------------------------------------ */

$folder = "./config";
if(isset($_GET['feed']))
{
	$feed = formatUrl($_GET['feed']);
	if (is_file($folder."/".$feed.".php"))
	{
		require($folder."/".$feed.".php");
		$config['name'] = $feed;
		echo getFeed($config);
	}
}
else
{
	if ($handle = opendir($folder))
	{
		echo "<html><head><title>RSS-Feeds</title>\n";
		echo "<link href='favicon.ico' rel='icon' type='image/icon' />\n";
		echo "<style>h1{text-align:center} #feeds{margin-left: auto; margin-right: auto; width:550px; padding: 20px; border: solid thin black}</style>\n";
		echo "</head><body>\n";
		echo "<h1>Feeds available:</h1>\n";
		while (false !== ($file = readdir($handle)))
		{
			if (is_file($folder."/".$file) && $file != "DEFAULT.php")
			{
				require($folder."/".$file);
				$name = substr($file, 0, -4);
				echo "<img src='".$config['base_url']."/favicon.ico' height='16' width='16' /> ".$config['base_url']." <strong>(".$name.")</strong> <small>(von <a href='".$config['author_url']."'>".$config['author']."</a>)</small><br><a href='?feed=".$name."'>".$config['url']."</a><br><hr>\n";
			}
		}
		closedir($handle);
		echo "</div>\n</body></html>";
	}
}

/* ------------------------------------------------------------------ */

function getFeed($options)
{
	$nocache = $_GET['nocache'];

	$folder = "./tmp";
	if(!is_dir($folder))
	{
		mkdir($folder);
		if(!is_dir($folder))
		{
			// ok just disable caching
			$nocache = true;
		}
	}

	$folder = "./tmp/".$options['name'];
	if(!is_dir($folder))
	{
		mkdir($folder);
		if(!is_dir($folder))
		{
			// ok just disable caching
			$nocache = true;
		}
	}

	$rss = fetch_rss($options['url']);
	#print_r($rss);

	if($rss->channel['link_'])
	{
		$rss->channel['link'] = $rss->channel['link_'];
		$rss->channel['link_'] = "";
	}

	//preg_match("#(http:\/\/.*\/).*#Uis", $rss->channel['link'], $match);
	//$options['base_url'] = $match[1];

	insertCDATA($rss->channel, array("description", "tagline"));

	$content = "";
	$content .= "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";
	$content .= "<rss version=\"2.0\" xmlns:dc=\"http://purl.org/dc/elements/1.1/\" xmlns:itunes=\"http://www.itunes.com/dtds/podcast-1.0.dtd\">\n";

	$count = 0;
	if(is_array($rss->items))
	{
		foreach ($rss->items as $item)
		{
			if($item['link_'])
			{
				$item['link'] = $item['link_'];
				$item['link_'] = "";
			}

			$url = $item['link'];
			$item['link'] = htmlentities($item['link']);
			#if(!$url) $url = $item['id'];

			$cdata_tags = array("title", "summary", "atom_content", "content|encoded", "category", "dc|creator");
			if(is_array($options['cdata_tags']))
			{
				$cdata_tags = array_merge($cdata_tags, $options['cdata_tags']);
			}
			insertCDATA($item, $cdata_tags);

			$date = $item['date'];
			if(!$date) $date = $item['pubdate'];
			if(!$date) $date = $item['dc']['date'];
			if(!$date) $date = $item['updated'];

			if($arr['use_feed'] == "")
			{
				$time = strtotime($date);
				$file = $folder."/".formatUrl($url);
				#echo filemtime($file)." == ".$time."\n";
				if(!$nocache && is_file($file) && filesize($file) > 0 && filemtime($file) == $time)
				{
					$html = file_get_contents($file);
				}
				else
				{
					$html = getHtml($url, $options);

					if(!$nocache)
					{
						$handle = fopen($file, "w");
						fwrite($handle, $html);
						fclose($handle);
						touch($file, $time);
					}
				}
				$item['description'] = "<![CDATA[".$html."]]>";
			}
			else
			{
				if(is_array($options['search']) && count($options['search']) > 0)
				{
					$item[$arr['use_feed']] = preg_replace($options['search'], $options['replace'], $item[$arr['use_feed']]);
				}
			}

			if($item['pubdate'])
			{
				$item['pubDate'] = $item['pubdate'];
				$item['pubdate'] = "";
			}
			if(!$item['pubdate'])
			{
				$item['pubDate'] = date("r", strtotime($date));
			}

			$rss->channel["item@".$count++."@"] = $item;
			#if($count > 1) break;
		}
		
		// clean up and delete everything older than last $time
		if ($handle = opendir($folder))
		{
			while (false !== ($file = readdir($handle)))
			{
				if (is_file($folder."/".$file) && filemtime($folder."/".$file) < $time)
				{
				    unlink($folder."/".$file);
				}
			}
			closedir($handle);
		}
	}

	$content .= getArray(array("channel" => $rss->channel), 1);
	$content .= "</rss>";

	return $content;
}

function insertCDATA(&$arr, $tag)
{
	if(is_array($tag))
	{
		foreach($tag AS $val)
		{
			insertCDATA($arr, $val);
		}
	}
	elseif($arr[$tag])
	{
		$arr[$tag] = "<![CDATA[".htmlentities($arr[$tag])."]]>";
	}
	else
	{
		$pos = strpos($tag, "|");
		if($pos !== false)
		{
			$tags = array(substr($tag, 0, $pos), substr($tag, $pos + 1));
			insertCDATA($arr[$tags[0]], $tags[1]);
		}
	}
}

/*
 * Um, what does this?!
 * I think it solves a big in magpierss and some unusual rss naming stuff
 */
function getArray($arr, $tree)
{
	$ret = "";
	if(is_array($arr))
	{
		foreach($arr AS $k => $var)
		{
			if(substr($k, -1) == "@")
			{
				$k = preg_replace("#@.*@#Uis", "", $k);
			}
			$res = getArray($var, $tree + 1);
			if(trim($res) != "")
			{
				for($a = 0; $a < $tree; $a++)
				{
					$ret .= "	";
				}
				$ret .= "<$k>";
				if(is_array($var))
				{
					$ret .= "\n";
				}
				$ret .= "$res";
				if(is_array($var))
				{
					for($a = 0; $a < $tree; $a++)
					{
						$ret .= "	";
					}
				}
				$ret .= "</$k>\n";
			}
		}
	}
	else
	{
		$ret .= "$arr";
	}
	return $ret;
}

/*
 * Gets a url with some options and returns the html
 * If a the page is splitted into multiple pages, it wil get all pages recursive
 */
function getHtml($url, $options)
{
	$http = new HTTPRequest($url);
	$arr = $http->DownloadToArray($http);

	$raw = $arr['content'];
	$url = $arr['url'];
	$content = "";
	
	if($raw != "")
	{
		preg_match_all($options['content'][0], $raw, $match);
		#print_r($match);
		foreach($match[$options['content'][1]] AS $val)
		{
			$content .= $val;
		}

		// realtive to absolute path
		$imgpath = substr($url, 0, strrpos($url, "/"));
		$content = preg_replace("/(<(img|IMG)[^>]+src[\s]*=[\s]*(\"|'))(\/)([^\"']+)(\"|')/i", "$1".$options['base_url']."/$5$3", $content);
		$content = preg_replace("/(<(img|IMG)[^>]+src[\s]*=[\s]*(\"|'))([^\"':]+)(\"|')/i", "$1".$imgpath."/$4$3", $content);

		if(is_array($options['search']) && count($options['search']) > 0)
		{
			$content = preg_replace($options['search'], $options['replace'], $content);
		}

		if($options['use_utf8'])
		{
			$content = utf8_encode($content);
		}

		if(is_array($options['split']))
		{
			preg_match($options['split'][0], $raw, $match);
			if($match[$options['split'][1]])
			{
				$content = preg_replace($options['split'][0], "", $content);
				$content .= "\n<br><hr><br>\n";
				$content .= getHtml($options['base_url'].$match[$options['split'][1]], $options);
			}
		}
	}

	return $content;
}

/*
 * Replaces all slashes and doublepoints in an url
 *
 */
function formatUrl($url)
{
	$url = str_replace("http://", "", $url);
	$url = str_replace("https://", "", $url);
	$url = str_replace("/", "_", $url);
	return $url;
}

?>
