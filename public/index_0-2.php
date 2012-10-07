<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Pedro Kostelec</title>
<meta content="Pedro Damian Kostelec is a student at Universty of Ljubljana, Slovenia.He's studying Computing and Informatics. He likes to experiment and create application using web technologies like Flash, Javascript, HTML and CSS." name="description">
<meta content="Pedro Kostelec, Pedro Damian Kostelec, web technologies, flash, java, HTML5, CSS, video, animation, experiments" name="keywords">

<!--[if IE]>
<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

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
			/*$tags = "";
			
			foreach ($node->tag as $tag)
			{
				$tags .= " <a href=\"http://$domain/tag/$tag\">#$tag</a>";
			}*/				
			$date = date("d. M Y", strtotime($node->date));
			//$date = date("Y-m-d H:i", strtotime($node->date));
			$name = $node->title;
			$views = $node->views;
			$html .= "<a href=\"$url\" class='postTitle'>$name</a> <span class='postDate'>$date</span><br />\n";	// $tags<br />\n";					
		}
	}
	
	
	//GET LAST POST CONTENT
	// posterous api url
	$url = "http://posterous.com/api/readposts?hostname=flape&num_posts=1";
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
		$lastpost = "";
		foreach ($xml->post as $node)
		{
			$url = $node->url;
			$link = $node->link;
			$parts = parse_url($link);
			$domain = $parts["host"];							
			$date = date("d. M Y", strtotime($node->date));
			$name = $node->title;
			$views = $node->views;
			$content = substr($node->body, 0, 800);
			$lastpost .= "<a href=\"$url\" class='postTitle'>$name</a> <span class='postDate'>$date</span><br />$content... <em><a href=\"$url\" title='Click here to read the rest of the post'>(keep reading)</a></em><br />\n";	// $tags<br />\n";					
		}
	}
?>

<link href="assets/css/html5reset-1.6.1.css" rel="stylesheet" type="text/css" media="screen">
<link href="assets/css/style.css" rel="stylesheet" type="text/css" media="screen">

<script type="text/javascript" src="http://fast.fonts.com/jsapi/8255cbf2-6b0e-4e91-8bad-ccee5a5754ba.js"></script>

</head>

<body>
	<div id="headerArea">
        <header>
            <h1>Pedro Kostelec</h1> 
        </header>
    </div>
    <div id="wrapper">
    <h2>Hello. I am a student at Universty of Ljubljana, Slovenia. I am studying Computing and Informatics.</h2>
    	<section id="contact">
        	<h1 class="section">Contact</h1>
            <ul>
            	<li><a href="#" title="Send me an email"><span id="mail">E-mail</span></a><p class="subdesc">Say Hi!</p></li>
                <li><a href="http://www.linkedin.com/in/pedrokostelec" target="_blank" title="Visit my LinkedIn profile"><span id="linkedin">LinkedIn</span></a><p class="subdesc">Connect to me</p></li>
            </ul>
        </section>
        	
        <section id="blog">
        	<h1 class="section">Blog</h1>
            <article>
            	<h3>Last post</h3>
            <?php
				print $lastpost;
			?>
            </article>
            <article>
            	<h3>Read more</h3>
			<?php
				print $html;
			?>
			</article>
        </section>    
            
        <section id="content">
        	<h1 class="section">Projects</h1>
            <article>
            	<h3>Personal website</h3>
                <p><img class="floatleft" src="assets/images/pedrosiscreenshot-300px.jpg" alt="My personal website">With this site, I wanted to create an online presence, and later will expand it to showcase my web and Flash work.</p>
                <p>The website was coded with hand-written HTML5, PHP and CSS 3. </p>
            </article>
        </section>
    <footer>
        <small>copyrigth 2010, Pedro Damian Kostelec</small>
	</footer>
    </div>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-19545605-1']);
  _gaq.push(['_setDomainName', '.pedro.si']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script> 
</body>
</html>
