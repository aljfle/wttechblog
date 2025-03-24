<?php
/**
 * Sidebar settings
 */

$wp_customize->add_section(
	'complete_blog_sidebar_option',
	array(
		'title' => esc_html__( 'Sidebar Options', 'complete-blog' ),
		'panel' => 'complete_blog_theme_options_panel',
	)
);

// Sidebar Option - Global Sidebar Position.
$wp_customize->add_setting(
	'complete_blog_sidebar_position',
	array(
		'sanitize_callback' => 'complete_blog_sanitize_select',
		'default'           => 'right-sidebar',
	)
);

$wp_customize->add_control(
	'complete_blog_sidebar_position',
	array(
		'label'   => esc_html__( 'Global Sidebar Position', 'complete-blog' ),
		'section' => 'complete_blog_sidebar_option',
		'type'    => 'select',
		'choices' => array(
			'right-sidebar' => esc_html__( 'Right Sidebar', 'complete-blog' ),
			'no-sidebar'    => esc_html__( 'No Sidebar', 'complete-blog' ),
		),
	)
);

// Sidebar Option - Post Sidebar Position.
$wp_customize->add_setting(
	'complete_blog_post_sidebar_position',
	array(
		'sanitize_callback' => 'complete_blog_sanitize_select',
		'default'           => 'right-sidebar',
	)
);

$wp_customize->add_control(
	'complete_blog_post_sidebar_position',
	array(
		'label'   => esc_html__( 'Post Sidebar Position', 'complete-blog' ),
		'section' => 'complete_blog_sidebar_option',
		'type'    => 'select',
		'choices' => array(
			'right-sidebar' => esc_html__( 'Right Sidebar', 'complete-blog' ),
			'no-sidebar'    => esc_html__( 'No Sidebar', 'complete-blog' ),
		),
	)
);

// Sidebar Option - Page Sidebar Position.
$wp_customize->add_setting(
	'complete_blog_page_sidebar_position',
	array(
		'sanitize_callback' => 'complete_blog_sanitize_select',
		'default'           => 'right-sidebar',
	)
);

$wp_customize->add_control(
	'complete_blog_page_sidebar_position',
	array(
		'label'   => esc_html__( 'Page Sidebar Position', 'complete-blog' ),
		'section' => 'complete_blog_sidebar_option',
		'type'    => 'select',
		'choices' => array(
			'right-sidebar' => esc_html__( 'Right Sidebar', 'complete-blog' ),
			'no-sidebar'    => esc_html__( 'No Sidebar', 'complete-blog' ),
		),
	)
);
