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
	// posterous api url
	$url = "http://posterous.com/api/2/users/660455/sites/flape/posts/public";
	// call posterous api
	$curl = curl_init();
	curl_setopt($curl, CURLOPT_URL, $url);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 30);
	$answ = curl_exec($curl);
	curl_close($curl);
	// load the json
	$json = json_decode($answ);
	
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
	
	echo sizeof($json)." size of <br>";
	echo count($json)." count<br>";

	$postslink = "";
	$postNumber = 1;
	$maxposts = 7;
	//foreach($json as $post){
	for($i = 1; $i < count($json); $i++){
		/*if(--$postNumber >= 0)
			continue;
		if(--$maxposts <= 0)
			break;
		$link = $post->{'full_url'};					
		$date = date('d. M Y', strtotime($post->{'display_date'}));
		$name = $post->{'title'};
		$postslink .= "<a href=\"$link\" class='postTitle'>$name</a> <span class='postDate'>$date</span><br />\n";		*/
		$link = $json[$i]->{'full_url'};					
		$date = date('d. M Y', strtotime($json[$i]->{'display_date'}));
		$name = $json[$i]->{'title'};
		$postslink .= "<a href=\"$link\" class='postTitle'>$name</a> <span class='postDate'>$date</span><br />\n";		
	}
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