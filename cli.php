<?php
//
// cli.php
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

require_once(__DIR__ . "/RssExtender.php");
$rssExtender = new RssExtender();

if (isset($argv[1]))
{
	$feed = $rssExtender->getFeed($argv[1]);
	if (!is_null($feed))
	{
		echo $rssExtender->getFeedContent($feed, true) . "\n";
	}
	else
	{
		echo "Feed " . $argv[1] . " not found\n";
		printAvailableFeeds($rssExtender);
	}
}
else
{
	echo "Usage: php cli.php FEEDNAME\n";
	printAvailableFeeds($rssExtender);
}

function printAvailableFeeds(RssExtender $rssExtender)
{
	echo "Available Feeds:\n";

	$feeds = $rssExtender->getFeeds();
	foreach ($feeds as $feed)
	{
		echo "\t" . $feed->name . "\n";
	}
}
