<?php
//
// RssExtender.php
//
// Author:
//      Lars Formella <ich@larsformella.de>
//
// Copyright (c) 2012 Lars Formella
//
// This program is free software; you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation; either version 3 of the License, or
// (at your option) any later version.
//
// This program is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with this program; if not, write to the Free Software
// Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA 02111-1307 USA
//

require_once(__DIR__ . "/Feed.php");

class RssExtender
{
	private $temporaryFolder =  "";
	private $configFolder = "";
	private $contentNames = array("description", "summary", "atom_content", "content", "content:encoded");
	private $itemNames = array("item", "entry");
	private $timeNames = array("date", "updated", "pubDate");

	public function RssExtender ()
	{
		$this->temporaryFolder = __DIR__ . "/tmp";
		$this->configFolder = __DIR__ . "/config";
	}

	/**
	 * @return Feed[]
	 */
	public function getFeeds ()
	{
		$feeds = array();
		if ($handle = opendir($this->configFolder))
		{
			while (false !== ($file = readdir($handle)))
			{
				if (is_file($this->configFolder . "/" . $file) && $file != "DEFAULT.php")
				{
					$config = array();
					require($this->configFolder . "/" . $file);

					$feed = new Feed($config);
					$feed->name = substr($file, 0, -4);

					$feeds[] = $feed;
				}
			}
			closedir($handle);
		}
		return $feeds;
	}

	/**
	 * @param $feedName
	 *
	 * @return Feed
	 */
	public function getFeed ($feedName)
	{
		if (preg_match("[^a-z0-9_-.]", $feedName) > 0)
		{
			return null;
		}

		$feed = null;
		if (is_file($this->configFolder . "/" . $feedName . ".php"))
		{
			$config = array();
			require($this->configFolder . "/" . $feedName . ".php");
			$feed = new Feed($config);
			$feed->name = $feedName;
		}
		return $feed;
	}

	/**
	 * Gets a feed and returns the output
	 *
	 * @param Feed $feed
	 * @param bool $useCache
	 *
	 * @return string
	 */
	public function getFeedContent (Feed $feed, $useCache = true)
	{
		if (!is_dir($this->temporaryFolder))
		{
			mkdir($this->temporaryFolder);
			if (!is_dir($this->temporaryFolder))
			{
				// ok just disable caching
				$useCache = false;
			}
		}

		$folder = $this->temporaryFolder . "/" . $feed->name;
		if (!is_dir($folder))
		{
			mkdir($folder);
			if (!is_dir($folder))
			{
				// ok just disable caching
				$useCache = false;
			}
		}

		$feedContent = $this->getContentOfUrl($feed->url);

		$DOMDocument = new DOMDocument;
		$DOMDocument->strictErrorChecking = false;
		$DOMDocument->loadXML($feedContent);
		$lastTime = $this->traverseDomAndExtendItemsAndGetEarliestChangedTime($feed, $DOMDocument->childNodes, $useCache);
		$content = @$DOMDocument->saveXML();

		// clear old temporary files
		if ($handle = opendir($folder))
		{
			while (false !== ($file = readdir($handle)))
			{
				$filePath = $folder . "/" . $file;
				if (is_file($filePath) && filemtime($filePath) < $lastTime)
				{
					@unlink($filePath);
				}
			}
			closedir($handle);
		}

		if (strlen($content) < 50)
		{
			$content .= "<span style='font: #ff0000'>WARNING! Your feed content is almost empty!</span>";
		}

		return $this->clearWhitespaces($content);
	}

	/**
	 * Traverse through the DOM and look out for items
	 *
	 * @param Feed		$feed
	 * @param DOMNodeList $nodeList
	 * @param bool		$useCache
	 * @return int
	 */
	private function traverseDomAndExtendItemsAndGetEarliestChangedTime (Feed $feed, DOMNodeList $nodeList, $useCache)
	{
		$time = 0;

		foreach ($nodeList as $domElement)
		{
			if (substr($domElement->nodeName, 0, 1) != '#')
			{
				if (in_array($domElement->nodeName, $this->itemNames))
				{
					$currentTime = $this->extendItemAndGetChangedTime($feed, $domElement, $useCache);
					$time = $currentTime > 0 ? $currentTime : $time;
				}
				if ($domElement->firstChild)
				{
					$currentTime = $this->traverseDomAndExtendItemsAndGetEarliestChangedTime($feed, $domElement->childNodes, $useCache);
					$time = $currentTime > 0 ? $currentTime : $time;
				}
			}
		}

		return $time;
	}

	/**
	 * Extends one item with the full content of the specified link
	 *
	 * @param Feed       $feed
	 * @param DOMElement $domElement
	 * @param bool       $useCache
	 * @return int
	 */
	private function extendItemAndGetChangedTime (Feed $feed, DOMElement $domElement, $useCache)
	{
		/** @var $contentNodes DOMElement[] */
		$contentNodes = array();
		$link = "";
		$time = 0;

		foreach ($domElement->childNodes as $child)
		{
			/** @var $child DOMElement */
			$name = $child->nodeName;
			$value = $child->nodeValue;

			if ($name == "link")
			{
				$link = $value;
				if ($link == "")
				{
					$link = $child->getAttribute("href");
				}
			}
			else if (in_array($name, $this->contentNames))
			{
				$contentNodes[] = $child;
			}
			else if (in_array($name, $this->timeNames))
			{
				$time = strtotime($value);
			}
		}

		$filteredContent = $this->getFilteredContentOfUrl($feed, $link, $useCache, $time);
		foreach ($contentNodes as $contentNode)
		{
			// replace old with new content
			if ($filteredContent != "")
			{
				$newNode = $contentNode->ownerDocument->createElement($contentNode->nodeName);
				$newNode->setAttribute("type", "html");
				$textNode = $contentNode->ownerDocument->createTextNode($filteredContent);
				$newNode->appendChild($textNode);

				foreach ($contentNode->attributes as $attrName => $attrNode)
				{
					@$newNode->setAttribute($attrName, $attrNode);
				}

				$domElement->replaceChild($newNode, $contentNode);
			}
			// append warning!
			else
			{
				$contentNode->nodeValue .= "\n\n<br /><br /><span style='font: #ff0000'>WARNING! Your Rss-Extender rules returned an empty string for link: " .  $link . "</span>";
			}
		}

		return $time;
	}

