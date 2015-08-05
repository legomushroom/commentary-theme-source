<?php
/* -----------------------------------------------------------------------------
 * Register Theme's Scripts & Styles
 * -------------------------------------------------------------------------- */
add_action( 'wp_enqueue_scripts', 'vw_register_scripts' );
add_action( 'admin_enqueue_scripts', 'vw_register_scripts' );
if ( ! function_exists( 'vw_register_scripts' ) ) {
	function vw_register_scripts() {
		// Register only
		wp_register_script( 'vwjs-bootstrap-dropdown', get_template_directory_uri().'/js/bootstrap/bootstrap.dropdown.js', array( 'jquery' ), VW_THEME_VERSION, VW_CONST_ENQUEUE_SCRIPTS_ON_FOOTER );

		// Include both frontend and backend
		wp_enqueue_script( 'vwjs-fitvids', get_template_directory_uri().'/js/jquery.fitvids.js', array( 'jquery' ), VW_THEME_VERSION, VW_CONST_ENQUEUE_SCRIPTS_ON_FOOTER );

		if ( is_admin() ) {
			// Bootstrap for admin
			$screen = get_current_screen();
			if ( $screen->id != 'toplevel_page_theme_options' ) {
				wp_enqueue_style( 'vwcss-bootstrap-admin', get_template_directory_uri().'/components/bootstrap-admin/bootstrap.css', array(), VW_THEME_VERSION );
				wp_enqueue_script( 'vwjs-bootstrap-admin', get_template_directory_uri().'/components/bootstrap-admin/bootstrap.js', array( 'jquery' ), VW_THEME_VERSION, VW_CONST_ENQUEUE_SCRIPTS_ON_FOOTER );
			}

			// Libs
			wp_enqueue_style( 'vwcss-icon-entypo', get_template_directory_uri().'/components/font-icons/entypo/css/entypo.css', array(), VW_THEME_VERSION );

			// Admin scripts
			wp_enqueue_style( 'vwcss-admin', get_template_directory_uri().'/css/admin.css', array(), VW_THEME_VERSION );
			wp_enqueue_script( 'vwjs-admin', get_template_directory_uri().'/js/admin.js', array( 'jquery' ), VW_THEME_VERSION, VW_CONST_ENQUEUE_SCRIPTS_ON_FOOTER );

		} else {
			// Pace : Preloader
			wp_enqueue_script( 'vwjs-pace', get_template_directory_uri().'/components/pace/pace.min.js', array(), VW_THEME_VERSION, VW_CONST_ENQUEUE_SCRIPTS_ON_FOOTER );

			// jQuery
			wp_enqueue_script( 'jquery' );
			
			if ( is_active_widget( false, false, 'vw_widget_bundle_progress', true ) && is_single() ) {
				$useragent=$_SERVER['HTTP_USER_AGENT'];
				if(preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4))) {
					wp_enqueue_script( 'hammerjs', get_template_directory_uri().'/js/hammer.min.js', array(), VW_THEME_VERSION, VW_CONST_ENQUEUE_SCRIPTS_ON_FOOTER );
					wp_enqueue_script( 'bundle-progress-mobile', get_template_directory_uri().'/js/bundle-progress-mobile.js', array( 'jquery', 'hammerjs' ), VW_THEME_VERSION, VW_CONST_ENQUEUE_SCRIPTS_ON_FOOTER );
				} else {
					wp_enqueue_script( 'bundle-progress', get_template_directory_uri().'/js/bundle-progress.js', array( 'jquery' ), VW_THEME_VERSION, VW_CONST_ENQUEUE_SCRIPTS_ON_FOOTER );
				}
			}

			// Comments
			if ( is_singular() && comments_open() && get_option( 'thread_comments' ) && ! is_page_template( 'page_simple_composer.php' ) ) {
				wp_enqueue_script( 'comment-reply' );
			}

			// Font icons
			wp_enqueue_style( 'vwcss-icon-entypo', get_template_directory_uri().'/components/font-icons/entypo/css/entypo.css', array(), VW_THEME_VERSION );
			wp_enqueue_style( 'vwcss-icon-social', get_template_directory_uri().'/components/font-icons/social-icons/css/zocial.css', array(), VW_THEME_VERSION );
			if ( vw_get_theme_option( 'icon_iconic' ) )	wp_enqueue_style( 'vwcss-icon-iconic', get_template_directory_uri().'/components/font-icons/iconic/css/iconic.css', array(), VW_THEME_VERSION );
			if ( vw_get_theme_option( 'icon_elusive' ) )	wp_enqueue_style( 'vwcss-icon-elusive', get_template_directory_uri().'/components/font-icons/elusive/css/elusive.css', array(), VW_THEME_VERSION );
			if ( vw_get_theme_option( 'icon_awesome' ) )	wp_enqueue_style( 'vwcss-icon-awesome', get_template_directory_uri().'/components/font-icons/awesome/css/awesome.css', array(), VW_THEME_VERSION );
			if ( vw_get_theme_option( 'icon_typicons' ) )	wp_enqueue_style( 'vwcss-icon-typicons', get_template_directory_uri().'/components/font-icons/typicons/css/typicons.css', array(), VW_THEME_VERSION );

			// Required Libs for ALL PAGES
			if ( vw_is_rtl() ) {
				wp_enqueue_style( 'vwcss-bootstrap-rtl', get_template_directory_uri().'/css/bootstrap-rtl.css', array(), VW_THEME_VERSION );
			} else {
				wp_enqueue_style( 'vwcss-bootstrap', get_template_directory_uri().'/css/bootstrap.css', array(), VW_THEME_VERSION );
			}
			// wp_enqueue_script( 'vwjs-bootstrap-tabs', get_template_directory_uri().'/js/bootstrap/bootstrap.tabs.js', array( 'jquery' ), VW_THEME_VERSION, VW_CONST_ENQUEUE_SCRIPTS_ON_FOOTER );
			wp_enqueue_script( 'vwjs-backstretch', get_template_directory_uri().'/js/jquery-backstretch/jquery.backstretch.js', array( 'jquery' ), VW_THEME_VERSION, VW_CONST_ENQUEUE_SCRIPTS_ON_FOOTER );
			wp_enqueue_script( 'vwjs-hoverintent', get_template_directory_uri().'/js/jquery.hoverIntent.js', array( 'jquery' ), VW_THEME_VERSION, VW_CONST_ENQUEUE_SCRIPTS_ON_FOOTER );
			wp_enqueue_script( 'vwjs-imagesloaded', get_template_directory_uri().'/js/imagesloaded.pkgd.js', array( 'jquery' ), VW_THEME_VERSION, VW_CONST_ENQUEUE_SCRIPTS_ON_FOOTER );
			wp_enqueue_script( 'vwjs-isotope', get_template_directory_uri().'/js/isotope.pkgd.min.js', array( 'jquery' ), VW_THEME_VERSION, VW_CONST_ENQUEUE_SCRIPTS_ON_FOOTER );
			wp_enqueue_script( 'vwjs-jquery-easing', get_template_directory_uri().'/js/jquery.easing.compatibility.js', array( 'jquery' ), VW_THEME_VERSION, VW_CONST_ENQUEUE_SCRIPTS_ON_FOOTER );
			wp_enqueue_script( 'vwjs-magnific-popup', get_template_directory_uri().'/js/jquery.magnific-popup.js', array( 'jquery' ), VW_THEME_VERSION, VW_CONST_ENQUEUE_SCRIPTS_ON_FOOTER );
			wp_enqueue_script( 'vwjs-modernizr', get_template_directory_uri().'/js/modernizr.min.js', array( 'jquery' ), VW_THEME_VERSION, VW_CONST_ENQUEUE_SCRIPTS_ON_FOOTER );
			wp_enqueue_script( 'vwjs-imgliquid', get_template_directory_uri().'/js/imgLiquid.js', array( 'jquery' ), VW_THEME_VERSION, VW_CONST_ENQUEUE_SCRIPTS_ON_FOOTER );
			wp_enqueue_script( 'vwjs-raty', get_template_directory_uri().'/js/raty/jquery.raty.js', array( 'jquery' ), VW_THEME_VERSION, VW_CONST_ENQUEUE_SCRIPTS_ON_FOOTER );
			wp_enqueue_script( 'vwjs-superfish', get_template_directory_uri().'/js/jquery-superfish/superfish.js', array( 'jquery' ), VW_THEME_VERSION, VW_CONST_ENQUEUE_SCRIPTS_ON_FOOTER );
			wp_enqueue_script( 'vwjs-tipsy', get_template_directory_uri().'/js/jquery-tipsy/jquery.tipsy.js', array( 'jquery' ), VW_THEME_VERSION, VW_CONST_ENQUEUE_SCRIPTS_ON_FOOTER );
			wp_enqueue_script( 'vwjs-newsticker', get_template_directory_uri().'/js/jquery.newsTicker.js', array( 'jquery' ), VW_THEME_VERSION, VW_CONST_ENQUEUE_SCRIPTS_ON_FOOTER );
			if ( vw_get_theme_option( 'site_enable_sticky_sidebar' ) ) wp_enqueue_script( 'vwjs-hcsticky', get_template_directory_uri().'/js/jquery-hc-sticky/jquery.hc-sticky.js', array( 'jquery' ), VW_THEME_VERSION, VW_CONST_ENQUEUE_SCRIPTS_ON_FOOTER );
			if ( vw_get_theme_option( 'site_enable_sticky_menu' ) ) wp_enqueue_script( 'vwjs-sticky', get_template_directory_uri().'/js/jquery.sticky.js', array( 'jquery' ), VW_THEME_VERSION, VW_CONST_ENQUEUE_SCRIPTS_ON_FOOTER );

			// wp_enqueue_script( 'vwjs-waypoint', get_template_directory_uri().'/js/waypoint/jquery.waypoints.js', array( 'jquery' ), VW_THEME_VERSION, VW_CONST_ENQUEUE_SCRIPTS_ON_FOOTER );
			// if ( defined( 'VW_DEV_MODE' ) ) wp_enqueue_script( 'vwjs-waypoint-debug', get_template_directory_uri().'/js/waypoint/waypoints.debug.js', array( 'jquery' ), VW_THEME_VERSION, VW_CONST_ENQUEUE_SCRIPTS_ON_FOOTER );

			wp_enqueue_script( 'vwjs-swiper', get_template_directory_uri().'/js/swiper/swiper.jquery.js', array(), VW_THEME_VERSION, VW_CONST_ENQUEUE_SCRIPTS_ON_FOOTER );
			
			// mmenu (off-canvas menu)
			wp_enqueue_script( 'vwjs-mmenu', get_template_directory_uri().'/js/jquery-mmenu/js/jquery.mmenu.min.all.js', array( 'jquery' ), VW_THEME_VERSION, VW_CONST_ENQUEUE_SCRIPTS_ON_FOOTER );
			wp_enqueue_style( 'vwcss-mmenu', get_template_directory_uri().'/js/jquery-mmenu/css/jquery.mmenu.custom.css', array(), VW_THEME_VERSION );

			// Main script
			wp_enqueue_script( 'vwjs-main', get_template_directory_uri().'/js/main.js', array( 'jquery' ), VW_THEME_VERSION, VW_CONST_ENQUEUE_SCRIPTS_ON_FOOTER );
			wp_enqueue_script( 'vwjs-headroom', get_template_directory_uri().'/js/headroom.min.js', array(), VW_THEME_VERSION, VW_CONST_ENQUEUE_SCRIPTS_ON_FOOTER );
			wp_enqueue_script( 'vwjs-enquire', get_template_directory_uri().'/js/enquire.min.js', array(), VW_THEME_VERSION, VW_CONST_ENQUEUE_SCRIPTS_ON_FOOTER );
			
			wp_enqueue_script( 'vwjs-any-resize-event', get_template_directory_uri().'/js/any-resize-event.min.js', array( 'any-resize-event' ), VW_THEME_VERSION, VW_CONST_ENQUEUE_SCRIPTS_ON_FOOTER );
			
			wp_localize_script( 'vwjs-main', 'vw_main_js', apply_filters( 'vw_filter_localize_main_js', array(
				'theme_path' => get_template_directory_uri(),
				'ajaxurl' => admin_url( 'admin-ajax.php' ),

				'slider_slide_duration' => vw_get_theme_option( 'slider_slide_duration' ),
				'slider_transition_speed' => vw_get_theme_option( 'slider_transition_speed' ),
			) ) );

			// Include main theme when loaded on child theme
			if ( is_child_theme() ) wp_enqueue_style( 'vwcss-theme-root', get_template_directory_uri().'/style.css', array(), VW_THEME_VERSION );

			// Main theme
			if ( vw_is_rtl() ) {
				// RTL styles
				wp_enqueue_style( 'vwcss-theme-rtl', get_template_directory_uri().'/style-rtl.css', array(), VW_THEME_VERSION );

			} else {
				// Default styles
				wp_enqueue_style( 'vwcss-theme', get_bloginfo( 'stylesheet_url' ), array(), VW_THEME_VERSION );
				
			}
		}
	}
}