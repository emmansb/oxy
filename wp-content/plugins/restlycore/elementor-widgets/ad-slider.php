<?php namespace Elementor;

class ad_slider_widget extends Widget_Base {

    public function get_name() {

        return 'ad_slider';
    }

    public function get_title() {
        return esc_html__( 'Restly Ad Slider', 'restlycore' );
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
            'brand_logo_options',
            [
                'label' => esc_html__( 'Brand Logo', 'restlycore' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
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
        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'title',
            [
                'label' => esc_html__( 'Title', 'restlycore' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Technology', 'restlycore' ),
                'show_label' => true,
            ]
        );
        $repeater->add_control(
            'title2',
            [
                'label' => esc_html__( 'Title Two', 'restlycore' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'INNOVATE', 'restlycore' ),
                'show_label' => true,
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

        $this->end_controls_section();

        $this->start_controls_section(
			'slide_option',
			[
				'label' => esc_html__( 'Slide Options', 'restlycore' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_responsive_control(
			'display',
			[
				'label'     => esc_html__( 'Display Item', 'restlycore' ),
				'type'      => \Elementor\Controls_Manager::NUMBER,
				'min'       => 1,
				'max'       => 30,
				'step'      => 1,
				'default'   => 1,
			]
		);
		$this->add_control(
			'clsl_loop',
			[
				'label'        => esc_html__( 'Enable Loop ', 'restlycore' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => esc_html__( 'On', 'restlycore' ),
				'label_off'    => esc_html__( 'Off', 'restlycore' ),
				'return_value' => 'yes',
				'default'      => 'yes',
			]
		);
		$this->add_responsive_control(
			'clsl_speed',
			[
				'label'     => esc_html__( 'Slide Speed', 'restlycore' ),
				'type'      => Controls_Manager::NUMBER,
				'min'       => 500,
				'max'       => 8000,
				'step'      => 10,
				'default'   => 4000,
			]
		);
		$this->add_responsive_control(
			'clsl_aloop',
			[
				'label'        => esc_html__( 'Enable Auto Loop ', 'restlycore' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => esc_html__( 'On', 'restlycore' ),
				'label_off'    => esc_html__( 'Off', 'restlycore' ),
				'return_value' => 'yes',
				'default'      => 'yes',
			]
		);
		$this->add_responsive_control(
			'clsl_aspeed',
			[
				'label'     => esc_html__( 'Slide auto Speed', 'restlycore' ),
				'type'      => Controls_Manager::NUMBER,
				'min'       => 500,
				'max'       => 8000,
				'step'      => 50,
				'default'   => 3000,
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
				'selector' => '{{WRAPPER}} .add-slider-item',
			]
		);
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'box_shadow',
                'label' => esc_html__( 'Box Shadow', 'restlycore' ),
				'selectors'=> [
				   'selector' => '{{WRAPPER}} .add-slider-item',
                ],
            ]
        );
        $this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'box_border',
				'selector' => '{{WRAPPER}} .add-slider-item',
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
                    '{{WRAPPER}} .add-slider-item' => 'border-radius: {{SIZE}}{{UNIT}};',
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
					 '{{WRAPPER}} .add-slider-item' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .add-slider-item ' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
			'brand_CSS_options',
			[
				'label' => esc_html__( 'Item', 'restlycore' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name'     => 'brand_CSS_item_shadow',
				'label'    => esc_html__( 'Box Shadow', 'restlycore' ),
				'selector' => '{{WRAPPER}} .ad-slider_title img',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name'     => 'brand_CSS_item_border',
				'label'    => esc_html__( 'Border', 'restlycore' ),
				'selector' => '{{WRAPPER}} .ad-slider_title img',
			]
		);
		$this->add_responsive_control(
			'brand_CSS_item_radius',
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
					'{{WRAPPER}} .ad-slider_title img' => 'border-radius: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'brand_CSS_item_margin',
			[
				'label'      => esc_html__( 'Margin', 'restlycore' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%', 'em'],
				'selectors'  => [
					'{{WRAPPER}} .ad-slider_title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'brand_CSS_item_padding',
			[
				'label'      => esc_html__( 'Padding', 'restlycore' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%', 'em'],
				'selectors'  => [
					'{{WRAPPER}} .ad-slider_title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section();
    }
    //Render
    protected function render() {
        $settings = $this->get_settings_for_display();
        $dynamic_id = rand( 1241, 3256 );
			echo '
                <script>
                jQuery(document).ready(function($) {
                "use strict";
                $("#ad-slide-' . esc_attr( $dynamic_id ) . '").slick({
                slidesToShow:' . json_encode( $settings['display'] ) . ',
                slidesToScroll: 5,
                rtl: ' . json_encode( is_rtl() == 'yes' ? true : false ) . ',
                dots: false,
                arrows: false,
                infinite: ' . json_encode( $settings['clsl_loop'] == 'yes' ? true : false ) . ',
                autoplay: ' . json_encode( $settings['clsl_aloop'] == 'yes' ? true : false ) . ',';
			if ( $settings['clsl_loop'] == 'yes' ) {
				echo 'speed: ' . esc_attr( $settings['clsl_speed'] ) . ',';
			}
			if ( $settings['clsl_aloop'] == 'yes' ) {
				echo 'autoplaySpeed: ' . esc_attr( $settings['clsl_aspeed'] ) . ',';
			}
			echo '
            responsive: [
                {
                    breakpoint: 991,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                    }
                },
            ]
                });
            });
        </script>';

		if ( $settings['enable_container'] == 'yes' ) {
            $container = 'container-fluid';
        } else {
            $container = 'container';
        }
        ob_start();
        ?>
            <div class="<?php echo esc_attr( $container ); ?>">
                <div class="row">
                    <div class="add-slider-item" id="ad-slide-<?php echo esc_attr( $dynamic_id ); ?>">
                        <?php foreach ( $settings['items'] as $item ):?>
                            <h2 class="ad-slider_title"><?php echo esc_html($item['title']); ?><span><?php echo esc_html($item['title2']); ?></span></h2>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        <?php
        echo ob_get_clean();
    }
}
Plugin::instance()->widgets_manager->register( new ad_slider_widget );