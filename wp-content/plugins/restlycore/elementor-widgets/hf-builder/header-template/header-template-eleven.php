<?php namespace Elementor;

class restly_header_template_eleven extends Widget_Base {

    public function get_name() {

        return 'restly_header_template_eleven';
    }

    public function get_title() {
        return esc_html__( 'Restly Header Eleven', 'restlycore' );
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
			'enable_full_width',
			[
				'label' => esc_html__( 'Enable Full Width', 'restlycore' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'restlycore' ),
				'label_off' => esc_html__( 'Hide', 'restlycore' ),
				'return_value' => 'yes',
				'default' => 'yes',
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
                'type'    => \Elementor\Controls_Manager::TEXT,
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
					'value' => 'far fa-envelope',
					'library' => 'fa-solid',
				],
			]
		);
        $repeater->add_control(
            'left_content',
            [
                'label'   => esc_html__( 'Content', 'restlycore' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( '548978478', 'restlycore' ),
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
                        'left_content' => esc_html__( 'restly@mail.com', 'restlycore' ),
                    ],
                    [
                        'left_content' => esc_html__( 'Call Us: 548978478', 'restlycore' ),
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
			'button_icon',
			[
				'label'            => esc_html__( 'Button Icon', 'restlycore' ),
				'type'             => Controls_Manager::ICONS,
				'fa4compatibility' => 'icon',
				'label_block'      => true,
                'condition' => [
                    'enable_btn' => 'yes',
                ],
			]
		);
        $this->add_control(
            'button_text',
            [
                'label'       => esc_html__( 'Button Text', 'restlycore' ),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__( 'Meet With Us', 'restlycore' ),
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
        $this->add_control(
            'icon_notes',
            [
                'label' => esc_html__( 'Call Us Area', 'restlycore' ),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
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
        $this->add_control(
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

		$this->add_control(
			'call_btn_subtitle',
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

		$this->add_control(
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
        $this->add_control(
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
        $this->add_control(
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
        $this->end_controls_section();
        // Canva content list

        $this->start_controls_section(
            'canvacontent',
            [
                'label' => esc_html__( 'Canva Content', 'restlycore' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'enable_canva',
            [
                'label'        => esc_html__( 'Enable Canva', 'restlycore' ),
                'type'         => \Elementor\Controls_Manager::SWITCHER,
                'label_on'     => esc_html__( 'Show', 'restlycore' ),
                'label_off'    => esc_html__( 'Hide', 'restlycore' ),
                'return_value' => 'yes',
                'default'      => 'yes',
            ]
        );
        $this->add_control(
            'canva_title_Text',
            [
                'label' => esc_html__( 'Title', 'restlycore' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'About Us' , 'restlycore' ),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'canva_des',
            [
                'label' => esc_html__( 'Description', 'restlycore' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__( 'The argument in favor of using filler text goes something like this: If you use real content in the Consulting Process, anytime you reach a review' , 'restlycore' ),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'canva_content_list',
            [
                'label' => esc_html__( 'Canva Contact List', 'restlycore' ),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'canva_contact_title',
            [
                'label' => esc_html__( 'Title', 'restlycore' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Contact Info' , 'restlycore' ),
                'label_block' => true,
            ]
        );
        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'contact_list_title',
            [
                'label'       => esc_html__( 'Title', 'restlycore' ),
                'type'        => \Elementor\Controls_Manager::TEXTAREA,
                'default'     => esc_html__( 'State Of Themepul City, BD', 'restlycore' ),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'contact_list_icon',
            [
                'label'   => esc_html__( 'Icon', 'restlycore' ),
                'type'    => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value'   => 'ico ico-map-marker2',
                    'library' => 'fa-solid',
                ],
            ]
        );       
        $this->add_control(
            'restly_contact_list',
            [
                'label'       => esc_html__( 'Repeater List', 'restlycore' ),
                'type'        => \Elementor\Controls_Manager::REPEATER,
                'fields'      => $repeater->get_controls(),
                'default' => [
                    [
                        'contact_list_title' => esc_html__( 'State Of Themepul City, BD', 'restlycore' ),
                    ],
                    [
                        'contact_list_title' => esc_html__( 'info@restly.com', 'restlycore' ),
                    ],
                    [
                        'contact_list_title' => esc_html__( 'Week Days: 09.00 to 18.00 ', 'restlycore' ),
                    ],
                ],
                'title_field' => '{{{ contact_list_title }}}',
            ]
        );
        $this->add_control(
            'canva_social_list',
            [
                'label' => esc_html__( 'Canva Socal List', 'restlycore' ),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $repeater = new \Elementor\Repeater();
        $repeater->add_control(
            'restly_social_icon',
            [
                'label' => esc_html__( 'Icon', 'restlycore' ),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fab fa-facebook-f',
                    'library' => 'solid',
                ],
            ]
        );
        $repeater->add_control(
            'restly_icon_link',
            [
                'label' => __( 'Link', 'restlycore' ),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => __( 'https://your-link.com', 'restlycore' ),
                'show_external' => true,
                'default' => [
                    'url' => '',
                    'is_external' => true,
                    'nofollow' => true,
                ],
            ]
        );
        $this->add_control(
            'restly_icon',
            [
                'label'   => esc_html__( 'Icons List', 'restlycore' ),
                'type'    => \Elementor\Controls_Manager::REPEATER,
                'fields'  => $repeater->get_controls(),
                'default' => [
                    [
                        'restly_social_icon' => 'fab fa-facebook-f',
                    ],
                    [
                        'restly_social_icon' => 'fab fa-twitter',
                    ],
                    [
                        'restly_social_icon' => 'fab fa-linkedin-in',
                    ],
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
                            '{{WRAPPER}} .header-eleven .header-top .top-header-right ul li span' => 'color: {{VALUE}}',
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
                            '{{WRAPPER}} .header-eleven .header-top .top-header-right ul li span' => 'margin-right: {{SIZE}}{{UNIT}};',
                        ],
                    ]
                );
                $this->add_responsive_control(
                    'time_text_color',
                    [
                        'label'     => esc_html__( 'Color', 'restlycore' ),
                        'type'      => \Elementor\Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .header-eleven .header-top .top-header-right ul li' => 'color: {{VALUE}}',
                            '{{WRAPPER}} .header-eleven .header-top .top-header-right ul li a' => 'color: {{VALUE}}',
                        ],
                    ]
                );
                $this->add_responsive_control(
                    'time_icon_color',
                    [
                        'label'     => esc_html__( 'Hover Color', 'restlycore' ),
                        'type'      => \Elementor\Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .header-eleven .header-top .top-header-right ul li a:hover' => 'color: {{VALUE}}',
                        ],
                    ]
                );
                $this->add_group_control(
                    \Elementor\Group_Control_Typography::get_type(),
                    [
                        'name'     => 'time_typography',
                        'selector' => '{{WRAPPER}} .header-eleven .header-top .top-header-right ul li i,{{WRAPPER}} .header-eleven .header-top .top-header-right ul li',
                    ]
                );

                $this->add_responsive_control(
                    'time_margin',
                    [
                        'label'      => esc_html__( 'Margin', 'restlycore' ),
                        'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                        'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                        'selectors'  => [
                            '{{WRAPPER}} .header-eleven .header-top .top-header-right ul li' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
            'logo_css_section',
            [
                'label' => esc_html__( 'Logo Section', 'restlycore' ),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
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
                    '{{WRAPPER}} .logo-area .site-branding img' => 'max-width: {{SIZE}}{{UNIT}};',
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
                'selector' => '{{WRAPPER}} .header-eleven .logo-area .site-branding .site-title a',
            ]
        );
        $this->add_responsive_control(
            'logo_color',
            [
                'label'     => esc_html__( 'Icon Color', 'restlycore' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .header-eleven .logo-area .site-branding .site-title a' => 'color: {{VALUE}}',
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
        $this->end_controls_section();

        $this->start_controls_section(
            'menu_css_options',
            [
                'label' => esc_html__( ' Menu Style ', 'restlycore' ),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
			'style_two',
			[
				'label' => esc_html__( 'Style Two', 'restlycore' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'restlycore' ),
				'label_off' => esc_html__( 'Hide', 'restlycore' ),
				'return_value' => 'yes',
				'default' => 'no',
			]
		);
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'menu_box_bg',
                'label' => esc_html__( 'Background', 'restlycore' ),
                'types' => [ 'classic', 'gradient', 'video' ],
                'selector' => '{{WRAPPER}} .header-eleven .main-header',
                'separator' => 'before',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'menu_box_shadow',
                'label' => esc_html__( 'Box Shadow', 'restlycore' ),
                'selector' => '{{WRAPPER}} .header-eleven .main-header',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'menu_box_border',
                'label' => esc_html__( 'Border', 'restlycore' ),
                'selector' => '{{WRAPPER}} .header-eleven .main-header',
            ]
        );
        $this->add_responsive_control(
            'menu_box_radius',
            [
                'label' => esc_html__( 'Border Radius', 'restlycore' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .header-eleven .main-header' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'menu_box_margin',
            [
                'label' => esc_html__( 'Margin', 'restlycore' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .header-eleven .main-header' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .header-eleven .main-header' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
            $this->start_controls_tabs(
                'menu_style_tabs'
                
            );
                $this->start_controls_tab(
                    'main_menu_tab',
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
                'condition'   => [
                    'enable_btn' => 'yes',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'button_typo',
                'selector' => '{{WRAPPER}} .button .theme-btns',
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
            'call_us_css',
            [
                'label' => esc_html__( 'Call Us Area', 'restlycore' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                'condition'   => [
                    'enable_call_us_area' => 'yes',
                ],
            ]
        );
            $this->start_controls_tabs(
                'call_us_tabs'
            );
            
            $this->start_controls_tab(
                'call_us_icon_tab',
                [
                    'label' => esc_html__( 'Icon', 'restlycore' ),
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'call_us_icon_size',
                    'label' => __( 'Typography', 'restlycore' ),
                    'selector' => '{{WRAPPER}} .header-eleven-call-icon',
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
                        '{{WRAPPER}} .header-eleven-call-icon' => 'width: {{SIZE}}{{UNIT}};',
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
                        '{{WRAPPER}} .header-eleven-call-icon' => 'min-width: {{SIZE}}{{UNIT}};',
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
                        '{{WRAPPER}} .header-eleven-call-icon' => 'height: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );
            $this->add_responsive_control(
                'call_us_icon_color',
                [
                    'label'     => esc_html__( 'Color', 'restlycore' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .header-eleven-call-icon' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Background::get_type(),
                [
                    'name'     => 'call_us_icon_bg',
                    'label'    => esc_html__( 'Background', 'restlycore' ),
                    'types'    => ['classic', 'gradient', 'video'],
                    'selector' => '{{WRAPPER}} .header-eleven-call-icon',
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_box_Shadow::get_type(),
                [
                    'name'     => 'call_us_icon_shadow',
                    'label'    => esc_html__( 'icon Shadow', 'restlycore' ),
                    'selector' => '{{WRAPPER}} .header-eleven-call-icon',
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Border::get_type(),
                [
                    'name'     => 'call_us_icon_border',
                    'label'    => esc_html__( 'Border', 'restlycore' ),
                    'selector' => '{{WRAPPER}} .header-eleven-call-icon',
                ]
            );
            $this->add_responsive_control(
                'call_us_icon_radius',
                [
                    'label'      => esc_html__( 'Border Radius', 'restlycore' ),
                    'type'       => Controls_Manager::DIMENSIONS,
                    'size_units' => ['px', '%', 'em'],
                    'selectors'  => [
                        '{{WRAPPER}} .header-eleven-call-icon' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                        '{{WRAPPER}} .header-eleven-call-icon svg' => 'width: {{SIZE}}{{UNIT}};',
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
                        '{{WRAPPER}} .header-eleven-call-icon svg' => 'width: {{SIZE}}{{UNIT}};',
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
                        '{{WRAPPER}} .header-eleven-call-icon' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                        '{{WRAPPER}} .header-eleven-call-icon' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
            $this->end_controls_tab();
            $this->start_controls_tab(
                'call_us_label_tab',
                [
                    'label' => esc_html__( 'Small Title', 'restlycore' ),
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'call_us_title_typo',
                    'label' => __( 'Typography', 'restlycore' ),
                    'selector' => '{{WRAPPER}} .header-eleven-call-title',
                ]
            );
            $this->add_responsive_control(
                'call_us_title_color',
                [
                    'label'       => esc_html__('Color', 'restlycore'),
                    'type'        => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .header-eleven-call-title' => 'color: {{VALUE}};',
                    ],
                ]
            );
            $this->add_responsive_control(
                'call_us_title_margin',
                [
                    'label'      => esc_html__( 'Margin', 'restlycore' ),
                    'type'       => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors'  => [
                        '{{WRAPPER}} .header-eleven-call-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
            $this->add_responsive_control(
                'call_us_title_padding',
                [
                    'label'      => esc_html__( 'Padding', 'restlycore' ),
                    'type'       => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors'  => [
                        '{{WRAPPER}} .header-eleven-call-title' => 'Padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
            $this->end_controls_tab();
            $this->start_controls_tab(
                'call_us_number_tab',
                [
                    'label' => esc_html__( 'Number', 'restlycore' ),
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'call_us_number_typo',
                    'label' => __( 'Typography', 'restlycore' ),
                    'selector' => '{{WRAPPER}} .header-eleven-call-number',
                ]
            );
    
            $this->add_responsive_control(
                'call_us_number_color',
                [
                    'label'       => esc_html__('Color', 'restlycore'),
                    'type'        => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .header-eleven-call-number' => 'color: {{VALUE}};',
                    ],
                ]
            );
            $this->add_responsive_control(
                'call_us_number_margin',
                [
                    'label'      => esc_html__( 'Margin', 'restlycore' ),
                    'type'       => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors'  => [
                        '{{WRAPPER}} .header-eleven-call-number' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
            $this->add_responsive_control(
                'call_us_number_padding',
                [
                    'label'      => esc_html__( 'Padding', 'restlycore' ),
                    'type'       => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors'  => [
                        '{{WRAPPER}} .header-eleven-call-number' => 'Padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
    
            $this->end_controls_tab();
            
            $this->end_controls_tabs();
        
        $this->end_controls_section();

        
		// ---------- CANVA sTYLE cSS ------

		$this->start_controls_section(
			'canva_area_style',
			[
				'label' => esc_html__( 'Canva Area Style', 'restlycore' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'canva_area_bg',
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .headere-sidebar-textwidget',
			]
		);
        $this->add_responsive_control(
            'canva_area_padding',
            [
                'label'      => esc_html__( 'Padding', 'restlycore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .headere-sidebar-textwidget' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
		$this->start_controls_tabs(
			'close_btn_tabs'
		);
		
		$this->start_controls_tab(
			'canva_open_btn_tab',
			[
				'label' => esc_html__( 'Canva Button', 'restlycore' ),
			]
		);
		$this->add_responsive_control(
			'canva_open_btn_bg',
			[
				'label'       => esc_html__('Background-Color', 'restlycore'),
				'type'        => Controls_Manager::COLOR,
				'selectors'   => [
					'{{WRAPPER}} .button.restly-canva-open' => 'background-color: {{VALUE}};',
				],
			]
		);
		$this->add_responsive_control(
			'canva_open_btn_color',
			[
				'label'       => esc_html__('Color', 'restlycore'),
				'type'        => Controls_Manager::COLOR,
				'selectors'   => [
					'{{WRAPPER}} .button.restly-canva-open' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_responsive_control(
			'canva_open_btn_hover_option',
			[
				'label' => esc_html__( 'Hover Options', 'restlycore' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->add_responsive_control(
			'canva_open_btn_bg_hover',
			[
				'label'       => esc_html__('Background-Color', 'restlycore'),
				'type'        => Controls_Manager::COLOR,
				'selectors'   => [
					'{{WRAPPER}} .button.restly-canva-open:hover' => 'background-color: {{VALUE}};',
				],
			]
		);
		$this->add_responsive_control(
			'canva_open_btn_color_hover',
			[
				'label'       => esc_html__('Hover  Color', 'restlycore'),
				'type'        => Controls_Manager::COLOR,
				'selectors'   => [
					'{{WRAPPER}} .button.restly-canva-open:hover' => 'color: {{VALUE}};',
				],
			]
		);
        $this->add_responsive_control(
            'canva_open_btn_border_radius',
            [
                'label'      => esc_html__( 'Border Radius', 'restlycore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'separator' => 'before',
                'selectors'  => [
                    '{{WRAPPER}} .button.restly-canva-open' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'canva_open_btn_margin',
            [
                'label'      => esc_html__( 'Margin', 'restlycore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .button.restly-canva-open' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
		$this->add_responsive_control(
            'canva_open_btn_padding',
            [
                'label'      => esc_html__( 'Padding', 'restlycore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .button.restly-canva-open' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
		$this->end_controls_tab();
        $this->start_controls_tab(
			'close_btn_tab',
			[
				'label' => esc_html__( 'Close Button', 'restlycore' ),
			]
		);
		$this->add_responsive_control(
			'close_btn_bg',
			[
				'label'       => esc_html__('Background-Color', 'restlycore'),
				'type'        => Controls_Manager::COLOR,
				'selectors'   => [
					'{{WRAPPER}} .restly-canva-open.canva-close' => 'background-color: {{VALUE}};',
				],
			]
		);
		$this->add_responsive_control(
			'close_btn_color',
			[
				'label'       => esc_html__('Color', 'restlycore'),
				'type'        => Controls_Manager::COLOR,
				'selectors'   => [
					'{{WRAPPER}} .restly-canva-open.canva-close' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_responsive_control(
			'close_btn_hover_option',
			[
				'label' => esc_html__( 'Hover Options', 'restlycore' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->add_responsive_control(
			'close_btn_bg_hover',
			[
				'label'       => esc_html__('Background-Color', 'restlycore'),
				'type'        => Controls_Manager::COLOR,
				'selectors'   => [
					'{{WRAPPER}} .restly-canva-open.canva-close:hover' => 'background-color: {{VALUE}};',
				],
			]
		);
		$this->add_responsive_control(
			'close_btn_color_hover',
			[
				'label'       => esc_html__('Hover  Color', 'restlycore'),
				'type'        => Controls_Manager::COLOR,
				'selectors'   => [
					'{{WRAPPER}} .restly-canva-open.canva-close:hover' => 'color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_tab();
		
		$this->end_controls_tabs();
		
		$this->start_controls_tabs(
			'canva_content_tabs'
		);
		
		$this->start_controls_tab(
			'canva_title_tab',
			[
				'label' => esc_html__( 'Title', 'restlycore' ),
			]
		);
		$this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'title_typography',
                'selector' => '{{WRAPPER}} .header-sidebar-title',
            ]
        );
        $this->add_responsive_control(
            'title_color',
            [
                'label'     => esc_html__( 'Color', 'restlycore' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .header-sidebar-title' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'title_margin',
            [
                'label'      => esc_html__( 'Margin', 'restlycore' ),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .header-sidebar-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
		$this->end_controls_tab();
		$this->start_controls_tab(
			'canva_des_tab',
			[
				'label' => esc_html__( 'Description', 'restlycore' ),
			]
		);
		$this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'dec_typography',
                'selector' => '{{WRAPPER}} .header-sidebar-desc',
            ]
        );

        $this->add_responsive_control(
            'dec_color',
            [
                'label'     => esc_html__( 'Title Color', 'restlycore' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .header-sidebar-desc' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'dect_margin',
            [
                'label'      => esc_html__( 'Margin', 'restlycore' ),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .header-sidebar-desc' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
		$this->end_controls_tab();
		$this->end_controls_tabs();

		// ----------------------
        $this->add_control(
            'contact_info_heading',
            [
                'label' => esc_html__( 'Contact Info', 'restlycore' ),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
		$this->start_controls_tabs(
			'contact_list_tabs'
		);
		
		$this->start_controls_tab(
			'contact_title_tab',
			[
				'label' => esc_html__( 'Title', 'restlycore' ),
			]
		);
		$this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'contact_title_typography',
                'selector' => '{{WRAPPER}} .header-sidebar-contact-info-title',
            ]
        );
        $this->add_responsive_control(
            'contact_title_color',
            [
                'label'     => esc_html__( 'Color', 'restlycore' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .header-sidebar-contact-info-title' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'contact_title_margin',
            [
                'label'      => esc_html__( 'Margin', 'restlycore' ),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .header-sidebar-contact-info-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
		$this->end_controls_tab();
		$this->start_controls_tab(
			'contact_list_tab',
			[
				'label' => esc_html__( 'Contact List', 'restlycore' ),
			]
		);
        $this->add_responsive_control(
            'contact_list_icon_gap',
            [
                'label' => esc_html__( 'Gap', 'restlycore' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 500,
                        'step' => 1,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .header-sidebar-contact-info ul li i' => 'margin-right: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'contact_list_icon_style',
            [
                'label' => esc_html__( 'Icon Style', 'restlycore' ),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
		$this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'contact_list_typography',
                'selector' => '{{WRAPPER}} .header-sidebar-contact-info ul li i',
            ]
        );
		$this->add_responsive_control(
            'contact_list_icon_color',
            [
                'label'     => esc_html__( 'Color', 'restlycore' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .header-sidebar-contact-info ul li i' => 'color: {{VALUE}}',
                ],
            ]
        );
		$this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name'     => 'contact_list_icon_bg',
                'label'    => esc_html__( 'Background', 'restlycore' ),
                'types'    => ['classic', 'gradient', 'video'],
                'selector' => '{{WRAPPER}} .header-sidebar-contact-info ul li i',
            ]
        );
        $this->add_control(
			'contact_list_icon_radius',
			[
				'label' => esc_html__( 'Border Radius', 'restlycore' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
                
				'selectors' => [
					'{{WRAPPER}} .header-sidebar-contact-info ul li i' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
        $this->add_responsive_control(
            'contact_list_icon_height',
            [
                'label' => esc_html__( 'Height', 'restlycore' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 500,
                        'step' => 1,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .header-sidebar-contact-info ul li i' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'contact_list_icon_width',
            [
                'label' => esc_html__( 'Width', 'restlycore' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 500,
                        'step' => 1,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .header-sidebar-contact-info ul li i' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
		$this->add_control(
			'contact_list_text_options',
			[
				'label' => esc_html__( 'Text Option', 'restlycore' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'contact_text_typography',
                'selector' => '{{WRAPPER}} .header-sidebar-contact-info ul li',
            ]
        );
		$this->add_responsive_control(
            'contact_list_text_color',
            [
                'label'     => esc_html__( 'Color', 'restlycore' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .header-sidebar-contact-info ul li' => 'color: {{VALUE}}',
                ],
            ]
        );
		$this->add_responsive_control(
            'contact_list_title_margin',
            [
                'label'      => esc_html__( 'Margin', 'restlycore' ),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .header-sidebar-contact-info ul li' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
		$this->end_controls_tab();
		$this->end_controls_tabs();
        $this->add_control(
            'canva_social_notes',
            [
                'label' => esc_html__( 'Social Icon Style', 'restlycore' ),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

		$this->start_controls_tabs(
			'social_icon_tabs'
		);
		
		$this->start_controls_tab(
			'social_icon_tab',
			[
				'label' => esc_html__( 'Social Icon', 'restlycore' ),
			]
		);
		$this->add_responsive_control(
            'canva_social_icon_color',
            [
                'label' => esc_html__( 'Color', 'restlycore' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .header-sidebar-social-icon ul li a' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'canva_social_icon_colorbg',
            [
                'label' => esc_html__( 'Background Color', 'restlycore' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .header-sidebar-social-icon ul li a' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'canva_social_icon_width',
            [
                'label' => esc_html__( 'Width', 'restlycore' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px' ],
                'range' => [
                    'px' => [
                        'min' => 20,
                        'max' => 100,
                        'step' => 1,
                    ]
                ],
                'selectors' => [
                    '{{WRAPPER}} .header-sidebar-social-icon ul li a' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'canva_social_icon_height',
            [
                'label' => esc_html__( 'Height', 'restlycore' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px' ],
                'range' => [
                    'px' => [
                        'min' => 20,
                        'max' => 100,
                        'step' => 1,
                    ]
                ],
                'selectors' => [
                    '{{WRAPPER}} .header-sidebar-social-icon ul li a' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'canva_social_icon_border',
                'label' => esc_html__( 'Border', 'restlycore' ),
                'selector' => '{{WRAPPER}} .header-sidebar-social-icon ul li a',
            ]
        );
        $this->add_responsive_control(
            'canva_social_icon_radius',
            [
                'label' => esc_html__( 'Radius', 'restlycore' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .header-sidebar-social-icon ul li a' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'canva_social_icon_shadow',
                'label' => esc_html__( 'Box Shadow', 'restlycore' ),
                'selector' => '{{WRAPPER}} .header-sidebar-social-icon ul li a',
            ]
        );
        $this->add_responsive_control(
            'canva_social_icon_margin',
            [
                'label' => esc_html__( 'Margin', 'restlycore' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .header-sidebar-social-icon ul li a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'canva_social_icon_padding',
            [
                'label' => esc_html__( 'Padding', 'restlycore' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .header-sidebar-social-icon ul li a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();

        $this->start_controls_tab(
            'canva_social_icon_tabs_hover',
            [
                'label' => __( 'Icon Hover', 'restlycore' ),
            ]
        );
        $this->add_responsive_control(
            'canva_social_icon_hcolor',
            [
                'label' => esc_html__( 'Color', 'restlycore' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .header-sidebar-social-icon ul li a:hover' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'canva_social_icon_hcolorbg',
            [
                'label' => esc_html__( 'Background Color', 'restlycore' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .header-sidebar-social-icon ul li a:hover' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'canva_social_icon_hborder',
                'label' => esc_html__( 'Border', 'restlycore' ),
                'selector' => '{{WRAPPER}} .header-sidebar-social-icon ul li a:hover',
            ]
        );
        $this->add_responsive_control(
            'canva_social_icon_hradius',
            [
                'label' => esc_html__( 'Radius', 'restlycore' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'unit' => '%',
                    'size' => 50,
                ],
                'selectors' => [
                    '{{WRAPPER}} .header-sidebar-social-icon ul li a:hover' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'canva_social_icon_hshadow',
                'label' => esc_html__( 'Box Shadow', 'restlycore' ),
                'selector' => '{{WRAPPER}} .header-sidebar-social-icon ul li a:hover',
            ]
        );
        $this->end_controls_tab();
		
		$this->end_controls_tabs();
		$this->end_controls_section();
    }
    //Render
    protected function render() {
        $settings = $this->get_settings_for_display();
        if( $settings['enable_full_width'] == 'yes' ){
            $full_width = 'container-1700';
        }else{
            $full_width = '';
        }
        if( $settings['style_two'] == 'yes' ){
            $two = 'h-two';
        }else{
            $two = '';
        }
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


        <header id="masthead" class="site-header header-four header-eleven tp-header restly-header-template-eleven <?php echo esc_attr($two)?>">
            <?php if ( $settings['enable_top_header'] == 'yes' ): ?>
                <div class="container <?php echo esc_attr($full_width)?>">
                    <div class="header-top">
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
            <div class="main-header" id="<?php echo esc_attr( $settings['enable_sticky'] == 'yes' ? 'sticky-header' : 'no-sticky' ); ?>">
                <div class="container <?php echo esc_attr($full_width)?>">
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

                        <?php if( $settings['enable_call_us_area'] == 'yes' ) : ?>
                            <div class="header-eleven-call-us-area  ">
                                <div class="header-eleven-call-icon"> 
                                    <?php \Elementor\Icons_Manager::render_icon( $settings['call_icon'], [ 'aria-hidden' => 'true' ] ); ?>									
                                </div>
                                <div class="header-eleven-call-text">
                                    <div class="header-eleven-call-title"> <?php echo esc_html($settings['call_btn_subtitle']); ?></div>
                                    <div class="header-eleven-call-number">
                                        <?php if( $settings['enable_call_us_area_link'] == 'yes' ) :
                                            if ( ! empty( $settings['call_us_area_link']['url'] ) ) {
                                                    $this->add_link_attributes( 'call_us_area_link', $settings['call_us_area_link'] );
                                                }?>
                                            <a <?php echo $this->get_render_attribute_string( 'call_us_area_link' ); ?>>
                                        <?php endif; ?>
                                            <?php echo esc_html($settings['call_btn_number']); ?>
                                        <?php if( $settings['enable_call_us_area_link'] == 'yes' ) : ?>
                                            </a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>

                        <?php if ( $settings['enable_btn'] == 'yes' ) :
                            if ( !empty( $settings['button_url']['url'] ) ) {
                                $this->add_link_attributes( 'button_url', $settings['button_url'] );
                            } ?>
                            
                            <div class="button header-cta-button d-none d-xl-inline-block">
                                <a <?php echo $this->get_render_attribute_string( 'button_url' ); ?> class="theme-btns">
                                    <?php echo esc_html( $settings['button_text'] ); ?>
                                    <?php if ( !empty( $settings['button_icon']['value'] ) ): ?>
                                        <?php \Elementor\Icons_Manager::render_icon( $settings['button_icon'], [ 'aria-hidden' => 'true' ] ); ?>
                                    <?php endif;?>
                                </a>
                            </div>
                        <?php endif;?>
                        <?php  if ( $settings['enable_canva'] == 'yes' ) :?>
                        <div class="button restly-canva-open d-none d-xl-flex"> <i class="fas fa-bars"></i> </div>
                        <?php endif?>
                        <button type="button" class="tp-menu-toggle d-inline-block d-lg-none"><i class="fas fa-bars"></i></button>
                    </nav>
                </div>
            </div>
        </header><!-- #masthead -->
        <!--	Headding sidebar Area Design -->

		<div class="canva-restly-wrapper">
			<div class="headere-sidebar-textwidget restly-canva-content">
				<div class="header-sidebar-info-contents">
					<div class="header-sidebar-toggle" id="closeButton"> 
						<div class="button restly-canva-open canva-close"> X </div> 
					</div>
					<div class="header-sidebar-logo">
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
					<div class="header-sidebar-content-inner">
						<h4 class="header-sidebar-title"> <?php echo esc_html( $settings['canva_title_Text'] ); ?> </h4>
						<div class="header-sidebar-desc"> <?php echo esc_html( $settings['canva_des'] ); ?></div> 
						<div class="header-sidebar-contact-info">
						<h4 class="header-sidebar-contact-info-title"> <?php echo esc_html( $settings['canva_contact_title'] ); ?> </h4>
							<ul>
							<?php foreach($settings['restly_contact_list'] as $contact_list): ?>
									<li>  <?php \Elementor\Icons_Manager::render_icon( $contact_list['contact_list_icon'], ['aria-hidden' => 'true'] );?>
									<?php echo esc_html( $contact_list ['contact_list_title'] ); ?>  </li>
								<?php endforeach?>
							</ul>
						</div>
						<!-- Social Box -->
						<div class="header-sidebar-social-icon">
							<ul>
								<?php foreach($settings['restly_icon'] as $social): 
									$burl      = $social['restly_icon_link']['url'];
									$btarget   = $social['restly_icon_link']['is_external'] ? ' target="_blank"' : '';
									$bnofollow = $social['restly_icon_link']['nofollow'] ? ' rel="nofollow"' : '';	
									?>
									<li>
										<a class="facebook social-icon" href="<?php echo esc_url($burl); ?>" >
											<?php \Elementor\Icons_Manager::render_icon( $social['restly_social_icon'], ['aria-hidden' => 'true'] );?>
										</a>
									</li>
								<?php endforeach?>
							</ul>
						</div>
					</div>
				</div>
			</div>
			    <div class="overlay-canva restly-canva-open"></div>
		</div>
        <script>
            (function ($) {
                "use strict";
                jQuery(".site").addClass("header-template-eleven-activate");

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
Plugin::instance()->widgets_manager->register( new restly_header_template_eleven );