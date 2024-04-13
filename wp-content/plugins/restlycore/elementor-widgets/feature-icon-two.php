<?php namespace Elementor;

class restly_feature_icon_two extends Widget_Base {

    public function get_name() {

        return 'restly_feature_icon_two';
    }

    public function get_title() {
        return esc_html__( 'Restly Feature Icon V2', 'restlycore' );
    }

    public function get_icon() {

        return 'eicon-icon-box';
    }

    public function get_categories() {
        return ['restly'];
    }

    protected function register_controls() {

        //Content tab start
        $this->start_controls_section(
            'feature_icon_options',
            [
                'label' => esc_html__( 'Restly Feature Icon', 'restlycore' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );
        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'icon',
            [
                'label' => esc_html__( 'Icon', 'restlycore' ),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
					'value' => 'fas fa-check',
					'library' => 'fa-solid',
				],
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'title',
            [
                'label' => esc_html__( 'Title', 'restlycore' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( '24/7 Call Services', 'restlycore' ),
                'label_block' => true,
                'dynamic' => [
                    'active' => true,
                ],
            ]
        );
       
        $repeater->add_control(
            'title_tag',
            [
                'label' => esc_html__( 'HTML Tag', 'restlycore' ),
                'description' => esc_html__( 'Add HTML Tag For Title', 'restlycore' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'h6',
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
				'default' => 'yes',
			]
		);
        $repeater->add_control(
            'link',
            [
                'label' => __( 'Link', 'restlycore' ),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => __( 'https://your-link.com', 'restlycore' ),
                'show_external' => true,
                'default' => [
                    'url' => '',
                    'is_external' => true,
                    'nofollow' => true,
                ],
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => [
                    'enable_title_link' => 'yes',
                ],
            ]
        );
        $repeater->add_control(
            'description',
            [
                'label' => esc_html__( 'Description', 'restlycore' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__( 'Sed ut perspiciatis unde omnis iste natus', 'restlycore' ),
                'label_block' => true,
                'dynamic' => [
                    'active' => true,
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
						'title' => esc_html__( '24/7 Call Services', 'restlycore' ),
						'description' => esc_html__( 'Sed ut perspiciatis unde omnis iste natus', 'restlycore' ),
					],
				],
                'title_field' => '{{{ title }}}',
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'feature_box_options',
            [
                'label' => esc_html__( 'Box', 'restlycore' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_responsive_control(
            'box_margin',
            [
                'label' => esc_html__( 'Margin', 'restlycore' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .feature-icon-box-v2-item' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .feature-icon-box-v2-item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
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
                'toggle' => true,
                'selectors' => [
                    '{{WRAPPER}} .feature-icon-box-v2-item' => 'text-align: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'border_color',
            [
                'label' => esc_html__( 'Border Color', 'restlycore' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .feature-icon-box-v2-wrapper [class*="col-"]' => 'border-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'box_bg',
                'label' => esc_html__( 'Background', 'restlycore' ),
                'types' => [ 'classic', 'gradient', 'video' ],
                'selector' => '{{WRAPPER}} .feature-icon-box-v2-item',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'box_border',
                'label' => esc_html__( 'Border', 'restlycore' ),
                'selector' => '{{WRAPPER}} .feature-icon-box-v2-item',
            ]
        );
        $this->add_responsive_control(
            'box_radius',
            [
                'label' => esc_html__( 'Border Radius', 'restlycore' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .feature-icon-box-v2-item' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'box_shadow',
                'label' => esc_html__( 'Box Shadow', 'restlycore' ),
                'selector' => '{{WRAPPER}} .feature-icon-box-v2-item',
            ]
        );
          
        $this->end_controls_section();

        $this->start_controls_section(
            'feature_icon_style',
            [
                'label' => esc_html__( 'Icon', 'restlycore' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'icon_typo',
                'label' => esc_html__( 'Typography', 'restlycore' ),
                'selector' => '{{WRAPPER}} .iconBox-icon',
            ]
        );
        $this->add_responsive_control(
            'icon_marign',
            [
                'label' => esc_html__( 'Margin', 'restlycore' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .iconBox-icon' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'icon_padding',
            [
                'label' => esc_html__( 'Padding', 'restlycore' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .iconBox-icon' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->start_controls_tabs(
            'icon_tabs'
        );
            $this->start_controls_tab(
                'icon_normal',
                [
                    'label' => __( 'Normal', 'restlycore' ),
                ]
            );
            $this->add_responsive_control(
                'icon_color',
                [
                    'label' => esc_html__( 'Color', 'restlycore' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .iconBox-icon' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_responsive_control(
                'icon_bg',
                [
                    'label' => esc_html__( 'Background', 'restlycore' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .iconBox-icon' => 'background-color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Border::get_type(),
                [
                    'name' => 'icon_border',
                    'label' => esc_html__( 'Border', 'restlycore' ),
                    'selector' => '{{WRAPPER}} .iconBox-icon',
                ]
            );
            
            $this->add_responsive_control(
                'icon_radius',
                [
                    'label' => esc_html__( 'Icon Radius', 'restlycore' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .iconBox-icon' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Box_Shadow::get_type(),
                [
                    'name' => 'icon_shadow',
                    'label' => esc_html__( 'Icon Shadow', 'restlycore' ),
                    'selector' => '{{WRAPPER}} .iconBox-icon',
                ]
            );
            $this->add_responsive_control(
                'icon_height',
                [
                    'label' => esc_html__( 'Height', 'restlycore' ),
                    'type' => Controls_Manager::SLIDER,
                    'size_units' => [ 'px', '%' ],
                    'range' => [
                        'px' => [
                            'min' => 0,
                            'max' => 400,
                            'step' => 1,
                        ],
                        '%' => [
                            'min' => 0,
                            'max' => 100,
                        ],
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .iconBox-icon' => 'height: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );
            $this->add_responsive_control(
                'icon_width',
                [
                    'label' => esc_html__( 'Width', 'restlycore' ),
                    'type' => Controls_Manager::SLIDER,
                    'size_units' => [ 'px', '%' ],
                    'range' => [
                        'px' => [
                            'min' => 0,
                            'max' => 400,
                            'step' => 1,
                        ],
                        '%' => [
                            'min' => 0,
                            'max' => 100,
                        ],
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .iconBox-icon' => 'Width: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );
            $this->add_responsive_control(
                'icon_min_wid',
                [
                    'label' => esc_html__( 'Min Width', 'restlycore' ),
                    'type' => Controls_Manager::SLIDER,
                    'size_units' => [ 'px', '%' ],
                    'range' => [
                        'px' => [
                            'min' => 0,
                            'max' => 400,
                            'step' => 1,
                        ],
                        '%' => [
                            'min' => 0,
                            'max' => 100,
                        ],
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .iconBox-icon' => 'min-width: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );
            $this->end_controls_tab();
            
            $this->start_controls_tab(
                'icon_hover',
                [
                    'label' => __( 'Hover', 'restlycore' ),
                ]
            );
            $this->add_responsive_control(
                'icon_hcolor',
                [
                    'label' => esc_html__( 'Color', 'restlycore' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .iconBox-icon:hover' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_responsive_control(
                'icon_hbg',
                [
                    'label' => esc_html__( 'Background', 'restlycore' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .iconBox-icon:hover' => 'background-color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Border::get_type(),
                [
                    'name' => 'icon_hborder',
                    'label' => esc_html__( 'Border', 'restlycore' ),
                    'selector' => '{{WRAPPER}} .iconBox-icon:hover',
                ]
            );
            $this->add_responsive_control(
                'icon_radius_hover',
                [
                    'label' => esc_html__( 'Icon Radius', 'restlycore' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .iconBox-icon:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Box_Shadow::get_type(),
                [
                    'name' => 'icon_hshadow',
                    'label' => esc_html__( 'Icon Shadow', 'restlycore' ),
                    'selector' => '{{WRAPPER}} .iconBox-icon:hover',
                ]
            );
            $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();
        $this->start_controls_section(
            'services_content',
            [
                'label' => esc_html__( 'Content Style', 'restlycore' ),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->start_controls_tabs( 'restly_Content_tabs' );
        $this->start_controls_tab(  //service section Title style start
            'title_normal_tab',
            [
                'label' => esc_html__( 'Title', 'restlycore' ),
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'title_typography',
                'selector' => '{{WRAPPER}} .feature-icon-box-v2-title',
            ]
        );
        $this->add_responsive_control(
            'title_color',
            [
                'label'     => esc_html__( 'Color', 'restlycore' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .feature-icon-box-v2-title' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .feature-icon-box-v2-title a' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'title_color_hover',
            [
                'label'     => esc_html__( 'Hover Color', 'restlycore' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .feature-icon-box-v2-title:hover' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .feature-icon-box-v2-title a:hover' => 'color: {{VALUE}}',
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
                    '{{WRAPPER}} .feature-icon-box-v2-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .feature-icon-box-v2-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_tab();
        // ===================== DECRIPTION STYLE====================
        $this->start_controls_tab(  
            'des_heading',
            [
                'label' => esc_html__( 'Decription', 'restlycore' ),
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'dec_typography',
                'selector' => '{{WRAPPER}} .feature-icon-box-v2-desc',
            ]
        );

        $this->add_responsive_control(
            'dec_color',
            [
                'label'     => esc_html__( 'Title Color', 'restlycore' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .feature-icon-box-v2-desc' => 'color: {{VALUE}}',
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
                    '{{WRAPPER}} .feature-icon-box-v2-desc' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .feature-icon-box-v2-desc' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
        if ( ! empty( $settings['link']['url'] ) ) {
            $this->add_link_attributes( 'link', $settings['link'] );
        }
        ob_start();
        ?>
        <div class="feature-icon-box-v2-wrapper">
            <div class="row">
                <?php foreach ( $settings['repeter_list'] as $item ): ?>
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="feature-icon-box-v2-item">
                            <?php if(!empty($item['icon'])) : ?>
                            <div class="iconBox-icon">
                                <?php \Elementor\Icons_Manager::render_icon( $item['icon'], [ 'aria-hidden' => 'true' ] ); ?>
                            </div>
                            <?php endif; ?>
                            <div class="feature-icon-box-v2-content">
                                <<?php echo esc_attr($item['title_tag']); ?> class="feature-icon-box-v2-title">
                                    <?php if( $item['enable_title_link'] == 'yes' ):
                                        $url      = $item['link']['url'];
                                        $target   = $item['link']['is_external'] ? ' target="_blank"' : '';
                                        $nofollow = $item['link']['nofollow'] ? ' rel="nofollow"' : '';
                                    ?>
                                    <a href="<?php echo esc_url($url); ?>" <?php echo $target . $nofollow;?>><?php endif;?>
                                        <?php echo esc_html($item['title']); ?>
                                    <?php if( $item['enable_title_link'] == 'yes' ):?></a><?php endif;?>
                                </<?php echo esc_attr($item['title_tag']); ?>>
                                <div class="feature-icon-box-v2-desc">
                                    <?php echo esc_html($item['description']); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach;?>
            </div>
        </div>
        <?php
        echo ob_get_clean();
    }
}
Plugin::instance()->widgets_manager->register( new restly_feature_icon_two );