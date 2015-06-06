<div class="vw-post-box vw-post-style-medium vw-post-style-medium-1 <?php vw_the_post_format_class(); ?>" <?php vw_itemtype('Article'); ?>>
	<?php if ( has_post_thumbnail() ) : ?>
		<a class="vw-post-box-thumbnail vw-post-box-thumbnail__crop" href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark" data-mfp-src="<?php echo esc_url( vw_get_embed_video_url() ); ?>">
			<span class="vw-post-box-thumbnail__inner">
				<?php the_post_thumbnail( VW_CONST_THUMBNAIL_SIZE_POST_LARGE ); ?>

				<?php vw_the_post_format_icon(); ?>
				<?php vw_the_review_summary_bar(); ?>
			</span>
		</a>
	<?php endif; ?>

	<?php vw_the_category(); ?>

	<div class="vw-post-box-inner">

		<h3 class="vw-post-box-title">
			<a href="<?php the_permalink(); ?>" class="" <?php vw_itemprop('url'); ?>>
				<?php the_title(); ?>
			</a>
		</h3>

		<div class="vw-post-meta">
			
			<?php vw_the_author(); ?>

			<span class="vw-post-meta-separator">/</span>

			<?php vw_the_post_date(); ?>

			<!-- 
			<span class="vw-post-meta-separator">/</span>
			<?php vw_the_comment_link(); ?>
			-->
		</div>
		
		<div class="vw-post-box-excerpt"><?php the_excerpt(); ?></div>
		
	</div>
	
</div>