<?php

function CommentsEvolved_Comments(
	string $Canonical,
	string $HTML_Safe_Title,
	bool $Disqus = true,
	bool $Facebook = true,
	bool $GooglePlus = false,
	bool $Load_jQuery = true
): string {

	$CE = '';
	if ( !$Disqus && !$Facebook && !$GooglePlus ) return $CE;

	if ( $Load_jQuery ) $CE .= CommentsEvolved_LoadjQuery();

	$CE .=  '
	<div class="commentsevolved-tabs">';

	$CE .= CommentsEvolved_Tabs($Disqus, $Facebook, $GooglePlus);

	if ( $Disqus ) $CE .= CommentsEvolved_Disqus($Canonical, $HTML_Safe_Title);
	if ( $Facebook ) $CE .= CommentsEvolved_Facebook($Canonical);
	if ( $GooglePlus ) $CE .= CommentsEvolved_GPlus($Canonical);

	$CE .=  '
	</div>';

	if ( $Disqus ) $CE .= CommentsEvolved_Disqus_Count($Canonical);
	if ( $Facebook ) $CE .= CommentsEvolved_Facebook_Count($Canonical);
	if ( $GooglePlus ) $CE .= CommentsEvolved_GPlus_Count($Canonical);

	return $CE;
}
