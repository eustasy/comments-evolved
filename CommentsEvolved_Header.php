<?php

function CommentsEvolved_Header($Canonical){

	require 'CommentsEvolved_Config.php';

	echo '
	<link rel="canonical" href="'.$Canonical.'">
	<link rel="author" href="//plus.google.com/'. $Google_Author_ID.'?rel=author">
	<link rel="publisher" href="//plus.google.com/'. $Google_Publisher_ID.'?rel=publisher">
	<link rel="stylesheet" type="text/css" media="all" href="commentsevolved.min.css">';

}
