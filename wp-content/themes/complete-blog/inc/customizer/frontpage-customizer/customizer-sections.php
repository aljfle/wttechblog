<?php

// Home Page Customizer panel.
$wp_customize->add_panel(
	'complete_blog_frontpage_panel',
	array(
		'title'    => esc_html__( 'Frontpage Sections', 'complete-blog' ),
		'priority' => 140,
	)
);

$customizer_settings = array( 'flash-news', 'banner', 'popular-posts' );

foreach ( $customizer_settings as $customizer ) {

	require get_template_directory() . '/inc/customizer/frontpage-customizer/' . $customizer . '.php';

}
