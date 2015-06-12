<div class="vw-post-box vw-post-style-slide vw-post-style-slide-medium <?php vw_the_post_format_class(); ?>" <?php vw_itemtype('Article'); ?>>

	<?php if ( has_post_thumbnail() ) : ?>
		<a class="vw-post-box-thumbnail" href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark">
			<?php the_post_thumbnail( VW_CONST_THUMBNAIL_SIZE_POST_SLIDER_MEDIUM ); ?>
		</a>
	<?php endif; ?>

	<div class="vw-post-box-inner container">
		<div class="row">
			<div class="col-sm-9 col-md-8">
				<div class="vw-post-box-inner-2">
					<?php vw_the_category(); ?>
					<h2 class="vw-post-box-title"><a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php printf( esc_attr__('Permalink to %s', 'envirra'), the_title_attribute('echo=0') ); ?>" rel="bookmark" <?php vw_itemprop('url'); ?>><?php the_title(); ?></a></h2>

					<div class="vw-post-meta">
						
						<?php vw_the_author(); ?>

						<span class="vw-post-meta-separator">/</span>

						<?php vw_the_post_date(); ?>

					</div>
				</div>
			</div>
		</div>
	</div>
	
</div>