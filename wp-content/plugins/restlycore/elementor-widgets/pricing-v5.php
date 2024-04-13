<?php namespace Elementor;

class pricing_five_widget extends Widget_Base {

    public function get_name() {

        return 'pricing_five';
    }

    public function get_title() {
        return esc_html__( 'Restly Pricing V5', 'restlycore' );
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
            'restly_pricing_table_options',
            [
                'label' => esc_html__( 'Pricing V5', 'restlycore' ),
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
                    'value'   => 'fas fa-university',
                    'library' => 'fa-solid',
                ],
            ]
        );
        $repeater->add_control(
            'title',
            [
                'label'       => esc_html__( 'Title', 'restlycore' ),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__( 'IT Management Service', 'restlycore' ),
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'Description',
            [
                'label'       => esc_html__( 'Description', 'restlycore' ),
                'type'        => \Elementor\Controls_Manager::TEXTAREA,
                'default'     => esc_html__( 'Developing a comprehensive IT strategy that aligns.', 'restlycore' ),
                'label_block' => true,
            ]
        );
         $repeater->add_control(
            'future',
            [
                'label'       => esc_html__( 'Future', 'restlycore' ),
                'type'        => \Elementor\Controls_Manager::WYSIWYG,
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'price',
            [
                'label' => esc_html__( 'Price', 'restlycore' ),
                'type' => \Elementor\Controls_Manager::TEXT,
            ]
        );
        $repeater->add_control(
            'curency',
            [
                'label' => esc_html__( 'Currency', 'restlycore' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( '$', 'restlycore' ),
            ]
        );
        $repeater->add_control(
            'time',
            [
                'label' => esc_html__( 'Time', 'restlycore' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( '/monthly', 'restlycore' ),
            ]
        );
        $repeater->add_control(
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
        $repeater->add_control(
            'button_text',
            [
                'label'       => esc_html__( 'Text', 'restlycore' ),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__( 'Read More', 'restlycore' ),
                'label_block' => true,
            ]
        );
        $repeater->add_control(
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
        $repeater->add_control(
            'link',
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
            'repeter_list',
            [
                'label'       => esc_html__( 'Repeater List', 'restlycore' ),
                'type'        => \Elementor\Controls_Manager::REPEATER,
                'fields'      => $repeater->get_controls(),
				'default' => [
					[
						'title' => esc_html__( 'Cloud Hosting', 'restlycore' ),
						'price' => esc_html__( '39.99', 'restlycore' ),
					],
                    [
						'title' => esc_html__( 'VPS Hosting', 'restlycore' ),
						'price' => esc_html__( '49.99', 'restlycore' ),
					],
                    [
						'title' => esc_html__( 'Shared Hosting', 'restlycore' ),
						'price' => esc_html__( '59.99', 'restlycore' ),
					],
				],
                'title_field' => '{{{ title }}}',
            ]
        );
        $this->add_control(
			'service_more_options',
			[
				'label' => esc_html__( 'Necessary Options', 'restlycore' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
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
        $this->add_responsive_control(
            'desktop_col',
            [
                'label' => esc_html__( 'Columns On Desktop', 'restlycore' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'col-xl-4',
                'options' => [
                    'col-xl-12'  => esc_html__( '1 Column', 'restlycore' ),
                    'col-xl-6'  => esc_html__( '2 Column', 'restlycore' ),
                    'col-xl-4'  => esc_html__( '3 Column', 'restlycore' ),
                    'col-xl-3'  => esc_html__( '4 Column', 'restlycore' ),
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
            ]
        );
        $this->end_controls_section();

        //========================================//
        //========= SERVICE BOX style Start==========//
        //========================================//

        $this->start_controls_section(
            'services_box',
            [
                'label' => esc_html__( 'Content Box', 'restlycore' ),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->start_controls_tabs(
            'services_section_tabs'
        );
        $this->start_controls_tab(
            'services_section_normal_tab',
            [
                'label' => esc_html__( 'Normal', 'restlycore' ),
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
					'{{WRAPPER}} .pricing-five-item-box' => 'text-align: {{VALUE}};',
				],
			]
		);
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name'     => 'box_backgrounds',
                'label'    => esc_html__( 'Background', 'restlycore' ),
                'types'    => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .pricing-five-item-box',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'box_border',
                'label'    => esc_html__( 'Border', 'restlycore' ),
                'selector' => '{{WRAPPER}} .pricing-five-item-box',
            ]
        );
        $this->add_responsive_control(
            'services_border_radius',
            [
                'label'      => esc_html__( 'Border Radius', 'restlycore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .pricing-five-item-box' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name'     => 'box_shadow',
                'label'    => esc_html__( 'Box Shadow', 'restlycore' ),
                'selector' => '{{WRAPPER}} .pricing-five-item-box',
            ]
        );
        $this->add_responsive_control(
            'box_margin',
            [
                'label'      => esc_html__( 'Margin', 'restlycore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .pricing-five-item-box' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .pricing-five-item-box' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                'name'     => 'box_backgrounds_hover',
                'label'    => esc_html__( 'Background', 'restlycore' ),
                'types'    => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .pricing-five-item-box:hover',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name'     => 'box_shadow_hover',
                'label'    => esc_html__( 'Box Shadow', 'restlycore' ),
                'selector' => '{{WRAPPER}} .pricing-five-item-box:hover',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'box_border_hover',
                'label'    => esc_html__( 'Border', 'restlycore' ),
                'selector' => '{{WRAPPER}} .pricing-five-item-box:hover',
            ]
        );

        $this->add_responsive_control(
            'border_radius_hover',
            [
                'label'      => esc_html__( 'Border Radius', 'restlycore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .pricing-five-item-box:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();

        //========================================//
        //======= SERVICE ICON STYLE START=====//
        //========================================//
        $this->start_controls_section(
            'icon_Style',
            [
                'label' => esc_html__( 'Icon Style', 'restlycore' ),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
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
                        'max' => 200,
                        'step' => 1,
                    ]
                ],
                'selectors' => [
                    '{{WRAPPER}} .pricing-five-icon' => 'width: {{SIZE}}{{UNIT}};',
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
                        'max' => 200,
                        'step' => 1,
                    ]
                ],
                'selectors' => [
                    '{{WRAPPER}} .pricing-five-icon' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );  
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'icon_typo',
                'selector' => '{{WRAPPER}} .pricing-five-icon',
            ]
        );
        $this->add_responsive_control(
            'services_icon_color',
            [
                'label'     => esc_html__( 'Icon Color', 'restlycore' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pricing-five-icon' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'services_icon_color_hover',
            [
                'label'     => esc_html__( 'Icon Hover Color', 'restlycore' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pricing-five-item-box:hover .pricing-five-icon' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name'     => 'icon_bg',
                'label'    => esc_html__( 'Icon Background', 'restlycore' ),
                'types'    => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .pricing-five-icon',
            ]
        );
        $this->add_control(
			'more_options',
			[
				'label' => esc_html__( 'Backgroun Hover Color', 'restlycore' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name'     => 'icon_bg_hover',
                'label'    => esc_html__( 'Icon Background Hover', 'restlycore' ),
                'types'    => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .pricing-five-item-box:hover .pricing-five-icon',
                'separator' => 'after',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'icon_border',
                'label'    => esc_html__( 'Border', 'restlycore' ),
                'selector' => '{{WRAPPER}} .pricing-five-icon',
            ]
        );
        $this->add_responsive_control(
            'icon_border_redius',
            [
                'label'      => esc_html__( 'Border Redius', 'restlycore' ),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .pricing-five-icon' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
            'restly_svg_width',
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
                    '{{WRAPPER}} .pricing-five-icon svg' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'restly_svg_height',
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
                    '{{WRAPPER}} .pricing-five-icon svg' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );  
		 $this->add_responsive_control(
            'services_svg_color_hover',
            [
                'label'     => esc_html__( 'Icon Hover Color', 'restlycore' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pricing-five-item-box:hover .pricing-five-icon svg path ' => 'fill: {{VALUE}}',
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
                    '{{WRAPPER}} .pricing-five-icon' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .pricing-five-icon' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();

        // ===================================================
        // ============== CONTENT STYLE ======================
        // ===================================================

        $this->start_controls_section(
            'services_content',
            [
                'label' => esc_html__( 'Content Style', 'restlycore' ),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->start_controls_tabs( 'restly_Content_tabs' );
        $this->start_controls_tab(  //service section Title style start
            'services_title_normal_tab',
            [
                'label' => esc_html__( 'Title', 'restlycore' ),
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'title_typography',
                'selector' => '{{WRAPPER}} .pricing-five-title',
            ]
        );
        $this->add_responsive_control(
            'title_color',
            [
                'label'     => esc_html__( 'Color', 'restlycore' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pricing-five-title' => 'color: {{VALUE}}',
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
                    '{{WRAPPER}} .pricing-five-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'title_padding',
            [
                'label'      => esc_html__( 'Padding', 'restlycore' ),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .pricing-five-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_tab();
        // ===================== DECRIPTION STYLE====================
        $this->start_controls_tab(  
            'pricing_des_content_heading',
            [
                'label' => esc_html__( 'Decription', 'restlycore' ),
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'dec_typography',
                'selector' => '{{WRAPPER}} .pricing-five-description',
            ]
        );

        $this->add_responsive_control(
            'dec_color',
            [
                'label'     => esc_html__( 'Title Color', 'restlycore' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pricing-five-description' => 'color: {{VALUE}}',
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
                    '{{WRAPPER}} .pricing-five-description' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'dec_padding',
            [
                'label'      => esc_html__( 'Padding', 'restlycore' ),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .pricing-five-description' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_tab();
            // ===================== DECRIPTION STYLE====================
            $this->start_controls_tab(  
            'pricing_list_heading',
            [
                'label' => esc_html__( 'List', 'restlycore' ),
            ]
        );
        $this->add_responsive_control(
            'list_gap',
            [
                'label' => esc_html__( 'Gap', 'restlycore' ),
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
                    '{{WRAPPER}} .pricing-five-future ul li:not(:last-child)' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'list_typography',
                'selector' => '{{WRAPPER}} .pricing-five-future ul li',
            ]
        );

        $this->add_responsive_control(
            'list_color',
            [
                'label'     => esc_html__( 'Title Color', 'restlycore' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pricing-five-future ul li' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'list_margin',
            [
                'label'      => esc_html__( 'Margin', 'restlycore' ),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .pricing-five-future' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'list_padding',
            [
                'label'      => esc_html__( 'Padding', 'restlycore' ),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .pricing-five-future' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();

        $this->start_controls_section(
            'pricing_item_option',
            [
                'label' => esc_html__( 'Pricing Option Style', 'restlycore' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->start_controls_tabs(
            'restly_pricing_header_itabs'
        );
        
        $this->start_controls_tab(
            'restly_pricing_header_price_tab',
            [
                'label' => __( 'Price', 'restlycore' ),
            ]
        );
        $this->add_responsive_control(
            'restly_pricing_header_price_color',
            [
                'label' => esc_html__( 'Price Color', 'restlycore' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pricing-five-amount' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'restly_pricing_header_price_typo',
                'label' => esc_html__( 'Typography', 'restlycore' ),
                'selector' => '{{WRAPPER}} .pricing-five-amount',
            ]
        );
        $this->add_responsive_control(
            'restly_pricing_header_price_margin',
            [
                'label' => esc_html__( 'Margin', 'restlycore' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .pricing-five-amount' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'restly_pricing_header_price_padding',
            [
                'label' => esc_html__( 'Padding', 'restlycore' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .pricing-five-amount' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'restly_pricing_currency_note',
            [
                'label' => __( 'Currency CSS Options', 'restlycore' ),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_responsive_control(
            'restly_pricing_header_currency_color',
            [
                'label' => esc_html__( 'Price Color', 'restlycore' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pricing-five-symble' => 'color: {{VALUE}}',
                ],
            ]
        );
       
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'restly_pricing_header_currency_typo',
                'label' => esc_html__( 'Typography', 'restlycore' ),
                'selector' => '{{WRAPPER}} .pricing-five-symble',
            ]
        );
        $this->end_controls_tab();

        $this->start_controls_tab(
            'restly_pricing_header_time_tab',
            [
                'label' => __( 'Time', 'restlycore' ),
            ]
        );
        $this->add_responsive_control(
            'restly_pricing_header_time_color',
            [
                'label' => esc_html__( 'Color', 'restlycore' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pricing-five-month' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'restly_pricing_header_time_typo',
                'label' => esc_html__( 'Typography', 'restlycore' ),
                'selector' => '{{WRAPPER}} .pricing-five-month',
            ]
        );
        $this->add_responsive_control(
            'restly_pricing_header_time_margin',
            [
                'label' => esc_html__( 'Margin', 'restlycore' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .pricing-five-month' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'restly_pricing_header_time_padding',
            [
                'label' => esc_html__( 'Padding', 'restlycore' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .pricing-five-month' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();
        //  =============================================//
        //  ========= BUTTON  STYLE START ========//
        // =============================================//

       
        $this->start_controls_section(
            'btn_style',
            [
                'label' => esc_html__( 'Button Style ', 'restlycore' ),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->start_controls_tabs(
            'btn_tabs'
        );

        $this->start_controls_tab(
            'btn_normal_tab',
            [
                'label' => esc_html__( 'Normal', 'restlycore' ),
            ]
        );
        $this->add_responsive_control(
            'btn_width',
            [
                'label' => esc_html__( 'Iocn Width', 'restlycore'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%', 'custom' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 150,
						'step' => 5,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
                'selectors' => [
                    '{{WRAPPER}} .pricing-btns' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'btn_height',
            [
                'label' => esc_html__( 'Icon Height', 'restlycore'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%', 'custom' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 150,
						'step' => 5,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
                'selectors' => [
                    '{{WRAPPER}} .pricing-btns' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );  
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'btn_typo',
                'selector' => '{{WRAPPER}} .pricing-btns',
            ]
        );
        $this->add_responsive_control(
            'btn_color',
            [
                'label'     => esc_html__( 'Color', 'restlycore' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pricing-btns' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name'     => 'btn_bg',
                'label'    => esc_html__( 'Background', 'restlycore' ),
                'types'    => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .pricing-btns',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'btn_border',
                'label'    => esc_html__( 'Border', 'restlycore' ),
                'selector' => '{{WRAPPER}} .pricing-btns',
            ]
        );
        $this->add_responsive_control(
            'btn_border_radius',
            [
                'label'      => esc_html__( 'Border Radius', 'restlycore' ),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .pricing-btns' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Text_Shadow::get_type(),
            [
                'name'     => 'btn_shadow',
                'label'    => esc_html__( 'Box Shadow', 'restlycore' ),
                'selector' => '{{WRAPPER}} .pricing-btns',
            ]
        );
        $this->add_responsive_control(
            'btn_Margin',
            [
                'label'      => esc_html__( 'Margin', 'restlycore' ),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .pricing-btns' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'btn_padding',
            [
                'label'      => esc_html__( 'Padding', 'restlycore' ),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .pricing-btns' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'btn_tab_hover',
            [
                'label' => esc_html__( 'Hover', 'restlycore' ),
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'btn_typo_hover',
                'selector' => '{{WRAPPER}} .pricing-btns:hover',
            ]
        );
        $this->add_responsive_control(
            'btn_color_hover',
            [
                'label'     => esc_html__( 'Color', 'restlycore' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pricing-btns:hover' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name'     => 'btn_bg_hover',
                'label'    => esc_html__( 'Background', 'restlycore' ),
                'types'    => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .pricing-btns:hover',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Text_Shadow::get_type(),
            [
                'name'     => 'btn_shadow_hover',
                'label'    => esc_html__( 'Box Shadow', 'restlycore' ),
                'selector' => '{{WRAPPER}} .pricing-btns:hover',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'btn_border_hover',
                'label'    => esc_html__( 'Border', 'restlycore' ),
                'selector' => '{{WRAPPER}} .pricing-btns:hover',
            ]
        );
        $this->add_responsive_control(
            'btn_border_radius_hover',
            [
                'label'      => esc_html__( 'Border Radius', 'restlycore' ),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .pricing-btns:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
		   $column = $settings['desktop_col'] . ' ' . $settings['ipadpro_col'] . ' ' . $settings['tab_col'];
           if( $settings['enable_container'] == 'yes' ){
            $container = 'container';
        }else{
            $container = 'container-fluid';
        }
        ob_start();

        ?>
        <div class="pricing-five-section-wrapper">
            <div class="<?php echo esc_attr($container)?>">
                <div class="row">
                    <?php foreach ( $settings['repeter_list'] as $item ): ?>
                        <div class="<?php echo esc_attr($column); ?> ">
                            <div class="pricing-five-item-box ">
                                <div class="pricing-five-icon ">
                                    <?php \Elementor\Icons_Manager::render_icon( $item['icon'], ['aria-hidden' => 'true'] );?>
                                </div>
                                <h6 class="pricing-five-title"> <?php echo esc_html( $item['title'] ); ?> </h6>
                                <div class="pricing-five-description"> <?php echo esc_html( $item['Description'] ); ?> </div>  
                                <div class="pricing-five-future"> <?php echo wp_kses_post( $item['future'] ); ?> </div>  
                                <h2 class="pricing-five-amount">
                                    <sup class="pricing-five-symble"><?php echo esc_html( $item['curency'] ); ?></sup><?php echo esc_html( $item['price'] ); ?>
                                    <span class="pricing-five-month"><?php echo esc_html( $item['time'] ); ?></span>
                                </h2>
                
                                <?php if( $item['enable_button'] == 'yes' ):
                                    $burl      = $item['link']['url'];
                                    $btarget   = $item['link']['is_external'] ? ' target="_blank"' : '';
                                    $bnofollow = $item['link']['nofollow'] ? ' rel="nofollow"' : '';
                                    ?>
                                    <div class="pricing-five-btn">
                                        <a href="<?php echo esc_url($burl); ?>" class="pricing-btns">
                                            <?php echo esc_html( $item['button_text'] ); ?> 
                                            <?php \Elementor\Icons_Manager::render_icon( $item['btn_icon'], ['aria-hidden' => 'true'] );?>
                                        </a>
                                    </div>
                                <?php endif;?>
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
Plugin::instance()->widgets_manager->register( new pricing_five_widget );