<?php

use Elementor\Controls_Manager;
use Elementor\Embed;
use Elementor\Group_Control_Image_Size;

if (!function_exists('basilico_elements_scripts')) {
    add_action('basilico_scripts', 'basilico_elements_scripts');
    function basilico_elements_scripts(){
        wp_enqueue_style( 'e-animations');
        wp_register_style( 'odometer', get_template_directory_uri() . '/elements/assets/css/odometer-theme-default.css', array(), '1.1.0');
        wp_enqueue_script('basilico-elements', get_template_directory_uri() . '/elements/assets/js/pxl-elements.js', [ 'jquery' ], basilico()->get_version(), true);
        wp_register_script('basilico-tabs', get_template_directory_uri() . '/elements/assets/js/pxl-tabs.js', ['jquery'], basilico()->get_version(), true);
        wp_register_script('basilico-typewrite', get_template_directory_uri() . '/elements/assets/js/pxl-typewrite.js', ['jquery'], basilico()->get_version(), true);
        wp_enqueue_script('pxl-parallax-scroll', get_template_directory_uri() . '/elements/assets/js/parallax-scroll.js', [ 'jquery' ], basilico()->get_version(), true);
        wp_enqueue_script('pxl-parallax-background', get_template_directory_uri() . '/elements/assets/js/parallax-background.js', [ 'jquery' ], basilico()->get_version(), true);

        wp_register_script('basilico-post-grid', get_template_directory_uri() . '/elements/assets/js/pxl-post-grid.js', ['isotope', 'jquery'], basilico()->get_version(), true);
        wp_localize_script('basilico-post-grid', 'main_data', array('ajax_url' => admin_url('admin-ajax.php')));

        wp_register_script('basilico-swiper', get_template_directory_uri() . '/elements/assets/js/pxl-swiper-carousel.js', ['jquery'], basilico()->get_version(), true);
        wp_register_script('basilico-accordion', get_template_directory_uri() . '/elements/assets/js/pxl-accordion.js', [ 'jquery' ], basilico()->get_version(), true);
        wp_register_script('basilico-progressbar', get_template_directory_uri() . '/elements/assets/js/pxl-progressbar.js', [ 'jquery' ], basilico()->get_version(), true);
        wp_register_script('odometer', get_template_directory_uri() . '/elements/assets/js/odometer.min.js', [ 'jquery' ], basilico()->get_version(), true);
        wp_register_script('gsMotionPath', get_template_directory_uri() . '/elements/assets/js/gsMotionPath.js', [ 'jquery' ], basilico()->get_version(), true);
        wp_register_script('basilico-moving-path', get_template_directory_uri() . '/elements/assets/js/pxl-moving-path.js', [ 'jquery' ], basilico()->get_version(), true);
        wp_register_script('pie-chart', get_template_directory_uri() . '/elements/assets/js/pie-chart.min.js', [ 'jquery' ], basilico()->get_version(), true);
        wp_register_script('pxl-pie-chart', get_template_directory_uri() . '/elements/assets/js/pxl-pie-chart.js', [ 'jquery' ], basilico()->get_version(), true);
        wp_register_script('basilico-counter', get_template_directory_uri() . '/elements/assets/js/pxl-counter.js', [ 'jquery' ], basilico()->get_version(), true);
        wp_register_script('basilico-clock', get_template_directory_uri() . '/elements/assets/js/pxl-clock.js', [ 'jquery' ], basilico()->get_version(), true);
        wp_register_script('google-chart', get_template_directory_uri() . '/elements/assets/js/google-chart.js', [ 'jquery' ], basilico()->get_version(), true);
        wp_register_script('basilico-google-chart', get_template_directory_uri() . '/elements/assets/js/pxl-google-chart.js', [ 'jquery' ], basilico()->get_version(), true);
        wp_register_script('basilico-countdown', get_template_directory_uri() . '/elements/assets/js/pxl-countdown.js', [ 'jquery' ], basilico()->get_version(), true);
        wp_register_script('basilico-post-create', get_template_directory_uri() . '/elements/assets/js/pxl-post-create.js', [ 'jquery' ], basilico()->get_version(), true);
        wp_register_script('pxl-tabs-carousel', get_template_directory_uri() . '/elements/assets/js/pxl-tabs-carousel.js', [ 'jquery' ], basilico()->get_version(), true);
        /* Particles Background Libs */
        wp_register_script('particles-background', get_template_directory_uri() . '/elements/assets/js/particles.min.js', [ 'jquery' ], basilico()->get_version(), true);
    }
}
 
 
if (!function_exists('basilico_register_custom_icon_library')) {
    add_filter('elementor/icons_manager/native', 'basilico_register_custom_icon_library');
    function basilico_register_custom_icon_library($tabs){
        $custom_tabs = [
            'basilico' => [
                'name' => 'basilico',
                'label' => esc_html__('Basilico', 'basilico'),
                'url' => false,
                'enqueue' => false,
                'prefix' => 'pxli-',
                'displayPrefix' => 'pxli',
                'labelIcon' => 'fas fa-user-plus',
                'ver' => '1.0.0',
                'fetchJson' => get_template_directory_uri() . '/assets/fonts/pixelart/pixelarts.js',
                'native' => true,
            ],
            'flaticon' => [
                'name' => 'flaticon',
                'label' => esc_html__('Flaticon', 'basilico'),
                'url' => false,
                'enqueue' => false,
                'prefix' => 'flaticon-',
                'displayPrefix' => 'flaticon',
                'labelIcon' => 'fas fa-user-plus',
                'ver' => '1.0.0',
                'fetchJson' => get_template_directory_uri() . '/assets/fonts/flaticon/flaticon.js',
                'native' => true,
            ],
            'material' => [
                'name' => 'material',
                'label' => esc_html__( 'Material Design Iconic', 'basilico' ),
                'url' => false,
                'enqueue' => false,
                'prefix' => 'zmdi-',
                'displayPrefix' => 'zmdi',
                'labelIcon' => 'fas fa-user-plus',
                'ver' => '1.0.0',
                'fetchJson' => get_template_directory_uri() . '/assets/fonts/material/materialdesign.js',
                'native' => true,
            ],
        ];
        $tabs = array_merge($custom_tabs, $tabs);
        return $tabs;
    }
}

