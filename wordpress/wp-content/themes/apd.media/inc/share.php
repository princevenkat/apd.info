<?php  

// Add to functions.php
// Replace image src paths

function socialShareShortCode() { 
	$decoded_title = html_entity_decode(get_the_title(), ENT_QUOTES, 'UTF-8');
	$clean_title = preg_replace('#<[a-zA-Z]+>(.*?)</[a-zA-Z]+>#', '$1', $decoded_title);
	$encoded_title = urlencode($clean_title);
	$share_email_title = str_replace("+"," ",$encoded_title);
	$link = get_permalink();
	$twitter_URL = wp_get_shortlink();
	$return_string = '<div id="share-buttons">
		<ul>
		<li><a class="fafacebook" href="https://www.facebook.com/sharer/sharer.php?u='.$link.'" target="_blank"><i class="fa fa-facebook"></i></a></li>
		<li><a class="fatwitter" href="https://twitter.com/intent/tweet?text='.$encoded_title.'&url='.$twitter_URL.'" target="_blank"><i class="fa fa-twitter"></i></a></li>
		<!--<li><a class="social-link " href="http://www.linkedin.com/shareArticle?url='.$link.'&title='.$encoded_title.'" target="_blank"><img src="PATH TO LINKEDIN BUTTON IMAGE" alt="LinkedIn" title="Share via LinkedIn"/></a></li>
		<li><a class="social-link" href="https://plus.google.com/share?url='.$link.'" target="_blank"><img src="PATH TO YOUR GOOGLE+ BUTTON IMAGE" alt="Google+" title="Share via Google+"/></a></li>-->
		<li><a class="faenvelope" href="mailto:?subject='.$share_email_title.'&body='.$link.'"><i class="fa fa-envelope"></i></a></li>
		<li><a href="javascript:window.print()" target="_blank" class="faprint"><i class="fa fa-print"></i></a></li>
        <li>'.do_shortcode('[bws_pdfprint]').'</li>
		</ul>
	</div>';
	return $return_string;
}

add_shortcode('socialSharingButtons', 'socialShareShortCode');

?>