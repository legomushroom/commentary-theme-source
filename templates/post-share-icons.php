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

$post_url = urlencode( get_permalink() );

?>

<div class="vw-post-share-icons">
	<a class="vw-post-shares-social vw-post-shares-social-facebook" title="<?php esc_attr_e( 'Share to Facebook', 'envirra' ) ?>" href="<?php echo esc_url( $facebook_url ); ?>" data-post-id="<?php echo esc_attr( $post_id ); ?>" data-share-to="facebook" data-width="500" data-height="300"><i class="vw-icon icon-social-facebook"></i></a>
	<a class="vw-post-shares-social vw-post-shares-social-twitter" title="<?php esc_attr_e( 'Share to Twitter', 'envirra' ) ?>" href="<?php echo esc_url( $twitter_url ); ?>" data-post-id="<?php echo esc_attr( $post_id ); ?>" data-share-to="twitter" data-width="500" data-height="300"><i class="vw-icon icon-social-twitter"></i></a>
  <a class="vw-post-shares-social vw-post-shares-social-pinterest" title="<?php esc_attr_e( 'Share by Email', 'envirra' ) ?>" href="mailto:%20?subject=An article I thought you'd find interesting&body=Here it is, on Commentary Magazine: <?php echo $post_url; ?>" target="_top"><i class="vw-icon icon-social-email"></i></a>
	<!-- <a class="vw-post-shares-social vw-post-shares-social-pinterest" title="<?php esc_attr_e( 'Share to Pinterest', 'envirra' ) ?>" href="<?php echo esc_url( $pinterest_url ); ?>" data-post-id="<?php echo esc_attr( $post_id ); ?>" data-share-to="email" data-width="750" data-height="300" target="_top"><i class="vw-icon icon-social-email"></i></a> -->
	<a class="vw-post-shares-social vw-post-shares-social-gplus" title="<?php esc_attr_e( 'Share to Google+', 'envirra' ) ?>" href="<?php echo esc_url( $gplus_url ); ?>" data-post-id="<?php echo esc_attr( $post_id ); ?>" data-share-to="gplus" data-width="500" data-height="475"><i class="vw-icon icon-social-gplus"></i></a>
</div>