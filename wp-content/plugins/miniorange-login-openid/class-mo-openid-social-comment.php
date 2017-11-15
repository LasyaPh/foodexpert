<?php
	function mo_openid_social_comment($post, $url){
		
		?>
		<script>
		function moOpenIDShowCommentForms(){
			var commentFormElement = document.getElementById("respond");
			if(commentFormElement) {
				<?php wp_enqueue_script( 'moopenid-comment-fb',plugins_url('includes/js/social/fb_comment.js', __FILE__), array('jquery'));?>
				var commentForm = '<div><a href="http://miniorange.com/cloud-identity-broker-service" style="display:none;"></a><a href="http://miniorange.com/strong_auth" style="display:none;"></a><a href="http://miniorange.com/single-sign-on-sso" style="display:none;"></a><a href="http://miniorange.com/fraud" style="display:none;"></a><h3 id="mo_reply_label" class="comment-reply-title"><?php echo get_option("mo_openid_social_comment_heading_label") ?></h3><br/><ul class="mo_openid_comment_tab">';
				<?php if(get_option('mo_openid_social_comment_default')){ $commentsCount = wp_count_comments($post->ID); ?>
				commentForm += '<li id="moopenid_social_comment_default" class="mo_openid_selected_tab"><?php echo get_option("mo_openid_social_comment_default_label") ?>(<?php echo ($commentsCount && isset($commentsCount -> approved) ? $commentsCount -> approved : '') ?>)</li>';
				<?php } if(get_option('mo_openid_social_comment_fb')){ ?>
				commentForm += '<li id="moopenid_social_comment_fb"><?php echo get_option("mo_openid_social_comment_fb_label") ?></li>';
				<?php } if(get_option('mo_openid_social_comment_google')){ ?>
				commentForm += '<li id="moopenid_social_comment_google"><?php echo get_option("mo_openid_social_comment_google_label") ?></li>';
				<?php } ?>
				commentForm += '</ul>';
				commentForm += '<br/><div id="moopenid_comment_form_default" style="display:none;">';
				commentForm += document.getElementById("respond").innerHTML;
				commentForm += '</div>';
				commentForm += '<div id="moopenid_comment_form_fb" style="display:none;"><div class="fb-comments" data-href=' + '"<?php echo $url ?>"' + '></div></div>';
				commentForm += '<br/><div id="moopenid_comment_form_google" style="display:none;"></div>';
				commentForm += '</div>';
				document.getElementById("respond").innerHTML = commentForm;
				document.getElementById("reply-title")&&jQuery("#reply-title").remove();

				<?php $mo_disqus_shortname = get_option("mo_openid_social_comment_disqus_shortname"); ?>
				var sg1 = document.createElement("script");
				sg1.src = 'https://apis.google.com/js/plusone.js?onload=gapiCallback';
				var divComm = document.createElement("div");
				divComm.id = "google-comments";
				document.getElementById("moopenid_comment_form_google").appendChild(divComm);
				document.getElementById("moopenid_comment_form_google").appendChild(sg1);
			}
		}

		window.gapiCallback = function(){
			var sg2 = document.createElement("script");
			sg2.innerHTML = 'gapi.comments.render("google-comments", {href: window.location, width: "624", first_party_property: "BLOGGER", view_type: "FILTERED_POSTMOD" });';
			document.getElementById("moopenid_comment_form_google").appendChild(sg2);
		}
		</script>
		<?php
	}
	
	function mo_openid_comments_shortcode(){
		$html = '';
		$html .= '<div id="mo_comment_shortcode"></div>';
		$html .= '<script>';
		$html .= 'window.onload=function(){';
		$html .= 'var comments = document.getElementById("comments");';
		$html .= 'document.getElementById("mo_comment_shortcode").innerHTML = comments.innerHTML;';
		$html .= 'comments.parentNode.removeChild(comments);';

		$html .= 'if(document.getElementById("moopenid_social_comment_default")) {';
		$html .= 'jQuery("#moopenid_comment_form_default").attr("style","display:block");';
		$html .= 'jQuery("#moopenid_social_comment_default").addClass("mo_openid_selected_tab");';
		$html .= '} else if(document.getElementById("moopenid_social_comment_fb")) {';
		$html .= 'jQuery("#moopenid_comment_form_fb").attr("style","display:block");';
		$html .= 'jQuery("#moopenid_social_comment_fb").addClass("mo_openid_selected_tab");';
		$html .= '} else if(document.getElementById("moopenid_social_comment_google")){';
		$html .= 'Query("#moopenid_comment_form_google").attr("style","display:block");';
		$html .= 'jQuery("#moopenid_social_comment_google").addClass("mo_openid_selected_tab");';
		$html .= '}';

		$html .= 'jQuery("#moopenid_social_comment_fb").click(function(){';
		$html .= 'jQuery("#moopenid_comment_form_fb").attr("style","display:block");';
		$html .= 'jQuery("#moopenid_comment_form_google").attr("style","display:none");';
		$html .= 'jQuery("#moopenid_comment_form_default").attr("style","display:none");';
		$html .= 'jQuery("#moopenid_social_comment_fb").addClass("mo_openid_selected_tab");';
		$html .= 'jQuery("#moopenid_social_comment_default").removeClass("mo_openid_selected_tab");';
		$html .= 'jQuery("#moopenid_social_comment_google").removeClass("mo_openid_selected_tab");';
		$html .= '});';
		$html .= 'jQuery("#moopenid_social_comment_default").click(function(){';
		$html .= 'jQuery("#moopenid_comment_form_fb").attr("style","display:none");';
		$html .= 'jQuery("#moopenid_comment_form_google").attr("style","display:none");';
		$html .= 'jQuery("#moopenid_comment_form_default").attr("style","display:block");';
		$html .= 'jQuery("#moopenid_social_comment_fb").removeClass("mo_openid_selected_tab");';
		$html .= 'jQuery("#moopenid_social_comment_default").addClass("mo_openid_selected_tab");';
		$html .= 'jQuery("#moopenid_social_comment_google").removeClass("mo_openid_selected_tab");';
		$html .= '});';
		$html .= 'jQuery("#moopenid_social_comment_google").click(function(){';
		$html .= 'jQuery("#moopenid_comment_form_fb").attr("style","display:none");';
		$html .= 'jQuery("#moopenid_comment_form_google").attr("style","display:block");';
		$html .= 'jQuery("#moopenid_comment_form_default").attr("style","display:none");';
		$html .= 'jQuery("#moopenid_social_comment_fb").removeClass("mo_openid_selected_tab");';
		$html .= 'jQuery("#moopenid_social_comment_default").removeClass("mo_openid_selected_tab");';
		$html .= 'jQuery("#moopenid_social_comment_google").addClass("mo_openid_selected_tab");';
		$html .= '});';

		$html .= '}';
		$html .= '</script>';

		return $html;
	}

?>