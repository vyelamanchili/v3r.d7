<?php die(); ?><!doctype html>
<html class="no-js" lang="en-US">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="http://yvranjeesh.v3r.us/xmlrpc.php">
<title>Setting up the simplenews module for bulk email sending in drupal &#8211; Ranjeesh Loves to Share</title>
<link rel="alternate" type="application/rss+xml" title="Ranjeesh Loves to Share &raquo; Feed" href="http://yvranjeesh.v3r.us/feed/" />
<link rel="alternate" type="application/rss+xml" title="Ranjeesh Loves to Share &raquo; Comments Feed" href="http://yvranjeesh.v3r.us/comments/feed/" />
<link rel="alternate" type="application/rss+xml" title="Ranjeesh Loves to Share &raquo; Setting up the simplenews module for bulk email sending in drupal Comments Feed" href="http://yvranjeesh.v3r.us/setting-up-the-simplenews-module-for-bulk-email-sending-in-drupal/feed/" />
		<script type="text/javascript">
			window._wpemojiSettings = {"baseUrl":"https:\/\/s.w.org\/images\/core\/emoji\/72x72\/","ext":".png","source":{"concatemoji":"http:\/\/yvranjeesh.v3r.us\/wp-includes\/js\/wp-emoji-release.min.js?ver=4.4.2"}};
			!function(a,b,c){function d(a){var c,d=b.createElement("canvas"),e=d.getContext&&d.getContext("2d"),f=String.fromCharCode;return e&&e.fillText?(e.textBaseline="top",e.font="600 32px Arial","flag"===a?(e.fillText(f(55356,56806,55356,56826),0,0),d.toDataURL().length>3e3):"diversity"===a?(e.fillText(f(55356,57221),0,0),c=e.getImageData(16,16,1,1).data.toString(),e.fillText(f(55356,57221,55356,57343),0,0),c!==e.getImageData(16,16,1,1).data.toString()):("simple"===a?e.fillText(f(55357,56835),0,0):e.fillText(f(55356,57135),0,0),0!==e.getImageData(16,16,1,1).data[0])):!1}function e(a){var c=b.createElement("script");c.src=a,c.type="text/javascript",b.getElementsByTagName("head")[0].appendChild(c)}var f,g;c.supports={simple:d("simple"),flag:d("flag"),unicode8:d("unicode8"),diversity:d("diversity")},c.DOMReady=!1,c.readyCallback=function(){c.DOMReady=!0},c.supports.simple&&c.supports.flag&&c.supports.unicode8&&c.supports.diversity||(g=function(){c.readyCallback()},b.addEventListener?(b.addEventListener("DOMContentLoaded",g,!1),a.addEventListener("load",g,!1)):(a.attachEvent("onload",g),b.attachEvent("onreadystatechange",function(){"complete"===b.readyState&&c.readyCallback()})),f=c.source||{},f.concatemoji?e(f.concatemoji):f.wpemoji&&f.twemoji&&(e(f.twemoji),e(f.wpemoji)))}(window,document,window._wpemojiSettings);
		</script>
		<style type="text/css">
