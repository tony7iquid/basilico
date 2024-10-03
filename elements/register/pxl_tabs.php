<?php
$templates = basilico_get_templates_option('default', []) ;
pxl_add_custom_widget(
    array(
        'name'       => 'pxl_tabs',
        'title'      => esc_html__( 'PXL Tabs', 'basilico' ),
        'icon'       => 'eicon-tabs',
        'categories' => array('pxltheme-core'),
        'scripts' => [
            'basilico-tabs',
        ],
        'params' => array(
            'sections' => array(
                array(
                    'name'     => 'layout_section',
                    'label'    => esc_html__( 'Layout', 'basilico' ),
                    'tab'      => 'layout',
                    'controls' => array(
                        array(
                            'name'    => 'layout',
                            'label'   => esc_html__( 'Layout', 'basilico' ),
                            'type'    => 'layoutcontrol',
                            'default' => '1',
                            'options' => [
                                '1' => [
                                    'label' => esc_html__( 'Layout 1', 'basilico' ),
                                    'image' => get_template_directory_uri() . '/elements/assets/layout-image/pxl_tabs-1.jpg'
                                ],
                                '2' => [
                                    'label' => esc_html__( 'Layout 2', 'basilico' ),
                                    'image' => get_template_directory_uri() . '/elements/assets/layout-image/pxl_tabs-2.jpg'
                                ],
                                '3' => [
                                    'label' => esc_html__( 'Layout 3', 'basilico' ),
                                    'image' => get_template_directory_uri() . '/elements/assets/layout-image/pxl_tabs-3.jpg'
                                ],
                                '4' => [
                                    'label' => esc_html__( 'Layout 4', 'basilico' ),
                                    'image' => get_template_directory_uri() . '/elements/assets/layout-image/pxl_tabs-4.jpg'
                                ],
                                '5' => [
                                    'label' => esc_html__( 'Layout 5', 'basilico' ),
                                    'image' => get_template_directory_uri() . '/elements/assets/layout-image/pxl_tabs-5.jpg'
                                ],
                                '6' => [
                                    'label' => esc_html__( 'Layout 6', 'basilico' ),
                                    'image' => get_template_directory_uri() . '/elements/assets/layout-image/pxl_tabs-6.jpg'
                                ],
                                '7' => [
                                    'label' => esc_html__( 'Layout 7', 'basilico' ),
                                    'image' => get_template_directory_uri() . '/elements/assets/layout-image/pxl_tabs-7.jpg'
                                ],
                                '8' => [
                                    'label' => esc_html__( 'Layout 8', 'basilico' ),
                                    'image' => get_template_directory_uri() . '/elements/assets/layout-image/pxl_tabs-8.jpg'
                                ],
                                '9' => [
                                    'label' => esc_html__( 'Layout 9', 'basilico' ),
                                    'image' => get_template_directory_uri() . '/elements/assets/layout-image/pxl_tabs-9.jpg'
                                ],
                                '10' => [
                                    'label' => esc_html__( 'Layout 10', 'basilico' ),
                                    'image' => get_template_directory_uri() . '/elements/assets/layout-image/pxl_tabs-10.jpg'
                                ],
                                '11' => [
                                    'label' => esc_html__( 'Layout 11', 'basilico' ),
                                    'image' => get_template_directory_uri() . '/elements/assets/layout-image/pxl_tabs-11.jpg'
                                ],
                            ],
                            'prefix_class' => 'pxl-tabs-layout-',
                        ),
                    )
                ),
                array(
                    'name'     => 'content_section',
                    'label'    => esc_html__( 'Content', 'basilico' ),
                    'tab'      => 'content',
                    'controls' => array(
                        array(
                            'name'             => 'selected_icon',
                            'label'            => esc_html__( 'Icon', 'basilico' ),
                            'type'             => 'icons',
                            'default'          => [
                                'library' => 'fa-solid',
                                'value'   => 'fas fa-pizza-slice'
                            ],
                            'condition' => [
                                'layout' => '6'
                            ]
                        ),
                        array(
                            'name' => 'sub_title',
                            'label' => esc_html__('Sub Title', 'basilico'),
                            'type' => 'text',
                            'default' => esc_html__('Special Menu', 'basilico'),
                            'condition' => [
                                'layout' => '2'
                            ]
                        ),
                        array(
                            'name' => 'title_layout10',
                            'label' => esc_html__('Title', 'basilico'),
                            'type' => 'text',
                            'default' => esc_html__('Categories', 'basilico'),
                            'condition' => [
                                'layout' => '10'
                            ]
                        ),
                        array(
                            'name' => 'title_layout10_typography',
                            'label' => esc_html__('Title Typography', 'basilico' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-tabs.layout-10 .tabs-title .box-title',
                            'condition' => [
                                'layout' => '10'
                            ]
                        ),
                        array(
                            'name' => 'title_layout10_color',
                            'label' => esc_html__('Title Color', 'basilico' ),
                            'type' => 'color',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-tabs.layout-10 .tabs-title .box-title' => 'color: {{VALUE}};'
                            ],
                            'condition' => [
                                'layout' => '10'
                            ]
                        ),
                        array(
                            'name' => 'button_text',
                            'label' => esc_html__('Button Text', 'basilico'),
                            'type' => 'text',
                            'default' => esc_html__('View All Menu', 'basilico'),
                            'condition' => [
                                'layout' => '2'
                            ]
                        ),
                        array(
                            'name' => 'button_url',
                            'label' => esc_html__('Button URL', 'basilico'),
                            'type' => 'text',
                            'default' => esc_html__('#', 'basilico'),
                            'condition' => [
                                'layout' => '2'
                            ]
                        ),
                        array(
                            'name'        => 'item_background',
                            'label'       => esc_html__('Background Tab', 'basilico'),
                            'type'        => 'media',
                            'label_block' => true,
                            'condition' => [
                                'layout' => '11'
                            ]
                        ),
                        array(
                            'name' => 'link_to_carousel',
                            'label' => esc_html__('ID Link To Carousel', 'basilico'),
                            'type' => \Elementor\Controls_Manager::TEXT,
                        ),
                        array(
                            'name' => 'active_tab',
                            'label' => esc_html__( 'Active Tab', 'basilico' ),
                            'type' => \Elementor\Controls_Manager::NUMBER,
                            'default' => 1,
                            'separator' => 'after',
                        ),
                        array(
                            'name' => 'tabs_list',
                            'label' => esc_html__('Tabs List', 'basilico'),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'controls' => array(
                                array(
                                    'name'             => 'tab_icon',
                                    'label'            => esc_html__( 'Icon', 'basilico' ),
                                    'type'             => 'icons',
                                    'default'          => [
                                        'library' => 'fa-solid',
                                        'value'   => 'fas fa-pizza-slice'
                                    ],
                                    'description' => esc_html__('Use for layout 7', 'basilico'),
                                ),
                                array(
                                    'name' => 'tab_title',
                                    'label' => esc_html__('Title', 'basilico'),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'label_block' => true,
                                ),
                                array(
                                    'name' => 'content_type',
                                    'label' => esc_html__('Content Type', 'basilico'),
                                    'type' => 'select',
                                    'options' => [
                                        'df' => esc_html__( 'Default', 'basilico' ),
                                        'template' => esc_html__( 'From Template Builder', 'basilico' )
                                    ],
                                    'default' => 'df' 
                                ),
                                array(
                                    'name' => 'content_template',
                                    'label' => esc_html__('Select Templates', 'basilico'),
                                    'description'        => sprintf(esc_html__('Please create your layout before choosing. %sClick Here%s','basilico'),'<a href="' . esc_url( admin_url( 'edit.php?post_type=pxl-template' ) ) . '">','</a>'),
                                    'type' => 'select',
                                    'options' => $templates,
                                    'default' => 'df',
                                    'condition' => ['content_type' => 'template'] 
                                ),
                                array(
                                    'name' => 'tab_content',
                                    'label' => esc_html__('Enter Content', 'basilico'),
                                    'type' => \Elementor\Controls_Manager::WYSIWYG,
                                    'default' => '',
                                    'condition' => ['content_type' => 'df'] 
                                ),
                            ),
                            'title_field' => '{{{ tab_title }}}',
                        ),
                        array(
                            'name' => 'content_padding',
                            'label' => esc_html__('Content Padding', 'basilico' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px' ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-tabs .tabs-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                            'control_type' => 'responsive',
                        ),
                        array(
                            'name' => 'title_space',
                            'label' => esc_html__('Title Space', 'basilico' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'size_units' => [ 'px' ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 60,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-tabs .tabs-title .title-wrap' => 'gap: {{SIZE}}{{UNIT}};'
                            ],
                        ),
                        array(
                            'name' => 'tab_background',
                            'label' => esc_html__('Tab Background', 'basilico' ),
                            'type' => 'color',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-tabs.layout-4' => 'background-color: {{VALUE}};'
                            ],
                            'condition' => [
                                'layout' => '4'
                            ]
                        ),
                        array(
                            'name' => 'title_divider_color',
                            'label' => esc_html__('Title Divider Color', 'basilico' ),
                            'type' => 'color',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-tabs.layout-4 .tabs-title:after' => 'border-color: {{VALUE}};'
                            ],
                            'condition' => [
                                'layout' => '4'
                            ]
                        ),
                        array(
                            'name' => 'title_typography',
                            'label' => esc_html__('Title Typography', 'basilico' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-tabs .tab-title',
                        ),
                        array(
                            'name' => 'title_background',
                            'label' => esc_html__('Title Background', 'basilico' ),
                            'type' => 'color',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-tabs .tab-title' => 'background-color: {{VALUE}};'
                            ],
                            'condition' => [
                                'layout!' => '10'
                            ]
                        ),
                        array(
                            'name' => 'title_active_background',
                            'label' => esc_html__('Active Background', 'basilico' ),
                            'type' => 'color',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-tabs .tab-title.active' => 'background-color: {{VALUE}}; border-color: {{VALUE}};'
                            ],
                            'condition' => [
                                'layout!' => '10'
                            ]
                        ),
                        array(
                            'name' => 'toggle_background',
                            'label' => esc_html__('Toggle Background', 'basilico' ),
                            'type' => 'color',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-tabs .toggle-slide' => 'background-color: {{VALUE}} !important;'
                            ],
                            'condition' => [
                                'layout!' => ['10','11']
                            ]
                        ),
                        array(
                            'name' => 'title_color',
                            'label' => esc_html__('Title Color', 'basilico' ),
                            'type' => 'color',
                            'selectors' => [
                                '{{WRAPPER}} .tab-title' => 'color: {{VALUE}};'
                            ],
                        ),
                        array(
                            'name' => 'title_active_color',
                            'label' => esc_html__('Active Color', 'basilico' ),
                            'type' => 'color',
                            'selectors' => [
                                '{{WRAPPER}} .tab-title.active' => 'color: {{VALUE}};',
                                '{{WRAPPER}} .tab-title span:after' => 'background-color: {{VALUE}};'
                            ],
                        ),
                        array(
                            'name' => 'content_color',
                            'label' => esc_html__('Content Color', 'basilico' ),
                            'type' => 'color',
                            'selectors' => [
                                '{{WRAPPER}} .tab-content' => 'color: {{VALUE}};'
                            ],
                        ),
                        array(
                            'name' => 'btn_color',
                            'label' => esc_html__('Button Text Color', 'basilico' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .tabs-title .btn-wrapper .btn span' => 'color: {{VALUE}};',
                            ],
                            'condition' => [
                                'layout' => '2'
                            ]
                        ),
                        array(
                            'name' => 'border_color',
                            'label' => esc_html__('Border Color', 'basilico' ),
                            'type' => 'color',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-tabs .tabs-title' => 'border-color: {{VALUE}};'
                            ],
                            'condition' => [
                                'layout' => '11'
                            ]
                        ),
                        array(
                            'name' => 'btn_color_hover',
                            'label' => esc_html__('Button Text Color Hover', 'basilico' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .tabs-title .btn-wrapper .btn:hover span' => 'color: {{VALUE}};',
                            ],
                            'condition' => [
                                'layout' => '2'
                            ]
                        ),
                        array(
                            'name' => 'btn_bg_color',
                            'label' => esc_html__('Button Background Color', 'basilico' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .tabs-title .btn-wrapper .btn' => 'background-image: none; background-color: {{VALUE}}; border-color: {{VALUE}};',
                                '{{WRAPPER}} .tabs-title .btn-wrapper .btn::after' => 'background-image: none; background-color: {{VALUE}};'
                            ],
                            'condition' => [
                                'layout' => '2'
                            ]
                        ),
                        array(
                            'name' => 'btn_bg_color_hover',
                            'label' => esc_html__('Button Background Color Hover', 'basilico' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .tabs-title .btn-wrapper .btn:hover' => 'border-color: {{VALUE}};',
                                '{{WRAPPER}} .tabs-title .btn-wrapper .btn:hover::before' => 'background-color: {{VALUE}};',
                            ],
                            'condition' => [
                                'layout' => '2'
                            ]
                        ),
                        array(
                            'name'         => 'title_alignment',
                            'label'        => esc_html__( 'Title Alignment', 'basilico' ),
                            'type'         => 'choose',
                            'control_type' => 'responsive',
                            'options' => [
                                'start' => [
                                    'title' => esc_html__( 'Start', 'basilico' ),
                                    'icon'  => 'eicon-text-align-left',
                                ],
                                'center' => [
                                    'title' => esc_html__( 'Center', 'basilico' ),
                                    'icon'  => 'eicon-text-align-center',
                                ],
                                'end' => [
                                    'title' => esc_html__( 'End', 'basilico' ),
                                    'icon'  => 'eicon-text-align-right',
                                ]
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-tabs .tabs-title' => 'justify-content: {{VALUE}};',
                                '{{WRAPPER}} .pxl-tabs .title-wrap' => 'justify-content: {{VALUE}};',
                                '{{WRAPPER}} .pxl-tabs.layout-6 .title-wrap .tab-title' => 'align-items: {{VALUE}};'
                            ],
                        ),
                        array(
                            'name' => 'tab_animation',
                            'label' => esc_html__('Active Animation', 'basilico'),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'fadeInUp' => esc_html__('Fade In Up', 'basilico'),
                                'fadeIn' => esc_html__('Fade In', 'basilico'),
                                'zoomIn' => esc_html__('Zoom In', 'basilico')
                            ],
                            'default' => 'fadeInUp'
                        ),
                    ),
                )
            )
        )
    ),
    basilico_get_class_widget_path()
);