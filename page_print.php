<?php
  /**
   * Template Name: Page Print
   */
?>

<!DOCTYPE html>
<!--[if lt IE 9]>         <html class="no-js lt-ie9 lt-ie10" <?php vw_html_tag_schema(); ?> <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 9]>         <html class="no-js lt-ie10" <?php vw_html_tag_schema(); ?> <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 9]><!--> <html class="no-js" <?php vw_html_tag_schema(); ?> <?php language_attributes(); ?>> <!--<![endif]-->
  <head>
    <!-- WP Header -->
    <!-- <?php wp_head(); ?> -->
    <link rel="stylesheet" href="style.css">
    <!-- End WP Header -->
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=no">
  </head>

  <body id="site-top" <?php body_class(); ?>>
    <!-- Site Wrapper -->
    <div class="vw-site-wrapper <?php echo (is_front_page()) ? 'wv-home-page' : ''; ?>">

      <?php vw_the_site_top_bar(); ?>

      <?php get_template_part( '/templates/site-header', vw_get_theme_option( 'site_header_layout' ) ); ?>

      <?php do_action( 'vw_action_site_header' ); ?>

<div class="vw-page-wrapper clearfix <?php vw_the_sidebar_position_class(); ?>">
  <div class="container">
    <div class="row">
      <div class="vw-page-content" role="main" id="main">
      </div>
    </div>
  </div>
</div>

<?php get_template_part( '/templates/site-footer' ); ?>
