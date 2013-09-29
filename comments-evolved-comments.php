<?php

// 		DO NOT MODIFY
$URL = $Domain . $Canonical;

require 'simple_html_dom.php';
$GplusFetch = file_get_html('https://apis.google.com/_/widget/render/commentcount?bsv&href=' . $URL);
$GplusRaw = $GplusFetch->find('#widget_bounds > span', 0);
$GplusToTrim = split(' ', $GplusRaw->plaintext);
$GplusCount = trim($GplusToTrim[0]);

$FacebookFetch = file_get_contents('https://graph.facebook.com/?ids=' . $URL);
$FacebookJson = json_decode($FacebookFetch);
if(!empty($FacebookJson->$URL->comments)){
	$FacebookCount = $FacebookJson->$URL->comments;
} else {
	$FacebookCount = 0;
}

$DisqusFetch = file_get_contents('http://disqus.com/api/3.0/threads/details.json?api_key=' . $DisqusKey . '&forum=' . $DisqusShortname . '&thread:ident=' . $Canonical);
$DisqusJson = json_decode($DisqusFetch);
if(!empty($DisqusJson)){
	$DisqusCount = $DisqusJson->response->posts;
} else {
	$DisqusCount = 0;
}

?>
	<div id="comment-tabs">
		<ul>
			<li><a class="tabs gplus" href="#gplus">Google+ (<?php echo $GplusCount; ?>)</a></li>
			<li><a class="tabs facebook" href="#facebook">Facebook (<?php echo $FacebookCount; ?>)</a></li>
			<li><a class="tabs disqus" href="#disqus">Disqus (<?php echo $DisqusCount; ?>)</a></li>
		</ul>

		<div class="comments gplus" id="gplus">
			<script src="https://apis.google.com/js/plusone.js"></script>
			<div class="g-comments"
				data-href="<?php echo $URL; ?>"
				data-width="<?php echo $Width; ?>"
				data-first_party_property="BLOGGER"
				data-view_type="FILTERED_POSTMOD">
			</div>
		</div>

		<div class="comments facebook" id="facebook">
			<div id="fb-root"></div>
			<script>
				$(document).ready(function($){
					(function(d, s, id) {
						var js, fjs = d.getElementsByTagName(s)[0];
						if (d.getElementById(id)) return;
						js = d.createElement(s); js.id = id;
						js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=<?php echo $FacebookAppID; ?>";
						fjs.parentNode.insertBefore(js, fjs);
					}(document, 'script', 'facebook-jssdk'));
				});
			</script>
			<div class="fb-comments" data-href="<?php echo $Domain, $Canonical; ?>" data-width="<?php echo $Width; ?>">Loading Facebook Comments...</div>
		</div>

		<div class="comments disqus" id="disqus">
			<div id="disqus_thread">Loading Disqus Comments...</div>
			<script>
				var disqus_shortname = '<?php echo $DisqusShortname; ?>';
				var disqus_identifier = '<?php echo $Canonical; ?>';
				var disqus_title = '<?php echo $TextTitle; ?>';
				var disqus_title = '<?php echo $Domain, $Canonical; ?>';
				(function() {
					var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
					dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
					(document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
				})();
			</script>
			<noscript>Please enable JavaScript to view the <a href="http://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
		</div>

	</div>