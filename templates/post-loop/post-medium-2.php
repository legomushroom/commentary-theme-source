<div class="vw-post-box vw-post-style-medium vw-post-style-medium-2 <?php vw_the_post_format_class(); ?>" <?php vw_itemtype('Article'); ?>>

	<div class="vw-post-box-inner">
		
		<?php vw_the_category(); ?>

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

		<?php if ( has_post_thumbnail() ) : ?>
		<a class="vw-post-box-thumbnail vw-post-box-thumbnail__crop" href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark">
			<span class="vw-post-box-thumbnail__inner">
				<span class="vw-post-box-thumbnail__shift">
					<?php the_post_thumbnail( VW_CONST_THUMBNAIL_SIZE_POST_MEDIUM ); ?>
					<?php vw_the_post_format_icon(); ?>
					<?php vw_the_review_summary_bar(); ?>
				</span>
			</span>
		</a>
		<?php endif; ?>
		
		<div class="vw-post-box-excerpt"><?php the_excerpt(); ?></div>
		
	</div>

</div>