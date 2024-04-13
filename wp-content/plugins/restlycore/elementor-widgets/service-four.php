<?php namespace Elementor;

class restly_service_four_widget extends Widget_Base {

    public function get_name() {

        return 'restly_service_four';
    }

    public function get_title() {
        return esc_html__( 'Restly Service V4', 'restlycore' );
    }

    public function get_icon() {

        return 'eicon-testimonial-carousel';
    }

    public function get_categories() {
        return ['restly'];
    }

    protected function register_controls() {
        //Content tab start

        $this->start_controls_section(
            'restly_service_content',
            [
                'label' => esc_html__( 'Restly Service V4', 'restlycore' ),
                'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
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
			'enable_title_link',
			[
				'label' => esc_html__( 'Enable Title Link', 'restlycore' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'restlycore' ),
				'label_off' => esc_html__( 'Hide', 'restlycore' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);
        $repeater->add_control(
            'title_link',
            [
                'label'       => esc_html__( 'Title Link', 'restlycore' ),
                'type'        => \Elementor\Controls_Manager::URL,
                'options'     => ['url', 'is_external', 'nofollow'],
                'label_block' => true,
                'condition' => [
                    'enable_title_link' => 'yes',
                ],
                'default'     => [
                    'url'         => '',
                    'is_external' => true,
                    'nofollow'    => true,
                ],
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
                'type'        => \Elementor\Controls_Manager::TEXTAREA,
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
						'title' => esc_html__( 'Email Marketing', 'restlycore' ),
						'Description' => esc_html__( 'Start by building a permission-based email list of.', 'restlycore' ),
					],
                    [
						'title' => esc_html__( 'Content Marketing', 'restlycore' ),
						'Description' => esc_html__( 'Start by building a permission-based email list of.', 'restlycore' ),
					],
                    [
						'title' => esc_html__( 'Website Development', 'restlycore' ),
						'Description' => esc_html__( 'Start by building a permission-based email critical.', 'restlycore' ),
					],
                    [
						'title' => esc_html__( 'Competitive Analysis', 'restlycore' ),
						'Description' => esc_html__( 'EncryptionStart by building a permission-based email', 'restlycore' ),
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
                'default' => 'col-xl-3',
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
					'{{WRAPPER}} .service-style-four-box' => 'text-align: {{VALUE}};',
				],
			]
		);
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name'     => 'box_backgrounds',
                'label'    => esc_html__( 'Background', 'restlycore' ),
                'types'    => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .service-style-four-box',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'box_border',
                'label'    => esc_html__( 'Border', 'restlycore' ),
                'selector' => '{{WRAPPER}} .service-style-four-box',
            ]
        );
        $this->add_responsive_control(
            'services_border_radius',
            [
                'label'      => esc_html__( 'Border Radius', 'restlycore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .service-style-four-box' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name'     => 'box_shadow',
                'label'    => esc_html__( 'Box Shadow', 'restlycore' ),
                'selector' => '{{WRAPPER}} .service-style-four-box',
            ]
        );
        $this->add_responsive_control(
            'box_margin',
            [
                'label'      => esc_html__( 'Margin', 'restlycore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .service-style-four-box' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .service-style-four-box' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                'selector' => '{{WRAPPER}} .service-style-four-box:hover',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name'     => 'box_shadow_hover',
                'label'    => esc_html__( 'Box Shadow', 'restlycore' ),
                'selector' => '{{WRAPPER}} .service-style-four-box:hover',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'box_border_hover',
                'label'    => esc_html__( 'Border', 'restlycore' ),
                'selector' => '{{WRAPPER}} .service-style-four-box:hover',
            ]
        );

        $this->add_responsive_control(
            'border_radius_hover',
            [
                'label'      => esc_html__( 'Border Radius', 'restlycore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .service-style-four-box:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .service-style-four-icon' => 'width: {{SIZE}}{{UNIT}};',
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
                    '{{WRAPPER}} .service-style-four-icon' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );  
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'icon_typo',
                'selector' => '{{WRAPPER}} .service-style-four-icon',
            ]
        );
        $this->add_responsive_control(
            'services_icon_color',
            [
                'label'     => esc_html__( 'Icon Color', 'restlycore' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .service-style-four-icon' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'services_icon_color_hover',
            [
                'label'     => esc_html__( 'Icon Hover Color', 'restlycore' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .service-style-four-box:hover .service-style-four-icon' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name'     => 'icon_bg',
                'label'    => esc_html__( 'Icon Background', 'restlycore' ),
                'types'    => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .service-style-four-icon',
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
                'selector' => '{{WRAPPER}} .service-style-four-box:hover .service-style-four-icon',
                'separator' => 'after',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'icon_border',
                'label'    => esc_html__( 'Border', 'restlycore' ),
                'selector' => '{{WRAPPER}} .service-style-four-icon',
            ]
        );
        $this->add_responsive_control(
            'icon_border_redius',
            [
                'label'      => esc_html__( 'Border Redius', 'restlycore' ),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .service-style-four-icon' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .service-style-four-icon svg' => 'width: {{SIZE}}{{UNIT}};',
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
                    '{{WRAPPER}} .service-style-four-icon svg' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );  
		 $this->add_responsive_control(
            'services_svg_color_hover',
            [
                'label'     => esc_html__( 'Icon Hover Color', 'restlycore' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .service-style-four-box:hover .service-style-four-icon svg path ' => 'fill: {{VALUE}}',
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
                    '{{WRAPPER}} .service-style-four-icon' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .service-style-four-icon' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                'selector' => '{{WRAPPER}} .service-style-four-title',
            ]
        );
        $this->add_responsive_control(
            'title_color',
            [
                'label'     => esc_html__( 'Color', 'restlycore' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .service-style-four-title' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .service-style-four-title a' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'title_color_hover',
            [
                'label'     => esc_html__( 'Hover Color', 'restlycore' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .service-style-four-box:hover .service-style-four-title' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .service-style-four-box:hover .service-style-four-title a' => 'color: {{VALUE}}',
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
                    '{{WRAPPER}} .service-style-four-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .service-style-four-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_tab();
        // ===================== DECRIPTION STYLE====================
        $this->start_controls_tab(  
            'service_content_heading',
            [
                'label' => esc_html__( 'Decription', 'restlycore' ),
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'dec_typography',
                'selector' => '{{WRAPPER}} .service-style-four-des',
            ]
        );

        $this->add_responsive_control(
            'dec_color',
            [
                'label'     => esc_html__( 'Title Color', 'restlycore' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .service-style-four-des' => 'color: {{VALUE}}',
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
                    '{{WRAPPER}} .service-style-four-des' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .service-style-four-des' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .services-btn' => 'width: {{SIZE}}{{UNIT}};',
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
                    '{{WRAPPER}} .services-btn' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );  
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'btn_typo',
                'selector' => '{{WRAPPER}} .services-btn',
            ]
        );
        $this->add_responsive_control(
            'btn_color',
            [
                'label'     => esc_html__( 'Color', 'restlycore' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .services-btn' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name'     => 'btn_bg',
                'label'    => esc_html__( 'Background', 'restlycore' ),
                'types'    => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .services-btn',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'btn_border',
                'label'    => esc_html__( 'Border', 'restlycore' ),
                'selector' => '{{WRAPPER}} .services-btn',
            ]
        );
        $this->add_responsive_control(
            'btn_border_radius',
            [
                'label'      => esc_html__( 'Border Radius', 'restlycore' ),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .services-btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Text_Shadow::get_type(),
            [
                'name'     => 'btn_shadow',
                'label'    => esc_html__( 'Box Shadow', 'restlycore' ),
                'selector' => '{{WRAPPER}} .services-btn',
            ]
        );
        $this->add_responsive_control(
            'btn_Margin',
            [
                'label'      => esc_html__( 'Margin', 'restlycore' ),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .services-btn' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .services-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                'selector' => '{{WRAPPER}} .service-style-four-box:hover .services-btn',
            ]
        );
        $this->add_responsive_control(
            'btn_color_hover',
            [
                'label'     => esc_html__( 'Color', 'restlycore' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .service-style-four-box:hover .services-btn' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name'     => 'btn_bg_hover',
                'label'    => esc_html__( 'Background', 'restlycore' ),
                'types'    => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .service-style-four-box:hover .services-btn',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Text_Shadow::get_type(),
            [
                'name'     => 'btn_shadow_hover',
                'label'    => esc_html__( 'Box Shadow', 'restlycore' ),
                'selector' => '{{WRAPPER}} .service-style-four-box:hover .services-btn',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'btn_border_hover',
                'label'    => esc_html__( 'Border', 'restlycore' ),
                'selector' => '{{WRAPPER}} .service-style-four-box:hover .services-btn',
            ]
        );
        $this->add_responsive_control(
            'btn_border_radius_hover',
            [
                'label'      => esc_html__( 'Border Radius', 'restlycore' ),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .service-style-four-box:hover .services-btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();
        $this->start_controls_section(
            'image_style',
            [
                'label' => esc_html__( 'Image Style ', 'restlycore' ),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
                'condition' => [
                    'select_style' => 'two',
                ]
            ]
        );
        $this->add_responsive_control(
            'image_height',
            [
                'label' => esc_html__( 'image Height', 'restlycore' ),
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
                    '{{WRAPPER}} .service_three-image img' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'image_width',
            [
                'label' => esc_html__( 'Image Width', 'restlycore' ),
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
                    '{{WRAPPER}} .service_three-image img' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'image_object',
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
                    '{{WRAPPER}} .service_three-image img' => 'object-fit: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'image_border',
                'label'    => esc_html__( 'Border', 'restlycore' ),
                'selector' => '{{WRAPPER}} .service_three-image img',
            ]
        );
        $this->add_responsive_control(
            'image_border_radius',
            [
                'label'      => esc_html__( 'Border Radius', 'restlycore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .service_three-image img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .service_three-image' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .service_three-image' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
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
        <div class="service-style-four-wrapper">
            <div class="<?php echo esc_attr($container)?>">
                <div class="row">
                    <?php foreach ( $settings['repeter_list'] as $item ): ?>
                        <div class="<?php echo esc_attr($column); ?> ">
                            <div class="service-style-four-box ">
                                <div class="service-style-four-icon ">
                                    <?php \Elementor\Icons_Manager::render_icon( $item['icon'], ['aria-hidden' => 'true'] );?>
                                </div>
                                <div class="service-style-four-content">
                                    <h6 class="service-style-four-title"> 
                                        <?php if( $item['enable_title_link'] == 'yes' ):
                                            $url      = $item['title_link']['url'];
                                            $target   = $item['title_link']['is_external'] ? ' target="_blank"' : '';
                                            $nofollow = $item['title_link']['nofollow'] ? ' rel="nofollow"' : '';
                                        ?>
                                        <a href="<?php echo esc_url($url); ?>" <?php echo $target . $nofollow;?>><?php endif;?>
                                        <?php echo esc_html( $item['title'] ); ?>
                                        <?php if( $item['enable_title_link'] == 'yes' ):?></a><?php endif;?>
                                    </h6>
                                    <div class="service-style-four-des">
                                        <?php echo esc_html( $item['Description'] ); ?>
                                    </div>    
                                </div>
                                <?php if( $item['enable_button'] == 'yes' ):
                                    $burl      = $item['link']['url'];
                                    $btarget   = $item['link']['is_external'] ? ' target="_blank"' : '';
                                    $bnofollow = $item['link']['nofollow'] ? ' rel="nofollow"' : '';
                                    ?>
                                    <div class="service-style-four-btn">
                                        <a href="<?php echo esc_url($burl); ?>" class="service-style-four-btns">
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
Plugin::instance()->widgets_manager->register( new restly_service_four_widget );