<?php
/**
 * Includes the inline css
 * 
 * @package Digital Newspaper
 * @since 1.0.0
 */
use Digital_Newspaper\CustomizerDefault as DN;
if( ! function_exists( 'digital_newspaper_assign_preset_var' ) ) :
   /**
   * Generate css code for top header color options
   *
   * @package Digital Newspaper
   * @since 1.0.0 
   */
   function digital_newspaper_assign_preset_var( $selector, $control) {
         $decoded_control =  DN\digital_newspaper_get_customizer_option( $control );
         if( ! $decoded_control ) return;
         echo " body.digital_newspaper_font_typography{ " . $selector . ": ".digital_newspaper_get_color_format( $decoded_control ).  ";}\n";
   }
endif;

if( ! function_exists( 'digital_newspaper_assign_var' ) ) :
   /**
   * Generate css code for top header color options
   *
   * @package Digital Newspaper
   * @since 1.0.0 
   */
   function digital_newspaper_assign_var( $selector, $control) {
         $decoded_control =  json_decode(DN\digital_newspaper_get_customizer_option( $control ),true);
         if( ! $decoded_control[$decoded_control['type']] ) return;
         echo " body.digital_newspaper_font_typography{ " . $selector . ": ".digital_newspaper_get_color_format($decoded_control[$decoded_control['type']]).  ";}\n";
   }
endif;

if( ! function_exists( 'digital_newspaper_get_background_style' ) ) :
/**
 * Generate css code for background control.
*
* @package Digital Newspaper
* @since 1.0.0 
*/
function digital_newspaper_get_background_style( $selector, $control, $var = '' ) {
   $decoded_control = json_decode( DN\digital_newspaper_get_customizer_option( $control ), true );
   if( ! $decoded_control ) return;
   if( isset( $decoded_control['type'] ) ) :
      $type = $decoded_control['type'];
      switch( $type ) {
         case 'image' : if( isset( $decoded_control[$type]['media_id'] ) ) echo $selector . " { background-image: url(" .esc_url( wp_get_attachment_url( $decoded_control[$type]['media_id'] ) ). ") }";
               if( isset( $decoded_control['repeat'] ) ) echo $selector . "{ background-repeat: " .esc_html( $decoded_control['repeat'] ). "}";
               if( isset( $decoded_control['position'] ) ) echo $selector . "{ background-position:" .esc_html( $decoded_control['position'] ). "}";
               if( isset( $decoded_control['attachment'] ) ) echo $selector . "{ background-attachment: " .esc_html( $decoded_control['attachment'] ). "}";
               if( isset( $decoded_control['size'] ) ) echo $selector . "{ background-size: " .esc_html( $decoded_control['size'] ). "}";
            break;
         default: if( isset( $decoded_control[$type] ) ) echo $selector . "{ background: " .digital_newspaper_get_color_format( $decoded_control[$type] ). "}";
      }
   endif;
}
endif;

if( ! function_exists( 'digital_newspaper_get_background_style_var' ) ) :
/**
 * Generate css code for background control.
*
* @package Digital Newspaper
* @since 1.0.0 
*/
function digital_newspaper_get_background_style_var( $selector, $control) {
   $decoded_control = json_decode( DN\digital_newspaper_get_customizer_option( $control ), true );
   if( ! $decoded_control ) return;
   if( isset( $decoded_control['type'] ) ) :
      $type = $decoded_control['type'];
      if( isset( $decoded_control[$type] ) ) echo ".digital_newspaper_main_body { ".$selector.": " .digital_newspaper_get_color_format( $decoded_control[$type] ). "}";
   endif;
}
endif;

