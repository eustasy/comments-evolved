<!DocType html>
<html>
<head>
	<meta charset="UTF-8">
	<link rel="icon" href="https://labs.eustasy.org/favicon.ico">
	<title>Comments Evolved for Websites &nbsp;&middot;&nbsp; eustasy Labs</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/combine/gh/eustasy/Colors.css@1/colors.min.css,gh/necolas/normalize.css@8/normalize.min.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400|Lusitana|Source+Code+Pro" data-noprefix>
	<link rel="stylesheet" href="/assets/css/grid.min.css">
	<link rel="stylesheet" href="/assets/css/labs.css">
	<?php
		$Canonical = 'https://labs.eustasy.org/comments-evolved/';
		require '_functions/CommentsEvolved/autoload.php';
		echo CommentsEvolved_Header($Canonical);
	?>
	<style>
		body {
			width: 720px;
			margin: 5% auto;
			padding: 0;
			font: 300 1em/1.4 'Open Sans';
		}
		a { text-decoration: none; color: #3a8ee6; }
		h1, h2 { font-weight: 300; text-align: center; }
	</style>
	<script>
		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
		ga('create', 'UA-45667989-11', 'eustasy.org');
		ga('send', 'pageview');
	</script>
</head>
<body>

	<a href="https://github.com/eustasy/comments-evolved" class="github-corner" aria-label="View source on Github">
		<svg width="80" height="80" viewBox="0 0 250 250" aria-hidden="true">
			<path d="M0,0 L115,115 L130,115 L142,142 L250,250 L250,0 Z"></path>
			<path class="octo-arm" fill="currentColor" style="transform-origin: 130px 106px;" d="M128.3,109.0 C113.8,99.7 119.0,89.6 119.0,89.6 C122.0,82.7 120.5,78.6 120.5,78.6 C119.2,72.0 123.4,76.3 123.4,76.3 C127.3,80.9 125.5,87.3 125.5,87.3 C122.9,97.6 130.6,101.9 134.4,103.2"></path>
			<path class="octo-body" fill="currentColor" d="M115.0,115.0 C114.9,115.1 118.7,116.5 119.8,115.4 L133.7,101.6 C136.9,99.2 139.9,98.4 142.2,98.6 C133.8,88.0 127.5,74.4 143.8,58.0 C148.5,53.4 154.0,51.2 159.7,51.0 C160.3,49.4 163.2,43.6 171.4,40.1 C171.4,40.1 176.1,42.5 178.8,56.2 C183.1,58.6 187.2,61.8 190.9,65.4 C194.5,69.0 197.7,73.2 200.1,77.6 C213.8,80.2 216.3,84.9 216.3,84.9 C212.7,93.1 206.9,96.0 205.4,96.6 C205.1,102.4 203.0,107.8 198.3,112.5 C181.9,128.9 168.3,122.5 157.7,114.1 C157.9,116.9 156.7,120.9 152.7,124.9 L141.0,136.5 C139.8,137.7 141.6,141.9 141.8,141.8 Z"></path>
		</svg>
	</a>

	<h1>Comments Evolved for Websites</h1>

	<h2>Google+</h2>
	<p style="color:#df382c;">Google Plus comments do not appear to work on some pages/domains at this time.</p>
	<p class="text-left">Google Plus Comments are totally unsupported by Google. They were originally rolled out as part of Blogger, and are now making there way into YouTube. Until they are an official thing, there may be bugs. Bugs which are internal to their servers and happen only when this program is being used on sites they shouldn't (i.e. all of them). We can do nothing about this. Hopefully this script is simple enough for you to simple remove the Google Plus parts and make do with official systems.</p>

	<h2>Facebook</h2>
	<p>Facebook works automatically, all by itself.</p>

	<h2>Disqus</h2>
	<p class="text-left">For Disqus comments you will need a <a href="https://disqus.com/admin/signup/">Disqus account</a>. You'll need to add each website you want to host comments on, and configure each individual shortname for each one. You'll also need your <a href="https://disqus.com/api/applications/">API Key</a> from an appliction (i recommend you <a href="https://disqus.com/api/applications/register/">create a new one</a>) which will allow you to fetch the number of comments 1,000 times an hour. If you will be exceeding that limit, you will need to contact them to raise your plan, or remove the Disqus comment counter from within this script.</p>

	<h2>Comments</h2>

	<?php
		echo CommentsEvolved_Comments(
			$Canonical,
			'Comments Evolved for HTML',
			true,
			true,
			false,
			true
		);
	?>

<body>
</html>
