<?php
/**
 * Adore Themes Customizer
 *
 * @package Complete Blog
 *
 * Banner Section
 */

$wp_customize->add_section(
	'complete_blog_banner_section',
	array(
		'title' => esc_html__( 'Banner Section', 'complete-blog' ),
		'panel' => 'complete_blog_frontpage_panel',
	)
);

// Banner enable setting.
$wp_customize->add_setting(
	'complete_blog_banner_section_enable',
	array(
		'default'           => false,
		'sanitize_callback' => 'complete_blog_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	new Complete_Blog_Toggle_Checkbox_Custom_control(
		$wp_customize,
		'complete_blog_banner_section_enable',
		array(
			'label'    => esc_html__( 'Enable Banner Section', 'complete-blog' ),
			'type'     => 'checkbox',
			'settings' => 'complete_blog_banner_section_enable',
			'section'  => 'complete_blog_banner_section',
		)
	)
);

// posts carousel content type settings.
$wp_customize->add_setting(
	'complete_blog_banner_content_type',
	array(
		'default'           => 'post',
		'sanitize_callback' => 'complete_blog_sanitize_select',
	)
);

$wp_customize->add_control(
	'complete_blog_banner_content_type',
	array(
		'label'           => esc_html__( 'Content type:', 'complete-blog' ),
		'description'     => esc_html__( 'Choose where you want to render the content from.', 'complete-blog' ),
		'section'         => 'complete_blog_banner_section',
		'type'            => 'select',
		'active_callback' => 'complete_blog_if_banner_enabled',
		'choices'         => array(
			'post'     => esc_html__( 'Post', 'complete-blog' ),
			'category' => esc_html__( 'Category', 'complete-blog' ),
		),
	)
);

for ( $i = 1; $i <= 4; $i++ ) {
	// posts carousel post setting.
	$wp_customize->add_setting(
		'complete_blog_banner_post_' . $i,
		array(
			'sanitize_callback' => 'complete_blog_sanitize_dropdown_pages',
		)
	);

	$wp_customize->add_control(
		'complete_blog_banner_post_' . $i,
		array(
			'label'           => sprintf( esc_html__( 'Post %d', 'complete-blog' ), $i ),
			'section'         => 'complete_blog_banner_section',
			'type'            => 'select',
			'choices'         => complete_blog_get_post_choices(),
			'active_callback' => 'complete_blog_banner_section_content_type_post_enabled',
		)
	);

}

// posts carousel category setting.
$wp_customize->add_setting(
	'complete_blog_banner_category',
	array(
		'sanitize_callback' => 'complete_blog_sanitize_select',
	)
);

$wp_customize->add_control(
	'complete_blog_banner_category',
	array(
		'label'           => esc_html__( 'Category', 'complete-blog' ),
		'section'         => 'complete_blog_banner_section',
		'type'            => 'select',
		'choices'         => complete_blog_get_post_cat_choices(),
		'active_callback' => 'complete_blog_banner_section_content_type_category_enabled',
	)
);

/*========================Active Callback==============================*/
function complete_blog_if_banner_enabled( $control ) {
	return $control->manager->get_setting( 'complete_blog_banner_section_enable' )->value();
}
function complete_blog_banner_section_content_type_post_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'complete_blog_banner_content_type' )->value();
	return complete_blog_if_banner_enabled( $control ) && ( 'post' === $content_type );
}
function complete_blog_banner_section_content_type_category_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'complete_blog_banner_content_type' )->value();
	return complete_blog_if_banner_enabled( $control ) && ( 'category' === $content_type );
}