if( ! function_exists( 'digital_newspaper_get_background_style_responsive' ) ) :
/**
 * Generate css code for background control.
*
* @package Digital Newspaper
* @since 1.0.0 
*/
function digital_newspaper_get_background_style_responsive( $selector, $control, $var = '' ) {
   $decoded_control = json_decode( DN\digital_newspaper_get_customizer_option( $control ), true );
   if( ! $decoded_control ) return;
   if( isset( $decoded_control['type'] ) ) :
      $type = $decoded_control['type'];
      switch( $type ) {
         case 'image' : if( isset( $decoded_control[$type]['media_id'] ) ) echo $selector . " { background-image: url(" .esc_url( wp_get_attachment_url( $decoded_control[$type]['media_id'] ) ). ") }";
               if( isset( $decoded_control['repeat'] ) ) echo $selector . "{ background-repeat: " .esc_html( $decoded_control['repeat'] ). "}";
               if( isset( $decoded_control['position'] ) ) echo $selector . "{ background-position:" .esc_html( $decoded_control['position'] ). "}";
               if( isset( $decoded_control['attachment'] ) ) echo $selector . "{ background-attachment: " .esc_html( $decoded_control['attachment'] ). "}";
               if( isset( $decoded_control['size'] ) ) echo $selector . "{ background-size: " .esc_html( $decoded_control['size'] ). "}";
            break;
         default: if( isset( $decoded_control[$type] ) ) echo "@media(max-width: 768px){ ". $selector . "{ background: " .digital_newspaper_get_color_format( $decoded_control[$type] ). "} }";
      }
   endif;
}
endif;

if( ! function_exists( 'digital_newspaper_get_responsive_spacing_style' ) ) :
/**
 * Generate css code for spacing control.
*
* @package Digital Newspaper
* @since 1.0.0 
*/
function digital_newspaper_get_responsive_spacing_style( $selector, $control, $property = 'margin') {
   $decoded_control = DN\digital_newspaper_get_customizer_option( $control );
   if( ! $decoded_control ) return;
   if( isset( $decoded_control['desktop'] ) ) :
      $desktop = $decoded_control['desktop'];
      echo $selector . "{ " . esc_html( $property ). ": ".esc_html( implode( " ", $desktop ) ).  "; }";
   endif;

   if( isset( $decoded_control['tablet'] ) ) :
      $desktop = $decoded_control['tablet'];
      echo "@media(max-width: 940px) { " .$selector . "{ " . esc_html( $property ). ": ".esc_html( implode( " ", $desktop ) ).  "; } }\n";
   endif;

   if( isset( $decoded_control['smartphone'] ) ) :
      $desktop = $decoded_control['smartphone'];
      echo "@media(max-width: 610px) { " .$selector . "{ " . esc_html( $property ). ": ".esc_html( implode( " ", $desktop ) ).  "; } }\n";
   endif;
   }
endif;

