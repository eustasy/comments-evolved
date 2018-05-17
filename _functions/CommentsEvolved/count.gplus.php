<?php

// WARNING: Experimental

// How we used to get Google+ Comment Count
//require 'simple_html_dom.php';
//$GplusFetch = file_get_html('https://apis.google.com/_/widget/render/commentcount?bsv&href=' . $URL);
//$GplusRaw = $GplusFetch->find('#widget_bounds > span', 0);
//$GplusToTrim = split(' ', $GplusRaw->plaintext);
//$GplusCount = trim($GplusToTrim[0]);

// The new way (which doesn't work as Google doesn't allow cross-site-access to it)
function CommentsEvolved_GPlus_Count(string $Canonical, string $Count = '.ce-gplus-count'): string {
	return '
	<script>
	$(function(){
		$.get(
			\'https://apis.google.com/_/widget/render/commentcount?bsv&href='.$Canonical.'&callback=?\',
			function(countGPlus) {
				console.log(countGPlus);
				$(\'countGPlus #widget_bounds span\').html(\'(\' + countGPlus.comments + \')\');
				$(\''.$Count.'\').html(\'(\' + countGPlus.comments + \')\');
			}
		)
	});
	</script>';
}