if (!function_exists('basilico_get_class_widget_path')) {
    function basilico_get_class_widget_path(){
        $upload_dir = wp_upload_dir();
        $cls_path = $upload_dir['basedir'] . '/elementor-widget/';
        if (!is_dir($cls_path)) {
            wp_mkdir_p($cls_path);
        }
        return $cls_path;
    }
}

function basilico_get_post_type_options($pt_supports = []){
    $post_types = get_post_types([
        'public' => true,
    ], 'objects');
    $excluded_post_type = [
        'page',
        'attachment',
        'revision',
        'nav_menu_item',
        'custom_css',
        'customize_changeset',
        'oembed_cache',
        'e-landing-page',
        'product',
        'elementor_library'
    ];

    $result_some = [];
    $result_any = [];
    if (!is_array($post_types))
        return $result;
    foreach ($post_types as $post_type) {
        if (!$post_type instanceof WP_Post_Type)
            continue;
        if (in_array($post_type->name, $excluded_post_type))
            continue;
        if (!empty($pt_supports) && in_array($post_type->name, $pt_supports)) {
            $result_some[$post_type->name] = $post_type->labels->singular_name;
        } else {
            $result_any[$post_type->name] = $post_type->labels->singular_name;
        }
    }
    if (!empty($pt_supports))
        return $result_some;
    else
        return $result_any;
}

//* post_grid functions
function basilico_get_post_grid_layout($pt_supports = []){
    $post_types = basilico_get_post_type_options($pt_supports);
    $result = [];
    if (!is_array($post_types))
        return $result;
    foreach ($post_types as $name => $label) {
        $result[] = array(
            'name' => 'layout_' . $name,
            'label' => sprintf(esc_html__('Select Templates of %s', 'basilico'), $label),
            'type' => 'layoutcontrol',
            'default' => 'post-1',
            'options' => basilico_get_grid_layout_options($name),
            'condition' => [
                'post_type' => [$name]
            ]
        );
    }
    return $result;
}

