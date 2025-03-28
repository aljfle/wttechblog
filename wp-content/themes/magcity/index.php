<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @package magcity
 */

get_header();

if ( have_posts() ) : ?>

<section class="wp-main-section mppt-100 bg-color">
		<div class="container">

			<?php
	            $sidebar_position = get_theme_mod('magcity_sidebar_position', 'right');
	            if ($sidebar_position == 'left') {
	                $sidebar_position = 'has-left-sidebar';
	            } elseif ($sidebar_position == 'right') {
	                $sidebar_position = 'has-right-sidebar';
	            } elseif ($sidebar_position == 'no') {
	                $sidebar_position = 'no-sidebar';
	            }
            ?>

			<div class="row <?php echo esc_attr($sidebar_position); ?>">
				<div class="col-lg-8">
					<?php while ( have_posts() ) : the_post(); ?>
						<?php get_template_part( 'template-parts/content', get_post_type() ); ?>
					<?php endwhile; ?>
					
					<div class="pagination">
                        <nav class="Page navigation">
                            <div class="page-numbers">
                                <?php echo paginate_links(); ?>
                            </div>
                        </nav>
                    </div>
					
				</div>
				<?php
                if (($sidebar_position == 'has-left-sidebar') || ($sidebar_position == 'has-right-sidebar')) { ?>
					<div class="col-lg-4">
						<?php get_sidebar(); ?>
					</div>
				<?php } ?>
			</div> 
		</div> 
</section>
<?php endif; 
get_footer(); 
?>