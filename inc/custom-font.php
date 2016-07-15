<?php

/**
 * Add custom font into font list option
 */
add_filter( 'redux/'.$args['opt_name'].'/field/typography/custom_fonts', 'vw_custom_font_list' );
if ( ! function_exists( 'vw_custom_font_list' ) ) {
	function vw_custom_font_list( $list ) {
		$list['Custom Fonts'][ 'custom_font_1' ] = 'Custom Font 1';
		$list['Custom Fonts'][ 'custom_font_2' ] = 'Custom Font 2';

		return $list;
	}
}

/* -----------------------------------------------------------------------------
 * Render Custom Font
 * -------------------------------------------------------------------------- */
if ( ! function_exists('vw_url_strip_protocol') ) {
	function vw_url_strip_protocol($str) {
		return str_replace(array('https:', 'http:'), '', $str);
	}
}

add_action( 'wp_head', 'vw_render_custom_font', 99 );
add_action( 'login_enqueue_scripts', 'vw_render_custom_font', 99 );
if ( ! function_exists( 'vw_render_custom_font' ) ) {
	function vw_render_custom_font() {
		?>
		<style id="vw-custom-font" type="text/css">
			<?php
			$font_url_format = "url( '%s' ) format('%s')";
			?>
			<?php
			$font1_urls 		 = array();
			$font1_bold_urls = array();

			$custom_font1_ttf = vw_get_theme_option( 'custom_font1_ttf' );
			if ( ! empty( $custom_font1_ttf['url'] ) ) {
				$font1_urls[] = sprintf( $font_url_format, vw_url_strip_protocol($custom_font1_ttf['url']), 'truetype' );
			}

			$custom_font1_bold_ttf = vw_get_theme_option( 'custom_font1_bold_ttf' );
			if ( ! empty( $custom_font1_bold_ttf['url'] ) ) {
				$font1_bold_urls[] = sprintf( $font_url_format, vw_url_strip_protocol($custom_font1_bold_ttf['url']), 'truetype' );
			}

			$custom_font1_woff = vw_get_theme_option( 'custom_font1_woff' );
			if ( ! empty( $custom_font1_woff['url'] ) ) {
				$font1_urls[] = sprintf( $font_url_format, vw_url_strip_protocol($custom_font1_woff['url']), 'woff' );
			}

			$custom_font1_bold_woff = vw_get_theme_option( 'custom_font1_bold_woff' );
			if ( ! empty( $custom_font1_bold_woff['url'] ) ) {
				$font1_bold_urls[] = sprintf( $font_url_format, vw_url_strip_protocol($custom_font1_bold_woff['url']), 'woff' );
			}

			$custom_font1_svg = vw_get_theme_option( 'custom_font1_svg' );
			if ( ! empty( $custom_font1_svg['url'] ) ) {
				$font1_urls[] = sprintf( $font_url_format, vw_url_strip_protocol($custom_font1_svg['url']), 'svg' );
			}

			$custom_font1_bold_svg = vw_get_theme_option( 'custom_font1_bold_svg' );
			if ( ! empty( $custom_font1_bold_svg['url'] ) ) {
				$font1_bold_urls[] = sprintf( $font_url_format, vw_url_strip_protocol($custom_font1_bold_svg['url']), 'svg' );
			}

			$custom_font1_eot = vw_get_theme_option( 'custom_font1_eot' );
			if ( ! empty( $custom_font1_eot['url'] ) ) {
				$font1_urls[] = sprintf( $font_url_format, vw_url_strip_protocol($custom_font1_eot['url']), 'embedded-opentype' );
			}

			$custom_font1_bold_eot = vw_get_theme_option( 'custom_font1_bold_eot' );
			if ( ! empty( $custom_font1_bold_eot['url'] ) ) {
				$font1_bold_urls[] = sprintf( $font_url_format, vw_url_strip_protocol($custom_font1_bold_eot['url']), 'embedded-opentype' );
			}

			if ( ! empty( $font1_urls ) ) : ?>
			@font-face {
				font-family: 'custom_font_1';
				src: <?php echo implode( ",", $font1_urls ); ?>;
			}
			@font-face {
				font-family: 'custom_font_1';
				font-weight: bold;
				src: <?php echo implode( ",", $font1_bold_urls ); ?>;
			}
			<?php endif; ?>

			<?php
			$font2_urls = array();
			$font2_bold_urls = array();
			
			$custom_font2_ttf = vw_get_theme_option( 'custom_font2_ttf' );
			if ( ! empty( $custom_font2_ttf['url'] ) ) {
				$font2_urls[] = sprintf( $font_url_format, vw_url_strip_protocol($custom_font2_ttf['url']), 'truetype' );
			}

			$custom_font2_bold_ttf = vw_get_theme_option( 'custom_font2_bold_ttf' );
			if ( ! empty( $custom_font2_bold_ttf['url'] ) ) {
				$font2__bold_urls[] = sprintf( $font_url_format, vw_url_strip_protocol($custom_font2_bold_ttf['url']), 'truetype' );
			}

			$custom_font2_woff = vw_get_theme_option( 'custom_font2_woff' );
			if ( ! empty( $custom_font2_woff['url'] ) ) {
				$font2_urls[] = sprintf( $font_url_format, vw_url_strip_protocol($custom_font2_woff['url']), 'woff' );
			}

			$custom_font2_bold_woff = vw_get_theme_option( 'custom_font2_bold_woff' );
			if ( ! empty( $custom_font2_bold_woff['url'] ) ) {
				$font2_bold_urls[] = sprintf( $font_url_format, vw_url_strip_protocol($custom_font2_bold_woff['url']), 'woff' );
			}

			$custom_font2_svg = vw_get_theme_option( 'custom_font2_svg' );
			if ( ! empty( $custom_font2_svg['url'] ) ) {
				$font2_urls[] = sprintf( $font_url_format, vw_url_strip_protocol($custom_font2_svg['url']), 'svg' );
			}

			$custom_font2_bold_svg = vw_get_theme_option( 'custom_font2_bold_svg' );
			if ( ! empty( $custom_font2_bold_svg['url'] ) ) {
				$font2_bold_urls[] = sprintf( $font_url_format, vw_url_strip_protocol($custom_font2_bold_svg['url']), 'svg' );
			}

			$custom_font2_eot = vw_get_theme_option( 'custom_font2_eot' );
			if ( ! empty( $custom_font2_eot['url'] ) ) {
				$font2_urls[] = sprintf( $font_url_format, vw_url_strip_protocol($custom_font2_eot['url']), 'embedded-opentype' );
			}

			$custom_font2_bold_eot = vw_get_theme_option( 'custom_font2_bold_eot' );
			if ( ! empty( $custom_font2_bold_eot['url'] ) ) {
				$font2_bold_urls[] = sprintf( $font_url_format, vw_url_strip_protocol($custom_font2_bold_eot['url']), 'embedded-opentype' );
			}

			if ( ! empty( $font2_urls ) ) : ?>
			@font-face {
				font-family: 'custom_font_2';
				src: <?php echo implode( ",", $font2_urls ); ?>;
			}
			@font-face {
				font-family: 'custom_font_2';
				font-weight: bold;
				src: <?php echo implode( ",", $font2_bold_urls ); ?>;
			}
			<?php endif; ?>
		</style>
		<?php
	}
}
