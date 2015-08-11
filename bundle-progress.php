<?php

  if ( !is_active_widget( false, false, 'vw_widget_bundle_progress', true ) ) { return; }

  $ID = get_the_ID();
  $title = get_the_title();

  $ids = get_option('wv_bundle_progress_posts');
  $ids = explode(',', $ids);
  $ids = array_map('absint', $ids);
  array_unshift($ids, get_the_ID());
  
  $myposts = get_posts( apply_filters( 'vw_filter_widget_bundle_progress_query', array('post__in' => $ids, 'orderby' => 'post__in', 'post_type' => array('post', 'article')) ) );

  $useragent=$_SERVER['HTTP_USER_AGENT'];
  if (preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4))) : ?>

     <div class="bundle-progress-mobile" id="js-bundle-progress-mobile">

      <div class="bundle-progress-mobile__items-wrapper">
        <ul class="bundle-progress-mobile__items">

        <?php
          $i = 0;
          foreach( $myposts as $post ):
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

<?php endif;

if ( !is_active_widget( false, false, 'vw_widget_bundle_progress', true ) ) { return; }

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

