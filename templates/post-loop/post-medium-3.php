<div class="vw-post-box vw-post-style-medium vw-post-style-medium-3 <?php vw_the_post_format_class(); ?>" <?php vw_itemtype('Article'); ?>>

	<div class="vw-post-box-inner">
		
		<?php vw_the_category(); ?>

		<h3 class="vw-post-box-title">
			<a href="<?php the_permalink(); ?>" class="" <?php vw_itemprop('url'); ?>>
				<?php the_title(); ?>
			</a>
		</h3>

		<?php if ( has_post_thumbnail() ) : ?>
		<a class="vw-post-box-thumbnail" href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark">
			<?php the_post_thumbnail( VW_CONST_THUMBNAIL_SIZE_POST_MEDIUM ); ?>
			<?php vw_the_post_format_icon(); ?>
			<?php vw_the_review_summary_bar(); ?>
		</a>
		<?php endif; ?>
				
	</div>
	
</div>