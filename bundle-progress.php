<?php
  $widget_sidebar = is_active_widget( false, false, 'vw_widget_bundle_progress', true );
  if ( !$widget_sidebar ) { return; }

  $ID = get_the_ID();
  $title = get_the_title();
  $post_type = get_post_type();

  $ids = get_option('wv_bundle_progress_posts_' . $post_type );
  $ids   = explode(',', $ids);
  $ids = array_map('absint', $ids);
  $ids = array_filter($ids);
  if ( empty( $ids ) ) { return; }

  array_unshift($ids, get_the_ID());

  $myposts = get_posts(apply_filters( 'vw_filter_bundle_progress_query', array('post__in' => $ids, 'orderby' => 'post__in', 'post_status' => 'any', 'post_type' => array( 'post', 'cmm_article' ) ) ) );

  ?>

  <!-- MOBILE HEADER : START -->

   <div class="bundle-progress-mobile is-open1" id="js-bundle-progress-mobile">
    <!-- <div class="bundle-progress-mobile__items-wrapper"></div> -->
    <ul class="bundle-progress-mobile__items"><div id="js-bundle-progress-mobile-items"></div></ul>

    <div class="bundle-progress-mobile__panel">
      <div class="vw-bundle-progress__progressbar" id="js-bundle-progress-mobile-panel-progressbar"></div>
      <div class="bundle-progress-mobile__current-item" id="js-bundle-progress-mobile-current-wrapper">
        <h4 id="js-bundle-progress-mobile-current"><?php echo get_the_title(); ?></h4>
      </div>
      <div class="bundle-progress-mobile__title" id="js-bundle-progress-mobile-title">
        <h4><?php echo get_option('wv_bundle_progress_title'); ?></h4>
      </div>
      <div class="bundle-progress-mobile__arrow" id="js-bundle-progress-mobile-open"></div>
    </div>

   </div>

   <!-- MOBILE HEADER : END-->

<?php

foreach( $myposts as $post ):
  if ($ID === $post->ID) { continue; }
  setup_postdata($post); ?>

  <article <?php post_class( 'vw-main-post' ); ?> data-url="<?php echo get_permalink($post->ID); ?>" data-name="<?php echo $post->post_title; ?>" data-author-name="<?php echo get_the_author_meta('display_name', $post->post_author); ?>" data-author-link="<?php echo get_author_posts_url($post->post_author); ?>">

    <?php vw_the_breadcrumb(); ?>

    <?php vw_the_category(); ?>

    <h1 class="entry-title">
      <a href="<?php echo get_permalink($post->ID); ?>"><?php the_title(); ?></a>
    </h1>

    <?php vw_the_subtitle(); ?>

    <span class="author vcard hidden"><span class="fn"><?php echo esc_attr( get_the_author() ); ?></span></span>
    <span class="updated hidden"><?php echo esc_attr( get_the_date( 'Y-m-d' ) ); ?></span>

    <?php vw_the_post_meta_large() ?>

    <?php // vw_the_post_share_box(); ?>

    <div class="vw-post-content clearfix">
      <?php if ( vw_get_paged() == 1 ) : ?>

        <?php if ( ! has_post_format() ) vw_the_featured_image(); ?>

        <?php vw_the_embeded_media(); ?>

      <?php endif; ?>

      <?php
        $content = $post->post_content;
        $content = apply_filters('the_content', $content);
        $content = str_replace(']]>', ']]&gt;', $content);
        echo $content;
      ?>
    </div>

    <?php vw_the_link_pages(); ?>

    <?php the_tags( '<div class="vw-tag-links"><span class="vw-tag-links-title">'.__( 'filed under:', 'envirra' ).'</span>', '', '</div>' ); ?>

    <?php echo getShareButtons('is-under-post'); ?>

  </article><!-- #post-## -->

  <?php do_action( 'vw_action_after_single_post' ); ?>

  <?php vw_the_post_footer_sections(false); ?>

<?php endforeach; wp_reset_postdata(); ?>

<?php echo do_shortcode(vw_get_theme_option( 'post_footer_ajax_load_more' )); ?>
