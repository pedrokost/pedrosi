<?php



		// posterous api url
		$url = "http://posterous.com/api/readposts?hostname=flape&num_posts=10";
		
		// call posterous api
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 30);
		$text = curl_exec($curl);
		curl_close($curl);
	
		// load the xml
		$xml = simplexml_load_string($text);
		
		if (count($xml->err) > 0)
		{
			// handle errors
			$html = "error: " . strtolower($xml->err[msg]);
		}
		else if (count($xml->post) > 0)
		{
			// construct output
			$html = "";

			foreach ($xml->post as $node)
			{
				
					
				$url = $node->url;
				$link = $node->link;
				
				$parts = parse_url($link);
				$domain = $parts["host"];
				
				$tags = "";
				foreach ($node->tag as $tag)
				{
				    $tags .= " <a href=\"http://$domain/tag/$tag\">#$tag</a>";
				}
				
				$date = date("Y-m-d H:i", strtotime($node->date));
				$name = $node->title;
				$views = $node->views;
				$html .= "$date - <a href=\"$url\">$name</a> ($views views) $tags<br />\n";
			}
		}
	
	
?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title>Flape blog content</title>
</head>
<body>

<?php
	print $lastpost;
	print $html;
?>
</body>
</html>