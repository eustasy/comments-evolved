<?php

function CommentsEvolved_Header(string $Canonical): string {
	global $Sitewide;

	return '
	<link rel="canonical" href="'.$Canonical.'">
	<link rel="author" href="https://plus.google.com/'.
	$Sitewide['Settings']['CommentsEvolved']['Google']['Author'].'?rel=author">
	<link rel="publisher" href="https://plus.google.com/'.
	$Sitewide['Settings']['CommentsEvolved']['Google']['Publisher'].'?rel=publisher">
	<link rel="stylesheet" type="text/css" media="all" href="'.
	$Sitewide['Settings']['CommentsEvolved']['CSSPath'].'commentsevolved.min.css">'.PHP_EOL;
}
