<?php
namespace Elementor;

class testimonial_v8_widget extends Widget_Base {

    public function get_name() {

        return 'testimonial_v8';
    }

    public function get_title() {
        return esc_html__( 'Restly Testimonial V8', 'restlycore' );
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
            'testmonial_item_options',
            [
                'label' => esc_html__( 'Testimonial Items', 'restlycore' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );
        $repeater = new \Elementor\Repeater();
        $repeater->add_control(
            'quote',
            [
                'label' => esc_html__( 'Quote Icon', 'restlycore' ),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-quote-right',
                    'library' => 'solid',
                ],
            ]
        );
        $repeater->add_control(
			'dec', [
				'label' => esc_html__( 'Content', 'restlycore' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'show_label' => false,
			]
		);
        $this->add_control(
			'items',
			[
				'label' => esc_html__( 'Items List', 'restlycore' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'dec' => esc_html__( 'The team at Restly is highly professional and responsive. They were always available to address our questions and concerns, providing excellent customer service throughout the entire process. Their knowledge and experience in the industry were evident, and their insights and recommendations were invaluable.', 'restlycore' ),
					],
                    [
						'dec' => esc_html__( 'The team at Restly is highly professional and responsive. They were always available to address our questions and concerns, providing excellent customer service throughout the entire process. Their knowledge and experience in the industry were evident, and their insights and recommendations were invaluable.' ),
					],
				],
				'title_field' => '{{{ dec }}}',
			]
		);
     
        $this->add_control(
            'setting_note',
            [
                'label' => __( 'Slide Options Options', 'restlycore' ),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'loop',
            [
                'label' => esc_html__( 'loop', 'restlycore' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Show', 'restlycore' ),
                'label_off' => esc_html__( 'Hide', 'restlycore' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );
        $this->add_control(
            'aplay',
            [
                'label' => esc_html__( 'Auto Play', 'restlycore' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Show', 'restlycore' ),
                'label_off' => esc_html__( 'Hide', 'restlycore' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );
        $this->add_control(
            'enable_arrows',
            [
                'label'        => esc_html__( 'Enable Arrows ', 'tronixcore' ),
                'type'         => Controls_Manager::SWITCHER,
                'label_on'     => esc_html__( 'On', 'tronixcore' ),
                'label_off'    => esc_html__( 'Off', 'tronixcore' ),
                'return_value' => 'yes',
                'default'      => 'yes',
            ]
        );
        $this->add_control(
            'speed',
            [
                'label' => esc_html__( 'Speed', 'restlycore' ),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'min' => 500,
                'max' => 9000,
                'step' => 100,
                'default' => 1000,
            ]
        );
        $this->add_control(
            'aspeed',
            [
                'label' => esc_html__( 'Auto Speed', 'restlycore' ),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'min' => 500,
                'max' => 10000,
                'step' => 100,
                'default' => 5000,
            ]
        );
        $this->end_controls_section();
       
        $this->start_controls_section(
            'testmonial_box_css',
            [
                'label' => esc_html__( 'Box', 'restlycore' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_responsive_control(
            'content_alignment',
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
                'default' => 'left',
                'toggle' => true,
                'selectors' => [
                    '{{WRAPPER}} .testimonial-v8-wrapper' => 'text-align: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'box_bg',
                'label' => esc_html__( 'Background', 'restlycore' ),
                'types' => [ 'classic', 'gradient', 'video' ],
                'selector' => '{{WRAPPER}} .testimonial-v8-wrapper',
            ]
        );
        $this->add_responsive_control(
            'box_after_color',
            [
                'label' => esc_html__( 'After Background Color', 'restlycore' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonial-v8-wrapper' => 'background-color: {{VALUE}}',
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
                    '{{WRAPPER}} .testimonial-v8-wrapper' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .testimonial-v8-wrapper' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'testimonial7_css_options',
            [
                'label' => esc_html__( 'Content', 'restlycore' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->start_controls_tabs(
            'testimonial_tabs'
        );

        $this->end_controls_tab();
            $this->start_controls_tab(
                'dec',
                [
                    'label' => __( 'dec', 'restlycore' ),
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name' => 'dec_typo',
                    'label' => esc_html__( 'Typography', 'restlycore' ),
                    'selector' => '{{WRAPPER}} .testimonial-v8-des',
                ]
            );
            $this->add_responsive_control(
                'dec_color',
                [
                    'label' => esc_html__( 'Title Color', 'restlycore' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .testimonial-v8-des' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_responsive_control(
                'dec_margin',
                [
                    'label' => esc_html__( 'Margin', 'restlycore' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .testimonial-v8-des' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
            $this->add_responsive_control(
                'dec_padding',
                [
                    'label' => esc_html__( 'Padding', 'restlycore' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .testimonial-v8-des' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
            $this->end_controls_tab();
            $this->start_controls_tab(
                'quite_tab',
                [
                    'label' => __( 'Quote', 'restlycore' ),
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name' => 'quite_typo',
                    'label' => esc_html__( 'Typography', 'restlycore' ),
                    'selector' => '{{WRAPPER}} .testimonial-v8-quotation',
                ]
            );
            $this->add_responsive_control(
                'quite_color',
                [
                    'label' => esc_html__( 'Color', 'restlycore' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .testimonial-v8-quotation' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_responsive_control(
                'quite_margin',
                [
                    'label' => esc_html__( 'Margin', 'restlycore' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .testimonial-v8-quotation' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
            $this->add_responsive_control(
                'quite_padding',
                [
                    'label' => esc_html__( 'Padding', 'restlycore' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .testimonial-v8-quotation' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
            $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();

        $this->start_controls_section(
            'testimonial_arrow_options',
            [
                'label' => esc_html__( 'Arrow', 'restlycore' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_responsive_control(
            'icon_min_width',
            [
                'label' => esc_html__( 'Width', 'restlycore'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px','%' ],
                'range' => [
                    'px' => [
                        'min' => 20,
                        'max' => 250,
                        'step' => 1,
                    ]
                ],
                'selectors' => [
                    '{{WRAPPER}} .testimonial-v8-arrow button' => 'width: {{SIZE}}{{UNIT}};',
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
                        'max' => 250,
                        'step' => 1,
                    ]
                ],
                'selectors' => [
                    '{{WRAPPER}} .testimonial-v8-arrow button' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );  
        $this->add_responsive_control(
            'arrow_icon_color',
            [
                'label' => esc_html__( 'Icon Color', 'restlycore' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonial-v8-arrow button' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'arrow_iconh_color',
            [
                'label' => esc_html__( 'Hover Color', 'restlycore' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonial-v8-arrow button:hover' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'arrow_bg',
            [
                'label' => esc_html__( 'Background Color', 'restlycore' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonial-v8-arrow button' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'arrow_hbg',
            [
                'label' => esc_html__( 'Hover Background', 'restlycore' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonial-v8-arrow button:hover' => 'background-color: {{VALUE}}',
                ],
            ]
        );
              
        $this->end_controls_section();
    }
    //Render
    protected function render() {
        $settings = $this->get_settings_for_display();
        $unique = rand(1241, 3256);
        ob_start();
        ?>
        <script>
			jQuery(document).ready(function($) {
				"use strict";
                    $('#testimonial<?php echo esc_attr($unique); ?>').slick({
                        dots: false,
                        infinite: <?php echo json_encode($settings['loop'] == 'yes' ? true : false ); ?>,
                        autoplay: <?php echo json_encode($settings['aplay'] == 'yes' ? true : false ); ?>,
                        autoplaySpeed: <?php echo json_encode( $settings['aspeed']); ?>,
                        arrows: <?php echo json_encode($settings['enable_arrows'] == 'yes' ? true : false ); ?>,
                        speed:  <?php echo json_encode( $settings['speed']); ?>,
                        prevArrow: $(".testimonial-prev"),
                        nextArrow: $(".testimonial-next"),
                        slidesToShow: 1,
                        slidesToScroll: 1,
                    });
			});
		</script>
        <div class="testimonial-v8-wrapper">
            <div class="testimonial-v8-box" id="testimonial<?php echo esc_attr($unique); ?>">
                <?php foreach($settings['items'] as $item) :?>
                    <div class="testimonial-v8-item">
                        <div class="testimonial-v8-quotation"> 
                            <?php \Elementor\Icons_Manager::render_icon( $item['quote'], [ 'aria-hidden' => 'true' ] ); ?>
                        </div>
                        <div class="testimonial-v8-des"> <?php echo esc_html($item['dec']); ?> </div>
                    </div>
                <?php endforeach;?>
            </div>
            <?php   if ( $settings['enable_arrows'] == 'yes' ) :?>
                <div class="testimonial-v8-arrow">
                        <button class="testimonial-prev"><i class="fas fa-arrow-left"></i></button>
                        <button class="testimonial-next"><i class="fas fa-arrow-right"></i></button>
                </div>
            <?php endif?>
        </div>
        <?php
        echo ob_get_clean();

    }
}
Plugin::instance()->widgets_manager->register( new testimonial_v8_widget );