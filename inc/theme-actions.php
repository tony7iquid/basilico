<?php 
/**
 * Actions Hook for the theme
 *
 * @package Basilico
 */
 
add_action('after_setup_theme', 'basilico_setup');
function basilico_setup(){
    //Set the content width in pixels, based on the theme's design and stylesheet.
    $GLOBALS['content_width'] = apply_filters( 'basilico_content_width', 1200 );

    // Make theme available for translation.
    load_theme_textdomain( 'basilico', get_template_directory() . '/languages' );

    // Custom Header
    add_theme_support( 'custom-header' );

    // Add default posts and comments RSS feed links to head.
    add_theme_support( 'automatic-feed-links' );

    // Let WordPress manage the document title.
    add_theme_support( 'title-tag' );

    // Enable support for Post Thumbnails on posts and pages.
    add_theme_support( 'post-thumbnails' );

    // Set post thumbnail size.
    set_post_thumbnail_size( 1170, 560 );
    $custom_sizes = basilico_configs('custom_sizes'); 
    foreach ($custom_sizes as $option => $values) {
        add_image_size( $option, $values[0], $values[1], $values[2] );
    }
   
    // This theme uses wp_nav_menu() in one location.
    register_nav_menus( array(
        'primary' => esc_html__( 'Primary', 'basilico' ),
    ) );

    // Add theme support for selective refresh for widgets.
    add_theme_support( 'customize-selective-refresh-widgets' );

    // Add support for core custom logo.
    add_theme_support( 'custom-logo', array(
        'height'      => 250,
        'width'       => 250,
        'flex-width'  => true,
        'flex-height' => true,
    ) );
    // Post formats
    add_theme_support( 'post-formats', array(
        'video',
        'audio',
        'quote',
        'link',
    ) );

    // Enable support for Post Thumbnails on posts and pages.
    add_theme_support('post-thumbnails');
    add_theme_support( 'woocommerce' );
    add_theme_support( 'wc-product-gallery-zoom' );
    add_theme_support( 'wc-product-gallery-lightbox' );
    add_theme_support( 'wc-product-gallery-slider' );
    remove_theme_support('widgets-block-editor');

}

/**
 * Register Widgets Position.
 */
add_action( 'widgets_init', 'basilico_widgets_position' );
function basilico_widgets_position() {
	register_sidebar( array(
		'name'          => esc_html__( 'Blog Sidebar', 'basilico' ),
		'id'            => 'sidebar-blog',
		'before_widget' => '<section id="%1$s" class="widget %2$s"><div class="widget-content">',
		'after_widget'  => '</div></section>',
		'before_title'  => '<h3 class="widget-title"><span>',
		'after_title'   => '</span></h3>',
	) );
     
	if (class_exists('ReduxFramework') && class_exists('Pxltheme_Core')) {
		register_sidebar( array(
			'name'          => esc_html__( 'Page Sidebar', 'basilico' ),
			'id'            => 'sidebar-page',
			'before_widget' => '<section id="%1$s" class="widget %2$s"><div class="widget-content">',
			'after_widget'  => '</div></section>',
			'before_title'  => '<h3 class="widget-title"><span>',
			'after_title'   => '</span></h3>',
		) );
	}

	if ( class_exists( 'Woocommerce' ) ) {
		register_sidebar( array(
			'name'          => esc_html__( 'Shop Sidebar', 'basilico' ),
			'id'            => 'sidebar-shop',
			'before_widget' => '<section id="%1$s" class="widget %2$s"><div class="widget-content">',
			'after_widget'  => '</div></section>',
			'before_title'  => '<h3 class="widget-title"><span>',
			'after_title'   => '</span></h3>',
		) );
	}
}

/**
 * Enqueue Styles Scripts : Front-End
 */
