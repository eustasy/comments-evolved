<?php

function CommentsEvolved_Disqus_Count(string $Canonical, string $Count = '.ce-disqus-count'): string {
	global $Sitewide;

	return '
	<script>
	$(function(){
		$.getJSON(
			\'https://disqus.com/api/3.0/threads/details.json?api_key='.
			$Sitewide['Settings']['CommentsEvolved']['Disqus']['APIKey'].
			'&forum='.$Sitewide['Settings']['CommentsEvolved']['Disqus']['Shortname'].
			'&thread:link='.$Canonical.'&callback=?\',
			function(countDisqus) {
			if (!countDisqus.response.posts) {
					$(\''.$Count.'\').html(\'(0)\');
				} else {
					$(\''.$Count.'\').html(\'(\' + countDisqus.response.posts + \')\');
				}
			}
		)
	});
	</script>';
}