img.wp-smiley,
img.emoji {
	display: inline !important;
	border: none !important;
	box-shadow: none !important;
	height: 1em !important;
	width: 1em !important;
	margin: 0 .07em !important;
	vertical-align: -0.1em !important;
	background: none !important;
	padding: 0 !important;
}
</style>
<link rel='stylesheet' id='wpforge-opensans-css'  href='//fonts.googleapis.com/css?family=Open+Sans%3A300%2C700&#038;ver=5.5.3' type='text/css' media='all' />
<link rel='stylesheet' id='wpforge-fonts-css'  href='http://yvranjeesh.v3r.us/wp-content/themes/wp-forge/fonts/fonts.css?ver=5.5.3' type='text/css' media='all' />
<link rel='stylesheet' id='wpforge-normalize-css'  href='http://yvranjeesh.v3r.us/wp-content/themes/wp-forge/css/normalize.css?ver=3.0.3' type='text/css' media='all' />
<link rel='stylesheet' id='wpforge-foundation-css'  href='http://yvranjeesh.v3r.us/wp-content/themes/wp-forge/css/foundation.css?ver=5.5.3' type='text/css' media='all' />
<link rel='stylesheet' id='wpforge-css'  href='http://yvranjeesh.v3r.us/wp-content/themes/wp-forge/style.css?ver=5.5.3' type='text/css' media='all' />
<script type='text/javascript' src='http://yvranjeesh.v3r.us/wp-includes/js/jquery/jquery.js?ver=1.11.3'></script>
<script type='text/javascript' src='http://yvranjeesh.v3r.us/wp-includes/js/jquery/jquery-migrate.min.js?ver=1.2.1'></script>
<script type='text/javascript' src='http://yvranjeesh.v3r.us/wp-content/themes/wp-forge/js/vendor/modernizr.js?ver=2.8.3'></script>
<link rel='https://api.w.org/' href='http://yvranjeesh.v3r.us/wp-json/' />
<link rel="EditURI" type="application/rsd+xml" title="RSD" href="http://yvranjeesh.v3r.us/xmlrpc.php?rsd" />
<link rel="wlwmanifest" type="application/wlwmanifest+xml" href="http://yvranjeesh.v3r.us/wp-includes/wlwmanifest.xml" /> 
<link rel='prev' title='Coldfusion 7 MX cannot understand oracle sometimes' href='http://yvranjeesh.v3r.us/coldfusion-7-mx-cannot-understand-oracle-sometimes/' />
<link rel='next' title='Production Server filling up with Redo Logs resulting in space issue. Deep research!' href='http://yvranjeesh.v3r.us/production-server-filling-up-with-redo-logs-resulting-in-space-issue-deep-research/' />
<meta name="generator" content="WordPress 4.4.2" />
<link rel="canonical" href="http://yvranjeesh.v3r.us/setting-up-the-simplenews-module-for-bulk-email-sending-in-drupal/" />
<link rel='shortlink' href='http://yvranjeesh.v3r.us/?p=52' />
<link rel="alternate" type="application/json+oembed" href="http://yvranjeesh.v3r.us/wp-json/oembed/1.0/embed?url=http%3A%2F%2Fyvranjeesh.v3r.us%2Fsetting-up-the-simplenews-module-for-bulk-email-sending-in-drupal%2F" />
<link rel="alternate" type="text/xml+oembed" href="http://yvranjeesh.v3r.us/wp-json/oembed/1.0/embed?url=http%3A%2F%2Fyvranjeesh.v3r.us%2Fsetting-up-the-simplenews-module-for-bulk-email-sending-in-drupal%2F&#038;format=xml" />
<style type="text/css" id="wpforge-customizer-css">.header_wrap{max-width:64rem;background-color:#ffffff;}.site-title a{color:#444444;}.site-title a:hover{color:#0078a0;}.site-description{color:##444444;}.nav_wrap{max-width:64rem;background-color:#333333;}.contain-to-grid .top-bar{max-width:64rem;}.contain-to-grid .top-bar,.top-bar,.top-bar-section ul li,.top-bar-section li:not(.has-form) a:not(.button),.top-bar-section ul li:hover:not(.has-form) > a,.top-bar-section .dropdown li:not(.has-form):not(.active) > a:not(.button),.contain-to-grid {background-color:#333333;}.top-bar-section > ul > .divider,.top-bar-section > ul > [role="separator"] {border-right: solid 1px #4e4e4e;}.top-bar-section li:not(.has-form) a:not(.button):hover,.top-bar .name:hover,.top-bar-section .dropdown li:not(.has-form):not(.active):hover > a:not(.button) {background-color:#272727;}.top-bar-section li.active:not(.has-form) a:not(.button){background-color:#008cba;}.top-bar-section li.active:not(.has-form) a:not(.button):hover {background-color:#0078a0;}.top-bar .name a,.top-bar-section ul li > a,.top-bar-section li.active:not(.has-form) a:not(.button),.top-bar-section .dropdown li:not(.has-form):not(.active) > a:not(.button) {color:#ffffff;}.top-bar .name a:hover,.top-bar-section ul li > a:hover, .top-bar-section ul li > a:focus{color:#ffffff!important;}.tab-bar, .left-off-canvas-menu, .right-off-canvas-menu {background-color:#333333;}.left-small {border-right: solid 1px #1a1a1a;}.right-small {border-left: solid 1px #1a1a1a;}.tab-bar .menu-icon span::after {box-shadow: 0 0 0 1px #ffffff, 0 7px 0 1px #ffffff, 0 14px 0 1px #ffffff;}section.tab-bar-section.middle a {color:#ffffff;}ul.off-canvas-list li a {color:#ffffff;border-bottom:1px solid #262626;}ul.off-canvas-list li a:hover {color:#ffffff;background-color:#242424;}ul.off-canvas-list .active > a {background-color:#262626;}ul.off-canvas-list .active > a:hover {background-color:#242424;}.content_wrap{max-width:64rem;background-color:#ffffff;}#content,#content h1,#content h2,#content h3,#content h4,#content h5,#content h6{color:#444444;}#content a{color:#008CBA;}#content a:hover{color:#007095;}#content ul.pagination li.current a,#content ul.pagination li.current button,#content ul.pagination li.current a:hover,#content ul.pagination li.current a:focus,#content ul.pagination li.current button:hover,#content ul.pagination li.current button:focus,#content .page-links a{background-color:#008CBA;color:#ffffff;}#content ul.pagination li a,#content ul.pagination li button{color:#999999;}#content ul.pagination li:hover a,#content ul.pagination li a:focus,#content ul.pagination li:hover button,#content ul.pagination li button:focus{color:#999999;background-color:#e6e6e6;}.sidebar_wrap{max-width:64rem;background-color:#ffffff;}#content.columns{float:left!important;}#secondary .widget-title{color:#444444;}#secondary{color:#444444}#secondary a{color:#008CBA;}#secondary a:hover{color:#007095;}.footer_wrap{max-width:64rem;background-color:#ffffff;}#secondary-sidebar .widget-title{color:#444444;}#secondary-sidebar{color:#444444;}#secondary-sidebar a{color:#008CBA;}#secondary-sidebar a:hover{color:#007095;}footer[role="contentinfo"] p,footer[role="contentinfo"]{color:#444444;}footer[role="contentinfo"] a{color:#008CBA;}footer[role="contentinfo"] a:hover{color:#007095;}button,.button,#content dl.sub-nav dd.active a{background-color:#008CBA;}button,.button,#content a.button,#content dl.sub-nav dd.active a{color:#ffffff;}button:hover,button:focus,.button:hover,.button:focus,#content dl.sub-nav dd.active a:hover,#content dl.sub-nav dd.active a:focus{background-color:#007095;}button:hover,button:focus,.button:hover,.button:focus,#content dl.sub-nav dd.active a:hover,#content dl.sub-nav dd.active a:focus{color:#ffffff;}#backtotop{background-color:#888888;color:#ffffff;}#backtotop:hover,#backtotop:focus{background-color:#444444;}.social-navigation a[href$="/feed/"]:before{color:#444444;}.social-navigation a[href*="codepen.io"]:before{color:#444444;}.social-navigation a[href*="digg.com"]:before{color:#444444;}.social-navigation a[href*="dribbble.com"]:before{color:#444444;}.social-navigation a[href*="dropbox.com"]:before{color:#444444;}.social-navigation a[href*="facebook.com"]:before{color:#444444;}.social-navigation a[href*="flickr.com"]:before{color:#444444;}.social-navigation a[href*="foursquare.com"]:before{color:#444444;}.social-navigation a[href*="google.com"]:before{color:#444444;}.social-navigation a[href*="github.com"]:before{color:#444444;}.social-navigation a[href*="instagram.com"]:before{color:#444444;}.social-navigation a[href*="linkedin.com"]:before{color:#444444;}.social-navigation a[href*="pinterest.com"]:before{color:#444444;}.social-navigation a[href*="getpocket.com"]:before{color:#444444;}.social-navigation a[href*="polldaddy.com"]:before{color:#444444;}.social-navigation a[href*="reddit.com"]:before{color:#444444;}.social-navigation a[href*="stumbleupon.com"]:before{color:#444444;}.social-navigation a[href*="tumblr.com"]:before{color:#444444;}.social-navigation a[href*="twitter.com"]:before{color:#444444;}.social-navigation a[href*="vimeo.com"]:before{color:#444444;}.social-navigation a[href*="wordpress.com"]:before,.social-navigation a[href*="wordpress.org"]:before{color:#444444;}.social-navigation a[href*="youtube.com"]:before{color:#444444;}.social-navigation a[href*="mailto:"]:before{color:#444444;}.social-navigation a[href*="spotify.com"]:before{color:#444444;}.social-navigation a[href*="twitch.tv"]:before{color:#444444;}.social-navigation a:hover[href$="/feed/"]:before{color:#007095;}.social-navigation a:hover[href*="codepen.io"]:before{color:#007095;}.social-navigation a:hover[href*="digg.com"]:before{color:#007095;}.social-navigation a:hover[href*="dribbble.com"]:before{color:#007095;}.social-navigation a:hover[href*="dropbox.com"]:before{color:#007095;}.social-navigation a:hover[href*="facebook.com"]:before{color:#007095;}.social-navigation a:hover[href*="flickr.com"]:before{color:#007095;}.social-navigation a:hover[href*="foursquare.com"]:before{color:#007095;}.social-navigation a:hover[href*="google.com"]:before{color:#007095;}.social-navigation a:hover[href*="github.com"]:before{color:#007095;}.social-navigation a:hover[href*="instagram.com"]:before{color:#007095;}.social-navigation a:hover[href*="linkedin.com"]:before{color:#007095;}.social-navigation a:hover[href*="pinterest.com"]:before{color:#007095;}.social-navigation a:hover[href*="getpocket.com"]:before{color:#007095;}.social-navigation a:hover[href*="polldaddy.com"]:before{color:#007095;}.social-navigation a:hover[href*="reddit.com"]:before{color:#007095;}.social-navigation a:hover[href*="stumbleupon.com"]:before{color:#007095;}.social-navigation a:hover[href*="tumblr.com"]:before{color:#007095;}.social-navigation a:hover[href*="twitter.com"]:before{color:#007095;}.social-navigation a:hover[href*="vimeo.com"]:before{color:#007095;}.social-navigation a:hover[href*="wordpress.com"]:before,.social-navigation a:hover[href*="wordpress.org"]:before{color:#007095;}.social-navigation a:hover[href*="youtube.com"]:before{color:#007095;}.social-navigation a:hover[href*="mailto:"]:before{color:#007095;}.social-navigation a:hover[href*="spotify.com"]:before{color:#007095;}.social-navigation a:hover[href*="twitch.tv"]:before{color:#007095;}</style>
</head>

<body class="single single-post postid-52 single-format-standard custom-background-white single-author">   

        
                 

        
            
        
        <div class="header_container">

        <header id="header" class="header_wrap row" role="banner">

            <div class="site-header medium-12 large-12 columns">

                
                <div class="header-info">

                    <h1 class="site-title"><a href="http://yvranjeesh.v3r.us/" title="Ranjeesh Loves to Share" rel="home">Ranjeesh Loves to Share</a></h1>

                    <h2 class="site-description">Tech, Personal and Deal Blog</h2>

                </div><!-- /.header-info -->

             </div><!-- .site-header -->

        </header><!-- #header -->       

        </div><!-- end .header_container -->

        
            
                
<div class="nav_container">

<a class="skip-link screen-reader-text" href="#content">Skip to content</a>

    
                <div class="nav_wrap row">
                        <nav class="top-bar" data-topbar data-options="scrolltop:false; mobile_show_parent_link: true">
                                            <ul class="title-area">
                            <li class="name">
                                <a href="http://yvranjeesh.v3r.us/" title="Ranjeesh Loves to Share" rel="home">Home</a>
                            </li> 
                            <!-- Remove the class "menu-icon" to get rid of menu icon. Take out "Menu" to just have icon alone -->
                            <li class="toggle-topbar menu-icon"><a href="#"><span></span></a></li>
                        </ul>
                                        <section class="top-bar-section">
                                            </section>
                </nav>   
        </div><!-- .row -->

    
    
    
    
</div><!-- end .nav_container -->
            
        
        <div class="content_container">
    
        <section class="content_wrap row" role="document">
                         
	<div id="content" class="medium-8 large-8 columns" role="main">
    
    	
		
				<article id="post-52" class="post-52 post type-post status-publish format-standard hentry category-blog tag-apache tag-bulk-email tag-crash tag-cron tag-drupal tag-elysia tag-elysia-cron tag-fail tag-fix tag-mass-mailing tag-mime-mail tag-newsletter tag-simplenews tag-statistics tag-template">
		<header class="entry-header">
												<div class="entry-meta-categories"><span class="categories-links"><a href="http://yvranjeesh.v3r.us/category/blog/" rel="category tag">Blog</a></span></div>														<h1 class="entry-title">Setting up the simplenews module for bulk email sending in drupal</h1>
						<div class="entry-meta-header">
									<span class="entry-date updated"><span class="genericon genericon-time"></span><a href="http://yvranjeesh.v3r.us/setting-up-the-simplenews-module-for-bulk-email-sending-in-drupal/" rel="bookmark"><time class="entry-date" datetime="2011-02-28T10:41:27+00:00">February 28, 2011</time></a></span> <span class="byline"><span class="genericon genericon-user"></span><span class="author vcard"><a class="url fn n" href="http://yvranjeesh.v3r.us/author/administrator/" rel="author">Ranjeesh</a></span></span>											
					<span class="genericon genericon-comment"></span> <a href="http://yvranjeesh.v3r.us/setting-up-the-simplenews-module-for-bulk-email-sending-in-drupal/#respond"><span class="leave-reply">Comment</span></a>											</div><!-- end .entry-meta-header -->
							 
									<a href="http://yvranjeesh.v3r.us/setting-up-the-simplenews-module-for-bulk-email-sending-in-drupal/" title="Setting up the simplenews module for bulk email sending in drupal"></a>					 
		</header><!-- .entry-header -->
													<div class="entry-content">
			<p>In the past, I had a very <a title="Bulk mail issue" href="http://yvranjeesh.v3r.us/2011/01/19/sendmail-service-queue-clearing-and-ora-24247-error-fix-using-instructions-to-add-acl-info/" target="_blank">bad experience </a>coding a PHP script to send bulk e-mail. This time we needed a newsletter sending module for the drupal site to send around 55,000 newsletter emails.</p>
<p>For this I found the<em> simplenews module </em>on the drupal site that served the basic purpose of a newsletter sending application. As per our needs, I also installed the other modules/plugins like simplenews template, simplenews statistics and mime mail which enhanced the features of the simplenews module.</p>
<p><strong>The modules, plugins and other requirements:</strong></p>
<p><em>The <a title="Simplenews module on drupal" href="http://drupal.org/project/simplenews" target="_blank">simplenews </a>module</em>: This is the core module needed for the newsletter functionality</p>
<p><em>New Content type: </em>Create a<em> </em>content type for the simplenews module to use</p>
<p><em>The simplenews template module: </em>This was needed to add custom header and footer to content type created for simplenews on drupal so that we could send a particular webpage/node (special content type for simplenews) as the newsletter.</p>
<p><em>The statistics module: </em>This was needed for reporting purposes. It gives the information about how many people clicked the links on the mail and viewed the email etc..</p>
<p><em> </em></p>
<p><em><a title="mime mail on drupal" href="http://drupal.org/project/mimemail" target="_blank">Mime mail:</a> </em>This module helps in sending HTML mails and is needed to be used with simplenews template.</p>
<p><strong>The installation and configuration</strong>:</p>
<p>First I installed the simplenews module and then the simplenews template and statistics (no specific order needed) then the mime mail module to send out HTML format emails.</p>
<p>Created a content type for the simplenews module and setup the taxonomy and <a title="pathauto on drupal" href="http://drupal.org/project/pathauto" target="_blank">pathauto </a>settings for the terms for the content type so that once a node or page is created the link for it is properly generated.</p>
<p>The installation of <em>â€œmime mail css compressorâ€</em> needed the DOM php plugin installed so I did a <em>yum </em>install on the php plugins on the linux server and it updated the needed plugins for installation of css compressor.</p>
<p>Once the installation of all the required modules were done. I configured the simplenews module. One of the most important settings was to setup the mail send process to be run using the <strong>CRON </strong>job, and to setup such that it send more messages per cron run that doesnâ€™t let the cron timeout. The max number of messages per cron job that I could successfully send were 200. setting it to 500 failed the cron run due to timeout.</p>
<p>Our server was setup to run cronjobs every one hour. This was very unfavourable for the simplenews module to send 55,000 messages. It would take 275 hours to finish the job in this case. Therefore I did a little research and came across <a title="Elysia cron on drupal" href="http://drupal.org/project/elysia_cron">ELYSIA cron </a>module which splits all the cron jobs in drupal and lets us setup different cron run timings for different modules.</p>
<p>I changed the crontab drupal maintenance period to * * * * * and then in the elysia cron module settings changed the schedule for the simplenews module to be run every 5 minutes (*/5 * * * *) . Now the simplenews module would take only 23 hours to finish sending all the messages. (Each cron run was taking on an average 5 minutes to complete hence the time was selected as 5 mins)</p>
<p>Now the send process of the mail takes its time to send all the messages without crashing the smtp server and without backfiring and sending multiple mails to same user. This is the solution to sending bulk newsletters without crashing anything.</p>
<p>If you have any questions, please feel free to ask me.</p>
					</div><!-- .entry-content -->
				<footer class="entry-meta">
			<div class="entry-meta-footer">
													<div class="entry-meta-tags"><span class="genericon genericon-tag"></span> <span class="tags-links"><a href="http://yvranjeesh.v3r.us/tag/apache/" rel="tag">apache</a>, <a href="http://yvranjeesh.v3r.us/tag/bulk-email/" rel="tag">bulk email</a>, <a href="http://yvranjeesh.v3r.us/tag/crash/" rel="tag">crash</a>, <a href="http://yvranjeesh.v3r.us/tag/cron/" rel="tag">cron</a>, <a href="http://yvranjeesh.v3r.us/tag/drupal/" rel="tag">drupal</a>, <a href="http://yvranjeesh.v3r.us/tag/elysia/" rel="tag">elysia</a>, <a href="http://yvranjeesh.v3r.us/tag/elysia-cron/" rel="tag">elysia cron</a>, <a href="http://yvranjeesh.v3r.us/tag/fail/" rel="tag">fail</a>, <a href="http://yvranjeesh.v3r.us/tag/fix/" rel="tag">fix</a>, <a href="http://yvranjeesh.v3r.us/tag/mass-mailing/" rel="tag">mass mailing</a>, <a href="http://yvranjeesh.v3r.us/tag/mime-mail/" rel="tag">mime mail</a>, <a href="http://yvranjeesh.v3r.us/tag/newsletter/" rel="tag">newsletter</a>, <a href="http://yvranjeesh.v3r.us/tag/simplenews/" rel="tag">simplenews</a>, <a href="http://yvranjeesh.v3r.us/tag/statistics/" rel="tag">statistics</a>, <a href="http://yvranjeesh.v3r.us/tag/template/" rel="tag">template</a></span></div>							</div><!-- end .entry-meta-footer -->
				
					</footer><!-- .entry-meta -->
	</article><!-- #post -->
			<nav class="nav-single">
				<span class="nav-previous"><a href="http://yvranjeesh.v3r.us/coldfusion-7-mx-cannot-understand-oracle-sometimes/" rel="prev"><span class="meta-nav">&laquo;</span> Coldfusion 7 MX cannot understand oracle sometimes</a></span>
				<span class="nav-next"><a href="http://yvranjeesh.v3r.us/production-server-filling-up-with-redo-logs-resulting-in-space-issue-deep-research/" rel="next">Production Server filling up with Redo Logs resulting in space issue. Deep research! <span class="meta-nav">&raquo;</span></a></span>
			</nav><!-- .nav-single -->

			
<div id="comments" class="comments-area">

		
							<div id="respond" class="comment-respond">
			<h3 id="reply-title" class="comment-reply-title">Leave a Reply <small><a rel="nofollow" id="cancel-comment-reply-link" href="/setting-up-the-simplenews-module-for-bulk-email-sending-in-drupal/#respond" style="display:none;">Cancel Reply</a></small></h3>				<form action="http://yvranjeesh.v3r.us/wp-comments-post.php" method="post" id="commentform" class="comment-form" novalidate>
					<p class="comment-notes">Your email address will not be published. Required fields are marked <span class="required">*</span></p><p class="comment-form-comment"><label for="comment">Comment</label><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea></p><p class="form-allowed-tags">You may use these <abbr title="HyperText Markup Language">HTML</abbr> tags and attributes:  <code>&lt;a href=&quot;&quot; title=&quot;&quot;&gt; &lt;abbr title=&quot;&quot;&gt; &lt;acronym title=&quot;&quot;&gt; &lt;b&gt; &lt;blockquote cite=&quot;&quot;&gt; &lt;cite&gt; &lt;code&gt; &lt;del datetime=&quot;&quot;&gt; &lt;em&gt; &lt;i&gt; &lt;q cite=&quot;&quot;&gt; &lt;s&gt; &lt;strike&gt; &lt;strong&gt; </code></p><p class="comment-form-author medium-6 large-6 columns"><label for="author">Your Name <span class="required">*</span></label> <input id="author" name="author" type="text" value="jrcsbvrd" size="30" aria-required='true' /></p>
<p class="comment-form-email medium-6 large-6 columns"><label for="email">Your Email <span class="required">*</span></label> <input id="email" name="email" type="text" value="txrgvy@tenteq.com" size="30" aria-required='true' /></p>
<p class="comment-form-url"><label for="url">Your Website</label><input id="url" name="url" type="text" value="http://hmqzvfpfzvea.com/" size="30" /></p>
<p class="form-submit"><input name="submit" type="submit" id="submit" class="submit" value="Post Comment" /> <input type='hidden' name='comment_post_ID' value='52' id='comment_post_ID' />
<input type='hidden' name='comment_parent' id='comment_parent' value='0' />
</p><p style="display: none;"><input type="hidden" id="akismet_comment_nonce" name="akismet_comment_nonce" value="570fc4a6d0" /></p><p style="display: none;"><input type="hidden" id="ak_js" name="ak_js" value="190"/></p>				</form>
					</div><!-- #respond -->
		
</div>
		
	</div><!-- #content -->


			<div id="secondary" class="medium-4 large-4 columns widget-area" role="complementary">
			<aside id="search-2" class="widget widget_search">
<form role="search" method="get" id="searchform" action="http://yvranjeesh.v3r.us/">
	<div class="row collapse">
		<div class="medium-9 large-9 columns">
			<input type="text" value="" name="s" id="s" placeholder="Search">
		</div>
		<div class="medium-3 large-3 columns">
			<input type="submit" id="searchsubmit" value="Search" class="button postfix">
		</div>
	</div>
</form></aside>		<aside id="recent-posts-2" class="widget widget_recent_entries">		<h6 class="widget-title">Recent Posts</h6>		<ul>
					<li>
				<a href="http://yvranjeesh.v3r.us/git-prune-for-cleanup/">Git Prune for Cleanup</a>
						</li>
					<li>
				<a href="http://yvranjeesh.v3r.us/git-cherry-picking/">GIT Cherry Picking</a>
						</li>
					<li>
				<a href="http://yvranjeesh.v3r.us/10-e-movie-cash-for-avengers-age-of-ultron-with/">$10 e-Movie Cash for Avengers: Age of Ultron with pruchase of Kellogg&#8217;s Eggo Waffles 24 pak for $4.78 at Walmart</a>
						</li>
					<li>
				<a href="http://yvranjeesh.v3r.us/verizon-fios-triple-play-internet-tv-phone-for/">Verizon FiOS Triple Play &#8211; Internet, TV, Phone for $74.99 with 2 years contract and $300 Gift Card</a>
						</li>
					<li>
				<a href="http://yvranjeesh.v3r.us/durahook-coat-hook-for-free/">DuraHook Coat Hook for FREE</a>
						</li>
				</ul>
		</aside>		<aside id="meta-2" class="widget widget_meta"><h6 class="widget-title">Meta</h6>			<ul>
						<li><a href="http://yvranjeesh.v3r.us/wp-login.php">Log in</a></li>
			<li><a href="http://yvranjeesh.v3r.us/feed/">Entries <abbr title="Really Simple Syndication">RSS</abbr></a></li>
			<li><a href="http://yvranjeesh.v3r.us/comments/feed/">Comments <abbr title="Really Simple Syndication">RSS</abbr></a></li>
			<li><a href="https://wordpress.org/" title="Powered by WordPress, state-of-the-art semantic personal publishing platform.">WordPress.org</a></li>			</ul>
			</aside><aside id="archives-2" class="widget widget_archive"><h6 class="widget-title">Archives</h6>		<ul>
			<li><a href='http://yvranjeesh.v3r.us/2016/01/'>January 2016</a></li>
	<li><a href='http://yvranjeesh.v3r.us/2015/04/'>April 2015</a></li>
	<li><a href='http://yvranjeesh.v3r.us/2015/03/'>March 2015</a></li>
	<li><a href='http://yvranjeesh.v3r.us/2015/02/'>February 2015</a></li>
	<li><a href='http://yvranjeesh.v3r.us/2015/01/'>January 2015</a></li>
	<li><a href='http://yvranjeesh.v3r.us/2014/12/'>December 2014</a></li>
	<li><a href='http://yvranjeesh.v3r.us/2014/11/'>November 2014</a></li>
	<li><a href='http://yvranjeesh.v3r.us/2014/10/'>October 2014</a></li>
	<li><a href='http://yvranjeesh.v3r.us/2014/09/'>September 2014</a></li>
	<li><a href='http://yvranjeesh.v3r.us/2014/08/'>August 2014</a></li>
	<li><a href='http://yvranjeesh.v3r.us/2014/07/'>July 2014</a></li>
	<li><a href='http://yvranjeesh.v3r.us/2014/06/'>June 2014</a></li>
	<li><a href='http://yvranjeesh.v3r.us/2014/05/'>May 2014</a></li>
	<li><a href='http://yvranjeesh.v3r.us/2014/04/'>April 2014</a></li>
	<li><a href='http://yvranjeesh.v3r.us/2014/03/'>March 2014</a></li>
	<li><a href='http://yvranjeesh.v3r.us/2014/02/'>February 2014</a></li>
	<li><a href='http://yvranjeesh.v3r.us/2014/01/'>January 2014</a></li>
	<li><a href='http://yvranjeesh.v3r.us/2013/12/'>December 2013</a></li>
	<li><a href='http://yvranjeesh.v3r.us/2013/11/'>November 2013</a></li>
	<li><a href='http://yvranjeesh.v3r.us/2013/10/'>October 2013</a></li>
	<li><a href='http://yvranjeesh.v3r.us/2013/09/'>September 2013</a></li>
	<li><a href='http://yvranjeesh.v3r.us/2013/08/'>August 2013</a></li>
	<li><a href='http://yvranjeesh.v3r.us/2013/07/'>July 2013</a></li>
	<li><a href='http://yvranjeesh.v3r.us/2013/06/'>June 2013</a></li>
	<li><a href='http://yvranjeesh.v3r.us/2013/05/'>May 2013</a></li>
	<li><a href='http://yvranjeesh.v3r.us/2013/04/'>April 2013</a></li>
	<li><a href='http://yvranjeesh.v3r.us/2013/03/'>March 2013</a></li>
	<li><a href='http://yvranjeesh.v3r.us/2013/02/'>February 2013</a></li>
	<li><a href='http://yvranjeesh.v3r.us/2013/01/'>January 2013</a></li>
	<li><a href='http://yvranjeesh.v3r.us/2012/12/'>December 2012</a></li>
	<li><a href='http://yvranjeesh.v3r.us/2012/11/'>November 2012</a></li>
	<li><a href='http://yvranjeesh.v3r.us/2011/11/'>November 2011</a></li>
	<li><a href='http://yvranjeesh.v3r.us/2011/02/'>February 2011</a></li>
	<li><a href='http://yvranjeesh.v3r.us/2011/01/'>January 2011</a></li>
	<li><a href='http://yvranjeesh.v3r.us/2010/12/'>December 2010</a></li>
	<li><a href='http://yvranjeesh.v3r.us/2010/11/'>November 2010</a></li>
	<li><a href='http://yvranjeesh.v3r.us/2010/10/'>October 2010</a></li>
	<li><a href='http://yvranjeesh.v3r.us/2010/09/'>September 2010</a></li>
	<li><a href='http://yvranjeesh.v3r.us/2010/01/'>January 2010</a></li>
	<li><a href='http://yvranjeesh.v3r.us/2009/11/'>November 2009</a></li>
		</ul>
		</aside><aside id="tag_cloud-2" class="widget widget_tag_cloud"><h6 class="widget-title">Keywords</h6><div class="tagcloud"><a href='http://yvranjeesh.v3r.us/tag/3d/' class='tag-link-661' title='7 topics' style='font-size: 8.5343511450382pt;'>3d</a>
<a href='http://yvranjeesh.v3r.us/tag/4g/' class='tag-link-265' title='6 topics' style='font-size: 8pt;'>4g</a>
<a href='http://yvranjeesh.v3r.us/tag/1080p/' class='tag-link-186' title='15 topics' style='font-size: 11.740458015267pt;'>1080p</a>
<a href='http://yvranjeesh.v3r.us/tag/amazon/' class='tag-link-274' title='17 topics' style='font-size: 12.381679389313pt;'>amazon</a>
<a href='http://yvranjeesh.v3r.us/tag/android/' class='tag-link-281' title='7 topics' style='font-size: 8.5343511450382pt;'>android</a>
<a href='http://yvranjeesh.v3r.us/tag/apple/' class='tag-link-363' title='12 topics' style='font-size: 10.778625954198pt;'>apple</a>
<a href='http://yvranjeesh.v3r.us/tag/best-buy/' class='tag-link-491' title='7 topics' style='font-size: 8.5343511450382pt;'>Best Buy</a>
<a href='http://yvranjeesh.v3r.us/tag/bestbuy/' class='tag-link-476' title='10 topics' style='font-size: 10.030534351145pt;'>bestbuy</a>
<a href='http://yvranjeesh.v3r.us/tag/black-friday/' class='tag-link-459' title='11 topics' style='font-size: 10.458015267176pt;'>black friday</a>
<a href='http://yvranjeesh.v3r.us/tag/blackfriday/' class='tag-link-460' title='11 topics' style='font-size: 10.458015267176pt;'>blackfriday</a>
<a href='http://yvranjeesh.v3r.us/tag/bluetooth/' class='tag-link-428' title='7 topics' style='font-size: 8.5343511450382pt;'>bluetooth</a>
<a href='http://yvranjeesh.v3r.us/tag/bluray/' class='tag-link-350' title='14 topics' style='font-size: 11.526717557252pt;'>bluray</a>
<a href='http://yvranjeesh.v3r.us/tag/cheap/' class='tag-link-130' title='138 topics' style='font-size: 21.786259541985pt;'>cheap</a>
<a href='http://yvranjeesh.v3r.us/tag/deal/' class='tag-link-121' title='143 topics' style='font-size: 22pt;'>deal</a>
<a href='http://yvranjeesh.v3r.us/tag/deals/' class='tag-link-531' title='42 topics' style='font-size: 16.335877862595pt;'>deals</a>
<a href='http://yvranjeesh.v3r.us/tag/dell/' class='tag-link-190' title='7 topics' style='font-size: 8.5343511450382pt;'>Dell</a>
<a href='http://yvranjeesh.v3r.us/tag/ebay/' class='tag-link-270' title='12 topics' style='font-size: 10.778625954198pt;'>ebay</a>
<a href='http://yvranjeesh.v3r.us/tag/free/' class='tag-link-138' title='41 topics' style='font-size: 16.229007633588pt;'>Free</a>
<a href='http://yvranjeesh.v3r.us/tag/game/' class='tag-link-155' title='6 topics' style='font-size: 8pt;'>game</a>
<a href='http://yvranjeesh.v3r.us/tag/games/' class='tag-link-156' title='9 topics' style='font-size: 9.6030534351145pt;'>games</a>
<a href='http://yvranjeesh.v3r.us/tag/google/' class='tag-link-237' title='12 topics' style='font-size: 10.778625954198pt;'>google</a>
<a href='http://yvranjeesh.v3r.us/tag/hdd/' class='tag-link-163' title='12 topics' style='font-size: 10.778625954198pt;'>hdd</a>
<a href='http://yvranjeesh.v3r.us/tag/hdtv/' class='tag-link-185' title='24 topics' style='font-size: 13.87786259542pt;'>hdtv</a>
<a href='http://yvranjeesh.v3r.us/tag/ipad/' class='tag-link-362' title='9 topics' style='font-size: 9.6030534351145pt;'>ipad</a>
<a href='http://yvranjeesh.v3r.us/tag/iphone/' class='tag-link-565' title='8 topics' style='font-size: 9.0687022900763pt;'>iphone</a>
<a href='http://yvranjeesh.v3r.us/tag/laptop/' class='tag-link-166' title='11 topics' style='font-size: 10.458015267176pt;'>laptop</a>
<a href='http://yvranjeesh.v3r.us/tag/led/' class='tag-link-442' title='19 topics' style='font-size: 12.809160305344pt;'>led</a>
<a href='http://yvranjeesh.v3r.us/tag/lg/' class='tag-link-262' title='10 topics' style='font-size: 10.030534351145pt;'>lg</a>
<a href='http://yvranjeesh.v3r.us/tag/microsoft/' class='tag-link-151' title='8 topics' style='font-size: 9.0687022900763pt;'>microsoft</a>
<a href='http://yvranjeesh.v3r.us/tag/movie/' class='tag-link-375' title='7 topics' style='font-size: 8.5343511450382pt;'>movie</a>
<a href='http://yvranjeesh.v3r.us/tag/movies/' class='tag-link-338' title='15 topics' style='font-size: 11.740458015267pt;'>movies</a>
<a href='http://yvranjeesh.v3r.us/tag/phone/' class='tag-link-276' title='9 topics' style='font-size: 9.6030534351145pt;'>phone</a>
<a href='http://yvranjeesh.v3r.us/tag/playstation/' class='tag-link-657' title='7 topics' style='font-size: 8.5343511450382pt;'>playstation</a>
<a href='http://yvranjeesh.v3r.us/tag/portable/' class='tag-link-174' title='6 topics' style='font-size: 8pt;'>portable</a>
<a href='http://yvranjeesh.v3r.us/tag/rebate/' class='tag-link-169' title='6 topics' style='font-size: 8pt;'>rebate</a>
<a href='http://yvranjeesh.v3r.us/tag/refurbished/' class='tag-link-406' title='9 topics' style='font-size: 9.6030534351145pt;'>refurbished</a>
<a href='http://yvranjeesh.v3r.us/tag/samsung/' class='tag-link-184' title='6 topics' style='font-size: 8pt;'>samsung</a>
<a href='http://yvranjeesh.v3r.us/tag/sony/' class='tag-link-323' title='6 topics' style='font-size: 8pt;'>sony</a>
<a href='http://yvranjeesh.v3r.us/tag/ssd/' class='tag-link-160' title='8 topics' style='font-size: 9.0687022900763pt;'>ssd</a>
<a href='http://yvranjeesh.v3r.us/tag/tablet/' class='tag-link-271' title='12 topics' style='font-size: 10.778625954198pt;'>tablet</a>
<a href='http://yvranjeesh.v3r.us/tag/tv/' class='tag-link-189' title='10 topics' style='font-size: 10.030534351145pt;'>tv</a>
<a href='http://yvranjeesh.v3r.us/tag/walmart/' class='tag-link-117' title='13 topics' style='font-size: 11.206106870229pt;'>walmart</a>
<a href='http://yvranjeesh.v3r.us/tag/wifi/' class='tag-link-267' title='7 topics' style='font-size: 8.5343511450382pt;'>wifi</a>
<a href='http://yvranjeesh.v3r.us/tag/windows/' class='tag-link-297' title='6 topics' style='font-size: 8pt;'>windows</a>
<a href='http://yvranjeesh.v3r.us/tag/windows8/' class='tag-link-299' title='6 topics' style='font-size: 8pt;'>windows8</a></div>
</aside><aside id="categories-2" class="widget widget_categories"><h6 class="widget-title">Categories</h6>		<ul>
	<li class="cat-item cat-item-1"><a href="http://yvranjeesh.v3r.us/category/blog/" title="This category contains all my blogs.">Blog</a>
</li>
	<li class="cat-item cat-item-1042"><a href="http://yvranjeesh.v3r.us/category/interests/deals/" title="All Deals that are good in my opinion and posted on my tumblr account.">Deals</a>
</li>
	<li class="cat-item cat-item-3"><a href="http://yvranjeesh.v3r.us/category/work/" title="This page consists of all my projects I worked on.">Work</a>
</li>
		</ul>
</aside><aside id="recent-comments-2" class="widget widget_recent_comments"><h6 class="widget-title">Recent Comments</h6><ul id="recentcomments"></ul></aside><aside id="text-2" class="widget widget_text">			<div class="textwidget"><script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-39340040-3', 'auto');
  ga('send', 'pageview');

</script></div>
		</aside>		</div><!-- #secondary -->
		</section><!-- end .content-wrap -->

    </div><!-- end .content_container -->

	
<div class="sidebar_container">

    <div id="secondary-sidebar" class="sidebar_wrap row widget-area" role="complementary">

    	<div class="medium-12 large-12 columns">

    		            <div class="medium-12 large-12 columns">
                <aside id="search-2" class="widget widget_search">
<form role="search" method="get" id="searchform" action="http://yvranjeesh.v3r.us/">
	<div class="row collapse">
		<div class="medium-9 large-9 columns">
			<input type="text" value="" name="s" id="s" placeholder="Search">
		</div>
		<div class="medium-3 large-3 columns">
			<input type="submit" id="searchsubmit" value="Search" class="button postfix">
		</div>
	</div>
</form></aside>		<aside id="recent-posts-2" class="widget widget_recent_entries">		<h6 class="widget-title">Recent Posts</h6>		<ul>
					<li>
				<a href="http://yvranjeesh.v3r.us/git-prune-for-cleanup/">Git Prune for Cleanup</a>
						</li>
					<li>
				<a href="http://yvranjeesh.v3r.us/git-cherry-picking/">GIT Cherry Picking</a>
						</li>
					<li>
				<a href="http://yvranjeesh.v3r.us/10-e-movie-cash-for-avengers-age-of-ultron-with/">$10 e-Movie Cash for Avengers: Age of Ultron with pruchase of Kellogg&#8217;s Eggo Waffles 24 pak for $4.78 at Walmart</a>
						</li>
					<li>
				<a href="http://yvranjeesh.v3r.us/verizon-fios-triple-play-internet-tv-phone-for/">Verizon FiOS Triple Play &#8211; Internet, TV, Phone for $74.99 with 2 years contract and $300 Gift Card</a>
						</li>
					<li>
				<a href="http://yvranjeesh.v3r.us/durahook-coat-hook-for-free/">DuraHook Coat Hook for FREE</a>
						</li>
				</ul>
		</aside>		<aside id="meta-2" class="widget widget_meta"><h6 class="widget-title">Meta</h6>			<ul>
						<li><a href="http://yvranjeesh.v3r.us/wp-login.php">Log in</a></li>
			<li><a href="http://yvranjeesh.v3r.us/feed/">Entries <abbr title="Really Simple Syndication">RSS</abbr></a></li>
			<li><a href="http://yvranjeesh.v3r.us/comments/feed/">Comments <abbr title="Really Simple Syndication">RSS</abbr></a></li>
			<li><a href="https://wordpress.org/" title="Powered by WordPress, state-of-the-art semantic personal publishing platform.">WordPress.org</a></li>			</ul>
			</aside><aside id="archives-2" class="widget widget_archive"><h6 class="widget-title">Archives</h6>		<ul>
			<li><a href='http://yvranjeesh.v3r.us/2016/01/'>January 2016</a></li>
	<li><a href='http://yvranjeesh.v3r.us/2015/04/'>April 2015</a></li>
	<li><a href='http://yvranjeesh.v3r.us/2015/03/'>March 2015</a></li>
	<li><a href='http://yvranjeesh.v3r.us/2015/02/'>February 2015</a></li>
	<li><a href='http://yvranjeesh.v3r.us/2015/01/'>January 2015</a></li>
	<li><a href='http://yvranjeesh.v3r.us/2014/12/'>December 2014</a></li>
	<li><a href='http://yvranjeesh.v3r.us/2014/11/'>November 2014</a></li>
	<li><a href='http://yvranjeesh.v3r.us/2014/10/'>October 2014</a></li>
	<li><a href='http://yvranjeesh.v3r.us/2014/09/'>September 2014</a></li>
	<li><a href='http://yvranjeesh.v3r.us/2014/08/'>August 2014</a></li>
	<li><a href='http://yvranjeesh.v3r.us/2014/07/'>July 2014</a></li>
	<li><a href='http://yvranjeesh.v3r.us/2014/06/'>June 2014</a></li>
	<li><a href='http://yvranjeesh.v3r.us/2014/05/'>May 2014</a></li>
	<li><a href='http://yvranjeesh.v3r.us/2014/04/'>April 2014</a></li>
	<li><a href='http://yvranjeesh.v3r.us/2014/03/'>March 2014</a></li>
	<li><a href='http://yvranjeesh.v3r.us/2014/02/'>February 2014</a></li>
	<li><a href='http://yvranjeesh.v3r.us/2014/01/'>January 2014</a></li>
	<li><a href='http://yvranjeesh.v3r.us/2013/12/'>December 2013</a></li>
	<li><a href='http://yvranjeesh.v3r.us/2013/11/'>November 2013</a></li>
	<li><a href='http://yvranjeesh.v3r.us/2013/10/'>October 2013</a></li>
	<li><a href='http://yvranjeesh.v3r.us/2013/09/'>September 2013</a></li>
	<li><a href='http://yvranjeesh.v3r.us/2013/08/'>August 2013</a></li>
	<li><a href='http://yvranjeesh.v3r.us/2013/07/'>July 2013</a></li>
	<li><a href='http://yvranjeesh.v3r.us/2013/06/'>June 2013</a></li>
	<li><a href='http://yvranjeesh.v3r.us/2013/05/'>May 2013</a></li>
	<li><a href='http://yvranjeesh.v3r.us/2013/04/'>April 2013</a></li>
	<li><a href='http://yvranjeesh.v3r.us/2013/03/'>March 2013</a></li>
	<li><a href='http://yvranjeesh.v3r.us/2013/02/'>February 2013</a></li>
	<li><a href='http://yvranjeesh.v3r.us/2013/01/'>January 2013</a></li>
	<li><a href='http://yvranjeesh.v3r.us/2012/12/'>December 2012</a></li>
	<li><a href='http://yvranjeesh.v3r.us/2012/11/'>November 2012</a></li>
	<li><a href='http://yvranjeesh.v3r.us/2011/11/'>November 2011</a></li>
	<li><a href='http://yvranjeesh.v3r.us/2011/02/'>February 2011</a></li>
	<li><a href='http://yvranjeesh.v3r.us/2011/01/'>January 2011</a></li>
	<li><a href='http://yvranjeesh.v3r.us/2010/12/'>December 2010</a></li>
	<li><a href='http://yvranjeesh.v3r.us/2010/11/'>November 2010</a></li>
	<li><a href='http://yvranjeesh.v3r.us/2010/10/'>October 2010</a></li>
	<li><a href='http://yvranjeesh.v3r.us/2010/09/'>September 2010</a></li>
	<li><a href='http://yvranjeesh.v3r.us/2010/01/'>January 2010</a></li>
	<li><a href='http://yvranjeesh.v3r.us/2009/11/'>November 2009</a></li>
		</ul>
		</aside><aside id="tag_cloud-2" class="widget widget_tag_cloud"><h6 class="widget-title">Keywords</h6><div class="tagcloud"><a href='http://yvranjeesh.v3r.us/tag/3d/' class='tag-link-661' title='7 topics' style='font-size: 8.5343511450382pt;'>3d</a>
<a href='http://yvranjeesh.v3r.us/tag/4g/' class='tag-link-265' title='6 topics' style='font-size: 8pt;'>4g</a>
<a href='http://yvranjeesh.v3r.us/tag/1080p/' class='tag-link-186' title='15 topics' style='font-size: 11.740458015267pt;'>1080p</a>
<a href='http://yvranjeesh.v3r.us/tag/amazon/' class='tag-link-274' title='17 topics' style='font-size: 12.381679389313pt;'>amazon</a>
<a href='http://yvranjeesh.v3r.us/tag/android/' class='tag-link-281' title='7 topics' style='font-size: 8.5343511450382pt;'>android</a>
<a href='http://yvranjeesh.v3r.us/tag/apple/' class='tag-link-363' title='12 topics' style='font-size: 10.778625954198pt;'>apple</a>
<a href='http://yvranjeesh.v3r.us/tag/best-buy/' class='tag-link-491' title='7 topics' style='font-size: 8.5343511450382pt;'>Best Buy</a>
<a href='http://yvranjeesh.v3r.us/tag/bestbuy/' class='tag-link-476' title='10 topics' style='font-size: 10.030534351145pt;'>bestbuy</a>
<a href='http://yvranjeesh.v3r.us/tag/black-friday/' class='tag-link-459' title='11 topics' style='font-size: 10.458015267176pt;'>black friday</a>
<a href='http://yvranjeesh.v3r.us/tag/blackfriday/' class='tag-link-460' title='11 topics' style='font-size: 10.458015267176pt;'>blackfriday</a>
<a href='http://yvranjeesh.v3r.us/tag/bluetooth/' class='tag-link-428' title='7 topics' style='font-size: 8.5343511450382pt;'>bluetooth</a>
<a href='http://yvranjeesh.v3r.us/tag/bluray/' class='tag-link-350' title='14 topics' style='font-size: 11.526717557252pt;'>bluray</a>
<a href='http://yvranjeesh.v3r.us/tag/cheap/' class='tag-link-130' title='138 topics' style='font-size: 21.786259541985pt;'>cheap</a>
<a href='http://yvranjeesh.v3r.us/tag/deal/' class='tag-link-121' title='143 topics' style='font-size: 22pt;'>deal</a>
<a href='http://yvranjeesh.v3r.us/tag/deals/' class='tag-link-531' title='42 topics' style='font-size: 16.335877862595pt;'>deals</a>
<a href='http://yvranjeesh.v3r.us/tag/dell/' class='tag-link-190' title='7 topics' style='font-size: 8.5343511450382pt;'>Dell</a>
<a href='http://yvranjeesh.v3r.us/tag/ebay/' class='tag-link-270' title='12 topics' style='font-size: 10.778625954198pt;'>ebay</a>
<a href='http://yvranjeesh.v3r.us/tag/free/' class='tag-link-138' title='41 topics' style='font-size: 16.229007633588pt;'>Free</a>
<a href='http://yvranjeesh.v3r.us/tag/game/' class='tag-link-155' title='6 topics' style='font-size: 8pt;'>game</a>
<a href='http://yvranjeesh.v3r.us/tag/games/' class='tag-link-156' title='9 topics' style='font-size: 9.6030534351145pt;'>games</a>
<a href='http://yvranjeesh.v3r.us/tag/google/' class='tag-link-237' title='12 topics' style='font-size: 10.778625954198pt;'>google</a>
<a href='http://yvranjeesh.v3r.us/tag/hdd/' class='tag-link-163' title='12 topics' style='font-size: 10.778625954198pt;'>hdd</a>
<a href='http://yvranjeesh.v3r.us/tag/hdtv/' class='tag-link-185' title='24 topics' style='font-size: 13.87786259542pt;'>hdtv</a>
<a href='http://yvranjeesh.v3r.us/tag/ipad/' class='tag-link-362' title='9 topics' style='font-size: 9.6030534351145pt;'>ipad</a>
<a href='http://yvranjeesh.v3r.us/tag/iphone/' class='tag-link-565' title='8 topics' style='font-size: 9.0687022900763pt;'>iphone</a>
<a href='http://yvranjeesh.v3r.us/tag/laptop/' class='tag-link-166' title='11 topics' style='font-size: 10.458015267176pt;'>laptop</a>
<a href='http://yvranjeesh.v3r.us/tag/led/' class='tag-link-442' title='19 topics' style='font-size: 12.809160305344pt;'>led</a>
<a href='http://yvranjeesh.v3r.us/tag/lg/' class='tag-link-262' title='10 topics' style='font-size: 10.030534351145pt;'>lg</a>
<a href='http://yvranjeesh.v3r.us/tag/microsoft/' class='tag-link-151' title='8 topics' style='font-size: 9.0687022900763pt;'>microsoft</a>
<a href='http://yvranjeesh.v3r.us/tag/movie/' class='tag-link-375' title='7 topics' style='font-size: 8.5343511450382pt;'>movie</a>
<a href='http://yvranjeesh.v3r.us/tag/movies/' class='tag-link-338' title='15 topics' style='font-size: 11.740458015267pt;'>movies</a>
<a href='http://yvranjeesh.v3r.us/tag/phone/' class='tag-link-276' title='9 topics' style='font-size: 9.6030534351145pt;'>phone</a>
<a href='http://yvranjeesh.v3r.us/tag/playstation/' class='tag-link-657' title='7 topics' style='font-size: 8.5343511450382pt;'>playstation</a>
<a href='http://yvranjeesh.v3r.us/tag/portable/' class='tag-link-174' title='6 topics' style='font-size: 8pt;'>portable</a>
<a href='http://yvranjeesh.v3r.us/tag/rebate/' class='tag-link-169' title='6 topics' style='font-size: 8pt;'>rebate</a>
<a href='http://yvranjeesh.v3r.us/tag/refurbished/' class='tag-link-406' title='9 topics' style='font-size: 9.6030534351145pt;'>refurbished</a>
<a href='http://yvranjeesh.v3r.us/tag/samsung/' class='tag-link-184' title='6 topics' style='font-size: 8pt;'>samsung</a>
<a href='http://yvranjeesh.v3r.us/tag/sony/' class='tag-link-323' title='6 topics' style='font-size: 8pt;'>sony</a>
<a href='http://yvranjeesh.v3r.us/tag/ssd/' class='tag-link-160' title='8 topics' style='font-size: 9.0687022900763pt;'>ssd</a>
<a href='http://yvranjeesh.v3r.us/tag/tablet/' class='tag-link-271' title='12 topics' style='font-size: 10.778625954198pt;'>tablet</a>
<a href='http://yvranjeesh.v3r.us/tag/tv/' class='tag-link-189' title='10 topics' style='font-size: 10.030534351145pt;'>tv</a>
<a href='http://yvranjeesh.v3r.us/tag/walmart/' class='tag-link-117' title='13 topics' style='font-size: 11.206106870229pt;'>walmart</a>
<a href='http://yvranjeesh.v3r.us/tag/wifi/' class='tag-link-267' title='7 topics' style='font-size: 8.5343511450382pt;'>wifi</a>
<a href='http://yvranjeesh.v3r.us/tag/windows/' class='tag-link-297' title='6 topics' style='font-size: 8pt;'>windows</a>
<a href='http://yvranjeesh.v3r.us/tag/windows8/' class='tag-link-299' title='6 topics' style='font-size: 8pt;'>windows8</a></div>
</aside><aside id="categories-2" class="widget widget_categories"><h6 class="widget-title">Categories</h6>		<ul>
	<li class="cat-item cat-item-1"><a href="http://yvranjeesh.v3r.us/category/blog/" title="This category contains all my blogs.">Blog</a>
</li>
	<li class="cat-item cat-item-1042"><a href="http://yvranjeesh.v3r.us/category/interests/deals/" title="All Deals that are good in my opinion and posted on my tumblr account.">Deals</a>
</li>
	<li class="cat-item cat-item-3"><a href="http://yvranjeesh.v3r.us/category/work/" title="This page consists of all my projects I worked on.">Work</a>
</li>
		</ul>
</aside><aside id="recent-comments-2" class="widget widget_recent_comments"><h6 class="widget-title">Recent Comments</h6><ul id="recentcomments"></ul></aside><aside id="text-2" class="widget widget_text">			<div class="textwidget"><script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-39340040-3', 'auto');
  ga('send', 'pageview');

</script></div>
		</aside>            </div><!-- .first -->
                    
                        
            	
        
    	</div><!-- /columns -->    
                
    </div><!-- #secondary -->

</div><!-- end .sidebar_container -->
    <div class="footer_container">

    	<footer id="footer" class="footer_wrap row" role="contentinfo">

            

        <div class="medium-12 large-12 columns">

                                
        </div><!-- .columns -->
                     
        <div id="ftxt" class="site-info medium-12 large-12 columns cntr">
            
                             <p>Powered by <a href="http://themeawesome.com/responsive-wordpress-theme/" rel="follow" target="_blank" title="A Responsive WordPress Theme">WP-Forge</a> &amp; <a href="http://wordpress.org/" target="_blank" title="WordPress">WordPress</a></p>
                            
        </div><!-- .site-info -->

   



        	

    	</footer><!-- .row -->

    </div><!-- end #footer_container -->


    <div id="backtotop" class="hvr-fade">

        <span class="genericon genericon-collapse"></span>

    </div><!-- #backtotop -->

<script type='text/javascript' src='http://yvranjeesh.v3r.us/wp-content/plugins/akismet/_inc/form.js?ver=3.1.7'></script>
<script type='text/javascript' src='http://yvranjeesh.v3r.us/wp-content/themes/wp-forge/js/foundation.min.js?ver=5.5.3'></script>
<script type='text/javascript' src='http://yvranjeesh.v3r.us/wp-content/themes/wp-forge/js/wpforge-functions.js?ver=5.5.3'></script>
<script type='text/javascript' src='http://yvranjeesh.v3r.us/wp-content/themes/wp-forge/js/load-foundation.js?ver=5.5.2'></script>
<script type='text/javascript' src='http://yvranjeesh.v3r.us/wp-includes/js/wp-embed.min.js?ver=4.4.2'></script>
<script type='text/javascript' src='http://yvranjeesh.v3r.us/wp-includes/js/comment-reply.min.js?ver=4.4.2'></script>
</body>
</html>
<!-- Dynamic page generated in 0.105 seconds. -->
<!-- Cached page generated by WP-Super-Cache on 2016-02-21 08:17:23 -->