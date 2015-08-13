<?php get_header(); ?>

<div class="container" style="margin-top: 40px; margin-bottom: 40px;">
  <div class="row">
    <div class="vw-post-loop vw-post-loop-medium-1 vw-post-loop-medium-1-col-4">
    <div class="row">
      <div class="col-sm-12">
        <div class="vw-isotope vw-block-grid vw-block-grid-xs-1 vw-block-grid-sm-4">

          <?php //$query = new WP_Query( 'cat=*' ); $GLOBALS['wp_query'] = $query; ?>

          <?php //while( $query->have_posts() ) : $query->the_post(); ?>
          <?php while( have_posts() ) : the_post(); ?>
            <div class="vw-block-grid-item">
              <?php get_template_part( 'templates/post-loop/loop', 'issues' ); ?>
            </div>
          <?php endwhile; ?>
        </div>

        <?php vw_the_pagination(); ?>

        <!-- <?php get_sidebar(); ?> -->
      
        </div>
      </div>
    </div>
  </div>
  </div>
</div>

<?php get_footer(); ?>