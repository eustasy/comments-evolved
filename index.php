<!DocType html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Comments Evolved for Websites &nbsp;&middot;&nbsp; eustasy Labs</title>
	<link rel="icon" href="//eustasy.org/favicon.ico">
	<?php
		$Canonical = 'http://labs.eustasy.org/comments-evolved/';
		require 'CommentsEvolved.php';
		CommentsEvolved_Header($Canonical);
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

	<a href="https://github.com/eustasy/comments-evolved"><img src="https://s3.amazonaws.com/github/ribbons/forkme_right_gray_6d6d6d.png" alt="Comments Evolved on GitHub" style="position: absolute; top: 0; right: 0;"></a>

	<h1>Comments Evolved for Websites</h1>

	<h2>Google+</h2>
	<p style="color:#df382c;">Google Plus comments do not appear to work on some pages/domains at this time.</p>
	<p>Google Plus Comments are totally unsupported by Google. They were originally rolled out as part of Blogger, and are now making there way into YouTube. Until they are an official thing, there may be bugs. Bugs which are internal to their servers and happen only when this program is being used on sites they shouldn't (i.e. all of them). We can do nothing about this. Hopefully this script is simple enough for you to simple remove the Google Plus parts and make do with official systems.</p>

	<h2>Facebook</h2>
	<p>Facebook works automatically, all by itself.</p>

	<h2>Disqus</h2>
	<p>For Disqus comments you will need a <a href="//disqus.com/admin/signup/">Disqus account</a>. You'll need to add each website you want to host comments on, and configure each individual shortname for each one. You'll also need your <a href="//disqus.com/api/applications/">API Key</a> from an appliction (i recommend you <a href="//disqus.com/api/applications/register/">create a new one</a>) which will allow you to fetch the number of comments 1,000 times an hour. If you will be exceeding that limit, you will need to contact them to raise your plan, or remove the Disqus comment counter from within this script.</p>

	<h2>Comments</h2>

	<?php
		CommentsEvolved_Comments($Canonical, 'Comments Evolved for HTML', true, true, true, true);
	?>

<body>
</html>
