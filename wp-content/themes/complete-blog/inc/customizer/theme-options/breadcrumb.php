<?php
/**
 * Breadcrumb settings
 */

$wp_customize->add_section(
	'complete_blog_breadcrumb_section',
	array(
		'title' => esc_html__( 'Breadcrumb Options', 'complete-blog' ),
		'panel' => 'complete_blog_theme_options_panel',
	)
);

// Breadcrumb enable setting.
$wp_customize->add_setting(
	'complete_blog_breadcrumb_enable',
	array(
		'default'           => true,
		'sanitize_callback' => 'complete_blog_sanitize_checkbox',
	)
);
$wp_customize->add_control(
	new Complete_Blog_Toggle_Checkbox_Custom_control(
		$wp_customize,
		'complete_blog_breadcrumb_enable',
		array(
			'label'    => esc_html__( 'Enable breadcrumb.', 'complete-blog' ),
			'type'     => 'checkbox',
			'settings' => 'complete_blog_breadcrumb_enable',
			'section'  => 'complete_blog_breadcrumb_section',
		)
	)
);

// Breadcrumb - Separator.
$wp_customize->add_setting(
	'complete_blog_breadcrumb_separator',
	array(
		'sanitize_callback' => 'sanitize_text_field',
		'default'           => '/',
	)
);

$wp_customize->add_control(
	'complete_blog_breadcrumb_separator',
	array(
		'label'           => esc_html__( 'Separator', 'complete-blog' ),
		'section'         => 'complete_blog_breadcrumb_section',
		'active_callback' => function( $control ) {
			return ( $control->manager->get_setting( 'complete_blog_breadcrumb_enable' )->value() );
		},
	)
);
