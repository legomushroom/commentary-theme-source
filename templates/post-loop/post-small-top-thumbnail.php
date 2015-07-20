<div class="vw-post-box vw-post-style-small-top-thumbnail clearfix <?php vw_the_post_format_class(); ?>" <?php vw_itemtype('Article'); ?>>
	<a class="vw-post-box-thumbnail" href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark">
		<?php the_post_thumbnail( VW_CONST_THUMBNAIL_SIZE_POST_SMALL_TOP_THUMBNAIL ); ?>
	</a>
	
	<div class="vw-post-box-inner">
		
		<h5 class="vw-post-box-title">
			<a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php printf( esc_attr__('Permalink to %s', 'envirra'), the_title_attribute('echo=0') ); ?>" rel="bookmark" <?php vw_itemprop('url'); ?>><?php the_title(); ?></a>
		</h5>

	</div>
</div>