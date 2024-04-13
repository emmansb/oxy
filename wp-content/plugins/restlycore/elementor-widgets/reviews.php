<?php namespace Elementor;

class restly_review_widget extends Widget_Base {

    public function get_name() {

        return 'restly_review';
    }

    public function get_title() {
        return esc_html__( 'Restly Review', 'restlycore' );
    }

    public function get_icon() {

        return 'eicon-logo';
    }

    public function get_categories() {
        return ['restly'];
    }

    protected function register_controls() {

        //Content tab start
        $this->start_controls_section(
            'restly_review_options',
            [
                'label' => esc_html__( 'Restly Review', 'restlycore' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );
        $repeater = new \Elementor\Repeater();
       
        $repeater->add_control(
            'logo',
            [
                'label'   => __( 'Choose Logo', 'restlycore' ),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $repeater->add_control(
            'description',
            [
                'label' => esc_html__( 'Description', 'restlycore' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__( '4.88 out of 5 star from 1,645 reviews', 'restlycore' ),
                'show_label' => true,
            ]
        );
        $repeater->add_control(
			'elable_rating',
			[
				'label' => esc_html__( 'Enable Rating', 'restlycore' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'restlycore' ),
				'label_off' => esc_html__( 'Hide', 'restlycore' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		); 
        $repeater->add_control(
            'rating',
            [
                'label' => __('Rating', 'restlycore'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 1,
                        'max' => 5,
                        'step' => .5,
                    ],
                ],
                'default' => [
                    'size' => 5,
                ],
                'condition' => [
                    'elable_rating' => 'yes',
                ],
            ]
        );
        $this->add_control(
            'review',
            [
                'label'   => esc_html__( 'Logo List', 'restlycore' ),
                'type'    => \Elementor\Controls_Manager::REPEATER,
                'fields'  => $repeater->get_controls(),
                'default' => [
                    [
                        'description' => '4.88 out of 5 star from 1,645 reviews',
                    ],
                ],
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'restly_review_slide_option',
            [
                'label' => esc_html__( 'Slide Options', 'restlycore' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
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
            'enable_slider',
            [
                'label'        => esc_html__( 'Enable Slide', 'restlycore' ),
                'type'         => \Elementor\Controls_Manager::SWITCHER,
                'label_on'     => esc_html__( 'Show', 'restlycore' ),
                'label_off'    => esc_html__( 'Hide', 'restlycore' ),
                'return_value' => 'yes',
                'default'      => 'no',
            ]
        );
        $this->add_control(
            'restly_clsl_loop',
            [
                'label'        => esc_html__( 'Enable Loop ', 'restlycore' ),
                'type'         => Controls_Manager::SWITCHER,
                'label_on'     => esc_html__( 'On', 'restlycore' ),
                'label_off'    => esc_html__( 'Off', 'restlycore' ),
                'return_value' => 'yes',
                'default'      => 'no',
                'condition'    => [
                    'enable_slider' => 'yes',
                ],
            ]
        );
        $this->add_control(
            'item_show',
            [
                'label'     => esc_html__( 'slide To Show', 'restlycore' ),
                'type'      => \Elementor\Controls_Manager::NUMBER,
                'min'       => 1,
                'max'       => 6,
                'step'      => 1,
                'default'   => 3,
                'condition' => [
                    'enable_slider' => 'yes',
                ],
            ]
        );
        $this->add_control(
            'item_scroll',
            [
                'label'     => esc_html__( 'Slide TO Scroll', 'restlycore' ),
                'type'      => \Elementor\Controls_Manager::NUMBER,
                'min'       => 1,
                'max'       => 6,
                'step'      => 1,
                'default'   => 3,
                'condition' => [
                    'enable_slider' => 'yes',
                ],
            ]
        );
        $this->add_control(
            'restly_clsl_speed',
            [
                'label'     => esc_html__( 'Slide Speed', 'restlycore' ),
                'type'      => Controls_Manager::NUMBER,
                'min'       => 500,
                'max'       => 8000,
                'step'      => 10,
                'default'   => 4000,
                'condition' => array(
                    'enable_slider' => 'yes',
                    'restly_clsl_loop'                => 'yes',

                ),
            ]
        );
        $this->add_control(
            'restly_clsl_aloop',
            [
                'label'        => esc_html__( 'Enable Auto Loop ', 'restlycore' ),
                'type'         => Controls_Manager::SWITCHER,
                'label_on'     => esc_html__( 'On', 'restlycore' ),
                'label_off'    => esc_html__( 'Off', 'restlycore' ),
                'return_value' => 'yes',
                'default'      => 'no',
                'condition'    => [
                    'enable_slider' => 'yes',
                    'restly_clsl_loop' => 'yes',
                ],
            ]
        );
        $this->add_control(
            'restly_clsl_aspeed',
            [
                'label'     => esc_html__( 'Slide auto Speed', 'restlycore' ),
                'type'      => Controls_Manager::NUMBER,
                'min'       => 500,
                'max'       => 8000,
                'step'      => 50,
                'default'   => 3000,
                'condition' => array(
                    'restly_clsl_aloop'               => 'yes',
                    'restly_clsl_loop'                => 'yes',
                    'enable_slider' => 'yes',
                ),
            ]
        );
        $this->add_control(
            'enable_arrow',
            [
                'label'        => esc_html__( 'Enable Arrow ', 'restlycore' ),
                'type'         => Controls_Manager::SWITCHER,
                'label_on'     => esc_html__( 'On', 'restlycore' ),
                'label_off'    => esc_html__( 'Off', 'restlycore' ),
                'return_value' => 'yes',
                'default'      => 'yes',
                'condition'    => [
                    'enable_slider' => 'yes',
                ],
            ]
        );
        $this->add_responsive_control(
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
                    'enable_slider!' => 'yes',
                ],
            ]
        );
        $this->add_responsive_control(
            'ipadpro_col',
            [
                'label' => esc_html__( 'Columns On Ipad Pro', 'restlycore' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'col-lg-6',
                'options' => [
                    'col-lg-12'  => esc_html__( '1 Column', 'restlycore' ),
                    'col-lg-6'  => esc_html__( '2 Column', 'restlycore' ),
                    'col-lg-4'  => esc_html__( '3 Column', 'restlycore' ),
                    'col-lg-3'  => esc_html__( '4 Column', 'restlycore' ),
                ],
                'condition' => [
                    'enable_slider!' => 'yes',
                ],
            ]
        );
        $this->add_responsive_control(
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
                    'enable_slider!' => 'yes',
                ],
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
			'restly_box_style',
			[
				'label' => esc_html__( 'Box Style', 'restlycore' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
        $this->add_control(
            'box_aligment',
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
                'default' => 'center',
                'toggle' => true,
                'selectors' => [
                    '{{WRAPPER}} .restly-review-item' => 'text-align: {{VALUE}}',
                ],
            ]
        );
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'box_bg',
				'label' => esc_html__( 'Background', 'restlycore' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .restly-review-item',
			]
		);
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'box_border',
                'label' => esc_html__( 'Border', 'restlycore' ),
                'selector' => '{{WRAPPER}} .restly-review-item',
            ]
        );
        $this->add_responsive_control(
            'box_radius',
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
                    '{{WRAPPER}} .restly-review-item' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'box_shadow',
                'label' => esc_html__( 'Box Shadow', 'restlycore' ),
                'selector' => '{{WRAPPER}} .restly-review-item',
            ]
        );
        $this->add_responsive_control(
            'box_margin',
            [
                'label' => esc_html__( 'Margin', 'restlycore' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .restly-review-item' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .restly-review-item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();



        $this->start_controls_section(
            'image_style',
            [
                'label' => esc_html__( 'Image', 'restlycore' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_responsive_control(
            'image_width',
            [
                'label' => esc_html__( 'Width', 'restlycore' ),
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
                    '{{WRAPPER}} .review-logo img' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'image_height',
            [
                'label' => esc_html__( 'Height', 'restlycore' ),
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
                    '{{WRAPPER}} .review-logo img' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'object_fit',
            [
                'label' => esc_html__( 'Object Fit', 'restlycore' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'cover',
                'options' => [
                    'cover' => esc_html__( 'Cover', 'restlycore' ),
                    'contain' => esc_html__( 'Contain', 'restlycore' ),
                    'fill'  => esc_html__( 'Fill', 'restlycore' ),
                    'none' => esc_html__( 'None', 'restlycore' ),
                ],
                'selectors' => [
                    '{{WRAPPER}} .review-logo img' => 'object-fit: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'image_border',
                'label' => esc_html__( 'Border', 'restlycore' ),
                'selector' => '{{WRAPPER}} .review-logo img',
            ]
        );
        $this->add_responsive_control(
            'image_radius',
            [
                'label' => esc_html__( 'Border Radius', 'restlycore' ),
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
                    '{{WRAPPER}} .review-logo img' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'image_margin',
            [
                'label' => esc_html__( 'Margin', 'restlycore' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .review-logo' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'image_padding',
            [
                'label' => esc_html__( 'Padding', 'restlycore' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .review-logo' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'content_style',
            [
                'label' => esc_html__( 'Content Style', 'restlycore' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->start_controls_tabs(
            'content_tabs'
        );
        $this->start_controls_tab(
            'content_des',
            [
                'label' => __( 'Description', 'restlycore' ),
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'content_typo',
                'label' => esc_html__( 'Typography', 'restlycore' ),
                'selector' => '{{WRAPPER}} .review-des',
            ]
        );
        $this->add_responsive_control(
            'content_color',
            [
                'label' => esc_html__( 'Color', 'restlycore' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .review-des' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'content_margin',
            [
                'label' => esc_html__( 'Margin', 'restlycore' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .review-des' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'content_padding',
            [
                'label' => esc_html__( 'Padding', 'restlycore' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .review-des' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();
        
        $this->start_controls_tab(
            'rating_style',
            [
                'label' => __( 'Ration', 'restlycore' ),
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'rating_designation_typo',
                'selector' => '{{WRAPPER}} .review-rating i',
            ]
        );
        $this->add_responsive_control(
            'rating_color',
            [
                'label'     => esc_html__( 'Color', 'restlycore' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .review-rating i' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'rating_Margin',
            [
                'label'      => esc_html__( 'Margin', 'restlycore' ),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .review-rating i' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'rating_padding',
            [
                'label'      => esc_html__( 'Padding', 'restlycore' ),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .review-rating i' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();
   //==========================================//
        //=========== CONTENT STYLE START===========//
        //========================================//

        $this->start_controls_section(
			'arrow_content',
			[
				'label' => esc_html__( 'Arrow Style', 'restlycore' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
        $this->start_controls_tabs(
            'arrow_tabs'
        );
        $this->start_controls_tab(
            'arrow_normal_stylw',
            [
                'label' => esc_html__( 'Normal', 'restlycore' ),
            ]
        );
        $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'left_arrow_typography',
				'selector' => '{{WRAPPER}} .restly-review-wrapper button.slick-arrow',
			]
		);
        $this->add_responsive_control(
            'arrow_color',
            [
                'label'     => esc_html__( 'Color', 'restlycore' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .restly-review-wrapper button.slick-arrow' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'arrow_bg',
				'label' => esc_html__( 'Background', 'restlycore' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .restly-review-wrapper button.slick-arrow',
                'separator' => 'before',
			]
		);

        $this->add_responsive_control(
            'arrow_height',
            [
                'label'      => esc_html__( 'Height', 'restlycore' ),
                'type'       => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%', 'custom' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 150,
						'step' => 1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
                'selectors'  => [
                    '{{WRAPPER}} .restly-review-wrapper button.slick-arrow' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'arrow_width',
            [
                'label'      => esc_html__( 'width', 'restlycore' ),
                'type'       => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%', 'custom' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 150,
						'step' => 1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
                'selectors'  => [
                    '{{WRAPPER}} .restly-review-wrapper button.slick-arrow' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'arrow_border',
                'label' => esc_html__( 'Border', 'restlycore' ),
                'selector' => '{{WRAPPER}} .restly-review-wrapper button.slick-arrow',
            ]
        );
        $this->add_responsive_control(
            'arrow_border_radius',
            [
                'label'      => esc_html__( 'Border Radius', 'restlycore' ),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .restly-review-wrapper button.slick-arrow' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        ); 
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'arrow_box_shadow',
                'label' => esc_html__( 'Box Shadow', 'restlycore' ),
                'selector' => '{{WRAPPER}} .restly-review-wrapper button.slick-arrow',
            ]
        );
        $this->end_controls_tab();
        $this->start_controls_tab(
            'arrow_hover_tab',
            [
                'label' => esc_html__( 'Hover', 'restlycore' ),
            ]
        );
        $this->add_responsive_control(
            'arrow_color_hover',
            [
                'label'     => esc_html__( 'Color', 'restlycore' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .restly-review-wrapper button.slick-arrow:hover' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'arrow_bg_hover',
				'label' => esc_html__( 'Background', 'restlycore' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .restly-review-wrapper button.slick-arrow:hover',
                'separator' => 'before',
			]
		);
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'arrow_border_hover',
                'label' => esc_html__( 'Border', 'restlycore' ),
                'selector' => '{{WRAPPER}} .restly-review-wrapper button.slick-arrow:hover',
            ]
        );
        $this->add_responsive_control(
            'arrow_border_radius_hover',
            [
                'label'      => esc_html__( 'Border Radius', 'restlycore' ),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .restly-review-wrapper button.slick-arrow:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        ); 
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'arrow_box_shadow_hover',
                'label' => esc_html__( 'Box Shadow', 'restlycore' ),
                'selector' => '{{WRAPPER}} .restly-review-wrapper button.slick-arrow:hover',
            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();
		$this->add_responsive_control(
            'arrow_Margin',
            [
                'label'      => esc_html__( 'Margin', 'restlycore' ),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .restly-review-wrapper button.slick-arrow' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'arrow_padding',
            [
                'label'      => esc_html__( 'Padding', 'restlycore' ),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .restly-review-wrapper button.slick-arrow' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();
    }
    //Render
    protected function rating_render($value = '') {
        $ratefull = '<i class="bi bi-star-fill"></i>';
        $ratehalf = '<i class="bi bi-star-half"></i>';
        $rateO = '<i class="bi bi-star"></i>';

        if ($value > 4.75) {
            return $ratefull . $ratefull . $ratefull . $ratefull . $ratefull;
        } elseif ($value <= 4.75 && $value > 4.25) {
            return $ratefull . $ratefull . $ratefull . $ratefull . $ratehalf;
        } elseif ($value <= 4.25 && $value > 3.75) {
            return $ratefull . $ratefull . $ratefull . $ratefull . $rateO;
        } elseif ($value <= 3.75 && $value > 3.25) {
            return $ratefull . $ratefull . $ratefull . $ratehalf . $rateO;
        } elseif ($value <= 3.25 && $value > 2.75) {
            return $ratefull . $ratefull . $ratefull . $rateO . $rateO;
        } elseif ($value <= 2.75 && $value > 2.25) {
            return $ratefull . $ratefull . $ratehalf . $rateO . $rateO;
        } elseif ($value <= 2.25 && $value > 1.75) {
            return $ratefull . $ratefull . $rateO . $rateO . $rateO;
        } elseif ($value <= 1.75 && $value > 1.25) {
            return $ratefull . $ratehalf . $rateO . $rateO . $rateO;
        } elseif ($value <= 1.25) {
            return $ratefull . $rateO . $rateO . $rateO . $rateO;
        }
    }
    protected function render() {
        $settings = $this->get_settings_for_display();
        $dynamic_id = rand(1241, 3256);
        if($settings['enable_slider'] == 'yes' ){
			if($settings['restly_clsl_aloop'] == 'yes' ){
				$aloop = 'true';
			}else{
				$aloop = 'false';
			}
			if($settings['restly_clsl_loop'] == 'yes' ){
				$loop = 'true';
			}else{
				$loop = 'false';
			}
            $column = 'review-slide-box';
            if(is_rtl()){
                $rtl = 'true';
            }else{
                $rtl = 'false';
            }
            echo '
			<script>
			jQuery(document).ready(function($) {
				"use strict";
				$(".slide-'.esc_attr($dynamic_id).'").slick({
					slidesToShow: ' . json_encode( $settings['item_show'] ) . ',
                    slidesToScroll: '. json_encode( $settings['item_scroll'] ) .',
                    arrows:' . json_encode( $settings['enable_arrow'] == 'yes' ? true : false ) . ',
                    rtl: '.esc_attr($rtl).',
					infinite: '.esc_attr($loop).',
					autoplay: '.esc_attr($aloop).',';
					if($aloop == 'true'){
					echo 'speed: '.esc_attr($settings['restly_clsl_speed']).',';
					}
					if($aloop == 'true'){
					echo 'autoplaySpeed: '.esc_attr($settings['restly_clsl_aspeed']).',';
					}
					echo '
					responsive: [
						{
						breakpoint: 991,
							settings: {
								arrows: false,
                                slidesToShow: 2,
								slidesToScroll: 2
							}
						},
						{
							breakpoint: 767,
							settings: {
								slidesToShow: 1,
								slidesToScroll: 1
							}
						},
						{
							breakpoint: 500,
							settings: {
								slidesToShow: 1,
								slidesToScroll: 1
							}
						},
					]
				});
			});
			</script>';
        }else{
            $column = $settings['desktop_col'] . ' ' . $settings['ipadpro_col'] . ' ' . $settings['tab_col'];
        }
        ob_start();
        ?>
        <div class="restly-review-wrapper">
            <div class="container">
                <div class="row slide-<?php echo esc_attr($dynamic_id); ?>">
                    <?php foreach($settings['review'] as $review) : ?>
                        <div class="<?php echo esc_attr( $column ); ?>">
                            <div class="restly-review-item ">
                                <div class="review-logo"><?php echo wp_get_attachment_image( $review['logo']['id'], 'full' );?></div>
                                <div class="review-des"> <?php echo esc_html($review['description'])?></div>
                                <?php if( $review["elable_rating"] == 'yes' ): ?>
                                    <div class="review-rating">
                                        <?php echo $this->rating_render($review['rating']['size']); ?>
                                    </div> 
                                <?php endif?>   
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        
        <?php
        echo ob_get_clean();
    }
}
Plugin::instance()->widgets_manager->register( new restly_review_widget );