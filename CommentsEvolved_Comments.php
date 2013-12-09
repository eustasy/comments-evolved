<?php

function CommentsEvolved_Comments($Canonical,$HTML_Safe_Title,$Disqus=true,$Facebook=true,$GooglePlus=true,$Load_jQuery=false){

	if(!$Disqus&&!$Facebook&&!$GooglePlus) return false;

	require 'CommentsEvolved_Config.php';

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

	echo '
		<script src="jquery.ui.core.min.js"></script>
		<script src="jquery.ui.widget.min.js"></script>
		<script src="jquery.ui.tabs.min.js"></script>
		<script>
		$(function() {
			$(\'#commentsevolved-tabs\').tabs();
		});
		</script>';

	echo '
	<div id="commentsevolved-tabs">
		<ul>';
	if($Disqus) echo '			<li><a class="tabs disqus" href="#disqus">Disqus <span id="disqus-count"></span></a></li>';
	if($Facebook) echo '			<li><a class="tabs facebook" href="#facebook">Facebook <span id="facebook-count"></span></a></li>';
	if($GooglePlus) echo '			<li><a class="tabs gplus" href="#gplus">Google+ <span id="gplus-count"></span></a></li>';
	echo '
		</ul>';

	if($Disqus) echo '
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

	if($Facebook) echo '
		<div class="comments facebook" id="facebook">
			<div id="fb-root"></div>
			<div id="fb-replace">Loading Facebook Comments ...</div>
			<script type="text/javascript">
				$(document).ready(function($){
					$(\'#fb-replace\').html(\'<div class="fb-comments" data-width="'.$CommentsEvolved_Width.'" data-href="'.$Canonical.'" data-num-posts="10" data-colorscheme="light" data-mobile="auto"></div>\');
				});
			</script>
			<script async type="text/javascript" src="//connect.facebook.net/en_US/all.js#xfbml=1">FB.init();</script>
			<noscript>Please enable JavaScript to view the <a href="https://www.facebook.com/">comments powered by Facebook.</a></noscript>
		</div>';

	if($GooglePlus) echo '
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

	echo '
	</div>';

	if($Disqus) echo '
	<script>
	$(function(){
		$.getJSON(\'http://disqus.com/api/3.0/threads/details.json?api_key='.$Disqus_Key.'&forum='.$Disqus_Shortname.'&thread:link='.$Canonical.'&callback=?\', function(countDisqus) {
		if (!countDisqus.response.posts) {
				$(\'#disqus-count\').html(\'(0)\');
			} else {
				$(\'#disqus-count\').html(\'(\' + countDisqus.response.posts + \')\');
			}
		})
	});
	</script>';

	if($Facebook) echo '
	<script>
	$(function(){
		$.getJSON(\'http://graph.facebook.com/'.$Canonical.'?callback=?\', function(countFacebook) {
		if (!countFacebook.comments) {
				$(\'#facebook-count\').html(\'(0)\');
			} else {
				$(\'#facebook-count\').html(\'(\' + countFacebook.comments + \')\');
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


// The new way (which doesn't work)
/*
<script>
	$(function(){
		$.get('https://apis.google.com/_/widget/render/commentcount?bsv&href=<?php echo $URL; ?>&callback=?', function(countGPlus) {
		if (!countGPlus.comments) {
				$('#gplus-count').html('(0)');
			} else {
				$('#gplus-count').html('(' + countGPlus.comments + ')');
			}
		})
	});
	</script>	--> */
