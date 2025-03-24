<?php
/**
 * Digital Newspaper Plus functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Digital Newspaper
 * @subpackage Digital Newspaper Plus
 * @version 1.0.0
 */
use Digital_Newspaper\CustomizerDefault as DN;
if ( ! defined( 'DIGITAL_NEWSPAPER_PLUS_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	$theme_info = wp_get_theme();
	define( 'DIGITAL_NEWSPAPER_PLUS_VERSION', $theme_info->get( 'Version' ) );
}

if ( ! defined( 'DIGITAL_NEWSPAPER_PLUS_PREFIX' ) ) {
	// Replace the prefix of theme if changed.
	define( 'DIGITAL_NEWSPAPER_PLUS_PREFIX', 'digital_newspaper_plus_' );
}

add_filter( 'digital_newspaper_get_customizer_defaults', function($defaults) {
	$defaults['header_sidebar_toggle_option'] = true;
	$defaults['post_title_hover_effects'] = 'two';
	$defaults['header_layout'] = 'two';
	$defaults['main_banner_layout'] = 'two';
	$defaults['main_banner_popular_posts_title']  = esc_html__( 'Popular Posts', 'digital-newspaper' );
	$defaults['main_banner_popular_posts_categories']   = '[]';
	$defaults['main_banner_popular_posts_direction']  = 'true';
	$defaults['website_block_title_layout']  = 'layout-seven';
	$defaults['archive_page_layout']  = 'six';
	$defaults['website_layout']  = 'website_layout-full-width--layout';
	$defaults['header_width_layout']  = 'contain';
	$defaults['ticker_news_title']  = array( "icon"  => "fas fa-globe-americas", "text"   => esc_html__( 'Headlines', 'digital-newspaper' ) );
	// Site Logo Typography
	$defaults['site_title_typo']    = array(
        'font_family'   => array( 'value' => 'Nunito', 'label' => 'Nunito' ),
        'font_weight'   => array( 'value' => '700', 'label' => 'Bold 700' ),
        'font_size'   => array(
            'desktop' => 28,
            'tablet' => 28,
            'smartphone' => 28
        ),
		'line_height'   => array(
            'desktop' => 55,
            'tablet' => 55,
            'smartphone' => 33,
        ),
        'letter_spacing'   => array(
            'desktop' => 0,
            'tablet' => 0,
            'smartphone' => 0
        ),
        'text_transform'    => 'unset'
    );
	// Menu Typography
	$defaults['header_menu_typo']    = array(
        'font_family'   => array( 'value' => 'Nunito', 'label' => 'Nunito' ),
        'font_weight'   => array( 'value' => '600', 'label' => 'SemiBold 600' ),
        'font_size'   => array(
            'desktop' => 14,
            'tablet' => 14,
            'smartphone' => 14
        ),
        'line_height'   => array(
            'desktop' => 24,
            'tablet' => 24,
            'smartphone' => 24,
        ),
        'letter_spacing'   => array(
            'desktop' => 0,
            'tablet' => 0,
            'smartphone' => 0
        ),
        'text_transform'    => 'unset'
    );
	$defaults['header_sub_menu_typo']    = array(
        'font_family'   => array( 'value' => 'Nunito', 'label' => 'Nunito' ),
        'font_weight'   => array( 'value' => '600', 'label' => 'SemiBold 600' ),
        'font_size'   => array(
            'desktop' => 14,
            'tablet' => 14,
            'smartphone' => 14
        ),
		'line_height'   => array(
            'desktop' => 24,
            'tablet' => 24,
            'smartphone' => 24,
        ),
        'letter_spacing'   => array(
            'desktop' => 0,
            'tablet' => 0,
            'smartphone' => 0
        ),
        'text_transform'    => 'unset'
    );
	// Single Typography
	$defaults['single_post_title_typo']    = array(
        'font_family'   => array( 'value' => 'Nunito', 'label' => 'Nunito' ),
        'font_weight'   => array( 'value' => '700', 'label' => 'Bold 700' ),
        'font_size'   => array(
            'desktop' => 30,
            'tablet' => 28,
            'smartphone' => 23
        ),
		'line_height'   => array(
            'desktop' => 32,
            'tablet' => 40,
            'smartphone' => 32,
        ),
        'letter_spacing'   => array(
            'desktop' => 0,
            'tablet' => 0,
            'smartphone' => 0
        ),
        'text_transform'    => 'unset'
    );
	$defaults['single_post_meta_typo']    = array(
        'font_family'   => array( 'value' => 'Rubik', 'label' => 'Rubik' ),
        'font_weight'   => array( 'value' => '400', 'label' => 'Regular 400' ),
        'font_size'   => array(
            'desktop' => 13,
            'tablet' => 13,
            'smartphone' => 13
        ),
		'line_height'   => array(
            'desktop' => 22,
            'tablet' => 22,
            'smartphone' => 22,
        ),
        'letter_spacing'   => array(
            'desktop' => 0,
            'tablet' => 0,
            'smartphone' => 0
        ),
        'text_transform'    => 'unset'
    );
	$defaults['single_post_content_typo']    = array(
        'font_family'   => array( 'value' => 'Rubik', 'label' => 'Rubik' ),
        'font_weight'   => array( 'value' => '400', 'label' => 'Regular 400' ),
        'font_size'   => array(
            'desktop' => 16,
            'tablet' => 15,
            'smartphone' => 15
        ),
		'line_height'   => array(
            'desktop' => 26,
            'tablet' => 24,
            'smartphone' => 24,
        ),
        'letter_spacing'   => array(
            'desktop' => 0,
            'tablet' => 0,
            'smartphone' => 0
        ),
        'text_transform'    => 'unset'
    );
	// Typography
	$defaults['site_section_block_title_typo']    = array(
        'font_family'   => array( 'value' => 'Nunito', 'label' => 'Nunito' ),
        'font_weight'   => array( 'value' => '600', 'label' => 'SemiBold 600' ),
        'font_size'   => array(
            'desktop' => 28,
            'tablet' => 27,
            'smartphone' => 25
        ),
        'line_height'   => array(
            'desktop' => 30,
            'tablet' => 30,
            'smartphone' => 30
        ),
        'letter_spacing'   => array(
            'desktop' => 0,
            'tablet' => 0,
            'smartphone' => 0
        ),
        'text_transform'    => 'unset',
        'text_decoration'    => 'none',
    );
	$defaults['site_archive_post_title_typo']    = array(
        'font_family'   => array( 'value' => 'Nunito', 'label' => 'Nunito' ),
        'font_weight'   => array( 'value' => '600', 'label' => 'SemiBold 600' ),
        'font_size'   => array(
            'desktop' => 19,
            'tablet' => 20,
            'smartphone' => 19
        ),
        'line_height'   => array(
            'desktop' => 22,
            'tablet' => 22,
            'smartphone' => 22
        ),
        'letter_spacing'   => array(
            'desktop' => 0,
            'tablet' => 0,
            'smartphone' => 0
        ),
        'text_transform'    => 'unset',
        'text_decoration'    => 'none',
    );
	$defaults['site_archive_post_meta_typo']    = array(
        'font_family'   => array( 'value' => 'Rubik', 'label' => 'Rubik' ),
        'font_weight'   => array( 'value' => '400', 'label' => 'Regular 400' ),
        'font_size'   => array(
            'desktop' => 13,
            'tablet' => 13,
            'smartphone' => 14
        ),
        'line_height'   => array(
            'desktop' => 20,
            'tablet' => 20,
            'smartphone' => 20
        ),
        'letter_spacing'   => array(
            'desktop' => 0,
            'tablet' => 0,
            'smartphone' => 0
        ),
        'text_transform'    => 'unset',
        'text_decoration'    => 'none',
    );
	$defaults['site_archive_post_content_typo']    = array(
        'font_family'   => array( 'value' => 'Rubik', 'label' => 'Rubik' ),
        'font_weight'   => array( 'value' => '400', 'label' => 'Regular 400' ),
        'font_size'   => array(
            'desktop' => 14,
            'tablet' => 15,
            'smartphone' => 14
        ),
        'line_height'   => array(
            'desktop' => 22,
            'tablet' => 24,
            'smartphone' => 24
        ),
        'letter_spacing'   => array(
            'desktop' => 0,
            'tablet' => 0,
            'smartphone' => 0
        ),
        'text_transform'    => 'unset',
        'text_decoration'    => 'none',
    );
    $defaults['background_animation_object_color'] = '#924ed5';
    $defaults['main_banner_related_posts_option'] = false;
    $defaults['theme_color'] = '#29b8ff';
    $defaults['site_title_hover_textcolor'] = '#000';
    $defaults['top_header_background_color_group'] = json_encode(array(
            'gradient' => 'linear-gradient(135deg,rgb(111,136,250) 0%,rgb(32,189,255) 100%)',
            'type'  => 'gradient',
            'solid' => null
        ));
    $defaults['site_background_color'] = json_encode(array(
        'type'  => 'solid',
        'solid' => '#f0f1f2'
    ));
	return $defaults;
});

add_filter( 'digital_newspaper_post_title_hover_effects_filter', function($array) {
    $array['two'] = esc_html__( 'Effect Two', 'digital-newspaper-plus' );
    unset( $array['four'] );
    $array['four'] = esc_html__( 'Effect Three', 'digital-newspaper-plus' );
    return $array;
});

if( ! function_exists( 'digital_newspaper_plus_scripts' ) ) :
	/**
	 * Enqueue theme scripts and styles.
	 */
	function digital_newspaper_plus_scripts() {
		wp_dequeue_style( 'digital-newspaper-style' );
        wp_enqueue_style( 'digital-newspaper-plus-typo-fonts', wptt_get_webfont_url( digital_newspaper_plus_typo_fonts_url() ), array(), null );
		wp_enqueue_style( 'digital-newspaper-plus-parent-style', get_template_directory_uri() . '/style.css', [], DIGITAL_NEWSPAPER_PLUS_VERSION );
		wp_enqueue_style( 'digital-newspaper-plus-style', get_stylesheet_uri(), [], DIGITAL_NEWSPAPER_PLUS_VERSION );
		// enqueue inline style
		wp_add_inline_style( 'digital-newspaper-plus-style', digital_newspaper_current_styles() );

		wp_enqueue_script( 'digital-newspaper-plus-theme-js', get_stylesheet_directory_uri() . '/assets/js/theme.js', ['jquery'], DIGITAL_NEWSPAPER_PLUS_VERSION, true );
	}
	add_action( 'wp_enqueue_scripts', 'digital_newspaper_plus_scripts', 999 );
endif;

if( !function_exists( 'digital_newspaper_plus_typo_fonts_url' ) ) :
	/**
	 * Filter and Enqueue typography fonts
	 * 
	 * @package Digital Newspaper
	 * @subpackage Digital Newspaper Plus
	 * @since 1.0.0
	 */
	function digital_newspaper_plus_typo_fonts_url() {
		$filter = DIGITAL_NEWSPAPER_PREFIX . 'typo_combine_filter';
		$action = function($filter,$id) {
			return apply_filters(
				$filter,
				$id
			);
		};
		$typo1 = "Nunito:200,300,400,500,600,700,800,900";
		$typo2 = "Rubik:300,400,500,600";

		$get_fonts = apply_filters( 'digital_newspaper_get_fonts_toparse', [$typo1, $typo2] );
		$font_weight_array = array();

		foreach ( $get_fonts as $fonts ) {
			$each_font = explode( ':', $fonts );
			if ( ! isset ( $font_weight_array[$each_font[0]] ) ) {
				$font_weight_array[$each_font[0]][] = $each_font[1];
			} else {
				if ( ! in_array( $each_font[1], $font_weight_array[$each_font[0]] ) ) {
					$font_weight_array[$each_font[0]][] = $each_font[1];
				}
			}
		}
		$final_font_array = array();
		foreach ( $font_weight_array as $font => $font_weight ) {
			$each_font_string = $font.':'.implode( ',', $font_weight );
			$final_font_array[] = $each_font_string;
		}

		$final_font_string = implode( '|', $final_font_array );
		$google_fonts_url = '';
		$subsets   = 'cyrillic,cyrillic-ext';
		if ( $final_font_string ) {
			$query_args = array(
				'family' => urlencode( $final_font_string ),
				'subset' => urlencode( $subsets )
			);
			$google_fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
		}
		return $google_fonts_url;
	}
endif;

if( !function_exists( 'digital_newspaper_plus_customizer_settings' ) ) :
    /**
     * Register header options settings
     * 
     */
    function digital_newspaper_plus_customizer_settings( $wp_customize ) {
        $wp_customize->get_control( 'header_textcolor' )->default = '#000';
		// Header Layouts
		$wp_customize->add_setting( 'header_layout',
			array(
			'default'           => DN\digital_newspaper_get_customizer_default( 'header_layout' ),
			'sanitize_callback' => 'digital_newspaper_sanitize_select_control',
			)
		);
		// Add the layout control.
		$wp_customize->add_control( new Digital_Newspaper_WP_Radio_Image_Control(
			$wp_customize,
			'header_layout',
			array(
				'section'  => 'digital_newspaper_main_header_section',
				'priority' => 9,
				'choices'  => array(
					'three' => array(
						'label' => esc_html__( 'Layout Three', 'digital-newspaper-plus' ),
						'url'   => get_stylesheet_directory_uri() . '/assets/images/customizer/header_three.jpg'
					),
					'two' => array(
						'label' => esc_html__( 'Layout Two', 'digital-newspaper-plus' ),
						'url'   => get_stylesheet_directory_uri() . '/assets/images/customizer/header_two.jpg'
					)
				)
			)
		));

		// Main banner popular posts setting heading
        $wp_customize->add_setting( 'main_banner_popular_posts_settings_header', array(
            'sanitize_callback' => 'sanitize_text_field'
        ));
        
        $wp_customize->add_control( 
            new Digital_Newspaper_WP_Section_Heading_Control( $wp_customize, 'main_banner_popular_posts_settings_header', array(
                'label'	      => esc_html__( 'Popular Posts Setting', 'digital-newspaper-plus' ),
                'section'     => 'digital_newspaper_main_banner_section',
                'settings'    => 'main_banner_popular_posts_settings_header',
                'type'        => 'section-heading',
                'active_callback'   => function( $setting ) {
                    if ( $setting->manager->get_setting( 'main_banner_layout' )->value() === 'two' ) {
                        return true;
                    }
                    return false;
                }
            ))
        );

        // Main Banner Popular posts title
        $wp_customize->add_setting( 'main_banner_popular_posts_title', array(
            'default' => DN\digital_newspaper_get_customizer_default( 'main_banner_popular_posts_title' ),
            'sanitize_callback' => 'sanitize_text_field',
            'transport' => 'postMessage'
        ));
        
        $wp_customize->add_control( 'main_banner_popular_posts_title', array(
            'type'      => 'text',
            'section'   => 'digital_newspaper_main_banner_section',
            'label'     => esc_html__( 'Popular posts title', 'digital-newspaper-plus' ),
            'active_callback'   => function( $setting ) {
                if ( $setting->manager->get_setting( 'main_banner_layout' )->value() === 'two' ) {
                    return true;
                }
                return false;
            }
        ));

        // Main Banner Popular posts categories
        $wp_customize->add_setting( 'main_banner_popular_posts_categories', array(
            'default' => DN\digital_newspaper_get_customizer_default( 'main_banner_popular_posts_categories' ),
            'sanitize_callback' => 'sanitize_text_field'
        ));
        
        $wp_customize->add_control( 
            new Digital_Newspaper_WP_Categories_Multiselect_Control( $wp_customize, 'main_banner_popular_posts_categories', array(
                'label'     => esc_html__( 'Popular posts categories', 'digital-newspaper-plus' ),
                'section'   => 'digital_newspaper_main_banner_section',
                'settings'  => 'main_banner_popular_posts_categories',
                'choices'   => digital_newspaper_get_multicheckbox_categories_simple_array(),
                'active_callback'   => function( $setting ) {
                    if ( $setting->manager->get_setting( 'main_banner_layout' )->value() === 'two' ) {
                        return true;
                    }
                    return false;
                }
            ))
        );

        // Main Banner popular posts vertical direction
        $wp_customize->add_setting( 'main_banner_popular_posts_direction', array(
            'default' => DN\digital_newspaper_get_customizer_default( 'main_banner_popular_posts_direction' ),
            'sanitize_callback' => 'digital_newspaper_sanitize_select_control'
        ));
        $wp_customize->add_control( 'main_banner_popular_posts_direction', array(
            'type'      => 'select',
            'section'   => 'digital_newspaper_main_banner_section',
            'label'     => esc_html__( 'Slide direction', 'digital-newspaper-plus' ),
            'choices'   => array(
                'true' => esc_html__( 'Vertical', 'digital-newspaper-plus' ),
                'false' => esc_html__( 'Horizontal', 'digital-newspaper-plus' )
            ),
            'active_callback'   => function( $setting ) {
                if ( $setting->manager->get_setting( 'main_banner_layout' )->value() === 'two' ) {
                    return true;
                }
                return false;
            }
        ));
	}
	add_action( 'customize_register', 'digital_newspaper_plus_customizer_settings', 11 );
endif;

// Add new layout to main banner
add_filter( 'digital_newspaper_banner_layouts_choices_filter', function($array) {
	// Add new layout
	$array['two'] = array(
		'label' => esc_html__( 'Layout Two', 'digital-newspaper-plus' ),
		'url'   => get_stylesheet_directory_uri() . '/assets/images/customizer/main_banner_two.jpg'
	);
	return $array;
});

// Add new layout to block title
add_filter( 'digital_newspaper_block_title_layout_option_filter', function($array) {
    // Add new layout
    $array['layout-seven'] = array(
        'label' => esc_html__( 'Layout Seven', 'digital-newspaper-plus' ),
        'url'   => get_stylesheet_directory_uri() . '/assets/images/customizer/block-title-layout-seven.jpg'
    );
    return $array;
});

// Add new layout to blog archive
add_filter( 'digital_newspaper_blog_archive_layout_choices_filter', function($array) {
    // Add new layout
    $array['six'] = array(
        'label' => esc_html__( 'Layout Six', 'digital-newspaper-plus' ),
        'url'   => get_stylesheet_directory_uri() . '/assets/images/customizer/archive_six.jpg'
    );
    return $array;
});

// Add new layout to blog archive
add_filter( 'digital_newspaper_apply_random_color_shuffle_value', function($array) {
    $color_array["color"] = "#29b8ff";
    $color_array["hover"] = "#29b8ff";
    return $color_array;
});

if( ! function_exists( 'digital_newspaper_plus_add_demos' ) ) : 
    /**
     * Add new demo to the theme
     */
    function digital_newspaper_plus_add_demos($demos) {
        $demos = array_merge([
            'digital-newspaper-plus'  => [
            'name' => 'Digital Newspaper Plus',
            'type' => 'free',
            'buy_url'=> 'https://blazethemes.com/theme/digital-newspaper-pro/',
            'external_url' => 'https://preview.blazethemes.com/import-files/digital-newspaper/digital-newspaper-plus.zip',
            'image' => 'https://blazethemes.com/wp-content/uploads/2025/03/Digital-Newspaper-Plus.jpg',
            'preview_url' => 'https://preview.blazethemes.com/digital-newspaper-plus/',
            'menu_array' => [
                'menu-1' => 'header-menu'
            ],
            'home_slug' => '',
            'blog_slug' => '',
            'plugins' => [],
            'tags' => [
                'free'  =>  esc_html__( 'Free', 'digital-newspaper-plus' ),
                'child'  =>  esc_html__( 'Child Theme', 'digital-newspaper-plus' )
            ]
        ]],
        $demos
    );
        return $demos;
    }
    add_filter( 'digital_newspaper__demos_array_filter', 'digital_newspaper_plus_add_demos' );
endif;

if( ! function_exists( 'digital_newspaper_custom_header_args' ) ) : 
    /**
     * Modify header image arguments
     * 
     */
    function digital_newspaper_custom_header_args($args) {
        $args ['default-text-color'] = '000';
        return $args;
    }
    add_filter( 'digital_newspaper_custom_header_args', 'digital_newspaper_custom_header_args' );
endif;