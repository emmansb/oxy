<?php namespace Elementor;

class restly_pricing_v6_Widget extends Widget_Base {

    public function get_name() {

        return 'restly_pricing_v6';
    }

    public function get_title() {
        return esc_html__( 'Restly Pricing v6', 'restlycore' );
    }

    public function get_icon() {

        return 'eicon-price-table';
    }

    public function get_categories() {
        return ['restly'];
    }

    protected function register_controls() {

        //Content tab start
        $this->start_controls_section(
            'restly_pricing_v3_options',
            [
                'label' => esc_html__( 'Header', 'restlycore' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );
        $repeater = new \Elementor\Repeater();
        $repeater->add_control(
            'title',
            [
                'label' => esc_html__( 'Title', 'restlycore' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Basic', 'restlycore' ),
            ]
        );
        $repeater->add_control(
            'title_tag',
            [
                'label' => esc_html__( 'Title HTML Tag', 'restlycore' ),
                'description' => esc_html__( 'Add HTML Tag For Title', 'restlycore' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'h4',
                'options' => [
                    'h1'  => esc_html__( 'H1', 'restlycore' ),
                    'h2'  => esc_html__( 'H2', 'restlycore' ),
                    'h3'  => esc_html__( 'H3', 'restlycore' ),
                    'h4'  => esc_html__( 'H4', 'restlycore' ),
                    'h5'  => esc_html__( 'H5', 'restlycore' ),
                    'h6'  => esc_html__( 'H6', 'restlycore' ),
                    'p'  => esc_html__( 'P', 'restlycore' ),
                    'span'  => esc_html__( 'span', 'restlycore' ),
                    'div'  => esc_html__( 'Div', 'restlycore' ),
                ],
            ]
        );
        $repeater->add_control(
            'small_title',
            [
                'label' => esc_html__( 'Sub Title', 'restlycore' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Enjoy Basic ammunites', 'restlycore' ),
            ]
        );
        $repeater->add_control(
            'amount',
            [
                'label' => esc_html__( 'Amount', 'restlycore' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( '$15', 'restlycore' ),
            ]
        );
        $repeater->add_control(
            'icon',
            [
                'label'   => __( 'Icon', 'restlycore' ),
                'type'    => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value'   => 'fas fa-star',
                    'library' => 'solid',
                ],
            ]
        );
		$repeater->add_control(
			'feature_item', [
				'label' => esc_html__( 'Feature Item List', 'restlycore' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'default' => __( '<ul>
                    <li>Sync up to 2 devices</li>
                    <li>Find note fast with search</li>
                    <li>and tags</li>
                    <li>Clip web pages</li>
                    <li>25MB maximum note</li>
                    <li>60MB monthly upload limit</li>
                </ul>', 'restlycore' ),
				'label_block' => true,
			]
		);
        $repeater->add_control(
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
        $repeater->add_control(
            'btn_text',
            [
                'label'   => esc_html__( 'Button Text', 'restlycore' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Read More', 'restlycore' ),
                'dynamic' => [
                    'active' => true,
                ],
                'condition'     => [
                    'enable_btn' => 'yes',
                ],
            ]
        );
        $repeater->add_control(
            'link',
            [
                'label'         => __( 'Link', 'restlycore' ),
                'type'          => \Elementor\Controls_Manager::URL,
                'placeholder'   => __( 'htecos://your-link.com', 'restlycore' ),
                'show_external' => true,
                'default'       => [
                    'url'         => '',
                    'is_external' => true,
                    'nofollow'    => true,
                ],
                'dynamic'       => [
                    'active' => true,
                ],
            ]
        );
		$this->add_control(
			'pricing_lists',
			[
				'label' => esc_html__( 'Content List', 'restlycore' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'title' => esc_html__( 'Basic Plan', 'restlycore' ),
						'icon' => 'bi bi-check2',
					],
                    [
						'title' => esc_html__( 'Standard Plan', 'restlycore' ),
						'icon' => 'bi bi-check2',
					],
                    [
						'title' => esc_html__( 'Premium Plan', 'restlycore' ),
						'icon' => 'bi bi-check2',
					],
                   
				],
				'title_field' => '{{{ feature_item }}}',
			]
		);
        $this->add_control(
            'more_options',
            [
                'label'     => __( 'Service Column Settings', 'restlycore' ),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
                
            ]
        );
        $this->add_control(
            'desktop_col',
            [
                'label'     => __( 'Columns On Desktop', 'restlycore' ),
                'type'      => Controls_Manager::SELECT,
                'default'   => 'col-xl-4',
                'options'   => [
                    'col-xl-12' => __( '1 Column', 'restlycore' ),
                    'col-xl-6'  => __( '2 Column', 'restlycore' ),
                    'col-xl-4'  => __( '3 Column', 'restlycore' ),
                    'col-xl-3'  => __( '4 Column', 'restlycore' ),
                    'col-xl-2'  => __( '6 Column', 'restlycore' ),
                ],
            
            ]
        );

        $this->add_control(
            'laptop_col',
            [
                'label'     => __( 'Columns for Laptop', 'restlycore' ),
                'type'      => Controls_Manager::SELECT,
                'default'   => 'col-lg-4',
                'options'   => [
                    'col-lg-12' => __( '1 Column', 'restlycore' ),
                    'col-lg-6'  => __( '2 Column', 'restlycore' ),
                    'col-lg-4'  => __( '3 Column', 'restlycore' ),
                    'col-lg-3'  => __( '4 Column', 'restlycore' ),
                    'col-lg-2'  => __( '6 Column', 'restlycore' ),
                ],
                
            ]
        );

        $this->add_control(
            'tab_col',
            [
                'label'     => __( 'Columns On Tablet', 'restlycore' ),
                'type'      => Controls_Manager::SELECT,
                'default'   => 'col-md-6',
                'options'   => [
                    'col-md-12' => __( '1 Column', 'restlycore' ),
                    'col-md-6'  => __( '2 Column', 'restlycore' ),
                    'col-md-4'  => __( '3 Column', 'restlycore' ),
                    'col-md-3'  => __( '4 Column', 'restlycore' ),
                    'col-md-2'  => __( '6 Column', 'restlycore' ),
                ],
                
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'restly_pricing_v3_CSS_box_options',
            [
                'label' => esc_html__( ' Box', 'restlycore' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_responsive_control(
            'box_content-align',
            [
                'label' => __( 'Alignment', 'restlycore' ),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => __( 'Left', 'restlycore' ),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => __( 'Center', 'restlycore' ),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'right' => [
                        'title' => __( 'Right', 'restlycore' ),
                        'icon' => 'eicon-text-align-right',
                    ],
                ],
                'default' => 'left',
                'toggle' => true,
                'selectors' => [
                    '{{WRAPPER}} .restly-pricing-v6-item' => 'text-align: {{VALUE}}',
                ],
            ]
        );
        $this->start_controls_tabs(
            'box-section_tabs'
        );
        $this->start_controls_tab(
            'box_normal_tab',
            [
                'label' => esc_html__( 'Normal', 'restlycore' ),
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'restly_pricing_v3_CSS_box_bg',
                'label' => esc_html__( 'Background', 'restlycore' ),
                'types' => [ 'classic', 'gradient', 'video' ],
                'selector' => '{{WRAPPER}} .restly-pricing-v6-item',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'restly_pricing_v3_CSS_box_shadow',
                'label' => esc_html__( 'Box Shadow', 'restlycore' ),
                'selector' => '{{WRAPPER}} .restly-pricing-v6-item',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'restly_pricing_v3_CSS_box_border',
                'label' => esc_html__( 'Border', 'restlycore' ),
                'selector' => '{{WRAPPER}} .restly-pricing-v6-item',
            ]
        );
        $this->add_responsive_control(
            'box_border_radius',
            [
                'label' => esc_html__( 'Border Radius', 'restlycore' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .restly-pricing-v6-item' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'restly_pricing_v3_CSS_box_margin',
            [
                'label' => esc_html__( 'Margin', 'restlycore' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .restly-pricing-v6-item' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'restly_pricing_v3_CSS_box_padding',
            [
                'label' => esc_html__( 'Padding', 'restlycore' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .restly-pricing-v6-item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        
        $this->end_controls_tab();
        $this->start_controls_tab(
            'box_hover_tab',
            [
                'label' => esc_html__( 'Hover', 'restlycore' ),
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'box_background_hover',
                'label' => esc_html__( 'Background', 'restlycore' ),
                'types' => [ 'classic', 'gradient', 'video' ],
                'selector' => '{{WRAPPER}} .restly-pricing-v6-item:hover',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'box_border_shadow',
                'label' => esc_html__( 'Box Shadow', 'restlycore' ),
                'selector' => '{{WRAPPER}} .restly-pricing-v6-item:hover',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'box_border_hover',
                'label' => esc_html__( 'Border', 'restlycore' ),
                'selector' => '{{WRAPPER}} .restly-pricing-v6-item:hover',
            ]
        );
        $this->add_responsive_control(
            'box_border_radius_hover',
            [
                'label' => esc_html__( 'Border Radius', 'restlycore' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .restly-pricing-v6-item:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();

        $this->start_controls_section(
            'restly_pricing_v3_CSS_header_options',
            [
                'label' => esc_html__( 'Content', 'restlycore' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
      
            $this->start_controls_tabs(
                'restly_pricing_v3_header_tabs'
            );
                $this->start_controls_tab(
                    'restly_pricing_v3_header_tabs_title',
                    [
                        'label' => __( 'Title', 'restlycore' ),
                    ]
                );
                $this->add_group_control(
                    \Elementor\Group_Control_Typography::get_type(),
                    [
                        'name' => 'restly_pv3_h_title_typo',
                        'label' => esc_html__( 'Typography', 'restlycore' ),
                        'selector' => '{{WRAPPER}} .pricing-v6-title',
                    ]
                );
                $this->add_responsive_control(
                    'restly_pv3_h_title_color',
                    [
                        'label' => esc_html__( 'Color', 'restlycore' ),
                        'type' => \Elementor\Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .pricing-v6-title' => 'color: {{VALUE}}',
                        ],
                    ]
                );
                $this->add_responsive_control(
                    'restly_pv3_h_title_hover_color',
                    [
                        'label' => esc_html__( 'Hover Color', 'restlycore' ),
                        'type' => \Elementor\Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .restly-pricing-v6-item:hover .pricing-v6-title' => 'color: {{VALUE}}',
                        ],
                    ]
                );
                $this->add_responsive_control(
                    'restly_pv3_h_title_margin',
                    [
                        'label' => esc_html__( 'Margin', 'restlycore' ),
                        'type' => Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em' ],
                        'selectors' => [
                            '{{WRAPPER}} .pricing-v6-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                    ]
                );
                $this->add_responsive_control(
                    'restly_pv3_h_title_padding',
                    [
                        'label' => esc_html__( 'Padding', 'restlycore' ),
                        'type' => Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em' ],
                        'selectors' => [
                            '{{WRAPPER}} .pricing-v6-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                    ]
                );
                $this->end_controls_tab();
                
                $this->start_controls_tab(
                    'restly_pricing_v3_header_tabs_stitle',
                    [
                        'label' => __( 'Sub Title', 'restlycore' ),
                    ]
                );
                $this->add_group_control(
                    \Elementor\Group_Control_Typography::get_type(),
                    [
                        'name' => 'restly_pv3_h_stitle_typo',
                        'label' => esc_html__( 'Typography', 'restlycore' ),
                        'selector' => '{{WRAPPER}} .pricing-v6-stitle',
                    ]
                );
                $this->add_responsive_control(
                    'restly_pv3_h_stitle_color',
                    [
                        'label' => esc_html__( 'Color', 'restlycore' ),
                        'type' => \Elementor\Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .pricing-v6-stitle' => 'color: {{VALUE}}',
                        ],
                    ]
                );
                $this->add_responsive_control(
                    'restly_pv3_h_stitle_color_hover',
                    [
                        'label' => esc_html__( 'Hover Color', 'restlycore' ),
                        'type' => \Elementor\Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .restly-pricing-v6-item:hover .pricing-v6-stitle' => 'color: {{VALUE}}',
                        ],
                    ]
                );
                $this->add_responsive_control(
                    'restly_pv3_h_stitle_margin',
                    [
                        'label' => esc_html__( 'Margin', 'restlycore' ),
                        'type' => Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em' ],
                        'selectors' => [
                            '{{WRAPPER}} .pricing-v6-stitle' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                    ]
                );
                $this->add_responsive_control(
                    'restly_pv3_h_stitle_padding',
                    [
                        'label' => esc_html__( 'Padding', 'restlycore' ),
                        'type' => Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em' ],
                        'selectors' => [
                            '{{WRAPPER}} .pricing-v6-stitle' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                    ]
                );
                $this->end_controls_tab();
                $this->start_controls_tab(
                    'restly_pricing_v3_header_tabs_price',
                    [
                        'label' => __( 'Price', 'restlycore' ),
                    ]
                );
                $this->add_group_control(
                    \Elementor\Group_Control_Typography::get_type(),
                    [
                        'name' => 'restly_pv3_h_price_typo',
                        'label' => esc_html__( 'Typography', 'restlycore' ),
                        'selector' => '{{WRAPPER}} .pricing-v6-price',
                    ]
                );
                $this->add_responsive_control(
                    'restly_pv3_h_price_color',
                    [
                        'label' => esc_html__( 'Color', 'restlycore' ),
                        'type' => \Elementor\Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .pricing-v6-price' => 'color: {{VALUE}}',
                        ],
                    ]
                );
                $this->add_responsive_control(
                    'restly_pv3_h_price_color_hover',
                    [
                        'label' => esc_html__( 'Hover Color', 'restlycore' ),
                        'type' => \Elementor\Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .restly-pricing-v6-item:hover .pricing-v6-price' => 'color: {{VALUE}}',
                        ],
                    ]
                );
                $this->add_responsive_control(
                    'restly_pv3_h_price_margin',
                    [
                        'label' => esc_html__( 'Margin', 'restlycore' ),
                        'type' => Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em' ],
                        'selectors' => [
                            '{{WRAPPER}} .pricing-v6-price' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                    ]
                );
                $this->add_responsive_control(
                    'restly_pv3_h_price_padding',
                    [
                        'label' => esc_html__( 'Padding', 'restlycore' ),
                        'type' => Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em' ],
                        'selectors' => [
                            '{{WRAPPER}} .pricing-v6-price' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                    ]
                );
                $this->end_controls_tab();
            $this->end_controls_tabs();
        $this->end_controls_section();
        $this->start_controls_section(
            'restly_pricing_v3_CSS_dec_options',
            [
                'label' => esc_html__( 'List CSS', 'restlycore' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_responsive_control(
            'icon_gap',
            [
                'label' => esc_html__( 'Icon Gap', 'restlycore'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px','%' ],
                'range' => [
                    'px' => [
                        'min' => 20,
                        'max' => 200,
                        'step' => 1,
                    ]
                ],
                'selectors' => [
                    '{{WRAPPER}} .pricing-v6-featur-item ul li' => 'margin-left: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'restly_pv3_dec_typo',
                'label' => esc_html__( 'Typography', 'restlycore' ),
                'selector' => '{{WRAPPER}} .pricing-v6-featur-item ul li',
            ]
        );
        $this->add_responsive_control(
            'restly_pv3_dec_c',
            [
                'label' => esc_html__( 'Color', 'restlycore' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pricing-v6-featur-item ul li' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .pricing-v6-featur-item ul li i' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'restly_pv3_dec_margin',
            [
                'label' => esc_html__( 'Margin', 'restlycore' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .pricing-v6-featur-item ul li' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'restly_pv3_dec_padding',
            [
                'label' => esc_html__( 'Padding', 'restlycore' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .pricing-v6-featur-item ul li' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
       
        $this->end_controls_section();
        $this->start_controls_section(
            'restly_price_v3_btn_css_options',
            [
                'label' => esc_html__( 'Button CSS', 'restlycore' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'restly_price_v3_btn_css_margin',
            [
                'label' => esc_html__( 'Margin', 'restlycore' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .pricing-v6-button .theme-btns' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'restly_price_v3_btn_css_padding',
            [
                'label' => esc_html__( 'Padding', 'restlycore' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .pricing-v6-button .theme-btns' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->start_controls_tabs(
            'restly_price_v3_btn_css_tabs'
        );
        $this->start_controls_tab(
            'restly_price_v3_btn_css_tabs_normal',
            [
                'label' => __( 'Normal', 'restlycore' ),
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'restly_price_v3_btn_css_typos',
                'label' => esc_html__( 'Typography', 'restlycore' ),
                'selector' => '{{WRAPPER}} .pricing-v6-button .theme-btns',
            ]
        );
        $this->add_responsive_control(
            'restly_price_v3_btn_css_ncolor',
            [
                'label' => esc_html__( 'Color', 'restlycore' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pricing-v6-button .theme-btns' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'restly_price_v3_btn_css_nbg',
            [
                'label' => esc_html__( 'Background Color', 'restlycore' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pricing-v6-button .theme-btns' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'restly_price_v3_btn_css_nborder',
                'label' => esc_html__( 'Border', 'restlycore' ),
                'selector' => '{{WRAPPER}} .pricing-v6-button .theme-btns',
            ]
        );
        $this->add_responsive_control(
            'restly_price_v3_btn_css_nradisu',
            [
                'label' => esc_html__( 'Border Radius', 'restlycore' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 1,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .pricing-v6-button .theme-btns' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'restly_price_v3_btn_css_nshadow',
                'label' => esc_html__( 'Shadow', 'restlycore' ),
                'selector' => '{{WRAPPER}} .pricing-v6-button .theme-btns',
            ]
        );
        $this->end_controls_tab();
        
        $this->start_controls_tab(
            'restly_price_v3_btn_css_tabs_hover',
            [
                'label' => __( 'Hover', 'restlycore' ),
            ]
        );
        $this->add_responsive_control(
            'restly_price_v3_btn_css_hcolor',
            [
                'label' => esc_html__( 'Color', 'restlycore' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .restly-pricing-v6-item:hover .pricing-v6-button .theme-btns' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'restly_price_v3_btn_css_hbg',
            [
                'label' => esc_html__( 'Background Color', 'restlycore' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .restly-pricing-v6-item:hover .pricing-v6-button .theme-btns' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'restly_price_v3_btn_css_hborder',
                'label' => esc_html__( 'Border', 'restlycore' ),
                'selector' => '{{WRAPPER}} .restly-pricing-v6-item:hover .pricing-v6-button .theme-btns',
            ]
        );
        $this->add_responsive_control(
            'restly_price_v3_btn_css_hradisu',
            [
                'label' => esc_html__( 'Border Radius', 'restlycore' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 5,
                ],
                'selectors' => [
                    '{{WRAPPER}} .restly-pricing-v6-item:hover .pricing-v6-button .theme-btns' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'restly_price_v3_btn_css_hshadow',
                'label' => esc_html__( 'Shadow', 'restlycore' ),
                'selector' => '{{WRAPPER}} .restly-pricing-v6-item:hover .pricing-v6-button .theme-btns',
            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();
    }
    //Render
    protected function render() {
        $settings = $this->get_settings_for_display();
        $column = $settings['desktop_col'] . ' ' . $settings['laptop_col'] . ' ' . $settings['tab_col'];
        ob_start();
        ?>
        <div class="restly-pricing-v6-wrapper">
            <div class="row">
                <?php foreach ( $settings['pricing_lists'] as $item ): ?>
                    <div class="<?php echo esc_attr( $column ); ?>">
                        <div class="restly-pricing-v6-item">
                            <<?php echo esc_html($item['title_tag']); ?> class="pricing-v6-title">
                                <?php echo esc_html($item['title']); ?>
                            </<?php echo esc_html($item['title_tag']); ?>>
                            <div class="pricing-v6-stitle"><?php echo esc_html($item['small_title']); ?></div>
                            <div class="pricing-v6-price"><?php echo esc_html($item['amount']); ?></div>
                            <div class="pricing-v6-featur-item"> 
                                <?php echo wp_kses_post($item['feature_item']); ?>
                            </div>
                            <div class="pricing-v6-button">
                                <?php
                                    $url      = $item['link']['url'];
                                    $target   = $item['link']['is_external'] ? ' target="_blank"' : '';
                                    $nofollow = $item['link']['nofollow'] ? ' rel="nofollow"' : '';
                                    ?> 
                                <a href="<?php echo esc_url($url); ?>" class="theme-btns">
                                <?php echo esc_html( $item['btn_text'] ); ?> 
                                    <i class="fas fa-angle-double-right"></i> 
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?> 
            </div>
        </div>
        <?php
        echo ob_get_clean();
    }
}
Plugin::instance()->widgets_manager->register( new restly_pricing_v6_Widget );