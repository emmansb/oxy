<?php namespace Elementor;

class restly_service_five_widget extends Widget_Base {

    public function get_name() {

        return 'restly_service_five';
    }

    public function get_title() {
        return esc_html__( 'Restly Service V5', 'restlycore' );
    }

    public function get_icon() {

        return 'eicon-testimonial-carousel';
    }

    public function get_categories() {
        return ['restly'];
    }

    protected function register_controls() {
        //Content tab start

        //=================================
        // ===== SERVICE STYLE ONE ========
        //=================================
        $this->start_controls_section(
            'restly_service_nsection',
            [
                'label' => esc_html__( 'Normal Content', 'restlycore' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
                
            ]
        );
        $this->add_control(
            'container',
            [
                'label' => esc_html__( 'Enable Container', 'restlycore' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Show', 'restlycore' ),
                'label_off' => esc_html__( 'Hide', 'restlycore' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );
        $this->add_control(
			'image',
			[
			    'label' => esc_html__('Image','restlycore'),
			    'type'=>Controls_Manager::MEDIA,
			]
		);
        $this->add_control(
            'icon',
            [
                'label'   => esc_html__( 'Icon', 'restlycore' ),
                'type'    => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value'   => 'fas fa-university',
                    'library' => 'fa-solid',
                ],
            ]
        );
        $this->add_control(
            'title',
            [
                'label' => esc_html__( 'Title', 'restlycore' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'IT Management', 'restlycore' ),
            ]
        );
        $this->add_control(
            'title_tag',
            [
                'label' => esc_html__( 'HTML Tag', 'restlycore' ),
                'description' => esc_html__( 'Add HTML Tag For Title', 'restlycore' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'h3',
                'options' => [
                    'h1'  => esc_html__( 'H1', 'restlycore' ),
                    'h2'  => esc_html__( 'H2', 'restlycore' ),
                    'h3'  => esc_html__( 'H3', 'restlycore' ),
                    'h4'  => esc_html__( 'H4', 'restlycore' ),
                    'h5'  => esc_html__( 'H5', 'restlycore' ),
                    'h6'  => esc_html__( 'H6', 'restlycore' ),
                ],
            ]
        );
        $this->add_control(
            'description',
            [
                'label' => esc_html__( 'Content', 'restlycore' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod', 'restlycore' ),
                'show_label' => true,
            ]
        );
        $this->add_control(
            'btn',
            [
                'label' => esc_html__( 'Button Text', 'restlycore' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Learn More', 'restlycore' ),
            ]
        );
        $this->add_control(
			'url',
			[
				'label' => __( 'Button Link', 'restlycore' ),
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

        $this->end_controls_section();


    //=================================
        //== SERVICE STYLE ONE CSS START ==
        //=================================
        $this->start_controls_section(
			'restly_service_CSS_normal',
			[
				'label' => esc_html__( 'Normal Box', 'restlycore' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                
			]
		);
        $this->start_controls_tabs(
			'restly_service_CSS_normal_tabs'
		);

        $this->start_controls_tab(
			'restly_service_CSS_nbox_tab',
			[
				'label' => __( 'Box', 'restlycore' ),
			]
		);
        $this->add_control(
            'restly_service_CSS_nbox_aligment',
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
                        'icon' => 'eicon-text-align-left',
                    ],
                ],
                'default' => 'left',
                'toggle' => true,
                'selectors' => [
                    '{{WRAPPER}} .service-style5-item' => 'text-align: {{VALUE}}',
                ],
            ]
        );
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'restly_service_CSS_n_bg',
				'label' => esc_html__( 'Background', 'restlycore' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .service-style5-item',
			]
		);
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'restly_service_CSS_n_border',
                'label' => esc_html__( 'Border', 'restlycore' ),
                'selector' => '{{WRAPPER}} .service-style5-item',
            ]
        );
        $this->add_responsive_control(
            'restly_service_CSS_n_radius',
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
                'default' => [
                    'unit' => 'px',
                    'size' => 5,
                ],
                'selectors' => [
                    '{{WRAPPER}} .service-style5-item' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'restly_service_CSS_n_shadow',
                'label' => esc_html__( 'Box Shadow', 'restlycore' ),
                'selector' => '{{WRAPPER}} .service-style5-item',
            ]
        );
        $this->add_responsive_control(
            'restly_service_CSS_n_margin',
            [
                'label' => esc_html__( 'Margin', 'restlycore' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .service-style5-item' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'restly_service_CSS_n_padding',
            [
                'label' => esc_html__( 'Padding', 'restlycore' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .service-style5-item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();

        $this->start_controls_tab(
			'restly_service_CSS_image_tab',
			[
				'label' => __( 'Image', 'restlycore' ),
			]
		);
        $this->add_responsive_control(
            'img_width',
            [
                'label' => esc_html__( 'Width', 'restlycore' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px' ],
                'range' => [
                    'px' => [
                        'min' => 30,
                        'max' => 200,
                        'step' => 1,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .service-style5-image img' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'img_height',
            [
                'label' => esc_html__( 'Height', 'restlycore' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%' ],
                'range' => [
                    'px' => [
                        'min' => 30,
                        'max' => 200,
                        'step' => 1,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .service-style5-image img' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'img_radius',
            [
                'label' => esc_html__( 'Border Radius', 'restlycore' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .service-style5-image img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'img_marign',
            [
                'label' => esc_html__( 'Margin', 'restlycore' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .service-style5-image' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'img_padidng',
            [
                'label' => esc_html__( 'Padding', 'restlycore' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .service-style5-image' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->start_controls_tab(
			'restly_service_CSS_ntitle_tab',
			[
				'label' => __( 'Title', 'restlycore' ),
			]
		);
        $this->add_responsive_control(
            'restly_service_CSS_ntitle_color',
            [
                'label' => esc_html__( 'Color', 'restlycore' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .service-style5-title' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'restly_service_CSS_ntitle_typo',
                'label' => esc_html__( 'Typography', 'restlycore' ),
                'selector' => '{{WRAPPER}} .service-style5-title',
            ]
        );
        $this->add_responsive_control(
            'restly_service_CSS_ntitle_margin',
            [
                'label' => esc_html__( 'Margin', 'restlycore' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .service-style5-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'restly_service_CSS_ntitle_padding',
            [
                'label' => esc_html__( 'Paddng', 'restlycore' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .service-style5-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();
       
        $this->start_controls_tab(
			'restly_service_CSS_nbtn_tab',
			[
				'label' => __( 'Button', 'restlycore' ),
			]
		);
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'btn_icon_typo',
                'selector' => '{{WRAPPER}} .service-style5-btn .service-btns',
            ]
        );
        $this->add_responsive_control(
            'restly_service_CSS_nbtn_color',
            [
                'label' => esc_html__( 'Color', 'restlycore' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .service-style5-btn .service-btns' => 'color: {{VALUE}}',
                ],
            ]
        );
        
        $this->add_responsive_control(
            'restly_service_CSS_nbtn_margin',
            [
                'label' => esc_html__( 'Margin', 'restlycore' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .service-style5-btn .service-btns' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'restly_service_CSS_nbtn_padding',
            [
                'label' => esc_html__( 'Paddng', 'restlycore' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .service-style5-btn .service-btns' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();
		$this->end_controls_section();
        $this->start_controls_section(
			'restly_service_CSS_hover',
			[
				'label' => esc_html__( 'Hover Box', 'restlycore' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                
			]
		);
        $this->start_controls_tabs(
			'restly_service_CSS_hover_tabs'
		);
        $this->start_controls_tab(
			'restly_service_CSS_hbox_tab',
			[
				'label' => __( 'Box', 'restlycore' ),
			]
		);
        $this->add_control(
            'restly_service_CSS_hbox_aligment',
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
                        'icon' => 'eicon-text-align-left',
                    ],
                ],
                'default' => 'left',
                'toggle' => true,
                'selectors' => [
                    '{{WRAPPER}} .service-style-v5-hover' => 'text-align: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'restly_service_CSS_h_bg',
				'label' => esc_html__( 'Background', 'restlycore' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .service-style-v5-hover',
			]
		);
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'restly_service_CSS_h_border',
                'label' => esc_html__( 'Border', 'restlycore' ),
                'selector' => '{{WRAPPER}} .service-style-v5-hover',
            ]
        );
        $this->add_responsive_control(
            'restly_service_CSS_h_radius',
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
                'default' => [
                    'unit' => 'px',
                    'size' => 5,
                ],
                'selectors' => [
                    '{{WRAPPER}} .service-style-v5-hover' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'restly_service_CSS_h_shadow',
                'label' => esc_html__( 'Box Shadow', 'restlycore' ),
                'selector' => '{{WRAPPER}} .service-style-v5-hover',
            ]
        );
        $this->add_responsive_control(
            'restly_service_CSS_h_margin',
            [
                'label' => esc_html__( 'Margin', 'restlycore' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .service-style-v5-hover' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'restly_service_CSS_h_padding',
            [
                'label' => esc_html__( 'Padding', 'restlycore' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .service-style-v5-hover' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->start_controls_tab(
			'restly_service_CSS_nicon_tab',
			[
				'label' => __( 'Icon', 'restlycore' ),
			]
		);
        $this->add_responsive_control(
            'icon_width',
            [
                'label' => esc_html__( 'Width', 'restlycore'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px','%' ],
                'range' => [
                    'px' => [
                        'min' => 20,
                        'max' => 300,
                        'step' => 1,
                    ]
                ],
                'selectors' => [
                    '{{WRAPPER}} .service-style5-icon' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'icon_min_width',
            [
                'label' => esc_html__( 'Min Width', 'restlycore'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px','%' ],
                'range' => [
                    'px' => [
                        'min' => 20,
                        'max' => 300,
                        'step' => 1,
                    ]
                ],
                'selectors' => [
                    '{{WRAPPER}} .service-style5-icon' => 'min-width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'icon_height',
            [
                'label' => esc_html__( 'Height', 'restlycore'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px','%' ],
                'range' => [
                    'px' => [
                        'min' => 20,
                        'max' => 150,
                        'step' => 1,
                    ]
                ],
                'selectors' => [
                    '{{WRAPPER}} .service-style5-icon' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );  
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'icon_typo',
                'selector' => '{{WRAPPER}} .service-style5-icon',
            ]
        );
        $this->add_responsive_control(
            'restly-icon_color',
            [
                'label'     => esc_html__( 'Icon Color', 'restlycore' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .service-style5-icon' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name'     => 'icon_bg',
                'label'    => esc_html__( 'Icon Background', 'restlycore' ),
                'types'    => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .service-style5-icon',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'icon_border',
                'label'    => esc_html__( 'Border', 'restlycore' ),
                'selector' => '{{WRAPPER}} .service-style5-icon',
            ]
        );
        $this->add_responsive_control(
            'icon_border_redius',
            [
                'label'      => esc_html__( 'Border Redius', 'restlycore' ),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .service-style5-icon' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
			'svg_options',
		[
			'label' => esc_html__( 'Svg Image Control', 'restlycore'),
			'type' => \Elementor\Controls_Manager::HEADING,
			'separator' => 'before',
		]
	);
        $this->add_responsive_control(
            'svg_width',
            [
                'label' => esc_html__( 'Width', 'restlycore'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px' ],
                'range' => [
                    'px' => [
                        'min' => 20,
                        'max' => 200,
                        'step' => 1,
                    ]
                ],
                'selectors' => [
                    '{{WRAPPER}} .service-style5-icon svg' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'svg_height',
            [
                'label' => esc_html__( 'Height', 'restlycore'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px' ],
                'range' => [
                    'px' => [
                        'min' => 20,
                        'max' => 200,
                        'step' => 1,
                    ]
                ],
                'selectors' => [
                    '{{WRAPPER}} .service-style5-icon svg' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );  
        $this->add_responsive_control(
            'icon_margin',
            [
                'label'      => esc_html__( 'Margin', 'restlycore' ),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .service-style5-icon' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'icon_padding',
            [
                'label'      => esc_html__( 'Padding', 'restlycore' ),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .service-style5-icon' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();

        $this->start_controls_tab(
			'restly_service_CSS_htitle_tab',
			[
				'label' => __( 'Title', 'restlycore' ),
			]
		);
        $this->add_responsive_control(
            'restly_service_CSS_htitle_color',
            [
                'label' => esc_html__( 'Color', 'restlycore' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .service-style-v5-htitle' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'restly_service_CSS_htitle_typo',
                'label' => esc_html__( 'Typography', 'restlycore' ),
                'selector' => '{{WRAPPER}} .service-style-v5-htitle',
            ]
        );
        $this->add_responsive_control(
            'restly_service_CSS_htitle_margin',
            [
                'label' => esc_html__( 'Margin', 'restlycore' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .service-style-v5-htitle' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'restly_service_CSS_htitle_padding',
            [
                'label' => esc_html__( 'Paddng', 'restlycore' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .service-style-v5-htitle' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();

        $this->start_controls_tab(
			'restly_service_CSS_hdec_tab',
			[
				'label' => __( 'Content', 'restlycore' ),
			]
		);
        $this->add_responsive_control(
            'restly_service_CSS_hdec_color',
            [
                'label' => esc_html__( 'Color', 'restlycore' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .service-style-v5-des' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'restly_service_CSS_hdec_typo',
                'label' => esc_html__( 'Typography', 'restlycore' ),
                'selector' => '{{WRAPPER}} .service-style-v5-des',
            ]
        );
        $this->add_responsive_control(
            'restly_service_CSS_hdec_margin',
            [
                'label' => esc_html__( 'Margin', 'restlycore' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .service-style-v5-des' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'restly_service_CSS_ndec_padding',
            [
                'label' => esc_html__( 'Paddng', 'restlycore' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .service-style-v5-des' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();

        $this->start_controls_tab(
			'restly_service_CSS_hbtn_tab',
			[
				'label' => __( 'Button', 'restlycore' ),
			]
		);
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'icon_htypo',
                'selector' => '{{WRAPPER}} .service-style-v5-hbtn .service-hbtns',
            ]
        );
        $this->add_responsive_control(
            'restly_service_CSS_hbtn_color',
            [
                'label' => esc_html__( 'Color', 'restlycore' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .service-style-v5-hbtn .service-hbtns' => 'color: {{VALUE}}',
                ],
            ]
        );
        
        $this->add_responsive_control(
            'restly_service_CSS_hbtn_margin',
            [
                'label' => esc_html__( 'Margin', 'restlycore' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .service-style-v5-hbtn .service-hbtns' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'restly_service_CSS_hbtn_padding',
            [
                'label' => esc_html__( 'Paddng', 'restlycore' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .service-style-v5-hbtn .service-hbtns' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();

        $this->end_controls_tabs();
		$this->end_controls_section();
        //=================================
        // == SERVICE STYLE ONE CSS END  ==
        //=================================

    }
    //Render
    protected function render() {
        $settings = $this->get_settings_for_display();
		 if( $settings['container'] == 'yes' ){
            $container = 'container';
        }else{
            $container = 'container-fluid';
        }
        $burl  = $settings['url']['url'];
        $btarget   = $settings['url']['is_external'] ? ' target="_blank"' : '';
        $bnofollow = $settings['url']['nofollow'] ? ' rel="nofollow"' : '';
        ob_start();

        ?>
        <div class="service-style5-wrapper">
            <div class="service-style5-item">
                <div class="service-style5-image">
                    <?php echo wp_get_attachment_image( $settings['image']['id'], 'full' ); ?>
                </div>
                <div class="service-style5-content">
                    <h6 class="service-style5-title "><?php echo esc_html( $settings['title'] ); ?></h6>
                    <div class="service-style5-btn">
                        <a class="service-btns" href="<?php echo esc_url($burl); ?>" target="_blank" rel="nofollow">
                        <?php echo esc_html( $settings['btn'] ); ?>
                        <i class="fas fa-arrow-right"></i></a>                    
                    </div>
                </div>
            </div>
            <div class="service-style-v5-hover">
                <div class="service-style5-icon">
                <?php \Elementor\Icons_Manager::render_icon( $settings['icon'], ['aria-hidden' => 'true'] );?>
                </div>
                <h2 class="service-style-v5-htitle"> <?php echo esc_html( $settings['title'] ); ?> </h2>
                <div class="service-style-v5-des"><?php echo esc_html( $settings['description'] ); ?>
                </div>
                <div class="service-style-v5-hbtn">
                   
                    <a class="service-hbtns" href="<?php echo esc_url($burl); ?>" target="_blank" rel="nofollow">
                    <?php echo esc_html( $settings['btn'] ); ?>
                    <i class="fas fa-arrow-right"></i>     
                    </a>
                </div>
            </div>
        </div>
        <?php
        echo ob_get_clean();
    }
}
Plugin::instance()->widgets_manager->register( new restly_service_five_widget );