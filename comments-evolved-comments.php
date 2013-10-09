<div id="comment-tabs">
		<ul>
			<li><a class="tabs disqus" href="#disqus">Disqus <span id="disqus-count"></span></a></li>
			<li><a class="tabs facebook" href="#facebook">Facebook <span id="facebook-count"></span></a></li>
			<li><a class="tabs gplus" href="#gplus">Google+ <span id="gplus-count"></span></a></li>
		</ul>

		<div class="comments disqus" id="disqus">
			<div id="disqus_thread">Loading Disqus Comments...</div>
			<script>
				var disqus_shortname = '<?php echo $DisqusShortname; ?>';
				var disqus_title = '<?php echo $TextTitle; ?>';
				var disqus_url = '<?php echo $URL; ?>';
				(function() {
					var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
					dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
					(document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
				})();
			</script>
			<noscript>Please enable JavaScript to view the <a href="http://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
		</div>

		<div class="comments facebook" id="facebook">
			<div id="fb-root"></div>
			<div id="fb-replace">Loading Facebook Comments ...</div>
			<script type="text/javascript">
				$(document).ready(function($){
					$('#fb-replace').html('<div class="fb-comments" data-width="<?php echo $Width; ?>" data-href="<?php echo $URL; ?>" data-num-posts="10" data-colorscheme="light" data-mobile="auto"></div>');
				});
			</script>
			<script async type="text/javascript" src="//connect.facebook.net/en_US/all.js#xfbml=1">FB.init();</script>
			<noscript>Please enable JavaScript to view the <a href="https://www.facebook.com/">comments powered by Facebook.</a></noscript>
		</div>

		<div class="comments gplus" id="gplus">
			<script>
				$(document).ready(function($) {
					$('#gplus-replace').html('<div class="g-comments" data-width="<?php echo $Width; ?>" data-href="<?php echo $URL; ?>" data-first_party_property="BLOGGER" data-view_type="FILTERED_POSTMOD">Loading Google+ Comments ...</div>');
				});
			</script>
			<div id="gplus-replace"></div>
			<script async type="text/javascript" src="//apis.google.com/js/plusone.js?callback=gpcb"></script>
			<noscript>Please enable JavaScript to view the <a href="https://plus.google.com/">comments powered by Google+.</a></noscript><script src="//apis.google.com/js/plusone.js"></script>
		</div>

	</div>

	<script src="jquery.ui.core.min.js"></script>
	<script src="jquery.ui.widget.min.js"></script>
	<script src="jquery.ui.tabs.min.js"></script>
	<script>$("#comment-tabs").tabs();</script>

	<script>
	$(function(){
		$.getJSON('http://disqus.com/api/3.0/threads/details.json?api_key=<?php echo $DisqusKey; ?>&forum=<?php echo $DisqusShortname; ?>&thread:link=<?php echo $URL; ?>&callback=?', function(countDisqus) {
		if (!countDisqus.response.posts) {
				$('#disqus-count').html('(0)');
			} else {
				$('#disqus-count').html('(' + countDisqus.response.posts + ')');
			}
		})
	});
	</script>

	<script>
	$(function(){
		$.getJSON('http://graph.facebook.com/<?php echo $URL; ?>?callback=?', function(countFacebook) {
		if (!countFacebook.comments) {
				$('#facebook-count').html('(0)');
			} else {
				$('#facebook-count').html('(' + countFacebook.comments + ')');
			}
		})
	});
	</script>

<!--	<script>
	$(function(){
		$.get('https://apis.google.com/_/widget/render/commentcount?bsv&href=<?php echo $URL; ?>&callback=?', function(countGPlus) {
		if (!countGPlus.comments) {
				$('#gplus-count').html('(0)');
			} else {
				$('#gplus-count').html('(' + countGPlus.comments + ')');
			}
		})
	});
	</script>	-->
<?
//require 'simple_html_dom.php';
//$GplusFetch = file_get_html('https://apis.google.com/_/widget/render/commentcount?bsv&href=' . $URL);
//$GplusRaw = $GplusFetch->find('#widget_bounds > span', 0);
//$GplusToTrim = split(' ', $GplusRaw->plaintext);
//$GplusCount = trim($GplusToTrim[0]);
?>