<?php
pxl_add_custom_widget(
    array(
		'name'       => 'pxl_social_icons',
		'title'      => esc_html__( 'PXL Social', 'basilico' ),
		'icon'       => 'eicon-social-icons',
		'categories' => array('pxltheme-core'),
		'scripts'    => array(),
		'params'     => array(
            'sections' => array(
                array(
					'name'     => 'layout_section',
					'label'    => esc_html__( 'Layout', 'basilico' ),
					'tab'      => 'layout',
					'controls' => array(
                        array(
							'name'    => 'layout',
							'label'   => esc_html__( 'Templates', 'basilico' ),
							'type'    => 'layoutcontrol',
							'default' => '1',
							'options' => [
                                '1' => [
                                    'label' => esc_html__( 'Layout 1', 'basilico' ),
                                    'image' => get_template_directory_uri() . '/elements/assets/layout-image/pxl_social-1.jpg'
                                ], 
                            ],
                            'prefix_class' => 'pxl-social-icons-layout-'
                        ),
                    ),
                ),
                array(
					'name'     => 'social_section',
					'label'    => esc_html__( 'Socials Settings', 'basilico' ),
					'tab'      => 'content',
					'controls' => array(
						array(
                            'name'         => 'align',
                            'label'        => esc_html__( 'Alignment', 'basilico' ),
                            'type'         => 'choose',
                            'control_type' => 'responsive',
                            'default'      => '',
                            'options' => [
                                'left' => [
                                    'title' => esc_html__( 'Left', 'basilico' ),
                                    'icon' => 'eicon-text-align-left',
                                ],
                                'center' => [
                                    'title' => esc_html__( 'Center', 'basilico' ),
                                    'icon' => 'eicon-text-align-center',
                                ],
                                'right' => [
                                    'title' => esc_html__( 'Right', 'basilico' ),
                                    'icon' => 'eicon-text-align-right',
                                ]
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-social-icons' => 'text-align: {{VALUE}};'
                            ],
                        ),
                        array(
							'name'     => 'social_list',
							'label'    => esc_html__( 'Social Lists', 'basilico' ),
							'type'     => 'repeater',
							'controls' => array_merge(
								array(
	                                array(
										'name'        => 'social_name',
										'label'       => esc_html__( 'Name', 'basilico' ),
										'type'        => 'text',
										'label_block' => true,
	                                ),
	                                array(
										'name'        => 'social_link',
										'label'       => esc_html__( 'Link', 'basilico' ),
										'type'        => 'url',
										'placeholder' => esc_html__('https://your-link.com', 'basilico' ),
										'label_block' => true,
	                                ),
	                                array(
										'name'             => 'social_icon',
										'label'            => esc_html__( 'Icon', 'basilico' ),
										'type'             => 'icons',
										'fa4compatibility' => 'social',
										'default'          => [],
			                        )
	                            )
                            ),
                            'default' => [
                                [
                                    'social_name' => 'Facebook',
                                    'social_link' => [
                                        'url'         => 'https://facebook.com',
                                        'is_external' => 'on'
                                    ],
                                    'social_icon' => [
                                        'value'   => 'pxli-facebook-f',
                                        'library' => 'pxli',
                                    ]
                                ],
                                [
                                    'social_name' => 'Twitter',
                                    'social_link' => [
                                        'url'         => 'https://twitter.com',
                                        'is_external' => 'on'
                                    ],
                                    'social_icon' => [
                                        'value'   => 'pxli-twitter',
                                        'library' => 'pxli',
                                    ]
                                ],
                                [
                                    'social_name' => 'Linkedin',
                                    'social_link' => [
                                        'url'         => 'https://linkedin.com',
                                        'is_external' => 'on'
                                    ],
                                    'social_icon' => [
                                        'value'   => 'pxli-linkedin-in',
                                        'library' => 'pxli',
                                    ]
                                ],
                                [
                                    'social_name' => 'Pinterest',
                                    'social_link' => [
                                        'url'         => 'https://pinterest.com',
                                        'is_external' => 'on'
                                    ],
                                    'social_icon' => [
                                        'value'   => 'pxli-pinterest-p',
                                        'library' => 'pxli',
                                    ]
                                ]
                            ],
                            'title_field' => '{{{ elementor.helpers.renderIcon( this, social_icon, {}, "i", "panel" ) || \'<i class="{{ icon }}" aria-hidden="true"></i>\' }}} {{{ social_name }}}'
                        ),
                        array(
                            'name'  => 'social_size',
                            'label' => esc_html__( 'Social Size (px)', 'basilico' ),
                            'type'  => 'slider',
                            'control_type' => 'responsive',
                            'range' => [
                                'px' => [
                                    'min' => 20,
                                    'max' => 100,
                                ],
                            ],
                            'default' => [
                                'size' => '',
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-icon' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
                            ]
                        ),
						array(
			                'name'  => 'social_icon_size',
			                'label' => esc_html__( 'Icon Font Size (px)', 'basilico' ),
			                'type'  => 'slider',
                            'control_type' => 'responsive',
			                'range' => [
			                    'px' => [
			                        'min' => 10,
			                        'max' => 50,
			                    ],
			                ],
			                'default' => [
								'size' => '',
							],
			                'selectors' => [
			                    '{{WRAPPER}} .social-item' => 'font-size: {{SIZE}}{{UNIT}};',
			                ]
			            ),
	                    array(
                            'name' => 'social_icon_color',
                            'label' => esc_html__('Icon Color', 'basilico' ),
                            'type' => 'color',
                            'selectors' => [
                                '{{WRAPPER}} .social-item' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'social_icon_color_hover',
                            'label' => esc_html__('Icon Color Hover', 'basilico' ),
                            'type' => 'color',
                            'selectors' => [
                                '{{WRAPPER}} .social-item:hover' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'social_bg_border',
                            'label' => esc_html__('Border Color', 'basilico' ),
                            'type' => 'color',
                            'selectors' => [
                                '{{WRAPPER}} .social-item' => 'border-color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'social_bg_color_hover',
                            'label' => esc_html__('Background Color Hover', 'basilico' ),
                            'type' => 'color',
                            'selectors' => [
                                '{{WRAPPER}} .social-item:hover' => 'border-color: {{VALUE}};',
                                '{{WRAPPER}} .social-item:after' => 'background-color: {{VALUE}};',
                            ],
                        )
                    )
                )
            )
        )
    ),
    basilico_get_class_widget_path()
);