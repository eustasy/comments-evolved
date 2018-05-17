<?php

// WARNING: Experimental
function CommentsEvolved_GPlus(string $Canonical): string {
	global $Sitewide;

	return '
		<div class="comments gplus" class="gplus">
			<script>
				$(document).ready(function($) {
					$(\'#gplus-replace\').html(\'<div class="g-comments" data-width="'.
					$Sitewide['Settings']['CommentsEvolved']['Width'].'" data-href="'.$Canonical.
					'" data-first_party_property="BLOGGER" data-view_type="FILTERED_POSTMOD">Loading Google+ Comments ...</div>\');
				});
			</script>
			<div class="gplus-replace"></div>
			<script async type="text/javascript" src="//apis.google.com/js/plusone.js?callback=gpcb"></script>
			<noscript>Please enable JavaScript to view the <a href="https://plus.google.com/">comments powered by Google+</a>.</noscript>
			<script src="//apis.google.com/js/plusone.js"></script>
		</div>';
}