	/**
	 * Get the content of the url and corrects it on forwards
	 *
	 * @param string $url
	 *
	 * @return string
	 */
	private function getContentOfUrl(&$url)
	{
		if (function_exists('curl_version'))
		{
			$curl = curl_init();
			curl_setopt($curl, CURLOPT_URL, $url);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
			$content = curl_exec($curl);
			$url = curl_getinfo($curl, CURLINFO_EFFECTIVE_URL);
			curl_close($curl);
		}
		else if (ini_get('allow_url_fopen'))
		{
			$originalUrlParts = parse_url($url);
			$context = stream_context_create(array('http' => array('header' => "Host: ".$originalUrlParts["host"]."\r\nUser-Agent: rss-extender 0.6", 'follow_location' => false, 'max_redirects' => '3')));
			$content = file_get_contents($url, false, $context);

			foreach ($http_response_header as $header)
			{
				if (stripos($header, "location:", 0) === 0)
				{
					$originalUrlParts = parse_url($url);
					$url = trim(substr($header, 9));
					$newUrlParts = parse_url($url);

					if (!isset($newUrlParts["host"]))
					{
						$url = isset($newUrlParts["scheme"]) ? $newUrlParts["scheme"] : $originalUrlParts["scheme"];
						$url .= "://" . $originalUrlParts["host"];
						if (isset($newUrlParts["user"]) && isset($newUrlParts["pass"]))
						{
							$url .= $newUrlParts["user"] . ":" . $newUrlParts["pass"] . "@";
						}
						if (isset($newUrlParts["path"]))
						{
							$url .= $newUrlParts["path"];
						}
						if (isset($newUrlParts["query"]))
						{
							$url .= "?" . $newUrlParts["query"];
						}
						if (isset($newUrlParts["fragment"]))
						{
							$url .= "#" . $newUrlParts["fragment"];
						}
					}

					$content = $this->getContentOfUrl($url);
				}
			}
		}
		else
		{
			$content = "<span style='font: #ff0000'>WARNING! curl and allow_url_open are deactivated / disabled.</span>";
		}

		return $content;
	}

	/**
	 * @param Feed   $feed
	 * @param string $url
	 * @param bool   $useCache
	 * @param int    $time
	 *
	 * @return string
	 */
	private function getFilteredContentOfUrl(Feed $feed, $url, $useCache, $time)
	{
		$file = $this->temporaryFolder . "/" . $feed->name . "/" . md5($url);
		// get the article from cache
		if ($useCache && is_file($file) && filesize($file) > 0 && filemtime($file) == $time)
		{
			$originalContent = file_get_contents($file);
		}
		// load it from web
		else
		{
			$originalContent = $this->getContentOfUrl($url);

			if ($handle = @fopen($file, "w"))
			{
				fwrite($handle, $originalContent);
				fclose($handle);
				touch($file, $time);
			}
		}

		// filter for main content
		$filteredContent = "";
		preg_match_all($feed->contentRegex, $originalContent, $match);
		foreach ($match[$feed->contentRegexPosition] as $val)
		{
			$filteredContent .= $val;
		}

		// image relative to absolute paths
		$imagePath = substr($url, 0, strrpos($url, "/"));
		$filteredContent = preg_replace("/(<(img|IMG)[^>]+src[\s]*=[\s]*(\"|'))(\/)([^\"']+)(\"|')/i", "$1" . $feed->baseUrl . "/$5$3", $filteredContent);
		$filteredContent = preg_replace("/(<(img|IMG)[^>]+src[\s]*=[\s]*(\"|'))([^\"':]+)(\"|')/i", "$1" . $imagePath . "/$4$3", $filteredContent);

		// links relative to absolute paths
		$filteredContent = preg_replace("/(href[\s]*=[\s]*(\"|'))(\/)([^\"']+)(\"|')/i", "$1" . $feed->baseUrl . "/$4$2", $filteredContent);

		// search and replace stuff
		if (is_array($feed->searchContent) && count($feed->searchContent) > 0)
		{
			$filteredContent = preg_replace($feed->searchContent, $feed->replaceContent, $filteredContent);
		}

		// multiple page splitting routine
		if ($feed->contentSplitRegex != "")
		{
			preg_match($feed->contentSplitRegex, $originalContent, $match);
			if ($match[$feed->contentSplitRegexPosition])
			{
				$filteredContent = preg_replace($feed->contentSplitRegex, "", $filteredContent);
				$filteredContent .= "\n<br><hr><br>\n";
				$filteredContent .= $this->getFilteredContentOfUrl($feed, $feed->baseUrl . $match[$feed->contentSplitRegexPosition], $useCache, $time);
			}
		}

		return $this->clearWhitespaces($filteredContent);
	}

	/**
	 * @param string $content
	 *
	 * @return string
	 */
	private function clearWhitespaces ($content)
	{
		return trim($content, "\n\r\t");
	}
}
