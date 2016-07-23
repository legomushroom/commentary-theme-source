<!DOCTYPE html>
<!--[if lt IE 9]>         <html class="no-js lt-ie9 lt-ie10" <?php vw_html_tag_schema(); ?> <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 9]>         <html class="no-js lt-ie10" <?php vw_html_tag_schema(); ?> <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 9]><!--> <html class="no-js" <?php vw_html_tag_schema(); ?> <?php language_attributes(); ?>> <!--<![endif]-->
	<head>
			
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
		<!-- LOG IN MODAL :: START -->
		<div class="vw-login-modal-overlay" id="js-vw-modal-login-overlay"></div>
		<div class="vw-login-modal-form" id="js-vw-modal-login-form">
				<i class="vw-icon icon-entypo-cancel" id="js-vw-modal-login-close"></i>
				<h3>Log In</h3>
				<form action="<?php echo wp_login_url( get_permalink() ); ?>" method="post">
					<p class="vw-login-form-username">
						<input type="text" name="log" id="log" placeholder="Username" size="33" />
					</p>
					<p class="vw-login-form-pass">
						<input type="password" name="pwd" id="pwd" placeholder="Password" size="33" />
					</p>
					<p>
						<label for="rememberme" class="vw-login-form-remember"><input name="rememberme" id="rememberme" type="checkbox" checked="checked" value="forever" /> <?php _e( 'Remember Me' , 'envirra' ) ?></label>
						<a class="vw-login-form-lost-password" href="<?php echo wp_lostpassword_url( get_permalink() ); ?>"><?php _e( 'Lost your password?' , 'envirra' ) ?></a></p>

					<input type="submit" name="submit" value="<?php _e( 'Log in' , 'envirra' ) ?>" class="vw-login-form-login-button" />
					<?php if ( get_option('users_can_register') ) : ?>
						<a class="vw-login-form-register-button btn" href="<?php echo wp_registration_url(); ?>"><?php _e( 'Register' , 'envirra' ) ?></a>
					<?php endif; ?>
					<input type="hidden" name="redirect_to" value="<?php echo esc_url( $_SERVER['REQUEST_URI'] ); ?>"/>
				</form>
			</div>
		<script>
      ;(function (undefined) {
        var $ = jQuery;
        // var $overlay  = $('#js-vw-modal-login-overlay');
        // var $modal    = $('#js-vw-modal-login-form');
        $(document.body).on('click', '#js-vw-modal-login', function (e) {
          $('#js-vw-modal-login-overlay').fadeIn(350);
          $('#js-vw-modal-login-form').fadeIn(350);
          e.preventDefault();
          return false;
        });

        $(document.body).on('click', '#js-vw-modal-login-overlay, #js-vw-modal-login-close', function () {
          $('#js-vw-modal-login-overlay').fadeOut(350);
          $('#js-vw-modal-login-form').fadeOut(350);
        });
      })();
    </script>
		<!-- LOG IN MODAL :: END -->
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
			