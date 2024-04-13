<?php namespace Elementor;

class restly_accordion_Widget extends Widget_Base {

    public function get_name() {

        return 'accordion_widget';

    }
    public function get_title() {

        return esc_html__( 'Restly Faq Two', 'restlycore' );
    }
    public function get_icon() {

        return 'eicon-shape';
    }

    public function get_categories() {

        return ['restly'];
    }
    protected function register_controls() {
        //Content tab start
        $this->start_controls_section(
            'restly_faq_options',
            [
                'label' => esc_html__( 'restly Accordion', 'restlycore' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );
        $repeater = new \Elementor\Repeater();
        $repeater->add_control(
            'restly_faq_active',
            [
                'label'        => esc_html__( 'Active FAQ', 'restlycore' ),
                'type'         => \Elementor\Controls_Manager::SWITCHER,
                'label_on'     => esc_html__( 'Show', 'restlycore' ),
                'label_off'    => esc_html__( 'Hide', 'restlycore' ),
                'return_value' => 'yes',
                'default'      => 'no',
            ]
        );
        $repeater->add_control(
            'restly_faq_title', [
                'label'       => esc_html__( 'Title', 'restlycore' ),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__( 'How much time do I need to volunteer?', 'restlycore' ),
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'more_options',
            [

                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $repeater->add_control(
            'restly_faq_content', [
                'label'      => esc_html__( 'Content', 'restlycore' ),
                'type'       => \Elementor\Controls_Manager::WYSIWYG,
                'show_label' => false,
            ]
        );
        $this->add_control(
            'restly_faqs',
            [
                'label'          => esc_html__( 'FAQ List', 'restlycore' ),
                'type'           => \Elementor\Controls_Manager::REPEATER,
                'fields'         => $repeater->get_controls(),
                'default'        => [
                    [
                        'restly_faq_active'  => 'yes',
                        'restly_faq_title'   => esc_html__( '01 What Is The Design Process For Branding?', 'restlycore' ),
                        'restly_faq_content' => esc_html__( 'Progressively communicate flexible human capital with best-of-breed schemas. Completely develop 2.0 infrastructures via bleeding-edge opportunities. Completely initiate world-class leadership skills via fully tested applications. Objectively seize dynamic e-services and accurate markets.', 'restlycore' ),
                    ],
                    [
                        'restly_faq_active'  => 'no',
                        'restly_faq_title'   => esc_html__( '02 How Much Does Logo Design Services Cost?', 'restlycore' ),
                        'restly_faq_content' => esc_html__( 'Progressively communicate flexible human capital with best-of-breed schemas. Completely develop 2.0 infrastructures via bleeding-edge opportunities. Completely initiate world-class leadership skills via fully tested applications. Objectively seize dynamic e-services and accurate markets.', 'restlycore' ),
                    ],
                    [
                        'restly_faq_active'  => 'no',
                        'restly_faq_title'   => esc_html__( '03 How Long Will It Take To Complete My Project?', 'restlycore' ),
                        'restly_faq_content' => esc_html__( 'Progressively communicate flexible human capital with best-of-breed schemas. Completely develop 2.0 infrastructures via bleeding-edge opportunities. Completely initiate world-class leadership skills via fully tested applications. Objectively seize dynamic e-services and accurate markets.', 'restlycore' ),
                    ],
                    [
                        'restly_faq_active'  => 'no',
                        'restly_faq_title'   => esc_html__( '04 What Is Included In A Round Of Revisions?', 'restlycore' ),
                        'restly_faq_content' => esc_html__( 'Progressively communicate flexible human capital with best-of-breed schemas. Completely develop 2.0 infrastructures via bleeding-edge opportunities. Completely initiate world-class leadership skills via fully tested applications. Objectively seize dynamic e-services and accurate markets.', 'restlycore' ),
                    ],
                ],
                'restly_faq_title' => '{{{ list_title }}}',
            ]
        );
        $this->end_controls_section();
       

        // =======================================
        // ========== CONTENT STYLE CSS ==========
        // =======================================
        $this->start_controls_section(
            'restly_faq_css_title',
            [
                'label' => esc_html__( 'Faq Content Style', 'restlycore' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_responsive_control(
            'restly_faq_css_box_align',
            [
                'label'     => __( 'Alignment', 'restlycore' ),
                'type'      => \Elementor\Controls_Manager::CHOOSE,
                'options'   => [
                    'left'   => [
                        'title' => __( 'Left', 'restlycore' ),
                        'icon'  => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => __( 'Center', 'restlycore' ),
                        'icon'  => 'eicon-text-align-center',
                    ],
                    'right'  => [
                        'title' => __( 'Right', 'restlycore' ),
                        'icon'  => 'eicon-text-align-right',
                    ],
                ],
                'default'   => 'left',
                'toggle'    => true,
                'selectors' => [
                    '{{WRAPPER}} .restly-faq-accordion .accordion-item'   => 'text-align: {{VALUE}}',
                    '{{WRAPPER}} .restly-faq-accordion .accordion-button' => 'text-align: {{VALUE}}',
                    '{{WRAPPER}} .restly-accordion-wraper ' => 'text-align: {{VALUE}}',
                ],
            ]
        );
        $this->start_controls_tabs(
            'restly_content_tabs'
        );

        $this->start_controls_tab(
            'style_title_tab',
            [
                'label' => esc_html__( 'Title', 'restlycore' ),
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'restly_faq_css_title_typo',
                'label'    => esc_html__( 'Typography', 'restlycore' ),
                'selector' => '{{WRAPPER}} .restly-faq-accordion .accordion-button',
            ]
        );
        $this->add_responsive_control(
            'restly_faq_css_title_color',
            [
                'label'     => esc_html__( 'Title Color', 'restlycore' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .restly-faq-accordion .accordion-button' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'restly_faq_css_title_color_h',
            [
                'label'     => esc_html__( 'Title Hover Color', 'restlycore' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .restly-faq-accordion .accordion-button:hover' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'restly_faq_css_title_bg',
            [
                'label'     => esc_html__( 'Background Color', 'restlycore' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .restly-accordion-wraper .restly-faq-accordion .accordion-button' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
			'active_bg_color',
			[
				'label' => esc_html__( 'Active Style', 'restlycore' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'restly_faq_css_title_border_active',
                'label'    => esc_html__( 'Border', 'restlycore' ),
                'selector' => '{{WRAPPER}} .restly-faq-accordion .accordion-header .accordion-button:not(.collapsed)',
                'separator' => 'before',
            ]
        );
        $this->add_responsive_control(
			'active_color',
			[
				'label' => esc_html__( 'Text Color', 'restlycore' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .restly-accordion-wraper .accordion-header .accordion-button:not(.collapsed)' => 'color: {{VALUE}}',
				],
			]
		);
        $this->add_responsive_control(
            'restly_faq_css_box_bg_active',
            [
                'label'     => esc_html__( 'Background Color', 'restlycore' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .restly-accordion-wraper .accordion-header .accordion-button:not(.collapsed)' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'restly_faq_css_title_border',
                'label'    => esc_html__( 'Border', 'restlycore' ),
                'selector' => '{{WRAPPER}} .restly-accordion-wraper .restly-faq-accordion .accordion-button',
                'separator' => 'before',
            ]
        );
        $this->add_responsive_control(
            'restly_faq_css_title_radius',
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
                'selectors'  => [
                    '{{WRAPPER}} .restly-faq-accordion .accordion-item' => 'border-radius: {{SIZE}}{{UNIT}} !important;',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name'     => 'restly_faq_css_title_shoadow',
                'label'    => esc_html__( 'Shadow', 'restlycore' ),
                'selector' => '{{WRAPPER}} .restly-faq-accordion .accordion-item',
            ]
        );
        $this->add_responsive_control(
            'restly_faq_css_title_margin',
            [
                'label'      => esc_html__( 'Margin', 'restlycore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .restly-accordion-wraper .restly-faq-accordion .accordion-item' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'restly_faq_css_title_padding',
            [
                'label'      => esc_html__( 'Padding', 'restlycore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .restly-accordion-wraper .restly-faq-accordion .accordion-button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();
        // ===================================================
        $this->start_controls_tab(
            'style_description_tab',
            [
                'label' => esc_html__( 'Description', 'restlycore' ),
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'restly_faq_css_dec_typo',
                'label'    => esc_html__( 'Typography', 'restlycore' ),
                'selector' => '{{WRAPPER}} .restly-faq-accordion .accordion-body',
            ]
        );
        $this->add_responsive_control(
            'restly_faq_css_dec_color',
            [
                'label'     => esc_html__( 'Color', 'restlycore' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .restly-faq-accordion .accordion-body' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'body_bg_color',
            [
                'label'     => esc_html__( 'Body Background Color', 'restlycore' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .restly-faq-accordion .accordion-body' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'restly_faq_css_dec_margin',
            [
                'label'      => esc_html__( 'Margin', 'restlycore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .restly-faq-accordion .accordion-body' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'restly_faq_css_dec_padding',
            [
                'label'      => esc_html__( 'Padding', 'restlycore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .restly-faq-accordion .accordion-body' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();

        // =======================================
        // ========== Icon Style CSS ==========
        // =======================================
        $this->start_controls_section(
            'icon_style_css',
            [
                'label' => esc_html__( 'Icon Style', 'restlycore' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'restly_icon_typo',
                'label'    => esc_html__( 'Typography', 'restlycore' ),
                'selector' => '{{WRAPPER}} .restly-faq-accordion .accordion-button::after',
            ]
        );
        $this->add_responsive_control(
            'icon_color',
            [
                'label'     => esc_html__( 'Color', 'restlycore' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .restly-faq-accordion .accordion-button::after' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'restly_icon_bg_color',
            [
                'label'     => esc_html__( 'Background Color', 'restlycore' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .restly-faq-accordion .accordion-button::after' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
			'icon_color_collapse',
			[
				'label' => esc_html__( 'collapse show', 'restlycore' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
         $this->add_responsive_control(
            'icon_color_c',
            [
                'label'     => esc_html__( 'Color', 'restlycore' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .accordion-header .accordion-button:not(.collapsed)::after' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'restly_icon_bg_color_c',
            [
                'label'     => esc_html__( 'Background Color', 'restlycore' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .accordion-header .accordion-button:not(.collapsed)::after' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->end_controls_section();
    }
    
    //Render
    protected function render() {
        $settings = $this->get_settings_for_display();
        $_id = rand( 1241, 3256 );
        
        ob_start();
        ?>
        <div class="restly-accordion-wraper">
                <div class="accordion restly-faq-accordion" id="restly-faq">
                    <?php $count = 0;foreach ( $settings['restly_faqs'] as $item ): $count++;
                        if($item['restly_faq_active'] == 'yes' ){
                            $active = 'collapse';
                            $show = 'show';
                        }else{
                            $active = 'collapsed';
                            $show = '';
                        }
                    ?>
                    <div class="accordion-item">
                        <h5 class="accordion-header" id="faq<?php echo esc_attr($count)?>">
                            <button class="accordion-button <?php echo esc_attr($active); ?>" type="button" data-bs-toggle="collapse" data-bs-target="#restly-faq-item-<?php echo esc_attr($_id . $count)?>" aria-expanded="false" aria-controls="restly-faq-item-<?php echo esc_attr($_id . $count)?>">
                                <?php echo esc_html($item['restly_faq_title']); ?>
                            </button>
                        </h5>
                        <div id="restly-faq-item-<?php echo esc_attr($_id . $count)?>" class="accordion-collapse collapse <?php echo esc_attr($show); ?>" aria-labelledby="faq<?php echo esc_attr($count)?>" data-bs-parent="#restly-faq">
                        <div class="accordion-body"><?php echo wp_kses_post($item['restly_faq_content']); ?></div>
                        </div>
                    </div>
                    <?php endforeach;?>
                </div>
        </div>
        <?php
echo ob_get_clean();
    }
}
Plugin::instance()->widgets_manager->register( new restly_accordion_Widget );
