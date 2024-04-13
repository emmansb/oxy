<?php namespace Elementor;

class restly_image_v3_Widget extends Widget_Base {

    public function get_name() {

        return 'restly_image_V3';
    }

    public function get_title() {
        return esc_html__( 'Restly image v3', 'restlycore' );
    }

    public function get_icon() {

        return 'eicon-image';
    }

    public function get_categories() {
        return ['restly'];
    }

    protected function register_controls() {
		
        //Content tab start
        $this->start_controls_section(
            'restly_image_options',
            [
                'label' => esc_html__( 'Restly image', 'restlycore' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
			'image',
			[
				'label' => __( 'Choose Image', 'restlycore' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);
        $this->add_control(
			'image_one',
			[
				'label' => __( 'Small Image', 'restlycore' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);
        $this->add_control(
			'image_two',
			[
				'label' => __( 'Small Image', 'restlycore' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

		
        $this->end_controls_section();
        $this->start_controls_section(
            'restly_image_CSS',
            [
                'label' => esc_html__( 'Restly image', 'restlycore' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_responsive_control(
            'align',
            [
                'label' => __( 'Alignment', 'restlycore' ),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'flex-start' => [
                        'title' => __( 'Left', 'restlycore' ),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => __( 'Center', 'restlycore' ),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'flex-end' => [
                        'title' => __( 'Right', 'restlycore' ),
                        'icon' => 'eicon-text-align-right',
                    ],
                ],
                'toggle' => true,
                'selectors' => [
                    '{{WRAPPER}} .restly-image-V3-wrapper' => 'justify-content: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'width',
            [
                'label' => esc_html__( 'Width', 'restlycore' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%' ],
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
                'selectors' => [
                    '{{WRAPPER}} .restly-image-v3-img1 > img' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'height',
            [
                'label' => esc_html__( 'Height', 'restlycore' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%' ],
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
                'selectors' => [
                    '{{WRAPPER}} .restly-image-v3-img1 > img' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'object',
            [
                'label'     => esc_html__( 'Object Fit', 'restlycore' ),
                'type'      => \Elementor\Controls_Manager::SELECT,
                'default'   => 'cover',
                'options'   => [
                    'fill'    => esc_html__( 'Fill', 'restlycore' ),
                    'contain' => esc_html__( 'Contain', 'restlycore' ),
                    'cover'   => esc_html__( 'Cover', 'restlycore' ),
                    'none'    => esc_html__( 'none', 'restlycore' ),
                ],
                'selectors' => [
                    '{{WRAPPER}} .restly-image-v3-img1 > img' => 'object-fit: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'image_border',
                'label' => esc_html__( 'Border', 'restlycore' ),
                'selector' => '{{WRAPPER}} .restly-image-v3-img1 > img',
            ]
        );
        $this->add_responsive_control(
            'image_radius',
            [
                'label' => esc_html__( 'Border Radius', 'restlycore' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .restly-image-v3-img1 > img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'image_shadow',
                'label' => esc_html__( 'Image Shadow', 'restlycore' ),
                'selector' => '{{WRAPPER}} .restly-image-v3-img1 > img',
            ]
        );
        $this->add_responsive_control(
            'image_margin',
            [
                'label' => esc_html__( 'Margin', 'restlycore' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .restly-image-v3-img1' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .restly-image-v3-img1' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();
        $this->start_controls_section(
            'simage_one_style',
            [
                'label' => esc_html__( 'Image Two', 'restlycore' ),
                'tab'   => Controls_Manager::TAB_STYLE,

            ]
        );
        $this->add_responsive_control(
            'image_one_width',
            [
                'label' => esc_html__( 'Width', 'restlycore' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%' ],
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
                'selectors' => [
                    '{{WRAPPER}} .restly-image-v3-right-img img' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'image_one_height',
            [
                'label' => esc_html__( 'Height', 'restlycore' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%' ],
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
                'selectors' => [
                    '{{WRAPPER}} .restly-image-v3-right-img img' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'image_one_object',
            [
                'label'     => esc_html__( 'Object Fit', 'restlycore' ),
                'type'      => \Elementor\Controls_Manager::SELECT,
                'default'   => 'cover',
                'options'   => [
                    'fill'    => esc_html__( 'Fill', 'restlycore' ),
                    'contain' => esc_html__( 'Contain', 'restlycore' ),
                    'cover'   => esc_html__( 'Cover', 'restlycore' ),
                    'none'    => esc_html__( 'none', 'restlycore' ),
                ],
                'selectors' => [
                    '{{WRAPPER}} .restly-image-v3-right-img img' => 'object-fit: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'image_one_border',
                'label' => esc_html__( 'Border', 'restlycore' ),
                'selector' => '{{WRAPPER}} .restly-image-v3-right-img img',
            ]
        );
        $this->add_responsive_control(
            'image_one_radius',
            [
                'label' => esc_html__( 'Border Radius', 'restlycore' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .restly-image-v3-right-img img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'image_one_shadow',
                'label' => esc_html__( 'Image Shadow', 'restlycore' ),
                'selector' => '{{WRAPPER}} .restly-image-v3-right-img img',
            ]
        );
        $this->add_responsive_control(
            'image_one_margin',
            [
                'label' => esc_html__( 'Margin', 'restlycore' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .restly-image-v3-right-img' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'image_one_padding',
            [
                'label' => esc_html__( 'Padding', 'restlycore' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .restly-image-v3-right-img' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'simage_two_style',
            [
                'label' => esc_html__( 'Small Image', 'restlycore' ),
                'tab'   => Controls_Manager::TAB_STYLE,

            ]
        );
        $this->add_responsive_control(
            'image_two_width',
            [
                'label' => esc_html__( 'Width', 'restlycore' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%' ],
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
                'selectors' => [
                    '{{WRAPPER}} .restly-image-v3-img2 img' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'image_two_height',
            [
                'label' => esc_html__( 'Height', 'restlycore' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%' ],
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
                'selectors' => [
                    '{{WRAPPER}} .restly-image-v3-img2 img' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'image_two_object',
            [
                'label'     => esc_html__( 'Object Fit', 'restlycore' ),
                'type'      => \Elementor\Controls_Manager::SELECT,
                'default'   => 'cover',
                'options'   => [
                    'fill'    => esc_html__( 'Fill', 'restlycore' ),
                    'contain' => esc_html__( 'Contain', 'restlycore' ),
                    'cover'   => esc_html__( 'Cover', 'restlycore' ),
                    'none'    => esc_html__( 'none', 'restlycore' ),
                ],
                'selectors' => [
                    '{{WRAPPER}} .restly-image-v3-img2 img' => 'object-fit: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'image_two_border',
                'label' => esc_html__( 'Border', 'restlycore' ),
                'selector' => '{{WRAPPER}} .restly-image-v3-img2 img',
            ]
        );
        $this->add_responsive_control(
            'image_two_radius',
            [
                'label' => esc_html__( 'Border Radius', 'restlycore' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .restly-image-v3-img2 img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'image_two_shadow',
                'label' => esc_html__( 'Image Shadow', 'restlycore' ),
                'selector' => '{{WRAPPER}} .restly-image-v3-img2 img',
            ]
        );
        $this->add_responsive_control(
            'image_two_margin',
            [
                'label' => esc_html__( 'Margin', 'restlycore' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .restly-image-v3-img2' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'image_two_padding',
            [
                'label' => esc_html__( 'Padding', 'restlycore' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .restly-image-v3-img2' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();
    }
    //Render
    protected function render() {
        $settings = $this->get_settings_for_display();
        ob_start();
        ?>
        <div class="restly-image-V3-wrapper">
            <div class="restly-image-V3-left-img">
                <div class="restly-image-v3-img1">
                    <?php echo wp_get_attachment_image( $settings['image']['id'], 'full' ); ?>
                </div>
                <div class="restly-image-v3-img2">
                    <?php echo wp_get_attachment_image( $settings['image_one']['id'], 'full' ); ?> 
                </div>
            </div>
            <div class="restly-image-v3-right-img">
                <?php echo wp_get_attachment_image( $settings['image_two']['id'], 'full' ); ?>
            </div>
        </div>
        <?php
        echo ob_get_clean();
    }
}
Plugin::instance()->widgets_manager->register( new restly_image_v3_Widget );