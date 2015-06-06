<div class="vw-post-box vw-post-style-small-left-thumbnail clearfix <?php vw_the_post_format_class(); ?>" <?php vw_itemtype('Article'); ?>>
	

	<?php if ( has_post_thumbnail() ) : ?>
		<div class="vw-post-box-thumbnail__small-img-wrapper">
				<a class="vw-post-box-thumbnail__crop vw-post-box-thumbnail__crop--small-left" href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark">
					<span class="vw-post-box-thumbnail__inner">
						<?php
							$large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), VW_CONST_THUMBNAIL_SIZE_POST_SMALL_LEFT_THUMBNAIL );
							$width  = ($large_image_url[1] === 1) ? 85 : $large_image_url[1];
							$height = ($large_image_url[2] === 1) ? 'auto' : $large_image_url[2];
							$style  = ($height === 'auto') ? 'width: 85px; height: auto;' : '';
						?>
						<img style="<?= $style ?>"  width="<?= $width ?>" height="<?= $height ?>" src="<?= $large_image_url[0] ?>" class="attachment-vw_small_thumbnail wp-post-image" alt="<?= the_title_attribute( 'echo=0' ) ?>" itemprop="image">
					</span>

			<!-- 
					<?php the_post_thumbnail( VW_CONST_THUMBNAIL_SIZE_POST_SMALL_LEFT_THUMBNAIL ); ?>
			 -->

				</a>
		</div>
	<?php endif; ?>
	
	<div class="vw-post-box-inner">
		
		<h5 class="vw-post-box-title">
			<a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php printf( esc_attr__('Permalink to %s', 'envirra'), the_title_attribute('echo=0') ); ?>" rel="bookmark" <?php vw_itemprop('url'); ?>><?php the_title(); ?></a>
		</h5>

		<div class="vw-post-meta">
			<?php vw_the_author(); ?>
			<!-- 
			<?php vw_the_post_date(); ?>
			<?php if ( comments_open() ) vw_the_comment_link(); ?>
 			-->
		</div>

	</div>
</div>