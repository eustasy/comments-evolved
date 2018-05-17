<?php

function CommentsEvolved_Facebook_Count(string $Canonical, string $Count = '.ce-facebook-count'): string {
	return  '
	<script>
	$(function(){
		$.getJSON(
			\'https://graph.facebook.com/'.$Canonical.'?callback=?\',
			function(countFacebook) {
				if (!countFacebook.share.comment_count) {
					$(\''.$Count.'\').html(\'(0)\');
				} else {
					$(\''.$Count.'\').html(\'(\' + countFacebook.share.comment_count + \')\');
				}
			}
		)
	});
	</script>';
}
