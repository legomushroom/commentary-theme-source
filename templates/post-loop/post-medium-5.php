<div class="vw-post-box vw-post-style-medium vw-post-style-medium-5 <?php vw_the_post_format_class(); ?>" <?php vw_itemtype('Article'); ?>>

	<div class="vw-post-box-thumbnail">
		<?php the_post_thumbnail( VW_CONST_THUMBNAIL_SIZE_POST_MEDIUM ); ?>
		<?php vw_the_post_format_icon(); ?>
		<?php vw_the_review_summary_bar(); ?>

		<?php vw_the_category(); ?>
		<h2 class="vw-post-box-title">
			<a href="<?php the_permalink(); ?>" class="" <?php vw_itemprop('url'); ?>>
				<?php the_title(); ?>
			</a>
		</h2>

		<a href="<?php the_permalink(); ?>" class="vw-box-link" <?php vw_itemprop('url'); ?>>
			<?php the_title(); ?>
		</a>
	</div>
	
</div>