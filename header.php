<!DOCTYPE html>
<!--[if lt IE 9]>         <html class="no-js lt-ie9 lt-ie10" <?php vw_html_tag_schema(); ?> <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 9]>         <html class="no-js lt-ie10" <?php vw_html_tag_schema(); ?> <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 9]><!--> <html class="no-js" <?php vw_html_tag_schema(); ?> <?php language_attributes(); ?>> <!--<![endif]-->
	<head>
			
		<!-- WP Header -->
		<?php wp_head(); ?>
		<!-- End WP Header -->
		<meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=no">
		
	</head>
	<body id="site-top" <?php body_class(); ?>>
		<div id="fb-root"></div>
		<script>(function(d, s, id) {
		  var js, fjs = d.getElementsByTagName(s)[0];
		  if (d.getElementById(id)) return;
		  js = d.createElement(s); js.id = id;
		  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.3&appId=123435527761686";
		  fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));</script>

		<!-- Site Wrapper -->
		<div class="vw-site-wrapper">

			<?php vw_the_site_top_bar(); ?>

			<?php get_template_part( '/templates/site-header', vw_get_theme_option( 'site_header_layout' ) ); ?>

			<?php if ( vw_is_enable_breaking_news() ) get_template_part( '/templates/breaking-news-bar' ); ?>

			<?php do_action( 'vw_action_site_header' ); ?>
			