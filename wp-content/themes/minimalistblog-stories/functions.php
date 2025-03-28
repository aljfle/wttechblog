<?php 
add_action( 'wp_enqueue_scripts', 'minimalistblog_stories_enqueue_styles' );
function minimalistblog_stories_enqueue_styles() {
	wp_enqueue_style( 'minimalistblog-stories-parent-style', get_template_directory_uri() . '/style.css' ); 
}

function minimalistblog_stories_category_title( $title ) {
    if ( is_category() ) {
        $title = single_cat_title( '', false );
    }
    return $title;
}
add_filter( 'get_the_archive_title', 'minimalistblog_stories_category_title' );

function minimalistblog_stories_enqueue_assets() {
    require_once get_theme_file_path( 'webfont-loader/wptt-webfont-loader.php' );
    wp_enqueue_style(
        'minimalistblog-stories',
        get_stylesheet_directory_uri() . '/style.css',
        array(),
        '1.0'
    );
    wp_enqueue_style(
        'Playfair Display',
        wptt_get_webfont_url( 'https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap' ),
        array(),
        ''
    );
}
add_action( 'wp_enqueue_scripts', 'minimalistblog_stories_enqueue_assets' );




function minimalistblog_stories_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	$wp_customize->get_section('header_image')->title = __( 'Header Settings', 'minimalistblog-stories' );
	$wp_customize->remove_section("colors");

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'minimalistblog_stories_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'minimalistblog_stories_customize_partial_blogdescription',
		) );
	}
	$wp_customize->add_section( 'image_banner', array(
		'title'      => __('Image Banner','minimalistblog-stories'),
		'priority'   => 1,
		'capability' => 'edit_theme_options',
	) );
	$wp_customize->add_setting( 'imagebanner_text_color', array(
		'default'           => '#fff',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'imagebanner_text_color', array(
		'label'       => __( 'Text Color', 'minimalistblog-stories' ),
		'section'     => 'image_banner',
		'priority'   => 1,
		'settings'    => 'imagebanner_text_color',
	) ) );
	$wp_customize->add_setting( 'imagebanner_background_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'imagebanner_background_color', array(
		'label'       => __( 'Background Color', 'minimalistblog-stories' ),
		'section'     => 'image_banner',
		'priority'   => 1,
		'settings'    => 'imagebanner_background_color',
	) ) );
	$wp_customize->add_setting( 'banner_img_firsttext', array(
		'type'              => 'theme_mod',
		'sanitize_callback' => 'sanitize_text_field',
		'capability'        => 'edit_theme_options',
	) );
	$wp_customize->add_control( 'banner_img_firsttext', array(
		'label'    => __( "Text Before Title", 'minimalistblog-stories' ),
		'section'  => 'image_banner',
		'type'     => 'text',
		'priority' => 1,
	) );
	$wp_customize->add_setting( 'banner_img_secondtext', array(
		'type'              => 'theme_mod',
		'sanitize_callback' => 'sanitize_text_field',
		'capability'        => 'edit_theme_options',
	) );
	$wp_customize->add_control( 'banner_img_secondtext', array(
		'label'    => __( "Title", 'minimalistblog-stories' ),
		'section'  => 'image_banner',
		'type'     => 'text',
		'priority' => 1,
	) );
	$wp_customize->add_setting( 'banner_img_thidtext', array(
		'type'              => 'theme_mod',
		'sanitize_callback' => 'sanitize_text_field',
		'capability'        => 'edit_theme_options',
	) );
	$wp_customize->add_control( 'banner_img_thidtext', array(
		'label'    => __( "Text After Title", 'minimalistblog-stories' ),
		'section'  => 'image_banner',
		'type'     => 'text',
		'priority' => 1,
	) );
	$wp_customize->add_setting('img_banner_bg_img', array(
		'transport'         => 'refresh',
		'sanitize_callback' => 'esc_url_raw',
	));
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'image_banner_bgimage', array(
		'label'             => __('Background Image', 'minimalistblog-stories'),
		'section'           => 'image_banner',
		'settings'          => 'img_banner_bg_img',    
	)));
	$wp_customize->add_setting( 'img_banner_link', array(
		'type'              => 'theme_mod',
		'sanitize_callback' => 'esc_url_raw',
		'capability'        => 'edit_theme_options',
	) );
	$wp_customize->add_control( 'img_banner_link', array(
		'label'    => __( "Text link", 'minimalistblog-stories' ),
		'section'  => 'image_banner',
		'type'     => 'text',
		'description'     => 'Do you want the banner text to link to something? Then type in the URL here:',
		'priority' => 1,
	) );
	$wp_customize->add_setting( 'header_logo_color', array(
		'default'           => '#000',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_logo_color', array(
		'label'       => __( 'Header Logo Color', 'minimalistblog-stories' ),
		'section'     => 'header_image',
		'priority'   => 1,
		'settings'    => 'header_logo_color',
	) ) );

	$wp_customize->add_setting( 'header_background_color', array(
		'default'           => '#fff',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_background_color', array(
		'label'       => __( 'Header Background Color', 'minimalistblog-stories' ),
		'section'     => 'header_image',
		'priority'   => 1,
		'settings'    => 'header_background_color',
	) ) );
}
add_action( 'customize_register', 'minimalistblog_stories_customize_register', 999 );
if(! function_exists('minimalistblog_stories_customizer_css_final_output' ) ):
	function minimalistblog_stories_customizer_css_final_output(){
		?>
		<style type="text/css">
			<?php if ( get_theme_mod( 'activate_sticky_header' ) == '1' ) : ?>
				header#masthead { position: fixed; top: 0; z-index: 9999; }
			<?php endif; ?>
			<?php if ( get_theme_mod( 'show_wc_cart' ) == '1' ) : ?>
				<?php if ( class_exists( 'WooCommerce' ) ) : ?>
					@media screen and (max-width: 1023px){ .super-menu-inner .toggle-mobile-menu { max-width:65px; } .super-menu-inner a#pull{ margin-top: 6px; } a.cart-customlocation { min-width: 0px; } } @media screen and (min-width: 1023px){ .center-main-menu { position: relative; } .cart-header { position: absolute; right: 0; } }
				<?php endif; ?>
			<?php endif; ?>
			body, .site, .swidgets-wrap h3, .post-data-text { background: <?php echo esc_attr(get_theme_mod( 'website_background_color')); ?>; }
			.site-title a, .site-description { color: <?php echo esc_attr(get_theme_mod( 'header_logo_color')); ?>; }
			.sheader { background-color: <?php echo esc_attr(get_theme_mod( 'header_background_color')); ?>; }
			.super-menu, #smobile-menu, .primary-menu, .primary-menu ul li ul.children, .primary-menu ul li ul.sub-menu { background-color: <?php echo esc_attr(get_theme_mod( 'navigation_background_color')); ?>; }
			.main-navigation ul li a, .main-navigation ul li .sub-arrow, .super-menu .toggle-mobile-menu,.toggle-mobile-menu:before, .mobile-menu-active .smenu-hide { color: <?php echo esc_attr(get_theme_mod( 'navigation_text_color')); ?>; }
			#smobile-menu.show .main-navigation ul ul.children.active, #smobile-menu.show .main-navigation ul ul.sub-menu.active, #smobile-menu.show .main-navigation ul li, .smenu-hide.toggle-mobile-menu.menu-toggle, #smobile-menu.show .main-navigation ul li, .primary-menu ul li ul.children li, .primary-menu ul li ul.sub-menu li, .primary-menu .pmenu, .super-menu { border-color: <?php echo esc_attr(get_theme_mod( 'navigation_border_color')); ?>; border-bottom-color: <?php echo esc_attr(get_theme_mod( 'navigation_border_color')); ?>; }
			#secondary .widget h3, #secondary .widget h3 a, #secondary .widget h4, #secondary .widget h1, #secondary .widget h2, #secondary .widget h5, #secondary .widget h6 { color: <?php echo esc_attr(get_theme_mod( 'sidebar_headline_color')); ?>; }
			#secondary .widget a, #secondary a, #secondary .widget li a , #secondary span.sub-arrow{ color: <?php echo esc_attr(get_theme_mod( 'sidebar_link_color')); ?>; }
			#secondary, #secondary .widget, #secondary .widget p, #secondary .widget li, .widget time.rpwe-time.published { color: <?php echo esc_attr(get_theme_mod( 'sidebar_text_color')); ?>; }
			#secondary .swidgets-wrap, #secondary .widget ul li, .featured-sidebar .search-field { border-color: <?php echo esc_attr(get_theme_mod( 'sidebar_border_color')); ?>; }
			.site-info, .footer-column-three input.search-submit, .footer-column-three p, .footer-column-three li, .footer-column-three td, .footer-column-three th, .footer-column-three caption { color: <?php echo esc_attr(get_theme_mod( 'footer_text_color')); ?>; }
			.footer-column-three h3, .footer-column-three h4, .footer-column-three h5, .footer-column-three h6, .footer-column-three h1, .footer-column-three h2, .footer-column-three h4, .footer-column-three h3 a { color: <?php echo esc_attr(get_theme_mod( 'footer_headline_color')); ?>; }
			.footer-column-three a, .footer-column-three li a, .footer-column-three .widget a, .footer-column-three .sub-arrow { color: <?php echo esc_attr(get_theme_mod( 'footer_link_color')); ?>; }
			.footer-column-three h3:after { background: <?php echo esc_attr(get_theme_mod( 'footer_border_color')); ?>; }
			.site-info, .widget ul li, .footer-column-three input.search-field, .footer-column-three input.search-submit { border-color: <?php echo esc_attr(get_theme_mod( 'footer_border_color')); ?>; }
			.site-footer { background-color: <?php echo esc_attr(get_theme_mod( 'footer_background_color')); ?>; }
			.archive .page-header h1, .blogposts-list h2 a, .blogposts-list h2 a:hover, .blogposts-list h2 a:active, .search-results h1.page-title { color: <?php echo esc_attr(get_theme_mod( 'blogfeed_headline_color')); ?>; }
			.blogposts-list .post-data-text, .blogposts-list .post-data-text a{ color: <?php echo esc_attr(get_theme_mod( 'blogfeed_byline_color')); ?>; }
			.blog .tag-cat-container, .blog .tag-cat-container a, .blogposts-list p { color: <?php echo esc_attr(get_theme_mod( 'blogfeed_text_color')); ?>; }
			.page-numbers li a, .blogposts-list .blogpost-button { background: <?php echo esc_attr(get_theme_mod( 'blogfeed_buttonbg_color')); ?>; }
			.page-numbers li a, .blogposts-list .blogpost-button, span.page-numbers.dots, .page-numbers.current, .page-numbers li a:hover { color: <?php echo esc_attr(get_theme_mod( 'blogfeed_buttontext_color')); ?>; }
			.blog .tag-cat-container a, .archive .page-header h1, .search-results h1.page-title, .blogposts-list.fbox, span.page-numbers.dots, .page-numbers li a, .page-numbers.current { border-color: <?php echo esc_attr(get_theme_mod( 'blogfeed_border_color')); ?>; }
			.blogposts-list .post-data-divider { background: <?php echo esc_attr(get_theme_mod( 'blogfeed_border_color')); ?>; }
			.page .comments-area .comment-author, .page .comments-area .comment-author a, .page .comments-area .comments-title, .page .content-area h1, .page .content-area h2, .page .content-area h3, .page .content-area h4, .page .content-area h5, .page .content-area h6, .page .content-area th, .single  .comments-area .comment-author, .single .comments-area .comment-author a, .single .comments-area .comments-title, .single .content-area h1, .single .content-area h2, .single .content-area h3, .single .content-area h4, .single .content-area h5, .single .content-area h6, .single .content-area th, .search-no-results h1, .error404 h1 { color: <?php echo esc_attr(get_theme_mod( 'postpage_headline_color')); ?>; }
			.single .post-data-text, .page .post-data-text, .page .post-data-text a, .single .post-data-text a, .comments-area .comment-meta .comment-metadata a { color: <?php echo esc_attr(get_theme_mod( 'postpage_byline_color')); ?>; }
			.page .content-area p, .page article, .page .content-area table, .page .content-area dd, .page .content-area dt, .page .content-area address, .page .content-area .entry-content, .page .content-area li, .page .content-area ol, .single .content-area p, .single article, .single .content-area table, .single .content-area dd, .single .content-area dt, .single .content-area address, .single .entry-content, .single .content-area li, .single .content-area ol, .search-no-results .page-content p { color: <?php echo esc_attr(get_theme_mod( 'postpage_text_color')); ?>; }
			.single .tag-cat-container a, .page .tag-cat-container a, .single .entry-content a, .page .entry-content a, .comment-content a, .comments-area .reply a, .logged-in-as a, .comments-area .comment-respond a { color: <?php echo esc_attr(get_theme_mod( 'postpage_link_color')); ?>; }
			.comments-area p.form-submit input { background: <?php echo esc_attr(get_theme_mod( 'postpage_buttonbg_color')); ?>; }
			.error404 .page-content p, .error404 input.search-submit, .search-no-results input.search-submit { color: <?php echo esc_attr(get_theme_mod( 'postpage_text_color')); ?>; }
			.page .tag-cat-container a, .single .tag-cat-container a,.page .comments-area, .page article.fbox, .page article tr, .page .comments-area ol.comment-list ol.children li, .page .comments-area ol.comment-list .comment, .single .comments-area, .single article.fbox, .single article tr, .comments-area ol.comment-list ol.children li, .comments-area ol.comment-list .comment, .error404 main#main, .error404 .search-form label, .search-no-results .search-form label, .error404 input.search-submit, .search-no-results input.search-submit, .error404 main#main, .search-no-results section.fbox.no-results.not-found{ border-color: <?php echo esc_attr(get_theme_mod( 'postpage_border_color')); ?>; }
			.single .post-data-divider, .page .post-data-divider { background: <?php echo esc_attr(get_theme_mod( 'postpage_border_color')); ?>; }
			.single .comments-area p.form-submit input, .page .comments-area p.form-submit input { color: <?php echo esc_attr(get_theme_mod( 'postpage_buttontext_color')); ?>; }
			.bottom-header-wrapper { padding-top: <?php echo esc_attr(get_theme_mod( 'banner_img_top_padding')); ?>px; }
			.bottom-header-wrapper { padding-bottom: <?php echo esc_attr(get_theme_mod( 'banner_img_padding_bottom')); ?>px; }
			.bottom-header-wrapper { background: <?php echo esc_attr(get_theme_mod( 'imagebanner_background_color')); ?>; }
			.bottom-header-wrapper *{ color: <?php echo esc_attr(get_theme_mod( 'imagebanner_text_color')); ?>; }
			.header-widget a, .header-widget li a, .header-widget i.fa { color: <?php echo esc_attr(get_theme_mod( 'upperwidgets_link_color')); ?>; }
			.header-widget, .header-widget p, .header-widget li, .header-widget .textwidget { color: <?php echo esc_attr(get_theme_mod( 'upperwidgets_text_color')); ?>; }
			.header-widget .widget-title, .header-widget h1, .header-widget h3, .header-widget h2, .header-widget h4, .header-widget h5, .header-widget h6{ color: <?php echo esc_attr(get_theme_mod( 'upperwidgets_title_color')); ?>; }
			.header-widget.swidgets-wrap, .header-widget ul li, .header-widget .search-field { border-color: <?php echo esc_attr(get_theme_mod( 'upperwidgets_border_color')); ?>; }
		</style>
		
	<?php }
	add_action( 'wp_head', 'minimalistblog_stories_customizer_css_final_output' );
endif;

require get_stylesheet_directory() . '/inc/custom-header.php';