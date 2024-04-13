<?php namespace Elementor;

class restly_brand_logo_two_Widget extends Widget_Base {

    public function get_name() {

        return 'brand_logo_two';
    }

    public function get_title() {
        return esc_html__( 'Restly Client Logo V2', 'restlycore' );
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
            'brand_logo_options',
            [
                'label' => esc_html__( 'Brand Logo Two', 'restlycore' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );
        $repeater = new \Elementor\Repeater();
		$repeater->add_control(
			'image',
			[
				'label' => esc_html__( 'Choose Image', 'restlycore' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);
		$repeater->add_control(
			'enable_link',
			[
				'label'        => esc_html__( 'Enable URL', 'restlycore' ),
				'type'         => \Elementor\Controls_Manager::SWITCHER,
				'label_on'     => esc_html__( 'Show', 'restlycore' ),
				'label_off'    => esc_html__( 'Hide', 'restlycore' ),
				'return_value' => 'yes',
				'default'      => 'no',
				'dynamic'      => [
					'active' => true,
				],
			]
		);
		$repeater->add_control(
			'url',
			[
				'label'         => __( 'Link', 'restlycore' ),
				'type'          => \Elementor\Controls_Manager::URL,
				'placeholder'   => __( 'https://your-link.com', 'restlycore' ),
				'show_external' => true,
				'default'       => [
					'url'         => '',
					'is_external' => true,
					'nofollow'    => true,
				],
				'condition'     => [
					'enable_link' => 'yes',
				],
				'dynamic'       => [
					'active' => true,
				],
			]
		);
		$this->add_control(
			'items',
			[
				'label'   => esc_html__( 'Logo List', 'restlycore' ),
				'type'    => \Elementor\Controls_Manager::REPEATER,
				'fields'  => $repeater->get_controls(),
				'default' => [
					[
						'image' => '',
					],
				],
			]
		);
		$this->add_control(
            'enable_container',
            [
                'label'        => esc_html__( 'Enable Container', 'restlycore' ),
                'type'         => \Elementor\Controls_Manager::SWITCHER,
                'label_on'     => esc_html__( 'Show', 'restlycore' ),
                'label_off'    => esc_html__( 'Hide', 'restlycore' ),
                'return_value' => 'yes',
                'default'      => 'yes',
            ]
        );
        $this->add_control(
			'filter',
			[
				'label'      => esc_html__( 'Filter', 'restlycore' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => ['px'],
				'range'      => [
					'px' => [
						'min'  => 0,
						'max'  => 100,
						'step' => 1,
					],
				],
				'selectors'  => [
					'{{WRAPPER}} .brand-logo-v2-img img' => 'filter: contrast({{SIZE}}%);',
					'{{WRAPPER}} .brand-logo-v2-img img' => '-webkit-filter: contrast({{SIZE}}%);',
				],
			]
		);
		$this->add_control(
			'hfilter',
			[
				'label'      => esc_html__( 'Hover Filter', 'restlycore' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => ['px'],
				'range'      => [
					'px' => [
						'min'  => 0,
						'max'  => 100,
						'step' => 1,
					],
				],
				'selectors'  => [
					'{{WRAPPER}} .brand-logo-v2-img:hover img' => 'filter: contrast({{SIZE}}%);',
					'{{WRAPPER}} .brand-logo-v2-img:hover img' => '-webkit-filter: contrast({{SIZE}}%);',
				],
			]
		);
		$this->add_control(
            'desktop_col',
            [
                'label'     => __( 'Columns On Desktop', 'restlycore' ),
                'type'      => Controls_Manager::SELECT,
                'default'   => 'col-xl-3',
                'options'   => [
                    'col-xl-12' => __( '1 Column', 'restlycore' ),
                    'col-xl-6'  => __( '2 Column', 'restlycore' ),
                    'col-xl-4'  => __( '3 Column', 'restlycore' ),
                    'col-xl-3'  => __( '4 Column', 'restlycore' ),
                    'col-xl-2'  => __( '6 Column', 'restlycore' ),
                ],
            ]
        );

        $this->add_control(
            'laptop_col',
            [
                'label'     => __( 'Columns for Laptop', 'restlycore' ),
                'type'      => Controls_Manager::SELECT,
                'default'   => 'col-lg-3',
                'options'   => [
                    'col-lg-12' => __( '1 Column', 'restlycore' ),
                    'col-lg-6'  => __( '2 Column', 'restlycore' ),
                    'col-lg-4'  => __( '3 Column', 'restlycore' ),
                    'col-lg-3'  => __( '4 Column', 'restlycore' ),
                    'col-lg-2'  => __( '6 Column', 'restlycore' ),
                ],
            ]
        );

        $this->add_control(
            'tab_col',
            [
                'label'     => __( 'Columns On Tablet', 'restlycore' ),
                'type'      => Controls_Manager::SELECT,
                'default'   => 'col-md-6',
                'options'   => [
                    'col-md-12' => __( '1 Column', 'restlycore' ),
                    'col-md-6'  => __( '2 Column', 'restlycore' ),
                    'col-md-4'  => __( '3 Column', 'restlycore' ),
                    'col-md-3'  => __( '4 Column', 'restlycore' ),
                    'col-md-2'  => __( '6 Column', 'restlycore' ),
                ],
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'box_css_options',
            [
                'label' => esc_html__( 'Box', 'restlycore' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'box_background',
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .single-client.image-switcher',
				'separator' => 'before',
			]
		);
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'box_shadow',
                'label' => esc_html__( 'Box Shadow', 'restlycore' ),
				'selectors'=> [
				   'selector' => '{{WRAPPER}} .single-client.image-switcher',
                ],
            ]
        );
        $this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'box_border',
				'selector' => '{{WRAPPER}} .single-client.image-switcher',
			]
		);
        $this->add_responsive_control(
            'border_color',
            [
                'label' => esc_html__( 'Border Color', 'restlycore' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .single-client.image-switcher' => 'border-color: {{VALUE}}',
                    '{{WRAPPER}} .restly-brand-logo-wrapper-two .row' => 'border-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'box_border_radius',
            [
                'label' => esc_html__( 'Border Radius', 'restlycore' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .single-client.image-switcher' => 'border-radius: {{SIZE}}{{UNIT}};',
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
					 '{{WRAPPER}} .single-client.image-switcher' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .single-client.image-switcher ' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();
 
    }
    //Render
    protected function render() {
        $settings = $this->get_settings_for_display();
		$column = $settings['desktop_col'] . ' ' . $settings['laptop_col'] . ' ' . $settings['tab_col'];
		if ( $settings['enable_container'] == 'yes' ) {
            $container = 'container';
        } else {
            $container = 'container-fluid';
        }
        ob_start();
        ?>
            <div class="restly-brand-logo-wrapper-two">
				<div class="<?php echo esc_attr( $container ); ?>">
                    <div class="row">
						<?php foreach ( $settings['items'] as $item ):
						?>
						<div class="<?php echo esc_attr( $column ); ?>">
							<div class="single-client image-switcher">
								<div class="brand-logo-v2-img">
									<?php echo wp_get_attachment_image( $item['image']['id'], 'full' );?>                                    
								</div>
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
Plugin::instance()->widgets_manager->register( new restly_brand_logo_two_Widget );
