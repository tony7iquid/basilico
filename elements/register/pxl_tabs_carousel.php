<?php
$templates = basilico_get_templates_option('default', []) ;
pxl_add_custom_widget(
    array(
        'name' => 'pxl_tabs_carousel',
        'title' => esc_html__('PXL Tabs Carousel', 'basilico'),
        'icon' => 'eicon-slider-push',
        'categories' => array('pxltheme-core'),
        'scripts' => [
            'pxl-tabs-carousel',
        ],
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'section_list',
                    'label' => esc_html__('Content', 'basilico'),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'link_to_tabs',
                            'label' => esc_html__('ID Link To Tabs', 'basilico'),
                            'type' => \Elementor\Controls_Manager::TEXT,
                        ),
                        array(
                            'name' => 'tabs_list_carousel',
                            'label' => esc_html__('Tabs List', 'basilico'),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'default' => [],
                            'controls' => array(
                                array(
                                    'name' => 'content_type',
                                    'label' => esc_html__('Content Type', 'basilico'),
                                    'type' => Elementor\Controls_Manager::SELECT,
                                    'options' => [
                                        'df' => esc_html__( 'Default', 'basilico' ),
                                        'template' => esc_html__( 'From Template Builder', 'basilico' )
                                    ],
                                    'default' => 'df'
                                ),
                                array(
                                    'name' => 'content_template',
                                    'label' => esc_html__('Select Templates', 'basilico'),
                                    'description' => sprintf(esc_html__('Please create your layout before choosing. %sClick Here%s','basilico'),'<a href="' . esc_url( admin_url( 'edit.php?post_type=pxl-template' ) ) . '">','</a>'),
                                    'type' => Elementor\Controls_Manager::SELECT,
                                    'options' => $templates,
                                    'default' => 'df',
                                    'condition' => ['content_type' => 'template'] 
                                ),
                                array(
                                    'name' => 'tab_content_carousel',
                                    'label' => esc_html__('Enter Content', 'basilico'),
                                    'type' => \Elementor\Controls_Manager::WYSIWYG,
                                    'default' => '',
                                    'condition' => ['content_type' => 'df'] 
                                ),
                            ),
                        ),
                    ),
                ),
                array(
                    'name' => 'carousel_setting',
                    'label' => esc_html__('Carousel Settings', 'basilico' ),
                    'tab' => \Elementor\Controls_Manager::TAB_SETTINGS,
                    'controls' => array_merge(
                        array(
                            array(
                                'name' => 'fade',
                                'label' => esc_html__('Fade Effect', 'basilico'),
                                'type' => \Elementor\Controls_Manager::SWITCHER,
                                'default' => 'false',
                            ),
                            array(
                                'name' => 'arrows',
                                'label' => esc_html__('Show Arrows', 'basilico'),
                                'type' => \Elementor\Controls_Manager::SWITCHER,
                            ),
                            array(
                                'name' => 'arrows_style',
                                'label' => esc_html__('Arrows Style', 'basilico'),
                                'type' => \Elementor\Controls_Manager::SELECT,
                                'default' => 'style-df',
                                'options' => [
                                    'style-df' => esc_html('Default', 'basilico'),
                                    'style-2' => esc_html('Style 2', 'basilico'),
                                ],
                                'condition' => [
                                    'arrows' => 'true'
                                ]
                            ),
                            array(
                                'name' => 'arrows_color',
                                'label' => esc_html__( 'Arrows Color', 'basilico' ),
                                'type' => \Elementor\Controls_Manager::COLOR,
                                'default' => '',
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-swiper-arrow .pxl-icon' => 'color: {{VALUE}};',
                                ],
                                'condition' => [
                                    'arrows' => 'true',
                                    'arrows_style' => 'style-df'
                                ]
                            ),
                            array(
                                'name' => 'arrow_prev_position',
                                'label' => esc_html__('Arrow Previous Position', 'basilico'),
                                'type' => \Elementor\Controls_Manager::SELECT,
                                'default' => 'default',
                                'label_block' => true,
                                'options' => [
                                    'default' => esc_html('Default', 'basilico'),
                                    'absolute' => esc_html('Custom', 'basilico'),
                                ],
                                'condition' => [
                                    'arrows' => 'true'
                                ]
                            ),
                            array(
                                'name' => 'arrow_prev_offset_orientation_h',
                                'label' => esc_html__('Horizontal Orientation', 'basilico'),
                                'type' => \Elementor\Controls_Manager::CHOOSE,
                                'default' => 'left',
                                'options' => [
                                    'left' => [
                                        'title' => 'Start',
                                        'icon' => 'eicon-h-align-left',
                                    ],
                                    'right' => [
                                        'title' => 'End',
                                        'icon' => 'eicon-h-align-right',
                                    ],
                                ],
                                'render_type' => 'ui',
                                'condition' => [
                                    'arrows' => 'true',
                                    'arrow_prev_position' => 'absolute'
                                ]
                            ),
                            array(
                                'name' => 'arrow_prev_offset_x',
                                'label' => esc_html__('Offset', 'basilico'),
                                'type' => \Elementor\Controls_Manager::SLIDER,
                                'range' => [
                                    'px' => [
                                        'min' => -1000,
                                        'max' => 1000,
                                        'step' => 1,
                                    ],
                                    '%' => [
                                        'min' => -200,
                                        'max' => 200,
                                    ],
                                    'vw' => [
                                        'min' => -200,
                                        'max' => 200,
                                    ],
                                    'vh' => [
                                        'min' => -200,
                                        'max' => 200,
                                    ],
                                ],
                                'control_type' => 'responsive',
                                'default' => [
                                    'size' => 0,
                                    'unit' => 'px'
                                ],
                                'size_units' => ['px', '%', 'vw', 'vh', 'custom'],
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-swiper-arrows .pxl-swiper-arrow-prev' => 'position: absolute !important; left: {{SIZE}}{{UNIT}}; right: auto;',
                                ],
                                'condition' => [
                                    'arrows' => 'true',
                                    'arrow_prev_offset_orientation_h!' => 'right',
                                    'arrow_prev_position' => 'absolute',
                                ],
                            ),
                            array(
                                'name' => 'arrow_prev_offset_x_end',
                                'label' => esc_html__('Offset', 'basilico'),
                                'type' => \Elementor\Controls_Manager::SLIDER,
                                'range' => [
                                    'px' => [
                                        'min' => -1000,
                                        'max' => 1000,
                                        'step' => 1,
                                    ],
                                    '%' => [
                                        'min' => -200,
                                        'max' => 200,
                                    ],
                                    'vw' => [
                                        'min' => -200,
                                        'max' => 200,
                                    ],
                                    'vh' => [
                                        'min' => -200,
                                        'max' => 200,
                                    ],
                                ],
                                'control_type' => 'responsive',
                                'size_units' => ['px', '%', 'vw', 'vh', 'custom'],
                                'default' => [
                                    'size' => 0,
                                    'unit' => 'px'
                                ],
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-swiper-arrows .pxl-swiper-arrow-prev' => 'position: absolute !important; right: {{SIZE}}{{UNIT}}; left: auto;',
                                ],
                                'condition' => [
                                    'arrows' => 'true',
                                    'arrow_prev_offset_orientation_h' => 'right',
                                    'arrow_prev_position' => 'absolute',
                                ],
                            ),
                            array(
                                'name' => 'arrow_prev_offset_orientation_v',
                                'label' => esc_html__('Vertical Orientation', 'basilico'),
                                'type' => \Elementor\Controls_Manager::CHOOSE,
                                'default' => 'top',
                                'options' => [
                                    'top' => [
                                        'title' => 'Top',
                                        'icon' => 'eicon-v-align-top',
                                    ],
                                    'bottom' => [
                                        'title' => 'Bottom',
                                        'icon' => 'eicon-v-align-bottom',
                                    ],
                                ],
                                'render_type' => 'ui',
                                'condition' => [
                                    'arrows' => 'true',
                                    'arrow_prev_position' => 'absolute'
                                ]
                            ),
                            array(
                                'name' => 'arrow_prev_offset_y',
                                'label' => esc_html__('Offset', 'basilico'),
                                'type' => \Elementor\Controls_Manager::SLIDER,
                                'range' => [
                                    'px' => [
                                        'min' => -1000,
                                        'max' => 1000,
                                        'step' => 1,
                                    ],
                                    '%' => [
                                        'min' => -200,
                                        'max' => 200,
                                    ],
                                    'vw' => [
                                        'min' => -200,
                                        'max' => 200,
                                    ],
                                    'vh' => [
                                        'min' => -200,
                                        'max' => 200,
                                    ],
                                ],
                                'control_type' => 'responsive',
                                'default' => [
                                    'size' => 0,
                                    'unit' => 'px'
                                ],
                                'size_units' => ['px', '%', 'vw', 'vh', 'custom'],
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-swiper-arrows .pxl-swiper-arrow-prev' => 'position: absolute !important; top: {{SIZE}}{{UNIT}}; bottom: auto;',
                                ],
                                'condition' => [
                                    'arrows' => 'true',
                                    'arrow_prev_offset_orientation_v!' => 'bottom',
                                    'arrow_prev_position' => 'absolute',
                                ],
                            ),
                            array(
                                'name' => 'arrow_prev_offset_y_end',
                                'label' => esc_html__('Offset', 'basilico'),
                                'type' => \Elementor\Controls_Manager::SLIDER,
                                'range' => [
                                    'px' => [
                                        'min' => -1000,
                                        'max' => 1000,
                                        'step' => 1,
                                    ],
                                    '%' => [
                                        'min' => -200,
                                        'max' => 200,
                                    ],
                                    'vw' => [
                                        'min' => -200,
                                        'max' => 200,
                                    ],
                                    'vh' => [
                                        'min' => -200,
                                        'max' => 200,
                                    ],
                                ],
                                'control_type' => 'responsive',
                                'size_units' => ['px', '%', 'vw', 'vh', 'custom'],
                                'default' => [
                                    'size' => 0,
                                    'unit' => 'px'
                                ],
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-swiper-arrows .pxl-swiper-arrow-prev' => 'position: absolute !important; bottom: {{SIZE}}{{UNIT}}; top: auto;',
                                ],
                                'condition' => [
                                    'arrows' => 'true',
                                    'arrow_prev_offset_orientation_v' => 'bottom',
                                    'arrow_prev_position' => 'absolute',
                                ],
                            ),
                            array(
                                'name' => 'arrow_next_position',
                                'label' => esc_html__('Arrow Next Position', 'basilico'),
                                'type' => \Elementor\Controls_Manager::SELECT,
                                'default' => 'default',
                                'label_block' => true,
                                'options' => [
                                    'default' => esc_html('Default', 'basilico'),
                                    'absolute' => esc_html('Custom', 'basilico'),
                                ],
                                'condition' => [
                                    'arrows' => 'true'
                                ]
                            ),
                            array(
                                'name' => 'arrow_next_offset_orientation_h',
                                'label' => esc_html__('Horizontal Orientation', 'basilico'),
                                'type' => \Elementor\Controls_Manager::CHOOSE,
                                'default' => 'left',
                                'options' => [
                                    'left' => [
                                        'title' => 'Start',
                                        'icon' => 'eicon-h-align-left',
                                    ],
                                    'right' => [
                                        'title' => 'End',
                                        'icon' => 'eicon-h-align-right',
                                    ],
                                ],
                                'render_type' => 'ui',
                                'condition' => [
                                    'arrows' => 'true',
                                    'arrow_next_position' => 'absolute'
                                ]
                            ),
                            array(
                                'name' => 'arrow_next_offset_x',
                                'label' => esc_html__('Offset', 'basilico'),
                                'type' => \Elementor\Controls_Manager::SLIDER,
                                'range' => [
                                    'px' => [
                                        'min' => -1000,
                                        'max' => 1000,
                                        'step' => 1,
                                    ],
                                    '%' => [
                                        'min' => -200,
                                        'max' => 200,
                                    ],
                                    'vw' => [
                                        'min' => -200,
                                        'max' => 200,
                                    ],
                                    'vh' => [
                                        'min' => -200,
                                        'max' => 200,
                                    ],
                                ],
                                'control_type' => 'responsive',
                                'default' => [
                                    'size' => 0,
                                    'unit' => 'px'
                                ],
                                'size_units' => ['px', '%', 'vw', 'vh', 'custom'],
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-swiper-arrows .pxl-swiper-arrow-next' => 'position: absolute !important; left: {{SIZE}}{{UNIT}}; right: auto;',
                                ],
                                'condition' => [
                                    'arrows' => 'true',
                                    'arrow_next_offset_orientation_h!' => 'right',
                                    'arrow_next_position' => 'absolute',
                                ],
                            ),
                            array(
                                'name' => 'arrow_next_offset_x_end',
                                'label' => esc_html__('Offset', 'basilico'),
                                'type' => \Elementor\Controls_Manager::SLIDER,
                                'range' => [
                                    'px' => [
                                        'min' => -1000,
                                        'max' => 1000,
                                        'step' => 1,
                                    ],
                                    '%' => [
                                        'min' => -200,
                                        'max' => 200,
                                    ],
                                    'vw' => [
                                        'min' => -200,
                                        'max' => 200,
                                    ],
                                    'vh' => [
                                        'min' => -200,
                                        'max' => 200,
                                    ],
                                ],
                                'control_type' => 'responsive',
                                'size_units' => ['px', '%', 'vw', 'vh', 'custom'],
                                'default' => [
                                    'size' => 0,
                                    'unit' => 'px'
                                ],
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-swiper-arrows .pxl-swiper-arrow-next' => 'position: absolute !important; right: {{SIZE}}{{UNIT}}; left: auto;',
                                ],
                                'condition' => [
                                    'arrows' => 'true',
                                    'arrow_next_offset_orientation_h' => 'right',
                                    'arrow_next_position' => 'absolute',
                                ],
                            ),
                            array(
                                'name' => 'arrow_next_offset_orientation_v',
                                'label' => esc_html__('Vertical Orientation', 'basilico'),
                                'type' => \Elementor\Controls_Manager::CHOOSE,
                                'default' => 'top',
                                'options' => [
                                    'top' => [
                                        'title' => 'Top',
                                        'icon' => 'eicon-v-align-top',
                                    ],
                                    'bottom' => [
                                        'title' => 'Bottom',
                                        'icon' => 'eicon-v-align-bottom',
                                    ],
                                ],
                                'render_type' => 'ui',
                                'condition' => [
                                    'arrows' => 'true',
                                    'arrow_next_position' => 'absolute'
                                ]
                            ),
                            array(
                                'name' => 'arrow_next_offset_y',
                                'label' => esc_html__('Offset', 'basilico'),
                                'type' => \Elementor\Controls_Manager::SLIDER,
                                'range' => [
                                    'px' => [
                                        'min' => -1000,
                                        'max' => 1000,
                                        'step' => 1,
                                    ],
                                    '%' => [
                                        'min' => -200,
                                        'max' => 200,
                                    ],
                                    'vw' => [
                                        'min' => -200,
                                        'max' => 200,
                                    ],
                                    'vh' => [
                                        'min' => -200,
                                        'max' => 200,
                                    ],
                                ],
                                'control_type' => 'responsive',
                                'default' => [
                                    'size' => 0,
                                    'unit' => 'px'
                                ],
                                'size_units' => ['px', '%', 'vw', 'vh', 'custom'],
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-swiper-arrows .pxl-swiper-arrow-next' => 'position: absolute !important; top: {{SIZE}}{{UNIT}}; bottom: auto;',
                                ],
                                'condition' => [
                                    'arrows' => 'true',
                                    'arrow_next_offset_orientation_v!' => 'bottom',
                                    'arrow_next_position' => 'absolute',
                                ],
                            ),
                            array(
                                'name' => 'arrow_next_offset_y_end',
                                'label' => esc_html__('Offset', 'basilico'),
                                'type' => \Elementor\Controls_Manager::SLIDER,
                                'range' => [
                                    'px' => [
                                        'min' => -1000,
                                        'max' => 1000,
                                        'step' => 1,
                                    ],
                                    '%' => [
                                        'min' => -200,
                                        'max' => 200,
                                    ],
                                    'vw' => [
                                        'min' => -200,
                                        'max' => 200,
                                    ],
                                    'vh' => [
                                        'min' => -200,
                                        'max' => 200,
                                    ],
                                ],
                                'control_type' => 'responsive',
                                'size_units' => ['px', '%', 'vw', 'vh', 'custom'],
                                'default' => [
                                    'size' => 0,
                                    'unit' => 'px'
                                ],
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-swiper-arrows .pxl-swiper-arrow-next' => 'position: absolute !important; bottom: {{SIZE}}{{UNIT}}; top: auto;',
                                ],
                                'condition' => [
                                    'arrows' => 'true',
                                    'arrow_next_offset_orientation_v' => 'bottom',
                                    'arrow_next_position' => 'absolute',
                                ],
                            ),
                            array(
                                'name' => 'arrows_on_hover',
                                'label' => esc_html__('Show Arrows on Hover', 'basilico'),
                                'type' => \Elementor\Controls_Manager::SWITCHER,
                                'default' => 'false',
                            ),
                            array(
                                'name' => 'dots',
                                'label' => esc_html__('Show Dots', 'basilico'),
                                'type' => \Elementor\Controls_Manager::SWITCHER,
                                'default' => 'false',
                            ),
                            array(
                                'name' => 'dots_space',
                                'label' => esc_html__('Dots Space (px)', 'basilico'),
                                'type' => \Elementor\Controls_Manager::NUMBER,
                                'control_type' => 'responsive',
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-swiper-dots, {{WRAPPER}} .slick-dots' => 'margin-top: {{VALUE}}px;',
                                ],
                                'condition' => [
                                    'dots' => "true",
                                ],
                            ),
                            array(
                                'name' => 'dots_color',
                                'label' => esc_html__('Dots Color', 'basilico'),
                                'type' => \Elementor\Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-swiper-pagination-bullet:before' => 'background-color: {{VALUE}};',
                                    '{{WRAPPER}} .pxl-swiper-pagination-bullet:after' => 'border-color: {{VALUE}};',
                                ],
                                'condition' => [
                                    'dots' => "true",
                                ],
                            ),
                            array(
                                'name' => 'dots_color_active',
                                'label' => esc_html__('Active Color', 'basilico'),
                                'type' => \Elementor\Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .slick-active .pxl-swiper-pagination-bullet:before' => 'background-color: {{VALUE}};',
                                    '{{WRAPPER}} .slick-active .pxl-swiper-pagination-bullet:after' => 'border-color: {{VALUE}};',
                                ],
                                'condition' => [
                                    'dots' => "true",
                                ],
                            ),
                            array(
                                'name' => 'swipe',
                                'label' => esc_html__('Allow Swipe', 'basilico'),
                                'type' => \Elementor\Controls_Manager::SWITCHER,
                                'default' => 'true',
                            ),
                        ),
                    ),
                ),
            ),
        ),
    ),
    basilico_get_class_widget_path()
);