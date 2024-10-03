<?php
$templates_df = [0 => esc_html__('None', 'basilico')];
$templates = $templates_df + basilico_get_templates_option('hidden-panel');

pxl_add_custom_widget(
    array(
        'name'       => 'pxl_anchor',
        'title'      => esc_html__( 'PXL Anchor', 'basilico' ),
        'icon'       => 'eicon-anchor',
        'categories' => array('pxltheme-core'),
        'scripts'    => array(),
        'params' => array(
            'sections' => array(
                array(
                    'name'     => 'icon_section',
                    'label'    => esc_html__( 'Settings', 'basilico' ),
                    'tab'      => 'content',
                    'controls' => array(
                        array(
                            'name' => 'template',
                            'label' => esc_html__('Select Templates', 'basilico'),
                            'type' => 'select',
                            'options' => $templates,
                            'default' => 'df' 
                        ),
                        array(
                            'name' => 'icon_type',
                            'label' => esc_html__('Select Icon Type', 'basilico'),
                            'type' => 'select',
                            'options' => [
                                'none' => esc_html__('None', 'basilico'),
                                'lib' => esc_html__('Library', 'basilico'),
                                'custom' => esc_html__('Custom 1', 'basilico'),
                                'custom-2' => esc_html__('Custom 2', 'basilico'),
                                'custom-3' => esc_html__('Custom 3', 'basilico'),
                                'custom-4' => esc_html__('Custom 4', 'basilico'),
                            ],
                            'default' => 'lib' 
                        ),
                        array(
                            'name'             => 'selected_icon',
                            'label'            => esc_html__( 'Icon', 'basilico' ),
                            'type'             => 'icons',
                            'default'          => [
                                'library' => 'pxli',
                                'value'   => 'pxli-search-400'
                            ],
                            'condition' => ['icon_type' => 'lib']
                        ),
                        array(
                            'name'  => 'icon_size',
                            'label' => esc_html__( 'Icon Size(px)', 'basilico' ),
                            'type'  => 'slider',
                            'range' => [
                                'px' => [
                                    'min' => 15,
                                    'max' => 300,
                                ],
                            ],
                            'condition' => ['icon_type' => 'lib'],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-anchor-icon' => 'font-size: {{SIZE}}{{UNIT}};',
                                '{{WRAPPER}} .pxl-anchor-icon svg' => 'width: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name'  => 'icon_size_custom',
                            'label' => esc_html__( 'Icon Size(px)', 'basilico' ),
                            'type'  => 'slider',
                            'range' => [
                                'px' => [
                                    'min' => 15,
                                    'max' => 300,
                                ],
                            ],
                            'condition' => ['icon_type' => 'custom-2'],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-anchor-icon.custom-2' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name'  => 'dot_size_custom',
                            'label' => esc_html__( 'Dot Size(px)', 'basilico' ),
                            'type'  => 'slider',
                            'range' => [
                                'px' => [
                                    'min' => 15,
                                    'max' => 300,
                                ],
                            ],
                            'condition' => ['icon_type' => 'custom-2'],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-anchor-icon.custom-2 span' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'icon_margin',
                            'label' => esc_html__('Icon Margin(px)', 'basilico' ),
                            'type' => 'dimensions',
                            'control_type' => 'responsive',
                            'size_units' => [ 'px' ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-anchor-icon' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                            'condition' => ['icon_type!' => 'none'],
                        ),
                        array(
                            'name'        => 'title',
                            'label'       => esc_html__( 'Title', 'basilico' ),
                            'type'        => 'textarea',
                            'placeholder' => esc_html__( 'Menu', 'basilico' ),
                        ),
                        array(
                            'name'         => 'title_typo',
                            'label'        => esc_html__( 'Title Typography', 'basilico' ),
                            'type'         => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector'     => '{{WRAPPER}} .anchor-title',
                            'condition'    => ['title!' => '']
                        ),
                        array(
                            'name' => 'icon_color',
                            'label' => esc_html__('Color', 'basilico' ),
                            'type' => 'color',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-anchor' => 'color: {{VALUE}};',
                                '{{WRAPPER}} .pxl-anchor-wrap .pxl-anchor-icon.custom span' => 'background-color: {{VALUE}};',
                                '{{WRAPPER}} .pxl-anchor-wrap .pxl-anchor-icon.custom-2 span' => 'background-color: {{VALUE}};',
                                '{{WRAPPER}} .pxl-anchor-icon svg' => 'fill: {{VALUE}};',
                            ],
                        ), 
                        array(
                            'name' => 'icon_color_hover',
                            'label' => esc_html__('Hover Color', 'basilico' ),
                            'type' => 'color',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-anchor:hover' => 'color: {{VALUE}};',
                                '{{WRAPPER}} .pxl-anchor-wrap .pxl-anchor-icon.custom.pxl-bars:hover span' => 'background-color: {{VALUE}};',
                                '{{WRAPPER}} .pxl-anchor-wrap .pxl-anchor-icon.custom-2.pxl-bars:hover span' => 'background-color: {{VALUE}};',
                                '{{WRAPPER}} .pxl-anchor:hover pxl-anchor-icon svg' => 'fill: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name'         => 'align',
                            'label'        => esc_html__( 'Alignment', 'basilico' ),
                            'type'         => 'choose',
                            'control_type' => 'responsive',
                            'options' => [
                                'start' => [
                                    'title' => esc_html__( 'Start', 'basilico' ),
                                    'icon' => 'eicon-text-align-left',
                                ],
                                'center' => [
                                    'title' => esc_html__( 'Center', 'basilico' ),
                                    'icon' => 'eicon-text-align-center',
                                ],
                                'end' => [
                                    'title' => esc_html__( 'End', 'basilico' ),
                                    'icon' => 'eicon-text-align-right',
                                ]
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-anchor-wrap' => 'justify-content: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name'        => 'custom_class',
                            'label'       => esc_html__( 'Custom class', 'basilico' ),
                            'type'        => 'text',
                        ),
                    ),
                )
            )
        )
    ),
    basilico_get_class_widget_path()
);