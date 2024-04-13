<?php namespace Elementor;

class restly_footer_template_six extends Widget_Base {

    public function get_name() {

        return 'restly_footer_template_six';
    }

    public function get_title() {
        return esc_html__( 'Restly Footer Six', 'restlycore' );
    }

    public function get_icon() {

        return 'eicon-footer';
    }

    public function get_categories() {
        return ['restlyhf'];
    }
    
    protected function register_controls() {

        // Footer Default Widget Section
        $this->start_controls_section(
			'widget_area_enable',
			[
				'label' => esc_html__( 'Widget Area', 'restlycore' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'edit_widget_from_appearance',
			[
				'label'     => esc_html__( 'Edit Widget From Appearance?', 'restlycore' ),
				'type'      => Controls_Manager::SWITCHER,
				'label_on'  => esc_html__( 'Yes', 'restlycore' ),
				'label_off' => esc_html__( 'No', 'restlycore' ),
				'default'   => 'no',
				'description'   => esc_html__( 'If this option is enable then you can add / remove / edit widgets from Appearance -> Widgets -> Footer Widgets. If Disable you can only edit widgets from here.', 'restlycore' ),
			]
		);
		
		$this->end_controls_section();


        /// Company Info Section


        $this->start_controls_section(
			'company_info',
			[
				'label' => esc_html__( 'Company Info', 'restlycore' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'edit_widget_from_appearance!' => 'yes',
                ],
			]
		);

        $this->add_control(
            'enable_company_info',
            [
                'label' => esc_html__( 'Enable Section', 'restlycore' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Show', 'restlycore' ),
                'label_off' => esc_html__( 'Hide', 'restlycore' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'enable_company_logo',
            [
                'label' => esc_html__( 'Enable Logo', 'restlycore' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Show', 'restlycore' ),
                'label_off' => esc_html__( 'Hide', 'restlycore' ),
                'return_value' => 'yes',
                'default' => 'no',
                'condition' => [
                    'enable_company_info' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'company_title',
            [
                'label' => esc_html__( 'Title', 'restlycore' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'About Company', 'restlycore' ),
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => [
                    'enable_company_info' => 'yes',
                    'enable_company_logo!' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'company_logo',
            [
                'label' => esc_html__( 'Choose Image', 'restlycore' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'condition' => [
                    'enable_company_info' => 'yes',
                    'enable_company_logo' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'description',
            [
                'label' => esc_html__( 'Description', 'restlycore' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'rows' => 8,
                'default' => esc_html__( 'At TechPros Solutions, we are about technology and dedicated to providing IT solutions for businesses of all sizes.', 'restlycore' ),
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => [
                    'enable_company_info' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'enable_social',
            [
                'label' => esc_html__( 'Enable Social Link', 'restlycore' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Show', 'restlycore' ),
                'label_off' => esc_html__( 'Hide', 'restlycore' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $repeater = new \Elementor\Repeater();
        
        $repeater->add_control(
            'social_label',
            [
                'label' => esc_html__( 'Label', 'restlycore' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Facebook', 'restlycore' ),
            ]
        );

        $repeater->add_control(
            'social_icon',
            [
                'label' => esc_html__( 'Icon', 'restlycore' ),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fab fa-facebook-f',
                    'library' => 'fa-solid',
                ],
            ]
        );

        $repeater->add_control(
            'social_link',
            [
                'label' => esc_html__( 'Link', 'restlycore' ),
                'type' => \Elementor\Controls_Manager::URL,
                'options' => [ 'url', 'is_external', 'nofollow' ],
                'default' => [
                    'url' => '',
                    'is_external' => true,
                    'nofollow' => true,
                    // 'custom_attributes' => '',
                ],
                'label_block' => true,
            ]
        );

        $this->add_control(
            'socials',
            [
                'label'   => esc_html__( 'Social Info', 'restlycore' ),
                'type'    => \Elementor\Controls_Manager::REPEATER,
                'fields'  => $repeater->get_controls(),
                'default' => [
                    [
                        'social_label' => '',
                    ],
                    [
                        'social_label' => '',
                    ],
                    [
                        'social_label' => '',
                    ],
                ],
                'condition' => [
                    'enable_social' => 'yes',
                ],
            ]
        );

        $this->end_controls_section();


        // Page Link Section 

        $this->start_controls_section(
            'page_link_section',
            [
                'label' => esc_html__( 'Page Link Section', 'restlycore' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'edit_widget_from_appearance!' => 'yes',
                ],
            ]
        );
        
        $this->add_control(
            'page_enable',
            [
                'label' => esc_html__( 'Enable Page', 'restlycore' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Show', 'restlycore' ),
                'label_off' => esc_html__( 'Hide', 'restlycore' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'page_link_title',
            [
                'label' => esc_html__( 'Title', 'restlycore' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Useful Links', 'restlycore' ),
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => [
                    'page_enable' => 'yes',
                ],
            ]
        );

        $repeater = new \Elementor\Repeater();
        $repeater->add_control(
            'quick_link_icon',
            [
                'label' => esc_html__( 'Icon', 'restlycore' ),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-arrow-right',
                    'library' => 'flaticon',
                ],
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'page_link_text',
            [
                'label' => esc_html__( 'Link Text', 'restlycore' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Service', 'restlycore' ),
                'dynamic' => [
                    'active' => true,
                ],
            ]
        );
        $repeater->add_control(
            'page_links',
            [
                'label' => esc_html__( 'Link', 'restlycore' ),
                'type' => \Elementor\Controls_Manager::URL,
                'options' => [ 'url', 'is_external', 'nofollow' ],
                'default' => [
                    'url' => '#',
                    'is_external' => true,
                    'nofollow' => true,
                ],
                'label_block' => true,
                'dynamic' => [
                    'active' => true,
                ],
            ]
        );
        $this->add_control(
            'links',
            [
                'label'   => esc_html__( 'Page List', 'restlycore' ),
                'type'    => \Elementor\Controls_Manager::REPEATER,
                'fields'  => $repeater->get_controls(),
                'default' => [
                    [
                        'page_link_text' => esc_html( 'About' ),
                        'page_links' => '#',
                    ],
                    [
                        'page_link_text' => esc_html( 'Meet Our Team' ),
                        'page_links' => '#',
                    ],
                    [
                        'page_link_text' => esc_html( 'News & Media' ),
                        'page_links' => '#',
                    ],
                    [
                        'page_link_text' => esc_html( 'Our Projects' ),
                        'page_links' => '#',
                    ],
                    [
                        'page_link_text' => esc_html( 'Contact Us' ),
                        'page_links' => '#',
                    ],
                ],
                'title_field' => '{{{ page_link_text }}}',
                'condition' => [
                    'page_enable' => 'yes',
                ],
            ]
        );

        $this->add_responsive_control(
            'restly_footer_justify_page',
            [
                'label' => esc_html__( 'Justify Alignmnet', 'restlycore' ),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'flex-start' => [
                        'title' => esc_html__( 'Left', 'restlycore' ),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__( 'Center', 'restlycore' ),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'flex-end' => [
                        'title' => esc_html__( 'Right', 'restlycore' ),
                        'icon' => 'eicon-text-align-right',
                    ],
                ],
                'default' => 'center',
                'toggle' => true,
                'selectors' => [
                    '{{WRAPPER}} .restly-footer-justify' => 'justify-content: {{VALUE}};',
                ],
                'condition' => [
                    'page_enable' => 'yes',
                ],
            ]
        );

        $this->end_controls_section();


        // Contact Section
        $this->start_controls_section(
            'contact_sectioin',
            [
                'label' => esc_html__( 'Contact Info List', 'restlycore' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'edit_widget_from_appearance!' => 'yes',
                ],
            ]
        );
        
        $this->add_control(
            'enable_contact_info',
            [
                'label' => esc_html__( 'Enable Section', 'restlycore' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Show', 'restlycore' ),
                'label_off' => esc_html__( 'Hide', 'restlycore' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'contact_section_title',
            [
                'label' => esc_html__( 'Title', 'restlycore' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Contact Us', 'restlycore' ),
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => [
                    'enable_contact_info' => 'yes',
                ],
            ]
        );
        $repeater = new \Elementor\Repeater();
        $repeater->add_control(
            'contact_info_icon',
            [
                'label' => esc_html__( 'Icon', 'restlycore' ),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-map-marker-alt',
                    'library' => 'fa-solid',
                ],
                
            ]
        );
        $repeater->add_control(
            'contact_info_title',
            [
                'label' => esc_html__( 'Title', 'restlycore' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
                'default' => esc_html__( 'Our Address', 'restlycore' ),
            ]
        );
        $repeater->add_control(
            'contact_info_des',
            [
                'label' => esc_html__( 'Description', 'restlycore' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
                'default' => esc_html__( '26 Hola St. 2148, USA', 'restlycore' ),
            ]
        );
        $this->add_control(
            'contact_info',
            [
                'label'   => esc_html__( 'Contact List', 'restlycore' ),
                'type'    => \Elementor\Controls_Manager::REPEATER,
                'fields'  => $repeater->get_controls(),
                'default' => [
                    [
                        'contact_info_title' => esc_html( 'Our Address' ),
                    ],
                    [
                        'contact_info_title' => esc_html( 'Our Email' ),
                    ],
                    [
                        'contact_info_title' => esc_html( 'Our Phone' ),
                    ],

                ],
                'title_field' => '{{{ contact_info_title }}}',
                'condition' => [
                    'page_enable' => 'yes',
                ],
            ]
        );
        $this->end_controls_section();


        $this->start_controls_section(
            'gallery_section',
            [
                'label' => esc_html__( 'Gallery Section', 'restlycore' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'edit_widget_from_appearance!' => 'yes',
                ],
            ]
        );
        
        $this->add_control(
            'enable_gallery',
            [
                'label' => esc_html__( 'Enable Gallery', 'restlycore' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Show', 'restlycore' ),
                'label_off' => esc_html__( 'Hide', 'restlycore' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'gallery_title',
            [
                'label' => esc_html__( 'Title', 'restlycore' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Our Gallery', 'restlycore' ),
                'condition' => [
                    'enable_gallery' => 'yes',
                ],
            ]
        );
        $this->add_control(
			'gallery_image',
			[
				'label' => esc_html__( 'Add Images', 'restlycore' ),
				'type' => \Elementor\Controls_Manager::GALLERY,
				'show_label' => false,
				'default' => [],
			]
		);
        $this->end_controls_section();

        // Column Control
        $this->start_controls_section(
            'column_control',
            [
                'label' => esc_html__( 'Column Control', 'restlycore' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'desktop_col',
            [
                'label'   => __( 'Columns On Desktop', 'restlycore' ),
                'type'    => Controls_Manager::SELECT,
                'default' => 'col-xl-3',
                'options' => [
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
                'label'   => __( 'Columns for Laptop', 'restlycore' ),
                'type'    => Controls_Manager::SELECT,
                'default' => 'col-lg-6',
                'options' => [
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
            ]
        );
        $this->end_controls_section();

        // CopyRight Section
        $this->start_controls_section(
            'copyright_section',
            [
                'label' => esc_html__( 'CopyRight Section', 'restlycore' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        
        $this->add_control(
            'enable_copyright',
            [
                'label' => esc_html__( 'Enable Copyright', 'restlycore' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Show', 'restlycore' ),
                'label_off' => esc_html__( 'Hide', 'restlycore' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );
        $this->add_control(
            'copyright_content',
            [
                'label' => esc_html__( 'Copyright Content', 'restlycore' ),
                'type' => \Elementor\Controls_Manager::WYSIWYG,
                'default' => __( '© Copyright 2021 Restly All Rights Reserved <a href="https://themepul.com">Themepul</a>', 'restlycore' ),
                'condition' => [
                    'enable_copyright' => 'yes',
                ],
            ]
        );

        $this->add_control(
			'footer_menu_options',
			[
				'label' => esc_html__( 'Menu List', 'restlycore' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
        $this->add_control(
            'copyright_footer_menu_enable',
            [
                'label'        => esc_html__( 'Enable Footer Menu', 'restlycore' ),
                'type'         => \Elementor\Controls_Manager::SWITCHER,
                'label_on'     => esc_html__( 'Show', 'restlycore' ),
                'label_off'    => esc_html__( 'Hide', 'restlycore' ),
                'return_value' => 'yes',
                'default'      => 'yes',
            ]
        );
        $repeater = new \Elementor\Repeater();
        $repeater->add_control(
			'copyright_footer_menu',
			[
				'label' => esc_html__( 'Title', 'restlycore' ),
				'type' => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
			]
		);
        $repeater->add_control(
			'copyright_footer_menu_link',
			[
				'label' => esc_html__( 'Link', 'restlycore' ),
				'type' => \Elementor\Controls_Manager::URL,
				'placeholder' => esc_html__( 'https://your-link.com', 'restlycore' ),
				'options' => [ 'url', 'is_external', 'nofollow' ],
				'default' => [
					'url' => '',
					'is_external' => true,
					'nofollow' => true,
					// 'custom_attributes' => '',
				],
				'label_block' => true,
			]
		);

        $this->add_control(
            'copyright_footer_menu_list',
            [
                'label'   => esc_html__( 'Contact List', 'restlycore' ),
                'type'    => \Elementor\Controls_Manager::REPEATER,
                'fields'  => $repeater->get_controls(),
                'default' => [
                    [
                        'copyright_footer_menu' => esc_html__( 'Trams & Condition', 'restlycore' ),
                    ],
                    [
                        'copyright_footer_menu' => esc_html__( 'Privacy Policy', 'restlycore' ),
                    ],
                ],
            ]
        );
        $this->end_controls_section();

        // Box Section CSS
        $this->start_controls_section(
            'box_css_options',
            [
                'label' => esc_html__( 'Box Style', 'restlycore' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'box_bg',
                'types' => [ 'classic', 'gradient', 'video' ],
                'selector' => '{{WRAPPER}} .footer-style-six .footer-widgets-area',
            ]
        );

        $this->add_responsive_control(
            'padding',
            [
                'label' => esc_html__( 'Padding', 'restlycore' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                'selectors' => [
                    '{{WRAPPER}} .footer-style-six-widget' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'margin',
            [
                'label' => esc_html__( 'Margin', 'restlycore' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                'selectors' => [
                    '{{WRAPPER}} .footer-style-six-widget' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();


        // COMPANY SECTION CSS
        $this->start_controls_section(
            'widget_title_section',
            [
                'label' => esc_html__( 'Widget Title Style', 'restlycore' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'widget_title_typo',
                'selector' => '{{WRAPPER}} .footer-style-five .widget-title',
            ]
        );

        $this->add_responsive_control(
            'widget_title_color',
            [
                'label' => esc_html__( 'Text Color', 'restlycore' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .footer-style-five .widget-title' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'widget_title_border_color',
            [
                'label' => esc_html__( 'Border Color', 'restlycore' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .footer-style-five .widget-title:after' => 'background-color: {{VALUE}}',
                    '{{WRAPPER}} .footer-style-five .widget-title:before' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'widget_title_margin',
            [
                'label' => esc_html__( 'Margin', 'restlycore' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                'selectors' => [
                    '{{WRAPPER}} .footer-style-five .widget-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'widget_title_padding',
            [
                'label' => esc_html__( 'Padding', 'restlycore' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                'selectors' => [
                    '{{WRAPPER}} .footer-style-five .widget-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();
        $this->start_controls_section(
            'company_css_options',
            [
                'label' => esc_html__( 'Company Section', 'restlycore' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        
        $this->add_responsive_control(
            'company_align',
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
                    '{{WRAPPER}} .restly_company_info_widget' => 'text-align: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'company_box_padding',
            [
                'label' => esc_html__( 'Padding', 'restlycore' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                'selectors' => [
                    '{{WRAPPER}} .restly_company_info_widget' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'company_box_margin',
            [
                'label' => esc_html__( 'Margin', 'restlycore' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                'selectors' => [
                    '{{WRAPPER}} .restly_company_info_widget' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

            $this->start_controls_tabs(
                'company_css_tabs'
            );
    
                $this->start_controls_tab(
                    'company_css_logo_tab',
                    [
                        'label' => esc_html__( 'Logo', 'restlycore' ),
                        'condition' => [
                            'enable_company_logo' => 'yes',
                        ],
                    ]
                );
            
                $this->add_responsive_control(
                    'company_logo_width',
                    [
                        'label' => esc_html__( 'Logo Width', 'restlycore' ),
                        'type' => \Elementor\Controls_Manager::SLIDER,
                        'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                        'range' => [
                            'px' => [
                                'min' => 0,
                                'max' => 500,
                                'step' => 1,
                            ],
                            '%' => [
                                'min' => 0,
                                'max' => 100,
                            ],
                        ],
                        'selectors' => [
                            '{{WRAPPER}}  .restly_company_info_widget img' => 'width: {{SIZE}}{{UNIT}};',
                        ],
                    ]
                );

                $this->add_responsive_control(
                    'company_logo_margin',
                    [
                        'label' => esc_html__( 'Margin', 'restlycore' ),
                        'type' => \Elementor\Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                        'selectors' => [
                            '{{WRAPPER}} .restly_company_info_widget img' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                    ]
                );

                $this->add_responsive_control(
                    'company_logo_padding',
                    [
                        'label' => esc_html__( 'Padding', 'restlycore' ),
                        'type' => \Elementor\Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                        'selectors' => [
                            '{{WRAPPER}} .restly_company_info_widget img' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                    ]
                );

                $this->end_controls_tab();

                // content
                $this->start_controls_tab(
                    'company_css_dec_tab',
                    [
                        'label' => esc_html__( 'Content', 'restlycore' ),
                    ]
                );
            
                $this->add_group_control(
                    \Elementor\Group_Control_Typography::get_type(),
                    [
                        'name' => 'company_dec_typo',
                        'selector' => '{{WRAPPER}} .company-info-widget p',
                    ]
                );

                $this->add_responsive_control(
                    'company_dec_color',
                    [
                        'label' => esc_html__( 'Color', 'restlycore' ),
                        'type' => \Elementor\Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .company-info-widget p' => 'color: {{VALUE}}',
                        ],
                    ]
                );

                $this->add_responsive_control(
                    'company_dec_margin',
                    [
                        'label' => esc_html__( 'Margin', 'restlycore' ),
                        'type' => \Elementor\Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                        'selectors' => [
                            '{{WRAPPER}} .company-info-widget p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                    ]
                );

                $this->add_responsive_control(
                    'company_dec_padding',
                    [
                        'label' => esc_html__( 'Padding', 'restlycore' ),
                        'type' => \Elementor\Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                        'selectors' => [
                            '{{WRAPPER}} .company-info-widget' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                    ]
                );

                $this->end_controls_tab();

                // Info
                $this->start_controls_tab(
                    'company_css_info_tab',
                    [
                        'label' => esc_html__( 'Social  Icon', 'restlycore' ),
                    ]
                );
            
                $this->add_control(
                    'company_info_icon_note',
                    [
                        'label' => esc_html__( 'Icon Options', 'restlycore' ),
                        'type' => \Elementor\Controls_Manager::HEADING,
                        'separator' => 'before',
                    ]
                );

                $this->add_responsive_control(
                    'company_info_icon_color',
                    [
                        'label' => esc_html__( 'icon Color', 'restlycore' ),
                        'type' => \Elementor\Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .company-info-widget ul li i' => 'color: {{VALUE}}',
                        ],
                    ]
                );

                $this->add_responsive_control(
                    'company_info_icon_bg',
                    [
                        'label' => esc_html__( 'Background Color', 'restlycore' ),
                        'type' => \Elementor\Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .company-info-widget ul li i' => 'background-color: {{VALUE}}',
                        ],
                    ]
                );
                $this->add_group_control(
                    \Elementor\Group_Control_Typography::get_type(),
                    [
                        'name' => 'company_info_icon_typo',
                        'selector' => '{{WRAPPER}} .company-info-widget ul li i',
                    ]
                );

                $this->add_responsive_control(
                    'company_info_icon_radius',
                    [
                        'label' => esc_html__( 'Border Radius', 'restlycore' ),
                        'type' => \Elementor\Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                        'selectors' => [
                            '{{WRAPPER}} .company-info-widget ul li i' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                    ]
                );
                $this->add_group_control(
                    \Elementor\Group_Control_Box_Shadow::get_type(),
                    [
                        'name' => 'company_social_icon_shadow',
                        'label' => esc_html__( 'Box Shadow', 'restlycore' ),
                        'selector' => '{{WRAPPER}} .company-info-widget ul li i',
                    ]
                );
                $this->add_responsive_control(
                    'company_info_icon_margin',
                    [
                        'label' => esc_html__( 'Margin', 'restlycore' ),
                        'type' => \Elementor\Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                        'selectors' => [
                            '{{WRAPPER}} .company-info-widget ul li i' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                    ]
                );

                $this->add_responsive_control(
                    'company_info_icon_padding',
                    [
                        'label' => esc_html__( 'Padding', 'restlycore' ),
                        'type' => \Elementor\Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                        'selectors' => [
                            '{{WRAPPER}} .company-info-widget ul li i' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                    ]
                );

                $this->add_control(
                    'company_info_list_note',
                    [
                        'label' => esc_html__( 'Hover Style ', 'restlycore' ),
                        'type' => \Elementor\Controls_Manager::HEADING,
                        'separator' => 'before',
                    ]
                );

                $this->add_responsive_control(
                    'company_social_icon_c_hover',
                    [
                        'label' => esc_html__( 'Color', 'restlycore' ),
                        'type' => \Elementor\Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .company-info-widget ul li i:hover' => 'color: {{VALUE}}',
                        ],
                    ]
                );

                $this->add_group_control(
                    \Elementor\Group_Control_Typography::get_type(),
                    [
                        'name' => 'company_social_icon_typo_hover',
                        'selector' => '{{WRAPPER}} .company-info-widget ul li i:hover',
                    ]
                );
                
                $this->add_responsive_control(
                    'company_social_icon_bg_hover',
                    [
                        'label' => esc_html__( 'Background Color', 'restlycore' ),
                        'type' => \Elementor\Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .company-info-widget ul li i:hover' => 'background-color: {{VALUE}}',
                        ],
                    ]
                );
                
                $this->add_group_control(
                    \Elementor\Group_Control_Border::get_type(),
                    [
                        'name' => 'company_social_icon_border_hover',
                        'label' => esc_html__( 'Border', 'restlycore' ),
                        'selector' => '{{WRAPPER}} .company-info-widget ul li i:hover',
                    ]
                );
                $this->add_responsive_control(
                    'company_social_icon_radius_hover',
                    [
                        'label' => esc_html__( 'Border Radius', 'restlycore' ),
                        'type' => \Elementor\Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                        'selectors' => [
                            '{{WRAPPER}} .company-info-widget ul li i:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                    ]
                );
                $this->add_group_control(
                    \Elementor\Group_Control_Box_Shadow::get_type(),
                    [
                        'name' => 'company_social_icon_shadow_hover',
                        'label' => esc_html__( 'Box Shadow', 'restlycore' ),
                        'selector' => '{{WRAPPER}} .company-info-widget ul li i:hover',
                    ]
                );
                $this->end_controls_tab();
            
            $this->end_controls_tabs();

        $this->end_controls_section();

        // Page List Section 
        $this->start_controls_section(
            'page_link_css_options',
            [
                'label' => esc_html__( 'Quick Link Section', 'restlycore' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        
        $this->add_responsive_control(
            'page_link_align',
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
                    '{{WRAPPER}} .footer-page-quick-link' => 'text-align: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'page_link_margin',
            [
                'label' => esc_html__( 'Margin', 'restlycore' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                'selectors' => [
                    '{{WRAPPER}} .footer-page-quick-link' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'page_link_padding',
            [
                'label' => esc_html__( 'Padding', 'restlycore' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                'selectors' => [
                    '{{WRAPPER}} .footer-page-quick-link' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

            $this->start_controls_tabs(
                'page_link_css_tabs'
            );

                $this->start_controls_tab(
                    'Page_Link_css_item',
                    [
                        'label' => esc_html__( 'List', 'restlycore' ),
                    ]
                );
                $this->add_control(
                    'quick_list_icon',
                    [
                        'label'     => esc_html__( 'Icon style', 'restlycore' ),
                        'type'      => \Elementor\Controls_Manager::HEADING,
                        'separator' => 'before',
                    ]
                );
                $this->add_control(
                    'enable_quick_link_icon',
                    [
                        'label'        => esc_html__( 'Enable Icon', 'restlycore' ),
                        'type'         => \Elementor\Controls_Manager::SWITCHER,
                        'label_on'     => esc_html__( 'Show', 'restlycore' ),
                        'label_off'    => esc_html__( 'Hide', 'restlycore' ),
                        'return_value' => 'yes',
                        'default'      => 'yes',
                    ]
                );
                $this->add_group_control(
                    \Elementor\Group_Control_Typography::get_type(),
                    [
                        'name' => 'page_link_item_icon_typo',
                        'selector' => '{{WRAPPER}} .footer-page-quick-link ul li i',
                    ]
                );
                $this->add_responsive_control(
                    'page_link_item_icon_color',
                    [
                        'label' => esc_html__( 'Color', 'restlycore' ),
                        'type' => \Elementor\Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .footer-page-quick-link ul li i' => 'color: {{VALUE}}',
                        ],
                    ]
                );
                $this->add_responsive_control(
                    'quick_link_gap',
                    [
                        'label' => esc_html__( 'Gap', 'restlycore' ),
                        'type' => \Elementor\Controls_Manager::SLIDER,
                        'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                        'range' => [
                            'px' => [
                                'min' => 0,
                                'max' => 1000,
                                'step' => 5,
                            ],
                            '%' => [
                                'min' => 0,
                                'max' => 100,
                            ],
                        ],
                        'selectors' => [
                            '{{WRAPPER}} .footer-page-quick-link ul li i' => 'margin-right: {{SIZE}}{{UNIT}};',
                        ],
                    ]
                );
                $this->add_control(
                    'quick_list_style',
                    [
                        'label'     => esc_html__( 'List style', 'restlycore' ),
                        'type'      => \Elementor\Controls_Manager::HEADING,
                        'separator' => 'before',
                    ]
                );
                $this->add_group_control(
                    \Elementor\Group_Control_Typography::get_type(),
                    [
                        'name' => 'page_link_item_typo',
                        'selector' => '{{WRAPPER}} .footer-style-five .widget.footer-page-quick-link ul li a',
                    ]
                );
                $this->add_responsive_control(
                    'page_link_item_color',
                    [
                        'label' => esc_html__( 'Color', 'restlycore' ),
                        'type' => \Elementor\Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .footer-style-five .widget.footer-page-quick-link ul li a' => 'color: {{VALUE}}',
                        ],
                    ]
                );

                $this->add_responsive_control(
                    'page_link_item_hcolor',
                    [
                        'label' => esc_html__( 'Hover Color', 'restlycore' ),
                        'type' => \Elementor\Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .footer-style-five .widget.footer-page-quick-link ul li a:hover' => 'color: {{VALUE}}',
                        ],
                    ]
                );

                $this->add_responsive_control(
                    'page_link_item_margin',
                    [
                        'label' => esc_html__( 'Margin', 'restlycore' ),
                        'type' => \Elementor\Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                        'selectors' => [
                            '{{WRAPPER}} .footer-style-five .widget.footer-page-quick-link ul li' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                    ]
                );

                $this->add_responsive_control(
                    'page_link_item_padding',
                    [
                        'label' => esc_html__( 'Padding', 'restlycore' ),
                        'type' => \Elementor\Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                        'selectors' => [
                            '{{WRAPPER}} .footer-style-five .widget.footer-page-quick-link ul li' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                    ]
                );

                $this->end_controls_tab();
            
            $this->end_controls_tabs();

        $this->end_controls_section();

        // Page List Section 
        $this->start_controls_section(
            'contact_info_css_options',
            [
                'label' => esc_html__( 'Contact Info Style', 'restlycore' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        
        $this->add_responsive_control(
            'contact_info_align',
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
                    '{{WRAPPER}} .contact-widget' => 'text-align: {{VALUE}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'contact_info_contact_align',
            [
                'label' => esc_html__( 'Justify Alignmnet', 'restlycore' ),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'flex-start' => [
                        'title' => esc_html__( 'Left', 'restlycore' ),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__( 'Center', 'restlycore' ),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'flex-end' => [
                        'title' => esc_html__( 'Right', 'restlycore' ),
                        'icon' => 'eicon-text-align-right',
                    ],
                ],
                'toggle' => true,
                'selectors' => [
                    '{{WRAPPER}} .contact-six-list-widget' => 'justify-content: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'service_link_gap',
            [
                'label' => esc_html__( 'Gap', 'restlycore' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                        'step' => 5,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .contact-six-list-widget' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'contact_info_margin',
            [
                'label' => esc_html__( 'Margin', 'restlycore' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                'selectors' => [
                    '{{WRAPPER}} .contact-widget' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'contact_info_padding',
            [
                'label' => esc_html__( 'Padding', 'restlycore' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                'selectors' => [
                    '{{WRAPPER}} .contact-widget' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

            $this->start_controls_tabs(
                'contact_info_css_tabs'
            );
                $this->start_controls_tab(
                    'contact_info_icon_css_item',
                    [
                        'label' => esc_html__( 'Icon', 'restlycore' ),
                    ]
                );
                $this->add_responsive_control(
                    'c_icon_width',
                    [
                        'label' => esc_html__( 'Width', 'restlycore' ),
                        'type' => \Elementor\Controls_Manager::SLIDER,
                        'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                        'range' => [
                            'px' => [
                                'min' => 0,
                                'max' => 150,
                                'step' => 1,
                            ],
                            '%' => [
                                'min' => 0,
                                'max' => 100,
                            ],
                        ],
                        'selectors' => [
                            '{{WRAPPER}} .footer-six-contact-icon' => 'width: {{SIZE}}{{UNIT}};',
                        ],
                    ]
                );
                $this->add_responsive_control(
                    'min_c_icon_width',
                    [
                        'label' => esc_html__( 'Width', 'restlycore' ),
                        'type' => \Elementor\Controls_Manager::SLIDER,
                        'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                        'range' => [
                            'px' => [
                                'min' => 0,
                                'max' => 150,
                                'step' => 1,
                            ],
                            '%' => [
                                'min' => 0,
                                'max' => 100,
                            ],
                        ],
                        'selectors' => [
                            '{{WRAPPER}} .footer-six-contact-icon' => 'min-width: {{SIZE}}{{UNIT}};',
                        ],
                    ]
                );
    
                $this->add_responsive_control(
                    'c_icon_height',
                    [
                        'label' => esc_html__( 'Height', 'restlycore' ),
                        'type' => \Elementor\Controls_Manager::SLIDER,
                        'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                        'range' => [
                            'px' => [
                                'min' => 0,
                                'max' => 150,
                                'step' => 1,
                            ],
                            '%' => [
                                'min' => 0,
                                'max' => 100,
                            ],
                        ],
                        'selectors' => [
                            '{{WRAPPER}} .footer-six-contact-icon' => 'height: {{SIZE}}{{UNIT}};',
                        ],
                    ]
                );
    
                $this->add_group_control(
                    \Elementor\Group_Control_Typography::get_type(),
                    [
                        'name' => 'cicon_typo',
                        'label' => esc_html__( 'Typography', 'restlycore' ),
                        'selector' => '{{WRAPPER}} .footer-six-contact-icon',
                    ]
                );
                $this->add_responsive_control(
                    'cicon_color',
                    [
                        'label' => esc_html__( 'Color', 'restlycore' ),
                        'type' => \Elementor\Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .footer-six-contact-icon' => 'color: {{VALUE}}',
                        ],
                    ]
                );
                $this->add_responsive_control(
                    'cicon_bg',
                    [
                        'label' => esc_html__( 'Background Color', 'restlycore' ),
                        'type' => \Elementor\Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .footer-six-contact-icon' => 'background-color: {{VALUE}}',
                        ],
                    ]
                );
                $this->add_group_control(
                    \Elementor\Group_Control_Border::get_type(),
                    [
                        'name' => 'cicon_border',
                        'label' => esc_html__( 'Border', 'restlycore' ),
                        'selector' => '{{WRAPPER}} .footer-six-contact-icon',
                    ]
                );
                $this->add_responsive_control(
                    'cicon_margin',
                    [
                        'label' => esc_html__( 'Margin', 'restlycore' ),
                        'type' => Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em' ],
                        'selectors' => [
                            '{{WRAPPER}} .footer-six-contact-icon' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                    ]
                );
                $this->add_responsive_control(
                    'cicon_radius',
                    [
                        'label' => esc_html__( 'Border Radius', 'restlycore' ),
                        'type' => Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em' ],
                        'selectors' => [
                            '{{WRAPPER}} .footer-six-contact-icon' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                    ]
                );
                $this->add_responsive_control(
                    'cicon_padding',
                    [
                        'label' => esc_html__( 'Padding', 'restlycore' ),
                        'type' => Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em' ],
                        'selectors' => [
                            '{{WRAPPER}} .footer-six-contact-icon' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                    ]
                );
                $this->add_group_control(
                    \Elementor\Group_Control_Box_Shadow::get_type(),
                    [
                        'name' => 'cicon_shadow',
                        'label' => esc_html__( 'Shadow', 'restlycore' ),
                        'selector' => '{{WRAPPER}} .footer-six-contact-icon',
                    ]
                );
                $this->end_controls_tab();
                $this->start_controls_tab(
                    'contact_info_title_css_item',
                    [
                        'label' => esc_html__( 'Title', 'restlycore' ),
                    ]
                );
                $this->add_group_control(
                    Group_Control_Typography::get_type(),
                    [
                        'name' => 'title_typo',
                        'label' => __( 'Typography', 'restlycore' ),
                        'selector' => ' {{WRAPPER}} .footer-six-contact-title ',
                    ]
                );
        
                $this->add_responsive_control(
                    'title_color',
                    [
                        'label'       => esc_html__('Color', 'restlycore'),
                        'type'        => Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .footer-six-contact-title' => 'color: {{VALUE}};',
                            
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
                            '{{WRAPPER}} .footer-six-contact-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                            '{{WRAPPER}} .footer-six-contact-title' => 'Padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                    ]
                );
                $this->end_controls_tab();
                $this->start_controls_tab(
                    'contact_info_des_css_item',
                    [
                        'label' => esc_html__( 'Description', 'restlycore' ),
                    ]
                );
                $this->add_group_control(
                    \Elementor\Group_Control_Typography::get_type(),
                    [
                        'name' => 'dec_typo',
                        'label' => esc_html__( 'Typography', 'restlycore' ),
                        'selector' => '{{WRAPPER}} .footer-six-contact-des',
                    ]
                );
                $this->add_responsive_control(
                    'dec_color',
                    [
                        'label' => esc_html__( 'Color', 'restlycore' ),
                        'type' => \Elementor\Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .footer-six-contact-des' => 'color: {{VALUE}}',
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
                            '{{WRAPPER}} .footer-six-contact-des' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                            '{{WRAPPER}} .footer-six-contact-des' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                    ]
                );
                $this->end_controls_tab();
            
            $this->end_controls_tabs();

        $this->end_controls_section();

    			// -----------------
		// ------------------ Recent Post  Widget Style Start ------------=
		// ------------------

        $this->start_controls_section(
			'gallery_style_options',
			[
				'label' => esc_html__( 'Gallery Wiget Style', 'restlycore' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
	
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'gallery_bg_opacity',
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .footer-six-gallery .footer-six-gallery-img:before',
            ]
        );
        $this->add_responsive_control(
            'gallery_icon_color',
            [
                'label' => esc_html__( 'Icon Color', 'restlycore' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .footer-six-gallery .gallery-btn' => 'color: {{VALUE}}',
                ],
            ]
        );
	    $this->add_responsive_control(
			'gallery_Image_height',
			[
				'label' => esc_html__( 'image Height', 'restlycore' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 300,
						'step' => 1,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .footer-six-gallery .footer-six-gallery-img img' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);
        $this->add_responsive_control(
			'gallery_image_width',
			[
				'label' => esc_html__( 'Image Width', 'restlycore' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 300,
						'step' => 1,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .footer-six-gallery .footer-six-gallery-img img' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);
        $this->add_responsive_control(
            'gallery_image_object',
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
                    '{{WRAPPER}} .footer-six-gallery .footer-six-gallery-img img' => 'object-fit: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'gallery_image_border',
                'label'    => esc_html__( 'Border', 'restlycore' ),
                'selector' => '{{WRAPPER}} .footer-six-gallery .footer-six-gallery-img',
            ]
        );
        $this->add_responsive_control(
            'gallery_image_radius',
            [
                'label'      => esc_html__( 'Border Radius', 'restlycore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .footer-six-gallery .footer-six-gallery-img img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .footer-six-gallery .footer-six-gallery-img:before' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'gallery_margin',
            [
                'label' => esc_html__( 'Margin', 'restlycore' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .footer-six-gallery .footer-six-gallery-img' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'gallery_padding',
            [
                'label' => esc_html__( 'Padding', 'restlycore' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .footer-six-gallery .footer-six-gallery-img' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
		$this->end_controls_section();


        // Copyright CSS Section 
       		 // 
		// ----------------Copyright Style------------------
        // 

		$this->start_controls_section(
			'Copyright_style_options',
			[
				'label' => esc_html__( 'Copyright Section', 'restlycore' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
        $this->add_responsive_control(
			'box_align',
			[
				'label' => esc_html__( 'Alignment', 'restlycore' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'flex-start' => [
						'title' => esc_html__( 'Left', 'restlycore' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'restlycore' ),
						'icon' => 'eicon-text-align-center',
					],
					'flex-end' => [
						'title' => esc_html__( 'Right', 'restlycore' ),
						'icon' => 'eicon-text-align-right',
					],
				],
				'toggle' => true,
				'selectors' => [
					'{{WRAPPER}} .footer-six-copyright-section' => 'justify-content: {{VALUE}};',
				],
			]
		);
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name'     => 'box_backgrounds',
                'label'    => esc_html__( 'Background', 'restlycore' ),
                'types'    => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .footer-six-copyright-section',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'box_border',
                'label'    => esc_html__( 'Border', 'restlycore' ),
                'selector' => '{{WRAPPER}} .footer-six-copyright-section',
            ]
        );
        $this->add_responsive_control(
            'box_radius',
            [
                'label'      => esc_html__( 'Border Radius', 'restlycore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .footer-six-copyright-section' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name'     => 'box_shadow',
                'label'    => esc_html__( 'Box Shadow', 'restlycore' ),
                'selector' => '{{WRAPPER}} .footer-six-copyright-section',
            ]
        );
        $this->add_responsive_control(
            'box_margin',
            [
                'label'      => esc_html__( 'Margin', 'restlycore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .footer-six-copyright-section' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .footer-six-copyright-section' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
     
        $this->start_controls_tabs(
            'copyright_section_text_tabs'
        );
        $this->start_controls_tab(
            'copyright_section_text_tab',
            [
                'label' => esc_html__( 'Copyright Text', 'restlycore' ),
            ]
        );
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'Copyright_typo',
				'label' => __( 'Typography', 'restlycore' ),
				'selector' => '{{WRAPPER}} .footer-five-copyright-text',
			]
		);
		$this->add_responsive_control(
			'Copyright_color',
			[
				'label'       => esc_html__('Color', 'restlycore'),
				'type'        => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .footer-five-copyright-text' => 'color: {{VALUE}};',
				],
			]
		);
        $this->add_responsive_control(
			'Copyright_link_color',
			[
				'label'       => esc_html__('Link Color', 'restlycore'),
				'type'        => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .footer-five-copyright-text a' => 'color: {{VALUE}};',
				],
			]
		);
        $this->add_responsive_control(
			'Copyright_link_color_Hover',
			[
				'label'       => esc_html__('Hover Color', 'restlycore'),
				'type'        => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .footer-five-copyright-text a:hover' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_responsive_control(
			'Copyright_margin',
			[
				'label'      => esc_html__( 'Margin', 'restlycore' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .footer-five-copyright-text' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
        $this->add_responsive_control(
			'Copyright_padding',
			[
				'label'      => esc_html__( 'Padding', 'restlycore' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .footer-five-copyright-text' => 'Padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
        $this->end_controls_tab();
        $this->start_controls_tab(
            'copyright_section_menu_tab',
            [
                'label' => esc_html__( 'Menu Style', 'restlycore' ),
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'copyright_menu_typo',
                'selector' => '{{WRAPPER}} .footer-six-copyright-section ul li a',
            ]
        );

        $this->add_responsive_control(
            'copyright_menu_color',
            [
                'label' => esc_html__( 'Color', 'restlycore' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .footer-six-copyright-section ul li a' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'copyright_menu_color_hover',
            [
                'label' => esc_html__( 'Hover Color', 'restlycore' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .footer-six-copyright-section ul li a:hover' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'copyright_menu_margin',
            [
                'label' => esc_html__( 'Margin', 'restlycore' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                'selectors' => [
                    '{{WRAPPER}} .footer-six-copyright-section ul li a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'copyright_menu_padding',
            [
                'label' => esc_html__( 'Padding', 'restlycore' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                'selectors' => [
                    '{{WRAPPER}} .footer-six-copyright-section ul li a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
        $column = $settings['desktop_col'] . ' ' . $settings['laptop_col'] . ' ' . $settings['tab_col'];
        $allowed_html = array(
            'span' => array( 'style' => array(), ),
            'a' => array( 
                'href' => array(), 
                'class' => array(), 
                'title' => array(), 
            ),
        );
        ?>
        <footer id="colophon" class="site-footer footer-style-five footer-style-six footer-template-six footer-template-builder">

            <div class="footer-widgets-area">
                <?php if( $settings['edit_widget_from_appearance'] == 'yes' ) : ?>
                    <div class="restly-footer-widgets">
                        <div class="container">
                            <div class="row restly-ftw-box">
                                <?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
                                    <div class="col-xs-12 col-sm-12 <?php echo esc_attr( $column ); ?>">
                                        <?php dynamic_sidebar( 'footer-1' ); ?>
                                    </div><!-- .widget-area -->
                                <?php endif; ?>
                                <?php if ( is_active_sidebar( 'footer-2' ) ) : ?>
                                    <div class="col-xs-12 col-sm-12 <?php echo esc_attr( $column ); ?>">
                                        <?php dynamic_sidebar( 'footer-2' ); ?>
                                    </div><!-- .widget-area -->
                                <?php endif; ?>	
                                <?php if ( is_active_sidebar( 'footer-3' ) ) : ?>
                                    <div class="col-xs-12 col-sm-12 <?php echo esc_attr( $column ); ?>">
                                        <?php dynamic_sidebar( 'footer-3' ); ?>
                                    </div><!-- .widget-area -->
                                <?php endif; ?>
                                <?php if ( is_active_sidebar( 'footer-3' ) ) : ?>
                                    <div class="col-xs-12 col-sm-12 <?php echo esc_attr( $column ); ?>">
                                        <?php dynamic_sidebar( 'footer-4' ); ?>
                                    </div><!-- .widget-area -->
                                <?php endif; ?>							
                            </div>
                        </div>
                    </div>
                <?php else : ?>
                    <div class="footer-style-six-widget">
                        <div class="container">
                            <div class="row">
                                <?php if( $settings['enable_company_info'] == 'yes' ) : ?>
                                <div class="col-xs-12 col-sm-12 <?php echo esc_attr( $column ); ?>">
                                    <div class="restly_company_info_widget widget">

                                        <?php if( $settings['enable_company_logo'] == 'yes' ) : ?>
                                            <?php echo wp_get_attachment_image( $settings['company_logo']['id'], 'full' ); ?>
                                        <?php else : ?>
                                            <h4 class="widget-title"><?php echo esc_html( $settings['company_title'] ); ?></h4>
                                        <?php endif; ?> 

                                        <div class="company-info-widget">

                                            <?php if( $settings['description'] ) {
                                                echo '<p>' . $settings['description'] . '</p>';
                                            }?>

                                            <div class="social-icons six">
                                                <?php if( $settings['socials'] ) : ?>
                                                <ul>
                                                    <?php foreach( $settings['socials'] as $social ) : 
                                                    $url = $social['social_link']['url'];
                                                    $target = $social['social_link']['is_external'] ? ' target="_blank"' : '';
                                                    $nofollow = $social['social_link']['nofollow'] ? ' rel="nofollow"' : '';    
                                                    ?>
                                                    <li>
                                                        <a href="<?php echo esc_url( $url ); ?>" title="<?php echo esc_attr( $social['social_label'] ); ?>" <?php echo esc_attr( $target . $nofollow ); ?>><?php \Elementor\Icons_Manager::render_icon( $social['social_icon'], [ 'aria-hidden' => 'true' ] ); ?></a>
                                                    </li>    
                                                    <?php endforeach; ?>               
                                                </ul>
                                                <?php endif; ?>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <?php endif; ?>

                                <?php if( $settings['page_enable'] == 'yes' ) : ?>
                                    <div class="col-xs-12 col-sm-12 <?php echo esc_attr( $column ); ?> restly-footer-justify">
                                        <div class="widget footer-widtet footer-page-quick-link">
                                            <?php if( $settings['page_link_title'] ){
                                                echo '<h4 class="widget-title"> ' . esc_html( $settings['page_link_title'] ) . ' </h4>';
                                            }?>
                                            <div class="menu-page-link-container">
                                                <ul class="menu">
                                                    <?php foreach( $settings['links'] as $item ) : 
                                                        $target = $item['page_links']['is_external'] ? ' target="_blank"' : '';
                                                        $nofollow = $item['page_links']['nofollow'] ? ' rel="nofollow"' : '';
                                                    ?>
                                                    <li>
                                                        <?php if( $settings['enable_quick_link_icon'] == 'yes' ) : ?>
                                                            <?php \Elementor\Icons_Manager::render_icon( $item['quick_link_icon'], [ 'aria-hidden' => 'true' ] ); ?>
                                                        <?php endif; ?>
                                                        <a href="<?php echo esc_url( $item['page_links']['url'] ); ?>" <?php echo  $target . $nofollow ?>><?php echo esc_html( $item['page_link_text'] ); ?></a>
                                                    </li>
                                                    <?php endforeach; ?>
                                                </ul>
                                            </div>
                                        </div>	
                                    </div>
                                <?php endif; ?>

                                <?php if( $settings['enable_contact_info'] == 'yes' ) : ?>
                                    <div class="col-xs-12 col-sm-12 <?php echo esc_attr( $column ); ?>">
                                        <div class="widget footer-widtet contact-widget">
                                            <?php if( $settings['contact_section_title'] ){
                                                echo '<h4 class="widget-title">' . esc_html( $settings['contact_section_title'] ) . '</h4>';
                                            } ?>
                                            <?php foreach( $settings['contact_info'] as $contact ) : ?>
                                                <div class="contact-six-list-widget">
                                                    <div class="footer-six-contact-icon">
                                                    <?php \Elementor\Icons_Manager::render_icon( $contact['contact_info_icon'], [ 'aria-hidden' => 'true' ] ); ?>
                                                    </div>
                                                    <div class="footer-six-contact-cotent">
                                                        <div class="footer-six-contact-title"><?php echo esc_html( $contact['contact_info_title'] )?></div>
                                                        <div class="footer-six-contact-des"><?php echo esc_html( $contact['contact_info_des'] )?></div>
                                                    </div>
                                                </div>
                                            <?php endforeach;?>
                                        </div>					
                                    </div>
                                <?php endif; ?>

                                <?php if( $settings['enable_gallery'] == 'yes' ) : ?>
                                    <div class="col-xs-12 col-sm-12 <?php echo esc_attr( $column ); ?>">
                                        <div class="widget footer-widtet footer-six-gallery-widget">
                                            <?php if( $settings['gallery_title'] ){
                                                echo '<h4 class="widget-title">' . esc_html( $settings['gallery_title'] ) . '</h4>';
                                            } ?>
                                            <div class="footer-six-gallery">
                                                <?php foreach ( $settings['gallery_image'] as $image ): ?>
                                                    <div class="footer-six-gallery-img">
                                                        <img src="<?php echo esc_attr( $image['url'] ); ?>" alt="gallery">
                                                        <a href="<?php echo esc_attr( $image['url'] ); ?>" class="gallery-btn popup-image"> <i class="far fa-eye"></i> </a>
                                                    </div>
                                                <?php endforeach ?>
                                            </div>
                                        </div>					
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
                <?php if( $settings['enable_copyright'] === 'yes' ) : ?>
                    <div class="footer-six-copyright_area">
                        <div class="container">
                            <div class="footer-six-copyright-section">
                                <div class="footer-five-copyright-text">
                                    <?php echo wp_kses_post( $settings['copyright_content'] ); ?>
                                </div>
                                <?php if( $settings['copyright_footer_menu_enable'] === 'yes' ) : ?>
                                    <div class="footer-five-footer-menu">
                                        <ul>
                                        <?php foreach($settings['copyright_footer_menu_list'] as $footer_list):
                                            $url      = $footer_list['copyright_footer_menu_link']['url'];
                                            $target   = $footer_list['copyright_footer_menu_link']['is_external'] ? ' target="_blank"' : '';
                                            $nofollow = $footer_list['copyright_footer_menu_link']['nofollow'] ? ' rel="nofollow"' : '';
                                            ?>	
                                            <li>
                                                <a href="<?php echo esc_url($url); ?>" <?php echo $target . $nofollow;?> >
                                                    <?php echo esc_html( $footer_list['copyright_footer_menu'] ); ?>
                                                </a>
                                            </li>
                                            <?php endforeach;?>
                                        </ul>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </footer>
        <?php
    }
}
Plugin::instance()->widgets_manager->register( new restly_footer_template_six );