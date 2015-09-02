<?php

add_action( 'widgets_init', 'vw_widgets_init_bundle_progress' );
if ( ! function_exists( 'vw_widgets_init_bundle_progress' ) ) {
	function vw_widgets_init_bundle_progress() {
		register_widget( 'Vw_widget_bundle_progress' );
	}
}

if ( ! class_exists( 'Vw_widget_bundle_progress' ) ) {
	class Vw_widget_bundle_progress extends WP_Widget {

		private $default = array(
			'title' => '',
			'posts' => ''
		);

		public function __construct() {
			// widget actual processes
			parent::__construct(
		 		'vw_widget_bundle_progress', // Base ID
				VW_THEME_NAME.': Bundle progress', // Name
				array( 'description' => 'makes a post to be 5x bundle and adds progress tracking widget' ) // Args
			);
		}

		function widget( $args, $instance ) {
			$useragent=$_SERVER['HTTP_USER_AGENT'];
			if (preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4))) {
				return;
			}
			global $wp_roles;
			extract($args);

			if ( function_exists( 'icl_t' ) ) {
				$instance['title'] = icl_t( VW_THEME_NAME.' Widget', $this->id.'_title', $instance['title'] );
			}

			// $instance = wp_parse_args( (array) $instance, $this->default );
			// if ( ! array_key_exists( $instance['role'], $wp_roles->roles ) ) {
			// 	$instance['role'] = $this->default['role'];
			// }

			$post_ids = $this->get_bundle_post_ids( $instance );
			$title_html = $this->get_bundle_title( $instance );

			echo $before_widget;

			if ( ! empty( $title_html ) ) echo $before_title . $title_html . $after_title;

			$post_type = get_post_type();

			update_option("wv_bundle_progress_posts_" . $post_type, implode( ',', $post_ids ) );

			// array_unshift($post_ids, get_the_ID());

			update_option("wv_bundle_progress_title_" . $post_type, $title_html);

			// $myposts = get_posts( apply_filters( 'vw_filter_widget_bundle_progress_query', array('post__in' => $post_ids, 'orderby' => 'post__in', 'post_type' => array('post', 'cmm_article'), 'post_status' => 'any' ) ) );

			echo '<ul class="vw-bundle-progress"><div id="js-bundle-progress"></div></ul>';
				// $i = 0;
				// foreach( $myposts as $post ):
				// 	setup_postdata( $post );
				// 	$post_link = get_permalink($post->ID);
				// 	echo '<li class="vw-bundle-progress__item js-bundle-progress-item" data-url="' . $post_link . '" data-index="' . $i . '" data-name="' . ($post->post_title) . '">';
				// 		echo '<div class="vw-bundle-progress__number font-header">' . ($i+1) . '</div>';
				// 		echo '<div class="js-bundle-progress-progressbar vw-bundle-progress__progressbar"></div>';
				// 		echo '<h4 class="vw-bundle-progress__title"><a href="' . $post_link . '">'  . $post->post_title . '</a></h4>';
				// 		echo '<div class="vw-post-meta vw-post-meta-large1">';
				// 			vw_the_author();
				// 		echo '</div>';
				// 		// echo '<h5 class="vw-bundle-progress__author"><em> by <a href="' . get_author_posts_url(get_the_author_meta( 'ID' )) . '">' . get_the_author() . '</a></em></h5>';
				// 	echo '</li>';
				// 	$i++;
				// endforeach;
			echo '';

			// wp_reset_postdata();
			echo $after_widget;
		}

		function update( $new_instance, $old_instance ) {
			$instance = $old_instance;
			$new_instance = wp_parse_args( (array) $new_instance, $this->default );
			$instance['title'] = wp_kses_data( $new_instance['title'] );
			$instance['posts'] = $new_instance['posts'];
			// $instance['role'] = strip_tags( $new_instance['role'] );

			if ( function_exists( 'icl_register_string' ) ) {
				icl_register_string( VW_THEME_NAME.' Widget', $this->id.'_title', $instance['title'] );
			}

			// Update posts in option
			$post_ids = $this->get_bundle_post_ids( $instance );

			$post_type = 'post';

			if ( ! empty( $_POST['sidebar'] ) && 'article-sidebar' == $_POST['sidebar'] ) {
				$post_type = 'cmm_article';
			}

			update_option("wv_bundle_progress_posts_" . $post_type, implode( ',', $post_ids ) );

			// Update title in option
			$title_html = $this->get_bundle_title( $instance );

			update_option("wv_bundle_progress_title_" . $post_type, $title_html);


			return $instance;
		}

		public function get_bundle_post_ids( $instance ) {

			if ( empty( $instance['posts'] ) ) {
				return array();
			}

			$ids = explode( ',', $instance['posts'] );
			$ids = array_map( 'absint', $ids );
			$ids = array_filter( $ids );

			return $ids;

		}

		public function get_bundle_title( $instance ) {

			$title_html = '';

			if ( ! empty( $instance['title'] ) ) {
				$title_html = apply_filters( 'widget_title', wp_kses_data( $instance['title'] ), $instance, $this->id_base);
			}

			return $title_html;

		}

		function form( $instance ) {
			global $wp_roles;

			$instance = wp_parse_args( (array) $instance, $this->default );

			$title = $instance['title'];
			// $role = strip_tags( $instance['role'] );
			$posts = $instance['posts'];
			?>

			<!-- title -->
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id('title') ); ?>">Title:</label>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id('title') ); ?>" name="<?php echo esc_attr( $this->get_field_name('title') ); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
			</p>

			<!-- role -->
<!-- 			<p>
				<label for="<?php echo esc_attr( $this->get_field_id('role') ); ?>">Author Role:</label>
				<select id="<?php echo esc_attr( $this->get_field_id('role') ); ?>" name="<?php echo esc_attr( $this->get_field_name('role') ); ?>">
					<option value="">All</option>
					<?php foreach ( $wp_roles->roles as $slug => $role_data ) : ?>
					<option value="<?php echo esc_attr( $slug ); ?>" <?php selected( $role, $slug ); ?>><?php echo $role_data['name']; ?></option>
				<?php endforeach; ?>
				</select>
			</p>
 -->
			<!-- posts -->
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id('posts') ); ?>">Posts to show:</label>
				<input id="<?php echo esc_attr( $this->get_field_id('posts') ); ?>" name="<?php echo esc_attr( $this->get_field_name('posts') ); ?>" type="text" value="<?php echo esc_attr( $posts ); ?>" class="widefat">
			</p>

			<?php
		}
	}
}
