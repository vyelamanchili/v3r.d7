<?php die(); ?><?xml version="1.0" encoding="UTF-8"?><rss version="2.0"
	xmlns:content="http://purl.org/rss/1.0/modules/content/"
	xmlns:wfw="http://wellformedweb.org/CommentAPI/"
	xmlns:dc="http://purl.org/dc/elements/1.1/"
	xmlns:atom="http://www.w3.org/2005/Atom"
	xmlns:sy="http://purl.org/rss/1.0/modules/syndication/"
	xmlns:slash="http://purl.org/rss/1.0/modules/slash/"
	>

<channel>
	<title>Ranjeesh Loves to Share</title>
	<atom:link href="http://yvranjeesh.v3r.us/feed/" rel="self" type="application/rss+xml" />
	<link>http://yvranjeesh.v3r.us</link>
	<description>Tech, Personal and Deal Blog</description>
	<lastBuildDate>Thu, 25 Feb 2016 05:33:17 +0000</lastBuildDate>
	<language>en-US</language>
	<sy:updatePeriod>hourly</sy:updatePeriod>
	<sy:updateFrequency>1</sy:updateFrequency>
	<generator>https://wordpress.org/?v=4.4.2</generator>
	<item>
		<title>Git Prune for Cleanup</title>
		<link>http://yvranjeesh.v3r.us/git-prune-for-cleanup/</link>
		<comments>http://yvranjeesh.v3r.us/git-prune-for-cleanup/#respond</comments>
		<pubDate>Fri, 15 Jan 2016 16:06:41 +0000</pubDate>
		<dc:creator><![CDATA[Ranjeesh]]></dc:creator>
				<category><![CDATA[Work]]></category>
		<category><![CDATA[cleanup]]></category>
		<category><![CDATA[drupal]]></category>
		<category><![CDATA[git]]></category>
		<category><![CDATA[github]]></category>
		<category><![CDATA[junk]]></category>
		<category><![CDATA[prune]]></category>
		<category><![CDATA[repo]]></category>
		<category><![CDATA[repository]]></category>

		<guid isPermaLink="false">http://yvranjeesh.v3r.us/?p=801</guid>
		<description><![CDATA[When you or a team member removes a few branch from your remote git repository as part of cleanup and you still see the branches on your local environment you will have to run the git command below to remove (prune) all the branches from your local that do not exist on the remote repository anymore. git fetch &#8230; <a href="http://yvranjeesh.v3r.us/git-prune-for-cleanup/" class="more-link">Continue reading <span class="screen-reader-text">Git Prune for Cleanup</span> <span class="meta-nav">&#187;</span></a>]]></description>
				<content:encoded><![CDATA[<p>When you or a team member removes a few branch from your remote git repository as part of cleanup and you still see the branches on your local environment you will have to run the git command below to remove (prune) all the branches from your local that do not exist on the remote repository anymore.</p>
<blockquote><p>git fetch -p</p></blockquote>
]]></content:encoded>
			<wfw:commentRss>http://yvranjeesh.v3r.us/git-prune-for-cleanup/feed/</wfw:commentRss>
		<slash:comments>0</slash:comments>
		</item>
		<item>
		<title>GIT BFG</title>
		<link>http://yvranjeesh.v3r.us/git-bfg/</link>
		<comments>http://yvranjeesh.v3r.us/git-bfg/#respond</comments>
		<pubDate>Sun, 05 Jul 2015 04:22:41 +0000</pubDate>
		<dc:creator><![CDATA[Ranjeesh]]></dc:creator>
				<category><![CDATA[Blog]]></category>
		<category><![CDATA[Work]]></category>
		<category><![CDATA[bfg]]></category>
		<category><![CDATA[big files]]></category>
		<category><![CDATA[cleanup]]></category>
		<category><![CDATA[git]]></category>
		<category><![CDATA[github]]></category>
		<category><![CDATA[huge files]]></category>
		<category><![CDATA[large files]]></category>
		<category><![CDATA[limitation]]></category>

		<guid isPermaLink="false">http://yvranjeesh.v3r.us/?p=811</guid>
		<description><![CDATA[If you ever committed a large file (over 50 MB) in your git repository and are having issues pushing to the repository, you will have to use the BFG tool to delete the large file not only from the latest commit but also from the history of all commits in your repository to work properly on &#8230; <a href="http://yvranjeesh.v3r.us/git-bfg/" class="more-link">Continue reading <span class="screen-reader-text">GIT BFG</span> <span class="meta-nav">&#187;</span></a>]]></description>
				<content:encoded><![CDATA[<p>If you ever committed a large file (over 50 MB) in your git repository and are having issues pushing to the repository, you will have to use the BFG tool to delete the large file not only from the latest commit but also from the history of all commits in your repository to work properly on github.</p>
<p>if you see a similar error when pushing :</p>
<blockquote><p>Counting objects: 387, done.<br />
Delta compression using up to 8 threads.<br />
Compressing objects: 100% (349/349), done.<br />
Writing objects: 100% (387/387), 402.76 MiB | 7.53 MiB/s, done.<br />
Total 387 (delta 108), reused 48 (delta 36)<br />
remote: warning: File /xxxxxxxxxxmpg is 51.10 MB; this is larger than GitHub&#8217;s recommended maximum file size of 50.00 MB<br />
remote: error: GH001: Large files detected. You may want to try Git Large File Storage &#8211; https://git-lfs.github.com.<br />
remote: error: Trace: d051ecdf77d64a9b66a168bcb9608b85<br />
remote: error: See http://git.io/iEPt8g for more information.<br />
remote: error: File docroot/sites/Black_Eyed_Peas_Concert.3gp is 334.19 MB; this exceeds GitHub&#8217;s file size limit of 100.00 MB<br />
To git@github.com:xyxuhjhj.git<br />
! [remote rejected] master -&gt; master (pre-receive hook declined)</p></blockquote>
<p>do the following after downloaidng the BFG tool: (Courtesy: <a href="https://rtyley.github.io/bfg-repo-cleaner/#download">BFG Tool</a>)</p>
<blockquote>
<pre><code>git clone --mirror git://example.com/some-big-repo.git
</code></pre>
<pre><code>java -jar <a class="latest-download-link" href="http://repo1.maven.org/maven2/com/madgag/bfg/1.12.8/bfg-1.12.8.jar" data-event-category="Java command">bfg.jar</a> --strip-blobs-bigger-than 100M some-big-repo.git</code></pre>
<pre><code>$ cd some-big-repo.git
$ git reflog expire --expire=now --all &amp;&amp; git gc --prune=now --aggressive</code></pre>
</blockquote>
]]></content:encoded>
			<wfw:commentRss>http://yvranjeesh.v3r.us/git-bfg/feed/</wfw:commentRss>
		<slash:comments>0</slash:comments>
		</item>
		<item>
		<title>GIT Cherry Picking</title>
		<link>http://yvranjeesh.v3r.us/git-cherry-picking/</link>
		<comments>http://yvranjeesh.v3r.us/git-cherry-picking/#respond</comments>
		<pubDate>Fri, 10 Apr 2015 02:11:05 +0000</pubDate>
		<dc:creator><![CDATA[Ranjeesh]]></dc:creator>
				<category><![CDATA[Work]]></category>
		<category><![CDATA[blog]]></category>
		<category><![CDATA[branches]]></category>
		<category><![CDATA[cherry-pick]]></category>
		<category><![CDATA[code]]></category>
		<category><![CDATA[commit in branches]]></category>
		<category><![CDATA[development]]></category>
		<category><![CDATA[git]]></category>
		<category><![CDATA[git cherry-pick]]></category>
		<category><![CDATA[git commit]]></category>
		<category><![CDATA[github]]></category>
		<category><![CDATA[multi branch commit]]></category>
		<category><![CDATA[php]]></category>
		<category><![CDATA[repo]]></category>
		<category><![CDATA[repository]]></category>
		<category><![CDATA[technology]]></category>

		<guid isPermaLink="false">http://yvranjeesh.v3r.us/?p=789</guid>
		<description><![CDATA[Today I had to commit one change into two different branches (master and google). After googling for some time I found out that GIT has a way of picking one commit hash from a branch and apply it onto another branch. i.e. If we commit a change into google branch and want that commit to be &#8230; <a href="http://yvranjeesh.v3r.us/git-cherry-picking/" class="more-link">Continue reading <span class="screen-reader-text">GIT Cherry Picking</span> <span class="meta-nav">&#187;</span></a>]]></description>
				<content:encoded><![CDATA[<p>Today I had to commit one change into two different branches (master and google). After googling for some time I found out that GIT has a way of picking one commit hash from a branch and apply it onto another branch.</p>
<p>i.e. If we commit a change into google branch and want that commit to be applied into the master branch too then we get the hash code of the commit from the google branch using the command &#8220;git log&#8221; and apply the commit hash onto the master branch using the following command.</p>
<pre><span style="color: #0000ff;">git cherry-pick [commit-hash]

</span></pre>
<p>The sequence of commands in my case was as follows: (branches master and google):</p>
<blockquote>
<pre><span style="color: #808080;">git checkout google</span></pre>
<pre><span style="color: #808080;">git pull origin google</span></pre>
<p><span style="color: #808080;">[always pull before commit and push]</span></p>
<pre><span style="color: #808080;">git commit -a -m "committing all changes to google branch"</span></pre>
<pre><span style="color: #808080;">git push origin google</span></pre>
<pre><span style="color: #808080;">git log</span></pre>
<p><span style="color: #808080;">[get the hashcode for the commit above and lets call it 62abc3]</span></p>
<pre><span style="color: #808080;">git checkout master</span></pre>
<pre><span style="color: #808080;">git pull </span></pre>
<p><span style="color: #808080;">[always pull before commit and push]</span></p>
<pre><span style="color: #808080;">git cherry-pick 62abc3</span></pre>
</blockquote>
<p>&nbsp;</p>
]]></content:encoded>
			<wfw:commentRss>http://yvranjeesh.v3r.us/git-cherry-picking/feed/</wfw:commentRss>
		<slash:comments>0</slash:comments>
		</item>
		<item>
		<title>$10 e-Movie Cash for Avengers: Age of Ultron with pruchase of Kellogg&#8217;s Eggo Waffles 24 pak for $4.78 at Walmart</title>
		<link>http://yvranjeesh.v3r.us/10-e-movie-cash-for-avengers-age-of-ultron-with/</link>
		<comments>http://yvranjeesh.v3r.us/10-e-movie-cash-for-avengers-age-of-ultron-with/#respond</comments>
		<pubDate>Sat, 04 Apr 2015 00:12:08 +0000</pubDate>
		<dc:creator><![CDATA[Ranjeesh]]></dc:creator>
				<category><![CDATA[Deals]]></category>
		<category><![CDATA[age of ultron]]></category>
		<category><![CDATA[avengers]]></category>
		<category><![CDATA[campatin america]]></category>
		<category><![CDATA[cheap]]></category>
		<category><![CDATA[deal]]></category>
		<category><![CDATA[eggo]]></category>
		<category><![CDATA[hulk]]></category>
		<category><![CDATA[iron man]]></category>
		<category><![CDATA[kelloggs]]></category>
		<category><![CDATA[marvel]]></category>
		<category><![CDATA[thor]]></category>
		<category><![CDATA[ultron]]></category>
		<category><![CDATA[waffles]]></category>
		<category><![CDATA[walmart]]></category>

		<guid isPermaLink="false">http://yvranjeesh.v3r.us/10-e-movie-cash-for-avengers-age-of-ultron-with/</guid>
		<description><![CDATA[$10 e-Movie Cash for Avengers: Age of Ultron with pruchase of Kellogg&#8217;s Eggo Waffles 24 pak for $4.78 at Walmart I purchased the &#8220;Specially marked&#8221; Kelloggs Eggo Waffles 24 Pack for $4.78 at Walmart and received a $10 e movie Cash that can be used against Avengers: Age of Ultron releasing May 1st 2015 A &#8230; <a href="http://yvranjeesh.v3r.us/10-e-movie-cash-for-avengers-age-of-ultron-with/" class="more-link">Continue reading <span class="screen-reader-text">$10 e-Movie Cash for Avengers: Age of Ultron with pruchase of Kellogg&#8217;s Eggo Waffles 24 pak for $4.78 at Walmart</span> <span class="meta-nav">&#187;</span></a>]]></description>
				<content:encoded><![CDATA[<p><a href='http://slickdeals.net/f/7775317-avengers-age-of-ultron-10-e-movie-cash-with-pruchase-of-kelloggs-eggo-waffles-24-pak-for-4-78-at-walmart?v=1&amp;p=75244395#post75244395'>$10 e-Movie Cash for Avengers: Age of Ultron with pruchase of Kellogg&#8217;s Eggo Waffles 24 pak for $4.78 at Walmart</a>
<div class="link_description">
<blockquote class="link_og_blockquote">I purchased the &ldquo;Specially marked&rdquo; Kelloggs Eggo Waffles 24 Pack for $4.78 at Walmart and received a $10 e movie Cash that can be used against Avengers: Age of Ultron releasing May 1st 2015<br />
A picture of receipt has to be sent via text message or email to redeem the eMovieCash then it can be&hellip;</p></blockquote>
</div>
]]></content:encoded>
			<wfw:commentRss>http://yvranjeesh.v3r.us/10-e-movie-cash-for-avengers-age-of-ultron-with/feed/</wfw:commentRss>
		<slash:comments>0</slash:comments>
		</item>
		<item>
		<title>Verizon FiOS Triple Play &#8211; Internet, TV, Phone for $74.99 with 2 years contract and $300 Gift Card</title>
		<link>http://yvranjeesh.v3r.us/verizon-fios-triple-play-internet-tv-phone-for/</link>
		<comments>http://yvranjeesh.v3r.us/verizon-fios-triple-play-internet-tv-phone-for/#respond</comments>
		<pubDate>Tue, 31 Mar 2015 19:15:06 +0000</pubDate>
		<dc:creator><![CDATA[Ranjeesh]]></dc:creator>
				<category><![CDATA[Deals]]></category>
		<category><![CDATA[cable]]></category>
		<category><![CDATA[cheap]]></category>
		<category><![CDATA[deal]]></category>
		<category><![CDATA[fast]]></category>
		<category><![CDATA[fios]]></category>
		<category><![CDATA[internet]]></category>
		<category><![CDATA[verizon]]></category>
		<category><![CDATA[virginia]]></category>

		<guid isPermaLink="false">http://yvranjeesh.v3r.us/verizon-fios-triple-play-internet-tv-phone-for/</guid>
		<description><![CDATA[Verizon FiOS Triple Play &#8211; Internet, TV, Phone for $74.99 with 2 years contract and $300 Gift Card Verizon FiOS Triple Play Offers – Get more speed with FiOS Quantum Internet, more entertainment with premium channels, and home phone service with 2 yr agmt. 25 MBPS internet with 155+ Channels for 2 years comes to &#8230; <a href="http://yvranjeesh.v3r.us/verizon-fios-triple-play-internet-tv-phone-for/" class="more-link">Continue reading <span class="screen-reader-text">Verizon FiOS Triple Play &#8211; Internet, TV, Phone for $74.99 with 2 years contract and $300 Gift Card</span> <span class="meta-nav">&#187;</span></a>]]></description>
				<content:encoded><![CDATA[<p><a href='http://www.verizon.com/home/MLP/OnlineOFW.html?x1=TP_CHOICE&amp;promotion_code=JUNCT/W04&amp;CMP=AFC-CON_2015-Q1_CJ-NA-Q12015FiOSTPTextCJ_0002&amp;AID=12089322&amp;PID=552179&amp;SID=VlJydkVRb0tNcTRBQURNS3JvNEFBQUFF'>Verizon FiOS Triple Play &#8211; Internet, TV, Phone for $74.99 with 2 years contract and $300 Gift Card</a>
<div class="link_description">
<blockquote class="link_og_blockquote">Verizon FiOS Triple Play Offers – Get more speed with FiOS Quantum Internet, more entertainment with premium channels, and home phone service with 2 yr agmt.</p></blockquote>
<p>25 MBPS internet with 155+ Channels for 2 years comes to around $1499  </p>
<p>VS </p>
<p>50 MBPS internet with 20 cable channels for $59.99 per month that comes to around $1439 for 2 years.</p>
</div>
]]></content:encoded>
			<wfw:commentRss>http://yvranjeesh.v3r.us/verizon-fios-triple-play-internet-tv-phone-for/feed/</wfw:commentRss>
		<slash:comments>0</slash:comments>
		</item>
		<item>
		<title>DuraHook Coat Hook for FREE</title>
		<link>http://yvranjeesh.v3r.us/durahook-coat-hook-for-free/</link>
		<comments>http://yvranjeesh.v3r.us/durahook-coat-hook-for-free/#respond</comments>
		<pubDate>Mon, 30 Mar 2015 17:29:48 +0000</pubDate>
		<dc:creator><![CDATA[Ranjeesh]]></dc:creator>
				<category><![CDATA[Deals]]></category>
		<category><![CDATA[coat]]></category>
		<category><![CDATA[coat hanger]]></category>
		<category><![CDATA[deal]]></category>
		<category><![CDATA[durahook]]></category>
		<category><![CDATA[Free]]></category>
		<category><![CDATA[hanger]]></category>
		<category><![CDATA[hook]]></category>
		<category><![CDATA[no card]]></category>
		<category><![CDATA[no payment]]></category>
		<category><![CDATA[nocard]]></category>

		<guid isPermaLink="false">http://yvranjeesh.v3r.us/durahook-coat-hook-for-free/</guid>
		<description><![CDATA[DuraHook Coat Hook for FREE DuraHook offers its DuraHook Coat Hook in 10 colors (Deep Red pictured) for free with free shipping. That&#8217;s $2 off and the best deal we&#8217;ve seen for any coat hook. It features a curved design that&#8230;]]></description>
				<content:encoded><![CDATA[<p><a href='http://dealnews.com/Dura-Hook-Coat-Hook-for-free-free-shipping/1314670.html'>DuraHook Coat Hook for FREE</a>
<div class="link_description">
<blockquote class="link_og_blockquote">DuraHook offers its DuraHook Coat Hook in 10 colors (Deep Red pictured) for free with free shipping. That&rsquo;s $2 off and the best deal we&rsquo;ve seen for any coat hook. It features a curved design that&hellip;</p></blockquote>
</div>
]]></content:encoded>
			<wfw:commentRss>http://yvranjeesh.v3r.us/durahook-coat-hook-for-free/feed/</wfw:commentRss>
		<slash:comments>0</slash:comments>
		</item>
		<item>
		<title>Xbox Game &#8211; Forza Horizon 2 Presents Fast &#038; Furious for FREE</title>
		<link>http://yvranjeesh.v3r.us/xbox-game-forza-horizon-2-presents-fast/</link>
		<comments>http://yvranjeesh.v3r.us/xbox-game-forza-horizon-2-presents-fast/#respond</comments>
		<pubDate>Fri, 27 Mar 2015 20:48:11 +0000</pubDate>
		<dc:creator><![CDATA[Ranjeesh]]></dc:creator>
				<category><![CDATA[Deals]]></category>
		<category><![CDATA[cheap]]></category>
		<category><![CDATA[console]]></category>
		<category><![CDATA[deal]]></category>
		<category><![CDATA[download]]></category>
		<category><![CDATA[Free]]></category>
		<category><![CDATA[game]]></category>
		<category><![CDATA[games]]></category>
		<category><![CDATA[microsoft]]></category>
		<category><![CDATA[online]]></category>
		<category><![CDATA[xbox]]></category>
		<category><![CDATA[xbox live]]></category>
		<category><![CDATA[xbox live free]]></category>
		<category><![CDATA[xbox360]]></category>
		<category><![CDATA[xboxlive]]></category>
		<category><![CDATA[xboxone]]></category>
		<category><![CDATA[xone]]></category>

		<guid isPermaLink="false">http://yvranjeesh.v3r.us/xbox-game-forza-horizon-2-presents-fast/</guid>
		<description><![CDATA[Xbox Game &#8211; Forza Horizon 2 Presents Fast &#38; Furious for FREE Get teh Fats and Furious by Forza Horizon 2 for Xbox One and Xbox 360 Free]]></description>
				<content:encoded><![CDATA[<p><a href='http://marketplace.xbox.com/en-US/Product/Forza-Horizon-2-Presents-Fast-Furious/66acd000-77fe-1000-9115-d8024d530ab5?purchase=1&amp;purchaseid=66acd000-77fe-1000-9115-d8024d530ab5'>Xbox Game &#8211; Forza Horizon 2 Presents Fast &amp; Furious for FREE</a>
<div class="link_description">
<p>Get teh Fats and Furious by Forza Horizon 2 for Xbox One and Xbox 360 Free</p>
</div>
]]></content:encoded>
			<wfw:commentRss>http://yvranjeesh.v3r.us/xbox-game-forza-horizon-2-presents-fast/feed/</wfw:commentRss>
		<slash:comments>0</slash:comments>
		</item>
		<item>
		<title>PNY 2.5&#8243; 120GB SSD for $44 after rebate</title>
		<link>http://yvranjeesh.v3r.us/pny-2-5-120gb-ssd-for-44-after-rebate/</link>
		<comments>http://yvranjeesh.v3r.us/pny-2-5-120gb-ssd-for-44-after-rebate/#respond</comments>
		<pubDate>Fri, 20 Mar 2015 21:36:13 +0000</pubDate>
		<dc:creator><![CDATA[Ranjeesh]]></dc:creator>
				<category><![CDATA[Deals]]></category>
		<category><![CDATA[120gb]]></category>
		<category><![CDATA[cheap]]></category>
		<category><![CDATA[deal]]></category>
		<category><![CDATA[external]]></category>
		<category><![CDATA[hard disk]]></category>
		<category><![CDATA[hdd]]></category>
		<category><![CDATA[internal]]></category>
		<category><![CDATA[laptop]]></category>
		<category><![CDATA[pny]]></category>
		<category><![CDATA[solid state drive]]></category>
		<category><![CDATA[ssd]]></category>

		<guid isPermaLink="false">http://yvranjeesh.v3r.us/pny-2-5-120gb-ssd-for-44-after-rebate/</guid>
		<description><![CDATA[PNY 2.5&#8243; 120GB SSD for $44 after rebate Buy PNY SSD7SC120GOPT-RB 2.5&#34; 120GB ATA 6Gb/s (SATA III) NAND Internal / External Solid State Drive (SSD) with fast shipping and top-rated customer service.Once you know, you Newegg!]]></description>
				<content:encoded><![CDATA[<p><a href='http://www.newegg.com/Product/Product.aspx?Item=N82E16820178761&amp;nm_mc=AFC-dealnews&amp;cm_mmc=AFC-dealnews-_-NA-_-NA-_-N82E16820178761'>PNY 2.5&#8243; 120GB SSD for $44 after rebate</a>
<div class="link_description">
<blockquote class="link_og_blockquote">Buy PNY SSD7SC120GOPT-RB 2.5&quot; 120GB ATA 6Gb/s (SATA III) NAND Internal / External Solid State Drive (SSD) with fast shipping and top-rated customer service.Once you know, you Newegg!</p></blockquote>
</div>
]]></content:encoded>
			<wfw:commentRss>http://yvranjeesh.v3r.us/pny-2-5-120gb-ssd-for-44-after-rebate/feed/</wfw:commentRss>
		<slash:comments>0</slash:comments>
		</item>
		<item>
		<title>Refurbished: Digital2 Metallic Silver 4400 mAh Portable Battery for $2 shipped</title>
		<link>http://yvranjeesh.v3r.us/refurbished-digital2-metallic-silver-4400-mah/</link>
		<comments>http://yvranjeesh.v3r.us/refurbished-digital2-metallic-silver-4400-mah/#respond</comments>
		<pubDate>Wed, 18 Mar 2015 02:10:55 +0000</pubDate>
		<dc:creator><![CDATA[Ranjeesh]]></dc:creator>
				<category><![CDATA[Deals]]></category>
		<category><![CDATA[battery]]></category>
		<category><![CDATA[charge]]></category>
		<category><![CDATA[charging]]></category>
		<category><![CDATA[cheap]]></category>
		<category><![CDATA[deal]]></category>
		<category><![CDATA[newegg]]></category>
		<category><![CDATA[portable]]></category>
		<category><![CDATA[rebate]]></category>

		<guid isPermaLink="false">http://yvranjeesh.v3r.us/refurbished-digital2-metallic-silver-4400-mah/</guid>
		<description><![CDATA[Refurbished: Digital2 Metallic Silver 4400 mAh Portable Battery for $2 shipped Buy Refurbished: Digital2 Metallic Silver 4400 mAh Portable Battery RP-4400F_MS with fast shipping and top-rated customer service. Once you know, you Newegg! Free After mail in rebate + 2 shipping]]></description>
				<content:encoded><![CDATA[<p><a href='http://www.newegg.com/Product/Product.aspx?Item=N82E16875872078&amp;nm_mc=AFC-dealnews&amp;cm_mmc=AFC-dealnews-_-NA-_-NA-_-N82E16875872078'>Refurbished: Digital2 Metallic Silver 4400 mAh Portable Battery for $2 shipped</a>
<div class="link_description">
<blockquote class="link_og_blockquote">Buy Refurbished: Digital2 Metallic Silver 4400 mAh Portable Battery RP-4400F_MS with fast shipping and top-rated customer service. Once you know, you Newegg!</p></blockquote>
<p>Free After mail in rebate + 2 shipping</p>
</div>
]]></content:encoded>
			<wfw:commentRss>http://yvranjeesh.v3r.us/refurbished-digital2-metallic-silver-4400-mah/feed/</wfw:commentRss>
		<slash:comments>0</slash:comments>
		</item>
		<item>
		<title>Wireless 8-LED Light-Switch Night Light for $5</title>
		<link>http://yvranjeesh.v3r.us/wireless-8-led-light-switch-night-light-for-5/</link>
		<comments>http://yvranjeesh.v3r.us/wireless-8-led-light-switch-night-light-for-5/#respond</comments>
		<pubDate>Tue, 17 Mar 2015 17:06:14 +0000</pubDate>
		<dc:creator><![CDATA[Ranjeesh]]></dc:creator>
				<category><![CDATA[Deals]]></category>

		<guid isPermaLink="false">http://yvranjeesh.v3r.us/wireless-8-led-light-switch-night-light-for-5/</guid>
		<description><![CDATA[Wireless 8-LED Light-Switch Night Light for $5 As one of its daily deals, 13 Deals offers this Wireless 8-LED Light-Switch Night Light for $5.49 with free shipping. That&#8217;s tied with our mention from last fall as the lowest total price we&#8217;ve se&#8230; Use code LUCKY1 or LUCKY2 or LUCKY3 to get more discount. Lucky3 showed &#8230; <a href="http://yvranjeesh.v3r.us/wireless-8-led-light-switch-night-light-for-5/" class="more-link">Continue reading <span class="screen-reader-text">Wireless 8-LED Light-Switch Night Light for $5</span> <span class="meta-nav">&#187;</span></a>]]></description>
				<content:encoded><![CDATA[<p><a href='http://dealnews.com/Wireless-8-LED-Light-Switch-Night-Light-for-5-free-shipping/1303654.html'>Wireless 8-LED Light-Switch Night Light for $5</a>
<div class="link_description">
<blockquote class="link_og_blockquote">As one of its daily deals, 13 Deals offers this Wireless 8-LED Light-Switch Night Light for $5.49 with free shipping. That&rsquo;s tied with our mention from last fall as the lowest total price we&rsquo;ve se&hellip;</p></blockquote>
<p>Use code LUCKY1 or LUCKY2 or LUCKY3 to get more discount. Lucky3 showed 17% to me.</p>
</div>
]]></content:encoded>
			<wfw:commentRss>http://yvranjeesh.v3r.us/wireless-8-led-light-switch-night-light-for-5/feed/</wfw:commentRss>
		<slash:comments>0</slash:comments>
		</item>
	</channel>
</rss>

<!-- Dynamic page generated in 0.069 seconds. -->
<!-- Cached page generated by WP-Super-Cache on 2016-02-29 18:14:35 -->
