<?php
//
// Feed.php
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
	public $searchContent = array();

	/**
	 * And replace the searches with new values here
	 * @var string[]
	 */
	public $replaceContent = array();

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
   * List of URLs of this feeds on which tests should run to verify content regex
   * @param array
   */
  public $testUrls = array();

	/**
	 * @param array $config
	 */
	public function __construct (array $config)
	{
		if (array_key_exists("author", $config))
		{
			$this->author = $config["author"];
		}
		if (array_key_exists("author_url", $config))
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
		if (array_key_exists("split", $config))
		{
			$this->contentSplitRegex = $config["split"][0];
			$this->contentSplitRegexPosition = $config["split"][1];
		}
		if (array_key_exists("use_feed", $config))
		{
			$this->useFeedContentTag = $config["use_feed"];
		}
		if (array_key_exists("test_urls", $config))
		{
			$this->testUrls = $config["test_urls"];
		}
	}
}