if( ! function_exists( 'digital_newspaper_get_typo_style' ) ) :
   /**
   * Generate css code for typography control.
   *
   * @package Digital Newspaper
   * @since 1.0.0 
   */
   function digital_newspaper_get_typo_style( $selector, $control ) {
      $decoded_control = DN\digital_newspaper_get_customizer_option( $control );
      if( ! $decoded_control ) return;
      if( isset( $decoded_control['font_family'] ) ) :
         echo ".digital_newspaper_font_typography { ".$selector."-family : " .esc_html( $decoded_control['font_family']['value'] ).  "; }\n";
      endif;

      if( isset( $decoded_control['font_weight'] ) ) :
         echo ".digital_newspaper_font_typography { ".$selector."-weight : " .esc_html( $decoded_control['font_weight']['value'] ).  "; }\n";
      endif;

      if( isset( $decoded_control['text_transform'] ) ) :
         echo ".digital_newspaper_font_typography { ".$selector."-texttransform : " .esc_html( $decoded_control['text_transform'] ).  "; }\n";
      endif;

      if( isset( $decoded_control['text_decoration'] ) ) :
         echo ".digital_newspaper_font_typography { ".$selector."-textdecoration : " .esc_html( $decoded_control['text_decoration'] ).  "; }\n";
      endif;

      if( isset( $decoded_control['font_size'] ) ) :
         if( isset( $decoded_control['font_size']['desktop'] ) ) echo ".digital_newspaper_font_typography { ".$selector."-size : " .absint( $decoded_control['font_size']['desktop'] ).  "px; }\n";
         if( isset( $decoded_control['font_size']['tablet'] ) ) echo ".digital_newspaper_font_typography { ".$selector."-size-tab : " .absint( $decoded_control['font_size']['tablet'] ).  "px; }\n";
         if( isset( $decoded_control['font_size']['smartphone'] ) ) echo ".digital_newspaper_font_typography { ".$selector."-size-mobile : " .absint( $decoded_control['font_size']['smartphone'] ).  "px; }\n";
      endif;
      if( isset( $decoded_control['line_height'] ) ) :
         if( isset( $decoded_control['line_height']['desktop'] ) ) echo ".digital_newspaper_font_typography { ".$selector."-lineheight : " .absint( $decoded_control['line_height']['desktop'] ).  "px; }\n";
         if( isset( $decoded_control['line_height']['tablet'] ) ) echo ".digital_newspaper_font_typography { ".$selector."-lineheight-tab : " .absint( $decoded_control['line_height']['tablet'] ).  "px; }\n";
         if( isset( $decoded_control['line_height']['smartphone'] ) ) echo ".digital_newspaper_font_typography { ".$selector."-lineheight-mobile : " .absint( $decoded_control['line_height']['smartphone'] ).  "px; }\n";
      endif;
      if( isset( $decoded_control['letter_spacing'] ) ) :
         if( isset( $decoded_control['letter_spacing']['desktop'] ) ) echo ".digital_newspaper_font_typography { ".$selector."-letterspacing : " .absint( $decoded_control['letter_spacing']['desktop'] ).  "px; }\n";
         if( isset( $decoded_control['letter_spacing']['tablet'] ) ) echo ".digital_newspaper_font_typography { ".$selector."-letterspacing-tab : " .absint( $decoded_control['letter_spacing']['tablet'] ).  "px; }\n";
         if( isset( $decoded_control['letter_spacing']['smartphone'] ) ) echo ".digital_newspaper_font_typography { ".$selector."-letterspacing-mobile : " .absint( $decoded_control['letter_spacing']['smartphone'] ).  "px; }\n";
      endif;
   }
endif;

/** site logo width **/
if( ! function_exists( 'digital_newspaper_site_logo_width_fnc' ) ) :
   /**
   * Generate css code for Logo Width
   *
   * @package Digital Newspaper
   * @since 1.0.0 
   */
   function digital_newspaper_site_logo_width_fnc( $selector, $control, $property = 'width'  ) {
      $decoded_control = DN\digital_newspaper_get_customizer_option( $control );
      if( ! $decoded_control ) return;
      if( isset( $decoded_control['desktop'] ) ) :
         $desktop = $decoded_control['desktop'];
         echo $selector . "{ " . esc_html( $property ). ": ".esc_html( $desktop ).  "px; }";
         endif;
         if( isset( $decoded_control['tablet'] ) ) :
         $tablet = $decoded_control['tablet'];
         echo "@media(max-width: 940px) { " .$selector . "{ " . esc_html( $property ). ": ".esc_html( $tablet ).  "px; } }\n";
         endif;
         if( isset( $decoded_control['smartphone'] ) ) :
         $smartphone = $decoded_control['smartphone'];
         echo "@media(max-width: 610px) { " .$selector . "{ " . esc_html( $property ). ": ".esc_html($smartphone).  "px; } }\n";
      endif;
   }
endif;

if( ! function_exists( 'digital_newspaper_top_border_color' ) ) :
/**
 * Generate css code for top header color options
   *
   * @package Digital Newspaper
   * @since 1.0.0 
   */
   function digital_newspaper_top_border_color( $selector, $control, $property = 'border-color' ) {
      $decoded_control = json_decode( DN\digital_newspaper_get_customizer_option( $control ), true );
      if( ! $decoded_control ) return;
      if( isset( $decoded_control['type'] ) ) :
         $type = $decoded_control['type'];
         if( isset( $decoded_control[$type] ) ) echo $selector . "{ " . esc_html( $property ). ": ".esc_html( $decoded_control[$type] ).  "}";
         if($type == 'solid'){
            echo $selector . "{ border-color: ". digital_newspaper_get_color_format( $decoded_control[$type] ) .";}";
            echo $selector . " li{ border-color: ". digital_newspaper_get_color_format( $decoded_control[$type] ) .";}";
         }
         if($type == 'gradient'){
            echo $selector . " li{ border: none;}";
         }
      endif;
   }