function basilico_get_grid_layout_options($posttype_name){
    $option_layouts = [];
    $theme_style = basilico()->get_theme_opt('theme_style', 'default');
    switch ($posttype_name) {
        case 'pxl-portfolio':
        $option_layouts = [
            'pxl-portfolio-1' => [
                'label' => esc_html__('Layout 1', 'basilico'),
                'image' => get_template_directory_uri() . '/elements/assets/layout-image/post_grid-pxl-portfolio-1.jpg'
            ],
            'pxl-portfolio-2' => [
                'label' => esc_html__('Layout 2', 'basilico'),
                'image' => get_template_directory_uri() . '/elements/assets/layout-image/post_grid-pxl-portfolio-2.jpg'
            ],
            'pxl-portfolio-3' => [
                'label' => esc_html__('Layout 3', 'basilico'),
                'image' => get_template_directory_uri() . '/elements/assets/layout-image/post_grid-pxl-portfolio-3.jpg'
            ],
            'pxl-portfolio-4' => [
                'label' => esc_html__('Layout 4', 'basilico'),
                'image' => get_template_directory_uri() . '/elements/assets/layout-image/post_grid-pxl-portfolio-4.jpg'
            ],
            'pxl-portfolio-5' => [
                'label' => esc_html__('Layout 5', 'basilico'),
                'image' => get_template_directory_uri() . '/elements/assets/layout-image/post_grid-pxl-portfolio-5.jpg'
            ],
        ];
        break;
        case 'post':
        $option_layouts = [
            'post-1' => [
                'label' => esc_html__('Layout 1', 'basilico'),
                'image' => get_template_directory_uri() . '/elements/assets/layout-image/post_grid-layout1.jpg'
            ],
        ];
        break;
    }
    return $option_layouts;
}

//* post_list functions
function basilico_get_post_list_layout($pt_supports = []){
    $post_types = basilico_get_post_type_options($pt_supports);
    $result = [];
    if (!is_array($post_types))
        return $result;
    foreach ($post_types as $name => $label) {
        $result[] = array(
            'name' => 'layout_' . $name,
            'label' => sprintf(esc_html__('Select Templates of %s', 'basilico'), $label),
            'type' => 'layoutcontrol',
            'default' => 'post-list-1',
            'options' => basilico_get_list_layout_options($name),
            'condition' => [
                'post_type' => [$name]
            ]
        );
    }
    return $result;
}

function basilico_get_list_layout_options($posttype_name){
    $option_layouts = [];
    switch ($posttype_name) {
        case 'pxl-portfolio':
            $option_layouts = [
                'pxl-portfolio-list-1' => [
                    'label' => esc_html__('Layout 1', 'basilico'),
                    'image' => get_template_directory_uri() . '/elements/assets/layout-image/post_list-pxl-portfolio-1.jpg'
                ],
            ];
            break;
        case 'post':
            $option_layouts = [
                'post-list-1' => [
                    'label' => esc_html__('Layout 1', 'basilico'),
                    'image' => get_template_directory_uri() . '/elements/assets/layout-image/post_list-layout1.jpg'
                ],
                'post-list-2' => [
                    'label' => esc_html__('Layout 2', 'basilico'),
                    'image' => get_template_directory_uri() . '/elements/assets/layout-image/post_list-layout2.jpg'
                ],
                'post-list-3' => [
                    'label' => esc_html__('Layout 3', 'basilico'),
                    'image' => get_template_directory_uri() . '/elements/assets/layout-image/post_list-layout3.jpg'
                ],
            ];
            break;
    }
    return $option_layouts;
}

//* post_create functions
function basilico_get_create_list_layout($pt_supports = []){
    $post_types = basilico_get_post_type_options($pt_supports);
    $result = [];
    if (!is_array($post_types))
        return $result;
    foreach ($post_types as $name => $label) {
        $result[] = array(
            'name' => 'layout_' . $name,
            'label' => sprintf(esc_html__('Select Templates of %s', 'basilico'), $label),
            'type' => 'layoutcontrol',
            'default' => 'post-create-1',
            'options' => basilico_get_create_layout_options($name),
            'condition' => [
                'post_type' => [$name]
            ]
        );
    }
    return $result;
}

