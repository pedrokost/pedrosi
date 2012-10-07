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
            <article id="loadingBlog">
            	<p>Loading recent blog posts...<br/><br/></p>
            </article>
			<script>
				/***********************************************
				* IFrame SSI script II- © Dynamic Drive DHTML code library (http://www.dynamicdrive.com)
				* Visit DynamicDrive.com for hundreds of original DHTML scripts
				* This notice must stay intact for legal use
				***********************************************/
				//Input the IDs of the IFRAMES you wish to dynamically resize to match its content height:
				//Separate each ID with a comma. Examples: ["myframe1", "myframe2"] or ["myframe"] or [] for none:
				var iframeids=["blogFrame"];
				//Should script hide iframe from browsers that don't support this script (non IE5+/NS6+ browsers. Recommended):
				var iframehide="yes";
				var getFFVersion=navigator.userAgent.substring(navigator.userAgent.indexOf("Firefox")).split("/")[1]
				var FFextraHeight=parseFloat(getFFVersion)>=0.1? 16 : 0 //extra height in px to add to iframe in FireFox 1.0+ browsers
				function resizeCaller() {
					var dyniframe = [];
					for (i=0; i<iframeids.length; i++){
						if (document.getElementById)
							resizeIframe(iframeids[i])
						//reveal iframe for lower end browsers? (see var above):
						if ((document.all || document.getElementById) && iframehide=="no"){
							var tempobj=document.all? document.all[iframeids[i]] : document.getElementById(iframeids[i])
							tempobj.style.display="block";
						}
					}
					document.getElementById("loadingBlog").parentNode.removeChild(document.getElementById("loadingBlog"));
				}
				function resizeIframe(frameid){
					var currentfr=document.getElementById(frameid)
					if (currentfr && !window.opera){
						currentfr.style.display="block";
						if (currentfr.contentDocument && currentfr.contentDocument.body.offsetHeight) //ns6 syntax
							currentfr.height = currentfr.contentDocument.body.offsetHeight+FFextraHeight; 
							else if (currentfr.Document && currentfr.Document.body.scrollHeight) //ie5+ syntax
								currentfr.height = currentfr.Document.body.scrollHeight;
							if (currentfr.addEventListener)
								currentfr.addEventListener("load", readjustIframe, false);
							else if (currentfr.attachEvent){
								currentfr.detachEvent("onload", readjustIframe); // Bug fix line
								currentfr.attachEvent("onload", readjustIframe);
							}
					}
				}
				function readjustIframe(loadevt) {
					var crossevt=(window.event)? event : loadevt;
					var iframeroot=(crossevt.currentTarget)? crossevt.currentTarget : crossevt.srcElement;
					if (iframeroot);
						resizeIframe(iframeroot.id);
				}
				function loadintoIframe(iframeid, url){
					if (document.getElementById)
					document.getElementById(iframeid).src=url;
				}
				if (window.addEventListener)
					window.addEventListener("load", resizeCaller, false);
				else if (window.attachEvent)
					window.attachEvent("onload", resizeCaller);
				else
					window.onload=resizeCaller;
            </script>
            <iframe id="blogFrame" src="getBlogCurl.php" marginwidth="0" marginheight="0" vspace="0" hspace="0"  scrolling="no" frameborder="0"></iframe>
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
