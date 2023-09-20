<?php
	$name = (isset($_GET["name"]) ? $_GET["name"] : "Human Being");

	$themes = [
		["name" => "snow", "title" => "Seasons Greetings for a White Christmas, " . $name . "!", "prompt" => "Generate a short paragraph, between 100 to 150 words, as a greeting on a Christmas Card, involving snow and winter"],
		["name" => "food", "title" => "Dear " . $name . ", wishing you festive food and fun!", "prompt" => "Generate a short poem, of 20 lines, as a greeting on a Christmas Card, revoving around food"],
		["name" => "nativity", "title" => "Have a blessed Christmas, " . $name . "!", "prompt" => "Generate a short paragraph, between 50 to 100 words, as a greeting on a Christmas Card, involving Jesus and the Nativity"]
	];

	$index = rand(0, 2);

	$content = $themes[$index]["prompt"];

	//api call
	$key = "sk-xxx";
	
    $url = 'https://api.openai.com/v1/chat/completions';  
    
    $headers = array(
        "Authorization: Bearer {$key}",
        "OpenAI-Organization: org-FUOhDblZb1pxvaY6YylF54gl", 
        "Content-Type: application/json"
    );
    
    // Define messages
    $messages = [];
	$obj = [];
    $obj["role"] = "user";
    $obj["content"] = $themes[$index]["prompt"];
	$messages[] = $obj;
    	
    // Define data
    $data = array();
    $data["model"] = "gpt-3.5-turbo";
    $data["messages"] = $messages;
    $data["max_tokens"] = 1000;

    // init curl
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_POST, 1);
    curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

	$result = curl_exec($curl);
    if (curl_errno($curl)) {
        echo 'Error:' . curl_error($curl);
    } 
    
    curl_close($curl);	
	
	$result = json_decode($result);
	$content = nl2br($result->choices[0]->message->content);
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