function basilico_get_create_layout_options($posttype_name){
    $option_layouts = [];
    switch ($posttype_name) {
        case 'post':
            $option_layouts = [
                'post-create-1' => [
                    'label' => esc_html__('Layout 1', 'basilico'),
                    'image' => get_template_directory_uri() . '/elements/assets/layout-image/post_create-1.jpg'
                ],
            ];
            break;
    }
    return $option_layouts;
}

function basilico_get_grid_term_by_posttype($pt_supports = [], $args = []){
    $args = wp_parse_args($args, ['condition' => 'post_type', 'custom_condition' => []]);
    $post_types = basilico_get_post_type_options($pt_supports);
    $result = [];
    if (!is_array($post_types))
        return $result;
    foreach ($post_types as $name => $label) {

        $taxonomy = get_object_taxonomies($name, 'names');

        if ($name == 'post') $taxonomy = ['category'];
        if ($name == 'product') $taxonomy = ['product_cat'];

        $result[] = array(
            'name' => 'source_' . $name,
            'label' => sprintf(esc_html__('Select Term', 'basilico'), $label),
            'description' => esc_html__('Get all when no term selected', 'basilico'),
            'type' => Controls_Manager::SELECT2,
            'multiple' => true,
            'options' => pxl_get_grid_term_options($name, $taxonomy),
            'condition' => array_merge(
                [
                    $args['condition'] => [$name]
                ],
                $args['custom_condition']
            )
        );
    }

    return $result;
}

function basilico_get_grid_ids_by_posttype($pt_supports = [], $args = []){
    $args = wp_parse_args($args, ['condition' => 'post_type', 'custom_condition' => []]);
    $post_types = basilico_get_post_type_options($pt_supports);
    $result = [];
    if (!is_array($post_types))
        return $result;
    foreach ($post_types as $name => $label) {

        $posts = basilico_list_post($name, false);
 
        $result[] = array(
            'name' => 'source_' . $name . '_post_ids',
            'label' => sprintf(esc_html__('Select posts', 'basilico'), $label),
            'type' => Controls_Manager::SELECT2,
            'multiple' => true,
            'options' => $posts,
            'condition' => array_merge(
                [
                    $args['condition'] => [$name]
                ],
                $args['custom_condition']
            )
        );
    }

    return $result;
}

/* post_carousel functions */
function basilico_get_post_carousel_layout($pt_supports = []){
    $post_types = basilico_get_post_type_options($pt_supports);
    $result = [];
    if (!is_array($post_types))
        return $result;
    foreach ($post_types as $name => $label) {
        $result[] = array(
            'name' => 'layout_' . $name,
            'label' => sprintf(esc_html__('Select Templates of %s', 'basilico'), $label),
            'type' => 'layoutcontrol',
            'default' => 'post-1',
            'options' => basilico_get_carousel_layout_options($name),
            'prefix_class' => 'post-layout-',
            'condition' => [
                'post_type' => [$name]
            ]
        );
    }
    return $result;
}

