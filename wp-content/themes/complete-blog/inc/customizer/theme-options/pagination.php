<?php
/**
 * Pagination setting
 */

// Pagination setting.
$wp_customize->add_section(
	'complete_blog_pagination',
	array(
		'title' => esc_html__( 'Pagination', 'complete-blog' ),
		'panel' => 'complete_blog_theme_options_panel',
	)
);

// Pagination enable setting.
$wp_customize->add_setting(
	'complete_blog_pagination_enable',
	array(
		'default'           => true,
		'sanitize_callback' => 'complete_blog_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	new Complete_Blog_Toggle_Checkbox_Custom_control(
		$wp_customize,
		'complete_blog_pagination_enable',
		array(
			'label'    => esc_html__( 'Enable Pagination.', 'complete-blog' ),
			'settings' => 'complete_blog_pagination_enable',
			'section'  => 'complete_blog_pagination',
			'type'     => 'checkbox',
		)
	)
);

// Pagination - Pagination Style.
$wp_customize->add_setting(
	'complete_blog_pagination_type',
	array(
		'default'           => 'numeric',
		'sanitize_callback' => 'complete_blog_sanitize_select',
	)
);

$wp_customize->add_control(
	'complete_blog_pagination_type',
	array(
		'label'           => esc_html__( 'Pagination Style', 'complete-blog' ),
		'section'         => 'complete_blog_pagination',
		'type'            => 'select',
		'choices'         => array(
			'default' => __( 'Default (Older/Newer)', 'complete-blog' ),
			'numeric' => __( 'Numeric', 'complete-blog' ),
		),
		'active_callback' => function( $control ) {
			return ( $control->manager->get_setting( 'complete_blog_pagination_enable' )->value() );
		},
	)
);
