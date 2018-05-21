<?php

function CommentsEvolved_LoadjQuery(): string {
	return '
	<script src="https://cdn.jsdelivr.net/gh/jquery/jquery@3/dist/jquery.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/jquery-ui-dist@1/jquery-ui.min.js"></script>
	<script>$(function(){$(\'.commentsevolved-tabs\').tabs()})</script>';
}
