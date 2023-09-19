<?php
	$name = (isset($_GET["name"]) ? $_GET["name"] : "Human Being");

	$themes = [
		["name" => "snow", "title" => "Seasons Greetings for a White Christmas, " . $name . "!", "prompt" => "Generate a short paragraph as a greeting on a Christmas Card, involving snow and winter"],
		["name" => "food", "title" => "Dear " . $name . ", wishing you festive food and fun!", "prompt" => "Generate a short poem as a greeting on a Christmas Card, revoving around food"],
		["name" => "nativity", "title" => "Have a blessed Christmas, " . $name . "!", "prompt" => "Generate a short paragraph as a greeting on a Christmas Card, involving Jesus and the Nativity"]
	];

	$index = rand(0, 2);

	$content = $themes[$index]["prompt"];

	//prompts
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Xmas 2023</title>
		<link rel="stylesheet/less" type="text/css" href="css/styles.less" />

		<script src="js/less.min.js"></script>
	</head>

	<body class="theme_<?php echo $themes[$index]["name"]; ?>">
		<div class="card">
			<div class="image">

			</div>

			<div class="greeting">
				<h1><?php echo $themes[$index]["title"]; ?></h1>
				<p><?php echo $content; ?></p>
			</div>

			<div style="clear: both"></div>
		</div>
	</body>
</html>