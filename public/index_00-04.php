<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="X-UA-Compatible" content="chrome=1" /> 
<title>Pedro Kostelec | personal website </title>
<meta content="Pedro Damian Kostelec is a student at Universty of Ljubljana, Slovenia.He's studying Computing and Informatics. He likes to experiment and create application using web technologies like Flash, Javascript, HTML and CSS." name="description">
<meta content="Pedro Kostelec, Pedro Damian Kostelec, web technologies, flash, java, HTML5, CSS, video, animation, experiments" name="keywords">
<link rel="shortcut icon" href="assets/images/favicon_16px.png">
<!--[if IE]>
<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

<!--<?php

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
	if (count($xml->err) > 0){
		// handle errors
		$html = "error: " . strtolower($xml->err[msg]);
	}
	else if (count($xml->post) > 0){
		//Generate latest post with text:
		$lastpost = "";
		$url = $xml->post->url;
		$link = $xml->post->link;
		$parts = parse_url($link);
		$domain = $parts["host"];							
		$date = date("d. M Y", strtotime($xml->post->date));
		$name = $xml->post->title;
		$views = $xml->post->views;
		$content = $xml->post->body;
		$lastpost .= "<a href=\"$link\" class='postTitle'>$name</a> <span class='postDate'>$date</span><br />$content";	
		$morebutton = "<a href=\"$link\" title='Click to read the rest of the post' class='readmore' target='_blank'>&#8227;&#8227;keep reading</a>";
		// Generate titles to other posts
		$html = "";
		foreach ($xml->post as $node)
		{
			$url = $node->url;
			$link = $node->link;
			$parts = parse_url($link);
			$domain = $parts["host"];				
			/*$tags = "";
			foreach ($node->tag as $tag){
				$tags .= " <a href=\"http://$domain/tag/$tag\">#$tag</a>";
			}*/
			$date = date("d. M Y", strtotime($node->date));
			//$date = date("Y-m-d H:i", strtotime($node->date));
			$name = $node->title;
			$views = $node->views;
			$html .= "<a href=\"$link\" class='postTitle'>$name</a> <span class='postDate'>$date</span><br />\n";	// $tags<br />\n";					
		}
		
		
		//LOad NEWS
		
		// posterous api url
		$url1 = "http://posterous.com/api/readposts?hostname=newprojects&num_posts=1";
		// call posterous api
		$curl1 = curl_init();
		curl_setopt($curl1, CURLOPT_URL, $url1);
		curl_setopt($curl1, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($curl1, CURLOPT_CONNECTTIMEOUT, 30);
		$text1 = curl_exec($curl1);
		curl_close($curl1);
		// load the xml
		$xml1 = simplexml_load_string($text1);
		if (count($xml1->err) > 0){
			// handle errors
			$newsarticle1 = "error: " . strtolower($xml1->err[msg]);
		}
		else if (count($xml1->post) > 0){
			//Generate latest post with text:
			$newsarticle = "";
			$url1 = $xml1->post->url;
			$link1 = $xml1->post->link;
			$parts1 = parse_url($link1);
			$domain1 = $parts1["host"];							
			$name1 = $xml1->post->title;
			$content1 = $xml1->post->body;
			$newsarticle .= "<h3>$name1</h3><br />$content1";	
		}
	}
?>-->

<link href="assets/css/html5reset-1.6.1.css" rel="stylesheet" type="text/css" media="screen">
<link href="assets/css/style0-1-1.css" rel="stylesheet" type="text/css" media="screen">
<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=PT+Sans:regular|Nobile:bold|Copse|Josefin+Slab:lightitalic,regular">

</head>

<body itemscope itemtype="http://data-vocabulary.org/Person">
  <div id="headerArea">
        <header>
            <h1>Pedro Kostelec</h1>
        </header>
    </div>
    <div id="wrapper">
    <h2>Hello. I am a <span itemprop="title">student</span> at <span itemprop="affiliation">University of Ljubljana</span>, <span itemprop="address" itemscope itemtype="http://data-vocabulary.org/Address"><span itemprop="country-name">Slovenia</span></span>. I am studying Computing and Informatics.</h2>
    <nav>
    	<a href="experiments.html"><div id="labsBar">Labs<span class="icons labIcon"></span></div></a>
        <a href="http://blog.pedro.si"><div id="blogBar">Blog<span class="icons blogIcon"></span></div></a>
    </nav>
    	<section id="contact">
        	<h1 class="section">Contact</h1>
            <ul>
            	<li id="mail"><a href="mailto:web@pedro.si?subject=Just%20saying%20hi!" title="Send me an email" target="_blank"><span  class="icons mailIcon"></span>E-mail
                <span class="subdesc">Say Hi!</span></a></li>
                <li id="linkedin"><a href="http://www.linkedin.com/in/pedrokostelec" target="_blank" title="Visit my LinkedIn profile" rel="prefetch"><span class="icons linkedinIcon"></span>LinkedIn
                <span class="subdesc">Connect to me</span></a></li>
            </ul>
        </section>
        	
        <section id="blog">
        	<h1 class="section"><a href="http://blog.pedro.si" title="Read Pedro Kostelec's blog">Blog</a></h1>
            <article>
            	<h3>Last post</h3>
                <div id="blogwrapper">
					<?php
                        print $lastpost;
                    ?>
                </div><br />
                <?php
                    print $morebutton;
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
        	<h1 class="section">News</h1>
            <article>
               <?php
                    print $newsarticle;
                ?>
            </article>
        </section>

    <footer>
        <small>copyrigth 2010, <span itemprop="name">Pedro Damian Kostelec</span>, <a href="http://pedro.si" itemprop="url">pedro.si</a></small>
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
