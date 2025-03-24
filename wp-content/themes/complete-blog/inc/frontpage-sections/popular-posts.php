<?php
/**
 * Template part for displaying front page introduction.
 *
 * @package Complete Blog
 */

// Popular Posts Section.
$popular_posts_section = get_theme_mod( 'complete_blog_popular_posts_section_enable', false );

if ( false === $popular_posts_section ) {
	return;
}

$content_ids = array();

$popular_posts_content_type = get_theme_mod( 'complete_blog_popular_posts_content_type', 'post' );

if ( $popular_posts_content_type === 'post' ) {

	for ( $i = 1; $i <= 6; $i++ ) {
		$content_ids[] = get_theme_mod( 'complete_blog_popular_posts_post_' . $i );
	}

	$args = array(
		'post_type'           => 'post',
		'posts_per_page'      => absint( 6 ),
		'ignore_sticky_posts' => true,
	);
	if ( ! empty( array_filter( $content_ids ) ) ) {
		$args['post__in'] = array_filter( $content_ids );
		$args['orderby']  = 'post__in';
	} else {
		$args['orderby'] = 'date';
	}
} else {
	$cat_content_id = get_theme_mod( 'complete_blog_popular_posts_category' );
	$args           = array(
		'cat'            => $cat_content_id,
		'posts_per_page' => absint( 6 ),
	);
}

$query = new WP_Query( $args );
if ( $query->have_posts() ) {

	$section_title    = get_theme_mod( 'complete_blog_popular_posts_title', __( 'Popular Posts', 'complete-blog' ) );
	$viewall_btn      = get_theme_mod( 'complete_blog_popular_posts_view_all_button_label', __( 'View All', 'complete-blog' ) );
	$viewall_btn_link = get_theme_mod( 'complete_blog_popular_posts_view_all_button_url', '#' );

	?>

	<div id="complete_blog_popular_posts_section" class="frontpage popularpost style-1">
		<div class="theme-wrapper">
			<?php if ( ! empty( $section_title ) ) : ?>
				<div class="section-head">
					<div class="section-header">
						<h3 class="section-title"><?php echo esc_html( $section_title ); ?></h3>
					</div>
					<?php if ( ! empty( $viewall_btn ) ) { ?>
						<a href="<?php echo esc_url( $viewall_btn_link ); ?>" class="adore-view-all"><?php echo esc_html( $viewall_btn ); ?></a>
					<?php } ?>
				</div>
			<?php endif; ?>
			<div class="pupular-post-wrapper">
				<?php
				while ( $query->have_posts() ) :
					$query->the_post();
					?>
					<div class="post-item post-list card-hover">
						<?php if ( has_post_thumbnail() ) { ?>
							<div class="post-item-image">
								<a href="<?php the_permalink(); ?>">
									<?php the_post_thumbnail( 'post-thumbnail' ); ?>
								</a>
							</div>
						<?php } ?>
						<div class="post-item-content">
							<h3 class="entry-title">
								<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
							</h3>  
							<ul class="entry-meta">
								<li class="post-author"> <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><i class="far fa-user"></i><?php echo esc_html( get_the_author() ); ?></a></li>
								<li class="post-date"><i class="far fa-calendar-alt"></i></span><?php echo esc_html( get_the_date() ); ?></li>
							</ul>
						</div>
					</div>
					<?php
				endwhile;
				wp_reset_postdata();
				?>
			</div>
		</div>
	</div>

	<?php
}
