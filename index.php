<?php

	interface URL
	{
		public function Parse($p1, $p2, $p3);
	}

	class Article implements URL
	{
		public function Parse($p1, $p2, $p3)
		{
			$start = strpos($p1, $p2);
			$output = substr($p1, $start);
			return strip_tags(substr($output, 0, strpos($output, $p3)));
		}
	}		

	class Text implements URL
	{
		public function Parse($p1, $p2, $p3)
		{
			$start = strpos($p1, $p2);
			$output = substr($p1, $start);
			return strip_tags(substr($output, 0, strpos($output, $p3)));
		}
	}
		
	$url = file_get_contents('https://prometheus.org.ua/');

	$ParseArticle = new Article();
	echo $ParseArticle->Parse($url, '<h1 class="elementor-heading-title elementor-size-default">', '</h1>')."!";

	echo '<br />';

	$ParseText = new Text();
	echo $ParseText->Parse($url, '<div class="elementor-text-editor elementor-clearfix">', '</p>').".";

?>


<!DOCTYPE html>
<html lang="ua">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Парсинг строк с сайта Prometheus и переход на данный сайт</title>
	<style type="text/css">
		a 
		{
			text-decoration: none;
		}
		button
		{
			width: 150px;
			height: 50px;
			border: none;
			background: orange;
			cursor: pointer;
			font-size: 20px;
		}
		button:hover
		{
			background: red;
		}
	</style>
</head>
<body>
	<br /><br />
	<a href="https://prometheus.org.ua/"><button><i>Перейти</i></button></a>
</body>
</html>