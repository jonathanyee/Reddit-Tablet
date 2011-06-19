<?php 

class Reddit
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

$thisPage = array();

foreach($xml->channel->item as $item)
{
	$reddit =& new Reddit($item->title, $item->link, $item->pubDate, $item->description);
	array_push($thisPage, $reddit);
}

?>

<!DOCTYPE html> 
<html lang="en"> 
<head>
	<title>Reddit Tablet</title>
	<link rel="stylesheet" href="style.css" />
</head>
<body>

	<div id="navigation">
		<ul>
			<li><a href="#">Front page</a></li>
			<li><a href="#">Messages</a></li>
			<h3>Subscriptions</h3>
			<li class="active"><a href="#">Ask Reddit</a></li>
			<li><a href="#">Blog</a></li>
			<li><a href="#">Funny</a></li>
			<li><a href="#">Gaming</a></li>
			<li><a href="#">Pics</a></li>
			<li><a href="#">Programming</a></li>
			<li><a href="#">Starcraft</a></li>
			<li><a href="#">WTF</a></li>
			<li><a href="#">Ask Reddit</a></li>
			<li><a href="#">Blog</a></li>
			<li><a href="#">Funny</a></li>
			<li><a href="#">Gaming</a></li>
			<li><a href="#">Pics</a></li>
			<li><a href="#">Programming</a></li>
			<li><a href="#">Starcraft</a></li>
			<li><a href="#">WTF</a></li>
		</ul>
	</div>

	<div id="posts">
		<?php
			foreach($thisPage as $i)
			{
				echo "<section>" .$i->title;
				echo "</section>";
			}
		?>
	</div>

</body>
</html>