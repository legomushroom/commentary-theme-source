<?php

class Intense_Content_Section extends Intense_Shortcode {

  function __construct() {
    parent::__construct();

    global $intense_visions_options;

    $this->title = __( 'Content Section', 'intense' );
    $this->description = __( 'The content section shortcode adds an easily styled section. It is one of the most useful and powerful shortcodes for designing WordPress posts and pages.
      <br><br>
      The content sections can be customized in several ways. With the content section shortcode you can set the: size, height, background (color, image, parallax image, video), paddings and margin, overlay image or gradient, and borders. There are also several ways to direct the user to the next portion of the page using an advance button or advance arrow.', 'intense' );
    $this->category = __( 'Layout', 'intense' );
    $this->show_preview = true; 
    $this->preview_content = __( "Content Section Text", 'intense' );
    $this->is_container = true;
  }

  function shortcode( $atts, $content = null ) {
    global $intense_visions_options;
    extract( shortcode_atts( $this->get_shortcode_defaults( null, $atts ), $atts ) );

    if ( isset( $id ) ) {
      $content_section_id = $id;
    } else {
      $content_section_id = "content-section-" . rand();
    }

    $border_style = null;
    $border_top_style = null;
    $border_right_style = null;
    $border_bottom_style = null;
    $border_left_style = null;
    $navigation_attributes = '';

    if ( isset( $border ) ) $border_style = "border: " . $border . ' !important;';
    if ( isset( $border_top ) ) $border_top_style = "border-top: " . $border_top . ' !important;';
    if ( isset( $border_right ) ) $border_right_style = "border-right: " . $border_right . ' !important;';
    if ( isset( $border_bottom ) ) $border_bottom_style = "border-bottom: " . $border_bottom . ' !important;';
    if ( isset( $border_left ) ) $border_left_style = "border-left: " . $border_left . ' !important;';    

    //handle case where border_top and border_bottom were only used to set width
    if ( empty( $border_style ) && empty( $border_top_style ) && empty( $border_right_style ) && empty( $border_bottom_style ) && empty( $border_left_style ) && ( !empty( $border_top ) || !empty( $border_bottom ) ) ) {
      if ( is_numeric( $border_top ) && $border_top != 0 ) $border_top .= "px";
      if ( is_numeric( $border_bottom ) && $border_bottom != 0 ) $border_bottom .= "px";

      if ( empty( $border_top ) ) $border_top = '0';
      if ( empty( $border_bottom ) ) $border_bottom = '0';

      $border_color = $intense_visions_options['intense_content_box_style']['border-color'];
      $border_style = $intense_visions_options['intense_content_box_style']['border-style'];
      $border = 'border-style:' . $border_style . '; border-top-color:' . $border_color . '; border-bottom-color:' . $border_color . '; border-top-width: ' . $border_top . '; border-bottom-width: ' . $border_bottom  . ';';
    } else {
      $border = $border_style . $border_top_style . $border_right_style . $border_bottom_style . $border_left_style;
    }

    if ( !empty ( $border_radius ) ) {
      $border .= 'border-radius:' . $border_radius . ';';
    }

    if ( $show_advance_arrow && is_numeric( $padding_bottom ) ) {
      $padding_bottom += 30; //height of the arrow
    }

    if ( is_numeric( $margin_top ) && $margin_top != 0 ) $margin_top .= "px";
    if ( is_numeric( $margin_bottom ) && $margin_bottom != 0 ) $margin_bottom .= "px";
    if ( is_numeric( $margin_left ) && $margin_left != 0 ) $margin_left .= "px";
    if ( is_numeric( $margin_right ) && $margin_right != 0 ) $margin_right .= "px";

    if ( is_numeric( $padding_top ) && $padding_top != 0 ) $padding_top .= "px";
    if ( is_numeric( $padding_bottom ) && $padding_bottom != 0 ) $padding_bottom .= "px";
    if ( is_numeric( $padding_left ) && $padding_left != 0 ) $padding_left .= "px";
    if ( is_numeric( $padding_right ) && $padding_right != 0 ) $padding_right .= "px";

    intense_add_script( 'intense.contentsection' );

    if ($show_navigation) {
      intense_add_script( 'jquery.appear' );
      $navigation_attributes  = ' title="' . esc_attr( $title ) . '" data-navigation="true"';
    }

    $background_color = intense_get_plugin_color( $background_color );

    if ( isset( $background_color ) ) $background_color = 'background-color: ' . $background_color . ';';

    if ( is_numeric( $image ) ) {
      $imageid = $image;
    } else if ( !empty( $image ) ) {
      $imageurl = $image;
    }

    if ( !empty( $imageid ) ) {
      $photo = Intense_Photo_Source::get_wordpress_photo( $imageid, $imagesize );
      $photo_url = $photo['url'];
    } else if ( !empty( $imageurl ) ) {
      $photo_url = $imageurl;
    }

    if ( is_numeric( $poster ) ) {
      $poster_id = $poster;
    } else if ( !empty( $poster ) ) {
      $poster_url = $poster;
    }

    if ( !empty( $poster_id ) ) {
      $photo = Intense_Photo_Source::get_wordpress_photo( $poster_id, 'large1600' );
      $poster_url = $photo['url'];
    } else if ( !empty( $poster_url ) ) {
      $poster_url = $poster_url;
    }

    if ( is_numeric( $mp4 ) ) {
      $mp4_id = $mp4;
    } else if ( !empty( $mp4 ) ) {
      $mp4_url = $mp4;
    }

    if ( !empty( $mp4_id ) ) {
      $mp4_url = wp_get_attachment_url( $mp4_id );
    } else if ( !empty( $mp4_url ) ) {
      $mp4_url = $mp4_url;
    }

    if ( is_numeric( $ogv ) ) {
      $ogv_id = $ogv;
    } else if ( !empty( $ogv ) ) {
      $ogv_url = $ogv;
    }

    if ( !empty( $ogv_id ) ) {
      $ogv_url = wp_get_attachment_url( $ogv_id );
    } else if ( !empty( $ogv_url ) ) {
      $ogv_url = $ogv_url;
    }

    if ( is_numeric( $webm ) ) {
      $webm_id = $webm;
    } else if ( !empty( $webm ) ) {
      $webm_url = $webm;
    }

    if ( !empty( $webm_id ) ) {
      $webm_url = wp_get_attachment_url( $webm_id );
    } else if ( !empty( $webm_url ) ) {
      $webm_url = $webm_url;
    }

    if ( is_numeric( $overlay_image ) ) {
      $photo = Intense_Photo_Source::get_wordpress_photo( $overlay_image, 'full' );
      $overlay_image = "url(" . $photo['url'] . ")";
    } else if ( !empty( $overlay_image ) ) {
      $overlay_image = "url(" . $overlay_image . ")";
    } else {
      $overlay_image = '';
      $overlay_bg_image = '';
    }

    if ( $overlay_gradient != '' ) {
      if ( isset( $overlay_gradient_start_color ) ) {
        $overlaystartcolor = intense_get_plugin_color( $overlay_gradient_start_color );
      } else {
        $overlaystartcolor = '#000000';
      }

      if ( isset( $overlay_gradient_end_color ) ) {
        $overlayendcolor = intense_get_plugin_color( $overlay_gradient_end_color );
      } else {
        $overlayendcolor = '#000000';
      }

      if ( !isset( $overlay_gradient_start_opacity ) && !is_numeric( $overlay_gradient_start_opacity ) ) {
        $overlay_gradient_start_opacity = '0';
      }

      if ( !isset( $overlay_gradient_end_opacity ) && !is_numeric( $overlay_gradient_end_opacity ) ) {
        $overlay_gradient_end_opacity = '80';
      }

      $overlay_start_percent = '';
      $overlay_end_percent = '';

      if ( $overlay_gradient == 'radial' ) {
        $overlay_location = 'ellipse';
        $overlay_start_percent = ' 20%';
        $overlay_end_percent = ' 80%';
      } else {
        $overlay_location = 'top';
        $overlay_start_percent = ' 10%';
        $overlay_end_percent = ' 0%';
      }

      if ( $overlay_image != '' ) {
        $overlay_bg_image = 'background-image: ' . $overlay_image . ', -webkit-gradient(' . $overlay_gradient . ', left top, left bottom, from(' . intense_get_rgb_color( $overlaystartcolor, $overlay_gradient_start_opacity ) . '), to(' . intense_get_rgb_color( $overlayendcolor, $overlay_gradient_end_opacity ) . '));';
        $overlay_bg_image .= 'background-image: ' . $overlay_image . ', -webkit-' . $overlay_gradient . '-gradient(' . $overlay_location . ', ' . intense_get_rgb_color( $overlaystartcolor, $overlay_gradient_start_opacity ) . $overlay_start_percent . ', ' . intense_get_rgb_color( $overlayendcolor, $overlay_gradient_end_opacity ) . $overlay_end_percent . ');';
        $overlay_bg_image .= 'background-image: ' . $overlay_image . ', -moz-' . $overlay_gradient . '-gradient(' . $overlay_location . ', ' . intense_get_rgb_color( $overlaystartcolor, $overlay_gradient_start_opacity ) . $overlay_start_percent . ', ' . intense_get_rgb_color( $overlayendcolor, $overlay_gradient_end_opacity ) . $overlay_end_percent . ');';
        $overlay_bg_image .= 'background-image: ' . $overlay_image . ', -ms-' . $overlay_gradient . '-gradient(' . $overlay_location . ', ' . intense_get_rgb_color( $overlaystartcolor, $overlay_gradient_start_opacity ) . $overlay_start_percent . ', ' . intense_get_rgb_color( $overlayendcolor, $overlay_gradient_end_opacity ) . $overlay_end_percent . ');';
        $overlay_bg_image .= 'background-image: ' . $overlay_image . ', -o-' . $overlay_gradient . '-gradient(' . $overlay_location . ', ' . intense_get_rgb_color( $overlaystartcolor, $overlay_gradient_start_opacity ) . $overlay_start_percent . ', ' . intense_get_rgb_color( $overlayendcolor, $overlay_gradient_end_opacity ) . $overlay_end_percent . ');';
        $overlay_bg_image .= 'background-image: ' . $overlay_image . ', ' . $overlay_gradient . '-gradient(to bottom, ' . intense_get_rgb_color( $overlaystartcolor, $overlay_gradient_start_opacity ) . ', ' . intense_get_rgb_color( $overlayendcolor, $overlay_gradient_end_opacity ) . ');';

      } else {
        $overlay_bg_image = 'background-image: -webkit-gradient(' . $overlay_gradient . ', left top, left bottom, from(' . intense_get_rgb_color( $overlaystartcolor, $overlay_gradient_start_opacity ) . '), to(' . intense_get_rgb_color( $overlayendcolor, $overlay_gradient_end_opacity ) . '));';
        $overlay_bg_image .= 'background-image: -webkit-' . $overlay_gradient . '-gradient(' . $overlay_location . ', ' . intense_get_rgb_color( $overlaystartcolor, $overlay_gradient_start_opacity ) . $overlay_start_percent . ', ' . intense_get_rgb_color( $overlayendcolor, $overlay_gradient_end_opacity ) . $overlay_end_percent . ');';
        $overlay_bg_image .= 'background-image: -moz-' . $overlay_gradient . '-gradient(' . $overlay_location . ', ' . intense_get_rgb_color( $overlaystartcolor, $overlay_gradient_start_opacity ) . $overlay_start_percent . ', ' . intense_get_rgb_color( $overlayendcolor, $overlay_gradient_end_opacity ) . $overlay_end_percent . ');';
        $overlay_bg_image .= 'background-image: -ms-' . $overlay_gradient . '-gradient(' . $overlay_location . ', ' . intense_get_rgb_color( $overlaystartcolor, $overlay_gradient_start_opacity ) . $overlay_start_percent . ', ' . intense_get_rgb_color( $overlayendcolor, $overlay_gradient_end_opacity ) . $overlay_end_percent . ');';
        $overlay_bg_image .= 'background-image: -o-' . $overlay_gradient . '-gradient(' . $overlay_location . ', ' . intense_get_rgb_color( $overlaystartcolor, $overlay_gradient_start_opacity ) . $overlay_start_percent . ', ' . intense_get_rgb_color( $overlayendcolor, $overlay_gradient_end_opacity ) . $overlay_end_percent . ');';
        $overlay_bg_image .= 'background-image: ' . $overlay_gradient . '-gradient(to bottom, ' . intense_get_rgb_color( $overlaystartcolor, $overlay_gradient_start_opacity ) . ', ' . intense_get_rgb_color( $overlayendcolor, $overlay_gradient_end_opacity ) . ');';
      }
    } else {
      if ( $overlay_image != '' ) {
        $overlay_bg_image = 'background-image: ' . $overlay_image . ';';
      }
    }

    if ( isset( $overlay_color ) ) {
      $overlaycolor = intense_get_plugin_color( $overlay_color );
    }

    if ( isset( $overlay_opacity ) && isset( $overlaycolor) && strlen( $overlaycolor ) > 0 ) {
      $overlay_style = "background-color: " . intense_get_rgb_color( $overlaycolor, $overlay_opacity ) . ";";
    } else if ( isset( $overlay_opacity) && $overlay_opacity != "100" ) {      
      $overlay_style = ' opacity: 0.' . $overlay_opacity . ';';
    } else {
      $overlay_style = '';
    }


    $background_image = "";
    $parallax_image = "";

    $output = "";
    $bgvideo = "";
    $advance = "";
    $advance_target = '';
    $extra_class = "";
    $advance_arrow = '';
    $data_attributes = '';
    $volume_button = '';
    $play_button = '';
    $restart_button = '';
    $video_buttons = '';
    $random = rand();
    $button_style = '';
    $horizontal = intense_coalesce( $image_horizontal_position, '0px' );

    if ( isset( $photo_url ) ) {
      if ( $imagemode == 'parallax' ) {
        intense_add_script( "skrollr" );
        $start_location = -160 * ( 1 / $speed );
        $end_location = 80 * ( 1 / $speed );
        $extra_class = "parallax";
        $parallax_image = " data-anchor-target='#" . $content_section_id . "' data-bottom-top='background-position: " . $horizontal . " " . $end_location . "px;' data--1000-top='background-position: " . $horizontal . " " . $start_location . "px;'";
        $background_image .= " background-image: url($photo_url); background-size: cover; background-position: 50% 50%; background-attachment: fixed; ";
        $speed = ' data-speed="' . $speed . '"';
      } else if ( $imagemode == 'repeat-x' ) {
          $background_image .= " background-image: url($photo_url); background-repeat: repeat-x; background-size: auto auto; ";
        } else if ( $imagemode == 'repeat-y' ) {
          $background_image .= " background-image: url($photo_url); background-repeat: repeat-y; background-size: auto auto; ";
        } else if ( $imagemode == 'repeat' ) {
          $background_image .= " background-image: url($photo_url); background-repeat: repeat; background-size: auto auto; ";
        } else if ( $imagemode == 'full' ) {
          $background_image .= " background-image: url($photo_url); background-size: cover; background-position: " . $background_image_position . "; ";
        } else if ( $imagemode == 'fixed' ) {
          $extra_class = 'fixed';
          $background_image .= " background-image: url($photo_url); background-size: cover; background-position: 50% 50%; background-attachment: fixed; ";
        }
    } else if ( isset( $poster_url ) ) {
      intense_add_script( "videoBG" );

      $extra_class .= ' video-background';

      $bgvideo = "<script>
      jQuery(function($) {
        $('#" . $content_section_id . "').videoBG({
          scale:true,
          zIndex:0,
          position: 'static', " .
        ( isset( $mp4_url ) ? "mp4: '" . $mp4_url . "'," : "" ) .
        ( isset( $ogv_url ) ? "ogv: '" . $ogv_url . "'," : "" ) .
        ( isset( $webm_url ) ? "webm: '" . $webm_url . "'," : "" ) .
        "poster: '" . $poster_url . "'
        });
      });
      </script>";
    } else if ( isset( $video ) ) {
      intense_add_script( "okvideo" );
      $extra_class .= ' video-background';
      $data_attributes .= ' data-video-id="' . $video . '"';
      $data_attributes .= ' data-video-volume="' . $volume . '"';
      $data_attributes .= ' data-video-autoplay="' . $autoplay . '"';

      if ( $volumebutton ) {
        $volume_button = intense_run_shortcode( 'intense_button', array( 'color' => $button_color, 'font_color' => $button_font_color, 'title' => 'Volume On/Off', 'link' => '#', 'icon' => ( $volume > 0 ? 'volume-up' : 'volume-off' ), 'border_radius' => '3px', 'id' => $content_section_id . '-volume', 'class' => $content_section_id . '-volume', 'padding_top' => '10', 'padding_bottom' => '10', 'padding_left' => '20', 'padding_right' => '20' ), '' );
      }

      if ( $playbutton ) {
        $play_button = intense_run_shortcode( 'intense_button', array( 'color' => $button_color, 'font_color' => $button_font_color, 'title' => ( $autoplay == 0 ? 'Play' : 'Pause' ), 'link' => '#', 'icon' => ( $autoplay == 0 ? 'play' : 'pause' ), 'border_radius' => '3px', 'id' => $content_section_id . '-pause', 'class' => $content_section_id . '-pause', 'padding_top' => '10', 'padding_bottom' => '10', 'padding_left' => '20', 'padding_right' => '20' ), '' );
      }

      if ( $restartbutton ) {
        $restart_button = intense_run_shortcode( 'intense_button', array( 'color' => $button_color, 'font_color' => $button_font_color, 'title' => 'Restart', 'link' => '#', 'icon' => 'refresh', 'border_radius' => '3px', 'id' => $content_section_id . '-refresh', 'class' => $content_section_id . '-refresh', 'padding_top' => '10', 'padding_bottom' => '10', 'padding_left' => '20', 'padding_right' => '20' ), '' );
      }

      if ( $volumebutton || $playbutton || $restartbutton ) {
        if ( $button_position == 'bottomright' || $button_position == 'topright' ) {
          $button_style = ' style="float: right; margin:10px; position:absolute;"';
        } elseif ( $button_position == 'bottomcenter' || $button_position == 'topcenter' ) {
          $button_style = ' style="text-align:center; margin:10px auto; position:absolute;"';
        } else {
          $button_style = ' style="margin:10px; position:absolute;"';
        }

        $video_buttons = '<div id="' . $content_section_id . '-buttons"' . $button_style . ' class="videoButtons ' . $button_position . '">' . $restart_button . ' ' . $play_button . ' ' . $volume_button . '</div>';
      }
    }

    if ( $size == 'partial' ) {
      $extra_class .= ' partial';
      $output .= '<div class="intense container' . ( isset( $box_class ) ? " $box_class" : '' ) . '">';
    } else {
      if ( $breakout ) {
        $extra_class .= ' breakout';
      }

      if ( $full_height ) {
        $extra_class .= ' full-height';
      }
    }

    if ( $show_advance ) {
      if ( !isset( $advance_target_id ) ) {
        $advance_target_id = "content-section-advance-" . rand();
        $advance_target = '<div id="' . $advance_target_id . '" style="height: 0px;"></div>';
      }

      $advance_color= intense_get_plugin_color( $advance_color );

      $advance = '<div class="advance-button">' .
        intense_run_shortcode( 'intense_button', array( 'size' => $advance_size, 'color' => $advance_color, 'link' => '#' . $advance_target_id , 'icon_source' => $advance_icon_source, 'icon' => $advance_icon, 'icon_position' => $advance_icon_position ), $advance_text ) .         
        '</div>';
    }

    if ( $show_advance_arrow ) {
      $advance_arrow_background_color = intense_get_plugin_color( $advance_arrow_background_color );

      $advance_position_left = '';
      $advance_position_right = '';

      if ( $advance_arrow_position != '50' ) {
        $advance_position_left = 'width: ' . $advance_arrow_position . '.25%';
        $advance_position_right = 'width: ' . ( 100 - $advance_arrow_position ) . '.25%';
      }

      $advance_arrow = '<div class="advance-arrow">
        <div class="advance-arrow-left" style="' . ( !empty( $advance_arrow_background_color ) ?  'border-bottom-color: ' . $advance_arrow_background_color . ';' : '' ) . $advance_position_left . '"></div>
        <div class="advance-arrow-right" style="' . ( !empty( $advance_arrow_background_color ) ?  'border-bottom-color: ' . $advance_arrow_background_color . ';' : '' ) . $advance_position_right . '"></div>
      </div>';
    }

    if ( isset( $height_adjustment ) ) {
      $height_adjustment = ' data-height-adjustment="' . $height_adjustment . '"';
    }

    $output .= '<section id="' . $content_section_id . '"' . $navigation_attributes . ' class="intense content-section ' . $extra_class . ( !empty( $class ) ? ' ' . $class : '' ) . '"' . $parallax_image . $height_adjustment . $speed . ' style="' . ( isset( $height ) ? 'height:' . $height . 'px; ' : '' ) . ' ' . $background_color . $border . ' margin-bottom: ' . $margin_bottom . '; margin-top: ' . $margin_top . '; margin-left: ' . $margin_left . '; margin-right: ' . $margin_right . '; ' . $background_image . ' padding-top: ' . $padding_top . '; padding-bottom:' . $padding_bottom . '; padding-left: ' . $padding_left . '; padding-right:' . $padding_right . ';"' . $data_attributes . '>';

    if ( !empty( $top_divider_type ) ) {
      $output .= intense_run_shortcode('intense_divider', array(
        'type' => $top_divider_type,
        'location' => 'top',
        'primary_color' => $top_divider_primary_color,
        'secondary_color' => $top_divider_secondary_color,
        'tertiary_color' => $top_divider_tertiary_color,
      ));  
    }

    if ( $size == 'fullboxed' ) {
      $output .= '<div class="intense container ' . ( isset( $box_class ) ? " $box_class" : '' ) . '">';
      $output .= $video_buttons;
    } else {
      $output .= $video_buttons;
    }

    $output .= do_shortcode( $content );

    if ( $size == 'fullboxed' ) {
      $output .= '</div>';
    }

    $output .= '<div class="overlay-background" style="position: absolute; ' . $overlay_bg_image . $overlay_style . ' top: 0;left: 0;z-index: -1;right: 0;bottom: 0;"></div>';

    $output .= $bgvideo;
    $output .= $advance;
    $output .= $advance_arrow;

    if ( !empty( $bottom_divider_type ) ) {
      $output .= intense_run_shortcode('intense_divider', array(
        'type' => $bottom_divider_type,
        'location' => 'bottom',
        'primary_color' => $bottom_divider_primary_color,
        'secondary_color' => $bottom_divider_secondary_color,
        'tertiary_color' => $bottom_divider_tertiary_color,
      ));  
    }

    $output .= '</section>';


    if ( $size == 'partial' ) {
      $output .= '</div>';
    }

    $output .= $advance_target;

    return do_shortcode( $output );
  }
}
