<?php get_header(); ?>

<?php get_template_part( '/templates/page-title' ); ?>

<div class="vw-page-wrapper clearfix <?php vw_the_sidebar_position_class(); ?>">
	<div class="container">
		<div class="row">

			<div class="vw-page-content" role="main" itemprop="articleBody">

				<?php if ( have_posts() ) : ?>

					<?php do_action( 'vw_action_before_single_post' ); ?>

					<?php while ( have_posts() ) : the_post(); ?>
						<article <?php post_class( 'vw-main-post clearfix' ); ?> data-url="<?php echo get_permalink(get_the_ID()); ?>" data-name="<?php echo get_the_title(); ?>" data-author-name="<?php echo get_the_author(); ?>" data-author-link="<?php get_author_posts_url(get_the_author_meta( 'ID' )); ?>">
							<?php // vw_the_post_share_box(); ?>

							<span class="author vcard hidden"><span class="fn"><?php echo esc_attr( get_the_author() ); ?></span></span>
							<span class="updated hidden"><?php echo esc_attr( get_the_date( 'Y-m-d' ) ); ?></span>

							<?php switch ( get_post_format() ) {
								case 'video':  vw_the_embeded_video(); break;
								case 'audio': vw_the_embeded_audio(); break;
							} ?>

							<div class="vw-post-content clearfix">
								<?php if ( ! has_post_format( 'gallery' ) ) vw_the_embeded_media(); ?>
								<?php the_content(); ?>
							</div>

							<?php wp_link_pages( array(
								'before'      => '<div class="vw-page-links"><span class="vw-page-links-title">' . __( 'Pages:', 'envirra' ) . '</span>',
								'after'       => '</div>',
								'link_before' => '<span class="vw-page-link">',
								'link_after'  => '</span>',
							) ); ?>

							<?php the_tags( '<div class="vw-tag-links"><span class="vw-tag-links-title">'.__( 'filed under:', 'envirra' ).'</span>', '', '</div>' ); ?>

							<?php echo getShareButtons('is-under-post'); ?>

						</article><!-- #post-## -->

					<?php endwhile; ?>

					<?php do_action( 'vw_action_after_single_post' ); ?>

					<?php vw_the_post_footer_sections(); ?>

				<?php endif; ?>

				<?php include 'bundle-progress.php' ?>

			</div>

			<?php get_sidebar(); ?>
		
		</div>
	</div>

</div>

<?php get_footer(); ?>