endif;

if( ! function_exists( 'digital_newspaper_color_options_one' ) ) :
   /**
   * Generate css code for Top header Text Color
   *
   * @package Digital Newspaper
   * @since 1.0.0 
   */
   function digital_newspaper_color_options_one( $selector, $control, $property = 'color' ) {
         $decoded_control =  DN\digital_newspaper_get_customizer_option( $control );
         if( ! $decoded_control ) return;
         echo $selector . " { " . esc_html( $property ). ": ".digital_newspaper_get_color_format($decoded_control ).  " }";
   }
endif;
//menu color and hover
// header color(no-img)
if( ! function_exists( 'digital_newspaper_menu_text_color' ) ) :
   /**
   * Generate css code for top header color options
   *
   * @package Digital Newspaper
   * @since 1.0.0 
   */
   function digital_newspaper_text_color_var( $selector, $control) {
      $decoded_control =  DN\digital_newspaper_get_customizer_option( $control );
      if( ! $decoded_control ) return;
      if( isset( $decoded_control['color'] ) ) :
         $color = $decoded_control['color'];
         echo ".digital_newspaper_font_typography  { " . $selector . ": ".digital_newspaper_get_color_format($color).  ";}";
      endif;
      if( isset( $decoded_control['hover'] ) ) :
         $color_hover = $decoded_control['hover'];
         echo ".digital_newspaper_font_typography  { " . $selector . "-hover : ".digital_newspaper_get_color_format($color_hover).  "; }";
      endif;
   }
endif;

// Visibility function
if(! function_exists('digital_newspaper_visibility_options')):
   /**
 * Generate css code for top header color options
   *
   * @package Digital Newspaper
   * @since 1.0.0 
   */
   function digital_newspaper_visibility_options( $selector, $control ) {
   $decoded_control =  DN\digital_newspaper_get_customizer_option( $control );
      if( ! $decoded_control ) return;

      if( isset( $decoded_control['desktop'] ) ) :
         if($decoded_control['desktop'] == false) echo $selector . "{ display : none;}";
      endif;

      if( isset( $decoded_control['tablet'] ) ) :
      if($decoded_control['tablet'] == false) echo "@media(max-width: 940px) and (min-width:611px) { " .$selector . "{ display : none;} }";
      endif;

      if( isset( $decoded_control['mobile'] ) ) :
      if($decoded_control['mobile'] == false) { 
         echo "@media(max-width: 610px) { " .$selector . "{ display : none;} }";
      }if($decoded_control['mobile'] == true){
         echo "@media(max-width: 610px) { " .$selector . "{ display : block;} }";
      }
      endif;
   }
endif;

/* move to top */
if( ! function_exists( 'digital_newspaper_border_option' ) ) :
   /**
   * Generate css code for Top header Text Color
   *
   * @package Digital Newspaper
   * @since 1.0.0 
   */
   function digital_newspaper_border_option( $selector, $control, $property="border" ) {
      $decoded_control = DN\digital_newspaper_get_customizer_option( $control );
      if( ! $decoded_control ) return;
      if( isset( $decoded_control['type'] ) || isset( $decoded_control['width'] ) || isset( $decoded_control['color'] ) ) :
      echo $selector. "{ ".$property.": ". $decoded_control['width'] ."px ".$decoded_control['type']." ". digital_newspaper_get_color_format($decoded_control['color']) .";}";
      endif;
   }
endif;

