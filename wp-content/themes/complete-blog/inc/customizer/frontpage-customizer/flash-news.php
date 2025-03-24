<?php
/**
 * Adore Themes Customizer
 *
 * @package Complete Blog
 *
 * Flash Articles Section
 */

$wp_customize->add_section(
	'complete_blog_flash_articles_section',
	array(
		'title' => esc_html__( 'Flash Articles Section', 'complete-blog' ),
		'panel' => 'complete_blog_frontpage_panel',
	)
);

// Flash Articles section enable settings.
$wp_customize->add_setting(
	'complete_blog_flash_articles_section_enable',
	array(
		'default'           => false,
		'sanitize_callback' => 'complete_blog_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	new Complete_Blog_Toggle_Checkbox_Custom_control(
		$wp_customize,
		'complete_blog_flash_articles_section_enable',
		array(
			'label'    => esc_html__( 'Enable Flash Articles Section', 'complete-blog' ),
			'type'     => 'checkbox',
			'settings' => 'complete_blog_flash_articles_section_enable',
			'section'  => 'complete_blog_flash_articles_section',
		)
	)
);

// Flash Articles title settings.
$wp_customize->add_setting(
	'complete_blog_flash_articles_title',
	array(
		'default'           => __( 'Hot Topics', 'complete-blog' ),
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'complete_blog_flash_articles_title',
	array(
		'label'           => esc_html__( 'Title', 'complete-blog' ),
		'section'         => 'complete_blog_flash_articles_section',
		'active_callback' => 'complete_blog_if_flash_articles_enabled',
	)
);

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
	$wp_customize->selective_refresh->add_partial(
		'complete_blog_flash_articles_title',
		array(
			'selector'            => '.articles-ticker-section .theme-wrapper',
			'settings'            => 'complete_blog_flash_articles_title',
			'container_inclusive' => false,
			'fallback_refresh'    => true,
			'render_callback'     => 'complete_blog_flash_articles_title_text_partial',
		)
	);
}

// Flash Articles speed controller setting.
$wp_customize->add_setting(
	'complete_blog_flash_articles_speed_controller',
	array(
		'default'           => 200,
		'sanitize_callback' => 'complete_blog_sanitize_number_range',
	)
);

$wp_customize->add_control(
	'complete_blog_flash_articles_speed_controller',
	array(
		'label'           => esc_html__( 'Speed Controller', 'complete-blog' ),
		'description'     => esc_html__( 'Default speed value is 200.', 'complete-blog' ),
		'section'         => 'complete_blog_flash_articles_section',
		'type'            => 'number',
		'input_attrs'     => array(
			'min' => 1,
		),
		'active_callback' => 'complete_blog_if_flash_articles_enabled',
	)
);

// flash_articles content type settings.
$wp_customize->add_setting(
	'complete_blog_flash_articles_content_type',
	array(
		'default'           => 'post',
		'sanitize_callback' => 'complete_blog_sanitize_select',
	)
);

$wp_customize->add_control(
	'complete_blog_flash_articles_content_type',
	array(
		'label'           => esc_html__( 'Content type:', 'complete-blog' ),
		'description'     => esc_html__( 'Choose where you want to render the content from.', 'complete-blog' ),
		'section'         => 'complete_blog_flash_articles_section',
		'type'            => 'select',
		'active_callback' => 'complete_blog_if_flash_articles_enabled',
		'choices'         => array(
			'post'     => esc_html__( 'Post', 'complete-blog' ),
			'category' => esc_html__( 'Category', 'complete-blog' ),
		),
	)
);

for ( $i = 1; $i <= 5; $i++ ) {
	// flash_articles post setting.
	$wp_customize->add_setting(
		'complete_blog_flash_articles_post_' . $i,
		array(
			'sanitize_callback' => 'complete_blog_sanitize_dropdown_pages',
		)
	);

	$wp_customize->add_control(
		'complete_blog_flash_articles_post_' . $i,
		array(
			'label'           => sprintf( esc_html__( 'Post %d', 'complete-blog' ), $i ),
			'section'         => 'complete_blog_flash_articles_section',
			'type'            => 'select',
			'choices'         => complete_blog_get_post_choices(),
			'active_callback' => 'complete_blog_flash_articles_section_content_type_post_enabled',
		)
	);

}

// flash_articles category setting.
$wp_customize->add_setting(
	'complete_blog_flash_articles_category',
	array(
		'sanitize_callback' => 'complete_blog_sanitize_select',
	)
);

$wp_customize->add_control(
	'complete_blog_flash_articles_category',
	array(
		'label'           => esc_html__( 'Category', 'complete-blog' ),
		'section'         => 'complete_blog_flash_articles_section',
		'type'            => 'select',
		'choices'         => complete_blog_get_post_cat_choices(),
		'active_callback' => 'complete_blog_flash_articles_section_content_type_category_enabled',
	)
);

/*========================Active Callback==============================*/
function complete_blog_if_flash_articles_enabled( $control ) {
	return $control->manager->get_setting( 'complete_blog_flash_articles_section_enable' )->value();
}
function complete_blog_flash_articles_section_content_type_post_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'complete_blog_flash_articles_content_type' )->value();
	return complete_blog_if_flash_articles_enabled( $control ) && ( 'post' === $content_type );
}
function complete_blog_flash_articles_section_content_type_category_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'complete_blog_flash_articles_content_type' )->value();
	return complete_blog_if_flash_articles_enabled( $control ) && ( 'category' === $content_type );
}

/*========================Partial Refresh==============================*/
if ( ! function_exists( 'complete_blog_flash_articles_title_text_partial' ) ) :
	// Title.
	function complete_blog_flash_articles_title_text_partial() {
		return esc_html( get_theme_mod( 'complete_blog_flash_articles_title' ) );
	}
endif;
