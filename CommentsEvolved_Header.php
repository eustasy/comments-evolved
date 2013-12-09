<?php

function CommentsEvolved_Header($Canonical,$Load_jQuery=false){

	require 'CommentsEvolved_Config.php';

	echo '
	<link rel="canonical" href="<?php echo $Canonical; ?>">
	<link rel="author" href="//plus.google.com/<?php echo $Google_Author_ID; ?>?rel=author">
	<link rel="publisher" href="//plus.google.com/<?php echo $Google_Publisher_ID; ?>?rel=publisher">
	<link rel="stylesheet" type="text/css" media="all" href="commentsevolved.min.css">';

	if($Load_jQuery){
		echo '
		<!--[if lt IE 9]>
			<script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
			<script type="text/javascript">window.jQuery || document.write(\'<script src="http://labs.eustasy.org/js/jquery-1.10.2.min.js"><\/script>\');</script>
		<![endif]-->
		<!--[if IE 9]><!-->
			<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
			<script>window.jQuery || document.write(\'<script src="http://labs.eustasy.org/js/jquery-2.0.3.min.js"><\/script>\');</script>
		<!--<![endif]-->';
	}

}