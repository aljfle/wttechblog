<?php
/**
 * Template part for displaying front page introduction.
 *
 * @package Complete Blog
 */

// Banner Section.
$banner_section = get_theme_mod( 'complete_blog_banner_section_enable', false );

if ( false === $banner_section ) {
	return;
}

$content_ids = array();

$banner_content_type = get_theme_mod( 'complete_blog_banner_content_type', 'post' );

if ( $banner_content_type === 'post' ) {

	for ( $i = 1; $i <= 4; $i++ ) {
		$content_ids[] = get_theme_mod( 'complete_blog_banner_post_' . $i );
	}

	$args = array(
		'post_type'           => 'post',
		'posts_per_page'      => absint( 4 ),
		'ignore_sticky_posts' => true,
	);
	if ( ! empty( array_filter( $content_ids ) ) ) {
		$args['post__in'] = array_filter( $content_ids );
		$args['orderby']  = 'post__in';
	} else {
		$args['orderby'] = 'date';
	}
} else {
	$cat_content_id = get_theme_mod( 'complete_blog_banner_category' );
	$args           = array(
		'cat'            => $cat_content_id,
		'posts_per_page' => absint( 4 ),
	);
}

$query = new WP_Query( $args );
if ( $query->have_posts() ) {
	?>

	<div id="complete_blog_banner_section" class="frontpage banner-section style-1">
		<div class="theme-wrapper">
			<div class="banner-style-1-wrapper">
				<div class="banner-post-wrapper adore-navigation">
					<?php
					while ( $query->have_posts() ) :
						$query->the_post();
						?>
						<div class="banner-carousel">
							<div class="post-item overlay-post" style="background-image: url('<?php echo esc_url( get_the_post_thumbnail_url( get_the_ID(), 'post-thumbnail' ) ); ?>');">
								<div class="post-overlay">
									<div class="post-item-content">
										<div class="entry-cat overlay-cat">
											<?php the_category( '', '', get_the_ID() ); ?>
										</div>
										<h2 class="entry-title">
											<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
										</h2>
										<ul class="entry-meta">
											<li class="post-author"> <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><i class="far fa-user"></i><?php echo esc_html( get_the_author() ); ?></a></li>
											<li class="post-date"><i class="far fa-calendar-alt"></i></span><?php echo esc_html( get_the_date() ); ?></li>
											<li class="reading-time"><i class="far fa-clock"></i>
												<?php
												echo complete_blog_time_interval( get_the_content() );
												echo esc_html__( ' min read', 'complete-blog' );
												?>
											</li>
										</ul>
									</div>   
								</div>
							</div>
						</div>
						<?php
					endwhile;
					wp_reset_postdata();
					?>
				</div>
				<div class="banner-thumb-wrapper">
					<?php
					while ( $query->have_posts() ) :
						$query->the_post();
						?>
						<div class="thumb-item">
							<div class="thumb-image">
								<?php the_post_thumbnail(); ?>							
							</div>
						</div>
						<?php
					endwhile;
					wp_reset_postdata();
					?>
				</div>
			</div>
		</div>
	</div>

	<?php
}