function basilico_get_carousel_layout_options($posttype_name){
    $option_layouts = [];
    switch ($posttype_name) {
        case 'post':
            $option_layouts = [
                'post-1' => [
                    'label' => esc_html__('Layout 1', 'basilico'),
                    'image' => get_template_directory_uri() . '/elements/assets/layout-image/post_carousel-1.jpg'
                ],
                'post-2' => [
                    'label' => esc_html__('Layout 2', 'basilico'),
                    'image' => get_template_directory_uri() . '/elements/assets/layout-image/post_carousel-2.jpg'
                ],
            ];
            break;
        case 'pxl-portfolio':
            $option_layouts = [
                'pxl-portfolio-1' => [
                    'label' => esc_html__('Layout 1', 'basilico'),
                    'image' => get_template_directory_uri() . '/elements/assets/layout-image/post_carousel-pxl-portfolio-1.jpg'
                ],
                'pxl-portfolio-2' => [
                    'label' => esc_html__('Layout 2', 'basilico'),
                    'image' => get_template_directory_uri() . '/elements/assets/layout-image/post_carousel-pxl-portfolio-2.jpg'
                ],
                'pxl-portfolio-3' => [
                    'label' => esc_html__('Layout 3', 'basilico'),
                    'image' => get_template_directory_uri() . '/elements/assets/layout-image/post_carousel-pxl-portfolio-3.jpg'
                ],
                'pxl-portfolio-4' => [
                    'label' => esc_html__('Layout 4', 'basilico'),
                    'image' => get_template_directory_uri() . '/elements/assets/layout-image/post_carousel-pxl-portfolio-4.jpg'
                ],
                'pxl-portfolio-5' => [
                    'label' => esc_html__('Layout 5', 'basilico'),
                    'image' => get_template_directory_uri() . '/elements/assets/layout-image/post_carousel-pxl-portfolio-5.jpg'
                ],
                'pxl-portfolio-6' => [
                    'label' => esc_html__('Layout 6', 'basilico'),
                    'image' => get_template_directory_uri() . '/elements/assets/layout-image/post_carousel-pxl-portfolio-6.jpg'
                ],
                'pxl-portfolio-7' => [
                    'label' => esc_html__('Layout 7', 'basilico'),
                    'image' => get_template_directory_uri() . '/elements/assets/layout-image/post_carousel-pxl-portfolio-7.jpg'
                ],
                'pxl-portfolio-8' => [
                    'label' => esc_html__('Layout 8', 'basilico'),
                    'image' => get_template_directory_uri() . '/elements/assets/layout-image/post_carousel-pxl-portfolio-8.jpg'
                ],
                'pxl-portfolio-9' => [
                    'label' => esc_html__('Layout 9', 'basilico'),
                    'image' => get_template_directory_uri() . '/elements/assets/layout-image/post_carousel-pxl-portfolio-7.jpg'
                ],
            ];
            break;
        case 'pxl-service':
            $option_layouts = [
                'pxl-service-1' => [
                    'label' => esc_html__('Layout 1', 'basilico'),
                    'image' => get_template_directory_uri() . '/elements/assets/layout-image/post_carousel-1.jpg'
                ],
            ];
            break;
    }
    return $option_layouts;
}

function basilico_get_carousel_term_by_posttype($pt_supports = [], $args = []){
    $args = wp_parse_args($args, ['condition' => 'post_type', 'custom_condition' => []]);
    $post_types = basilico_get_post_type_options($pt_supports);
    $result = [];
    if (!is_array($post_types))
        return $result;
    foreach ($post_types as $name => $label) {

        $taxonomy = get_object_taxonomies($name, 'names');

        if ($name == 'post') $taxonomy = ['category'];
        if ($name == 'product') $taxonomy = ['product_cat'];

        $result[] = array(
            'name' => 'source_' . $name,
            'label' => sprintf(esc_html__('Select Term', 'basilico'), $label),
            'type' => Controls_Manager::SELECT2,
            'multiple' => true,
            'options' => pxl_get_grid_term_options($name, $taxonomy),
            'condition' => array_merge(
                [
                    $args['condition'] => [$name]
                ],
                $args['custom_condition']
            )
        );
    }

    return $result;
}

function basilico_get_carousel_ids_by_posttype($pt_supports = [], $args = []){
    $args = wp_parse_args($args, ['condition' => 'post_type', 'custom_condition' => []]);
    $post_types = basilico_get_post_type_options($pt_supports);
    $result = [];
    if (!is_array($post_types))
        return $result;
    foreach ($post_types as $name => $label) {

        $posts = basilico_list_post($name, false);
 
        $result[] = array(
            'name' => 'source_' . $name . '_post_ids',
            'label' => sprintf(esc_html__('Select posts', 'basilico'), $label),
            'type' => Controls_Manager::SELECT2,
            'multiple' => true,
            'options' => $posts,
            'condition' => array_merge(
                [
                    $args['condition'] => [$name]
                ],
                $args['custom_condition']
            )
        );
    }
    return $result;
}

 

