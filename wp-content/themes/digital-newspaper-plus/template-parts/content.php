<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Digital Newspaper
 */
use Digital_Newspaper\CustomizerDefault as DN;
$archive_page_layout = DN\digital_newspaper_get_customizer_option( 'archive_page_layout' );
if( $archive_page_layout == 'six' ) :
?>
    <article id="post-<?php the_ID(); ?>" <?php post_class('post'); ?>>
        <div class="blaze_box_wrap">
            <div class="post-element">
                <div class="card-header">
                    <?php
                        digital_newspaper_get_post_categories(get_the_ID(), 0);
                        digital_newspaper_posted_on();
                    ?>
                </div>
                <h2 class="post-title"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
                <div class="post-excerpt"><?php the_excerpt(); ?></div>
                <div class="card-footer">
                    <?php
                        do_action( 'digital_newspaper_section_block_view_all_hook', array(
                            'option'    => true
                        ));
                    ?>
                    <div class="post-meta">
                        <?php
                            digital_newspaper_posted_by();
                            digital_newspaper_comments_number();
                            echo '<span class="read-time">' .digital_newspaper_post_read_time( get_the_content() ). ' ' .esc_html__( 'mins', 'digital-newspaper' ). '</span>';
                        ?>
                    </div>
                </div>
            </div>
            <figure class="post-thumb-wrap <?php if(!has_post_thumbnail()){ echo esc_attr('no-feat-img');} ?>">
                <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                    <?php
                        if( has_post_thumbnail() ) { 
                            the_post_thumbnail( 'digital-newspaper-list', array(
                                'title' => the_title_attribute(array(
                                    'echo'  => false
                                ))
                            ));
                        }
                    ?>
                </a>
            </figure>
        </div>
    </article><!-- #post-<?php the_ID(); ?> -->
<?php
else:
?>
    <article id="post-<?php the_ID(); ?>" <?php post_class('post'); ?>>
        <div class="blaze_box_wrap">
            <figure class="post-thumb-wrap <?php if(!has_post_thumbnail()){ echo esc_attr('no-feat-img');} ?>">
                <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                    <?php
                        if( has_post_thumbnail() ) { 
                            the_post_thumbnail( 'digital-newspaper-list', array(
                                'title' => the_title_attribute(array(
                                    'echo'  => false
                                ))
                            ));
                        }
                    ?>
                </a>
                <?php digital_newspaper_get_post_categories(get_the_ID(), 0); ?>
            </figure>
            <div class="post-element">
                <h2 class="post-title"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
                <div class="post-meta">
                    <?php
                        digital_newspaper_posted_by();
                        digital_newspaper_posted_on();
                        digital_newspaper_comments_number();
                        echo '<span class="read-time">' .digital_newspaper_post_read_time( get_the_content() ). ' ' .esc_html__( 'mins', 'digital-newspaper' ). '</span>';
                    ?>
                </div>
                <div class="post-excerpt"><?php the_excerpt(); ?></div>
                <?php
                    do_action( 'digital_newspaper_section_block_view_all_hook', array(
                        'option'    => true
                    ));
                ?>
            </div>
        </div>
    </article><!-- #post-<?php the_ID(); ?> -->
<?php
endif;
?>