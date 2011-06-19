<?php 

class reddit
{
	public $title = '';
	public $link = '';
	public $date = '';
	public $description = '';
	
	function __construct($title, $link, $date, $description) 
	{
		$this->title = $title;
		$this->link = $link;
		$this->date = $date;
		$this->description = $description;
	}
}

$request_url = "http://www.reddit.com/.xml"; 
$xml = simplexml_load_file($request_url) or die("feed not loading");

foreach($xml->channel->item as $item)
{
	echo "<div class=\"item\">";
	echo "<a href=" .$item->link. ">" .$item->title. "</a>";
	echo "<p>" .$item->pubDate. "</p>";
	echo "<p>" .$item->description. "</p>";
	echo "</div>";
}

?>