/* grid columns setting */
function basilico_grid_column_settings(){
    $options = [
        '12' => '12',
        '6'  => '6',
        '5'  => '5',
        '4'  => '4',
        '3'  => '3',
        '2'  => '2',
        '1.5'  => '2/3',
        '1'  => '1'
    ];
    return array(
        array(
            'name'    => 'col_xs',
            'label'   => esc_html__( 'Extra Small <= 575', 'basilico' ),
            'type'    => \Elementor\Controls_Manager::SELECT,
            'default' => '1',
            'options' => $options
        ),
        array(
            'name'    => 'col_sm',
            'label'   => esc_html__( 'Small <= 767', 'basilico' ),
            'type'    => \Elementor\Controls_Manager::SELECT,
            'default' => '1',
            'options' => $options
        ),
        array(
            'name'    => 'col_md',
            'label'   => esc_html__( 'Medium <= 991', 'basilico' ),
            'type'    => \Elementor\Controls_Manager::SELECT,
            'default' => '2',
            'options' => $options
        ),
        array(
            'name'    => 'col_lg',
            'label'   => esc_html__( 'Large <= 1199', 'basilico' ),
            'type'    => \Elementor\Controls_Manager::SELECT,
            'default' => '2',
            'options' => $options
        ),
        array(
            'name'    => 'col_xl',
            'label'   => esc_html__( 'XL Devices >= 1200', 'basilico' ),
            'type'    => \Elementor\Controls_Manager::SELECT,
            'default' => '3',
            'options' => $options
        ),
        array(
            'name'    => 'col_xxl',
            'label'   => esc_html__( 'XXL Devices >= 1400', 'basilico' ),
            'type'    => \Elementor\Controls_Manager::SELECT,
            'default' => '3',
            'options' => $options
        )
    );
}

function basilico_grid_custom_column_settings(){
    $options = [
        '12' => '12',
        '6'  => '6',
        '5'  => '5',
        '4'  => '4',
        '3'  => '3',
        '2'  => '2',
        '1.5'  => '2/3',
        '1'  => '1'
    ];
    return array(
        array(
            'name'    => 'col_xs_c',
            'label'   => esc_html__( 'Extra Small <= 575', 'basilico' ),
            'type'    => \Elementor\Controls_Manager::SELECT,
            'default' => '1',
            'options' => $options
        ),
        array(
            'name'    => 'col_sm_c',
            'label'   => esc_html__( 'Small <= 767', 'basilico' ),
            'type'    => \Elementor\Controls_Manager::SELECT,
            'default' => '1',
            'options' => $options
        ),
        array(
            'name'    => 'col_md_c',
            'label'   => esc_html__( 'Medium <= 991', 'basilico' ),
            'type'    => \Elementor\Controls_Manager::SELECT,
            'default' => '2',
            'options' => $options
        ),
        array(
            'name'    => 'col_lg_c',
            'label'   => esc_html__( 'Large <= 1199', 'basilico' ),
            'type'    => \Elementor\Controls_Manager::SELECT,
            'default' => '2',
            'options' => $options
        ),
        array(
            'name'    => 'col_xl_c',
            'label'   => esc_html__( 'XL Devices >= 1200', 'basilico' ),
            'type'    => \Elementor\Controls_Manager::SELECT,
            'default' => '3',
            'options' => $options
        ),
        array(
            'name'    => 'col_xxl_c',
            'label'   => esc_html__( 'XXL Devices >= 1400', 'basilico' ),
            'type'    => \Elementor\Controls_Manager::SELECT,
            'default' => '3',
            'options' => $options
        )
    );
}

function basilico_carousel_column_settings(){
    $options = [
        '12' => '12',
        '6'  => '6',
        '5'  => '5',
        '4'  => '4',
        '3'  => '3',
        '2'  => '2',
        '1'  => '1'
    ];
    return array(
        array(
            'name'    => 'col_xs',
            'label'   => esc_html__( 'Extra Small <= 575', 'basilico' ),
            'type'    => \Elementor\Controls_Manager::SELECT,
            'default' => '1',
            'options' => $options
        ),
        array(
            'name'    => 'col_sm',
            'label'   => esc_html__( 'Small <= 767', 'basilico' ),
            'type'    => \Elementor\Controls_Manager::SELECT,
            'default' => '2',
            'options' => $options
        ),
        array(
            'name'    => 'col_md',
            'label'   => esc_html__( 'Medium <= 991', 'basilico' ),
            'type'    => \Elementor\Controls_Manager::SELECT,
            'default' => '2',
            'options' => $options
        ),
        array(
            'name'    => 'col_lg',
            'label'   => esc_html__( 'Large <= 1199', 'basilico' ),
            'type'    => \Elementor\Controls_Manager::SELECT,
            'default' => '3',
            'options' => $options
        ),
        array(
            'name'    => 'col_xl',
            'label'   => esc_html__( 'XL Devices >= 1200', 'basilico' ),
            'type'    => \Elementor\Controls_Manager::SELECT,
            'default' => '4',
            'options' => $options
        ),
        array(
            'name'    => 'col_xxl',
            'label'   => esc_html__( 'XXL Devices >= 1400', 'basilico' ),
            'type'    => \Elementor\Controls_Manager::SELECT,
            'default' => '4',
            'options' => $options
        )
    );
}

