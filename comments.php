
<?php if ( comments_open() || get_comments_number() ) : ?>
<div id="comments" class="vw-post-comments">
	<?php
	
		if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME'])) {
			die ('Please do not load this page directly. Thanks!');
		}
	
		if ( post_password_required() ) {
			// _e( 'This post is password protected. Enter the password to view comments.', 'envirra' );
			echo '</div>';
			return;
		}
	?>

	<!-- shares -->
	<?php
	$post_id = get_the_id();
	$post_url = urlencode( get_permalink() );
	$post_title = urlencode( get_the_title() );
	$thumbnail_url = '';
	if ( has_post_thumbnail() ) {
		$thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_id() ), 'full' );
		$thumbnail_url = $thumbnail[0];
	}

	$facebook_url = sprintf( 'http://www.facebook.com/sharer.php?u=%s', $post_url );
	$twitter_url = sprintf( 'http://twitter.com/home?status=%s', $post_title.'%20-%20'.$post_url );
	$pinterest_url = sprintf( 'http://pinterest.com/pin/create/button/?url=%s&media=%s&description=%s', $post_url, $thumbnail_url, $post_title );
	$gplus_url = sprintf( 'http://plus.google.com/share?url=%s', $post_url );
	?>
	<div class="vw-post-share-box vw-post-comments__share-box">
		<a class="vw-post-share-box-button vw-post-shares-social vw-post-shares-social-facebook" href="<?php echo esc_url( $facebook_url ); ?>" data-post-id="<?php echo esc_attr( $post_id ); ?>" data-share-to="facebook" data-width="500" data-height="300" title="<?php echo esc_attr__( 'Share to Facebook', 'envirra' );?>">
			<i class="vw-icon icon-social-facebook"></i>
			<span class="vw-button-label"><?php _e( 'Facebook', 'envirra' ); ?></span>
		</a>

		<a class="vw-post-share-box-button vw-post-shares-social vw-post-shares-social-twitter" href="<?php echo esc_url( $twitter_url ); ?>" data-post-id="<?php echo esc_attr( $post_id ); ?>" data-share-to="twitter" data-width="500" data-height="300" title="<?php echo esc_attr__( 'Share to Twitter', 'envirra' );?>">
			<i class="vw-icon icon-social-twitter"></i>
			<span class="vw-button-label"><?php _e( 'Twitter', 'envirra' ); ?></span>
		</a>

		<a class="vw-post-share-box-button vw-post-shares-social vw-post-shares-social-pinterest" href="<?php echo esc_url( $pinterest_url ); ?>" data-post-id="<?php echo esc_attr( $post_id ); ?>" data-share-to="pinterest" data-width="750" data-height="300" title="<?php echo esc_attr__( 'Share to Pinterest', 'envirra' );?>">
			<i class="vw-icon icon-social-pinterest"></i>
			<span class="vw-button-label"><?php _e( 'Pinterest', 'envirra' ); ?></span>
		</a>

		<a class="vw-post-share-box-button vw-post-shares-social vw-post-shares-social-gplus" href="<?php echo esc_url( $gplus_url ); ?>" data-post-id="<?php echo esc_attr( $post_id ); ?>" data-share-to="gplus" data-width="500" data-height="475" title="<?php echo esc_attr__( 'Share to Google+', 'envirra' );?>">
			<i class="vw-icon icon-social-gplus"></i>
			<span class="vw-button-label"><?php _e( 'Google+', 'envirra' ); ?></span>
		</a>
	</div>
	<!-- shares end -->



	
	<h3 class="vw-post-comments-title" id="js-comments-title">
		<span>
			<?php comments_number( __( 'leave a comment', 'envirra' ), __('<span>1</span> Comment', 'envirra'), __( '<span>%</span> Comments', 'envirra' ) );?>
		</span>
		<div class="vw-post-comments-title__arrow"></div>
	</h3>
	
	<?php if ( have_comments() ) : ?>
	
		<div class="navigation">
			<div class="next-posts"><?php previous_comments_link() ?></div>
			<div class="prev-posts"><?php next_comments_link() ?></div>
		</div>
	<?php endif; ?>

		<ol class="commentlist clearfix" id="js-comment-list">
			<div id="js-comment-list-inner" class="commentlist__inner">
				<?php wp_list_comments( array( 'before' => ' &mdash; ', 'callback' => 'vw_render_comments' ) ); ?>
				<?php
				
					$req = get_option( 'require_name_email' );
					$aria_req = ( $req ? " aria-required='true'" : '' );

					//Custom Fields
					$fields =  array(
						'author'=> '<div id="respond-inputs" class="clearfix"><p><input name="author" type="text" placeholder="' . esc_attr__( 'Name (required)', 'envirra' ) . '" size="30"' . $aria_req . ' /></p>',
						'email' => '<p><input name="email" type="text" placeholder="' . esc_attr__( 'E-Mail (required)', 'envirra' ) . '" size="30"' . $aria_req . ' /></p>',
						'url' => '<p class="last"><input name="url" type="text" placeholder="' . esc_attr__( 'Website', 'envirra' ) . '" size="30" /></p></div>',
					);

					//Comment Form Args
					$comments_args = array(
						'fields' => $fields,
						'title_reply'=> __('Leave a reply', 'envirra'),
						'comment_field' => '<div id="respond-textarea"><p><textarea id="comment" name="comment" aria-required="true" cols="58" rows="10" tabindex="4"></textarea></p></div>',
						'label_submit' => __('Submit comment','envirra')
					);
					
					// Show Comment Form
					comment_form($comments_args); 
				?>
			</div>
		</ol>

	<?php if ( have_comments() ) : ?>

		<div class="navigation">
			<div class="next-posts"><?php previous_comments_link() ?></div>
			<div class="prev-posts"><?php next_comments_link() ?></div>
		</div>
		
	<?php endif; ?>

</div>
<?php endif; ?>