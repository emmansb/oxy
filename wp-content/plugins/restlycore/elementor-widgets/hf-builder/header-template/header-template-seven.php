<?php namespace Elementor;

class restly_header_template_seven extends Widget_Base {

    public function get_name() {

        return 'restly_header_template_seven';
    }

    public function get_title() {
        return esc_html__( 'Restly Header Seven', 'restlycore' );
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
            'logo_options',
            [
                'label' => esc_html__( 'Logo Options', 'restlycore' ),
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
            'enable_sticky',
            [
                'label'        => esc_html__( 'Enable Sticky header', 'restlycore' ),
                'type'         => \Elementor\Controls_Manager::SWITCHER,
                'label_on'     => esc_html__( 'Show', 'restlycore' ),
                'label_off'    => esc_html__( 'Hide', 'restlycore' ),
                'return_value' => 'yes',
                'default'      => 'no',
            ]
        );
        $this->add_responsive_control(
            'sticky_bg',
            [
                'label'     => esc_html__( 'Sticky Background', 'restlycore' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sticky-bar' => 'background-color: {{VALUE}}',
                ],
                'condition' => [
                    'enable_sticky' => 'yes',
                ],
            ]
        );
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
            'mobile_menu_options',
            [
                'label' => esc_html__( 'Mobile Logo Options', 'restlycore' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
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
            'button_text',
            [
                'label'       => esc_html__( 'Button Text', 'restlycore' ),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__( 'Start Free Trail', 'restlycore' ),
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
            'contact_number_options',
            [
                'label' => esc_html__( 'Contact Info', 'restlycore' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        
        $this->add_control(
            'enable_contact',
            [
                'label' => esc_html__( 'Enable Contact Info', 'restlycore' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Show', 'restlycore' ),
                'label_off' => esc_html__( 'Hide', 'restlycore' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'contact_label',
            [
                'label' => esc_html__( 'label', 'restlycore' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Tell Us', 'restlycore' ),
                'condition' => [
                    'enable_contact' => 'yes',
                ],
            ]
        );
        
        $this->add_control(
            'contact_number',
            [
                'label' => esc_html__( 'Contact Number', 'restlycore' ),
                'type' => \Elementor\Controls_Manager::WYSIWYG,
                'default' => esc_html__( '+99 123 456 78', 'restlycore' ),
                'condition' => [
                    'enable_contact' => 'yes',
                ],
            ]
        );
        $this->add_control(
            'contact_icon',
            [
                'label' => esc_html__( 'Icon', 'restlycore' ),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-phone-alt',
                    'library' => 'fa-solid',
                ],
                'condition' => [
                    'enable_contact' => 'yes',
                ],
            ]
        );
        $this->end_controls_section();


        $this->start_controls_section(
            'logo_css_section',
            [
                'label' => esc_html__( 'Logo Section', 'restlycore' ),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
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
                    '{{WRAPPER}} .site-branding img' => 'max-width: {{SIZE}}{{UNIT}};',
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
                    '{{WRAPPER}} .site-branding a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .site-branding a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'menu_css_options',
            [
                'label' => esc_html__( ' Menu Style ', 'restlycore' ),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
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

            $this->start_controls_tabs(
                'menu_style_tabs'
            );

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
                    'mobile_menu_bg',
                    [
                        'label' => esc_html__( 'background Color', 'restlycore' ),
                        'type' => \Elementor\Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .tp-menu-wrapper .tp-menu-area' => 'background-color: {{VALUE}}',
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
                'selector' => '{{WRAPPER}} .button .theme-btns',
            ]
        );

        $this->add_responsive_control(
            'button_margin',
            [
                'label'      => esc_html__( 'Margin', 'restlycore' ),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors'  => [
                    '{{WRAPPER}} .button .theme-btns' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'button_padding',
            [
                'label'      => esc_html__( 'Padding', 'restlycore' ),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors'  => [
                    '{{WRAPPER}} .button .theme-btns' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
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
                            '{{WRAPPER}} .button .theme-btns' => 'color: {{VALUE}}',
                        ],
                    ]
                );
                $this->add_group_control(
                    \Elementor\Group_Control_Background::get_type(),
                    [
                        'name'     => 'button_bg',
                        'types'    => ['classic', 'gradient'],
                        'selector' => '{{WRAPPER}} .button .theme-btns',
                    ]
                );
                $this->add_group_control(
                    \Elementor\Group_Control_Border::get_type(),
                    [
                        'name'     => 'button_border',
                        'selector' => '{{WRAPPER}} .button .theme-btns',
                    ]
                );
                $this->add_responsive_control(
                    'button_radius',
                    [
                        'label'      => esc_html__( 'Border Radius', 'restlycore' ),
                        'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                        'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                        'selectors'  => [
                            '{{WRAPPER}} .button .theme-btns' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                    ]
                );
                $this->add_group_control(
                    \Elementor\Group_Control_Box_Shadow::get_type(),
                    [
                        'name'     => 'button_shadow',
                        'selector' => '{{WRAPPER}} .button .theme-btns',
                    ]
                );
                $this->add_responsive_control(
                    'button_box_margin',
                    [
                        'label'      => esc_html__( 'Margin', 'restlycore' ),
                        'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                        'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                        'selectors'  => [
                            '{{WRAPPER}} .button .theme-btns' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                            '{{WRAPPER}} .button .theme-btns' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                            '{{WRAPPER}} .button .theme-btns:hover' => 'color: {{VALUE}}',
                        ],
                    ]
                );
                $this->add_group_control(
                    \Elementor\Group_Control_Background::get_type(),
                    [
                        'name'     => 'button_hbg',
                        'types'    => ['classic', 'gradient'],
                        'selector' => '{{WRAPPER}} .button .theme-btns:hover',
                    ]
                );
                $this->add_group_control(
                    \Elementor\Group_Control_Border::get_type(),
                    [
                        'name'     => 'button_hborder',
                        'selector' => '{{WRAPPER}} .button .theme-btns:hover',
                    ]
                );
                $this->add_responsive_control(
                    'button_hradius',
                    [
                        'label'      => esc_html__( 'Border Radius', 'restlycore' ),
                        'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                        'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                        'selectors'  => [
                            '{{WRAPPER}} .button .theme-btns:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                    ]
                );
                $this->add_group_control(
                    \Elementor\Group_Control_Box_Shadow::get_type(),
                    [
                        'name'     => 'button_hshadow',
                        'selector' => '{{WRAPPER}} .button .theme-btns:hover',
                    ]
                );
                $this->end_controls_tab();

            $this->end_controls_tabs();

        $this->end_controls_section();

        $this->start_controls_section(
            'contact_info_css',
            [
                'label' => esc_html__( 'Contact Info', 'restlycore' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_responsive_control(
            'content_alignmnet',
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
                'toggle' => true,
                'selectors' => [
                    '{{WRAPPER}} .header-seven .header-number' => 'text-align: {{VALUE}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'contact_margin',
            [
                'label' => esc_html__( 'Margin', 'restlycore' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                'selectors' => [
                    '{{WRAPPER}} .header-seven .header-number' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'contact_padding',
            [
                'label' => esc_html__( 'Padding', 'restlycore' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                'selectors' => [
                    '{{WRAPPER}} .header-seven .header-number' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

            $this->start_controls_tabs(
                'contact_tabs'
            );
            
                $this->start_controls_tab(
                    'tab_icons',
                    [
                        'label' => esc_html__( 'Icon', 'restlycore' ),
                    ]
                );
                $this->add_responsive_control(
                    'icon_width',
                    [
                        'label' => esc_html__( 'Width', 'restlycore' ),
                        'type' => \Elementor\Controls_Manager::SLIDER,
                        'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                        'range' => [
                            'px' => [
                                'min' => 0,
                                'max' => 90,
                                'step' => 5,
                            ],
                            '%' => [
                                'min' => 0,
                                'max' => 100,
                            ],
                        ],
                        'selectors' => [
                            '{{WRAPPER}} .header-number>i' => 'width: {{SIZE}}{{UNIT}};',
                        ],
                    ]
                );

                $this->add_responsive_control(
                    'icon_height',
                    [
                        'label' => esc_html__( 'Height', 'restlycore' ),
                        'type' => \Elementor\Controls_Manager::SLIDER,
                        'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                        'range' => [
                            'px' => [
                                'min' => 0,
                                'max' => 90,
                                'step' => 5,
                            ],
                            '%' => [
                                'min' => 0,
                                'max' => 100,
                            ],
                        ],
                        'selectors' => [
                            '{{WRAPPER}} .header-number>i' => 'height: {{SIZE}}{{UNIT}};',
                        ],
                    ]
                );

                $this->add_group_control(
                    \Elementor\Group_Control_Typography::get_type(),
                    [
                        'name' => 'icon_size',
                        'selector' => '{{WRAPPER}} .header-number>i',
                    ]
                );
                $this->add_responsive_control(
                    'icon_color',
                    [
                        'label' => esc_html__( 'Color', 'restlycore' ),
                        'type' => \Elementor\Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .header-number>i' => 'color: {{VALUE}}',
                        ],
                    ]
                );
                $this->add_responsive_control(
                    'icon_bg_color',
                    [
                        'label' => esc_html__( 'Bg Color', 'restlycore' ),
                        'type' => \Elementor\Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .header-number>i' => 'background-color: {{VALUE}}',
                        ],
                    ]
                );

                $this->add_group_control(
                    \Elementor\Group_Control_Border::get_type(),
                    [
                        'name' => 'icon_border',
                        'selector' => '{{WRAPPER}} .header-number>i',
                    ]
                );
                $this->add_responsive_control(
                    'icon_radius',
                    [
                        'label' => esc_html__( 'Border Radius', 'restlycore' ),
                        'type' => \Elementor\Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                        'selectors' => [
                            '{{WRAPPER}} .header-number>i' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                    ]
                );
                $this->add_group_control(
                    \Elementor\Group_Control_Box_Shadow::get_type(),
                    [
                        'name' => 'icon_shadow',
                        'selector' => '{{WRAPPER}} .header-number>i',
                    ]
                );
                $this->add_responsive_control(
                    'icon_margin',
                    [
                        'label' => esc_html__( 'Margin', 'restlycore' ),
                        'type' => \Elementor\Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                        'selectors' => [
                            '{{WRAPPER}} .header-number>i' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                    ]
                );
                $this->add_responsive_control(
                    'icon_padding',
                    [
                        'label' => esc_html__( 'Padding', 'restlycore' ),
                        'type' => \Elementor\Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                        'selectors' => [
                            '{{WRAPPER}} .header-number>i' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                    ]
                );
                $this->end_controls_tab();
            
                $this->start_controls_tab(
                    'tab_label',
                    [
                        'label' => esc_html__( 'Label', 'restlycore' ),
                    ]
                );
                $this->add_responsive_control(
                    'label_color',
                    [
                        'label' => esc_html__( 'Color', 'restlycore' ),
                        'type' => \Elementor\Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .header-number .number-content span' => 'color: {{VALUE}}',
                        ],
                    ]
                );
                
                $this->add_group_control(
                    \Elementor\Group_Control_Typography::get_type(),
                    [
                        'name' => 'label_typography',
                        'selector' => '{{WRAPPER}} .header-number .number-content span',
                    ]
                );
                $this->add_responsive_control(
                    'label_margin',
                    [
                        'label' => esc_html__( 'Margin', 'restlycore' ),
                        'type' => \Elementor\Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                        'selectors' => [
                            '{{WRAPPER}} .header-number .number-content span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                    ]
                );
                $this->add_responsive_control(
                    'label_padding',
                    [
                        'label' => esc_html__( 'Padding', 'restlycore' ),
                        'type' => \Elementor\Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                        'selectors' => [
                            '{{WRAPPER}} .header-number .number-content span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                    ]
                );

                $this->end_controls_tab();

                $this->start_controls_tab(
                    'tab_content',
                    [
                        'label' => esc_html__( 'Content', 'restlycore' ),
                    ]
                );
                $this->add_responsive_control(
                    'dec_color',
                    [
                        'label' => esc_html__( 'Color', 'restlycore' ),
                        'type' => \Elementor\Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .header-number .number-content .content' => 'color: {{VALUE}}',
                            '{{WRAPPER}} .header-number .number-content .content a' => 'color: {{VALUE}}',
                        ],
                    ]
                );
                
                $this->add_group_control(
                    \Elementor\Group_Control_Typography::get_type(),
                    [
                        'name' => 'dec_typography',
                        'selectors' =>[
                            '{{WRAPPER}} .header-number .number-content .content',
                            '{{WRAPPER}} .header-number .number-content .content a',
                        ] 
                    ]
                );
                $this->add_responsive_control(
                    'dec_margin',
                    [
                        'label' => esc_html__( 'Margin', 'restlycore' ),
                        'type' => \Elementor\Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                        'selectors' => [
                            '{{WRAPPER}} .header-number .number-content .content' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                    ]
                );
                $this->add_responsive_control(
                    'dec_padding',
                    [
                        'label' => esc_html__( 'Padding', 'restlycore' ),
                        'type' => \Elementor\Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                        'selectors' => [
                            '{{WRAPPER}} .header-number .number-content .content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                    ]
                );
                $this->end_controls_tab();
            
            $this->end_controls_tabs();

        $this->end_controls_section();
    }
    //Render
    protected function render() {
        $settings = $this->get_settings_for_display();
        $allowed_html = array(
			'span' => array( 'style' => array(), ),
			'strong' => array( 'style' => array(), ),
			'a'  => array(
                'class'  => array(),
                'href'   => array(),
                'rel'    => array(),
                'title'  => array(),
                'target' => array(),
            ),
		);
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

                $(".tp-menu-wrapper").tpmobilemenu();
                if ($(".search-open").length) {
                $(".search-open").on("click", function(e) {
                    e.preventDefault();
                    $(".header-search-popup").toggleClass("active");
                    $("body").toggleClass("locked");
                });
            }
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


        <header id="masthead" class="site-header header-seven tp-header restly-header-template-seven">
            
            <div class="main-header" id="<?php echo esc_attr( $settings['enable_sticky'] == 'yes' ? 'sticky-header' : 'no-sticky' ); ?>">
                <div class="container-fluid custom-container">
                    <nav class="navbar navbar-expand-lg navbar-light main-navigation" id="site-navigation">
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
                            </div><!-- .site-branding -->
                        </div>
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

                        <?php if( $settings['enable_contact'] == 'yes' ) : ?>
                            <div class="header-number">
                                <?php \Elementor\Icons_Manager::render_icon( $settings['contact_icon'], [ 'aria-hidden' => 'true' ] ); ?>
                                <div class="number-content">
                                    <?php if( !empty( $settings['contact_label'] ) ){
                                        echo '<span>'.esc_html( $settings['contact_label'] ).'</span>';
                                    } ?>
                                    <div class="content">
                                        <?php echo wp_kses( $settings['contact_number'], $allowed_html ); ?>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>

                        <?php if ( $settings['enable_btn'] == 'yes' ) :
                            if ( !empty( $settings['button_url']['url'] ) ) {
                                $this->add_link_attributes( 'button_url', $settings['button_url'] );
                            }
                            ?>
                            <div class="button-tral button">
                                <a <?php echo $this->get_render_attribute_string( 'button_url' ); ?> class="theme-btns"><?php echo esc_html( $settings['button_text'] ); ?></a>
                            </div>
                        <?php endif;?>

                        <button type="button" class="tp-menu-toggle d-inline-block d-lg-none"><i class="fas fa-bars"></i></button>

                    </nav>
                </div>
            </div>

        </header><!-- #masthead -->

        <script>
            (function ($) {
                "use strict";
                jQuery(".site").addClass("header-template-seven-activate");
            })(jQuery);
        </script>
        <?php
echo ob_get_clean();
    }
}
Plugin::instance()->widgets_manager->register( new restly_header_template_seven );