add_action( 'wp_enqueue_scripts', 'basilico_scripts' );
function basilico_scripts() {
    $js_variables = array(
        'ajaxurl'          => admin_url( 'admin-ajax.php' ),
        'pxl_ajax_url'     => class_exists('Basilico_Ajax') ? Basilico_Ajax::get_endpoint( '%%endpoint%%' ) : '#',
        'shop_base_url'    => class_exists('Basilico_Woo') ? esc_url(basilco()->woo->get_shop_base_url()) : '#',
        'lg_share'         => utero()->get_theme_opt('lg_share'),
        'lg_zoom'          => utero()->get_theme_opt('lg_zoom'),
        'lg_full_screen'   => utero()->get_theme_opt('lg_full_screen'),
        'lg_download'      => utero()->get_theme_opt('lg_download'),
        'lg_auto_play'     => utero()->get_theme_opt('lg_auto_play'),
        'lg_thumbnail'     => utero()->get_theme_opt('lg_thumbnail'),
        'variation_alert'  => esc_html__( 'Please select some product options before add to cart or buy now', 'utero' ),
        'is_single'                  => is_singular(),
        'post_id'                    => is_singular() ? get_the_ID() : 0,
        'post_type'                  => get_post_type(),
        'nonce'                      => wp_create_nonce( 'basilico-security' ),
        'apply_coupon_nonce'         => wp_create_nonce( 'apply-coupon' ),
        'is_checkout_page'           => class_exists('Woocommerce') ? is_checkout() : '',
        'i18l'                      => [
            'no_matched_found' => esc_html( _x( 'No matched found', 'enhanced select', 'utero' ) ),
            'all'            => esc_html__( 'All %s', 'utero' ),
        ],
    );

    /* Icons Lib */
    wp_enqueue_style( 'basilico-icon', get_template_directory_uri() . '/assets/fonts/pixelart/style.css', array(), '1.0.0');
    wp_enqueue_style( 'flaticon', get_template_directory_uri() . '/assets/fonts/flaticon/css/flaticon.css', array(), '1.0.0');
    wp_enqueue_style( 'material', get_template_directory_uri() . '/assets/fonts/material/css/font-material.min.css', array(), '1.0.0');
    wp_enqueue_style( 'magnific-popup', get_template_directory_uri() . '/assets/css/magnific-popup.css', array(), '1.0.0' );
	wp_enqueue_style( 'basilico-grid', get_template_directory_uri() . '/assets/css/grid.css', array(), basilico()->get_version() );
    wp_enqueue_style( 'slick', get_template_directory_uri() . '/assets/css/slick.css', array(), '1.8.1' );
	wp_enqueue_style( 'basilico-style', get_template_directory_uri() . '/assets/css/style.css', array(), basilico()->get_version() );
	wp_add_inline_style( 'basilico-style', basilico_inline_styles() );
    wp_enqueue_style( 'basilico-base', get_template_directory_uri() . '/style.css', array(), basilico()->get_version() );
	wp_enqueue_style( 'basilico-google-fonts', basilico_fonts_url(), array(), null );

    wp_enqueue_script( 'gsap', get_template_directory_uri() . '/assets/js/gsap.min.js', array( 'jquery' ), basilico()->get_version(), true );
    wp_enqueue_script( 'ScrollTrigger', get_template_directory_uri() . '/assets/js/ScrollTrigger.min.js', array( 'jquery' ), basilico()->get_version(), true );
    wp_enqueue_script( 'tilt', get_template_directory_uri() . '/assets/js/tilt.jquery.min.js', array( 'jquery' ), basilico()->get_version(), true );
    wp_enqueue_script( 'magnific-popup', get_template_directory_uri() . '/assets/js/magnific-popup.min.js', array( 'jquery' ), '1.0.0', true );
    wp_enqueue_script('slick', get_template_directory_uri() . '/assets/js/slick.min.js', array('jquery'), '1.8.1', true);
    wp_enqueue_script('nice-select', get_template_directory_uri() . '/assets/js/nice-select.min.js', array('jquery'), '1.1.0', true);
    wp_enqueue_script( 'basilico-main', get_template_directory_uri() . '/assets/js/theme.js', array( 'jquery' ), basilico()->get_version(), true );
    wp_localize_script( 'basilico-main', 'main_data', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
    $smoothscroll = basilico()->get_theme_opt( 'smoothscroll', false );
    if(isset($smoothscroll) && $smoothscroll) {
        wp_enqueue_script('basilico-customizer', get_template_directory_uri() . '/assets/js/customizer.js', array('jquery'), '1.0.0', true);
    }
    wp_localize_script( 'basilico-main', 'main_data', $js_variables );
    do_action( 'basilico_scripts');
}

/**
 * Enqueue Styles Scripts : Back-End
 */
add_action('admin_enqueue_scripts', 'basilico_admin_style');
function basilico_admin_style() {
    wp_enqueue_style('basilico-admin', get_template_directory_uri() . '/assets/css/admin.css', array(), '1.0.0');
    wp_enqueue_style('basilico-icon', get_template_directory_uri() . '/assets/fonts/pixelart/style.css', array(), '1.0.0');
    wp_enqueue_style('flaticon', get_template_directory_uri() . '/assets/fonts/flaticon/css/flaticon.css', array(), '1.0.0');
    wp_enqueue_style('material', get_template_directory_uri() . '/assets/fonts/material/css/font-material.min.css', array(), '1.0.0');
    wp_enqueue_script( 'admin-widget', get_template_directory_uri() . '/inc/admin/assets/js/widget.js', array( 'jquery' ), array( 'jquery' ), '1.0.0', true );
}

add_action( 'elementor/editor/before_enqueue_scripts', function() {
    wp_enqueue_style( 'basilico-custom-editor', get_template_directory_uri() . '/assets/css/custom-editor.css', array(), '1.0.0' );
    wp_enqueue_style( 'admin-basilico-icon', get_template_directory_uri() . '/assets/fonts/pixelart/style.css', array(), '1.0.0' );
    wp_enqueue_style( 'admin-flaticon', get_template_directory_uri() . '/assets/fonts/flaticon/css/flaticon.css', array(), '1.0.0' );
    wp_enqueue_style( 'admin-material', get_template_directory_uri() . '/assets/fonts/material/css/font-material.min.css', array(), '1.0.0' );
} );

//* Favicon
add_action('wp_head', 'basilico_site_favicon');
function basilico_site_favicon(){
    $favicon = basilico()->get_theme_opt( 'favicon' );
    if(!empty($favicon['url']))
        echo '<link rel="icon" type="image/png" href="'.esc_url($favicon['url']).'"/>';
}

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
add_action( 'wp_head', 'basilico_pingback_header' );
function basilico_pingback_header(){
    if ( is_singular() && pings_open() )
    {
        echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
    }
}

add_action( 'elementor/preview/enqueue_styles', 'basilico_add_editor_preview_style' );
function basilico_add_editor_preview_style(){
    wp_add_inline_style( 'editor-preview', basilico_editor_preview_inline_styles() );
}
function basilico_editor_preview_inline_styles(){
    $theme_colors = basilico_configs('theme_colors');
    ob_start();
        echo '.elementor-edit-area-active{';
            foreach ($theme_colors as $color => $value) {
                printf('--%1$s-color: %2$s;', str_replace('#', '',$color),  $value['value']);
            }
        echo '}';
    return ob_get_clean();
}

/**
 * Add field subtitle to post.
 */
add_action( 'edit_form_after_title', 'basilico_add_subtitle_field' );
function basilico_add_subtitle_field() {
	global $post;

	$screen = get_current_screen();

	if ( in_array( $screen->id, array( 'acm-post' ) ) ) {

		$value = get_post_meta( $post->ID, 'post_subtitle', true );

		echo '<div class="subtitle"><input type="text" name="post_subtitle" value="' . esc_attr( $value ) . '" id="subtitle" placeholder = "' . esc_attr__( 'Subtitle', 'basilico' ) . '" style="width: 100%;margin-top: 4px;"></div>';
	}
}

add_action('wp_footer', 'basilico_backtotop',2);
function basilico_backtotop($args = []){
    $back_totop_on = basilico()->get_theme_opt('back_totop_on', true);
    if ('1' !== $back_totop_on) return;
    ?>
    <a href="javascript:void(0);" class="pxl-scroll-top"><i class="zmdi zmdi-long-arrow-up"></i></a>
<?php 
} 

add_action( 'pxltheme_anchor_target', 'basilico_hook_anchor_side_mobile_default');
function basilico_hook_anchor_side_mobile_default(){
    $header_mobile_layout = (int)basilico()->get_opt('header_mobile_layout'); 
    if( $header_mobile_layout > 0 ) return;
    ?>
    <nav class="pxl-hidden-template pos-left pxl-side-mobile">
        <div class="pxl-panel-header">
            <div class="panel-header-inner">
                <a href="#" class="pxl-close" data-target=".pxl-side-mobile" title="<?php echo esc_attr__( 'Close', 'basilico' ) ?>"></a>
            </div>
        </div> 
        <div class="pxl-panel-content custom_scroll">
            <div class="menu-main-container-wrap">
                <div id="mobile-menu-container" class="menu-main-container">
                    <?php 
                        if ( has_nav_menu( 'primary' ) ){
                            wp_nav_menu( 
                                array(
                                    'theme_location' => 'primary',
                                    'container'      => '',
                                    'menu_id'        => 'pxl-mobile-menu',
                                    'menu_class'     => 'pxl-mobile-menu clearfix',
                                    'link_before'    => '<span class="pxl-menu-title">',
                                    'link_after'     => '</span>',  
                                    'walker'         => '',
                                ) 
                            );
                        }else{
                            printf(
                                '<ul class="pxl-mobile-menu pxl-primary-menu primary-menu-not-set"><li><a href="%1$s">%2$s</a></li></ul>',
                                esc_url( admin_url( 'nav-menus.php' ) ),
                                esc_html__( 'Create New Menu', 'basilico' )
                            );
                        }
                    ?>
                </div>
            </div>
        </div>
    </nav>
    <?php 
}

add_action( 'pxltheme_anchor_target', 'basilico_hook_anchor_templates_hidden_panel');
function basilico_hook_anchor_templates_hidden_panel(){

    $hidden_templates = basilico_get_templates_slug('hidden-panel');
    if(empty($hidden_templates)) return;
    foreach ($hidden_templates as $slug => $values){
        $args = [
            'slug' => $slug,
            'post_id' => $values['post_id'],
            'position' => !empty($values['position']) ? $values['position'] : 'custom-pos'
        ];
        if( did_action('pxl_anchor_target_hidden_panel_'.$values['post_id']) <= 0){
            do_action( 'pxl_anchor_target_hidden_panel_'.$values['post_id'], $args );
        }
    }
}

function basilico_hook_anchor_hidden_panel($args){
    ?>
    <div class="pxl-hidden-template pxl-hidden-template-<?php echo esc_attr($args['post_id'])?> pos-<?php echo esc_attr($args['position']) ?>">
        <div class="pxl-hidden-template-wrap">
            <div class="pxl-panel-header">
                <div class="panel-header-inner">
                    <a href="#" class="pxl-close" title="<?php echo esc_attr__( 'Close', 'basilico' ) ?>"></a>
                </div>
            </div>
            <div class="pxl-panel-content custom_scroll">
                <?php echo Elementor\Plugin::$instance->frontend->get_builder_content_for_display( (int)$args['post_id']); ?>
            </div>
        </div>
    </div>
    <?php
}
function basilico_hook_anchor_custom(){
    return;
}

add_action( 'pxltheme_anchor_target', 'basilico_header_popup_cart');
function basilico_header_popup_cart(){  
    if(!class_exists('Woocommerce')) return;
    ?>
    <div class="pxl-hidden-template pxl-side-cart">
        <div class="pxl-hidden-template-wrap">
            <div class="pxl-panel-header">
                <div class="panel-header-inner">
                    <a href="#" class="pxl-close" title="<?php echo esc_attr__( 'Close', 'basilico' ) ?>"></a>
                </div>
            </div>
            <div class="pxl-side-panel-content widget_shopping_cart custom_scroll">
                <div class="cart-title">
                    <h3><?php echo esc_html__( 'Shopping Cart', 'basilico' ) ?></h3>
                </div>
                <div class="widget_shopping_cart_content">
                    <?php woocommerce_mini_cart(); ?>
                </div>
            </div>
        </div>
    </div>
    <?php
}

//* Custom archive link
function pxl_custom_archive_post_type_link() {
    $pxl_portfolio_archive_link = basilico()->get_theme_opt('pxl_portfolio_archive_link', '');
    $pxl_service_archive_link = basilico()->get_theme_opt('pxl_service_archive_link', '');
    if( is_post_type_archive( 'pxl-portfolio' ) && !empty($pxl_portfolio_archive_link) ) {
        wp_redirect( $pxl_portfolio_archive_link, 301 );
        exit();
    }
    if( is_post_type_archive( 'pxl-service' ) && !empty($pxl_service_archive_link) ) {
        wp_redirect( $pxl_service_archive_link, 301 );
        exit();
    }
}
add_action( 'template_redirect', 'pxl_custom_archive_post_type_link' );