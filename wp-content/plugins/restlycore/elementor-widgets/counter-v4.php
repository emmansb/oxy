<?php namespace Elementor;

class restly_counter_v4_widget extends Widget_Base {

	public function get_name() {

		return 'counter_four';
	}

	public function get_title() {
		return esc_html__( 'Restly Counter V4', 'restlycore' );
	}

	public function get_icon() {

		return 'eicon-counter';
	}

	public function get_categories() {
		return ['restly'];
	}

	protected function register_controls() {

		//Content tab start
		$this->start_controls_section(
			'counter_options',
			[
				'label' => esc_html__( 'Restly Counter', 'restlycore' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);
		$repeater = new \Elementor\Repeater();
		$repeater->add_control(
			'icon',
			[
				'label'   => esc_html__( 'Icon', 'restlycore' ),
				'type'    => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value'   => 'fas fa-star',
					'library' => 'solid',
				],
			]
		);
		$repeater->add_control(
			'number',
			[
				'label'   => esc_html__( 'Number', 'restlycore' ),
				'type'    => \Elementor\Controls_Manager::NUMBER,
				'min'     => 0,
				'max'     => 999999999,
				'step'    => 1,
				'default' => 540,
			]
		);
		$repeater->add_control(
			'symble',
			[
				'label'   => esc_html__( 'Symble', 'restlycore' ),
				'type'    => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( '+', 'restlycore' ),
			]
		);
		$repeater->add_control(
			'title',
			[
				'label'   => esc_html__( 'Title', 'restlycore' ),
				'type'    => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Happy Customers', 'restlycore' ),
				'dynamic' => [
					'active' => true,
				],
			]
		);
		$this->add_control(
			'counters',
			[
				'label'       => esc_html__( 'Counter List', 'restlycore' ),
				'type'        => \Elementor\Controls_Manager::REPEATER,
				'fields'      => $repeater->get_controls(),
				'default'     => [
					[
						'title'  => esc_html__( 'Team member', 'restlycore' ),
						'number' => esc_html__( '200', 'restlycore' ),
						'symble' => esc_html__( '+', 'restlycore' ),
					],
					[
						'title'  => esc_html__( 'Complete project', 'restlycore' ),
						'number' => esc_html__( '10', 'restlycore' ),
						'symble' => esc_html__( '+', 'restlycore' ),
					],
					[
						'title'  => esc_html__( 'Winning award', 'restlycore' ),
						'number' => esc_html__( '20', 'restlycore' ),
						'symble' => esc_html__( '+', 'restlycore' ),
					],
					[
						'title'  => esc_html__( 'Client review', 'restlycore' ),
						'number' => esc_html__( '900', 'restlycore' ),
						'symble' => esc_html__( '+', 'restlycore' ),
					],
				],
				'title_field' => '{{{ title }}}',
			]
		);
		$this->add_control(
			'container_full',
			[
				'label'        => esc_html__( 'Enable Full Container', 'restlycore' ),
				'type'         => \Elementor\Controls_Manager::SWITCHER,
				'label_on'     => esc_html__( 'Show', 'restlycore' ),
				'label_off'    => esc_html__( 'Hide', 'restlycore' ),
				'return_value' => 'yes',
				'default'      => 'no',
			]
		);
		$this->add_control(
			'desktop_col',
			[
				'label'   => __( 'Columns On Desktop', 'restlycore' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'col-xl-3',
				'options' => [
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
				'label'   => __( 'Columns for Laptop', 'restlycore' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'col-lg-3',
				'options' => [
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
				'label'   => __( 'Columns On Tablet', 'restlycore' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'col-md-6',
				'options' => [
					'col-md-12' => __( '1 Column', 'restlycore' ),
					'col-md-6'  => __( '2 Column', 'restlycore' ),
					'col-md-4'  => __( '3 Column', 'restlycore' ),
					'col-md-3'  => __( '4 Column', 'restlycore' ),
					'col-md-2'  => __( '6 Column', 'restlycore' ),
				],
			]
		);
		$this->end_controls_section();

	// *********************************************************
	//                Box Style Css
	// *********************************************************

		$this->start_controls_section(
			'counter_box',
			[
				'label' => esc_html__( 'Box', 'restlycore' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
        $this->add_control(
			'Main_box_css',
			[
				'label' => esc_html__( 'Necessary Options', 'restlycore' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
        $this->add_responsive_control(
			'main_box_padding',
			[
				'label'      => esc_html__( 'Padding', 'restlycore' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%', 'em'],
				'selectors'  => [
					'{{WRAPPER}} .restly-counter-v4-wrapper' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
        $this->add_responsive_control(
			'main_box_margin',
			[
				'label'      => esc_html__( 'Margin', 'restlycore' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%', 'em'],
				'selectors'  => [
					'{{WRAPPER}} .restly-counter-v4-wrapper' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
        $this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name'     => 'main_box_border',
				'label'    => esc_html__( 'Border', 'restlycore' ),
				'selector' => '{{WRAPPER}} .restly-counter-v4-wrapper',
			]
		);
        $this->add_responsive_control(
			'main_box_radius',
			[
				'label'      => esc_html__( 'Border Radius', 'restlycore' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => ['px', '%'],
				'range'      => [
					'px' => [
						'min'  => 0,
						'max'  => 100,
						'step' => 1,
					],
					'%'  => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default'    => [
					'unit' => 'px',
				],
				'selectors'  => [
					'{{WRAPPER}} .restly-counter-v4-wrapper' => 'border-radius: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name'     => 'main_box_shadow',
				'label'    => esc_html__( 'Box Shadow', 'restlycore' ),
				'selector' => '{{WRAPPER}} .restly-counter-v4-wrapper',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name'     => 'box_bg',
				'label'    => esc_html__( 'Background', 'restlycore' ),
				'types'    => ['classic', 'gradient', 'video'],
				'selector' => '{{WRAPPER}} .restly-counter-v4-wrapper .restly-counter-v4-items',
                'separator' => 'before',
			]
		);
        $this->add_responsive_control(
			'alignment',
			[
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'label' => esc_html__( 'Alignment', 'restlycore' ),
				'options' => [
					'flex-start' => [
						'title' => esc_html__( 'Left', 'restlycore' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Column', 'restlycore' ),
						'icon' => 'eicon-text-align-center',
					],
                    'flex-end' => [
						'title' => esc_html__( 'Right', 'restlycore' ),
						'icon' => 'eicon-text-align-right',
					],
				],
				
                'toggle'  => true,
                'selectors_dictionary' => [
                    'flex-start'  => 'justify-content:flex-start',
                    'center'  => 'justify-content:center',
                    'flex-end'   => 'justify-content:flex-end',
                ],
                'selectors'            => [
                    '{{WRAPPER}} .restly-counter-v4-wrapper .restly-counter-v4-item' => '{{VALUE}}',
                ],
			]
		);
        $this->add_responsive_control(
			'reverge',
			[
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'label' => esc_html__( 'Row Reverse', 'restlycore' ),
				'options' => [
					'left' => [
						'title' => esc_html__( 'Left', 'restlycore' ),
						'icon' => 'eicon-long-arrow-left',
					],
					'column' => [
						'title' => esc_html__( 'Column', 'restlycore' ),
						'icon' => 'eicon-arrow-up',
					],
                    'right' => [
						'title' => esc_html__( 'Right', 'restlycore' ),
						'icon' => 'eicon-long-arrow-right',
					],
				],
				
                'toggle'  => true,
                'selectors_dictionary' => [
                    'right'   => 'flex-direction:row',
                    'left'  => 'flex-direction:row-reverse',
                    'column'  => 'flex-direction:column',
                ],
                'selectors'            => [
                    '{{WRAPPER}} .restly-counter-v4-wrapper .restly-counter-v4-item' => '{{VALUE}}',
                ],
			]
		);
        $this->add_responsive_control(
			'text_align',
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
					'{{WRAPPER}} .restly-counter-v4-wrapper .restly-counter-v4-item' => 'text-align: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name'     => 'box_border',
				'label'    => esc_html__( 'Border', 'restlycore' ),
				'selector' => '{{WRAPPER}} .restly-counter-v4-wrapper .restly-counter-v4-items',
			]
		);
		$this->add_responsive_control(
			'box_radius',
			[
				'label'      => esc_html__( 'Border Radius', 'restlycore' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => ['px', '%'],
				'range'      => [
					'px' => [
						'min'  => 0,
						'max'  => 100,
						'step' => 1,
					],
					'%'  => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default'    => [
					'unit' => 'px',
				],
				'selectors'  => [
					'{{WRAPPER}} .restly-counter-v4-wrapper .restly-counter-v4-items' => 'border-radius: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name'     => 'box_shadow',
				'label'    => esc_html__( 'Box Shadow', 'restlycore' ),
				'selector' => '{{WRAPPER}} .restly-counter-v4-wrapper .restly-counter-v4-items',
			]
		);
		$this->add_responsive_control(
			'box_margin',
			[
				'label'      => esc_html__( 'Margin', 'restlycore' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%', 'em'],
				'selectors'  => [
					'{{WRAPPER}} .restly-counter-v4-wrapper .restly-counter-v4-items' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'box_padding',
			[
				'label'      => esc_html__( 'Padding', 'restlycore' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%', 'em'],
				'selectors'  => [
					'{{WRAPPER}} .restly-counter-v4-wrapper .restly-counter-v4-items' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section();

		 // *********************************************************
        //                Icon Style Css
        // *********************************************************

        $this->start_controls_section(
            'icon_css',
            [
                'label' => __( 'Icon Style', 'restlycore' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->start_controls_tabs(
            'icon_tabs'
        );
        $this->start_controls_tab(
            'icon_tab_normal',
            [
                'label' => __( 'Normal', 'restlycore' ),
            ]
        );
        $this->add_responsive_control(
            'icon_size',
            [
                'label'      => esc_html__( 'Icon Size', 'restlycore' ),
                'type'       => Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range'      => [
                    'px' => [
                        'min'  => 0,
                        'max'  => 100,
                        'step' => 1,
                    ],
                ],
                'selectors'  => [
                    '{{WRAPPER}} .restly-counter-v4-item .restly-counter-v4-icon' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
		$this->add_responsive_control(
            'min_icon_width',
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
                    '{{WRAPPER}} .restly-counter-v4-item .restly-counter-v4-icon' => 'min-width: {{SIZE}}{{UNIT}};',
                ],
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
                    '{{WRAPPER}} .restly-counter-v4-item .restly-counter-v4-icon' => 'width: {{SIZE}}{{UNIT}};',
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
                    '{{WRAPPER}} .restly-counter-v4-item .restly-counter-v4-icon' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'icon_color',
            [
                'label'     => esc_html__( 'Color', 'restlycore' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .restly-counter-v4-item .restly-counter-v4-icon' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name'     => 'icon_bg',
                'label'    => esc_html__( 'Background', 'restlycore' ),
                'types'    => ['classic', 'gradient', 'video'],
                'selector' => '{{WRAPPER}} .restly-counter-v4-item .restly-counter-v4-icon',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_box_Shadow::get_type(),
            [
                'name'     => 'icon_shadow',
                'label'    => esc_html__( 'icon Shadow', 'restlycore' ),
                'selector' => '{{WRAPPER}} .restly-counter-v4-item .restly-counter-v4-icon',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'icon_border',
                'label'    => esc_html__( 'Border', 'restlycore' ),
                'selector' => '{{WRAPPER}} .restly-counter-v4-item .restly-counter-v4-icon',
            ]
        );
        $this->add_responsive_control(
            'icon_radius',
            [
                'label'      => esc_html__( 'Border Radius', 'restlycore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .restly-counter-v4-item .restly-counter-v4-icon' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .restly-counter-v4-item .restly-counter-v4-icon' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .restly-counter-v4-item .restly-counter-v4-icon' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                'label' => esc_html__( 'SVG Wigth', 'restlycore' ),
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
                    '{{WRAPPER}} .restly-counter-v4-item .restly-counter-v4-icon svg' => 'width: {{SIZE}}{{UNIT}};',
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
                    '{{WRAPPER}} .restly-counter-v4-item .restly-counter-v4-icon svg' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();

        $this->start_controls_tab(
            'icon_tab_hover',
            [
                'label' => __( 'Hover', 'restlycore' ),
            ]
        );
        $this->add_responsive_control(
            'icon_hcolor',
            [
                'label'     => esc_html__( 'Color', 'restlycore' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .restly-counter-v4-item .restly-counter-v4-icon' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name'     => 'icon_hbg',
                'label'    => esc_html__( 'Background', 'restlycore' ),
                'types'    => ['classic', 'gradient', 'video'],
                'selector' => '{{WRAPPER}} .restly-counter-v4-item .restly-counter-v4-icon',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_box_Shadow::get_type(),
            [
                'name'     => 'icon_hshadow',
                'label'    => esc_html__( 'icon Shadow', 'restlycore' ),
                'selector' => '{{WRAPPER}} .restly-counter-v4-item .restly-counter-v4-icon',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'icon_hborder',
                'label'    => esc_html__( 'Border', 'restlycore' ),
                'selector' => '{{WRAPPER}} .restly-counter-v4-item .restly-counter-v4-icon',
            ]
        );
        $this->add_responsive_control(
            'icon_hradius',
            [
                'label'      => esc_html__( 'Border Radius', 'restlycore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .restly-counter-v4-item .restly-counter-v4-icon' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();

		$this->start_controls_section(
			'counter_number',
			[
				'label' => esc_html__( 'Number CSS', 'restlycore' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_responsive_control(
			'number_color',
			[
				'label'     => esc_html__( 'Number Color', 'restlycore' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .restly-counter-v4-count-timer' => 'color: {{VALUE}}',
					'{{WRAPPER}} .restly-counter-v4-number span' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'number_title_typo',
				'label'    => esc_html__( 'Title Typography', 'restlycore' ),
				'selector' => '{{WRAPPER}} .restly-counter-v4-count-timer',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'number_symble_typo',
				'label'    => esc_html__( 'Symbol Typography', 'restlycore' ),
				'selector' => '{{WRAPPER}} .restly-counter-v4-number span',
			]
		);
		$this->add_responsive_control(
			'number_margin',
			[
				'label'      => esc_html__( 'Number Margin', 'restlycore' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%', 'em'],
				'selectors'  => [
					'{{WRAPPER}} .restly-counter-v4-count-timer' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .restly-counter-v4-number span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'number_padding',
			[
				'label'      => esc_html__( 'Number Padding', 'restlycore' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%', 'em'],
				'selectors'  => [
					'{{WRAPPER}} .restly-counter-v4-count-timer' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .restly-counter-v4-number span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section();
		$this->start_controls_section(
			'counter_title',
			[
				'label' => esc_html__( 'Title CSS', 'restlycore' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_responsive_control(
			'title_color',
			[
				'label'     => esc_html__( 'Title Color', 'restlycore' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .restly-counter-v4-item .restly-counter-v4-counter-title' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'title_typo',
				'label'    => esc_html__( 'Title Typography', 'restlycore' ),
				'selector' => '{{WRAPPER}} .restly-counter-v4-item .restly-counter-v4-counter-title',
			]
		);
		$this->add_responsive_control(
			'title_margin',
			[
				'label'      => esc_html__( 'Title Margin', 'restlycore' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%', 'em'],
				'selectors'  => [
					'{{WRAPPER}} .restly-counter-v4-item .restly-counter-v4-counter-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'title_padding',
			[
				'label'      => esc_html__( 'Title Padding', 'restlycore' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%', 'em'],
				'selectors'  => [
					'{{WRAPPER}} .restly-counter-v4-item .restly-counter-v4-counter-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section();
	}
	//Render
	protected function render() {
		$settings = $this->get_settings_for_display();
		$count_id = rand( 120, 12314 );
		$column = $settings['desktop_col'] . ' ' . $settings['laptop_col'] . ' ' . $settings['tab_col'];
		if ( $settings['container_full'] == 'yes' ) {
			$container = 'container-fluid';
		} else {
			$container = 'container';
		}
		echo '
        <script>
			jQuery(document).ready(function($) {
				 "use strict";
				$(".timer").countTo();
				$(".count-process").appear(function() {
				    $(".timer").countTo();
				}, {
				    accY: -200
				});
			});
		</script>
        ';
		ob_start();
		?>
        <div class="restly-counter-v4-wrapper counter-box-<?php echo esc_attr( $count_id ); ?>">
                <div class="<?php echo esc_attr( $container ); ?>">
                    <div class="row">
                        <?php foreach ( $settings['counters'] as $item ): ?>
                        <div class="<?php echo esc_attr( $column ); ?> col-sm-6 col-12">
                            <div class="restly-counter-v4-items">
                                <div class="restly-counter-v4-item">
									<?php if ( !empty( $item['icon']['value'] )) :?>
										<div class="restly-counter-v4-icon">
											<?php \Elementor\Icons_Manager::render_icon( $item['icon'], ['aria-hidden' => 'true'] );?>
										</div>
									<?php endif;?>
                                    <div class="count-process">
                                        <div class="restly-counter-v4-number">
                                            <h2 class="restly-counter-v4-count-timer timer" data-to="<?php echo esc_attr( $item['number'] ); ?>" data-speed="5000">
                                                <?php echo esc_html( $item['number'] ); ?>
											</h2>
                                            <?php if ( !empty( $item['symble'] ) ): ?>
                                            	<span><?php echo esc_html( $item['symble'] ); ?></span>
                                            <?php endif;?>
                                        </div>
										<?php if ( !empty( $item['title'] ) ): ?>
                                        <div class="restly-counter-v4-counter-title"><?php echo esc_html( $item['title'] ); ?></div>
										<?php endif;?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endforeach;?>
                    </div>
            </div>
        </div>
        <?php
echo ob_get_clean();
	}
}
Plugin::instance()->widgets_manager->register( new restly_counter_v4_widget );