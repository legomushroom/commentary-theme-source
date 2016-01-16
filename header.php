<!DOCTYPE html>
<!--[if lte IE 9]>         <html class="no-js lt-ie9 lt-ie10" <?php vw_html_tag_schema(); ?> <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 9]><!--> <html class="no-js" <?php vw_html_tag_schema(); ?> <?php language_attributes(); ?>> <!--<![endif]-->
	<head>
		<meta charset="<?php echo esc_attr( get_bloginfo('charset') ); ?>">
		<!-- WP Header -->
		<?php wp_head(); ?>
		<!-- End WP Header -->
		<meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=no">
		
		<!-- Facebook Pixel Code -->
		<script>
		!function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
		n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
		n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
		t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
		document,'script','//connect.facebook.net/en_US/fbevents.js');

		fbq('init', '1659014534386292');
		fbq('track', "PageView");</script>
		<noscript><img height="1" width="1" style="display:none"
		src="https://www.facebook.com/tr?id=1659014534386292&ev=PageView&noscript=1"
		/></noscript>
		<!-- End Facebook Pixel Code -->
		
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
		<div class="vw-site-wrapper <?php echo (is_front_page()) ? 'wv-home-page' : ''; ?>">

			<?php get_template_part( 'templates/menu-mobile' ); ?>

			<?php vw_the_site_top_bar(); ?>

			<?php get_template_part( '/templates/site-header', vw_get_theme_option( 'site_header_layout' ) ); ?>

			<?php do_action( 'vw_action_site_header' ); ?>
			