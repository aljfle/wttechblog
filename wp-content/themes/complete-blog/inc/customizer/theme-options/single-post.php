<?php
/**
 * Single Post Options
 */

$wp_customize->add_section(
	'complete_blog_single_page_options',
	array(
		'title' => esc_html__( 'Single Post Options', 'complete-blog' ),
		'panel' => 'complete_blog_theme_options_panel',
	)
);

// Enable single post category setting.
$wp_customize->add_setting(
	'complete_blog_enable_single_category',
	array(
		'default'           => true,
		'sanitize_callback' => 'complete_blog_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	new Complete_Blog_Toggle_Checkbox_Custom_control(
		$wp_customize,
		'complete_blog_enable_single_category',
		array(
			'label'    => esc_html__( 'Enable Category', 'complete-blog' ),
			'settings' => 'complete_blog_enable_single_category',
			'section'  => 'complete_blog_single_page_options',
			'type'     => 'checkbox',
		)
	)
);

// Enable single post author setting.
$wp_customize->add_setting(
	'complete_blog_enable_single_author',
	array(
		'default'           => true,
		'sanitize_callback' => 'complete_blog_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	new Complete_Blog_Toggle_Checkbox_Custom_control(
		$wp_customize,
		'complete_blog_enable_single_author',
		array(
			'label'    => esc_html__( 'Enable Author', 'complete-blog' ),
			'settings' => 'complete_blog_enable_single_author',
			'section'  => 'complete_blog_single_page_options',
			'type'     => 'checkbox',
		)
	)
);

// Enable single post date setting.
$wp_customize->add_setting(
	'complete_blog_enable_single_date',
	array(
		'default'           => true,
		'sanitize_callback' => 'complete_blog_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	new Complete_Blog_Toggle_Checkbox_Custom_control(
		$wp_customize,
		'complete_blog_enable_single_date',
		array(
			'label'    => esc_html__( 'Enable Date', 'complete-blog' ),
			'settings' => 'complete_blog_enable_single_date',
			'section'  => 'complete_blog_single_page_options',
			'type'     => 'checkbox',
		)
	)
);

// Enable single post tag setting.
$wp_customize->add_setting(
	'complete_blog_enable_single_tag',
	array(
		'default'           => true,
		'sanitize_callback' => 'complete_blog_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	new Complete_Blog_Toggle_Checkbox_Custom_control(
		$wp_customize,
		'complete_blog_enable_single_tag',
		array(
			'label'    => esc_html__( 'Enable Post Tag', 'complete-blog' ),
			'settings' => 'complete_blog_enable_single_tag',
			'section'  => 'complete_blog_single_page_options',
			'type'     => 'checkbox',
		)
	)
);

// Single post related Posts title label.
$wp_customize->add_setting(
	'complete_blog_related_posts_title',
	array(
		'default'           => __( 'Related Posts', 'complete-blog' ),
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'complete_blog_related_posts_title',
	array(
		'label'    => esc_html__( 'Related Posts Title', 'complete-blog' ),
		'section'  => 'complete_blog_single_page_options',
		'settings' => 'complete_blog_related_posts_title',
	)
);
