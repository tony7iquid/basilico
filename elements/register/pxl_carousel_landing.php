<?php
pxl_add_custom_widget(
    array(
        'name'       => 'pxl_carousel_landing',
        'title'      => esc_html__('PXL Carousel Landing', 'basilico'),
        'icon'       => 'eicon-slider-push',
        'categories' => array('pxltheme-core'),
        'scripts'    => array(
            'swiper',
            'basilico-swiper',
        ),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'layout_section',
                    'label' => esc_html__('Layout', 'basilico' ),
                    'tab' => 'layout',
                    'controls' => array(
                        array(
                            'name' => 'layout',
                            'label' => esc_html__('Templates', 'basilico' ),
                            'type' => 'layoutcontrol',
                            'default' => '1',
                            'options' => [
                                '1' => [
                                    'label' => esc_html__('Layout 1', 'basilico' ),
                                    'image' => get_template_directory_uri() . '/elements/assets/layout-image/pxl_carousel_landing-1.jpg'
                                ],
                                '2' => [
                                    'label' => esc_html__('Layout 2', 'basilico' ),
                                    'image' => get_template_directory_uri() . '/elements/assets/layout-image/pxl_carousel_landing-2.jpg'
                                ]
                            ],
                        )
                    ),
                ),
                array(
                    'name'     => 'items_list',
                    'label'    => esc_html__('Items', 'basilico'),
                    'tab'      => 'content',
                    'condition'     => [
                        'layout'     => ['1'],
                    ],
                    'controls' => array(
                        array(
                            'name'     => 'items',
                            'label'    => esc_html__('Add Item', 'basilico'),
                            'type'     => 'repeater',
                            'controls' => array(
                                array(
                                    'name'        => 'item_img',
                                    'label'       => esc_html__('Item Image', 'basilico'),
                                    'type'        => 'media',
                                    'label_block' => true,
                                ),
                                array(
                                    'name' => 'link_type',
                                    'label' => esc_html__('Link Type', 'basilico'),
                                    'type' => \Elementor\Controls_Manager::SELECT,
                                    'options'       => [
                                        'url'   => esc_html__('URL', 'basilico'),
                                        'page'  => esc_html__('Existing Page', 'basilico'),
                                    ],
                                    'default'       => 'url',
                                ),
                                array(
                                    'name' => 'link',
                                    'label' => esc_html__('Link', 'basilico'),
                                    'type' => \Elementor\Controls_Manager::URL,
                                    'placeholder' => esc_html__('https://your-link.com', 'basilico' ),
                                    'condition'     => [
                                        'link_type'     => 'url',
                                    ],
                                    'default' => [
                                        'url' => '#',
                                    ],
                                ),
                                array(
                                    'name' => 'page_link',
                                    'label' => esc_html__('Existing Page', 'basilico'),
                                    'type' => \Elementor\Controls_Manager::SELECT2,
                                    'options'       => pxl_get_all_page(),
                                    'condition'     => [
                                        'link_type'     => 'page',
                                    ],
                                    'multiple'      => false,
                                    'label_block'   => true,
                                ),
                            ),
                            'default' => [],
                            'title_field' => '{{{ name }}}',
                        ) 
                    )
                ),
                array(
                    'name'     => 'section_list',
                    'label'    => esc_html__('Items', 'basilico'),
                    'tab'      => 'content',
                    'condition'     => [
                        'layout'     => ['2'],
                    ],
                    'controls' => array(
                        array(
                            'name'     => 'content_list',
                            'label'    => esc_html__('List', 'basilico'),
                            'type'     => 'repeater',
                            'controls' => array(
                                array(
                                    'name' => 'image_layout2',
                                    'label' => esc_html__( 'Choose Image', 'amoor' ),
                                    'type' => \Elementor\Controls_Manager::MEDIA,
                                ),
                            ),
                            'default' => [],
                            'title_field' => '{{{ name }}}',
                        ) 
                    )
                ),
                array(
                    'name' => 'tab_style_image',
                    'label' => esc_html__('Style', 'amoor' ),
                    'tab'      => 'content',
                    'condition'     => [
                        'layout'     => ['2'],
                    ],
                    'controls' => array(
                        array(
                            'name'  => 'img_size_width',
                            'label' => esc_html__( 'Image Size', 'amoor' ),
                            'type'  => 'slider',
                            'control_type' => 'responsive',
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 1000,
                                ],
                            ],
                            'default' => [
                                'size' => '',
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-carousel-landing .item-image img' => 'width: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'effect_speed',
                            'label' => esc_html__('Effect Speed', 'amoor'),
                            'type' => \Elementor\Controls_Manager::NUMBER,
                            'control_type' => 'responsive',
                            'description' => 'Default: 20000 - Unit: ms',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-carousel-landing .pxl-image-slide1' => 'animation-duration: {{VALUE}}ms;',
                            ],
                        ),
                        array(
                            'name'  => 'img_space',
                            'label' => esc_html__( 'Image Space', 'amoor' ),
                            'type'  => 'slider',
                            'control_type' => 'responsive',
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 300,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-carousel-landing .pxl-image-slide .item-image' => 'margin-right: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name'  => 'slide_space',
                            'label' => esc_html__( 'Slide Space (%)', 'amoor' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'default' => [
                                'unit' => '%',
                            ],
                            'size_units' => ['px','%'],
                            'range' => [
                                '%' => [
                                    'min' => -1000,
                                    'max' => 1000,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-carousel-landing .pxl-image-slide1 .pxl-image-slide:nth-child(2)' => 'margin-left: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'carousel_setting',
                    'label' => esc_html__('Carousel Settings', 'basilico' ),
                    'tab' => \Elementor\Controls_Manager::TAB_SETTINGS,
                    'condition'     => [
                        'layout'     => ['1'],
                    ],
                    'controls' => array_merge(
                        basilico_carousel_column_settings(),
                        array( 
                            array(
                                'name' => 'slides_to_scroll',
                                'label' => esc_html__('Slides to scroll', 'basilico' ),
                                'type' => \Elementor\Controls_Manager::SELECT,
                                'default' => '1',
                                'options' => [
                                    '1' => '1',
                                    '2' => '2',
                                    '3' => '3',
                                    '4' => '4',
                                    '5' => '5',
                                    '6' => '6',
                                ],
                            ),
                            array(
                                'name' => 'arrows',
                                'label' => esc_html__('Show Arrows', 'basilico'),
                                'type' => \Elementor\Controls_Manager::SWITCHER,
                            ),
                            array(
                                'name' => 'dots',
                                'label' => esc_html__('Show Dots', 'basilico'),
                                'type' => \Elementor\Controls_Manager::SWITCHER,
                            ),
                            array(
                                'name' => 'pause_on_hover',
                                'label' => esc_html__('Pause on Hover', 'basilico'),
                                'type' => \Elementor\Controls_Manager::SWITCHER,
                            ),
                            array(
                                'name' => 'autoplay',
                                'label' => esc_html__('Autoplay', 'basilico'),
                                'type' => \Elementor\Controls_Manager::SWITCHER,
                            ),
                            array(
                                'name' => 'autoplay_speed',
                                'label' => esc_html__('Autoplay Speed', 'basilico'),
                                'type' => \Elementor\Controls_Manager::NUMBER,
                                'default' => 5000,
                                'condition' => [
                                    'autoplay' => 'true'
                                ]
                            ),
                            array(
                                'name' => 'infinite',
                                'label' => esc_html__('Infinite Loop', 'basilico'),
                                'type' => \Elementor\Controls_Manager::SWITCHER,
                            ),
                            array(
                                'name' => 'speed',
                                'label' => esc_html__('Animation Speed', 'basilico'),
                                'type' => \Elementor\Controls_Manager::NUMBER,
                                'default' => 400,
                            ),
                        )
                    ),
                ),
            )
        )
    ),
    basilico_get_class_widget_path()
);