function basilico_elementor_animation_opts($args = []){
    $args = wp_parse_args($args, [
        'name'   => '',
        'label'  => '',
        'condition'   => [],
    ]);

    return array(
        array(
            'name'      => $args['name'].'_animation',
            'label'     => $args['label'].' '.esc_html__( 'Motion Effect', 'basilico' ),
            'type'      => \Elementor\Controls_Manager::ANIMATION,
            'condition'   => $args['condition'],
        ),
        array(
            'name'    => $args['name'].'_animation_duration', 
            'label'   => $args['label'].' '.esc_html__( 'Animation Duration', 'basilico' ),
            'type'    => \Elementor\Controls_Manager::SELECT,
            'default' => 'normal',
            'options' => [
                'slow'   => esc_html__( 'Slow', 'basilico' ),
                'normal' => esc_html__( 'Normal', 'basilico' ),
                'fast'   => esc_html__( 'Fast', 'basilico' ),
            ],
            'condition'   => array_merge($args['condition'], [ $args['name'].'_animation!' => '' ]),
        ),
        array(
            'name'      => $args['name'].'_animation_delay',
            'label'     => $args['label'].' '.esc_html__( 'Animation Delay', 'basilico' ),
            'type'      => \Elementor\Controls_Manager::NUMBER,
            'min'       => 0,
            'step'      => 100,
            'condition'   => array_merge($args['condition'], [ $args['name'].'_animation!' => '' ]),
        )
    );
}

