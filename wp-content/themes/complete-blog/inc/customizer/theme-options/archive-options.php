<?php
/**
 * Blog / Archive Options
 */

$wp_customize->add_section(
	'complete_blog_archive_page_options',
	array(
		'title' => esc_html__( 'Blog / Archive Pages Options', 'complete-blog' ),
		'panel' => 'complete_blog_theme_options_panel',
	)
);

// Grid Column layout options.
$wp_customize->add_setting(
	'complete_blog_archive_grid_column_layout',
	array(
		'default'           => 'grid-column-2',
		'sanitize_callback' => 'complete_blog_sanitize_select',
	)
);

$wp_customize->add_control(
	'complete_blog_archive_grid_column_layout',
	array(
		'label'   => esc_html__( 'Grid Column Layout', 'complete-blog' ),
		'section' => 'complete_blog_archive_page_options',
		'type'    => 'select',
		'choices' => array(
			'grid-column-2' => __( 'Column 2', 'complete-blog' ),
			'grid-column-3' => __( 'Column 3', 'complete-blog' ),
		),
	)
);

// Enable archive page category setting.
$wp_customize->add_setting(
	'complete_blog_enable_archive_category',
	array(
		'default'           => true,
		'sanitize_callback' => 'complete_blog_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	new Complete_Blog_Toggle_Checkbox_Custom_control(
		$wp_customize,
		'complete_blog_enable_archive_category',
		array(
			'label'    => esc_html__( 'Enable Category', 'complete-blog' ),
			'settings' => 'complete_blog_enable_archive_category',
			'section'  => 'complete_blog_archive_page_options',
			'type'     => 'checkbox',
		)
	)
);

// Enable archive page author setting.
$wp_customize->add_setting(
	'complete_blog_enable_archive_author',
	array(
		'default'           => true,
		'sanitize_callback' => 'complete_blog_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	new Complete_Blog_Toggle_Checkbox_Custom_control(
		$wp_customize,
		'complete_blog_enable_archive_author',
		array(
			'label'    => esc_html__( 'Enable Author', 'complete-blog' ),
			'settings' => 'complete_blog_enable_archive_author',
			'section'  => 'complete_blog_archive_page_options',
			'type'     => 'checkbox',
		)
	)
);

// Enable archive page date setting.
$wp_customize->add_setting(
	'complete_blog_enable_archive_date',
	array(
		'default'           => true,
		'sanitize_callback' => 'complete_blog_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	new Complete_Blog_Toggle_Checkbox_Custom_control(
		$wp_customize,
		'complete_blog_enable_archive_date',
		array(
			'label'    => esc_html__( 'Enable Date', 'complete-blog' ),
			'settings' => 'complete_blog_enable_archive_date',
			'section'  => 'complete_blog_archive_page_options',
			'type'     => 'checkbox',
		)
	)
);
