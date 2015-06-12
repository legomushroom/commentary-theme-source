<div class="vw-post-box vw-post-style-large <?php vw_the_post_format_class(); ?>" <?php vw_itemtype('Article'); ?>>
	<?php if ( has_post_thumbnail() ) : ?>
		<a class="vw-post-box-thumbnail" href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark">
			<?php the_post_thumbnail( VW_CONST_THUMBNAIL_SIZE_POST_LARGE ); ?>
			<?php vw_the_post_format_icon(); ?>
			<?php vw_the_review_summary_bar(); ?>
		</a>
	<?php endif; ?>

	<div class="vw-post-box-inner">
		
		<?php vw_the_category(); ?>

		<h2 class="vw-post-box-title">
			<a href="<?php the_permalink(); ?>" class="" <?php vw_itemprop('url'); ?>>
				<?php the_title(); ?>
			</a>
		</h2>

		<div class="vw-post-meta">

			<?php vw_the_author(); ?>

			<span class="vw-post-meta-separator">/</span>

			<?php vw_the_post_date(); ?>

			<!-- 
			<?php if ( comments_open() ) : ?>
				<span class="vw-post-meta-separator">/</span>
				<?php vw_the_comment_link(); ?>
			<?php endif; ?>
			 -->
			 
		</div>

		<div class="vw-post-box-excerpt">
			<?php the_excerpt(); ?>
		</div>

	</div>

	<div class="vw-post-box-footer vw-header-font">

		<a href="<?php the_permalink(); ?>" class="vw-post-box-read-more"><span><?php _e( 'Read More', 'envirra' ); ?></span> <i class="vw-icon icon-iconic-right"></i></a>
		
		<?php vw_the_post_share_icons(); ?>

	</div>
	
</div>