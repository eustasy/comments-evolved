<?php

function CommentsEvolved_LoadjQuery(): string {
	return '
	<script src="https://cdn.jsdelivr.net/jquery/3/jquery.min.js"></script>
	<script src="https://cdn.jsdelivr.net/jquery.ui/1/jquery-ui.min.js"></script>
	<script>$(function(){$(\'.commentsevolved-tabs\').tabs()})</script>';
}
