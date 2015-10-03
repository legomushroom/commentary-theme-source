<!-- Mobile Menu -->
<nav class="vw-menu-mobile-wrapper" id="js-mobile-menu">

	<?php get_template_part( 'templates/logo-mobile-menu' ); ?>

	<i id="js-mobile-menu-close-btn" class="vw-icon icon-entypo-cancel vw-menu-mobile-wrapper__close"></i>
	<i class="vw-icon icon-entypo-search vw-menu-mobile-wrapper__search vw-instant-search-button"></i>

	<?php
	$menu_location = has_nav_menu( 'vw_menu_mobile' ) ?  'vw_menu_mobile': 'vw_menu_main';
	if ( has_nav_menu( $menu_location ) ) {
		wp_nav_menu( apply_filters( 'vw_filter_navigation_mobile_args', array(
			'theme_location' => $menu_location,
			'container' => false,
			'menu_class' => 'vw-menu-location-mobile',
			'link_before' => '<span>',
			'link_after' => '</span>',
			'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
			// 'items_wrap' => '<ul id="%1$s" class="%2$s">'.vw_mobile_menu_add_buttons().'%3$s</ul>',
			'depth' => 3,
			'walker' => new Vw_Walker_Nav_Text_Menu()
		) ) );
	}
	?>

</nav>
<!-- End Mobile Menu -->