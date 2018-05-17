<?php

function CommentsEvolved_Facebook(string $Canonical): string {
	global $Sitewide;

	return '
		<div class="comments facebook" class="facebook">
			<div class="fb-root"></div>
			<div class="fb-replace">Loading Facebook Comments ...</div>
			<script type="text/javascript">
				$(document).ready(function($){
					$(\'#fb-replace\').html(\'<div class="fb-comments" data-width="'.
					$Sitewide['Settings']['CommentsEvolved']['Width'].
					'" data-href="'.$Canonical.'" data-num-posts="10" data-colorscheme="light" data-mobile="auto"></div>\');
				});
			</script>
			<script>(function(d, s, id) {
			  var js, fjs = d.getElementsByTagName(s)[0];
			  if (d.getElementById(id)) return;
			  js = d.createElement(s); js.id = id;
			  js.src = "//connect.facebook.net/en_GB/all.js#xfbml=1&appId=681781948553167";
			  fjs.parentNode.insertBefore(js, fjs);
			}(document, \'script\', \'facebook-jssdk\'));</script>
			<noscript>Please enable JavaScript to view the <a href="https://www.facebook.com/">comments powered by Facebook</a>.</noscript>
		</div>';
}
