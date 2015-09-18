<!-- Logo -->
<span class="vw-logo-wrapper" <?php vw_itemtype('Organization'); ?>>
  <h1 class="vw-site-title" <?php vw_itemprop('name'); ?>><?php bloginfo( 'name' ); ?></h1>
</span>

<!-- <span class="vw-logo-wrapper" <?php vw_itemtype('Organization'); ?>>
  
  <a class="vw-logo-link" href="<?php echo home_url(); ?>" <?php vw_itemprop('url'); ?>>
    <?php $logo = vw_get_theme_option( 'logo_mobile_menu' ); ?>

    <?php if ( ! empty( $logo[ 'url' ] ) ): ?>

      <img class="vw-logo" src="<?php echo esc_url( $logo[ 'url' ] ); ?>" width="<?php echo esc_attr( $logo[ 'width' ] ) ?>" height="<?php echo esc_attr( $logo[ 'height' ] ) ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" <?php vw_itemprop('logo'); ?>>

    <?php else: ?>

      <h1 class="vw-site-title" <?php vw_itemprop('name'); ?>><?php bloginfo( 'name' ); ?></h1>

      <?php if ( get_bloginfo( 'description' ) ): ?>
        <h2 class="vw-site-tagline" <?php vw_itemprop('description'); ?>><?php bloginfo( 'description' ) ?></h2>
      <?php endif; ?>
      
    <?php endif; ?>
  </a>

</span> -->
<!-- End Logo -->