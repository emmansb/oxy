<?php namespace Elementor;

class restly_tabs_v2_Widget extends Widget_Base {

    public function get_name() {

        return 'restly_tabs_two';
    }

    public function get_title() {
        return esc_html__( 'Restly Tabs', 'restlycore' );
    }

    public function get_icon() {

        return 'eicon-tabs';
    }

    public function get_categories() {
        return ['restly'];
    }
    /**
     * Elementor Templates List
     * return array
     */
    public function restly_elementor_template() {
        $templates = Plugin::instance()->templates_manager->get_source( 'local' )->get_items();
        $types     = array();
        if ( empty( $templates ) ) {
            $template_lists = [ '0' => __( 'Do not Saved Templates.', 'restlycore' ) ];
        } else {
            $template_lists = [ '0' => __( 'Select Template', 'restlycore' ) ];
            foreach ( $templates as $template ) {
                $template_lists[ $template['template_id'] ] = $template['title'] . ' (' . $template['type'] . ')';
            }
        }
        return $template_lists;
    }
    protected function register_controls() {

        //Content tab start
        $this->start_controls_section(
            'restly_tabs_options',
            [
                'label' => esc_html__( 'Restly Tabs Widget', 'restlycore' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );
        $repeater = new \Elementor\Repeater();
        $repeater->add_control(
            'restly_tabs_active',
            [
                'label' => esc_html__( 'Active', 'restlycore' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Show', 'restlycore' ),
                'label_off' => esc_html__( 'Hide', 'restlycore' ),
                'return_value' => 'yes',
                'default' => 'no',
            ]
        );
        $repeater->add_control(
            'restly_tabs_title',
            [
                'label' => esc_html__( 'Title', 'restlycore' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Digital Marketing', 'restlycore' ),
            ]
        );
        $repeater->add_responsive_control(
            'restly_tabs_content_source',
            [
                'label' => esc_html__( 'Content Source', 'restlycore' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'custom',
                'options' => [
                    'custom'  => esc_html__( 'Content', 'restlycore' ),
                    'elementor' => esc_html__( 'Template', 'restlycore' ),
                ],
                'separator' => 'before',
            ]
        );
        $repeater->add_control(
            'template_id',
            [
                'label'     => __( 'Content', 'restlycore' ),
                'type'      => Controls_Manager::SELECT,
                'default'   => '0',
                'options'   => $this->restly_elementor_template(),
                'condition' => [
                    'restly_tabs_content_source' => "elementor"
                ],
                'separator' => 'before',
            ]
        );
        $repeater->add_control(
            'title',
            [
                'label'      => __( 'Content', 'restlycore' ),
                'type'       => Controls_Manager::TEXTAREA,
                'title'      => __( 'What Is Our Main Marketing Mission?', 'restlycore' ),
                'condition'  => [
                    'restly_tabs_content_source' => 'custom',
                ],
                'separator' => 'before',
            ]
        );
        $repeater->add_control(
            'restly_tabs_content_custom',
            [
                'label'      => __( 'Content', 'restlycore' ),
                'type'       => Controls_Manager::WYSIWYG,
                'title'      => __( 'Content', 'restlycore' ),
                'condition'  => [
                    'restly_tabs_content_source' => 'custom',
                ],
                'separator' => 'before',
            ]
        );
        $repeater->add_control(
			'image',
			[
				'label' => esc_html__( 'Image', 'restlycore' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
                'condition'  => [
                    'restly_tabs_content_source' => 'custom',
                ],
                'separator' => 'before',
			]
		);
        $this->add_control(
            'restly_tabs_list',
            [
                'label'   => esc_html__( 'Tabs', 'restlycore' ),
                'type'    => \Elementor\Controls_Manager::REPEATER,
                'fields'  => $repeater->get_controls(),
                'default' => [
                    [
                        'restly_tabs_title' => 'Digital Marketing',
                        'restly_tabs_content_source' => '',
                    ],
                ],
            ]
        );
        $this->end_controls_section();

        // ===================================================
        // ================ TABS BOX STYLE CSS ==============
        // ===================================================

        $this->start_controls_section(
            'restly_tabs_css_box_options',
            [
                'label' => esc_html__( 'Restly Tab Box', 'restlycore' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name'     => 'box_backgrounds',
                'label'    => esc_html__( 'Background', 'restlycore' ),
                'types'    => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .restly-tab-custom-content.custom-image',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'box_border',
                'label'    => esc_html__( 'Border', 'restlycore' ),
                'selector' => '{{WRAPPER}} .restly-tab-custom-content.custom-image',
            ]
        );
        $this->add_responsive_control(
            'tabs_border_radius',
            [
                'label'      => esc_html__( 'Border Radius', 'restlycore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .restly-tab-custom-content.custom-image' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name'     => 'box_shadow',
                'label'    => esc_html__( 'Box Shadow', 'restlycore' ),
                'selector' => '{{WRAPPER}} .restly-tab-custom-content.custom-image',
            ]
        );
        $this->add_responsive_control(
            'box_margin',
            [
                'label'      => esc_html__( 'Margin', 'restlycore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .restly-tab-custom-content.custom-image' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .restly-tab-custom-content.custom-image' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();

        // ===================================================
        // ================ TABS HEADING BOX STYLE CSS ==============
        // ===================================================

        $this->start_controls_section(
            'restly_tabs_box_options',
            [
                'label' => esc_html__( 'Restly Menu Style', 'restlycore' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->start_controls_tabs(
            'tabs_menu_tabs'
        );
        $this->start_controls_tab(
            'tabs_menu_tab',
            [
                'label' => esc_html__( 'Normal', 'restlycore' ),
            ]
        );
        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'tbox_menu_typo',
				'label' => __( 'Typography', 'restlycore' ),
				'selector' => '{{WRAPPER}} .tabs-section-wrapper .nav-tabs .nav-link',
			]
		);
        $this->add_responsive_control(
            'restly_tabs_css_box_color',
            [
                'label' => esc_html__( 'Color', 'restlycore' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tabs-section-wrapper .nav-tabs .nav-link' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'restly_tabs_css_box_dote_color',
            [
                'label' => esc_html__( 'Dote Color', 'restlycore' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tabs-section-wrapper .nav-tabs .nav-link:after' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name'     => 'tbox_backgrounds',
                'label'    => esc_html__( 'Background', 'restlycore' ),
                'types'    => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .tabs-section-wrapper .nav-tabs .nav-link',
            ]
        );
        $this->end_controls_tab();
        $this->start_controls_tab(
            'tabs_menu_active_tab',
            [
                'label' => esc_html__( 'Active Style', 'restlycore' ),
            ]
        );

        $this->add_responsive_control(
            'restly_tabs_css_box_active_color',
            [
                'label' => esc_html__( 'Active Color', 'restlycore' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tabs-section-wrapper .nav-tabs .nav-link.active' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'restly_tabs_css_box_active_dote_color',
            [
                'label' => esc_html__( 'Active Dote Color', 'restlycore' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tabs-section-wrapper .nav-tabs .nav-link.active:after' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name'     => 'active_tbox_backgrounds',
                'label'    => esc_html__( 'Background', 'restlycore' ),
                'types'    => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .tabs-section-wrapper .nav-tabs .nav-link.active',
            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'tbox_border',
                'label'    => esc_html__( 'Border', 'restlycore' ),
                'selector' => '{{WRAPPER}} .tabs-section-wrapper .nav-tabs .nav-link',
                'separator' => 'before',
            ]
        );
        $this->add_responsive_control(
            'ttabs_border_radius',
            [
                'label'      => esc_html__( 'Border Radius', 'restlycore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .tabs-section-wrapper .nav-tabs .nav-link' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'tbox_margin',
            [
                'label'      => esc_html__( 'Margin', 'restlycore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .tabs-section-wrapper .nav-tabs .nav-link' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'tbox_padding',
            [
                'label'      => esc_html__( 'Padding', 'restlycore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .tabs-section-wrapper .nav-tabs .nav-link' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();


        //========================================//
        //============  CONTENT STYLE ===========//
        //=======================================//

        $this->start_controls_section(
            'content_section',
            [
                'label' => esc_html__( 'Content', 'restlycore' ),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_responsive_control(
            'content_gap',
            [
                'label'      => esc_html__( 'Content Gap', 'restlycore' ),
                'type'       => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
				'range' => [
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
                'default' => [
					'unit' => '%',
				],
                'selectors'  => [
                    '{{WRAPPER}} .tab-custom-image' => 'margin-right: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->start_controls_tabs(
            'tabs_content_tabs'
        );
        $this->start_controls_tab(
            'title_tab',
            [
                'label' => esc_html__( 'Title', 'restlycore' ),
            ]
        );
        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_typo',
				'label' => __( 'Typography', 'restlycore' ),
				'selector' => '{{WRAPPER}} .tab-custom-title',
			]
		);
		$this->add_responsive_control(
			'title_color',
			[
				'label'       => esc_html__('Color', 'restlycore'),
				'type'        => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .tab-custom-title' => 'color: {{VALUE}};',
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
					'{{WRAPPER}} .tab-custom-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .tab-custom-title' => 'Padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
        $this->end_controls_tab();
        $this->start_controls_tab(
            'content_tab',
            [
                'label' => esc_html__( 'des', 'restlycore' ),
            ]
        );
        $this->add_responsive_control(
            'content_box_width',
            [
                'label'      => esc_html__( 'Box width', 'restlycore' ),
                'type'       => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ '%', 'custom' ],
				'range' => [
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
                'default' => [
					'unit' => '%',
				],
                'selectors'  => [
                    '{{WRAPPER}} .custom-image .tab-custom-content' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'tabs_color',
            [
                'label'     => esc_html__( 'Color', 'restlycore' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tab-custom-content p' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'tabs_typography',
                'selector' => '{{WRAPPER}} .tab-custom-content p',
            ]
        );
        $this->add_responsive_control(
            'tabs_margin',
            [
                'label'      => esc_html__( 'Margin', 'restlycore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .tab-custom-content p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'tabs_padding',
            [
                'label'      => esc_html__( 'Padding', 'restlycore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .tab-custom-content p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->start_controls_tab(
            'list_item_style',
            [
                'label' => esc_html__( 'List', 'restlycore' ),
            ]
        );
        $this->add_responsive_control(
            'item_color',
            [
                'label'     => esc_html__( 'Color', 'restlycore' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tab-custom-content ul li' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'item_typography',
                'selector' => '{{WRAPPER}} .tab-custom-content ul li',
            ]
        );
        $this->add_responsive_control(
            'item_margin',
            [
                'label'      => esc_html__( 'Margin', 'restlycore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .tab-custom-content ul li' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'item_padding',
            [
                'label'      => esc_html__( 'Padding', 'restlycore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .tab-custom-content ul li' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
			'more_options',
			[
				'label' => esc_html__( 'Icon Style', 'restlycore' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
        $this->add_responsive_control(
            'icon_ item_color',
            [
                'label'     => esc_html__( 'Icon Color', 'restlycore' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tab-custom-content ul li:after' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'icon_width',
            [
                'label' => esc_html__( 'Icon Width', 'restlycore'),
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
                    '{{WRAPPER}} .tab-custom-content ul li:after' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'icon_height',
            [
                'label' => esc_html__( 'Icon Height', 'restlycore'),
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
                    '{{WRAPPER}} .tab-custom-content ul li:after' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );  
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name'     => 'icon_item_backgrounds',
                'label'    => esc_html__( 'Background', 'restlycore' ),
                'types'    => ['classic', 'gradient', 'video'],
                'selector' => '{{WRAPPER}} .tab-custom-content ul li:after',
            ]
        );
       
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'icon_border',
                'label'    => esc_html__( 'Border', 'restlycore' ),
                'selector' => '{{WRAPPER}} .tab-custom-content ul li:after',
            ]
        );
        $this->add_responsive_control(
            'icon_border_redius',
            [
                'label'      => esc_html__( 'Border Redius', 'restlycore' ),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .tab-custom-content ul li:after' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .tab-custom-content ul' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .tab-custom-content ul' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();

        // ======= START ITEM LIST STYLE =======//

        $this->start_controls_tab(
            'image_content',
            [
                'label' => esc_html__( 'Image', 'restlycore' ),
            ]
        );
        $this->add_responsive_control(
            'image_box_width',
            [
                'label'      => esc_html__( 'Image Box width', 'restlycore' ),
                'type'       => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ '%', 'custom' ],
				'range' => [
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
                'default' => [
					'unit' => '%',
				],
                'selectors'  => [
                    '{{WRAPPER}} .custom-image .tab-custom-image' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
			'image_align',
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
				'default' => 'left',
				'toggle' => true,
				'selectors' => [
					'{{WRAPPER}} .custom-image .tab-custom-image' => 'text-align: {{VALUE}};',
				],
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
                    '{{WRAPPER}} .custom-image .tab-custom-image img' => 'height: {{SIZE}}{{UNIT}};',
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
                    '{{WRAPPER}} .custom-image .tab-custom-image img' => 'width: {{SIZE}}{{UNIT}};',
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
                    '{{WRAPPER}} .custom-image .tab-custom-image img' => 'object-fit: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'image_border',
                'label'    => esc_html__( 'Border', 'restlycore' ),
                'selector' => '{{WRAPPER}} .custom-image .tab-custom-image img',
            ]
        );
        $this->add_responsive_control(
            'image_border_radius',
            [
                'label'      => esc_html__( 'Border Radius', 'restlycore' ),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .custom-image .tab-custom-image img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .custom-image .tab-custom-image' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .custom-image .tab-custom-image' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
        $unique = rand(350, 540);
        ob_start();
        ?>
        <div class="tabs-section-wrapper">
            <ul class="nav nav-tabs" id="alfin_tab<?php echo esc_attr($unique); ?>" role="tablist">
                <?php $count = 0; foreach($settings['restly_tabs_list'] as $tablist) : $count++; ?>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link <?php echo esc_attr($tablist['restly_tabs_active'] == 'yes' ? 'active' : '' ); ?>" id="restly-tab-<?php echo esc_attr($unique.$count) ?>" data-bs-toggle="tab" data-bs-target="#restly-tab-body-<?php echo esc_attr($unique.$count) ?>" type="button" role="tab" aria-controls="restly-tab-body-<?php echo esc_attr($unique.$count) ?>" aria-selected="true"> <?php echo esc_html($tablist['restly_tabs_title'])?>
                        </button>
                    </li>
                <?php endforeach; ?>
            </ul>
            <div class="tab-content" id="calfin_tab_content<?php echo esc_attr($unique); ?>">
                <?php $count = 0; foreach($settings['restly_tabs_list'] as $tablist) : $count++; ?>
                <div class="tab-pane fade <?php echo esc_attr($tablist['restly_tabs_active'] == 'yes' ? 'show active' : '' ); ?>" id="restly-tab-body-<?php echo esc_attr($unique.$count) ?>" role="tabpanel" aria-labelledby="restly-tab-<?php echo esc_attr($unique.$count) ?>">
                    <?php 
                        if($tablist['restly_tabs_content_source'] == 'elementor' && !empty( $tablist['template_id'] )){
                        echo Plugin::instance()->frontend->get_builder_content_for_display( $tablist['template_id'] );
                        }else{
                            if(!empty($tablist['image']['url'])){
                                $image = 'custom-image';
                            }else{
                                $image = '';
                            }
                           ?>
                            <div class="restly-tab-custom-content <?php echo esc_attr($image); ?>">
                                <?php if(!empty($tablist['image']['url'])) : ?>
                                    <div class="tab-custom-image">
                                        <?php echo wp_get_attachment_image( $tablist['image']['id'], 'full' ); ?>
                                    </div>
                                <?php endif; ?>
                                
                                <div class="tab-custom-content">
                                <div class="tab-custom-title">  <?php echo esc_html( $tablist['title'] ); ?> </div>
                                    <?php echo wp_kses_post( $tablist['restly_tabs_content_custom'] ); ?>
                                </div>
                            </div>
                           <?php 
                        }
                    ?>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
        <?php
        echo ob_get_clean();
    }
}
Plugin::instance()->widgets_manager->register( new restly_tabs_v2_Widget );

