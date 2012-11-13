<?php

require_once("./Feed.php");

class RssExtender
{
	private $temporaryFolder = "./tmp";
	private $configFolder = "./config";
	private $contentNames = array("description", "summary", "atom_content", "content", "content:encoded");
	private $itemNames = array("item", "entry");

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
		$feedName = str_replace("/", "_", $feedName);
		$feedName = str_replace("\\", "_", $feedName);

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

		$folder = $this->temporaryFolder . $feed->name;
		if (!is_dir($folder))
		{
			mkdir($folder);
			if (!is_dir($folder))
			{
				// ok just disable caching
				$useCache = false;
			}
		}

		$feedContent = file_get_contents($feed->url);
		if ($feed->convertToUtf8)
		{
			//$feedContent = utf8_encode($feedContent);
		}

		$DOMDocument = new DOMDocument;
		$DOMDocument->strictErrorChecking = false;
		$DOMDocument->loadXML($feedContent);
		$this->traverseDom($feed, $DOMDocument->childNodes, $useCache);
		$content = $DOMDocument->saveXML();

		return trim($content);
	}

	/**
	 * Traverse through the DOM and look out for items
	 *
	 * @param Feed        $feed
	 * @param DOMNodeList $nodeList
	 * @param bool        $useCache
	 */
	private function traverseDom (Feed $feed, DOMNodeList $nodeList, $useCache)
	{
		foreach ($nodeList as $domElement)
		{
			if (substr($domElement->nodeName, 0, 1) != '#')
			{
				if (in_array($domElement->nodeName, $this->itemNames))
				{
					$this->extendItem($feed, $domElement, $useCache);
				}
				if ($domElement->firstChild)
				{
					$this->traverseDom($feed, $domElement->childNodes, $useCache);
				}
			}
		}
	}

	/**
	 * Extends one item with th full content of the specified link
	 *
	 * @param Feed       $feed
	 * @param DOMElement $domElement
	 * @param bool       $useCache
	 */
	private function extendItem (Feed $feed, DOMElement $domElement, $useCache)
	{
		/** @var $contentNode DOMElement */
		$contentNodes = array();
		$link = "";

		foreach ($domElement->childNodes as $child)
		{
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
		}

		$file = $this->temporaryFolder . $feed->name . "/" . md5($link);
		// get the article from cache
		if ($useCache && is_file($file) && filesize($file) > 0)
		{
			$raw = file_get_contents($file);
		}
		// load it from web
		else
		{
			$raw = file_get_contents($link);

			$handle = fopen($file, "w");
			fwrite($handle, $raw);
			fclose($handle);
		}

		$content = "";

		if ($raw != "")
		{
			preg_match_all($feed->contentRegex, $raw, $match);
			foreach ($match[$feed->contentRegexPosition] as $val)
			{
				$content .= $val;
			}
			/*
			// image realtive to absolute path
			$imgpath = substr($url, 0, strrpos($url, "/"));
			$content = preg_replace("/(<(img|IMG)[^>]+src[\s]*=[\s]*(\"|'))(\/)([^\"']+)(\"|')/i", "$1" . $feed->baseUrl . "/$5$3", $content);
			$content = preg_replace("/(<(img|IMG)[^>]+src[\s]*=[\s]*(\"|'))([^\"':]+)(\"|')/i", "$1" . $imgpath . "/$4$3", $content);
			*/
			// replace config stuff
			if (is_array($feed->searchContent) && count($feed->searchContent) > 0)
			{
				$content = preg_replace($feed->searchContent, $feed->replaceContent, $content);
			}
			/*
			if ($feed->convertToUtf8)
			{
				$content = u8_encode($content);
			}

			// multiple page splitting routine
			if ($feed->contentSplitRegex != "")
			{
				preg_match($feed->contentSplitRegex, $raw, $match);
				if ($match[$feed->contentSplitRegexPosition])
				{
					$content = preg_replace($feed->contentSplitRegex, "", $content);
					$content .= "\n<br><hr><br>\n";
					$content .= $this->getHtml($feed->baseUrl . $match[$feed->contentSplitRegexPosition], $feed);
				}
			}
			*/
		}

		// replace old with new content
		foreach ($contentNodes as $contentNode)
		{
			$newNode = $contentNode->ownerDocument->createElement($contentNode->nodeName, $content);
			foreach ($contentNode->childNodes as $child)
			{
				$child = $contentNode->ownerDocument->importNode($child, true);
				$newNode->appendChild($child);
			}

			foreach ($contentNode->attributes as $attrName => $attrNode)
			{
				@$newNode->setAttribute($attrName, $attrNode);
			}
			$domElement->replaceChild($newNode, $contentNode);
		}
	}
}
