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

  $myposts = get_posts(apply_filters( 'vw_filter_bundle_progress_query', array('post__in' => $ids, 'orderby' => 'post__in', 'post_type' => array( 'post', 'cmm_article' ) ) ) );

  ?>

  <!-- MOBILE HEADER : START -->

   <div class="bundle-progress-mobile" id="js-bundle-progress-mobile">

    <div class="bundle-progress-mobile__items-wrapper">
      <ul class="bundle-progress-mobile__items">

      <?php
        $i = 0;
        foreach( $myposts as $post ):
            setup_postdata( $post );
            $post_link = get_permalink($post->ID);
      ?>
          <li id="js-bundle-progress-item" class="vw-bundle-progress__item" data-url="<?php echo $post_link; ?>" data-index="<?php echo $i; ?>" data-name="<?php echo $post->post_title; ?>">
            <div id="js-bundle-progress-progressbar" class="vw-bundle-progress__progressbar"></div>
            <h4 class="vw-bundle-progress__title"><a href="<?php echo $post_link; ?>"><?php echo $post->post_title; ?></a></h4>
            <!-- <h5 class="vw-bundle-progress__author"><em> by <a id="js-bundle-progress-author" href="<?php echo get_author_posts_url(get_the_author_meta( 'ID' )) ?>"><?php echo get_the_author() ?></a></em></h5> -->
            <div class="vw-post-meta vw-post-meta-large1">
              <?php echo vw_the_author(); ?>
            </div>
          </li>

      <?php
        $i++;
        endforeach;
      ?>

      <!-- <li class="bundle-progress-mobile__item"></li> -->

      </ul>
    </div>

    <div class="bundle-progress-mobile__panel">
      <div class="vw-bundle-progress__progressbar" id="js-bundle-progress-mobile-panel-progressbar"></div>
      <div class="bundle-progress-mobile__current-item" id="js-bundle-progress-mobile-current-wrapper">
        <h4 id="js-bundle-progress-mobile-current"><?php echo $title; ?></h4>
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

  <article <?php post_class( 'vw-main-post' ); ?>>

    <?php vw_the_breadcrumb(); ?>

    <?php vw_the_category(); ?>

    <h1 class="entry-title"><?php the_title(); ?></h1>

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

  <?php vw_the_post_footer_sections(); ?>

<?php endforeach; wp_reset_postdata(); ?>