//Theme color
if( ! function_exists( 'digital_newspaper_theme_color' ) ) :
/**
 * Generate css code for top header color options
   *
   * @package Digital Newspaper
   * @since 1.0.0 
   */
   function digital_newspaper_theme_color( $selector, $control) {
      $decoded_control =  DN\digital_newspaper_get_customizer_option( $control );
      if( ! $decoded_control ) return;
      echo " body.digital_newspaper_main_body{ " . $selector . ": ".digital_newspaper_get_color_format($decoded_control).  ";}";
      echo " body.digital_newspaper_dark_mode{ " . $selector . ": ".digital_newspaper_get_color_format($decoded_control).  ";}";
   }
endif;

/** padding **/
if( ! function_exists( 'digital_newspaper_header_padding' ) ) :
   /**
   * Generate css code for Top header Text Color
   *
   * @package Digital Newspaper
   * @since 1.0.0 
   */
   function digital_newspaper_header_padding( $selector, $control ) {
         $decoded_control = DN\digital_newspaper_get_customizer_option( $control );
         if( ! $decoded_control ) return;

         if( isset( $decoded_control['desktop'] ) ):
         echo ".digital_newspaper_font_typography { ".$selector.": ". $decoded_control['desktop'] ."px;}";
         endif;

         if( isset( $decoded_control['tablet'] ) ):
         echo " .digital_newspaper_font_typography { ".$selector."-tablet: ". $decoded_control['tablet'] ."px;}";
         endif;

         if( isset( $decoded_control['smartphone'] ) ):
         echo " .digital_newspaper_font_typography { ".$selector."-smartphone: ". $decoded_control['smartphone'] ."px;}";
         endif;
   }
endif;

if( ! function_exists( 'digital_newspaper_font_size_style' ) ) :
   /**
    * Generates css code for font size
   *
   * @package Digital Newspaper
   * @since 1.0.0
   */
   function digital_newspaper_font_size_style( $selector, $control ) {
      $decoded_control = DN\digital_newspaper_get_customizer_option( $control );
      if( ! $decoded_control ) return;
      if( isset( $decoded_control['desktop'] ) ) :
         $desktop = $decoded_control['desktop'];
         echo "body.digital_newspaper_main_body{ " . $selector . ": ".esc_html( $desktop ).  "px;}\n";
      endif;
      if( isset( $decoded_control['tablet'] ) ) :
         $tablet = $decoded_control['tablet'];
         echo "body.digital_newspaper_main_body{ " . $selector . "-tablet: ".esc_html( $tablet ).  "px;}\n";
      endif;
      if( isset( $decoded_control['smartphone'] ) ) :
         $smartphone = $decoded_control['smartphone'];
         echo "body.digital_newspaper_main_body{ " . $selector . "-smartphone: ".esc_html( $smartphone ).  "px;}\n";
      endif;
   }
endif;

if( ! function_exists( 'digital_newspaper_category_colors_styles' ) ) :
   /**
    * Generates css code for font size
   *
   * @package Digital Newspaper
   * @since 1.0.0
   */
   function digital_newspaper_category_colors_styles() {
      $totalCats = get_categories();
      if( $totalCats ) :
         foreach( $totalCats as $singleCat ) :
            $category_color = DN\digital_newspaper_get_customizer_option( 'category_' .absint($singleCat->term_id). '_color' );
            echo "body .post-categories .cat-item.cat-" . absint($singleCat->term_id) . " { background-color : " .digital_newspaper_get_color_format( $category_color['color'] ). "} ";
            echo "body .post-categories .cat-item.cat-" . absint($singleCat->term_id) . ":hover { background-color : " .digital_newspaper_get_color_format( $category_color['hover'] ). "} ";
            echo "body .digital-newspaper-category-no-bk .post-categories .cat-item.cat-" . absint($singleCat->term_id) . " a { color : " .digital_newspaper_get_color_format( $category_color['color'] ). "} ";
            echo "body .digital-newspaper-category-no-bk .post-categories .cat-item.cat-" . absint($singleCat->term_id) . " a:hover { color : " .digital_newspaper_get_color_format( $category_color['hover'] ). ";} ";
         endforeach;
      endif;
   }
endif;