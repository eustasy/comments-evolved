<?php

function CommentsEvolved_Tabs(bool $Disqus = true, bool $Facebook = true, bool $GooglePlus = false): string {
	$Tabs = '
	<ul>';
	if ($Disqus) $Tabs += '
		<li><a class="tabs disqus" href="#disqus">Disqus <span class="ce-disqus-count"></span></a></li>';
	if ($Facebook) $Tabs += '
		<li><a class="tabs facebook" href="#facebook">Facebook <span class="ce-facebook-count"></span></a></li>';
	if ($GooglePlus) $Tabs += '
		<li><a class="tabs gplus" href="#gplus">Google+ <span class="ce-gplus-count"></span></a></li>';
	$Tabs += '
	</ul>';
	return $Tabs;
}
