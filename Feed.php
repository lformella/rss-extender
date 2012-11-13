<?php

class Feed
{
	/**
	 * Name of the Feed
	 * @var string
	 */
	public $name = "";

	/**
	 * Author
	 * @var string
	 */
	public $author = "";

	/**
	 * Link to Authors Homepage
	 * @var string
	 */
	public $authorUrl = "";

	/**
	 * Url to rss feed like http://url.of.the.feed/feed.rss
	 * @var string
	 */
	public $url = "";

	/**
	 * Normal url of the page like http://normal.url.of.the.website
	 * @var string
	 */
	public $baseUrl = "";

	/**
	 * Regex where to find the content
	 * @var string
	 */
	public $contentRegex = "#(.*)#Uis";

	/**
	 * Number which is referencing to the regex - useful if you are using some ()
	 * @var int
	 */
	public $contentRegexPosition = 1;

	/**
	 * If you want to search the content with regexes you can do it here (helpful for filtering ads)
	 * @var string[]
	 */
	public $searchContent = array("#<ads>.*<\/ads>#Uis");

	/**
	 * And replace the searches with new values here
	 * @var string[]
	 */
	public $replaceContent = array("");

	/**
	 * Should this feed converted to UTF
	 * @var bool
	 */
	public $convertToUtf8 = true;

	/**
	 * If there are some tags in this feed with html special chars or something, add them here
	 * @var string[]
	 */
	public $additionalCdataTags = array();

	/**
	 * Regex where to split the content
	 * @var string
	 */
	public $contentSplitRegex = "";

	/**
	 * Number which is referencing to the split regex - useful if you are using some ()
	 * @var int
	 */
	public $contentSplitRegexPosition = 0;

	/**
	 * Should we use a feed content element instead of fetching it
	 * @var bool
	 */
	public $useFeedContentTag = "";

	/**
	 * @param array $config
	 */
	public function Feed (array $config)
	{
		if (array_key_exists("author", $config))
		{
			$this->author = $config["author"];
		}
		if (array_key_exists("author", $config))
		{
			$this->authorUrl = $config["author_url"];
		}
		if (array_key_exists("url", $config))
		{
			$this->url = $config["url"];
		}
		if (array_key_exists("base_url", $config))
		{
			$this->baseUrl = $config["base_url"];
		}
		if (array_key_exists("content", $config))
		{
			$this->contentRegex = $config["content"][0];
			$this->contentRegexPosition = $config["content"][1];
		}
		if (array_key_exists("search", $config))
		{
			$this->searchContent = $config["search"];
		}
		if (array_key_exists("replace", $config))
		{
			$this->replaceContent = $config["replace"];
		}
		if (array_key_exists("use_utf8", $config))
		{
			$this->convertToUtf8 = $config["use_utf8"];
		}
		if (array_key_exists("cdata_tags", $config))
		{
			$this->additionalCdataTags = $config["cdata_tags"];
		}
		if (array_key_exists("split", $config))
		{
			$this->contentSplitRegex = $config["split"][0];
			$this->contentSplitRegexPosition = $config["split"][1];
		}
		if (array_key_exists("use_feed", $config))
		{
			$this->useFeedContentTag = $config["use_feed"];
		}
	}
}
