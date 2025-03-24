<?php

// Featured Posts Widget.
require get_template_directory() . '/inc/widgets/featured-posts-widget.php';

// Social Widget.
require get_template_directory() . '/inc/widgets/social-widget.php';

/**
 * Register Widgets
 */
function complete_blog_register_widgets() {

	register_widget( 'Complete_Blog_Featured_Posts_Widget' );

	register_widget( 'Complete_Blog_Social_Widget' );

}
add_action( 'widgets_init', 'complete_blog_register_widgets' );
