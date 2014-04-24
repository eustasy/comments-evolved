<?php

function CommentsEvolved_LoadjQuery() {
	require 'CommentsEvolved_Config.php';
	echo '
	<!--[if lt IE 9]>
		<script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
		<script type="text/javascript">window.jQuery || document.write(\'<script src="'.$CommentsEvolved_JSPath.'jquery-1.10.2.min.js"><\/script>\');</script>
	<![endif]-->
	<!--[if IE 9]><!-->
		<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
		<script>window.jQuery || document.write(\'<script src="'.$CommentsEvolved_JSPath.'jquery-2.0.3.min.js"><\/script>\');</script>
	<!--<![endif]-->
	<script src="'.$CommentsEvolved_JSPath.'jquery.ui.core.min.js"></script>
	<script src="'.$CommentsEvolved_JSPath.'jquery.ui.widget.min.js"></script>
	<script src="'.$CommentsEvolved_JSPath.'jquery.ui.tabs.min.js"></script>
	<script>$(function(){$(\'#commentsevolved-tabs\').tabs()})</script>';
}

function CommentsEvolved_Tabs($Disqus=true,$Facebook=true,$GooglePlus=true) {
	echo '
	<ul>';
	if($Disqus) echo '
		<li><a class="tabs disqus" href="#disqus">Disqus <span id="ce-disqus-count"></span></a></li>';
	if($Facebook) echo '
		<li><a class="tabs facebook" href="#facebook">Facebook <span id="ce-facebook-count"></span></a></li>';
	if($GooglePlus) echo '
		<li><a class="tabs gplus" href="#gplus">Google+ <span id="ce-gplus-count"></span></a></li>';
	echo '
	</ul>';
}

function CommentsEvolved_Disqus($Canonical,$HTML_Safe_Title) {
	require 'CommentsEvolved_Config.php';
	echo '
		<div class="comments disqus" id="disqus">
			<div id="disqus_thread">Loading Disqus Comments...</div>
			<script>
				var disqus_shortname = \''.$Disqus_Shortname.'\';
				var disqus_title = \''.$HTML_Safe_Title.'\';
				var disqus_url = \''.$Canonical.'\';
				(function() {
					var dsq = document.createElement(\'script\'); dsq.type = \'text/javascript\';
					dsq.async = true;
					dsq.src = \'//\' + disqus_shortname + \'.disqus.com/embed.js\';
					(document.getElementsByTagName(\'head\')[0] || document.getElementsByTagName(\'body\')[0]).appendChild(dsq);
				})();
			</script>
			<noscript>Please enable JavaScript to view the <a href="http://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
		</div>';
}

function CommentsEvolved_Facebook($Canonical) {
	require 'CommentsEvolved_Config.php';
	echo '
		<div class="comments facebook" id="facebook">
			<div id="fb-root"></div>
			<div id="fb-replace">Loading Facebook Comments ...</div>
			<script type="text/javascript">
				$(document).ready(function($){
					$(\'#fb-replace\').html(\'<div class="fb-comments" data-width="'.$CommentsEvolved_Width.'" data-href="'.$Canonical.'" data-num-posts="10" data-colorscheme="light" data-mobile="auto"></div>\');
				});
			</script>
			<script>(function(d, s, id) {
			  var js, fjs = d.getElementsByTagName(s)[0];
			  if (d.getElementById(id)) return;
			  js = d.createElement(s); js.id = id;
			  js.src = "//connect.facebook.net/en_GB/all.js#xfbml=1&appId=681781948553167";
			  fjs.parentNode.insertBefore(js, fjs);
			}(document, \'script\', \'facebook-jssdk\'));</script>
			<noscript>Please enable JavaScript to view the <a href="https://www.facebook.com/">comments powered by Facebook.</a></noscript>
		</div>';
}

function CommentsEvolved_GPlus($Canonical) {
	require 'CommentsEvolved_Config.php';
	echo '
		<div class="comments gplus" id="gplus">
			<script>
				$(document).ready(function($) {
					$(\'#gplus-replace\').html(\'<div class="g-comments" data-width="'.$CommentsEvolved_Width.'" data-href="'.$Canonical.'" data-first_party_property="BLOGGER" data-view_type="FILTERED_POSTMOD">Loading Google+ Comments ...</div>\');
				});
			</script>
			<div id="gplus-replace"></div>
			<script async type="text/javascript" src="//apis.google.com/js/plusone.js?callback=gpcb"></script>
			<noscript>Please enable JavaScript to view the <a href="https://plus.google.com/">comments powered by Google+.</a></noscript><script src="//apis.google.com/js/plusone.js"></script>
		</div>';
}

function CommentsEvolved_Disqus_Count($Canonical,$ID='#ce-disqus-count') {
	require 'CommentsEvolved_Config.php';
	echo '
	<script>
	$(function(){
		$.getJSON(\'http://disqus.com/api/3.0/threads/details.json?api_key='.$Disqus_Key.'&forum='.$Disqus_Shortname.'&thread:link='.$Canonical.'&callback=?\', function(countDisqus) {
		if (!countDisqus.response.posts) {
				$(\''.$ID.'\').html(\'(0)\');
			} else {
				$(\''.$ID.'\').html(\'(\' + countDisqus.response.posts + \')\');
			}
		})
	});
	</script>';
}

function CommentsEvolved_Facebook_Count($Canonical,$ID='#ce-facebook-count') {
	echo '
	<script>
	$(function(){
		$.getJSON(\'http://graph.facebook.com/'.$Canonical.'?callback=?\', function(countFacebook) {
		if (!countFacebook.comments) {
				$(\''.$ID.'\').html(\'(0)\');
			} else {
				$(\''.$ID.'\').html(\'(\' + countFacebook.comments + \')\');
			}
		})
	});
	</script>';
}


// How we used to get Google+ Comment Count
//require 'simple_html_dom.php';
//$GplusFetch = file_get_html('https://apis.google.com/_/widget/render/commentcount?bsv&href=' . $URL);
//$GplusRaw = $GplusFetch->find('#widget_bounds > span', 0);
//$GplusToTrim = split(' ', $GplusRaw->plaintext);
//$GplusCount = trim($GplusToTrim[0]);


// The new way (which doesn't work as Google doesn't allow cross-site-access to it)

function CommentsEvolved_GPlus_Count($Canonical,$ID='#ce-gplus-count') {
	echo '
	<script>
	$(function(){
		$.get(\'https://apis.google.com/_/widget/render/commentcount?bsv&href='.$Canonical.'&callback=?\', function(countGPlus) {
			console.log(countGPlus);
			// TODO
			$(\'countGPlus #widget_bounds span\').html(\'(\' + countGPlus.comments + \')\');
			$(\''.$ID.'\').html(\'(\' + countGPlus.comments + \')\');
		})
	});
	</script>';
}

function CommentsEvolved_Comments($Canonical,$HTML_Safe_Title,$Disqus=true,$Facebook=true,$GooglePlus=true,$Load_jQuery=true) {

	if(!$Disqus&&!$Facebook&&!$GooglePlus) return false;

	require 'CommentsEvolved_Config.php';

	if($Load_jQuery) CommentsEvolved_LoadjQuery();

	echo '
	<div id="commentsevolved-tabs">';

	CommentsEvolved_Tabs($Disqus,$Facebook,$GooglePlus);

	if($Disqus) CommentsEvolved_Disqus($Canonical,$HTML_Safe_Title);
	if($Facebook) CommentsEvolved_Facebook($Canonical);
	if($GooglePlus) CommentsEvolved_GPlus($Canonical);

	echo '
	</div>';

	if($Disqus) CommentsEvolved_Disqus_Count($Canonical);
	if($Facebook) CommentsEvolved_Facebook_Count($Canonical);
	// if($GooglePlus) CommentsEvolved_GPlus_Count($Canonical);

}
