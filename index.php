<?php

// 		Global Variables
$URL = 'http://labs.eustasy.org/comments-evolved/';
$TextTitle = 'Comments Evolved for Websites';
$Width = '720';

// 		Service Specific
$GooglePublisherID = '104940724208411264664';
$GoogleAuthorID = '105729291739660012806';
$FacebookAppID = '465961836804089';
$DisqusShortname = 'eustasylabs';
$DisqusKey = 'bFpSneWZaAvysz7PfIclEj3PLexRlxPjBSOui1eun65twXRbRxVlcq09TBzRk1xC';

// 		DO NOT MODIFY

require 'simple_html_dom.php';
$GplusFetch = file_get_html('https://apis.google.com/_/widget/render/commentcount?bsv&href=' . $URL);
$GplusRaw = $GplusFetch->find('#widget_bounds > span', 0);
$GplusToTrim = split(' ', $GplusRaw->plaintext);
$GplusCount = trim($GplusToTrim[0]);

$FacebookFetch = file_get_contents('https://graph.facebook.com/?ids=' . $URL);
$FacebookJson = json_decode($FacebookFetch);
if(!empty($FacebookJson->$URL->comments)){
	$FacebookCount = $FacebookJson->$URL->comments;
} else {
	$FacebookCount = 0;
}

$DisqusFetch = file_get_contents('https://disqus.com/api/3.0/threads/details.json?api_key=' . $DisqusKey . '&forum=' . $DisqusShortname . '&thread:link=' . $URL);
$DisqusJson = json_decode($DisqusFetch);
if(!empty($DisqusJson)){
	$DisqusCount = $DisqusJson->response->posts;
} else {
	$DisqusCount = 0;
}

?><!DocType html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Comments Evolved for Websites &nbsp;&middot;&nbsp; eustasy Labs</title>
	<link rel="icon" href="//eustasy.org/favicon.ico">
	<link rel="canonical" href="<?php echo $URL; ?>">
	<link rel="author" href="//plus.google.com/<?php echo $GoogleAuthorID; ?>?rel=author">
	<link rel="publisher" href="//plus.google.com/<?php echo $GooglePublisherID; ?>?rel=publisher">
	<style>
		body {
			width: 720px;
			margin: 5% auto;
			padding: 0;
			font: 300 1em/1.4 'Open Sans';
		}
		a { text-decoration: none; }
		h1, h2 { font-weight: 300; text-align: center; }
	</style>
	<script>
		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
		ga('create', 'UA-28932148-12', 'eustasy.org');
		ga('send', 'pageview');
	</script>
	<script src="jquery-1.10.2.min.js"></script>
</head>
<body>

	<h1>Comments Evolved for Websites</h1>

	<h2>Google+</h2>
	<p>Google Plus Comments are totally unsupported by Google. They were originally rolled out as part of Blogger, and are now making there way into YouTube. Until they are an official thing, there may be bugs. Bugs which are internal to there servers and happen only when this program is being used on sites they shouldn't (i.e. all of them). We can do nothing about this. Hopefully this script is simple enough for you to simple remove the Google Plus parts and make do with official systems.</p>

	<h2>Facebook</h2>
	<p>Facebook works automatically, all by itself.</p>

	<h2>Disqus</h2>
	<p>For Disqus comments you will need a <a href="//disqus.com/admin/signup/">Disqus account</a>. You'll need to add each website you want to host comments on, and configure each individual shortname for each one. You'll also need your <a href="//disqus.com/api/applications/">API Key</a> from an appliction (i recommend you <a href="//disqus.com/api/applications/register/">create a new one</a>) which will allow you to fetch the number of comments 1,000 times an hour. If you will be exceeding that limit, you will need to contact them to raise your plan, or remove the Disqus comment counter from within this script.</p>

	<h2>Comments</h2>

	<div id="comment-tabs">
		<ul>
			<li><a class="tabs gplus" href="#gplus">Google+ (<?php echo $GplusCount; ?>)</a></li>
			<li><a class="tabs facebook" href="#facebook">Facebook (<?php echo $FacebookCount; ?>)</a></li>
			<li><a class="tabs disqus" href="#disqus">Disqus (<?php echo $DisqusCount; ?>)</a></li>
		</ul>

		<div class="comments gplus" id="gplus">
			<script>
				$(document).ready(function($) {
					$('#gplus-replace').html('<div class="g-comments" data-width="<?php echo $Width; ?>" data-href="<?php echo $URL; ?>" data-first_party_property="BLOGGER" data-view_type="FILTERED_POSTMOD">Loading Google+ Comments ...</div>');
				});
			</script>
			<div id="gplus-replace"></div>
			<script async type="text/javascript" src="//apis.google.com/js/plusone.js?callback=gpcb"></script>
			<noscript>Please enable JavaScript to view the <a href="https://plus.google.com/">comments powered by Google+.</a></noscript><script src="//apis.google.com/js/plusone.js"></script>
		</div>

		<div class="comments facebook" id="facebook">
			<div id="fb-root"></div>
			<div id="fb-replace">Loading Facebook Comments ...</div>
			<script type="text/javascript">
				$(document).ready(function($){
					$('#fb-replace').html('<div class="fb-comments" data-width="<?php echo $Width; ?>" data-href="<?php echo $URL; ?>" data-num-posts="10" data-colorscheme="light" data-mobile="auto"></div>');
				});
			</script>
			<script async type="text/javascript" src="//connect.facebook.net/en_US/all.js#xfbml=1">FB.init();</script>
			<noscript>Please enable JavaScript to view the <a href="https://www.facebook.com/">comments powered by Facebook.</a></noscript>
		</div>

		<div class="comments disqus" id="disqus">
			<div id="disqus_thread">Loading Disqus Comments...</div>
			<script>
				var disqus_shortname = '<?php echo $DisqusShortname; ?>';
				var disqus_title = '<?php echo $TextTitle; ?>';
				var disqus_url = '<?php echo $URL; ?>';
				(function() {
					var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
					dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
					(document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
				})();
			</script>
			<noscript>Please enable JavaScript to view the <a href="http://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
		</div>

	</div>

	<link rel="stylesheet" href="comments-evolved-styles.css" type="text/css" media="all" />
	<script src="jquery.ui.core.min.js"></script>
	<script src="jquery.ui.widget.min.js"></script>
	<script src="jquery.ui.tabs.min.js"></script>
	<script>$("#comment-tabs").tabs();</script>

<body>
</html>
