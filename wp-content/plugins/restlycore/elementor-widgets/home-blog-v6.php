<?php namespace Elementor;

class restly_home_blog_v6_Widget extends Widget_Base {

    public function get_name() {

        return 'blog_six';
    }

    public function get_title() {
        return esc_html__( 'Restly Blog V6', 'restlycore' );
    }

    public function get_icon() {

        return 'eicon-shape';
    }

    public function get_categories() {
        return ['restly'];
    }

    protected function register_controls() {
        $options = array();
        $args = array(
            'hide_empty' => false,
        );
        $categories = get_categories( $args );

        foreach ( $categories as $key => $category ) {
            $options[$category->term_id] = $category->name;
        }
        //Content tab start
        $this->start_controls_section(
            'blog_options',
            [
                'label' => esc_html__( 'Blog', 'restlycore' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
			'select_style',
			[
				'label' => esc_html__( 'Select Style', 'restlycore' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'one',
				'options' => [
					'one' => esc_html__( 'One', 'restlycore' ),
					'two'  => esc_html__( 'Two', 'restlycore' ),
				],
			]
		);
        $this->add_control(
            'note9',
            [
                'label' => __( 'Display Item Settings', 'restlycore' ),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'item_show',
            [
                'label'   => esc_html__( 'Display Item', 'restlycore' ),
                'type'    => \Elementor\Controls_Manager::NUMBER,
                'min'     => 1,
                'max'     => 100,
                'step'    => 1,
                'default' => 3,
            ]
        );
        $this->add_control(
            'note3',
            [
                'label' => __( 'Enable Category Settings', 'restlycore' ),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'enable_cat',
            [
                'label'        => esc_html__( 'Post By Category', 'restlycore' ),
                'type'         => \Elementor\Controls_Manager::SWITCHER,
                'label_on'     => esc_html__( 'Show', 'restlycore' ),
                'label_off'    => esc_html__( 'Hide', 'restlycore' ),
                'return_value' => 'yes',
                'default'      => 'no',
            ]
        );
        $this->add_control(
            'note4',
            [
                'label' => __( 'Category Settings', 'restlycore' ),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
                'condition' => [
                    'enable_cat' => 'yes',
                ],
            ]
        );
        $this->add_control(
            'post_cat',
            [
                'label'     => __( 'Select Categoris', 'restlycore' ),
                'type'      => \Elementor\Controls_Manager::SELECT2,
                'multiple'  => true,
                'options'   => $options,
                'condition' => [
                    'enable_cat' => 'yes',
                ],
            ]
        );
        $this->add_control(
            'note5',
            [
                'label' => __( 'Order By Settings', 'restlycore' ),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'orderby',
            [
                'label'   => esc_html__( 'Order by', 'restlycore' ),
                'type'    => Controls_Manager::SELECT,
                'default' => 'none',
                'options' => [
                    'none'          => esc_html__( 'None', 'restlycore' ),
                    'ID'            => esc_html__( 'ID', 'restlycore' ),
                    'date'          => esc_html__( 'Date', 'restlycore' ),
                    'name'          => esc_html__( 'Name', 'restlycore' ),
                    'title'         => esc_html__( 'Title', 'restlycore' ),
                    'comment_count' => esc_html__( 'Comment count', 'restlycore' ),
                    'rand'          => esc_html__( 'Random', 'restlycore' ),
                ],
            ]
        );
        $this->add_control(
            'note6',
            [
                'label' => __( 'Order Settings', 'restlycore' ),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'order',
            [
                'label'   => esc_html__( 'Order By', 'restlycore' ),
                'type'    => \Elementor\Controls_Manager::SELECT,
                'default' => 'ASC',
                'options' => [
                    'ASC'  => esc_html__( 'ASC', 'restlycore' ),
                    'DESE' => esc_html__( 'DESE', 'restlycore' ),
                ],
            ]
        );
        $this->add_control(
            'note7',
            [
                'label' => __( 'Title Settings', 'restlycore' ),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'title_lanth',
            [
                'label'   => esc_html__( 'Title Lanth ', 'restlycore' ),
                'type'    => \Elementor\Controls_Manager::NUMBER,
                'min'     => 1,
                'max'     => 20,
                'step'    => 1,
                'default' => 7,
            ]
        );
        $this->add_control(
            'title_tag',
            [
                'label' => esc_html__( 'HTML Tag', 'restlycore' ),
                'description' => esc_html__( 'Add HTML Tag For Small Title', 'restlycore' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'h4',
                'options' => [
                    'h1'  => esc_html__( 'H1', 'restlycore' ),
                    'h2'  => esc_html__( 'H2', 'restlycore' ),
                    'h3'  => esc_html__( 'H3', 'restlycore' ),
                    'h4'  => esc_html__( 'H4', 'restlycore' ),
                    'h5'  => esc_html__( 'H5', 'restlycore' ),
                    'h6'  => esc_html__( 'H6', 'restlycore' ),
                    'p'  => esc_html__( 'P', 'restlycore' ),
                    'span'  => esc_html__( 'span', 'restlycore' ),
                    'div'  => esc_html__( 'Div', 'restlycore' ),
                ],
            ]
        );
        $this->add_control(
            'note8',
            [
                'label' => __( 'Content Settings', 'restlycore' ),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'enable_dec',
            [
                'label' => esc_html__( 'Enable Content', 'restlycore' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Show', 'restlycore' ),
                'label_off' => esc_html__( 'Hide', 'restlycore' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );
        $this->add_control(
            'dec_lanth',
            [
                'label'   => esc_html__( 'Content Lanth ', 'restlycore' ),
                'type'    => \Elementor\Controls_Manager::NUMBER,
                'min'     => 1,
                'max'     => 50,
                'step'    => 1,
                'default' => 12,
                'condition' => [
                    'enable_dec' => 'yes',
                ],
            ]
        );
        $this->add_control(
            'enable_button',
            [
                'label'        => esc_html__( 'Button Enable', 'restlycore' ),
                'type'         => \Elementor\Controls_Manager::SWITCHER,
                'label_on'     => esc_html__( 'Show', 'restlycore' ),
                'label_off'    => esc_html__( 'Hide', 'restlycore' ),
                'return_value' => 'yes',
                'default'      => 'yes',
            ]
        );
        $this->add_control(
            'button_text',
            [
                'label' => esc_html__( 'Buttom Test', 'restlycore' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Read More', 'restlycore' ),
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => [
                    'enable_button' => 'yes',
                ],
            ]
        );
        $this->add_control(
            'note114',
            [
                'label' => __( 'Author Settings', 'restlycore' ),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'enable_author',
            [
                'label'        => esc_html__( 'Author Enable', 'restlycore' ),
                'type'         => \Elementor\Controls_Manager::SWITCHER,
                'label_on'     => esc_html__( 'Show', 'restlycore' ),
                'label_off'    => esc_html__( 'Hide', 'restlycore' ),
                'return_value' => 'yes',
                'default'      => 'yes',
            ]
        );
        
        $this->add_control(
            'note012',
            [
                'label' => __( 'Container Settings', 'restlycore' ),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'note10',
            [
                'label' => __( 'Post navication Settings', 'restlycore' ),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'navication',
            [
                'label'        => esc_html__( 'Pagination', 'restlycore' ),
                'type'         => \Elementor\Controls_Manager::SWITCHER,
                'label_on'     => esc_html__( 'Show', 'restlycore' ),
                'label_off'    => esc_html__( 'Hide', 'restlycore' ),
                'return_value' => 'yes',
                'default'      => 'no',
            ]
        );
        $this->add_control(
            'container',
            [
                'label' => esc_html__( 'Enable Container', 'restlycore' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Show', 'restlycore' ),
                'label_off' => esc_html__( 'Hide', 'restlycore' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );
        $this->add_control(
            'note12',
            [
                'label' => __( 'Column Settings', 'restlycore' ),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'enable_slide',
            [
                'label'        => esc_html__( 'Enable Slide', 'restlycore' ),
                'type'         => \Elementor\Controls_Manager::SWITCHER,
                'label_on'     => esc_html__( 'Show', 'restlycore' ),
                'label_off'    => esc_html__( 'Hide', 'restlycore' ),
                'return_value' => 'yes',
                'default'      => 'no',
            ]
        );
        $this->add_control(
            'desktop_col',
            [
                'label'   => __( 'Columns On Desktop', 'restlycore' ),
                'type'    => Controls_Manager::SELECT,
                'default' => 'col-xl-4',
                'options' => [
                    'col-xl-12' => __( '1 Column', 'restlycore' ),
                    'col-xl-6'  => __( '2 Column', 'restlycore' ),
                    'col-xl-4'  => __( '3 Column', 'restlycore' ),
                    'col-xl-3'  => __( '4 Column', 'restlycore' ),
                    'col-xl-2'  => __( '6 Column', 'restlycore' ),
                ],
                'condition' => [
                    'enable_slide!' => 'yes',
                ],
            ]
        );
        $this->add_control(
            'laptop_col',
            [
                'label'   => __( 'Columns for Laptop', 'restlycore' ),
                'type'    => Controls_Manager::SELECT,
                'default' => 'col-lg-4',
                'options' => [
                    'col-lg-12' => __( '1 Column', 'restlycore' ),
                    'col-lg-6'  => __( '2 Column', 'restlrestlycoreycore' ),
                    'col-lg-4'  => __( '3 Column', 'restlycore' ),
                    'col-lg-3'  => __( '4 Column', 'restlycore' ),
                    'col-lg-2'  => __( '6 Column', 'restlycore' ),
                ],
                'condition' => [
                    'enable_slide!' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'tab_col',
            [
                'label'   => __( 'Columns On Tablet', 'restlycore' ),
                'type'    => Controls_Manager::SELECT,
                'default' => 'col-md-6',
                'options' => [
                    'col-md-12' => __( '1 Column', 'restlycore' ),
                    'col-md-6'  => __( '2 Column', 'restlycore' ),
                    'col-md-4'  => __( '3 Column', 'restlycore' ),
                    'col-md-3'  => __( '4 Column', 'restlycore' ),
                    'col-md-2'  => __( '6 Column', 'restlycore' ),
                ],
                'condition' => [
                    'enable_slide!' => 'yes',
                ],
            ]
        );
        $this->add_control(
            'display_item_show',
            [
                'label'     => esc_html__( 'slide To Show', 'restlycore' ),
                'type'      => \Elementor\Controls_Manager::NUMBER,
                'min'       => 1,
                'max'       => 6,
                'step'      => 1,
                'default'   => 3,
                'condition' => [
                    'enable_slide' => 'yes',
                ],
            ]
        );
        $this->add_control(
            'item_scroll',
            [
                'label'     => esc_html__( 'Slide TO Scroll', 'restlycore' ),
                'type'      => \Elementor\Controls_Manager::NUMBER,
                'min'       => 1,
                'max'       => 6,
                'step'      => 1,
                'default'   => 3,
                'condition' => [
                    'enable_slide' => 'yes',
                ],
            ]
        );
        $this->add_control(
            'dots',
            [
                'label'        => esc_html__( 'Enable Dots', 'restlycore' ),
                'type'         => \Elementor\Controls_Manager::SWITCHER,
                'label_on'     => esc_html__( 'Show', 'restlycore' ),
                'label_off'    => esc_html__( 'Hide', 'restlycore' ),
                'return_value' => 'yes',
                'default'      => 'yes',
                'condition'    => [
                    'enable_slide' => 'yes',
                ],
            ]
        );
        $this->add_control(
            'speed',
            [
                'label'       => __( 'Speed', 'restlycore' ),
                'type'        => Controls_Manager::SELECT,
                'show_label'  => true,
                'label_block' => false,
                'options'     => [
                    '200'  => __( '200 m seconds', 'restlycore' ),
                    '300'  => __( '300 m seconds', 'restlycore' ),
                    '400'  => __( '400 m seconds', 'restlycore' ),
                    '500'  => __( '500 m seconds', 'restlycore' ),
                    '600'  => __( '600 m seconds', 'restlycore' ),
                    '700'  => __( '700 m seconds', 'restlycore' ),
                    '800'  => __( '800 m seconds', 'restlycore' ),
                    '900'  => __( '900 m seconds', 'restlycore' ),
                    '1000' => __( '1 seconds', 'restlycore' ),
                    '2000' => __( '2 seconds', 'restlycore' ),
                    '3000' => __( '3 seconds', 'restlycore' ),
                ],
                'default'     => '400',
                'condition'   => [
                    'enable_slide' => 'yes',
                ],
            ]
        );
        $this->add_control(
            'loop',
            [
                'label'        => esc_html__( 'Enable Loop', 'restlycore' ),
                'type'         => \Elementor\Controls_Manager::SWITCHER,
                'label_on'     => esc_html__( 'Show', 'restlycore' ),
                'label_off'    => esc_html__( 'Hide', 'restlycore' ),
                'return_value' => 'yes',
                'default'      => 'yes',
                'condition'    => [
                    'enable_slide' => 'yes',
                ],
            ]
        );
        $this->add_control(
            'autoplay',
            [
                'label'        => esc_html__( 'Enable AutoPlay', 'restlycore' ),
                'type'         => \Elementor\Controls_Manager::SWITCHER,
                'label_on'     => esc_html__( 'Show', 'restlycore' ),
                'label_off'    => esc_html__( 'Hide', 'restlycore' ),
                'return_value' => 'yes',
                'default'      => 'yes',
                'condition'    => [
                    'enable_slide' => 'yes',
                ],
            ]
        );
        $this->add_control(
            'autoplay_speed',
            [
                'label'       => __( 'Autoplay Speed', 'restlycore' ),
                'type'        => Controls_Manager::SELECT,
                'show_label'  => true,
                'label_block' => false,
                'options'     => [
                    '2000'  => __( '2 seconds', 'restlycore' ),
                    '3000'  => __( '3 seconds', 'restlycore' ),
                    '4000'  => __( '4 seconds', 'restlycore' ),
                    '5000'  => __( '5 seconds', 'restlycore' ),
                    '6000'  => __( '6 seconds', 'restlycore' ),
                    '7000'  => __( '7 seconds', 'restlycore' ),
                    '8000'  => __( '8 seconds', 'restlycore' ),
                    '9000'  => __( '9 seconds', 'restlycore' ),
                    '10000' => __( '10 seconds', 'restlycore' ),
                ],
                'default'     => '4000',
                'condition'   => [
                    'enable_slide' => 'yes',
                ],
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'box_css',
            [
                'label' => esc_html__( 'Box', 'restlycore' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'box_bg',
                'label' => esc_html__( 'Background', 'restlycore' ),
                'types' => [ 'classic', 'gradient', 'video' ],
                'selector' => '{{WRAPPER}} .restly-blog-v6-inner-box .restly-blog-v6-inner',
            ]
        );
        $this->add_responsive_control(
            'box_margin',
            [
                'label' => esc_html__( 'Margin', 'restlycore' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .restly-blog-v6-inner-box .restly-blog-v6-inner' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .restly-blog-v6-inner-box .restly-blog-v6-inner' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'box_border',
                'label' => esc_html__( 'Border', 'restlycore' ),
                'selector' => '{{WRAPPER}} .restly-blog-v6-inner-box .restly-blog-v6-inner',
            ]
        );
        $this->add_responsive_control(
            'box_radius',
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
                    '{{WRAPPER}} .restly-blog-v6-inner-box .restly-blog-v6-inner' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'box_shadow',
                'label' => esc_html__( 'Box Shadow', 'restlycore' ),
                'selector' => '{{WRAPPER}} .restly-blog-v6-inner-box .restly-blog-v6-inner',
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'image_css',
            [
                'label' => esc_html__( 'Image', 'restlycore' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_responsive_control(
            'image_height',
            [
                'label' => esc_html__( 'Height', 'restlycore' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px','%' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 800,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                ],
                'selectors' => [
                    '{{WRAPPER}} .restly-blog-v6-inner-box .restly-blog-v6-inner .restly-blog-v6-image img' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'min-image_height',
            [
                'label' => esc_html__( 'Min Height', 'restlycore' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px','%' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 800,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                ],
                'selectors' => [
                    '{{WRAPPER}} .restly-blog-v6-inner-box .restly-blog-v6-inner .restly-blog-v6-image img' => 'min-height: {{SIZE}}{{UNIT}};',
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
                    '{{WRAPPER}} .restly-blog-v6-inner-box .restly-blog-v6-inner .restly-blog-v6-image img' => 'object-fit: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'image_border',
                'label' => esc_html__( 'Border', 'restlycore' ),
                'selector' => '{{WRAPPER}} .restly-blog-v6-inner-box .restly-blog-v6-inner .restly-blog-v6-image img',
            ]
        );
        
        $this->add_responsive_control(
            'image_radius',
            [
                'label' => esc_html__( 'Border Rradius', 'restlycore' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .restly-blog-v6-inner-box .restly-blog-v6-inner .restly-blog-v6-image img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'image_margin',
            [
                'label' => esc_html__( 'Margin', 'restlycore' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .restly-blog-v6-inner .restly-blog-v6-image' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .restly-blog-v6-inner .restly-blog-v6-image' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();
        
        // =================================================
        // ========== CONTENT Inner Box STYLE CSS ==========
        // =================================================

        $this->start_controls_section(
            'content_box_css',
            [
                'label' => esc_html__( 'Content Inner Box', 'restlycore' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_responsive_control(
            'cbox_align',
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
                    'justify' => [
                        'title' => __( 'Justify', 'restlycore' ),
                        'icon' => 'eicon-text-align-justify',
                    ],
                    'right' => [
                        'title' => __( 'Right', 'restlycore' ),
                        'icon' => 'eicon-text-align-right',
                    ],
                ],
                'default' => 'left',
                'toggle' => true,
                'selectors' => [
                    '{{WRAPPER}} .restly-blog-v6-inner-box .restly-blog-v6-inner .restly-blog-v6-content' => 'text-align: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'cbox_bg',
                'label' => esc_html__( 'Background', 'restlycore' ),
                'types' => [ 'classic', 'gradient', 'video' ],
                'selector' => '{{WRAPPER}} .restly-blog-v6-inner-box .restly-blog-v6-inner .restly-blog-v6-content',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'cbox_border',
                'label' => esc_html__( 'Border', 'restlycore' ),
                'selector' => '{{WRAPPER}} .restly-blog-v6-inner-box .restly-blog-v6-inner .restly-blog-v6-content',
            ]
        );

        $this->add_responsive_control(
            'cbox_radius',
            [
                'label' => esc_html__( 'Border Badius', 'restlycore' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .restly-blog-v6-inner .restly-blog-v6-content' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'cbox_shadow',
                'label' => esc_html__( 'Box Shadow', 'restlycore' ),
                'selector' => '{{WRAPPER}} .restly-blog-v6-inner-box .restly-blog-v6-inner .restly-blog-v6-content',
            ]
        );
        $this->add_responsive_control(
            'cbox_margin',
            [
                'label' => esc_html__( 'Margin', 'restlycore' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .restly-blog-v6-inner-box .restly-blog-v6-inner .restly-blog-v6-content' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'cbox_padding',
            [
                'label' => esc_html__( 'Padding', 'restlycore' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .restly-blog-v6-inner-box .restly-blog-v6-inner .restly-blog-v6-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();

        // =================================================
        // ================ Meta Box STYLE CSS =============
        // =================================================

        $this->start_controls_section(
            'meta_css',
            [
                'label' => esc_html__( 'Meta Style', 'restlycore' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->start_controls_tabs(
            'meta_css_tabs'
        );
            $this->start_controls_tab(
                'meta_css_text',
                [
                    'label' => __( 'Text', 'restlycore' ),
                ]
            );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'meta_typo',
                'label' => esc_html__( 'Typography', 'restlycore' ),
                'selector' => '{{WRAPPER}} .restly-blog-v6-inner-box .restly-blog-v6-inner .restly-blog-v6-content .restly-blog-v6-post-info li',
            ]
        );
        $this->add_responsive_control(
            'meta_color',
            [
                'label' => esc_html__( 'Color', 'restlycore' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .restly-blog-v6-inner-box .restly-blog-v6-inner .restly-blog-v6-content .restly-blog-v6-post-info li' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .restly-blog-v6-inner-box .restly-blog-v6-inner .restly-blog-v6-content .restly-blog-v6-post-info li a' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'meta_hcolor',
            [
                'label' => esc_html__( 'Hover Color', 'restlycore' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .restly-blog-v6-inner-box .restly-blog-v6-inner .restly-blog-v6-content .restly-blog-v6-post-info li:hover' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .restly-blog-v6-inner-box .restly-blog-v6-inner .restly-blog-v6-content .restly-blog-v6-post-info li a:hover' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'meta_margin',
            [
                'label' => esc_html__( 'Margin', 'restlycore' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .restly-blog-v6-inner-box .restly-blog-v6-inner .restly-blog-v6-content .restly-blog-v6-post-info li' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'meta_padding',
            [
                'label' => esc_html__( 'Padding', 'restlycore' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .restly-blog-v6-inner-box .restly-blog-v6-inner .restly-blog-v6-content .restly-blog-v6-post-info li' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();
                
        $this->start_controls_tab(
            'meta_icon_css',
            [
                'label' => __( 'Icon', 'restlycore' ),
            ]
        );
        $this->add_responsive_control(
            'meta_icon_color',
            [
                'label' => esc_html__( 'Icon Color', 'restlycore' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .restly-blog-v6-inner-box .restly-blog-v6-inner .restly-blog-v6-content .restly-blog-v6-post-info li i' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'meta_icon_typo',
                'label' => esc_html__( 'Typography', 'restlycore' ),
                'selector' => '{{WRAPPER}} .restly-blog-v6-inner-box .restly-blog-v6-inner .restly-blog-v6-content .restly-blog-v6-post-info li i',
            ]
        );
        $this->add_responsive_control(
            'i_margin',
            [
                'label' => esc_html__( 'Icon Margin', 'restlycore' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .restly-blog-v6-inner-box .restly-blog-v6-inner .restly-blog-v6-content .restly-blog-v6-post-info li i' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'i_padding',
            [
                'label' => esc_html__( 'Icon Padding', 'restlycore' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .restly-blog-v6-inner-box .restly-blog-v6-inner .restly-blog-v6-content .restly-blog-v6-restly-blog-v6-post-info li i' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();

        $this->start_controls_section(
            'title_css',
            [
                'label' => esc_html__( 'Title', 'restlycore' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'title_typo',
                'label' => esc_html__( 'Typography', 'restlycore' ),
                'selector' => '{{WRAPPER}} .restly-blog-v6-inner-box .restly-blog-v6-inner .restly-blog-v6-content h4',
            ]
        );
        $this->add_responsive_control(
            'title_color',
            [
                'label' => esc_html__( 'Color', 'restlycore' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .restly-blog-v6-inner-box .restly-blog-v6-inner .restly-blog-v6-content h4 a' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'title_hcolor',
            [
                'label' => esc_html__( 'Color', 'restlycore' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .restly-blog-v6-inner-box .restly-blog-v6-inner .restly-blog-v6-content h4 a:hover' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'tilte_margin',
            [
                'label' => esc_html__( 'Margin', 'restlycore' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .restly-blog-v6-inner-box .restly-blog-v6-inner .restly-blog-v6-content h4' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'title_padding',
            [
                'label' => esc_html__( 'Padding', 'restlycore' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .restly-blog-v6-inner-box .restly-blog-v6-inner .restly-blog-v6-content h4' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();

        // =================================================
        // ================ Description STYLE CSS =============
        // =================================================

        $this->start_controls_section(
            'dec_css',
            [
                'label' => esc_html__( 'Description Style', 'restlycore' ),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'enable_dec' => 'yes',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'dec_typo',
                'label' => esc_html__( 'Typography', 'restlycore' ),
                'selector' => '{{WRAPPER}} .restly-blog-v6-content .restly-blog-v6-post-dec',
            ]
        );
        $this->add_responsive_control(
            'dec_color',
            [
                'label' => esc_html__( 'Color', 'restlycore' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .restly-blog-v6-content .restly-blog-v6-post-dec' => 'color: {{VALUE}}',
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
                    '{{WRAPPER}} .restly-blog-v6-content .restly-blog-v6-post-dec' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .restly-blog-v6-content .restly-blog-v6-post-dec' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();
        //==================================//
        //======= Button Style css ============//
        //=================================//

        $this->start_controls_section(
            'button_CSS_options',
            [
                'label' => esc_html__( 'Button CSS', 'restlycore' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->start_controls_tabs(
            'button_content_tabs'
        );
        $this->start_controls_tab(
            'button_normal',
            [
                'label' => __( 'Normal', 'restlycore' ),
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'border_text_typography',
                'selector' => '{{WRAPPER}} .restly-blog-v6-news-btns,{{WRAPPER}} .restly-blog-v6-news-btns-sytle-two',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name'     => 'button_background',
                'label'    => esc_html__( 'Background', 'restlycore' ),
                'types'    => ['classic', 'gradient', 'video'],
                'selector' => '{{WRAPPER}} .restly-blog-v6-news-btns,{{WRAPPER}} .restly-blog-v6-news-btns-sytle-two',
            ]
        );
        $this->add_responsive_control(
            'button_color',
            [
                'label'     => esc_html__( 'Color', 'restlycore' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .restly-blog-v6-news-btns' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .restly-blog-v6-news-btns-sytle-two' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'button_border',
                'label'    => esc_html__( 'Border', 'restlycore' ),
                'selector' => '{{WRAPPER}} .restly-blog-v6-news-btns,{{WRAPPER}} .restly-blog-v6-news-btns-sytle-two',
            ]
        );
        $this->add_responsive_control(
            'button_border_radius',
            [
                'label'      => esc_html__( 'Border Radius', 'restlycore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .restly-blog-v6-news-btns' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .restly-blog-v6-news-btns-sytle-two' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name'     => 'button_box_shadow',
                'label'    => esc_html__( 'Shadow', 'restlycore' ),
                'selector' => '{{WRAPPER}} .restly-blog-v6-news-btns,{{WRAPPER}} .restly-blog-v6-news-btns-sytle-two',
            ]
        );
        $this->add_responsive_control(
            'button_margin',
            [
                'label'      => esc_html__( 'Margin', 'restlycore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .restly-blog-v6-news-btns' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .restly-blog-v6-news-btns-sytle-two' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'button_padding',
            [
                'label'      => esc_html__( 'Padding', 'restlycore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .restly-blog-v6-news-btns a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .restly-blog-v6-news-btns-sytle-two' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();

        $this->start_controls_tab(
            'button_hover',
            [
                'label' => __( 'Hover', 'restlycore' ),
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'border_text_typography_hover',
                'selector' => '{{WRAPPER}} .restly-blog-v6-news-btns:hover,{{WRAPPER}} .restly-blog-v6-news-btns-sytle-two:hover',
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name'     => 'button_background_hover',
                'label'    => esc_html__( 'Background', 'restlycore' ),
                'types'    => ['classic', 'gradient', 'video'],
                'selector' => '{{WRAPPER}} .restly-blog-v6-news-btns:hover,{{WRAPPER}} .restly-blog-v6-news-btns-sytle-two:hover',
            ]
        );
        $this->add_responsive_control(
            'button_color_hover',
            [
                'label'     => esc_html__( 'Color', 'restlycore' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .restly-blog-v6-news-btns:hover' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .restly-blog-v6-news-btns-sytle-two:hover' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'button_border_hover',
                'label'    => esc_html__( 'Border', 'restlycore' ),
                'selector' => '{{WRAPPER}} .restly-blog-v6-news-btns:hover,{{WRAPPER}} .restly-blog-v6-news-btns-sytle-two:hover',
            ]
        );
        $this->add_responsive_control(
            'button_border_radius_hover',
            [
                'label'      => esc_html__( 'Border Radius', 'restlycore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .restly-blog-v6-news-btns:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .restly-blog-v6-news-btns-sytle-two:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name'     => 'button_box_shadow_hover',
                'label'    => esc_html__( 'Shadow', 'restlycore' ),
                'selector' => '{{WRAPPER}} .restly-blog-v6-news-btns:hover,{{WRAPPER}} .restly-blog-v6-news-btns-sytle-two:hover',
            ]
        );

        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();

    }
    //Render
    protected function render() {
        $settings = $this->get_settings_for_display();
       
        global $post;
        $paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
        if ( $settings['enable_cat'] == 'yes' && !empty( $settings['post_cat'] ) ) {
            $p = new \WP_Query( array(
                'posts_per_page' => $settings['item_show'],
                'post_type'      => 'post',
                'paged'          => $paged,
                'orderby'        => esc_attr( $settings['orderby'] ),
                'order'          => esc_attr( $settings['order'] ),
                'tax_query'      => array(
                    array(
                        'taxonomy' => 'category',
                        'field'    => 'term_id',
                        'terms'    => $settings['post_cat'],
                    ),
                ),
            ) );
        } else {
            $p = new \WP_Query( array(
                'posts_per_page' => $settings['item_show'],
                'post_type'      => 'post',
                'paged'          => $paged,
                'orderby'        => esc_attr( $settings['orderby'] ),
                'order'          => esc_attr( $settings['order'] ),
            ) );
        }
        if( $settings['container'] == 'yes' ){
            $container = 'container';
        }else{
            $container = 'container-fluid';
        }
        $unique = rand( 1241, 3256 );
        if ( $settings['enable_slide'] == 'yes' ) {
            $column = 'restly-blog-colum';
            echo '
            <script>
			jQuery(document).ready(function($) {
				"use strict";
				jQuery("#blog-carousel' . esc_attr( $unique ) . '").slick({
                    slidesToShow: ' . json_encode( $settings['display_item_show'] ) . ',
                    slidesToScroll: '. json_encode( $settings['item_scroll'] ) .',
                    dots: ' . json_encode( $settings['dots'] == 'yes' ? true : false ) . ',
                    arrows: false,
                    infinite: ' . json_encode( $settings['loop'] == 'yes' ? true : false ) . ',
                    speed: ' . json_encode( $settings['speed'] ) . ',
                    autoplay: ' . json_encode( $settings['autoplay'] == 'yes' ? true : false ) . ',
                    autoplaySpeed: ' . json_encode( $settings['autoplay_speed'] ) . ',
					 rtl: ' . json_encode( is_rtl() == 'yes' ? true : false ) . ',
                    responsive: [
                      {
                        breakpoint: 1400,
                        settings: {
                          slidesToShow: 3,
                          slidesToScroll: 1,
                          infinite: true,
                        }
                      },
                      {
                        breakpoint: 1024,
                        settings: {
                          slidesToShow: 2,
                          slidesToScroll: 2,
                          infinite: true,
                          dots: true
                        }
                      },
                      {
                        breakpoint: 768,
                        settings: {
                          slidesToShow: 1,
                          slidesToScroll: 1
                        }
                      },
                    ]
                });
			});
			</script>';
        } else {
            $column = $settings['desktop_col'] . ' ' . $settings['laptop_col'] . ' ' . $settings['tab_col'];
        }
            ob_start();
            ?>
        <div class="restly-blog-v6-wrapper">
            <div class="<?php echo esc_attr($container); ?>">
                <div class="row" id="blog-carousel<?php echo esc_attr($unique); ?>">
                    <?php while ( $p->have_posts() ): $p->the_post(); ?>
                        <div class="<?php echo esc_attr( $column ); ?>">
                            <div class="restly-blog-v6-inner-box">
                                <div class="restly-blog-v6-inner">
                                    <?php if ( has_post_thumbnail() ): ?>
                                        <div class="restly-blog-v6-image">
                                            <a href="<?php echo the_permalink(); ?>">  <?php the_post_thumbnail( 'full', array( 'class' => 'img-responsive' ) );?> </a>
                                        </div>
                                    <?php endif;?>
                                    <div class="restly-blog-v6-content">
                                        <ul class="restly-blog-v6-post-info clearfix">
                                            <li><i class="far fa-calendar-alt"></i> <?php echo get_the_date(); ?> </li>
                                            <?php if( $settings['select_style'] == 'one' ): ?>
                                                <li><i class="far fa-folder-open"></i>  <?php the_category(','); ?> </li>
                                            <?php endif; ?>
                                            <?php if( $settings['select_style'] == 'two' ): ?>
                                                <li><i class="far fa-user"></i>by <?php the_author(); ?></li>
                                            <?php endif; ?>
                                        </ul>
                                        <<?php echo esc_attr($settings['title_tag']);?>>
                                            <a href="<?php echo the_permalink(); ?>"><?php echo wp_trim_words( get_the_title(), $settings['title_lanth'] ); ?></a>
                                        </<?php echo esc_attr($settings['title_tag']);?>>
                                        <?php if($settings['enable_dec'] == 'yes' ) : ?>
                                            <div class="restly-blog-v6-post-dec"><?php echo wp_trim_words( get_the_content(), $settings['dec_lanth'] ); ?></div>
                                        <?php endif; ?>
                                        
                                        <?php if($settings['enable_button'] == 'yes' ) :?>
                                            <div class="restly-blog-v6-news-button">
                                                <?php if( $settings['select_style'] == 'one' ): ?>
                                                    <a href="<?php echo the_permalink(); ?>" class=" restly-blog-v6-news-btns"> <?php echo esc_html($settings['button_text']); ?> </a>
                                                <?php endif; ?>
                                                <?php if( $settings['select_style'] == 'two' ): ?>
                                                    <a href="<?php echo the_permalink(); ?>" class=" restly-blog-v6-news-btns-sytle-two"> <?php echo esc_html($settings['button_text']); ?> <i class="fas fa-arrow-right"> </i> </a>
                                                <?php endif; ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; wp_reset_query();?>
                </div>
                <?php if ( $settings['navication'] == 'yes' ) {?>
                    <?php restly_paginate_nav( $p );?>
                <?php }?>
            </div>
        </div>
        <?php
echo ob_get_clean();
    }
}
Plugin::instance()->widgets_manager->register( new restly_home_blog_v6_Widget );