function basilico_position_option($args = []){
    $start = is_rtl() ? esc_html__( 'Right', 'basilico' ) : esc_html__( 'Left', 'basilico' );
    $end = ! is_rtl() ? esc_html__( 'Right', 'basilico' ) : esc_html__( 'Left', 'basilico' );
    $args = wp_parse_args($args, [
        'prefix' => '',
        'selectors_class' => '',
        'condition' => []
    ]);
    $options = array(
        array(
            'name'        => $args['prefix'] .'position',
            'label' => ucfirst( str_replace('_', ' ', $args['prefix']) ).' '.esc_html__( 'Position', 'basilico' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'default' => '',
            'options' => [
                '' => esc_html__( 'Default', 'basilico' ),
                'absolute' => esc_html__( 'Absolute', 'basilico' ),
            ],
            'frontend_available' => true,
            'condition'   => $args['condition'],
        ),
         
        array(
            'name'        => $args['prefix'] .'pos_offset_left',
            'label' => esc_html__( 'Left', 'basilico' ).' (50px) px,%,vw,auto',
            'type' => 'text',
            'default' => '',
            'control_type' => 'responsive',
            'selectors' => [
                '{{WRAPPER}} '.$args['selectors_class'] => 'left: {{VALUE}}',
            ],
            'condition'   => array_merge($args['condition'], [ $args['prefix'] .'position!' => '' ]),
        ),  
        array(
            'name'        => $args['prefix'] .'pos_offset_right',
            'label' => esc_html__( 'Right', 'basilico' ).' (50px) px,%,vw,auto',
            'type' => 'text',
            'default' => '',
            'control_type' => 'responsive',
            'selectors' => [
                '{{WRAPPER}} '.$args['selectors_class'] => 'right: {{VALUE}}',
            ],
            'condition'   => array_merge($args['condition'], [ $args['prefix'] .'position!' => '' ]),
             
        ),
        array(
            'name'        => $args['prefix'] .'pos_offset_top',
            'label' => esc_html__( 'Top', 'basilico' ).' (50px) px,%,vh,auto',
            'type' => 'text',
            'default' => '',
            'control_type' => 'responsive',
            'selectors' => [
                '{{WRAPPER}} '.$args['selectors_class'] => 'top: {{VALUE}}',
            ],
            'condition'   => array_merge($args['condition'], [ $args['prefix'] .'position!' => '']),
              
        ),  
        array(
            'name'        => $args['prefix'] .'pos_offset_bottom',
            'label' => esc_html__( 'Bottom', 'basilico' ).' (50px) px,%,vh,auto',
            'type' => 'text',
            'default' => '',
            'control_type' => 'responsive',
            'selectors' => [
                '{{WRAPPER}} '.$args['selectors_class'] => 'bottom: {{VALUE}}',
            ],
            'condition'   => array_merge($args['condition'], [ $args['prefix'] .'position!' => '']),
        ),
        array(
            'name'        => $args['prefix'] .'z_index',
            'label' => ucfirst( str_replace('_', ' ', $args['prefix']) ).' '. esc_html__( 'Z-Index', 'basilico' ),
            'type' => Controls_Manager::NUMBER,
            'selectors' => [
                '{{WRAPPER}} '.$args['selectors_class'] => 'z-index: {{VALUE}};',
            ],
            'condition'   => array_merge($args['condition'], [ $args['prefix'] .'position!' => '' ]),
        )
    );
    return $options;
}

function basilico_gradient_option($args = []){
    $gradient_prefix_class = 'pxl-';
    $args = wp_parse_args($args, [
        'prefix' => '',
        'selectors_class' => '',
        'output_key' => 'gradient01',
        'condition' => []
    ]);
    $options = array(
        array(
            'name'        => $args['prefix'] .'gradient_option_popover',
            'label' => ucfirst( str_replace('_', '', $args['prefix']) ).' '. esc_html__( 'Gradient', 'basilico' ),
            'type' => Controls_Manager::POPOVER_TOGGLE,
            'prefix_class' => $gradient_prefix_class,
            'condition'   => $args['condition'],
        ),
        array(
            'name'        => $args['prefix'] .'pxl_start_popover',
            'label'       => ucfirst( str_replace('_', '', $args['prefix']) ).' '. esc_html__( 'Start Popover', 'basilico' ),
            'type'        => 'pxl_start_popover',
            'condition'   => $args['condition'],
        ),
        array(
            'name' => $args['prefix'] .'gradient_from',
            'label' => esc_html__('Gradient From', 'basilico' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} '.$args['selectors_class'] => '--'.$args['output_key'].'-color-from: {{VALUE}};',
            ],
            'condition'   => $args['condition'],
        ),
        array(
            'name' => $args['prefix'] .'gradient_to',
            'label' => esc_html__('Gradient To', 'basilico' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} '.$args['selectors_class'] => '--'.$args['output_key'].'-color-to: {{VALUE}};',
            ],
            'condition'   => $args['condition'],
        ),
        array(
            'name' => $args['prefix'] .'_gradient_angle',
            'label' => esc_html__('Angle', 'basilico' ),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'size_units' => [ 'px' ],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 360,
                    'step' => 10,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} '.$args['selectors_class'] => '--'.$args['output_key'].'-angle: {{SIZE}}deg;',
            ],
        ),
        array(
            'name'        => $args['prefix'] .'pxl_end_popover',
            'label'       => ucfirst( str_replace('_', '', $args['prefix']) ).' '. esc_html__( 'End Popover', 'basilico' ),
            'type'        => 'pxl_end_popover',
            'condition'   => $args['condition'],
        )
    );
    return $options;
}

function basilico_get_img_link_url( $settings ) {
    if ( 'none' === $settings['link_to'] ) {
        return false;
    }

    if ( 'custom' === $settings['link_to'] ) {
        if ( empty( $settings['link']['url'] ) ) {
            return false;
        }

        return $settings['link'];
    }

    return [
        'url' => $settings['image']['url'],
    ];
}