<?php namespace Elementor;

class restly_list_widget extends Widget_Base {

    public function get_name() {

        return 'restly_list';
    }

    public function get_title() {
        return esc_html__( 'Restly List', 'restlycore' );
    }

    public function get_icon() {

        return 'eicon-editor-list-ol';
    }

    public function get_categories() {
        return ['restly'];
    }

    protected function register_controls() {
        //Content tab start

        $this->start_controls_section(
            'list_content',
            [
                'label' => esc_html__( 'Restly List', 'restlycore' ),
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
                    'value'   => 'bi bi-check2',
                    'library' => 'fa-solid',
                ],
            ]
        );
        $repeater->add_control(
            'number',
            [
                'label'   => esc_html__( 'Number', 'restlycore' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                
            ]
        );
        $repeater->add_control(
            'title',
            [
                'label'       => esc_html__( 'Title', 'restlycore' ),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__( 'E-Waste Recycling', 'restlycore' ),
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'title_tag',
            [
                'label' => esc_html__( 'HTML Tag', 'restlycore' ),
                'description' => esc_html__( 'Add HTML Tag For Small Title', 'restlycore' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'div',
                'options' => [
                    'h1'  => esc_html__( 'H1', 'restlycore' ),
                    'h2'  => esc_html__( 'H2', 'restlycore' ),
                    'h3'  => esc_html__( 'H3', 'restlycore' ),
                    'h4'  => esc_html__( 'H4', 'restlycore' ),
                    'h5'  => esc_html__( 'H5', 'restlycore' ),
                    'h6'  => esc_html__( 'H6', 'restlycore' ),
                    'span'  => esc_html__( 'span', 'restlycore' ),
                    'div'  => esc_html__( 'Div', 'restlycore' ),
                ],
              
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
				'default' => 'no',
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
            ]
        );
        $this->add_control(
            'repeater_list',
            [
                'label'       => esc_html__( 'Repeater List', 'restlycore' ),
                'type'        => \Elementor\Controls_Manager::REPEATER,
                'fields'      => $repeater->get_controls(),
				'default' => [
					[
						'title' => esc_html__( 'E-Waste Recycling', 'restlycore' ),
					],
				],
                'title_field' => '{{{ title }}}',
            ]
        );
        $this->add_control(
			'enable_container',
			[
				'label' => esc_html__( 'Enable Container Full', 'restlycore' ),
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
                'default' => 'col-xl-6',
                'options' => [
                    'col-xl-12'  => esc_html__( '1 Column', 'restlycore' ),
                    'col-xl-6'  => esc_html__( '2 Column', 'restlycore' ),
                    'col-xl-4'  => esc_html__( '3 Column', 'restlycore' ),
                    'col-xl-3'  => esc_html__( '4 Column', 'restlycore' ),
                ],
            ]
        );
        $this->add_control(
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
        $this->add_control(
            'tab_col',
            [
                'label' => esc_html__( 'Columns On Tablet', 'restlycore' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'col-md-12',
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
            'restly-box',
            [
                'label' => esc_html__( 'Box', 'restlycore' ),
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
				'default' => 'left',
				'toggle' => true,
				'selectors' => [
					'{{WRAPPER}} .restly-list-box' => 'justify-content: {{VALUE}};',
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
					'right' => [
						'title' => esc_html__( 'Right', 'restlycore' ),
						'icon' => 'eicon-long-arrow-right',
					],
				],
				'default' => 'riht',
                'toggle'  => true,
                'selectors_dictionary' => [
                    'right'   => 'flex-direction:row',
                    'left'  => 'flex-direction:row-reverse',
                ],
                'selectors'            => [
                    '{{WRAPPER}} .restly-list-box' => '{{VALUE}}',
                ],
			]
		);
		$this->add_responsive_control(
            'icon-positon',
            [
                'label'     => __( 'Alignment', 'restlycore' ),
                'type'      => \Elementor\Controls_Manager::CHOOSE,
                'options'   => [
                    'flex-start'   => [
                        'title' => __( 'Start', 'restlycore' ),
                        'icon'  => 'eicon-align-start-v',
                    ],
                    'center' => [
                        'title' => __( 'Center', 'restlycore' ),
                        'icon'  => 'eicon-align-center-h',
                    ],
                    'flex-end'  => [
                        'title' => __( 'End', 'restlycore' ),
                        'icon'  => 'eicon-align-end-v',
                    ],
                ],
                'default'   => 'center',
                'toggle'    => true,
                'selectors' => [
                    '{{WRAPPER}} .restly-list-box' => 'align-items: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'restly_gap',
            [
                'label' => esc_html__( 'Gap', 'restlycore' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px' ],
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
                    '{{WRAPPER}} .restly-list-box ' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name'     => 'box_backgrounds',
                'label'    => esc_html__( 'Background', 'restlycore' ),
                'types'    => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .restly-list-wrapper',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'box_border',
                'label'    => esc_html__( 'Border', 'restlycore' ),
                'selector' => '{{WRAPPER}} .restly-list-wrapper',
            ]
        );
        $this->add_responsive_control(
            'restly_border_radius',
            [
                'label'      => esc_html__( 'Border Radius', 'restlycore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .restly-list-wrapper' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name'     => 'box_shadow',
                'label'    => esc_html__( 'Box Shadow', 'restlycore' ),
                'selector' => '{{WRAPPER}} .restly-list-wrapper',
            ]
        );
        $this->add_responsive_control(
            'box_margin',
            [
                'label'      => esc_html__( 'Margin', 'restlycore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .restly-list-wrapper' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .restly-list-wrapper' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
      
        $this->end_controls_section();

        //==========================================//
        //======= SERVICE ICON STYLE START=========//
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
                        'max' => 150,
                        'step' => 1,
                    ]
                ],
                'selectors' => [
                    '{{WRAPPER}} .restly-list-icon' => 'width: {{SIZE}}{{UNIT}};',
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
                        'max' => 150,
                        'step' => 1,
                    ]
                ],
                'selectors' => [
                    '{{WRAPPER}} .restly-list-icon' => 'min-width: {{SIZE}}{{UNIT}};',
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
                    '{{WRAPPER}} .restly-list-icon' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );  
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'icon_typo',
                'selector' => '{{WRAPPER}} .restly-list-icon',
            ]
        );
        $this->add_responsive_control(
            'restly-icon_color',
            [
                'label'     => esc_html__( 'Icon Color', 'restlycore' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .restly-list-icon' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'restly-icon_color_hover',
            [
                'label'     => esc_html__( 'Icon Hover Color', 'restlycore' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .restly-list-box:hover .restly-list-icon' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name'     => 'icon_bg',
                'label'    => esc_html__( 'Icon Background', 'restlycore' ),
                'types'    => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .restly-list-icon',
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
                'selector' => '{{WRAPPER}} .restly-list-box:hover .restly-list-icon',
                'separator' => 'after',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'icon_border',
                'label'    => esc_html__( 'Border', 'restlycore' ),
                'selector' => '{{WRAPPER}} .restly-list-icon',
            ]
        );
        $this->add_responsive_control(
            'icon_border_redius',
            [
                'label'      => esc_html__( 'Border Redius', 'restlycore' ),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .restly-list-icon' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'icon_box_shadow',
                'label' => esc_html__( 'Icon Shadow', 'restlycore' ),
                'selector' => '{{WRAPPER}} .restly-list-icon',
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
                    '{{WRAPPER}} .restly-list-icon svg' => 'width: {{SIZE}}{{UNIT}};',
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
                    '{{WRAPPER}} .restly-list-icon svg' => 'height: {{SIZE}}{{UNIT}};',
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
                    '{{WRAPPER}} .restly-list-icon' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .restly-list-icon' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();

        // ===================================================
        // ============== CONTENT STYLE ======================
        // ===================================================

        $this->start_controls_section(
            'restly-content',
            [
                'label' => esc_html__( 'Title', 'restlycore' ),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'title_typography',
                'selector' => '{{WRAPPER}} .restly-list-title',
            ]
        );
        $this->add_responsive_control(
            'title_color',
            [
                'label'     => esc_html__( 'Color', 'restlycore' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .restly-list-title' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .restly-list-title a' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'title_color_hover',
            [
                'label'     => esc_html__( 'Hover Color', 'restlycore' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .restly-list-box:hover .restly-list-title' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .restly-list-box:hover .restly-list-title a' => 'color: {{VALUE}}',
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
                    '{{WRAPPER}} .restly-list-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .restly-list-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();

        // ===================== DECRIPTION STYLE====================

        $this->start_controls_section(
            'ser_options',
            [
                'label' => esc_html__( 'Decription', 'restlycore' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'dec_typography',
                'selector' => '{{WRAPPER}} .restly-list-description',
            ]
        );

        $this->add_responsive_control(
            'dec_color',
            [
                'label'     => esc_html__( 'Color', 'restlycore' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .restly-list-description' => 'color: {{VALUE}}',
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
                    '{{WRAPPER}} .restly-list-description' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .restly-list-description' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
            $container = 'container-Full';
        }
        ob_start();

        ?>
        <div class="restly-list-wrapper">
            <div class="<?php echo esc_attr($container)?>">
                <div class="row ">
                    <?php foreach ( $settings['repeater_list'] as $item ): ?>
                        <div class="<?php echo esc_attr($column); ?> col-12">
                            <div class="restly-list-box ">
                                <div class="restly-list-icon">
                                    <?php if ( ! empty( $item['number'] ) ) {
                                            echo esc_html( $item['number'] );
                                        }else{
                                            \Elementor\Icons_Manager::render_icon( $item['icon'], ['aria-hidden' => 'true'] );
                                        }
                                    ?>
                                </div>
                                <div class="list-content-area">
									 <?php if ( ! empty( $item['title'] ) ) : ?>
										<<?php echo esc_attr($item['title_tag'])?> class="restly-list-title"> 
											<?php if( $item['enable_title_link'] == 'yes' ):
												$url      = $item['title_link']['url'];
												$target   = $item['title_link']['is_external'] ? ' target="_blank"' : '';
												$nofollow = $item['title_link']['nofollow'] ? ' rel="nofollow"' : '';
											?>
											<a href="<?php echo esc_url($url); ?>" <?php echo $target . $nofollow;?>><?php endif;?>
											<?php echo esc_html( $item['title'] ); ?>
											<?php if( $item['enable_title_link'] == 'yes' ):?></a><?php endif;?>
                                        </<?php echo esc_attr($item['title_tag'])?>>
								 	<?php endif; ?>
                                     <?php if ( ! empty( $item['Description'] ) ) : ?>
										<div class="restly-list-description">
											<?php echo esc_html( $item['Description'] ); ?>
										</div>    
									<?php endif; ?>
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
Plugin::instance()->widgets_manager->register( new restly_list_widget );

