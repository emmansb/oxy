<?php namespace Elementor;

class restly_portfolio_v2_widget extends Widget_Base {

    public function get_name() {

        return 'portfolio_v2';
    }

    public function get_title() {
        return esc_html__( 'Restly Portfolio V2', 'restlycore' );
    }

    public function get_icon() {

        return 'eicon-shape';
    }

    public function get_categories() {
        return ['restly'];
    }


    protected function register_controls() {
        $this->start_controls_section(
            'title_section',
            [
                'label' => esc_html__( 'Restly Title', 'restlycore' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'enable_title',
            [
                'label'        => esc_html__( 'Enable Title', 'restlycore' ),
                'type'         => \Elementor\Controls_Manager::SWITCHER,
                'label_on'     => esc_html__( 'Show', 'restlycore' ),
                'label_off'    => esc_html__( 'Hide', 'restlycore' ),
                'return_value' => 'yes',
                'default'      => 'yes',
               
            ]
        );
        $this->add_control(
            'stitle',
            [
                'label'   => esc_html__( 'Small Title', 'restlycore' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Our LATEST PROJECTS', 'restlycore' ),
                'condition' => [
                    'enable_title' => 'yes',
                ],
            ]
        );
        $this->add_control(
            'title',
            [
                'label'       => esc_html__( 'Title', 'restlycore' ),
                'type'        => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__( 'Our Successful Projects', 'restlycore' ),
                'dynamic'     => [
                    'active' => true,
                ],
                'condition' => [
                    'enable_title' => 'yes',
                ],
            ]
        );
        $this->add_control(
            'hightlite_title',
            [
                'label'       => esc_html__( 'Hight Title', 'restlycore' ),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Projects', 'restlycore' ),
                'dynamic'     => [
                    'active' => true,
                ],
                'condition' => [
                    'enable_title' => 'yes',
                ],
            ]
        );
        $this->add_control(
            'title_tag',
            [
                'label' => esc_html__( 'HTML Tag', 'restlycore' ),
                'description' => esc_html__( 'Add HTML Tag For Small Title', 'restlycore' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'h2',
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
                'condition' => [
                    'enable_title' => 'yes',
                ],
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'project_content_section',
            [
                'label' => esc_html__( 'Necessary Option', 'restlycore' ),
                'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'item_show',
            [
                'label'   => esc_html__( 'Disply Items', 'restlycore' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 3,
            ]
        );
        $this->add_control(
            'enable_cat',
            [
                'label'        => esc_html__( 'Post By Category', 'restlycore' ),
                'type'         => \Elementor\Controls_Manager::SWITCHER,
                'label_on'     => esc_html__( 'Show', 'restlycore' ),
                'label_off'    => esc_html__( 'Hide', 'restlycore' ),
                'return_value' => 'yes',
                'default'      => 'no',
            ]
        );
        $this->add_control(
            'post_cat',
            [
                'label'     => __( 'Select Categoris', 'restlycore' ),
                'type'      => \Elementor\Controls_Manager::SELECT2,
                'multiple'  => true,
                'options'   => restly_portfolio_cat_list(),
                'condition' => [
                    'enable_cat' => 'yes',
                ],
            ]
        );
        $this->add_control(
            'title_lanth',
            [
                'label'   => esc_html__( 'Title Lanth ', 'restlycore' ),
                'type'    => \Elementor\Controls_Manager::NUMBER,
                'min'     => 1,
                'max'     => 30,
                'step'    => 1,
                'default' => 6,
            ]
        );

        $this->add_control(
            'orderby',
            [
                'label'   => esc_html__( 'Order Type', 'restlycore' ),
                'type'    => Controls_Manager::SELECT,
                'default' => 'none',
                'options' => [
                    'none'          => esc_html__( 'None', 'restlycore' ),
                    'ID'            => esc_html__( 'ID', 'restlycore' ),
                    'date'          => esc_html__( 'Date', 'restlycore' ),
                    'name'          => esc_html__( 'Name', 'restlycore' ),
                    'title'         => esc_html__( 'Title', 'restlycore' ),
                    'comment_count' => esc_html__( 'Comment count', 'restlycore' ),
                    'rand'          => esc_html__( 'Random', 'restlycore' ),
                ],
            ]
        );
        $this->add_responsive_control(
            'order',
            [
                'label'   => esc_html__( 'Order', 'restlycore' ),
                'type'    => \Elementor\Controls_Manager::SELECT,
                'default' => 'ASC',
                'options' => [
                    'ASC'  => esc_html__( 'ASC', 'restlycore' ),
                    'DESE' => esc_html__( 'DESE', 'restlycore' ),
                ],
            ]
        );
        $this->add_control(
            'pagination',
            [
                'label'        => esc_html__( 'Show Navication', 'restlycore' ),
                'type'         => \Elementor\Controls_Manager::SWITCHER,
                'label_on'     => esc_html__( 'Show', 'restlycore' ),
                'label_off'    => esc_html__( 'Hide', 'restlycore' ),
                'return_value' => 'yes',
                'default'      => 'no',
            ]
        );
        
        $this->add_control(
			'enable_content',
			[
				'label' => esc_html__( 'Enable Content', 'restlycore' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'restlycore' ),
				'label_off' => esc_html__( 'Hide', 'restlycore' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);
        $this->add_control(
			'enable_slide',
			[
				'label' => esc_html__( 'Enable Slide', 'restlycore' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'restlycore' ),
				'label_off' => esc_html__( 'Hide', 'restlycore' ),
				'return_value' => 'yes',
				'default' => 'no',
			]
		);
        $this->add_control(
            'restly_enable_arrows',
            [
                'label'        => esc_html__( 'Enable Arrows ', 'restlycore' ),
                'type'         => Controls_Manager::SWITCHER,
                'label_on'     => esc_html__( 'On', 'restlycore' ),
                'label_off'    => esc_html__( 'Off', 'restlycore' ),
                'return_value' => 'yes',
                'default'      => 'yes',
                'condition' => [
                    'enable_slide' => 'yes',
                ],
            ]
        );
      
        $this->add_control(
            'enable_slider_auto_loop',
            [
                'label'        => esc_html__( 'Enable Auto Loop ', 'restlycore' ),
                'type'         => Controls_Manager::SWITCHER,
                'label_on'     => esc_html__( 'On', 'restlycore' ),
                'label_off'    => esc_html__( 'Off', 'restlycore' ),
                'return_value' => 'yes',
                'default'      => 'yes',
                'condition' => [
                    'enable_slide' => 'yes',
                ],
            ]
        );
        $this->add_control(
            'slid_show_item',
            [
                'label' => esc_html__( 'Display Item', 'restlycore' ),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'min' => 1,
                'max' => 4,
                'step' => 1,
                'default' => 4,
                'condition' => [
                    'enable_slide' => 'yes',
                ],
            ]
        );
        $this->add_control(
            'restly_slider_speed',
            [
                'label'     => esc_html__( 'Slide Speed', 'restlycore' ),
                'type'      => Controls_Manager::NUMBER,
                'min'       => 500,
                'max'       => 8000,
                'step'      => 10,
                'default'   => 800,
                'condition' => [
                    'enable_slide' => 'yes',
                ],
            ]
        );
        $this->add_control(
			'enable_container',
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
            'desktop_col',
            [
                'label' => esc_html__( 'Columns On Desktop', 'restlycore' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'col-xl-3',
                'options' => [
                    'col-xl-12'  => esc_html__( '1 Column', 'restlycore' ),
                    'col-xl-6'  => esc_html__( '2 Column', 'restlycore' ),
                    'col-xl-4'  => esc_html__( '3 Column', 'restlycore' ),
                    'col-xl-3'  => esc_html__( '4 Column', 'restlycore' ),
                ],
                'condition' => [
                    'enable_slide!' => 'yes',
                ],
            ]
        );
        $this->add_control(
            'ipadpro_col',
            [
                'label' => esc_html__( 'Columns On Ipad Pro', 'restlycore' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'col-lg-3',
                'options' => [
                    'col-lg-12'  => esc_html__( '1 Column', 'restlycore' ),
                    'col-lg-6'  => esc_html__( '2 Column', 'restlycore' ),
                    'col-lg-4'  => esc_html__( '3 Column', 'restlycore' ),
                    'col-lg-3'  => esc_html__( '4 Column', 'restlycore' ),
                ],
                'condition' => [
                    'enable_slide!' => 'yes',
                ],
            ]
        );
        $this->add_control(
            'tab_col',
            [
                'label' => esc_html__( 'Columns On Tablet', 'restlycore' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'col-md-6',
                'options' => [
                    'col-md-12'  => esc_html__( '1 Column', 'restlycore' ),
                    'col-md-6'  => esc_html__( '2 Column', 'restlycore' ),
                    'col-md-4'  => esc_html__( '3 Column', 'restlycore' ),
                    'col-md-3'  => esc_html__( '4 Column', 'restlycore' ),
                ],
                'condition' => [
                    'enable_slide!' => 'yes',
                ],
            ]
        );
        $this->end_controls_section();

        //===========================================//
        //========= PROJECT BOX STYLE START ========//
        //=========================================//
        $this->start_controls_section(
            'title_section_box',
            [
                'label' => esc_html__( 'Title Box Style', 'restlycore' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_responsive_control(
            'title_section_margin',
            [
                'label'      => esc_html__( 'Margin', 'restlycore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .restly-portfolio-two-title-items' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'title_section_padding',
            [
                'label'      => esc_html__( 'Padding', 'restlycore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .restly-portfolio-two-title-items' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();

		$this->start_controls_section(
			'subtitle_style_options',
			[
				'label' => esc_html__( 'Subtitle', 'restlycore' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'subtitle_title_typo',
				'label' => __( 'Typography', 'restlycore' ),
				'selector' => '{{WRAPPER}} .restly-section-small-title',
			]
		);

		$this->add_responsive_control(
			'subtitle_color',
			[
				'label'       => esc_html__('Color', 'restlycore'),
				'type'        => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .restly-section-small-title' => 'color: {{VALUE}};',
				],
			]
		);
        $this->add_responsive_control(
			'subtitle_color_before',
			[
				'label'       => esc_html__('Dote BeforeColor', 'restlycore'),
				'type'        => Controls_Manager::COLOR,
				'selectors' => [
                    '{{WRAPPER}} .restly-section-small-title:before' => 'background-color: {{VALUE}};',
				],
			]
		);
		        $this->add_responsive_control(
			'subtitle_color_after',
			[
				'label'       => esc_html__('Dote After Color', 'restlycore'),
				'type'        => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .restly-section-small-title:after' => 'background-color: {{VALUE}};',
				],
			]
		);
		$this->add_responsive_control(
			'subtitle_margin',
			[
				'label'      => esc_html__( 'Margin', 'restlycore' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .restly-section-small-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
        $this->add_responsive_control(
			'subtitle_padding',
			[
				'label'      => esc_html__( 'Padding', 'restlycore' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .restly-section-small-title' => 'Padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

        // 
		// ----------------Title Style------------------
        // 

		$this->start_controls_section(
			'title_style_options',
			[
				'label' => esc_html__( 'Title', 'restlycore' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_typo',
				'label' => __( 'Typography', 'restlycore' ),
				'selector' => '
                    {{WRAPPER}} .restly-section-title-two
                ',
			]
		);

		$this->add_responsive_control(
			'title_color',
			[
				'label'       => esc_html__('Color', 'restlycore'),
				'type'        => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .restly-section-title-two' => 'color: {{VALUE}};',
                    
				],
			]
		);
		$this->add_responsive_control(
			'htitle_color',
			[
				'label'       => esc_html__('Heightligt Color', 'restlycore'),
				'type'        => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .restly-section-title-two span' => 'color: {{VALUE}};',
                    
				],
			]
		);
		$this->add_responsive_control(
			'title_margin',
			[
				'label'      => esc_html__( 'Margin', 'restlycore' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .restly-section-title-two' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
        $this->add_responsive_control(
			'title_padding',
			[
				'label'      => esc_html__( 'Padding', 'restlycore' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .restly-section-title-two' => 'Padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section();
        $this->start_controls_section(
            'box_style',
            [
                'label' => esc_html__( 'Box Style', 'restlycore' ),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_responsive_control(
			'box_align',
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
					'{{WRAPPER}} .restly-portfolio-two-box .portfolio-two-content' => 'text-align: {{VALUE}};',
				],
			]
		);
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name'     => 'box_backgrounds',
                'label'    => esc_html__( 'Background', 'restlycore' ),
                'types'    => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .restly-portfolio-two-box:before',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'box_border',
                'label'    => esc_html__( 'Border', 'restlycore' ),
                'selector' => '{{WRAPPER}} .restly-portfolio-two-box:before',
            ]
        );
        $this->add_responsive_control(
            'team_border_radius',
            [
                'label'      => esc_html__( 'Border Radius', 'restlycore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .restly-portfolio-two-box:before' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name'     => 'box_shadow',
                'label'    => esc_html__( 'Box Shadow', 'restlycore' ),
                'selector' => '{{WRAPPER}} .restly-portfolio-two-box:before',
            ]
        );
        $this->add_responsive_control(
            'box_margin',
            [
                'label'      => esc_html__( 'Margin', 'restlycore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .restly-portfolio-two-box:before' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .restly-portfolio-two-box:before' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();

           // ===============================================
        // =========== IMAGE STYLE CSS ===================
        // ===============================================

        $this->start_controls_section(
            'image_style',
            [
                'label' => esc_html__( 'Image Style', 'restlycore' ),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_responsive_control(
            'image_height',
            [
                'label'      => esc_html__( 'Height', 'restlycore' ),
                'type'       => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%', 'custom' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
						'step' =>1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
                'selectors'  => [
                    '{{WRAPPER}} .restly-portfolio-two-box img' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
		$this->add_responsive_control(
            'min_image_height',
            [
                'label'      => esc_html__( 'Min Height', 'restlycore' ),
                'type'       => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%', 'custom' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
						'step' =>1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
                'selectors'  => [
                    '{{WRAPPER}} .restly-portfolio-two-box img' => 'min-height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'image_width',
            [
                'label'      => esc_html__( 'width', 'restlycore' ),
                'type'       => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%', 'custom' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
						'step' => 1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
                'selectors'  => [
                    '{{WRAPPER}} .restly-portfolio-two-box img' => 'width: {{SIZE}}{{UNIT}};',
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
                    '{{WRAPPER}} .restly-portfolio-two-box img' => 'object-fit: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'image_border',
                'label'    => esc_html__( 'Border', 'restlycore' ),
                'selector' => '{{WRAPPER}} .restly-portfolio-two-box img',
            ]
        );
        $this->add_responsive_control(
            'image_border_radius',
            [
                'label'      => esc_html__( 'Border Radius', 'restlycore' ),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .restly-portfolio-two-box img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'image_margin',
            [
                'label'      => esc_html__( 'Margin', 'restlycore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .restly-portfolio-two-box' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'image_padding',
            [
                'label'      => esc_html__( 'Padding', 'restlycore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .restly-portfolio-two-box' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();


          // ===================================================
        // ============== CONTENT STYLE ======================
        // ===================================================

        $this->start_controls_section(
            'content_tab_style',
            [
                'label' => esc_html__( 'Content Style', 'restlycore' ),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->start_controls_tabs( 'restly_Content_tabs' );
        $this->start_controls_tab(  
            'services_title_normal_tab',
            [
                'label' => esc_html__( 'Title', 'restlycore' ),
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'ptitle_typography',
                'selector' => '{{WRAPPER}} .restly-portfolio-two-title',
            ]
        );
        $this->add_responsive_control(
            'ptitle_color',
            [
                'label'     => esc_html__( 'Color', 'restlycore' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .restly-portfolio-two-title a' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'ptitle_color_hover',
            [
                'label'     => esc_html__( 'Hover Color', 'restlycore' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .restly-portfolio-two-title a:hover' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'ptitle_margin',
            [
                'label'      => esc_html__( 'Margin', 'restlycore' ),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .restly-portfolio-two-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'ptitle_padding',
            [
                'label'      => esc_html__( 'Padding', 'restlycore' ),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .restly-portfolio-two-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_tab();
        // ===================== Category STYLE====================
        $this->start_controls_tab(  
            'category_tab ',
            [
                'label' => esc_html__( 'Category', 'restlycore' ),
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'cat_typography',
                'selector' => '{{WRAPPER}} .restly-portfolio-two-category a',
            ]
        );

        $this->add_responsive_control(
            'cat_color',
            [
                'label'     => esc_html__( 'Color', 'restlycore' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .restly-portfolio-two-category ul li a' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'cat_color_h',
            [
                'label'     => esc_html__( 'Hover Color', 'restlycore' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .restly-portfolio-two-category ul li a:hover' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'cat_margin',
            [
                'label'      => esc_html__( 'Margin', 'restlycore' ),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .restly-portfolio-two-category ul li a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'cat_padding',
            [
                'label'      => esc_html__( 'Padding', 'restlycore' ),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .restly-portfolio-two-category ul li a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_tab();
        $this->end_controls_tabs();
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
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'icon_typography',
                'selector' => '{{WRAPPER}} .restly-portfolio-two-icon a',
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
                    '{{WRAPPER}} .restly-portfolio-two-icon a' => 'min-width: {{SIZE}}{{UNIT}};',
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
                    '{{WRAPPER}} .restly-portfolio-two-icon a' => 'width: {{SIZE}}{{UNIT}};',
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
                    '{{WRAPPER}} .restly-portfolio-two-icon a' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'icon_color',
            [
                'label'     => esc_html__( 'Color', 'restlycore' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .restly-portfolio-two-icon a' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name'     => 'icon_bg',
                'label'    => esc_html__( 'Background', 'restlycore' ),
                'types'    => ['classic', 'gradient', 'video'],
                'selector' => '{{WRAPPER}} .restly-portfolio-two-icon a',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_box_Shadow::get_type(),
            [
                'name'     => 'icon_shadow',
                'label'    => esc_html__( 'icon Shadow', 'restlycore' ),
                'selector' => '{{WRAPPER}} .restly-portfolio-two-icon a',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'icon_border',
                'label'    => esc_html__( 'Border', 'restlycore' ),
                'selector' => '{{WRAPPER}} .restly-portfolio-two-icon a',
            ]
        );
        $this->add_responsive_control(
            'icon_radius',
            [
                'label'      => esc_html__( 'Border Radius', 'restlycore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .restly-portfolio-two-icon a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .restly-portfolio-two-icon a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .restly-portfolio-two-icon a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .restly-portfolio-two-icon a:hover' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name'     => 'icon_hbg',
                'label'    => esc_html__( 'Background', 'restlycore' ),
                'types'    => ['classic', 'gradient', 'video'],
                'selector' => '{{WRAPPER}} .restly-portfolio-two-icon a:hover',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_box_Shadow::get_type(),
            [
                'name'     => 'icon_hshadow',
                'label'    => esc_html__( 'icon Shadow', 'restlycore' ),
                'selector' => '{{WRAPPER}} .restly-portfolio-two-icon a:hover',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'icon_hborder',
                'label'    => esc_html__( 'Border', 'restlycore' ),
                'selector' => '{{WRAPPER}} .restly-portfolio-two-icon a:hover',
            ]
        );
        $this->add_responsive_control(
            'icon_hradius',
            [
                'label'      => esc_html__( 'Border Radius', 'restlycore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .restly-portfolio-two-icon a:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();

           //
        //=========== Arrow STYLE START===========//
        //

        $this->start_controls_section(
			'testi_arrow_content',
			[
				'label' => esc_html__( 'Arrow Style', 'restlycore' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                'condition' => [
                    'restly_enable_arrows' => 'yes',
                ],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'arrow_typography',
				'selector' => '{{WRAPPER}} .restly-portfolio-two-arrow button',
			]
		);
		$this->add_responsive_control(
            'arrow_color',
            [
                'label'     => esc_html__( 'Color', 'restlycore' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .restly-portfolio-two-arrow button' => 'color: {{VALUE}}',
                ],
            ]
        );
		$this->add_responsive_control(
            'arrow_color_hover',
            [
                'label'     => esc_html__( 'Hover Color', 'restlycore' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .restly-portfolio-two-arrow button:hover' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
			'arrow_background_options',
			[
				'label' => esc_html__( 'Background Options', 'restlycore' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
        $this->add_responsive_control(
            'arrow_background',
            [
                'label'     => esc_html__( 'Background Color', 'restlycore' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .restly-portfolio-two-arrow button' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'arrow_background_hover',
            [
                'label'     => esc_html__( 'Background Hover Color', 'restlycore' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .restly-portfolio-two-arrow button:hover' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'arrow_border',
				'selector' => '{{WRAPPER}} .restly-portfolio-two-arrow button',
			]
		);

        $this->add_responsive_control(
            'arrow_border_radius',
            [
                'label'      => esc_html__( 'Border Radius', 'restlycore' ),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .restly-portfolio-two-arrow button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        ); 
        $this->end_controls_section();


    }
      //Render
      protected function render() {
        $settings = $this->get_settings_for_display();
        if( $settings['enable_container'] == 'yes' ){
            $container = 'container';
        }else{
            $container = 'container-fluid';
        } 
        $unique_id = rand( 2585, 8241 );
        if($settings['enable_slide'] == 'yes' ){
            $column = 'project-slide-item';
            $slider = 'slide'; ?>
            
            <script>
            jQuery(document).ready(function($) { 
                "use strict";
                $('#project-<?php echo esc_attr($unique_id); ?>').slick({
                    infinite: true,
                    rtl: <?php  echo json_encode( is_rtl() == 'yes' ? true : false);?>,
                    speed:<?php echo json_encode($settings['restly_slider_speed']);?>,
                    autoplay:<?php echo json_encode($settings['enable_slider_auto_loop'] == 'yes' ? true : false );?>,
                    arrows: <?php  echo json_encode($settings['restly_enable_arrows'] == 'yes' ? true : false);?>,
                    dots: false,
                    slidesToShow: <?php echo json_encode($settings['slid_show_item']); ?>,
                    slidesToScroll: 1,
                    cssEase: 'linear',
                    prevArrow: $(".slider-prev"),
                     nextArrow: $(".slider-next"),
                    responsive: [
                        {
                            breakpoint: 1200,
                            settings: {
                                slidesToShow: 3,
                                arrows: false,
                            }
                        },
                        {
                            breakpoint: 991,
                            settings: {
                                slidesToShow:2,
                                arrows: false,
                            }
                        },
                        {
                            breakpoint: 767,
                            settings: {
                                slidesToShow:1,
                                arrows: false,
                            }
                        }
                    ]
                });
            });
        </script>
        <?php
        }else{
            $slider = '';
            $column = $settings['desktop_col'] . ' ' . $settings['ipadpro_col'] . ' ' . $settings['tab_col'];
        } 
        ?>

   
  
 <?php
        global $post;
        $paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
        if ( $settings['enable_cat'] == 'yes' && !empty( $settings['post_cat'] ) ) {
            $p = new \WP_Query( array(
                'posts_per_page' => esc_attr( $settings['item_show'] ),
                'post_type'      => 'restly_portfolio',
                'paged'          => $paged,
                'order'          => esc_attr( $settings['orderby'] ),
                'tax_query'      => array(
                    array(
                        'taxonomy' => 'restly_portfolio_cat',
                        'field'    => 'slug',
                        'terms'    => $settings['post_cat'],
                    ),
                ),
            ) );
        } else {
            $p = new \WP_Query( array(
                'posts_per_page' => esc_attr( $settings['item_show'] ),
                'post_type'      => 'restly_portfolio',
                'paged'          => $paged,
                'orderby'        => esc_attr( $settings['orderby'] ),
                'order'          => esc_attr( $settings['order'] ),
            ) );
        }
        ob_start();
        ?>
 		<script>
            jQuery(document).ready(function($) {
                $('.restly-portfolio-two-icon').magnificPopup({
                    delegate: 'a',
                    type: 'image',
                    tLoading: 'Loading image #%curr%...',
                    mainClass: 'mfp-img-mobile',
                    gallery: {
                        enabled: true,
                        navigateByImgClick: true,
                        preload: [0,1] // Will preload 0 - before current, and 1 after the current image
                    },
                    image: {
                        tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
                        titleSrc: function(item) {
                            return item.el.attr('title');
                        }
                    }
                });
            });
        </script>
        <div class="restly-portfolio-two-wrapper">
            <?php  if($settings['enable_title'] == 'yes' ):?>
                <div class="container">
                    <div class="restly-portfolio-two-title-items"> 
                        <div class="portfolio-section-title-two">
                            <?php  if ( ! empty( $settings['stitle'] ) ) :?>
                                <div class="restly-section-small-title">
                                    <?php echo esc_html( $settings['stitle'] ); ?>
                                </div>
                            <?php endif?>
                            <?php if ( !empty( $settings['title'] ) ): ?>
                                <<?php echo esc_attr($settings['title_tag']);?> class="restly-section-title-two">
                                    <?php echo esc_html( $settings['title'] ); ?> <span><?php echo esc_html( $settings['hightlite_title'] ); ?> </span>
                                </<<?php echo esc_attr($settings['title_tag']);?>>
                            <?php endif;?>
                        </div>
                        <?php  if($settings['enable_slide'] == 'yes' ): ?>
                            <div class="restly-portfolio-two-arrow">
                                <button class="slider-prev"><i class="fas fa-arrow-left"></i>Prev</button>
                                <button class="slider-next">Next<i class="fas fa-arrow-right"></i></button>
                            </div>
                        <?php endif;?>
                    </div>
                </div>
            <?php endif;?>
            <div class="<?php echo esc_attr( $container ); ?>">
                <div class="row" id="project-<?php echo esc_attr($unique_id); ?>">
                    <?php while ( $p->have_posts() ): $p->the_post();?>
                        <div class="<?php echo esc_attr($column); ?> ">
                            <div class="restly-portfolio-two-box <?php echo esc_attr($slider); ?>">
                                <?php the_post_thumbnail( 'full', array( 'class' => 'img-responsive' ) ); ?>
                                <div class="restly-portfolio-two-box-content">
                                   <div class="restly-portfolio-two-icon">
                                        <a  href="<?php echo get_the_post_thumbnail_url( get_the_ID(), 'full' ) ?>">
                                            <i class="fa fa-search"></i>
                                        </a>
                                    </div>
                                    <?php  if($settings['enable_content'] == 'yes' ): ?>
                                        <div class="portfolio-two-content">
                                            <?php $project_catagorys = get_the_terms( get_the_ID(), 'restly_portfolio_cat' );
                                            if ( $project_catagorys && ! is_wp_error( $project_catagorys ) ) : ?>
                                                <div class="restly-portfolio-two-category">
                                                    <ul>
                                                    <?php 
                                                        foreach($project_catagorys as $project_catagory ): ?>
                                                            <li><a href="<?php echo esc_url(get_term_link($project_catagory->slug, 'restly_portfolio_cat')) ?>"> 
                                                                <?php echo esc_html($project_catagory->name)?> 
                                                            </a></li>
                                                    <?php endforeach; ?>
                                                    </ul>
                                                </div>
                                            <?php endif; ?>
                                            <h5 class="restly-portfolio-two-title"> <a href="<?php the_permalink(); ?>"><?php echo wp_trim_words( get_the_title(), $settings['title_lanth'] ); ?> </a></h5>
                                        </div>
                                    <?php endif;?>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; wp_reset_postdata();wp_reset_query();?>
                </div>
            </div>
        </div>
        <?php
        echo ob_get_clean();
    }
}
Plugin::instance()->widgets_manager->register( new restly_portfolio_v2_widget );