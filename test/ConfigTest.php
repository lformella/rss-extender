<?php

require_once(__DIR__ . "/../RssExtender.php");

class ConfigTest extends PHPUnit_Framework_TestCase
{
  protected $rssExtender;

  protected function setUp()
  {
    $this->rssExtender = new RssExtender();
  }

  public function testConfigContentRegexNotEmpty()
  {
  	$feeds = $this->rssExtender->getFeeds();
  	foreach ($feeds as $feed){
      foreach($feed->testUrls as $testUrl) {
        $test_url_content = $this->rssExtender->getFilteredContentOfUrl($feed, $testUrl, true, time());
        $this->assertNotEmpty($test_url_content, "In feed " . $feed->name . " a content regex returned an empty string: " . $testUrl);
      }
  	}
  }
}

