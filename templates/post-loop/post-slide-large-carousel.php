<div class="vw-post-box vw-post-style-slide vw-post-style-slide-large-carousel <?php vw_the_post_format_class(); ?>" <?php vw_itemtype('Article'); ?>>

	<?php vw_itemprop_meta( 'datePublished', get_the_time('c') ); ?>

	<?php if ( has_post_thumbnail() ) : ?>
		<a class="vw-post-box-thumbnail" href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark">
			<!-- 
			<span class="vw-post-box-thumbnail__inner">
				<?php
					$large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), VW_CONST_THUMBNAIL_SIZE_POST_SLIDER_LARGE_CAROUSEL );
					$width  = ($large_image_url[1] === 11) ? 'auto' : $large_image_url[1];
					$height = ($large_image_url[2] === 11) ? 240 : $large_image_url[2];
					$style = ($width === 'auto') ? 'width: auto; height: 240px;' : '';
				?>
				<img style="<?= $style ?>"  width="<?= $width ?>" height="<?= $height ?>" src="<?= $large_image_url[0] ?>" class="attachment-vw_one_third_thumbnail wp-post-image" alt="<?= the_title_attribute( 'echo=0' ) ?>" itemprop="image">
			</span>
   		-->
 			<?php the_post_thumbnail( VW_CONST_THUMBNAIL_SIZE_POST_SLIDER_LARGE_CAROUSEL ); ?>
		</a>
	<?php endif; ?>

	<div class="vw-post-box-inner">
		<div class="vw-post-box-inner-2">
			<?php vw_the_category(); ?>
			<h2 class="vw-post-box-title" <?php vw_itemprop('headline'); ?>><a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php printf( esc_attr__('Permalink to %s', 'envirra'), the_title_attribute('echo=0') ); ?>" rel="bookmark" <?php vw_itemprop('url'); ?>><?php the_title(); ?></a></h2>

			<div class="vw-post-meta">
				<!-- Post date -->
				<?php vw_the_post_date(); ?>
			</div>
		</div>
	</div>
	
</div>