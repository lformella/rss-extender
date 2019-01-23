![RSS-Extender](https://raw.github.com/lformella/rss-extender/master/rss-extender.png)

RSS-Extender is extending RSS-Feeds.

Test status of all configs having test cases: [![CircleCI](https://circleci.com/gh/Strubbl/rss-extender.svg?style=svg)](https://circleci.com/gh/Strubbl/rss-extender)

To use cache you need to create subfolder "tmp/" with write permissions (here user is www-data):
* $ mkdir tmp/
* $ chown www-data: tmp/

To enable [readability](https://github.com/andreskrey/readability.php) (fallback if regex rules fail) support:
* install [composer](https://getcomposer.org/)
* check that readability.php requirements (PHP 7.0+, ext-dom, ext-xml, and ext-mbstring) are installed
* $ composer update

For creating the regular expressions for the config files the web site http://regex101.com/ helps for testing.
