<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="X-UA-Compatible" content="chrome=1" /> 
<title>Pedro Kostelec | personal website </title>
<meta content="Pedro Damian Kostelec is a student at Universty of Ljubljana, Slovenia.He's studying Computing and Informatics. He likes to experiment and create application using web technologies like Flash, Javascript, HTML and CSS." name="description">
<meta content="Pedro Kostelec, Pedro Damian Kostelec, web technologies, flash, java, HTML5, CSS, video, animation, experiments" name="keywords">
<link rel="shortcut icon" href="assets/images/favicon_16px.png">

<?php
	function rest_helper($url, $params = null, $verb = 'GET', $format = 'xml')
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
	$xml = rest_helper('http://posterous.com/api/readposts?hostname=flape')	;				
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
		/*$tags = "";
		foreach ($node->tag as $tag){
			$tags .= " <a href=\"http://$domain/tag/$tag\">#$tag</a>";
		}*/
		$date = date('d. M Y', strtotime($node->date));
		$html .= "<a href=\"$link\" class='postTitle'>$name</a> <span class='postDate'>$date</span><br />\n";			
	}
?>

<!--[if IE]>
<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

<link href="assets/css/html5reset-1.6.1.css" rel="stylesheet" type="text/css" media="screen">
<link href="assets/css/style0-1-1.css" rel="stylesheet" type="text/css" media="screen">
<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=PT+Sans:regular|Nobile:bold|Josefin+Slab:italic">
</head>

<body itemscope itemtype="http://data-vocabulary.org/Person">
  <div id="headerArea">
        <header>
            <h1>Pedro Kostelec</h1>
        </header>
    </div>
    <div id="wrapper">
    <h2>Hello, my name is Pedro Kostelec and I'm a <span itemprop="title">programmer, designer and college freshman at the <span itemprop="affiliation">University of Ljubljana</span>, <span itemprop="country-name">Slovenia</span></span>.</h2>
    <nav>
    	<a href="laboratory.html"><div id="labsBar">Labs<span class="icons labIcon"></span></div></a>
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
		<section id="content">
        <h1 class="section"><a href="laboratory.html" title="See more experiments by Pedro Kostelec">Labs</a></h1>
            <article>
            	<a title="XP Memorial" href="experiments/xpmemorial/" target="_self" class="experbutton" rel="prefetch">
                    <div class="experiment">
                      <h4>XP Memorial</h4>
                      <div class="tools"><div class="html5">HTML5</div><div class="js">Javascript</div></div>
                      <figure class="experFig"><img src="experiments/xpmemorial/thumbnail.jpg" width="64" height="64" alt="XP Memorial"/></figure>
                      <time datetime="2011-3-19">19. March 2011</time>
                      <p>A memorial to Windows XP's freezing errors.</p>
                    </div>
                </a>
                <a title="Pong in 2.5D" href="experiments/pong/index.html" target="_self" class="experbutton" rel="prefetch">
                    <div class="experiment">
                      <h4>Pong in 2.5D</h4>
                      <div class="tools"><div class="flash">Flash</div></div>
                      <figure class="experFig"><img src="experiments/pong/thumbnail.jpg" width="64" height="64" alt="Pong 3D"/></figure>
                      <time datetime="2011-2-2">2. February 2011</time>
                      <p>A Pong game with a nice 3D(2.5D) effect.</p>
                    </div>
                </a>
            </article>
        </section>
        <section id="blog">
        	<h1 class="section"><a href="http://blog.pedro.si" title="Read Pedro Kostelec's blog">Blog</a></h1>
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
                    echo $html;
                ?>
			</article>
        </section>
		
        <!--<section id="content">
        </section>-->

    <footer>
        <small>copyrigth 2010, <span itemprop="name">Pedro Damian Kostelec</span>, <a href="http://pedro.si" itemprop="url" title="Pedro Kostelec">pedro.si</a></small>
        <!--<a href="http://www.w3.org/html/logo/">
<img src="http://www.w3.org/html/logo/badge/html5-badge-h-css3-semantics.png" width="165" height="64" alt="HTML5 Powered with CSS3 / Styling, and Semantics" title="HTML5 Powered with CSS3 / Styling, and Semantics"></a>-->
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
