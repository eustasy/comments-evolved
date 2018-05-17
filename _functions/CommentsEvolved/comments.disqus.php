<?php

function CommentsEvolved_Disqus(string $Canonical, string $HTML_Safe_Title): string {
	global $Sitewide;

	return '
		<div class="comments disqus" id="disqus">
			<div id="disqus_thread">Loading Disqus Comments...</div>
			<script>
				var disqus_shortname = \''.$Sitewide['Settings']['CommentsEvolved']['Disqus']['Shortname'].'\';
				var disqus_title = \''.$HTML_Safe_Title.'\';
				var disqus_url = \''.$Canonical.'\';
				(function() {
					var dsq = document.createElement(\'script\'); dsq.type = \'text/javascript\';
					dsq.async = true;
					dsq.src = \'//\' + disqus_shortname + \'.disqus.com/embed.js\';
					(document.getElementsByTagName(\'head\')[0] || document.getElementsByTagName(\'body\')[0]).appendChild(dsq);
				})();
			</script>
			<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus</a>.</noscript>
		</div>';
}
