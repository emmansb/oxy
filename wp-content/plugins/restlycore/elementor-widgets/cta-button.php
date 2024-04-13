<?php namespace Elementor;

class call_to_action_widget extends Widget_Base {

    public function get_name() {

        return 'call_to_action';
    }

    public function get_title() {
        return esc_html__( 'Restly Call TO Action', 'restlycore' );
    }

    public function get_icon() {

        return 'eicon-section';
    }

    public function get_categories() {
        return ['restly'];
    }

    protected function register_controls() {

        //Content tab start
        $this->start_controls_section(
            'restly_cta_options',
            [
                'label' => esc_html__( 'Restly Call TO Action', 'restlycore' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
			'enable_button',
			[
				'label' => esc_html__( 'Enable Button', 'restlycore' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'restlycore' ),
				'label_off' => esc_html__( 'Hide', 'restlycore' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);
        $this->add_control(
            'button_text',
            [
                'label'       => esc_html__( 'Text', 'restlycore' ),
                'type'        => \Elementor\Controls_Manager::TEXTAREA,
                'default'     => esc_html__( 'Read More', 'restlycore' ),
                'label_block' => true,
                'condition'     => [
                    'enable_button' => 'yes',
                ],
            ]
        );
        $this->add_control(
            'btn_icon',
            [
                'label'   => esc_html__( 'Botton Icon', 'restlycore' ),
                'type'    => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value'   => 'fas fa-arrow-right',
                    'library' => 'fa-solid',
                ],
                'condition'     => [
                    'enable_button' => 'yes',
                ],
            ]
        );
        $this->add_control(
            'website_link',
            [
                'label'         => __( 'Link', 'restlycore' ),
                'type'          => \Elementor\Controls_Manager::URL,
                'placeholder'   => __( 'htts://your-link.com', 'restlycore' ),
                'show_external' => true,
                'default'       => [
                    'url'         => '',
                    'is_external' => true,
                    'nofollow'    => true,
                ],
                'dynamic'       => [
                    'active' => true,
                ],
                'condition'     => [
                    'enable_button' => 'yes',
                ],
            ]
        );
        $this->add_control(
			'call_to_action_option',
			[
				'label' => esc_html__( 'Call to Option Options', 'restlycore' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
        $this->add_control(
			'enable_cta_option',
			[
				'label' => esc_html__( 'Enable Call Area', 'restlycore' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'restlycore' ),
				'label_off' => esc_html__( 'Hide', 'restlycore' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);
        $this->add_control(
            'icon',
            [
                'label'   => esc_html__( 'Icon', 'restlycore' ),
                'type'    => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value'   => 'fas fa-phone-alt',
                    'library' => 'fa-solid',
                ],
                'condition'     => [
                    'enable_cta_option' => 'yes',
                ],
            ]
        );
        $this->add_control(
            'cta_label',
            [
                'label'       => esc_html__( 'Label', 'restlycore' ),
                'type'        => \Elementor\Controls_Manager::TEXTAREA,
                'default'     => esc_html__( 'Call us anytime', 'restlycore' ),
                'label_block' => true,
                'condition'     => [
                    'enable_cta_option' => 'yes',
                ],
            ]
        );
        $this->add_control(
            'cta_text',
            [
                'label'       => esc_html__( 'Title', 'restlycore' ),
                'type'        => \Elementor\Controls_Manager::TEXTAREA,
                'default'     => esc_html__( '+256 21458.2146', 'restlycore' ),
                'label_block' => true,
                'condition'     => [
                    'enable_cta_option' => 'yes',
                ],
            ]
        );
        $this->add_control(
			'enable_video_option',
			[
				'label' => esc_html__( 'Enable Video Button', 'restlycore' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'restlycore' ),
				'label_off' => esc_html__( 'Hide', 'restlycore' ),
				'return_value' => 'yes',
				'default' => 'no',
			]
		);
        $this->add_control(
            'restly_Video_btn_link',
            [
                'label' => esc_html__( 'Video Link', 'restlycore' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'https://www.youtube.com/watch?v=f3NWvUV8MD8',
                'condition'     => [
                    'enable_video_option' => 'yes',
                ],
            ]
        );
        $this->add_control(
            'restly_Video_btn_icon',
            [
                'label' => esc_html__( 'Icon', 'restlycore' ),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-play',
                    'library' => 'solid',
                ],
                'condition'     => [
                    'enable_video_option' => 'yes',
                ],
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'box_style',
            [
                'label' => esc_html__( 'Style Box', 'restlycore' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_responsive_control(
            'box_align',
            [
                'label' => __( 'Alignment', 'restlycore' ),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => __( 'Left', 'restlycore' ),
                        'icon' => 'eicon-h-align-left',
                    ],
                    'center' => [
                        'title' => __( 'Center', 'restlycore' ),
                        'icon' => 'eicon-h-align-center',
                    ],
                    'right' => [
                        'title' => __( 'Right', 'restlycore' ),
                        'icon' => 'eicon-h-align-right',
                    ],
                ],
                'toggle' => true,
                'selectors' => [
                    '{{WRAPPER}} .cta-button-wrapper' => 'text-align: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'box_margin',
            [
                'label' => esc_html__( 'Margin', 'restlycore' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .cta-button-wrapper' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'box_padding',
            [
                'label' => esc_html__( 'Padding', 'restlycore' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .cta-button-wrapper' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'button_css_options',
            [
                'label' => esc_html__( 'Button Style', 'restlycore' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'btn_typo',
                'label' => esc_html__( 'Typography', 'restlycore' ),
                'selector' => '{{WRAPPER}} .theme-btns',
            ]
        );
        $this->add_responsive_control(
            'btn_margin',
            [
                'label' => esc_html__( 'Margin', 'restlycore' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .theme-btns' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'btn_padding',
            [
                'label' => esc_html__( 'Padding', 'restlycore' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .theme-btns' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->start_controls_tabs(
            'btn_tabs'
        );
        $this->start_controls_tab(
            'btn_normal',
            [
                'label' => __( 'Normal', 'restlycore' ),
            ]
        );
        $this->add_responsive_control(
            'btn_color',
            [
                'label' => esc_html__( 'Color', 'restlycore' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .theme-btns' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'btn_bg',
                'label' => esc_html__( 'Background', 'restlycore' ),
                'types' => [ 'classic', 'gradient', 'video' ],
                'selector' => '{{WRAPPER}} .theme-btns',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'btn_border',
                'label' => esc_html__( 'Border', 'restlycore' ),
                'selector' => '{{WRAPPER}} .theme-btns',
            ]
        );
        $this->add_responsive_control(
            'btn_radius',
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
                    '{{WRAPPER}} .theme-btns' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'btn_shadow',
                'label' => esc_html__( 'Shadow', 'restlycore' ),
                'selector' => '{{WRAPPER}} .theme-btns',
            ]
        );
        $this->end_controls_tab();
        
        $this->start_controls_tab(
            'btn_hover',
            [
                'label' => __( 'Hover', 'restlycore' ),
            ]
        );
        $this->add_responsive_control(
            'btn_hcolor',
            [
                'label' => esc_html__( 'Color', 'restlycore' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .theme-btns:hover' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'btn_hbg',
                'label' => esc_html__( 'Background', 'restlycore' ),
                'types' => [ 'classic', 'gradient', 'video' ],
                'selector' => '{{WRAPPER}} .theme-btns:hover',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'btn_hborder',
                'label' => esc_html__( 'Border', 'restlycore' ),
                'selector' => '{{WRAPPER}} .theme-btns:hover',
            ]
        );
        $this->add_responsive_control(
            'btn_hradius',
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
                    '{{WRAPPER}} .theme-btns:hover' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'btn_hshadow',
                'label' => esc_html__( 'Shadow', 'restlycore' ),
                'selector' => '{{WRAPPER}} .theme-btns:hover',
            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();

        $this->start_controls_section(
			'call_us_area',
			[
				'label' => esc_html__( 'Call Us Area', 'restlycore' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'icon_box_border',
                'label'    => esc_html__( 'Border', 'restlycore' ),
                'selector' => '{{WRAPPER}} .cta_button-area',
            ]
        );
        $this->add_responsive_control(
            'icon_box_margin',
            [
                'label'      => esc_html__( 'Margin', 'restlycore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .cta_button-area' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'icon_box_padding',
            [
                'label'      => esc_html__( 'Padding', 'restlycore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .cta_button-area' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
		$this->start_controls_tabs(
            'call_us_area_tabs'
        );
			$this->start_controls_tab(
				'icon_tab',
				[
					'label' => __( 'Iocn', 'restlycore' ),
				]
			);
			$this->add_group_control(
				\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'icon_size',
					'selector' => '{{WRAPPER}} .cta-button-icon',
				]
			);
			$this->add_responsive_control(
				'icon_width',
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
						'{{WRAPPER}} .cta-button-icon' => 'width: {{SIZE}}{{UNIT}};',
					],
				]
			);
			$this->add_responsive_control(
				'icon_height',
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
						'{{WRAPPER}} .cta-button-icon' => 'height: {{SIZE}}{{UNIT}};',
					],
				]
			);
			$this->add_responsive_control(
				'icon_color',
				[
					'label'     => esc_html__( 'Color', 'restlycore' ),
					'type'      => \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .cta-button-icon' => 'color: {{VALUE}}',
					],
				]
			);
			$this->add_group_control(
				\Elementor\Group_Control_Background::get_type(),
				[
					'name'     => 'icon_bg',
					'label'    => esc_html__( 'Background', 'restlycore' ),
					'types'    => ['classic', 'gradient', 'video'],
					'selector' => '{{WRAPPER}} .cta-button-icon',
				]
			);
			$this->add_group_control(
				\Elementor\Group_Control_box_Shadow::get_type(),
				[
					'name'     => 'icon_shadow',
					'label'    => esc_html__( 'icon Shadow', 'restlycore' ),
					'selector' => '{{WRAPPER}} .cta-button-icon',
				]
			);
			$this->add_group_control(
				\Elementor\Group_Control_Border::get_type(),
				[
					'name'     => 'icon_border',
					'label'    => esc_html__( 'Border', 'restlycore' ),
					'selector' => '{{WRAPPER}} .cta-button-icon',
				]
			);
			$this->add_responsive_control(
				'icon_radius',
				[
					'label'      => esc_html__( 'Border Radius', 'restlycore' ),
					'type'       => Controls_Manager::DIMENSIONS,
					'size_units' => ['px', '%', 'em'],
					'selectors'  => [
						'{{WRAPPER}} .cta-button-icon' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
			$this->add_responsive_control(
				'icon_margin',
				[
					'label'      => esc_html__( 'Margin', 'restlycore' ),
					'type'       => Controls_Manager::DIMENSIONS,
					'size_units' => ['px', '%', 'em'],
					'selectors'  => [
						'{{WRAPPER}} .cta-button-icon' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
			$this->add_responsive_control(
				'icon_padding',
				[
					'label'      => esc_html__( 'Padding', 'restlycore' ),
					'type'       => Controls_Manager::DIMENSIONS,
					'size_units' => ['px', '%', 'em'],
					'selectors'  => [
						'{{WRAPPER}} .cta-button-icon' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
			$this->add_control(
				'svg_size_note',
				[
					'label' => __( 'SVG Icon Size', 'restlycore' ),
					'type' => \Elementor\Controls_Manager::HEADING,
					'separator' => 'before',
				]
			);
			$this->add_responsive_control(
				'icon_svg_width',
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
						'{{WRAPPER}} .cta-button-icon svg' => 'width: {{SIZE}}{{UNIT}};',
					],
				]
			);
			$this->add_responsive_control(
				'icon_svg_height',
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
						'{{WRAPPER}} .cta-button-icon svg' => 'width: {{SIZE}}{{UNIT}};',
					],
				]
			);
			$this->end_controls_tab();
			$this->start_controls_tab(
				'small_title_tab',
				[
					'label' => esc_html__( 'Small Title', 'restlycore' ),
				]
			);
			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' => 'small_title_typo',
					'label' => __( 'Typography', 'restlycore' ),
					'selector' => ' {{WRAPPER}} .cta-button-title ',
				]
			);
	
			$this->add_responsive_control(
				'small_title_color',
				[
					'label'       => esc_html__('Color', 'restlycore'),
					'type'        => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .cta-button-title' => 'color: {{VALUE}};',
						
					],
				]
			);
	
			$this->add_responsive_control(
				'small_title_margin',
				[
					'label'      => esc_html__( 'Margin', 'restlycore' ),
					'type'       => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'selectors'  => [
						'{{WRAPPER}} .cta-button-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
			$this->add_responsive_control(
				'small_title_padding',
				[
					'label'      => esc_html__( 'Padding', 'restlycore' ),
					'type'       => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'selectors'  => [
						'{{WRAPPER}} .cta-button-title' => 'Padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
			$this->end_controls_tab();
			$this->start_controls_tab(
				'number_tab',
				[
					'label' => esc_html__( 'Number Style', 'restlycore' ),
				]
			);
			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' => 'number_typo',
					'label' => __( 'Typography', 'restlycore' ),
					'selector' => ' {{WRAPPER}} .cta-button-number ',
				]
			);
	
			$this->add_responsive_control(
				'number_color',
				[
					'label'       => esc_html__('Color', 'restlycore'),
					'type'        => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .cta-button-number' => 'color: {{VALUE}};',
						
					],
				]
			);
	
			$this->add_responsive_control(
				'number_margin',
				[
					'label'      => esc_html__( 'Margin', 'restlycore' ),
					'type'       => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'selectors'  => [
						'{{WRAPPER}} .cta-button-number' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
			$this->add_responsive_control(
				'number_padding',
				[
					'label'      => esc_html__( 'Padding', 'restlycore' ),
					'type'       => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'selectors'  => [
						'{{WRAPPER}} .cta-button-number' => 'Padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
			$this->end_controls_tab();

		$this->end_controls_tabs();
		$this->end_controls_section();
        $this->start_controls_section(
            'restly_Video_button_css_all',
            [
                'label' => esc_html__( 'Video Button CSS', 'restlycore' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->start_controls_tabs(
            'restly_Video_button_css_tabs'
        );
        $this->start_controls_tab(
            'restly_Video_button_css_tabs_normal',
            [
                'label' => __( 'Normal', 'restlycore' ),
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'restly_Video_button_bg',
                'label' => esc_html__( 'Background', 'restlycore' ),
                'types' => [ 'classic', 'gradient', 'video' ],
                'selector' => '{{WRAPPER}} .cta-button-wrapper .video-icons',
            ]
        );
        $this->add_responsive_control(
            'restly_Video_button_color',
            [
                'label' => esc_html__( 'Icon Color', 'restlycore' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .cta-button-wrapper .video-icons' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'restly_Video_button_size',
            [
                'label' => esc_html__( 'Icon Size', 'restlycore' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 1,
                    ]
                ],
                'selectors' => [
                    '{{WRAPPER}} .cta-button-wrapper .video-icons' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'restly_Video_button_widht',
            [
                'label' => esc_html__( 'Width', 'restlycore' ),
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
                    '{{WRAPPER}} .cta-button-wrapper .video-icons' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'restly_Video_button_height',
            [
                'label' => esc_html__( 'Height', 'restlycore' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 1,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .cta-button-wrapper .video-icons' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'restly_Video_button_radius',
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
                'default' => [
                    'unit' => '%',
                ],
                'selectors' => [
                    '{{WRAPPER}} .cta-button-wrapper .video-icons' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'restly_Video_button_border',
                'label' => esc_html__( 'Border', 'restlycore' ),
                'selector' => '{{WRAPPER}} .cta-button-wrapper .video-icons',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'restly_Video_button_shadow',
                'label' => esc_html__( 'Icon Shadow', 'restlycore' ),
                'selector' => '{{WRAPPER}} .cta-button-wrapper .video-icons',
            ]
        );
        $this->add_responsive_control(
            'restly_Video_button_margin',
            [
                'label' => esc_html__( 'Margin', 'restlycore' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .cta-button-wrapper .video-icons' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'restly_Video_button_padding',
            [
                'label' => esc_html__( 'Padding', 'restlycore' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .cta-button-wrapper .video-icons' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();
        
        $this->start_controls_tab(
            'restly_Video_button_css_tabs_hover',
            [
                'label' => __( 'Hover', 'restlycore' ),
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'restly_Video_button_hbg',
                'label' => esc_html__( 'Background', 'restlycore' ),
                'types' => [ 'classic', 'gradient', 'video' ],
                'selector' => '{{WRAPPER}} .video-button-wrapper a .video-icons:hover',
            ]
        );
        $this->add_responsive_control(
            'restly_Video_button_hcolor',
            [
                'label' => esc_html__( 'Icon Color', 'restlycore' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .video-button-wrapper a .video-icons:hover' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'restly_Video_button_sradius',
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
                    ],
                ],
                'default' => [
                    'unit' => '%',
                ],
                'selectors' => [
                    '{{WRAPPER}} .video-button-wrapper a .video-icons:hover' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'restly_Video_button_sborder',
                'label' => esc_html__( 'Border', 'restlycore' ),
                'selector' => '{{WRAPPER}} .video-button-wrapper a .video-icons:hover',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'restly_Video_button_sshadow',
                'label' => esc_html__( 'Icon Shadow', 'restlycore' ),
                'selector' => '{{WRAPPER}} .video-button-wrapper a .video-icons:hover',
            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();
        
    }
  
    //Render
    protected function render() {
        $settings = $this->get_settings_for_display();
        echo '
        <script>
        jQuery(document).ready(function($) {
            "use strict";
            $("#video-btn").magnificPopup({
                disableOn: 700,
                type: "iframe",
                mainClass: "mfp-fade",
                removalDelay: 160,
                preloader: false,
                fixedContentPos: false
            });
        });
        </script>';
        ob_start();
        ?>
         <div class="cta-button-wrapper">
         <?php if( $settings['enable_button'] == 'yes' ):
            if ( ! empty( $settings['website_link']['url'] ) ) {
                $this->add_link_attributes( 'website_link', $settings['website_link'] );
            } ?>
                <a <?php echo $this->get_render_attribute_string( 'website_link' ); ?> class="theme-btns">
                    <?php echo esc_html( $settings['button_text'] ); ?> 
                    <?php \Elementor\Icons_Manager::render_icon( $settings['btn_icon'], ['aria-hidden' => 'true'] );?>
                </a>
            <?php endif;?>
            <?php if( $settings['enable_cta_option'] == 'yes' ):?>
                <div class="cta_button-area">
                    <div class="cta-button-icon"> 
                    <?php \Elementor\Icons_Manager::render_icon( $settings['icon'], ['aria-hidden' => 'true'] );?>								
                    </div>
                    <div class="cta-button-content">
                        <div class="cta-button-title">  <?php echo esc_html( $settings['cta_label'] ); ?>  </div>
                        <div class="cta-button-number"> <?php echo esc_html( $settings['cta_text'] ); ?> </div>
                    </div>
                </div>
            <?php endif;?>
            <?php if( $settings['enable_video_option'] == 'yes' ):?>
                <div class="video-button-wrapper">
                    <a href="<?php echo esc_url($settings['restly_Video_btn_link']); ?>" class="video-btn" id="video-btn">
                        <div class="video-icons">
                            <i class="<?php echo esc_attr($settings['restly_Video_btn_icon']['value']); ?>"></i>
                        </div>
                    </a>
                </div>
            <?php endif;?>
        </div>
        <?php
        echo ob_get_clean();

    }
}
Plugin::instance()->widgets_manager->register( new call_to_action_widget );