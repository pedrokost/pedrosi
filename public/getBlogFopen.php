<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Pedro Kostelec's blog</title>
<!--[if IE]>
<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

<link href="assets/css/html5reset-1.6.1.css" rel="stylesheet" type="text/css" media="screen">
<link href="assets/css/style0-1-1.css" rel="stylesheet" type="text/css" media="screen">
<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=PT+Sans:regular">
<style>
	body{
		background-image:none;
		background-color:transparent;	
	}
</style>
</head>

<body>
<?php
	function rest_helper($url, $params = null, $verb = 'GET', $format = 'json')
	{
	  $cparams = array(
		'http' => array(
		  'method' => $verb,
		  'ignore_errors' => true
		)
	  );
	  if ($params !== null) {
		$params = http_build_query($params);
		if ($verb == 'POST') {
		  $cparams['http']['content'] = $params;
		} else {
		  $url .= '?' . $params;
		}
	  }
	  $context = stream_context_create($cparams);
	  $fp = fopen($url, 'rb', false, $context);
	  if (!$fp) {
		$res = false;
	  } else {
		$res = stream_get_contents($fp);
	  }
	
	  if ($res === false) {
		throw new Exception('$verb $url failed: $php_errormsg');
	  }
	  switch ($format) {
		case 'json':
		  $r = json_decode($res);
		  if ($r === null) {
			throw new Exception('failed to decode $res as json');
		  }
		  return $r;
	
		case 'xml':
		  $r = simplexml_load_string($res);
		  if ($r === null) {
			throw new Exception('failed to decode $res as xml');
		  }
		  return $r;
	  }
	  return $res;
	}
	$json = rest_helper('http://posterous.com/api/2/users/660455/sites/flape/posts/public');
	//Generate latest post with text:
	$lastpost = '';
	//$url = $xml->post->url;
	$link = $json[0]->{'full_url'};					
	$date = date('d. M Y', strtotime($json[0]->{'display_date'}));
	$name = $json[0]->{'title'};
	//$views = $xml->post->views;
	$content = $json[0]->{'body_full'};
	$lastpost .= "<a href=\"$link\" class='postTitle'>$name</a> <span class='postDate'>$date</span><br />$content";	
	$morebutton = "<a href=\"$link\" title='Click to read the rest of the post' class='readmore' target='_blank'>&#8227;&#8227;keep reading</a>";
	
	$postslink = "";
	$postNumber = 1;
	$maxposts = 7;
	foreach($json as $post){
/*		if(--$postNumber >= 0)
			continue;*/
		if(--$maxposts <= 0)
			break;
		$link = $post->{'full_url'};					
		$date = date('d. M Y', strtotime($post->{'display_date'}));
		$name = $post->{'title'};
		$postslink .= "<a href=\"$link\" class='postTitle'>$name</a> <span class='postDate'>$date</span><br />\n";		
	}
	
	/*	$xml = rest_helper('http://posterous.com/api/2/users/660455/sites/flape/posts/public');
	//Generate latest post with text:
	$lastpost = '';
	//$url = $xml->post->url;
	$link = $xml->post->link;
	//$parts = parse_url($link);
	//$domain = $parts["host"];							
	$date = date('d. M Y', strtotime($xml->post->date));
	$name = $xml->post->title;
	$firstTitle = $name; 
	//$views = $xml->post->views;
	$content = $xml->post->body;
	$lastpost .= "<a href=\"$link\" class='postTitle'>$name</a> <span class='postDate'>$date</span><br />$content";	
	$morebutton = "<a href=\"$link\" title='Click to read the rest of the post' class='readmore' target='_blank'>&#8227;&#8227;keep reading</a>";
	// Generate titles to other posts
	$html = '';
	$maxpost = 6; //says one more, since first is the lastpost
	foreach ($xml->post as $node)
	{
		$name = $node->title;
		if($name == $firstTitle)
			continue;
		if(--$maxpost <= 0)
			break;
		$link = $node->link;			
		$tags = "";
		foreach ($node->tag as $tag){
			$tags .= " <a href=\"http://$domain/tag/$tag\">#$tag</a>";
		}
		$date = date('d. M Y', strtotime($node->date));
		$html .= "<a href=\"$link\" class='postTitle'>$name</a> <span class='postDate'>$date</span><br />\n";			
	}*/
?>
                 <article>
                    <h3>Last post</h3>
                    <div id="blogwrapper">
                        <?php
                            echo $lastpost;
                        ?>
                    </div><br />
                    <?php
                        echo $morebutton;
                    ?>
                </article>
                <article>
                    <h3>Read more</h3>
                    <?php
                        echo $postslink;
                    ?>
                </article>

</body>
</html>