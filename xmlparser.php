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

//create reddit object
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
			$counter = 1;
			
			foreach($thisPage as $i)
			{
				echo "<section>";
				echo "<a href=\"#post-" .$counter++. "\">" .$i->title. "</a>";
				echo "</section>";
				echo "\n\n";
			}
		?>
	</div>
	
	<div id="content">
		<?php
			$counter = 1;
			
			foreach($thisPage as $i)
			{
				echo "<div id=\"#post-" .$counter++. "\">";
				echo "<a href=\"" .$i->link. "\">" .$i->title. "</a>";
				echo "<p>" .$i->description. "</p>";
				echo "</section>";
				echo "\n\n";
			}
		?>
	</div>

<script src="activatables.js" type="text/javascript"></script>
<script type="text/javascript">
activatables('post', ['post-1', 'post-2', 'post-3']);
</script>
	
</body>
</html>