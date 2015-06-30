<div class="vw-post-box vw-post-style-text-no-thumbnail clearfix <?php vw_the_post_format_class(); ?>" <?php vw_itemtype('Article'); ?>>

	<div class="vw-post-box-inner">
		
		<h4 class="vw-post-box-title">
			<a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php printf( esc_attr__('Permalink to %s', 'envirra'), the_title_attribute('echo=0') ); ?>" rel="bookmark" <?php vw_itemprop('url'); ?>><?php the_title(); ?></a>
		</h4>

	</div>

	<?php vw_the_review_summary_bar(); ?>
</div>