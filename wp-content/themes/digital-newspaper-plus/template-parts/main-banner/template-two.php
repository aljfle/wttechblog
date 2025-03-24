<?php
/**
 * Main Banner template two
 * 
 * @package Digital Newspaper
 * @package Digital Newspaper Plus
 * @since 1.0.0
 */
use Digital_Newspaper\CustomizerDefault as DN;
$slider_args = apply_filters( 'digital_newspaper_query_args_filter', $args['slider_args'] );
?>
<div class="main-banner-wrap">
    <div class="main-banner-slider">
        <?php
            $slider_query = new WP_Query( $slider_args );
            if( $slider_query -> have_posts() ) :
                while( $slider_query -> have_posts() ) : $slider_query -> the_post();
                ?>
                    <article class="slide-item digital-newspaper-category-no-bk <?php if(!has_post_thumbnail()){ echo esc_attr('no-feat-img');} ?>">
                        <figure class="post-thumb">
                            <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                                <?php 
                                    if( has_post_thumbnail()) { 
                                        the_post_thumbnail('digital-newspaper-featured', array(
                                            'title' => the_title_attribute(array(
                                                'echo'  => false
                                            ))
                                        ));
                                    }
                                ?>
                            </a>
                        </figure>
                        <div class="post-element">
                            <div class="post-meta">
                                <?php digital_newspaper_get_post_categories( get_the_ID(), 2 ); ?>
                                <?php digital_newspaper_posted_on(); ?>
                            </div>
                            <h2 class="post-title"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
                            <div class="post-excerpt"><?php the_excerpt(); ?></div>
                            <?php
                                /**
                                 * hook - digital_newspaper_main_banner_post_append_hook
                                 * 
                                 */
                                do_action('digital_newspaper_main_banner_post_append_hook', get_the_ID());
                            ?>
                        </div>
                    </article>
                <?php
                endwhile;
            endif;
        ?>
    </div>
</div>
<?php
    // Slider direction
    $digital_newspaper_slider_direction = DN\digital_newspaper_get_customizer_option('main_banner_popular_posts_direction');
    $digital_newspaper_slider = 'digital_newspaper_vertical_slider';
    if( $digital_newspaper_slider_direction == 'false' ) {
        $digital_newspaper_slider = 'digital_newspaper_horizontal_slider';
    }
?>
<div class="main-banner-popular-posts <?php echo esc_attr($digital_newspaper_slider); ?>">
    <h2 class="section-title"><?php echo esc_html( DN\digital_newspaper_get_customizer_option( 'main_banner_popular_posts_title' ) ); ?></h2>
    <div class="popular-posts-wrap" data-auto="true" data-arrows="true" data-vertical="<?php echo esc_attr( $digital_newspaper_slider_direction ); ?>">
        <?php
            $main_banner_popular_posts_categories = json_decode( DN\digital_newspaper_get_customizer_option( 'main_banner_popular_posts_categories' ) );
            $popular_posts_args = array(
                'numberposts' => -1,
                'category_name' => digital_newspaper_get_categories_for_args($main_banner_popular_posts_categories)
            );
            if( ! $main_banner_popular_posts_categories ) $popular_posts_args['numberposts'] = 8;
            $popular_posts_args = apply_filters( 'digital_newspaper_query_args_filter', $popular_posts_args );
            $popular_posts = get_posts( $popular_posts_args );
            if( $popular_posts ) :
                $total_posts = sizeof($popular_posts);
                foreach( $popular_posts as $popular_post_key => $popular_post ) :
                    $popular_post_id  = $popular_post->ID;
                    if( $digital_newspaper_slider_direction == 'false' ) {
                        if( ( $popular_post_key % 4 ) == 0 ) echo '<div class="digital-newspaper-slick-slide-wrap">';
                    }
                ?>
                        <article class="post-item digital-newspaper-category-no-bk <?php if(!has_post_thumbnail($popular_post_id)){ echo esc_attr(' no-feat-img');} ?>">
                            <figure class="post-thumb">
                                <span class="post-count"><?php echo absint( $popular_post_key+1 ); ?></span>
                                <?php if( has_post_thumbnail($popular_post_id) ): ?> 
                                    <a href="<?php echo esc_url(get_the_permalink($popular_post_id)); ?>">
                                        <img src="<?php echo esc_url( get_the_post_thumbnail_url($popular_post_id, 'digital-newspaper-thumb') ); ?>"/>
                                    </a>
                                <?php endif; ?>
                            </figure>
                            <div class="post-element">
                                <h2 class="post-title"><a href="<?php the_permalink($popular_post_id); ?>"><?php echo wp_kses(get_the_title($popular_post_id), [ 'em' => [], 'strong' => [], 'span' => [], 'br' => [] ] ); ?></a></h2>
                                <div class="post-meta">
                                    <?php digital_newspaper_get_post_categories( $popular_post_id, 2 ); ?>
                                </div>
                            </div>
                        </article>
                <?php
                    if( $digital_newspaper_slider_direction == 'false' ) {
                        if( ( $popular_post_key % 4 ) == 3 || ( $popular_post_key + 1 ) == $total_posts ) echo '</div><!-- .digital-newspaper-slick-slide-wrap -->';
                    }
                endforeach;
            endif;
        ?>
    </div>
</div>