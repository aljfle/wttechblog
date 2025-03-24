<?php
/**
 * Adore Themes Customizer
 *
 * @package Complete Blog
 *
 * Popular Posts Section
 */

$wp_customize->add_section(
	'complete_blog_popular_posts_section',
	array(
		'title' => esc_html__( 'Popular Posts Section', 'complete-blog' ),
		'panel' => 'complete_blog_frontpage_panel',
	)
);

// Popular Posts section enable settings.
$wp_customize->add_setting(
	'complete_blog_popular_posts_section_enable',
	array(
		'default'           => false,
		'sanitize_callback' => 'complete_blog_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	new Complete_Blog_Toggle_Checkbox_Custom_control(
		$wp_customize,
		'complete_blog_popular_posts_section_enable',
		array(
			'label'    => esc_html__( 'Enable Popular Posts Section', 'complete-blog' ),
			'type'     => 'checkbox',
			'settings' => 'complete_blog_popular_posts_section_enable',
			'section'  => 'complete_blog_popular_posts_section',
		)
	)
);

// Popular Posts title settings.
$wp_customize->add_setting(
	'complete_blog_popular_posts_title',
	array(
		'default'           => __( 'Popular Posts', 'complete-blog' ),
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'complete_blog_popular_posts_title',
	array(
		'label'           => esc_html__( 'Section Title', 'complete-blog' ),
		'section'         => 'complete_blog_popular_posts_section',
		'active_callback' => 'complete_blog_if_popular_posts_enabled',
	)
);

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
	$wp_customize->selective_refresh->add_partial(
		'complete_blog_popular_posts_title',
		array(
			'selector'            => '.popularpost h3.section-title',
			'settings'            => 'complete_blog_popular_posts_title',
			'container_inclusive' => false,
			'fallback_refresh'    => true,
			'render_callback'     => 'complete_blog_popular_posts_title_text_partial',
		)
	);
}

// View All button label setting.
$wp_customize->add_setting(
	'complete_blog_popular_posts_view_all_button_label',
	array(
		'default'           => __( 'View All', 'complete-blog' ),
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'complete_blog_popular_posts_view_all_button_label',
	array(
		'label'           => esc_html__( 'View All Button Label', 'complete-blog' ),
		'section'         => 'complete_blog_popular_posts_section',
		'settings'        => 'complete_blog_popular_posts_view_all_button_label',
		'type'            => 'text',
		'active_callback' => 'complete_blog_if_popular_posts_enabled',
	)
);

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
	$wp_customize->selective_refresh->add_partial(
		'complete_blog_popular_posts_view_all_button_label',
		array(
			'selector'            => '.popularpost .adore-view-all',
			'settings'            => 'complete_blog_popular_posts_view_all_button_label',
			'container_inclusive' => false,
			'fallback_refresh'    => true,
			'render_callback'     => 'complete_blog_popular_posts_view_all_button_label_text_partial',
		)
	);
}

// View All button URL setting.
$wp_customize->add_setting(
	'complete_blog_popular_posts_view_all_button_url',
	array(
		'default'           => '#',
		'sanitize_callback' => 'esc_url_raw',
	)
);

$wp_customize->add_control(
	'complete_blog_popular_posts_view_all_button_url',
	array(
		'label'           => esc_html__( 'View All Button Link', 'complete-blog' ),
		'section'         => 'complete_blog_popular_posts_section',
		'settings'        => 'complete_blog_popular_posts_view_all_button_url',
		'type'            => 'url',
		'active_callback' => 'complete_blog_if_popular_posts_enabled',
	)
);

// popular_posts content type settings.
$wp_customize->add_setting(
	'complete_blog_popular_posts_content_type',
	array(
		'default'           => 'post',
		'sanitize_callback' => 'complete_blog_sanitize_select',
	)
);

$wp_customize->add_control(
	'complete_blog_popular_posts_content_type',
	array(
		'label'           => esc_html__( 'Content type:', 'complete-blog' ),
		'description'     => esc_html__( 'Choose where you want to render the content from.', 'complete-blog' ),
		'section'         => 'complete_blog_popular_posts_section',
		'type'            => 'select',
		'active_callback' => 'complete_blog_if_popular_posts_enabled',
		'choices'         => array(
			'post'     => esc_html__( 'Post', 'complete-blog' ),
			'category' => esc_html__( 'Category', 'complete-blog' ),
		),
	)
);

for ( $i = 1; $i <= 6; $i++ ) {
	// popular_posts post setting.
	$wp_customize->add_setting(
		'complete_blog_popular_posts_post_' . $i,
		array(
			'sanitize_callback' => 'complete_blog_sanitize_dropdown_pages',
		)
	);

	$wp_customize->add_control(
		'complete_blog_popular_posts_post_' . $i,
		array(
			'label'           => sprintf( esc_html__( 'Post %d', 'complete-blog' ), $i ),
			'section'         => 'complete_blog_popular_posts_section',
			'type'            => 'select',
			'choices'         => complete_blog_get_post_choices(),
			'active_callback' => 'complete_blog_popular_posts_section_content_type_post_enabled',
		)
	);

}

// popular_posts category setting.
$wp_customize->add_setting(
	'complete_blog_popular_posts_category',
	array(
		'sanitize_callback' => 'complete_blog_sanitize_select',
	)
);

$wp_customize->add_control(
	'complete_blog_popular_posts_category',
	array(
		'label'           => esc_html__( 'Category', 'complete-blog' ),
		'section'         => 'complete_blog_popular_posts_section',
		'type'            => 'select',
		'choices'         => complete_blog_get_post_cat_choices(),
		'active_callback' => 'complete_blog_popular_posts_section_content_type_category_enabled',
	)
);

/*========================Active Callback==============================*/
function complete_blog_if_popular_posts_enabled( $control ) {
	return $control->manager->get_setting( 'complete_blog_popular_posts_section_enable' )->value();
}
function complete_blog_popular_posts_section_content_type_post_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'complete_blog_popular_posts_content_type' )->value();
	return complete_blog_if_popular_posts_enabled( $control ) && ( 'post' === $content_type );
}
function complete_blog_popular_posts_section_content_type_category_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'complete_blog_popular_posts_content_type' )->value();
	return complete_blog_if_popular_posts_enabled( $control ) && ( 'category' === $content_type );
}

/*========================Partial Refresh==============================*/
if ( ! function_exists( 'complete_blog_popular_posts_title_text_partial' ) ) :
	// Title.
	function complete_blog_popular_posts_title_text_partial() {
		return esc_html( get_theme_mod( 'complete_blog_popular_posts_title' ) );
	}
endif;
if ( ! function_exists( 'complete_blog_popular_posts_view_all_button_label_text_partial' ) ) :
	// View All.
	function complete_blog_popular_posts_view_all_button_label_text_partial() {
		return esc_html( get_theme_mod( 'complete_blog_popular_posts_view_all_button_label' ) );
	}
endif;
