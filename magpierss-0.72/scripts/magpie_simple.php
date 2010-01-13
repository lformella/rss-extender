<?php

define('MAGPIE_DIR', '../');
require_once(MAGPIE_DIR.'rss_fetch.inc');

$url = $_GET['url'];

if ( $url ) {
	$rss = fetch_rss( $url );
	echo "Channel: " . $rss->channel['title'] . "<p>";
	echo "<ul>";
	foreach ($rss->items as $item) {
		echo "<li><a href=".$item['link'].">".$item['title']."</a><br></li>";
	}
	echo "</ul>";
}
?>

<form>
	RSS URL: <input type="text" size="30" name="url" value="<?php echo $url ?>"><br />
	<input type="submit" value="Parse RSS">
</form>
  
<p>
<h2>Security Note:</h2>
This is a simple <b>example</b> script.  If this was a <b>real</b> script we probably wouldn't allow  strangers to submit random URLs, and we certainly wouldn't simply echo anything passed in the URL.  Additionally its a bad idea to leave this example script lying around.
</p>
