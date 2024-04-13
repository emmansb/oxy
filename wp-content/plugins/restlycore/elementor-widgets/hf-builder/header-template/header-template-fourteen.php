<?php namespace Elementor;

class restly_header_template_fourteen extends Widget_Base {

    public function get_name() {

        return 'restly_header_template_fourteen';
    }

    public function get_title() {
        return esc_html__( 'Restly Header Fourteen', 'restlycore' );
    }

    public function get_icon() {

        return 'eicon-nav-menu';
    }

    public function get_categories() {
        return ['restlyhf'];
    }
    private function get_available_menus() {
        $menus = wp_get_nav_menus();

        $options = [];

        foreach ( $menus as $menu ) {
            $options[$menu->slug] = $menu->name;
        }

        return $options;
    }
    protected function register_controls() {

        $this->start_controls_section(
            'header_template_one_options',
            [
                'label' => esc_html__( 'Top Header', 'restlycore' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'enable_top_header',
            [
                'label'        => esc_html__( 'Enable Top header', 'restlycore' ),
                'type'         => \Elementor\Controls_Manager::SWITCHER,
                'label_on'     => esc_html__( 'Show', 'restlycore' ),
                'label_off'    => esc_html__( 'Hide', 'restlycore' ),
                'return_value' => 'yes',
                'default'      => 'yes',
            ]
        );
        $this->start_controls_tabs(
            'header_top_tabs',
        );
        $this->start_controls_tab(
            'top_right',
            [
                'label'     => esc_html__( 'Header Top Left', 'restlycore' ),
                'condition' => [
                    'enable_top_header' => 'yes',
                ],
            ]
        );
        $this->add_control(
			'Promotion_icon',
			[
				'label' => esc_html__( 'Icon', 'restlycore' ),
				'type' => \Elementor\Controls_Manager::ICONS,
			]
		);
        $this->add_control(
            'Promotion_text',
            [
                'label'   => esc_html__( 'Promotion Text', 'restlycore' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__( 'Are you ready to grow up your business?', 'restlycore' ),
            ]
        );
        $this->end_controls_tab();
        $this->start_controls_tab(
            'top_left',
            [
                'label'     => esc_html__( 'Header Top Right', 'restlycore' ),
                'condition' => [
                    'enable_top_header' => 'yes',
                ],
            ]
        );
        $repeater = new \Elementor\Repeater();
        $repeater->add_control(
			'top_list_icon',
			[
				'label' => esc_html__( 'Icon', 'restlycore' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-map-marker-alt',
					'library' => 'fa-solid',
				],
			]
		);
        $repeater->add_control(
            'left_content',
            [
                'label'   => esc_html__( 'Content', 'restlycore' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( '15 Mark Street Tower, Berlin. Germany', 'restlycore' ),
                'label_block'      => true,
            ]
        );
        $repeater->add_control(
			'enable_title_link',
			[
				'label' => esc_html__( 'Enable Link', 'restlycore' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'restlycore' ),
				'label_off' => esc_html__( 'Hide', 'restlycore' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);
        $repeater->add_control(
            'left_content_link',
            [
                'label'       => esc_html__( 'Link', 'restlycore' ),
                'type'        => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__( 'https://your-link.com', 'restlycore' ),
                'options'     => ['url', 'is_external', 'nofollow'],
                'default'     => [
                    'url'         => '',
                    'is_external' => true,
                    'nofollow'    => true,
                ],
                'label_block' => true,
                'condition' => [
                    'enable_title_link' => 'yes',
                ],
            ]
        );
        $this->add_control(
            'items',
            [
                'label'     => esc_html__( 'Info List', 'restlycore' ),
                'type'      => \Elementor\Controls_Manager::REPEATER,
                'fields'    => $repeater->get_controls(),
                'default'   => [
                    [
                        'left_content' => esc_html__( '15 Mark Street Tower, Berlin. Germany', 'restlycore' ),
                    ],
                ],
                'condition' => [
                    'enable_top_header' => 'yes',
                ],
                'title_field' => '{{{ left_content }}}',
            ]
        );

        $this->end_controls_tab();
        $this->end_controls_tabs();

        $this->end_controls_section();

        $this->start_controls_section(
            'header_center_content',
            [
                'label' => esc_html__( 'Header Center Content', 'restlycore' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'select_logo',
            [
                'label'   => esc_html__( 'Select Logo', 'restlycore' ),
                'type'    => \Elementor\Controls_Manager::SELECT,
                'default' => 'default',
                'options' => [
                    'custom'  => esc_html__( 'Custom Logo', 'restlycore' ),
                    'default' => esc_html__( 'Default', 'restlycore' ),
                ],
            ]
        );
        $this->add_control(
            'logo',
            [
                'label'     => esc_html__( 'Choose Image', 'restlycore' ),
                'type'      => \Elementor\Controls_Manager::MEDIA,
                'condition' => [
                    'select_logo' => 'custom',
                ],
            ]
        );
        $this->add_control(
            'logo_link',
            [
                'label'       => esc_html__( 'Logo Link', 'restlycore' ),
                'type'        => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__( 'https://your-link.com', 'restlycore' ),
                'options'     => ['url', 'is_external', 'nofollow'],
                'default'     => [
                    'url'         => '',
                    'is_external' => true,
                    'nofollow'    => true,
                ],
                'label_block' => true,
                'condition'   => [
                    'select_logo' => 'custom',
                ],
            ]
        );
        $this->add_control(
            'mobile_logo_notes',
            [
                'label' => esc_html__( 'Mobile Logo Select', 'restlycore' ),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        
        $this->add_control(
            'mobile_logo_select',
            [
                'label'   => esc_html__( 'Select logo Options', 'restlycore' ),
                'type'    => \Elementor\Controls_Manager::SELECT,
                'default' => 'default',
                'options' => [
                    'default' => esc_html__( 'Default Logo', 'restlycore' ),
                    'custom'  => esc_html__( 'Custom Logo', 'restlycore' ),
                ],
            ]
        );
        $this->add_control(
            'mobile_logo',
            [
                'label'     => esc_html__( 'Upload Logo', 'restlycore' ),
                'type'      => \Elementor\Controls_Manager::MEDIA,
                'condition' => [
                    'mobile_logo_select' => 'custom',
                ],
            ]
        );
        $this->add_control(
            'icon_notes',
            [
                'label' => esc_html__( 'Call Us Area', 'restlycore' ),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $repeater = new \Elementor\Repeater();
        $repeater->add_control(
            'enable_call_us_area',
            [
                'label' => esc_html__( 'Enable Call Us Area', 'restlycore' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Show', 'restlycore' ),
                'label_off' => esc_html__( 'Hide', 'restlycore' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );
        $repeater->add_control(
			'call_icon',
			[
				'label'            => esc_html__( 'Call Icon', 'restlycore' ),
				'type'             => Controls_Manager::ICONS,
				'fa4compatibility' => 'icon',
				'label_block'      => true,
				'default' => [
					'value' => 'fas fa-phone-alt',
					'library' => 'fa-solid',
				],
                'condition' => [
                    'enable_call_us_area' => 'yes',
                ],
			]
		);

		$repeater->add_control(
			'call_btn_stitle',
			[
				'label'       => __( 'Call Button Subtitle', 'restlycore' ),
				'label_block'       => true,
				'type'        => Controls_Manager::TEXT,
				'default'     => 'Quick Call',
                'condition' => [
                    'enable_call_us_area' => 'yes',
                ],
			]
		);

		$repeater->add_control(
			'call_btn_number',
			[
				'label'       => __( 'Call Button Number', 'restlycore' ),
				'label_block'       => true,
				'type'        => Controls_Manager::TEXT,
                'label_block'       => true,
				'default'     => '(904) 12-366-25',
                'condition' => [
                    'enable_call_us_area' => 'yes',
                ],
			]
		);
        $repeater->add_control(
            'enable_call_us_area_link',
            [
                'label' => esc_html__( 'Enable Link', 'restlycore' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Show', 'restlycore' ),
                'label_off' => esc_html__( 'Hide', 'restlycore' ),
                'return_value' => 'yes',
                'default' => 'no',
                'condition' => [
                    'enable_call_us_area' => 'yes',
                ],
            ]
        );
        $repeater->add_control(
            'call_us_area_link',
            [
                'label'       => esc_html__( 'Link', 'restlycore' ),
                'type'        => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__( 'https://your-link.com', 'restlycore' ),
                'options'     => ['url', 'is_external', 'nofollow'],
                'default'     => [
                    'url'               => '',
                    'is_external'       => true,
                    'nofollow'          => true,
                    'custom_attributes' => '',
                ],
                'label_block' => true,
                'condition'   => [
                    'enable_call_us_area_link' => 'yes',
                    'enable_call_us_area' => 'yes',
                ],
            ]
        );
        $this->add_control(
            'repeter_list',
            [
                'label'       => esc_html__( 'Repeater List', 'restlycore' ),
                'type'        => \Elementor\Controls_Manager::REPEATER,
                'fields'      => $repeater->get_controls(),
				'default' => [
					[
						'call_btn_stitle' => esc_html__( 'Call 24/7 anytime', 'restlycore' ),
						'call_btn_number' => esc_html__( '+258 (2183) 3118', 'restlycore' ),
					],
                    [
						'call_btn_stitle' => esc_html__( 'Mail Us Anytime', 'restlycore' ),
						'call_btn_number' => esc_html__( 'info@restly.com', 'restlycore' ),
					],
                    [
						'call_btn_stitle' => esc_html__( 'Office Time', 'restlycore' ),
						'call_btn_number' => esc_html__( 'Mon-Fri: 9:00-18:00', 'restlycore' ),
					],
                    
				],
                'title_field' => '{{{ call_btn_stitle }}}',
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'menu',
            [
                'label' => esc_html__( 'Menu Options', 'restlycore' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );
        $menus = $this->get_available_menus();

        if ( !empty( $menus ) ) {
            $this->add_control(
                'menu_select',
                [
                    'label'        => __( 'Menu', 'restlycore' ),
                    'type'         => Controls_Manager::SELECT,
                    'options'      => $menus,
                    'default'      => array_keys( $menus )[0],
                    'save_default' => true,
                    'separator'    => 'after',
                    'description'  => sprintf( __( 'Go to the <a href="%s" target="_blank">Menus screen</a> to manage your menus.', 'restlycore' ), admin_url( 'nav-menus.php' ) ),
                ]
            );
        } else {
            $this->add_control(
                'menu_select',
                [
                    'type'            => Controls_Manager::RAW_HTML,
                    'raw'             => '<strong>' . __( 'There are no menus in your site.', 'restlycore' ) . '</strong><br>' . sprintf( __( 'Go to the <a href="%s" target="_blank">Menus screen</a> to create one.', 'restlycore' ), admin_url( 'nav-menus.php?action=edit&menu=0' ) ),
                    'separator'       => 'after',
                    'content_classes' => 'elementor-panel-alert elementor-panel-alert-info',
                ]
            );
        }
        $this->add_control(
            'align',
            [
                'label'     => esc_html__( 'Alignment', 'restlycore' ),
                'type'      => \Elementor\Controls_Manager::CHOOSE,
                'options'   => [
                    'flex-start' => [
                        'title' => esc_html__( 'Left', 'restlycore' ),
                        'icon'  => 'eicon-text-align-left',
                    ],
                    'center'     => [
                        'title' => esc_html__( 'Center', 'restlycore' ),
                        'icon'  => 'eicon-text-align-center',
                    ],
                    'flex-end'   => [
                        'title' => esc_html__( 'Right', 'restlycore' ),
                        'icon'  => 'eicon-text-align-right',
                    ],
                ],
                'default'   => 'flex-start',
                'toggle'    => true,
                'selectors' => [
                    '{{WRAPPER}} .tp-header .navbar-expand-lg .navbar-collapse' => 'justify-content: {{VALUE}};',
                ],
            ]
        );
        $this->end_controls_section();


        $this->start_controls_section(
            'buttons',
            [
                'label' => esc_html__( 'Button', 'restlycore' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'enable_btn',
            [
                'label'        => esc_html__( 'Enable Button', 'restlycore' ),
                'type'         => \Elementor\Controls_Manager::SWITCHER,
                'label_on'     => esc_html__( 'Show', 'restlycore' ),
                'label_off'    => esc_html__( 'Hide', 'restlycore' ),
                'return_value' => 'yes',
                'default'      => 'yes',
            ]
        );

        $this->add_control(
            'btn_icon',
            [
                'label' => esc_html__( 'Icon', 'restlycore' ),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value'   => 'fas fa-arrow-right',
                    'library' => 'fa-solid',
                ],
                'condition'   => [
                    'enable_btn' => 'yes',
                ],
            ]
        );
        $this->add_control(
            'button_text',
            [
                'label'       => esc_html__( 'Button Text', 'restlycore' ),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__( 'Free Quote', 'restlycore' ),
                'label_block' => true,
                'condition'   => [
                    'enable_btn' => 'yes',
                ],
            ]
        );
        $this->add_control(
            'button_url',
            [
                'label'       => esc_html__( 'Button Link', 'restlycore' ),
                'type'        => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__( 'https://your-link.com', 'restlycore' ),
                'options'     => ['url', 'is_external', 'nofollow'],
                'default'     => [
                    'url'               => '',
                    'is_external'       => true,
                    'nofollow'          => true,
                    'custom_attributes' => '',
                ],
                'label_block' => true,
                'condition'   => [
                    'enable_btn' => 'yes',
                ],
            ]
        );
      
        $this->end_controls_section();

     

        $this->start_controls_section(
            'top_header_styles',
            [
                'label' => esc_html__( 'Header Top', 'restlycore' ),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'enable_top_header' => 'yes',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name'     => 'top_bg',
                'types'    => ['classic', 'gradient', 'video'],
                'selector' => '{{WRAPPER}} .tp-header .header-top',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'top_border',
                'label' => esc_html__( 'Border', 'restlycore' ),
                'selector' => '{{WRAPPER}} .tp-header .header-top',
            ]
        );
        $this->add_responsive_control(
            'top_border_radius',
            [
                'label' => esc_html__( 'Border Radisu', 'restlycore' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 1,
                    ]
                ],
                'selectors' => [
                    '{{WRAPPER}} .tp-header .header-top' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'top_margin',
            [
                'label'      => esc_html__( 'Margin', 'restlycore' ),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors'  => [
                    '{{WRAPPER}} .tp-header .header-top' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'top_padding',
            [
                'label'      => esc_html__( 'Padding', 'restlycore' ),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors'  => [
                    '{{WRAPPER}} .tp-header .header-top' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

            $this->start_controls_tabs(
                'top_header_tabs_css'
            );

                $this->start_controls_tab(
                    'top_left_css_tab',
                    [
                        'label' => esc_html__( 'Left Content', 'restlycore' ),
                    ]
                );
                $this->add_responsive_control(
                    'top_laft_icon-gap',
                    [
                        'label' => esc_html__( 'Icon Gap', 'restlycore' ),
                        'type' => \Elementor\Controls_Manager::SLIDER,
                        'size_units' => [ 'px' ],
                        'range' => [
                            'px' => [
                                'min' => 0,
                                'max' => 100,
                                'step' => 5,
                            ],
                        ],
                        'selectors' => [
                            '{{WRAPPER}} .promation_text i' => 'margin-right: {{SIZE}}{{UNIT}};',
                        ],
                    ]
                );
                $this->add_responsive_control(
                    'top_left_icon_color',
                    [
                        'label'     => esc_html__( 'Icon Color', 'restlycore' ),
                        'type'      => \Elementor\Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .promation_text i' => 'color: {{VALUE}}',
                        ],
                    ]
                );
                $this->add_group_control(
                    \Elementor\Group_Control_Typography::get_type(),
                    [
                        'name'     => 'top_laft_typo',
                        'selector' => '{{WRAPPER}} .promation_text',
                    ]
                );
                $this->add_responsive_control(
                    'top_left_label_color',
                    [
                        'label'     => esc_html__( 'Label Color', 'restlycore' ),
                        'type'      => \Elementor\Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .promation_text' => 'color: {{VALUE}}',
                        ],
                    ]
                );

                $this->add_responsive_control(
                    'top_left_margin',
                    [
                        'label'      => esc_html__( 'Margin', 'restlycore' ),
                        'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                        'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                        'selectors'  => [
                            '{{WRAPPER}} .promation_text' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                    ]
                );
                $this->add_responsive_control(
                    'top_left_padding',
                    [
                        'label'      => esc_html__( 'Padding', 'restlycore' ),
                        'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                        'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                        'selectors'  => [
                            '{{WRAPPER}} .promation_text' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                    ]
                );
                $this->end_controls_tab();

                $this->start_controls_tab(
                    'top_time_css_tab',
                    [
                        'label' => esc_html__( 'Right Content', 'restlycore' ),
                    ]
                );
                $this->add_responsive_control(
                    'right_time_icon_color',
                    [
                        'label' => esc_html__( 'Icon Color', 'restlycore' ),
                        'type' => \Elementor\Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .header-fourteen .header-top .top-header-right ul li span' => 'color: {{VALUE}}',
                        ],
                    ]
                );
                $this->add_responsive_control(
                    'right_time_icon_gap',
                    [
                        'label' => esc_html__( 'Icon Gap', 'restlycore' ),
                        'type' => Controls_Manager::SLIDER,
                        'size_units' => [ 'px', '%' ],
                        'range' => [
                            'px' => [
                                'min' => 0,
                                'max' => 100,
                                'step' => 1,
                            ]
                        ],
                        'selectors' => [
                            '{{WRAPPER}} .header-fourteen .header-top .top-header-right ul li span' => 'margin-right: {{SIZE}}{{UNIT}};',
                        ],
                    ]
                );
                $this->add_responsive_control(
                    'time_text_color',
                    [
                        'label'     => esc_html__( 'Color', 'restlycore' ),
                        'type'      => \Elementor\Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .header-fourteen .header-top .top-header-right ul li' => 'color: {{VALUE}}',
                            '{{WRAPPER}} .header-fourteen .header-top .top-header-right ul li a' => 'color: {{VALUE}}',
                        ],
                    ]
                );
                $this->add_responsive_control(
                    'time_icon_color',
                    [
                        'label'     => esc_html__( 'Hover Color', 'restlycore' ),
                        'type'      => \Elementor\Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .header-fourteen .header-top .top-header-right ul li a:hover' => 'color: {{VALUE}}',
                        ],
                    ]
                );
                $this->add_group_control(
                    \Elementor\Group_Control_Typography::get_type(),
                    [
                        'name'     => 'time_typography',
                        'selector' => '{{WRAPPER}} .header-fourteen .header-top .top-header-right ul li i,{{WRAPPER}} .header-fourteen .header-top .top-header-right ul li',
                    ]
                );

                $this->add_responsive_control(
                    'time_margin',
                    [
                        'label'      => esc_html__( 'Margin', 'restlycore' ),
                        'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                        'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                        'selectors'  => [
                            '{{WRAPPER}} .header-fourteen .header-top .top-header-right ul li' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                    ]
                );
                $this->add_responsive_control(
                    'time_padding',
                    [
                        'label'      => esc_html__( 'Padding', 'restlycore' ),
                        'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                        'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                        'selectors'  => [
                            '{{WRAPPER}} .office-time' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                    ]
                );

                $this->end_controls_tab();
            $this->end_controls_tabs();

        $this->end_controls_section();

        $this->start_controls_section(
            'header_center_option',
            [
                'label' => esc_html__( 'Header Center Style', 'restlycore' ),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->start_controls_tabs(
            'header_center_tabs',
        );
        $this->start_controls_tab(
            'center_box_style',
            [
                'label' => esc_html__( 'Box', 'restlycore' ),
            ]
        );
        $this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'center_box_background',
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .header-meddile-area',
			]
		);
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'center_box_border',
                'label' => esc_html__( 'Border', 'restlycore' ),
                'selector' => '{{WRAPPER}} .header-meddile-area',
            ]
        );
        $this->add_responsive_control(
            'center_box_border_radius',
            [
                'label'      => esc_html__( 'Border Radius', 'restlycore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .header-meddile-area' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
         $this->add_responsive_control(
            'center_box_margin',
            [
                'label'      => esc_html__( 'Margin', 'restlycore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .header-meddile-area' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'center_box_padding',
            [
                'label'      => esc_html__( 'Padding', 'restlycore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .header-meddile-area' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->start_controls_tab(
            'logo_options',
            [
                'label'     => esc_html__( 'Logo Style', 'restlycore' ),
            ]
        );
        $this->add_responsive_control(
            'logo_section_width',
            [
                'label' => esc_html__( 'Section Width', 'restlycore' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                        'step' => 5,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .logo-area .site-branding' => 'min-width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'logo_width',
            [
                'label' => esc_html__( 'Logo Width', 'restlycore' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                        'step' => 5,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .logo-area .site-branding img ' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'object',
            [
                'label' => esc_html__( 'Object Fit', 'restlycore' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'cover',
                'options' => [
                    'fill'  => esc_html__( 'Fill', 'restlycore' ),
                    'contain' => esc_html__( 'Contain', 'restlycore' ),
                    'cover' => esc_html__( 'Cover', 'restlycore' ),
                    'none' => esc_html__( 'None', 'restlycore' ),
                ],
                'selectors' => [
                    '{{WRAPPER}} .logo-area .site-branding img' => 'object-fit: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'logo_typography',
                'selector' => '{{WRAPPER}} .header-fourteen .logo-area .site-branding .site-title a',
            ]
        );
        $this->add_responsive_control(
            'logo_color',
            [
                'label'     => esc_html__( 'Color', 'restlycore' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .header-fourteen .logo-area .site-branding .site-title a' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'logo_color_hover',
            [
                'label'     => esc_html__( 'Hover Color', 'restlycore' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .header-fourteen .logo-area .site-branding .site-title a:hover' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'logo_margin',
            [
                'label'      => esc_html__( 'Margin', 'restlycore' ),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors'  => [
                    '{{WRAPPER}} .logo-area .site-branding a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'logo_padding',
            [
                'label'      => esc_html__( 'Padding', 'restlycore' ),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors'  => [
                    '{{WRAPPER}} .logo-area .site-branding a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->add_responsive_control(
			'cta_button_style',
			[
				'label' => esc_html__( 'CTA Button Style', 'restlycore' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
       
        $this->start_controls_tabs(
            'cta_content_tabs'
        );
        
            $this->start_controls_tab(
                'cta_icon_tab',
                [
                    'label' => esc_html__( 'Icon', 'restlycore' ),
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'call_us_icon_size',
                    'label' => __( 'Typography', 'restlycore' ),
                    'selector' => '{{WRAPPER}} .header-fourteen-call-icon',
                ]
            );
            $this->add_responsive_control(
                'call_us_icon_width',
                [
                    'label'      => esc_html__( 'Width', 'restlycore' ),
                    'type'       => Controls_Manager::SLIDER,
                    'size_units' => ['px', '%'],
                    'range'      => [
                        'px' => [
                            'min'  => 0,
                            'max'  => 300,
                            'step' => 1,
                        ],
                    ],
                    'selectors'  => [
                        '{{WRAPPER}} .header-fourteen-call-icon' => 'width: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );
             $this->add_responsive_control(
                'call_us_min_icon_width',
                [
                    'label'      => esc_html__( 'Min Width', 'restlycore' ),
                    'type'       => Controls_Manager::SLIDER,
                    'size_units' => ['px', '%'],
                    'range'      => [
                        'px' => [
                            'min'  => 0,
                            'max'  => 300,
                            'step' => 1,
                        ],
                    ],
                    'selectors'  => [
                        '{{WRAPPER}} .header-fourteen-call-icon' => 'min-width: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );
            $this->add_responsive_control(
                'call_us_icon_height',
                [
                    'label'      => esc_html__( 'Height', 'restlycore' ),
                    'type'       => Controls_Manager::SLIDER,
                    'size_units' => ['px', '%'],
                    'range'      => [
                        'px' => [
                            'min'  => 0,
                            'max'  => 300,
                            'step' => 1,
                        ],
                    ],
                    'selectors'  => [
                        '{{WRAPPER}} .header-fourteen-call-icon' => 'height: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );
            $this->add_responsive_control(
                'call_us_icon_color',
                [
                    'label'     => esc_html__( 'Color', 'restlycore' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .header-fourteen-call-icon' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Background::get_type(),
                [
                    'name'     => 'call_us_icon_bg',
                    'label'    => esc_html__( 'Background', 'restlycore' ),
                    'types'    => ['classic', 'gradient', 'video'],
                    'selector' => '{{WRAPPER}} .header-fourteen-call-icon',
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_box_Shadow::get_type(),
                [
                    'name'     => 'call_us_icon_shadow',
                    'label'    => esc_html__( 'icon Shadow', 'restlycore' ),
                    'selector' => '{{WRAPPER}} .header-fourteen-call-icon',
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Border::get_type(),
                [
                    'name'     => 'call_us_icon_border',
                    'label'    => esc_html__( 'Border', 'restlycore' ),
                    'selector' => '{{WRAPPER}} .header-fourteen-call-icon',
                ]
            );
            $this->add_responsive_control(
                'call_us_icon_radius',
                [
                    'label'      => esc_html__( 'Border Radius', 'restlycore' ),
                    'type'       => Controls_Manager::DIMENSIONS,
                    'size_units' => ['px', '%', 'em'],
                    'selectors'  => [
                        '{{WRAPPER}} .header-fourteen-call-icon' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
            $this->add_control(
                'call_us_svg_size_note',
                [
                    'label' => __( 'SVG Icon Size', 'restlycore' ),
                    'type' => \Elementor\Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );
            $this->add_responsive_control(
                'call_us_icon_svg_width',
                [
                    'label' => esc_html__( 'SVG With', 'restlycore' ),
                    'type' => Controls_Manager::SLIDER,
                    'size_units' => [ 'px' ],
                    'range' => [
                        'px' => [
                            'min' => 0,
                            'max' => 300,
                            'step' => 1,
                        ],
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .header-fourteen-call-icon svg' => 'width: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );
            $this->add_responsive_control(
                'call_us_icon_svg_height',
                [
                    'label' => esc_html__( 'SVG Height', 'restlycore' ),
                    'type' => Controls_Manager::SLIDER,
                    'size_units' => [ 'px' ],
                    'range' => [
                        'px' => [
                            'min' => 0,
                            'max' => 300,
                            'step' => 1,
                        ],
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .header-fourteen-call-icon svg' => 'width: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );
           
            $this->add_responsive_control(
                'call_us_icon_margin',
                [
                    'label'      => esc_html__( 'Margin', 'restlycore' ),
                    'type'       => Controls_Manager::DIMENSIONS,
                    'size_units' => ['px', '%', 'em'],
                    'selectors'  => [
                        '{{WRAPPER}} .header-fourteen-call-icon' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
            $this->add_responsive_control(
                'call_us_icon_padding',
                [
                    'label'      => esc_html__( 'Padding', 'restlycore' ),
                    'type'       => Controls_Manager::DIMENSIONS,
                    'size_units' => ['px', '%', 'em'],
                    'selectors'  => [
                        '{{WRAPPER}} .header-fourteen-call-icon' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
            $this->end_controls_tab();
            $this->start_controls_tab(
                'cta_stitle_tab',
                [
                    'label' => esc_html__( 'Small Title', 'restlycore' ),
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'call_us_small_title_typo',
                    'label' => __( 'Typography', 'restlycore' ),
                    'selector' => '{{WRAPPER}} .header-fourteen-call-title',
                ]
            );
            $this->add_responsive_control(
                'call_us_small_title_color',
                [
                    'label'       => esc_html__('Color', 'restlycore'),
                    'type'        => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .header-fourteen-call-title' => 'color: {{VALUE}};',
                    ],
                ]
            );
            $this->add_responsive_control(
                'call_us_small_title_margin',
                [
                    'label'      => esc_html__( 'Margin', 'restlycore' ),
                    'type'       => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors'  => [
                        '{{WRAPPER}} .header-fourteen-call-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
            $this->add_responsive_control(
                'call_us_small_title_padding',
                [
                    'label'      => esc_html__( 'Padding', 'restlycore' ),
                    'type'       => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors'  => [
                        '{{WRAPPER}} .header-fourteen-call-title' => 'Padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
            $this->end_controls_tab();
            $this->start_controls_tab(
                'cta_title_tab',
                [
                    'label' => esc_html__( 'Title', 'restlycore' ),
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'call_us_typo',
                    'label' => __( 'Typography', 'restlycore' ),
                    'selector' => '{{WRAPPER}} .header-fourteen-call-number',
                ]
            );
    
            $this->add_responsive_control(
                'call_us_color',
                [
                    'label'       => esc_html__('Color', 'restlycore'),
                    'type'        => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .header-fourteen-call-number' => 'color: {{VALUE}};',
                    ],
                ]
            );
            $this->add_responsive_control(
                'call_us_margin',
                [
                    'label'      => esc_html__( 'Margin', 'restlycore' ),
                    'type'       => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors'  => [
                        '{{WRAPPER}} .header-fourteen-call-number' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
            $this->add_responsive_control(
                'call_us_padding',
                [
                    'label'      => esc_html__( 'Padding', 'restlycore' ),
                    'type'       => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors'  => [
                        '{{WRAPPER}} .header-fourteen-call-number' => 'Padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
            $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();

        $this->start_controls_section(
            'menu_css_options',
            [
                'label' => esc_html__( ' Menu Style ', 'restlycore' ),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'menu_box_bg',
                'label' => esc_html__( 'Background', 'restlycore' ),
                'types' => [ 'classic', 'gradient', 'video' ],
                'selector' => '{{WRAPPER}} .header-fourteen .main-menu',
                'separator' => 'before',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'menu_box_shadow',
                'label' => esc_html__( 'Box Shadow', 'restlycore' ),
                'selector' => '{{WRAPPER}} .header-fourteen .main-menu',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'menu_box_border',
                'label' => esc_html__( 'Border', 'restlycore' ),
                'selector' => '{{WRAPPER}} .header-fourteen .main-menu',
            ]
        );
        $this->add_responsive_control(
            'menu_box_margin',
            [
                'label' => esc_html__( 'Margin', 'restlycore' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .header-fourteen .main-menu' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'menu_box_padding',
            [
                'label' => esc_html__( 'Padding', 'restlycore' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .header-fourteen .main-menu' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
            $this->start_controls_tabs(
                'menu_style_tabs'
            );
                $this->start_controls_tab(
                    'main_menu_style',
                    [
                        'label' => esc_html__( 'Main Menu', 'restlycore' ),
                    ]
                );
            
                $this->add_responsive_control(
                    'menu_color',
                    [
                        'label'     => esc_html__( 'Color', 'restlycore' ),
                        'type'      => \Elementor\Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .main-menu>ul>li>a' => 'color: {{VALUE}}',
                        ],
                    ]
                );
                $this->add_responsive_control(
                    'menu_hcolor',
                    [
                        'label'     => esc_html__( 'Hover Color', 'restlycore' ),
                        'type'      => \Elementor\Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .main-menu>ul>li>a:hover' => 'color: {{VALUE}}',
                        ],
                    ]
                );
                $this->add_group_control(
                    \Elementor\Group_Control_Typography::get_type(),
                    [
                        'name'     => 'menu_typo',
                        'selector' => '{{WRAPPER}} .main-menu>ul>li>a',
                    ]
                );
                $this->add_responsive_control(
                    'menu_margin',
                    [
                        'label'      => esc_html__( 'Margin', 'restlycore' ),
                        'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                        'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                        'selectors'  => [
                            '{{WRAPPER}} .main-menu>ul>li>a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                    ]
                );

                $this->add_responsive_control(
                    'menu_padding',
                    [
                        'label'      => esc_html__( 'Padding', 'restlycore' ),
                        'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                        'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                        'selectors'  => [
                            '{{WRAPPER}} .main-menu>ul>li>a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                    ]
                );
                $this->end_controls_tab();
                $this->start_controls_tab(
                    'sub_menu_tab',
                    [
                        'label' => esc_html__( 'Sub Menu', 'restlycore' ),
                    ]
                );
                $this->add_group_control(
                    \Elementor\Group_Control_Typography::get_type(),
                    [
                        'name'     => 'submenu_typo',
                        'selector' => '{{WRAPPER}} .main-navigation ul li.no-mega ul.sub-menu li a',
                    ]
                );
                $this->add_responsive_control(
                    'submenu_width',
                    [
                        'label'      => esc_html__( 'Min Width', 'restlycore' ),
                        'type'       => \Elementor\Controls_Manager::SLIDER,
                        'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                        'range'      => [
                            'px' => [
                                'min'  => 0,
                                'max'  => 300,
                                'step' => 1,
                            ],
                            '%'  => [
                                'min' => 0,
                                'max' => 100,
                            ],
                        ],
                        'selectors'  => [
                            '{{WRAPPER}} .main-navigation ul li.no-mega ul.sub-menu' => 'min-width: {{SIZE}}{{UNIT}};',
                        ],
                    ]
                );
                $this->add_responsive_control(
                    'submenu_color',
                    [
                        'label'     => esc_html__( 'Color', 'restlycore' ),
                        'type'      => \Elementor\Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .main-navigation ul li.no-mega ul.sub-menu li a' => 'color: {{VALUE}}',
                        ],
                    ]
                );
                $this->add_responsive_control(
                    'submenu_hcolor',
                    [
                        'label'     => esc_html__( 'Hover Color', 'restlycore' ),
                        'type'      => \Elementor\Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .main-navigation ul li.no-mega ul.sub-menu li a:hover' => 'color: {{VALUE}}',
                        ],
                    ]
                );
                $this->add_responsive_control(
                    'submenu_bg',
                    [
                        'label'     => esc_html__( 'background', 'restlycore' ),
                        'type'      => \Elementor\Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .main-navigation ul li.no-mega ul.sub-menu' => 'background-color: {{VALUE}}',
                        ],
                    ]
                );
                $this->add_responsive_control(
                    'submenu_hbg',
                    [
                        'label'     => esc_html__( 'Hover Background', 'restlycore' ),
                        'type'      => \Elementor\Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .main-navigation ul li.no-mega ul.sub-menu li a:hover' => 'background-color: {{VALUE}}',
                        ],
                    ]
                );
                $this->add_responsive_control(
                    'submenu_border',
                    [
                        'label'     => esc_html__( 'Border Color', 'restlycore' ),
                        'type'      => \Elementor\Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .main-navigation ul li.no-mega ul.sub-menu li' => 'border-color: {{VALUE}}',
                        ],
                    ]
                );
                $this->add_responsive_control(
                    'submenu_align',
                    [
                        'label'     => esc_html__( 'Alignment', 'restlycore' ),
                        'type'      => \Elementor\Controls_Manager::CHOOSE,
                        'options'   => [
                            'left'   => [
                                'title' => esc_html__( 'Left', 'restlycore' ),
                                'icon'  => 'eicon-text-align-left',
                            ],
                            'center' => [
                                'title' => esc_html__( 'Center', 'restlycore' ),
                                'icon'  => 'eicon-text-align-center',
                            ],
                            'right'  => [
                                'title' => esc_html__( 'Right', 'restlycore' ),
                                'icon'  => 'eicon-text-align-right',
                            ],
                        ],
                        'default'   => 'left',
                        'toggle'    => true,
                        'selectors' => [
                            '{{WRAPPER}} .main-navigation ul li.no-mega ul.sub-menu' => 'text-align: {{VALUE}};',
                        ],
                    ]
                );
                $this->add_responsive_control(
                    'submenu_margin',
                    [
                        'label'      => esc_html__( 'Margin', 'restlycore' ),
                        'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                        'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                        'selectors'  => [
                            '{{WRAPPER}} .main-navigation ul li.no-mega ul.sub-menu li a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                    ]
                );
                $this->add_responsive_control(
                    'submenu_padding',
                    [
                        'label'      => esc_html__( 'Padding', 'restlycore' ),
                        'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                        'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                        'selectors'  => [
                            '{{WRAPPER}} .main-navigation ul li.no-mega ul.sub-menu li a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                    ]
                );
                $this->end_controls_tab();

                $this->start_controls_tab(
                    'mega_menu_tab',
                    [
                        'label' => esc_html__( 'Mega Menu', 'restlycore' ),
                    ]
                );
                $this->add_group_control(
                    \Elementor\Group_Control_Typography::get_type(),
                    [
                        'name'     => 'mega_typo',
                        'selector' => '{{WRAPPER}} .main-menu ul li.mega ul li a',
                    ]
                );
                $this->add_responsive_control(
                    'mega_width',
                    [
                        'label'      => esc_html__( 'Box Width', 'restlycore' ),
                        'type'       => \Elementor\Controls_Manager::SLIDER,
                        'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                        'range'      => [
                            'px' => [
                                'min'  => 0,
                                'max'  => 1600,
                                'step' => 1,
                            ],
                            '%'  => [
                                'min' => 0,
                                'max' => 100,
                            ],
                        ],
                        'default'    => [
                            'unit' => 'px',
                            'size' => 1320,
                        ],
                        'selectors'  => [
                            '{{WRAPPER}} .main-menu ul li.mega ul' => 'max-width: {{SIZE}}{{UNIT}};',
                        ],
                    ]
                );
                $this->add_responsive_control(
                    'mega_align',
                    [
                        'label'     => esc_html__( 'Alignment', 'restlycore' ),
                        'type'      => \Elementor\Controls_Manager::CHOOSE,
                        'options'   => [
                            'left'   => [
                                'title' => esc_html__( 'Left', 'restlycore' ),
                                'icon'  => 'eicon-text-align-left',
                            ],
                            'center' => [
                                'title' => esc_html__( 'Center', 'restlycore' ),
                                'icon'  => 'eicon-text-align-center',
                            ],
                            'right'  => [
                                'title' => esc_html__( 'Right', 'restlycore' ),
                                'icon'  => 'eicon-text-align-right',
                            ],
                        ],
                        'default'   => 'left',
                        'toggle'    => true,
                        'selectors' => [
                            '{{WRAPPER}} .main-menu ul li.mega ul li a' => 'text-align: {{VALUE}};',
                        ],
                    ]
                );
                $this->add_responsive_control(
                    'mega_bg',
                    [
                        'label'     => esc_html__( 'Box bg', 'restlycore' ),
                        'type'      => \Elementor\Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .main-menu>ul>li.mega>ul' => 'background-color: {{VALUE}}',
                        ],
                    ]
                );
                $this->add_responsive_control(
                    'mega_color',
                    [
                        'label'     => esc_html__( 'Color', 'restlycore' ),
                        'type'      => \Elementor\Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .main-menu ul li.mega ul li a' => 'color: {{VALUE}}',
                        ],
                    ]
                );
                $this->add_responsive_control(
                    'mega_hcolor',
                    [
                        'label'     => esc_html__( 'Hover Color', 'restlycore' ),
                        'type'      => \Elementor\Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .main-menu ul li.mega ul li a:hover' => 'color: {{VALUE}}',
                        ],
                    ]
                );

                $this->add_responsive_control(
                    'mega_margin',
                    [
                        'label'      => esc_html__( 'Margin', 'restlycore' ),
                        'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                        'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                        'selectors'  => [
                            '{{WRAPPER}} .main-menu ul li.mega ul li a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                    ]
                );
                $this->add_responsive_control(
                    'mega_padding',
                    [
                        'label'      => esc_html__( 'Padding', 'restlycore' ),
                        'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                        'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                        'selectors'  => [
                            '{{WRAPPER}} .main-menu ul li.mega ul li a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                    ]
                );
                $this->add_control(
                    'mega_top',
                    [
                        'label'     => esc_html__( 'Mega Hadding', 'restlycore' ),
                        'type'      => \Elementor\Controls_Manager::HEADING,
                        'separator' => 'before',
                    ]
                );
                $this->add_group_control(
                    \Elementor\Group_Control_Typography::get_type(),
                    [
                        'name'     => 'mega_hadding_typo',
                        'selector' => '{{WRAPPER}} .main-menu ul li.mega > ul > li > a',
                    ]
                );
                $this->add_responsive_control(
                    'mega_hadding_color',
                    [
                        'label'     => esc_html__( 'Color', 'restlycore' ),
                        'type'      => \Elementor\Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .main-menu ul li.mega > ul > li > a' => 'color: {{VALUE}}',
                        ],
                    ]
                );
                $this->add_responsive_control(
                    'mega_hadding_border_color',
                    [
                        'label'     => esc_html__( 'border Color', 'restlycore' ),
                        'type'      => \Elementor\Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .main-menu ul li.mega > ul > li > a' => 'border-color: {{VALUE}}',
                        ],
                    ]
                );

                $this->end_controls_tab();

            $this->end_controls_tabs();

        $this->end_controls_section();



        $this->start_controls_section(
            'mobile_menu_settings',
            [
                'label' => esc_html__( 'Mobile Menu', 'restlycore' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_responsive_control(
            'mobile_menu_main_bg',
            [
                'label' => esc_html__( 'background Color', 'restlycore' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tp-menu-wrapper .tp-menu-area' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'mobile_menu_main_border',
                'label' => esc_html__( 'Border', 'restlycore' ),
                'selector' => '{{WRAPPER}}  .tp-menu-wrapper .tp-menu-area',
            ]
        );
        $this->add_responsive_control(
            'mobile_menu_main_width',
            [
                'label' => esc_html__( 'Width', 'restlycore' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 800,
                        'step' => 1,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .tp-menu-wrapper .tp-menu-area' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'mobile_menu_main_bg',
            [
                'label' => esc_html__( 'background Color', 'restlycore' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tp-menu-wrapper .tp-menu-area' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'mobile_menu_main_border',
                'label' => esc_html__( 'Border', 'restlycore' ),
                'selector' => '{{WRAPPER}}  .tp-menu-wrapper .tp-menu-area',
            ]
        );
        $this->add_responsive_control(
            'mobile_menu_max_main_width',
            [
                'label' => esc_html__( 'Max Width', 'restlycore' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 800,
                        'step' => 1,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .tp-menu-wrapper .tp-menu-area' => 'max-width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
            $this->start_controls_tabs(
                'mobile_meni_tabs'
            );
            
                $this->start_controls_tab(
                    'mobile_menu_icon_tab',
                    [
                        'label' => esc_html__( 'Icon', 'restlycore' ),
                    ]
                );
                
                    $this->add_group_control(
                        \Elementor\Group_Control_Typography::get_type(),
                        [
                            'name' => 'mobile_icon_size',
                            'selector' => '{{WRAPPER}} .tp-menu-toggle',
                        ]
                    );

                    $this->add_responsive_control(
                        'mobile_icon_color',
                        [
                            'label' => esc_html__( 'Icon Color', 'restlycore' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .tp-menu-toggle' => 'color: {{VALUE}}',
                            ],
                        ]
                    );
                    
                    $this->add_responsive_control(
                        'mobile_icon_hcolor',
                        [
                            'label' => esc_html__( 'Icon Hover Color', 'restlycore' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .tp-menu-toggle:hover' => 'color: {{VALUE}}',
                            ],
                        ]
                    );

                    $this->add_responsive_control(
                        'mobile_icon_bg',
                        [
                            'label' => esc_html__( 'background', 'restlycore' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .tp-menu-toggle' => 'background-color: {{VALUE}}',
                            ],
                        ]
                    );
                    
                    $this->add_responsive_control(
                        'mobile_icon_hbg',
                        [
                            'label' => esc_html__( 'Hover background', 'restlycore' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .tp-menu-toggle:hover' => 'background-color: {{VALUE}}',
                            ],
                        ]
                    );

                    $this->add_responsive_control(
                        'mobile_icon_margin',
                        [
                            'label' => esc_html__( 'Margin', 'restlycore' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                            'selectors' => [
                                '{{WRAPPER}} .tp-menu-toggle' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ]
                    );

                    $this->add_responsive_control(
                        'mobile_icon_padding',
                        [
                            'label' => esc_html__( 'Padding', 'restlycore' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                            'selectors' => [
                                '{{WRAPPER}} .tp-menu-toggle' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ]
                    );

                $this->end_controls_tab();
            
                $this->start_controls_tab(
                    'mobile_menu_logo_tab',
                    [
                        'label' => esc_html__( 'Logo', 'restlycore' ),
                    ]
                );
            
                $this->add_responsive_control(
                    'mobile_logo_width',
                    [
                        'label' => esc_html__( 'Width', 'restlycore' ),
                        'type' => \Elementor\Controls_Manager::SLIDER,
                        'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                        'range' => [
                            'px' => [
                                'min' => 0,
                                'max' => 300,
                                'step' => 1,
                            ],
                            '%' => [
                                'min' => 0,
                                'max' => 100,
                            ],
                        ],
                        'selectors' => [
                            '{{WRAPPER}} .tp-menu-wrapper .mobile-logo img' => 'width: {{SIZE}}{{UNIT}};',
                        ],
                    ]
                );

                $this->add_group_control(
                    \Elementor\Group_Control_Background::get_type(),
                    [
                        'name' => 'mobile_logo_bg',
                        'types' => [ 'classic', 'gradient', 'video' ],
                        'selector' => '{{WRAPPER}} .tp-menu-wrapper .mobile-logo',
                    ]
                );

                $this->add_responsive_control(
                    'mobile_menu_align',
                    [
                        'label' => esc_html__( 'Alignment', 'restlycore' ),
                        'type' => \Elementor\Controls_Manager::CHOOSE,
                        'options' => [
                            'left' => [
                                'title' => esc_html__( 'Left', 'restlycore' ),
                                'icon' => 'eicon-text-align-left',
                            ],
                            'center' => [
                                'title' => esc_html__( 'Center', 'restlycore' ),
                                'icon' => 'eicon-text-align-center',
                            ],
                            'right' => [
                                'title' => esc_html__( 'Right', 'restlycore' ),
                                'icon' => 'eicon-text-align-right',
                            ],
                        ],
                        'default' => 'center',
                        'toggle' => true,
                        'selectors' => [
                            '{{WRAPPER}} .tp-menu-wrapper .mobile-logo' => 'text-align: {{VALUE}};',
                        ],
                    ]
                );

                $this->add_responsive_control(
                    'mobile_logo_margin',
                    [
                        'label' => esc_html__( 'Margin', 'restlycore' ),
                        'type' => \Elementor\Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                        'selectors' => [
                            '{{WRAPPER}} .tp-menu-wrapper .mobile-logo' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                    ]
                );

                $this->add_responsive_control(
                    'mobile_logo_padding',
                    [
                        'label' => esc_html__( 'Padding', 'restlycore' ),
                        'type' => \Elementor\Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                        'selectors' => [
                            '{{WRAPPER}} .tp-menu-wrapper .mobile-logo' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                    ]
                );

                $this->end_controls_tab();

                $this->start_controls_tab(
                    'mobile_menu_tab',
                    [
                        'label' => esc_html__( 'menu', 'restlycore' ),
                    ]
                );
            
                $this->add_group_control(
                    \Elementor\Group_Control_Typography::get_type(),
                    [
                        'name' => 'mobile_menu_typo',
                        'selector' => '{{WRAPPER}} .tp-mobile-menu ul li a',
                    ]
                );

                $this->add_responsive_control(
                    'mobile-menu_color',
                    [
                        'label' => esc_html__( 'Color', 'restlycore' ),
                        'type' => \Elementor\Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .tp-mobile-menu ul li a' => 'color: {{VALUE}}',
                        ],
                    ]
                );

                $this->add_responsive_control(
                    'mobile_menu_active',
                    [
                        'label' => esc_html__( 'Active Color', 'restlycore' ),
                        'type' => \Elementor\Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .tp-mobile-menu ul li.tp-active>a' => 'color: {{VALUE}}',
                        ],
                    ]
                );

                $this->add_responsive_control(
                    'border_color',
                    [
                        'label' => esc_html__( 'Border Color', 'restlycore' ),
                        'type' => \Elementor\Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .tp-mobile-menu ul li' => 'border-color: {{VALUE}}',
                        ],
                    ]
                );
                $this->add_responsive_control(
                    'margin',
                    [
                        'label' => esc_html__( 'Margin', 'restlycore' ),
                        'type' => \Elementor\Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                        'selectors' => [
                            '{{WRAPPER}} .tp-mobile-menu ul li a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                    ]
                );

                $this->add_responsive_control(
                    'mobile_menu_padding',
                    [
                        'label' => esc_html__( 'Padding', 'restlycore' ),
                        'type' => \Elementor\Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                        'selectors' => [
                            '{{WRAPPER}} .tp-mobile-menu ul li a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                    ]
                );

                $this->add_control(
                    'mobile_menu_arrow_note',
                    [
                        'label' => esc_html__( 'Arrow Icon Options', 'restlycore' ),
                        'type' => \Elementor\Controls_Manager::HEADING,
                        'separator' => 'before',
                    ]
                );

                $this->add_group_control(
                    \Elementor\Group_Control_Typography::get_type(),
                    [
                        'name' => 'mobile_menu_arrow_typo',
                        'selector' => '{{WRAPPER}} .tp-mobile-menu ul .tp-item-has-children>a .tp-mean-expand',
                    ]
                );

                $this->add_responsive_control(
                    'mobile_arrow_color',
                    [
                        'label' => esc_html__( ' Icon Color', 'restlycore' ),
                        'type' => \Elementor\Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .tp-mobile-menu ul .tp-item-has-children>a .tp-mean-expand' => 'color: {{VALUE}}',
                        ],
                    ]
                );

                $this->add_responsive_control(
                    'mobile_arrow_icon_bg',
                    [
                        'label' => esc_html__( 'Text Color', 'restlycore' ),
                        'type' => \Elementor\Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .tp-mobile-menu ul .tp-item-has-children>a .tp-mean-expand' => 'background-color: {{VALUE}}',
                        ],
                    ]
                );

                $this->end_controls_tab();
            
            $this->end_controls_tabs();

        $this->end_controls_section();

        $this->start_controls_section(
            'button_css_options',
            [
                'label' => esc_html__( 'Button', 'restlycore' ),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'button_typo',
                'selector' => '{{WRAPPER}} .theme-btns',
            ]
        );
            $this->start_controls_tabs(
                'button_tabs'
            );

                $this->start_controls_tab(
                    'button_normar_tab',
                    [
                        'label' => esc_html__( 'Normal', 'restlycore' ),
                    ]
                );

                $this->add_responsive_control(
                    'button_color',
                    [
                        'label'     => esc_html__( ' Color', 'restlycore' ),
                        'type'      => \Elementor\Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .theme-btns' => 'color: {{VALUE}}',
                        ],
                    ]
                );
                $this->add_group_control(
                    \Elementor\Group_Control_Background::get_type(),
                    [
                        'name'     => 'button_bg',
                        'types'    => ['classic', 'gradient'],
                        'selector' => '{{WRAPPER}} .theme-btns',
                    ]
                );
                $this->add_group_control(
                    \Elementor\Group_Control_Border::get_type(),
                    [
                        'name'     => 'button_border',
                        'selector' => '{{WRAPPER}} .theme-btns',
                    ]
                );
                $this->add_responsive_control(
                    'button_radius',
                    [
                        'label'      => esc_html__( 'Border Radius', 'restlycore' ),
                        'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                        'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                        'selectors'  => [
                            '{{WRAPPER}} .header-fourteen-cta-btn .theme-btns' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                    ]
                );
                $this->add_group_control(
                    \Elementor\Group_Control_Box_Shadow::get_type(),
                    [
                        'name'     => 'button_shadow',
                        'selector' => '{{WRAPPER}} .theme-btns',
                    ]
                );
                $this->add_responsive_control(
                    'button_box_margin',
                    [
                        'label'      => esc_html__( 'Margin', 'restlycore' ),
                        'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                        'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                        'selectors'  => [
                            '{{WRAPPER}} .theme-btns' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                    ]
                );
                $this->add_responsive_control(
                    'button_box_padding',
                    [
                        'label'      => esc_html__( 'Padding', 'restlycore' ),
                        'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                        'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                        'selectors'  => [
                            '{{WRAPPER}} .theme-btns' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                    ]
                );
                $this->end_controls_tab();

                $this->start_controls_tab(
                    'button_hover_tab',
                    [
                        'label' => esc_html__( 'Hover', 'restlycore' ),
                    ]
                );
                $this->add_responsive_control(
                    'button_hcolor',
                    [
                        'label'     => esc_html__( ' Color', 'restlycore' ),
                        'type'      => \Elementor\Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .theme-btns:hover' => 'color: {{VALUE}}',
                        ],
                    ]
                );
                $this->add_group_control(
                    \Elementor\Group_Control_Background::get_type(),
                    [
                        'name'     => 'button_hbg',
                        'types'    => ['classic', 'gradient'],
                        'selector' => '{{WRAPPER}} .theme-btns:hover',
                    ]
                );
                $this->add_group_control(
                    \Elementor\Group_Control_Border::get_type(),
                    [
                        'name'     => 'button_hborder',
                        'selector' => '{{WRAPPER}} .theme-btns:hover',
                    ]
                );
                $this->add_responsive_control(
                    'button_hradius',
                    [
                        'label'      => esc_html__( 'Border Radius', 'restlycore' ),
                        'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                        'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                        'selectors'  => [
                            '{{WRAPPER}} .header-fourteen-cta-btn .theme-btns:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                    ]
                );
                $this->add_group_control(
                    \Elementor\Group_Control_Box_Shadow::get_type(),
                    [
                        'name'     => 'button_hshadow',
                        'selector' => '{{WRAPPER}} .theme-btns:hover',
                    ]
                );
                $this->end_controls_tab();

            $this->end_controls_tabs();

        $this->end_controls_section();
       
	
    }
    //Render
    protected function render() {
        $settings = $this->get_settings_for_display();
        ob_start();
        ?>
            <script>
            (function ($) {
                "use strict";
                $.fn.tpmobilemenu = function (options) {
                    var opt = $.extend(
                        {
                            menuToggleBtn: ".tp-menu-toggle",
                            bodyToggleClass: "tp-body-visible",
                            subMenuClass: "tp-submenu",
                            subMenuParent: "tp-item-has-children",
                            subMenuParentToggle: "tp-active",
                            meanExpandClass: "tp-mean-expand",
                            appendElement: '<span class="tp-mean-expand"></span>',
                            subMenuToggleClass: "tp-open",
                            toggleSpeed: 400,
                        },
                        options
                    );

                    return this.each(function () {
                        var menu = $(this); // Select menu

                        // Menu Show & Hide
                        function menuToggle() {
                            menu.toggleClass(opt.bodyToggleClass);

                            // collapse submenu on menu hide or show
                            var subMenu = "." + opt.subMenuClass;
                            $(subMenu).each(function () {
                                if ($(this).hasClass(opt.subMenuToggleClass)) {
                                    $(this).removeClass(opt.subMenuToggleClass);
                                    $(this).css("display", "none");
                                    $(this).parent().removeClass(opt.subMenuParentToggle);
                                }
                            });
                        }

                        // Class Set Up for every submenu
                        menu.find("li").each(function () {
                            var submenu = $(this).find("ul");
                            submenu.addClass(opt.subMenuClass);
                            submenu.css("display", "none");
                            submenu.parent().addClass(opt.subMenuParent);
                            submenu.prev("a").append(opt.appendElement);
                            submenu.next("a").append(opt.appendElement);
                        });

                        // Toggle Submenu
                        function toggleDropDown($element) {
                            if ($($element).next("ul").length > 0) {
                                $($element).parent().toggleClass(opt.subMenuParentToggle);
                                $($element).next("ul").slideToggle(opt.toggleSpeed);
                                $($element).next("ul").toggleClass(opt.subMenuToggleClass);
                            } else if ($($element).prev("ul").length > 0) {
                                $($element).parent().toggleClass(opt.subMenuParentToggle);
                                $($element).prev("ul").slideToggle(opt.toggleSpeed);
                                $($element).prev("ul").toggleClass(opt.subMenuToggleClass);
                            }
                        }

                        // Submenu toggle Button
                        var expandToggler = "." + opt.meanExpandClass;
                        $(expandToggler).each(function () {
                            $(this).on("click", function (e) {
                                e.preventDefault();
                                toggleDropDown($(this).parent());
                            });
                        });

                        // Menu Show & Hide On Toggle Btn click
                        $(opt.menuToggleBtn).each(function () {
                            $(this).on("click", function () {
                                menuToggle();
                            });
                        });

                        // Hide Menu On out side click
                        menu.on("click", function (e) {
                            e.stopPropagation();
                            menuToggle();
                        });

                        // Stop Hide full menu on menu click
                        menu.find("div").on("click", function (e) {
                            e.stopPropagation();
                        });
                    });
                };
            })(jQuery);
        </script>
        <div class="tp-menu-wrapper">
            <div class="tp-menu-area text-center">
                <button class="tp-menu-toggle"><i class="fas fa-times"></i></button>
                <div class="mobile-logo">
                    <?php
                        if ( $settings['mobile_logo_select'] === 'custom' ) {
                            $img_src = $settings['mobile_logo']['url'];
                            $img_alt = get_post_meta( $settings['mobile_logo']['id'], '_wp_attachment_image_alt', true );
                            $img_title = get_the_title( $settings['mobile_logo']['id'] );
                            ?>
                                <img src="<?php echo esc_url( $img_src ); ?>" alt="<?php echo esc_attr( $img_alt ); ?>" title="<?php echo esc_attr( $img_title ); ?>">
                            <?php
                        } elseif ( $settings['select_logo'] === 'custom' ) {
                            $img_src = $settings['logo']['url'];
                            $img_alt = get_post_meta( $settings['logo']['id'], '_wp_attachment_image_alt', true );
                            $img_title = get_the_title( $settings['logo']['id'] );
                                if ( !empty( $settings['logo_link']['url'] ) ) {
                                    $this->add_link_attributes( 'logo_link', $settings['logo_link'] );
                                }
                            ?>
                                <a <?php echo $this->get_render_attribute_string( 'logo_link' ); ?>>
                                    <img src="<?php echo esc_url( $img_src ); ?>" alt="<?php echo esc_attr( $img_alt ); ?>" title="<?php echo esc_attr( $img_title ); ?>">
                                </a>
                            <?php
                        } elseif ( has_custom_logo() ) {
                            the_custom_logo();
                        } else {
                            ?>
                            <h2>
                                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                                    <?php esc_html( bloginfo( 'name' ) );?>
                                </a>
                            </h2>
                            <?php
                        }
                    ?>
                </div>
                <div class="tp-mobile-menu">
                    <?php
                        if ( $settings['menu_select'] ) {
                            $header_menu = $settings['menu_select'];
                        } else {
                            $header_menu = '';
                        }
                        wp_nav_menu(
                            array(
                                'container'      => false,
                                'theme_location' => 'mainmenu',
                                'menu'           => $header_menu,
                                'menu_id'        => 'mainmenu',
                            )
                        );
                    ?>
                </div>
            </div>
        </div>


        <header id="masthead" class="site-header header-fourteen tp-header restly-header-template-fourteen">
            <?php if ( $settings['enable_top_header'] == 'yes' ): ?>
                <div class="header-top">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-4 top-header-left">
                                <?php if ( !empty( $settings['Promotion_text'] ) ): ?>
                                    <div class="promation_text">
                                        <?php if ( !empty( $settings['Promotion_icon']['value'] ) ): ?>
                                            <?php \Elementor\Icons_Manager::render_icon( $settings['Promotion_icon'], [ 'aria-hidden' => 'true' ] ); ?>
                                        <?php endif;?>
                                        <?php echo esc_html( $settings['Promotion_text'] ); ?></div>
                                <?php endif;?>
                            </div>
                            <?php if ( $settings['items'] ) : ?>
                                <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-8  top-header-right">
                                    <ul>
                                        <?php foreach ( $settings['items'] as $item ): ?>
                                        <li>
                                            <span><?php \Elementor\Icons_Manager::render_icon( $item['top_list_icon'], [ 'aria-hidden' => 'true' ] ); ?></span>
                                            <?php if( $item['enable_title_link'] == 'yes' ):
                                                $url      = $item['left_content_link']['url'];
                                                $target   = $item['left_content_link']['is_external'] ? ' target="_blank"' : '';
                                                $nofollow = $item['left_content_link']['nofollow'] ? ' rel="nofollow"' : '';
                                            ?>
                                            <a href="<?php echo esc_url($url); ?>" <?php echo $target . $nofollow;?>>
                                            <?php endif; ?>
                                                <?php echo esc_html( $item['left_content'] ); ?>
                                            <?php if( $item['enable_title_link'] == 'yes' ): ?></a>  <?php endif; ?>
                                        </li>
                                        <?php endforeach;?>
                                    </ul>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            <div class="header-meddile-area">
                <div class="container">
                    <div class="main-header" >
                        <div class="logo-area">
                            <div class="site-branding">
                                <?php
                                    if ( $settings['select_logo'] === 'custom' ) {
                                        $img_src = $settings['logo']['url'];
                                        $img_alt = get_post_meta( $settings['logo']['id'], '_wp_attachment_image_alt', true );
                                        $img_title = get_the_title( $settings['logo']['id'] );

                                        if ( !empty( $settings['logo_link']['url'] ) ) {
                                            $this->add_link_attributes( 'logo_link', $settings['logo_link'] );
                                        }
                                        ?>
                                            <a <?php echo $this->get_render_attribute_string( 'logo_link' ); ?>>
                                                <img src="<?php echo esc_url( $img_src ); ?>" alt="<?php echo esc_attr( $img_alt ); ?>" title="<?php echo esc_attr( $img_title ); ?>">
                                            </a>
                                        <?php
                                    } elseif ( has_custom_logo() ) {
                                        the_custom_logo();
                                    } else {
                                        ?>
                                            <h2 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' );?></a></h2>
                                        <?php
                                    }
                                ?>
                            </div>
                        </div>
                        <div class="header-fourteen-call-us-wrapper">
                        <?php foreach ( $settings['repeter_list'] as $call_item ): ?>
                            <div class="header-fourteen-call-us-area  ">
                                <div class="header-fourteen-call-icon"> 
                                    <?php \Elementor\Icons_Manager::render_icon( $call_item['call_icon'], [ 'aria-hidden' => 'true' ] ); ?>									
                                </div>
                                <div class="header-fourteen-call-text">
                                    <div class="header-fourteen-call-title"> <?php echo esc_html($call_item['call_btn_stitle']); ?></div>
                                    <div class="header-fourteen-call-number">
                                        <?php if( $call_item['enable_call_us_area_link'] == 'yes' ) :
                                            if ( ! empty( $call_item['call_us_area_link']['url'] ) ) {
                                                    $this->add_link_attributes( 'call_us_area_link', $call_item['call_us_area_link'] );
                                                }?>
                                            <a <?php echo $this->get_render_attribute_string( 'call_us_area_link' ); ?>>
                                        <?php endif; ?>
                                            <?php echo esc_html($call_item['call_btn_number']); ?>
                                        <?php if( $call_item['enable_call_us_area_link'] == 'yes' ) : ?>
                                            </a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach;?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-fourteen-navbar-area">
                <div class="container">
                    <nav class="navbar navbar-expand-lg navbar-light main-navigation" id="site-navigation">
                        <div class="navbar-collapse nav-menu main-menu d-none d-lg-inline-block">
                            <?php
                                if ( $settings['menu_select'] ) {
                                    $header_menu = $settings['menu_select'];
                                } else {
                                    $header_menu = '';
                                }
                                wp_nav_menu(
                                    array(
                                        'container'      => false,
                                        'theme_location' => 'mainmenu',
                                        'menu'           => $header_menu,
                                        'menu_id'        => 'mainmenu',
                                        'menu_class'     => 'ms-4',
                                    )
                                );
                            ?>
                        </div>
                        <?php if ( $settings['enable_btn'] == 'yes' ) :
                            if ( !empty( $settings['button_url']['url'] ) ) {
                                $this->add_link_attributes( 'button_url', $settings['button_url'] );
                            } ?>
                            <div class="header-fourteen-cta-btn">
                                <a <?php echo $this->get_render_attribute_string( 'button_url' ); ?> class="theme-btns"><?php echo esc_html( $settings['button_text'] ); ?>
                                <?php \Elementor\Icons_Manager::render_icon( $settings['btn_icon'], ['aria-hidden' => 'true'] );?>
                                </a>
                            </div>
                        <?php endif; ?>
                        <button type="button" class="tp-menu-toggle d-inline-block d-lg-none"><i class="fas fa-bars"></i></button>
                    </nav>
                </div>
            </div>
            
          
        </header>
        <script>
            (function ($) {
                "use strict";
                jQuery(".site").addClass("header-template-fourteen-activate");

                if ($(".restly-canva-open").length) {
        $(".restly-canva-open").on("click", function(e) {
            e.preventDefault();
            $(".canva-restly-wrapper").toggleClass("active");
            $("body").toggleClass("locked");
        });
    }
            })(jQuery);
        </script>
        <?php
echo ob_get_clean();
    }
}
Plugin::instance()->widgets_manager->register( new restly_header_template_fourteen );