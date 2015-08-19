<!-- Main Menu -->
<nav id="vw-menu-main" class="vw-menu-main-wrapper" <?php vw_itemtype('SiteNavigationElement'); ?>>
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				
				<div class="vw-menu-main-inner">

					<span class="vw-scroll-to-top vw-scroll-to-top--menu"><i class="vw-icon icon-entypo-up-open"></i></span>

					<!-- <a href="#" class="vw-header-logo"></a> -->

					<?php
					if ( has_nav_menu('vw_menu_main' ) ) {

						wp_nav_menu( apply_filters( 'vw_filter_navigation_main_args', array(
							'theme_location' => 'vw_menu_main',
							'container' => false,
							'menu_class' => 'vw-menu vw-menu-location-main vw-menu-type-mega-post',
							'link_before' => '<span>',
							'link_after' => '</span>',
							'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s '.apply_filters( 'vw_filter_main_menu_additional_items', '' ).'</ul>',
							'depth' => 3,
							'walker' => new Vw_Walker_Nav_Mega_Menu()
						) ) );

					} else {
						if ( current_user_can( 'manage_options' ) ) {
							$menu_admin_url = admin_url( 'nav-menus.php' );
						} else {
							$menu_admin_url = '#';
						}
						
						printf( '<div class="vw-no-main-menu-warning"><i class="icon-entypo-attention"></i> Please setup <a href="%s" target="_blank">main menu</a>.</div>', $menu_admin_url );

					}
					?>
					
					<a class="vw-instant-search-button main-menu-link">
						<i class="vw-icon icon-entypo-search"></i>
					</a>

				</div>
			</div>
		</div>
	</div>
</nav>
<!-- End Main Menu -->