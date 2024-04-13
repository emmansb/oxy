<?php namespace Elementor;

class restly_footer_template_four extends Widget_Base {

    public function get_name() {

        return 'restly_footer_template_four';
    }

    public function get_title() {
        return esc_html__( 'Restly Footer Four', 'restlycore' );
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
                'default' => esc_html__( 'Company', 'restlycore' ),
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
                    'library' => 'solid',
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
                        'social_icon' => 'fab fa-facebook-f',
                    ],
                    [
                        'social_icon' => 'fab fa-twitter',
                    ],
                    [
                        'social_icon' => 'fab fa-linkedin-in',
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
                'default' => esc_html__( 'Quick Links', 'restlycore' ),
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
                    'value' => 'ico ico-arrow-right',
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
                'default' => 'flex-start',
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
                'label' => esc_html__( 'Service List', 'restlycore' ),
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
            'service_section_title',
            [
                'label' => esc_html__( 'Title', 'restlycore' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Services', 'restlycore' ),
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
            'sercvice_info_icon',
            [
                'label' => esc_html__( 'Icon', 'restlycore' ),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'ico ico-arrow-right',
                    'library' => 'fa-solid',
                ],
                
            ]
        );
        
        $repeater->add_control(
            'sercvice_info_list',
            [
                'label' => esc_html__( 'Title', 'restlycore' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'button_url',
            [
                'label'       => esc_html__( 'Button Link', 'restlycore' ),
                'type'        => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__( 'https://your-link.com', 'restlycore' ),
                'options'     => ['url', 'is_external', 'nofollow'],
                'default'     => [
                    'url'               => '',
                    'is_external'       => true,
                    'nofollow'          => true,
                    'custom_attributes' => '',
                ],
                'label_block' => true,
            ]
        );
        $this->add_control(
            'service',
            [
                'label'   => esc_html__( 'Service List', 'restlycore' ),
                'type'    => \Elementor\Controls_Manager::REPEATER,
                'fields'  => $repeater->get_controls(),
                'default' => [
                    [
                        'sercvice_info_list' => esc_html__( 'Cyber Security', 'restlycore' ),
                    ],
                    [
                        'sercvice_info_list' => esc_html__( 'IT Management', 'restlycore' ),
                    ],
                    [
                        'sercvice_info_list' => esc_html__( 'QA & Testing', 'restlycore' ),
                    ],
                    [
                        'sercvice_info_list' => esc_html__( 'Infrastructure Plan', 'restlycore' ),
                    ],
                    [
                        'sercvice_info_list' => esc_html__( 'Plan IT Consultant', 'restlycore' ),
                    ],
                ],
                'title_field' => '{{{ sercvice_info_list }}}',
                'condition' => [
                    'enable_contact_info' => 'yes',
                ],
            ]
        );

        $this->end_controls_section();


        $this->start_controls_section(
            'newsletter_section',
            [
                'label' => esc_html__( 'Newsletter', 'restlycore' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'edit_widget_from_appearance!' => 'yes',
                ],
            ]
        );
        
        $this->add_control(
            'enable_subscribe',
            [
                'label' => esc_html__( 'Enable Subscribe', 'restlycore' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Show', 'restlycore' ),
                'label_off' => esc_html__( 'Hide', 'restlycore' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'newsletter_title',
            [
                'label' => esc_html__( 'Title', 'restlycore' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Subscribe', 'restlycore' ),
                'condition' => [
                    'enable_subscribe' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'newsletter_dec',
            [
                'label' => esc_html__( 'Description', 'restlycore' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'rows' => 8,
                'default' => esc_html__( 'Are you interested in follow to a particular website', 'restlycore' ),
                'condition' => [
                    'enable_subscribe' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'newsletter_code',
            [
                'label' => esc_html__( 'Shortcode', 'restlycore' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
                'condition' => [
                    'enable_subscribe' => 'yes',
                ],
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
            'enable_copyright_style',
            [
                'label' => esc_html__( 'Style Two', 'restlycore' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Show', 'restlycore' ),
                'label_off' => esc_html__( 'Hide', 'restlycore' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );
        $this->add_control(
			'footer_select',
			[
				'label' => esc_html__( 'Select', 'restlycore' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'text',
				'options' => [
					'logo' => esc_html__( 'Logo', 'restlycore' ),
					'text'  => esc_html__( 'Text', 'restlycore' ),
				],
			]
		);
        $this->add_control(
			'footer_logo',
			[
				'label' => __( 'Choose Image', 'restlycore' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
                'condition' => [
                    'footer_select' => 'logo',
                ],
			]
		);
        $this->add_control(
            'copyright_logo_text',
            [
                'label' => esc_html__( 'Title', 'restlycore' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Restly', 'restlycore' ),
                'condition' => [
                    'footer_select' => 'text',
                ],
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
                'selector' => '{{WRAPPER}} .footer-four-widget-area',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'box_border',
                'label'    => esc_html__( 'Border', 'restlycore' ),
                'selector' => '{{WRAPPER}} .footer-four-widget-area',
            ]
        );
        $this->add_responsive_control(
            'padding',
            [
                'label' => esc_html__( 'Padding', 'restlycore' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                'selectors' => [
                    '{{WRAPPER}} .footer-four-widget-area' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .footer-four-widget-area' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'widget_title_style',
            [
                'label' => esc_html__( 'Widget Title Style', 'restlycore' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
    
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'widget_title_typo',
                'selector' => '{{WRAPPER}} .footer-style-four .widget-title',
            ]
        );

        $this->add_responsive_control(
            'widget_title_color',
            [
                'label' => esc_html__( 'Text Color', 'restlycore' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .footer-style-four .widget-title' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'widget_title_border_color',
            [
                'label' => esc_html__( 'Border Color', 'restlycore' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .footer-style-four .widget-title:after' => 'background-color: {{VALUE}}',
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
                    '{{WRAPPER}} .footer-style-four .widget-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .footer-style-four .widget-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();
        // COMPANY SECTION CSS
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
                        'label' => esc_html__( 'Width', 'restlycore' ),
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

                $this->add_responsive_control(
                    'company_info_icon_width',
                    [
                        'label' => esc_html__( 'Icon Width', 'restlycore' ),
                        'type' => \Elementor\Controls_Manager::SLIDER,
                        'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                        'range' => [
                            'px' => [
                                'min' => 0,
                                'max' => 150,
                                'step' => 1,
                            ]
                        ],
                        'selectors' => [
                            '{{WRAPPER}} .company-info-widget ul li i' => 'width: {{SIZE}}{{UNIT}};',
                        ],
                    ]
                );

                $this->add_responsive_control(
                    'company_info_icon_height',
                    [
                        'label' => esc_html__( 'Icon Height', 'restlycore' ),
                        'type' => \Elementor\Controls_Manager::SLIDER,
                        'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                        'range' => [
                            'px' => [
                                'min' => 0,
                                'max' => 150,
                                'step' => 1,
                            ]
                        ],
                        'selectors' => [
                            '{{WRAPPER}} .company-info-widget ul li i' => 'height: {{SIZE}}{{UNIT}};',
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
                        'selector' => '{{WRAPPER}} .footer-style-four .footer-widgets-area .widget ul li a',
                    ]
                );
                $this->add_responsive_control(
                    'page_link_item_color',
                    [
                        'label' => esc_html__( 'Color', 'restlycore' ),
                        'type' => \Elementor\Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .footer-style-four .footer-widgets-area .widget ul li a' => 'color: {{VALUE}}',
                        ],
                    ]
                );

                $this->add_responsive_control(
                    'page_link_item_hcolor',
                    [
                        'label' => esc_html__( 'Hover Color', 'restlycore' ),
                        'type' => \Elementor\Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .footer-style-four .footer-widgets-area .widget ul li a:hover' => 'color: {{VALUE}}',
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
                            '{{WRAPPER}} .footer-style-four .footer-widgets-area .widget ul li' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                            '{{WRAPPER}} .footer-style-four .footer-widgets-area .widget ul li' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                'label' => esc_html__( 'Service Section', 'restlycore' ),
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
                    'contact_info_css_item',
                    [
                        'label' => esc_html__( 'List', 'restlycore' ),
                    ]
                );
            
                $this->add_control(
                    'contact_info_icon_note',
                    [
                        'label' => esc_html__( 'Icon Options', 'restlycore' ),
                        'type' => \Elementor\Controls_Manager::HEADING,
                        'separator' => 'before',
                    ]
                );

                $this->add_responsive_control(
                    'contact_info_icon_color',
                    [
                        'label' => esc_html__( 'icon Color', 'restlycore' ),
                        'type' => \Elementor\Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .contact-widget .service-list-widget ul li i' => 'color: {{VALUE}}',
                        ],
                    ]
                );

                $this->add_responsive_control(
                    'contact_info_icon_bg',
                    [
                        'label' => esc_html__( 'Background Color', 'restlycore' ),
                        'type' => \Elementor\Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .contact-widget .service-list-widget ul li i' => 'background-color: {{VALUE}}',
                        ],
                    ]
                );

                $this->add_responsive_control(
                    'contact_info_icon_width',
                    [
                        'label' => esc_html__( 'Icon Width', 'restlycore' ),
                        'type' => \Elementor\Controls_Manager::SLIDER,
                        'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                        'range' => [
                            'px' => [
                                'min' => 0,
                                'max' => 150,
                                'step' => 1,
                            ]
                        ],
                        'selectors' => [
                            '{{WRAPPER}} .contact-widget .service-list-widget ul li i' => 'width: {{SIZE}}{{UNIT}};',
                        ],
                    ]
                );

                $this->add_responsive_control(
                    'contact_info_icon_height',
                    [
                        'label' => esc_html__( 'Icon Height', 'restlycore' ),
                        'type' => \Elementor\Controls_Manager::SLIDER,
                        'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                        'range' => [
                            'px' => [
                                'min' => 0,
                                'max' => 150,
                                'step' => 1,
                            ]
                        ],
                        'selectors' => [
                            '{{WRAPPER}} .contact-widget .service-list-widget ul li i' => 'height: {{SIZE}}{{UNIT}};',
                        ],
                    ]
                );

                $this->add_group_control(
                    \Elementor\Group_Control_Typography::get_type(),
                    [
                        'name' => 'contact_info_icon_typo',
                        'selector' => '{{WRAPPER}} .contact-widget .service-list-widget ul li i',
                    ]
                );

                $this->add_responsive_control(
                    'contact_info_icon_radius',
                    [
                        'label' => esc_html__( 'Border Radius', 'restlycore' ),
                        'type' => \Elementor\Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                        'selectors' => [
                            '{{WRAPPER}} .contact-widget .service-list-widget ul li i' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                    ]
                );

                $this->add_responsive_control(
                    'contact_info_icon_margin',
                    [
                        'label' => esc_html__( 'Margin', 'restlycore' ),
                        'type' => \Elementor\Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                        'selectors' => [
                            '{{WRAPPER}} .contact-widget .service-list-widget ul li i' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                    ]
                );

                $this->add_responsive_control(
                    'contact_info_icon_padding',
                    [
                        'label' => esc_html__( 'Padding', 'restlycore' ),
                        'type' => \Elementor\Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                        'selectors' => [
                            '{{WRAPPER}} .contact-widget .service-list-widget ul li i' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                    ]
                );

                $this->add_control(
                    'contact_info_list_note',
                    [
                        'label' => esc_html__( 'Content Options', 'restlycore' ),
                        'type' => \Elementor\Controls_Manager::HEADING,
                        'separator' => 'before',
                    ]
                );

                $this->add_responsive_control(
                    'contact_info_dec_color',
                    [
                        'label' => esc_html__( 'Color', 'restlycore' ),
                        'type' => \Elementor\Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .contact-widget .service-list-widget ul li' => 'color: {{VALUE}}',
                        ],
                    ]
                );

                $this->add_group_control(
                    \Elementor\Group_Control_Typography::get_type(),
                    [
                        'name' => 'contact_info_dec_typo',
                        'selector' => '{{WRAPPER}} .contact-widget .service-list-widget ul li',
                    ]
                );


                $this->add_responsive_control(
                    'contact_info_dec_margin',
                    [
                        'label' => esc_html__( 'Margin', 'restlycore' ),
                        'type' => \Elementor\Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                        'selectors' => [
                            '{{WRAPPER}} .contact-widget .service-list-widget ul li' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                    ]
                );

                $this->add_responsive_control(
                    'contact_info_dec_padding',
                    [
                        'label' => esc_html__( 'Padding', 'restlycore' ),
                        'type' => \Elementor\Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                        'selectors' => [
                            '{{WRAPPER}} .contact-widget .service-list-widget ul li' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                    ]
                );

                $this->end_controls_tab();
            
            $this->end_controls_tabs();

        $this->end_controls_section();

        $this->start_controls_section(
            'subscribe_css_options',
            [
                'label' => esc_html__( 'Newsletter', 'restlycore' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        
        $this->add_responsive_control(
            'newsletter_alignment',
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
                    '{{WRAPPER}} .widget_restly_newsletter_widget' => 'text-align: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'newsletter_info_margin',
            [
                'label' => esc_html__( 'Margin', 'restlycore' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                'selectors' => [
                    '{{WRAPPER}} .widget_restly_newsletter_widget' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'newsletter_info_padding',
            [
                'label' => esc_html__( 'Padding', 'restlycore' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                'selectors' => [
                    '{{WRAPPER}} .widget_restly_newsletter_widget' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->start_controls_tabs(
            'newsletter_css_tabs'
        );
        
            $this->start_controls_tab(
                'newsletter_css_dec',
                [
                    'label' => esc_html__( 'Dec', 'restlycore' ),
                ]
            );
        
            $this->add_group_control(
                    \Elementor\Group_Control_Typography::get_type(),
                    [
                        'name' => 'newsletter_dec_typo',
                        'selector' => '{{WRAPPER}} .footer-style-four .company-subscribe-widgets',
                    ]
                );
                $this->add_responsive_control(
                    'newsletter_dec_color',
                    [
                        'label' => esc_html__( 'Color', 'restlycore' ),
                        'type' => \Elementor\Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .footer-style-four .company-subscribe-widgets' => 'color: {{VALUE}}',
                        ],
                    ]
                );
                $this->add_responsive_control(
                    'newsletter_dec_margin',
                    [
                        'label' => esc_html__( 'Margin', 'restlycore' ),
                        'type' => \Elementor\Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                        'selectors' => [
                            '{{WRAPPER}} .footer-style-four .company-subscribe-widgets' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                    ]
                );

                $this->add_responsive_control(
                    'newsletter_dec_padding',
                    [
                        'label' => esc_html__( 'Padding', 'restlycore' ),
                        'type' => \Elementor\Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                        'selectors' => [
                            '{{WRAPPER}} .footer-style-four .company-subscribe-widgets' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                    ]
                );

            $this->end_controls_tab();

            $this->start_controls_tab(
                'newsletter_css_input',
                [
                    'label' => esc_html__( 'Input', 'restlycore' ),
                ]
            );
        
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name' => 'newsletter_input_typo',
                    'selector' => '{{WRAPPER}} .subscribe-form-v2 input.wpcf7-form-control.wpcf7-email',
                ]
            );

            $this->add_responsive_control(
                'newsletter_input_color',
                [
                    'label' => esc_html__( 'Text Color', 'restlycore' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .subscribe-form-v2 input.wpcf7-form-control.wpcf7-email' => 'color: {{VALUE}}',
                        '{{WRAPPER}} .subscribe-form-v2 input.wpcf7-form-control.wpcf7-email::placeholder' => 'color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Background::get_type(),
                [
                    'name' => 'newsletter_input_bg',
                    'types' => [ 'classic', 'gradient'],
                    'selector' => '{{WRAPPER}} .subscribe-form-v2 input.wpcf7-form-control.wpcf7-email',
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Border::get_type(),
                [
                    'name' => 'newsletter_input_border',
                    'selector' => '{{WRAPPER}} .subscribe-form-v2 input.wpcf7-form-control.wpcf7-email',
                ]
            );

            $this->add_responsive_control(
                'newsletter_input_radius',
                [
                    'label' => esc_html__( 'Border Radius', 'restlycore' ),
                    'type' => \Elementor\Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                    'selectors' => [
                        '{{WRAPPER}} .subscribe-form-v2 input.wpcf7-form-control.wpcf7-email' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Box_Shadow::get_type(),
                [
                    'name' => 'newsletter_input_shadow',
                    'label' => esc_html__( 'Box Shadow', 'restlycore' ),
                    'selector' => '{{WRAPPER}}.subscribe-form-v2 input.wpcf7-form-control.wpcf7-email',
                ]
            );
            $this->add_responsive_control(
                'newsletter_input_margin',
                [
                    'label' => esc_html__( 'Margin', 'restlycore' ),
                    'type' => \Elementor\Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                    'selectors' => [
                        '{{WRAPPER}} .subscribe-form-v2 input.wpcf7-form-control.wpcf7-email' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_responsive_control(
                'newsletter_input_padding',
                [
                    'label' => esc_html__( 'Padding', 'restlycore' ),
                    'type' => \Elementor\Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                    'selectors' => [
                        '{{WRAPPER}} .subscribe-form-v2 input.wpcf7-form-control.wpcf7-email' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

            $this->end_controls_tab();

            $this->start_controls_tab(
                'newsletter_css_bts',
                [
                    'label' => esc_html__( 'Button', 'restlycore' ),
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name' => 'newsletter_icon_typo',
                    'selector' => '{{WRAPPER}} .subscribe-form-v2 input.wpcf7-form-control.wpcf7-submit',
                ]
            );
            $this->add_responsive_control(
                'newsletter_icon_color',
                [
                    'label' => esc_html__( ' Color', 'restlycore' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .subscribe-form-v2 input.wpcf7-form-control.wpcf7-submit' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_responsive_control(
                'newsletter_icon_hcolor',
                [
                    'label' => esc_html__( 'hover Color', 'restlycore' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .subscribe-form-v2 input.wpcf7-form-control.wpcf7-submit:hover' => 'color: {{VALUE}}',
                    ],
                ]
            );
            
            $this->add_group_control(
                \Elementor\Group_Control_Background::get_type(),
                [
                    'name' => 'newsletter_icon_bg',
                    'label' => esc_html__( 'Background', 'restlycore' ),
                    'types' => [ 'classic', 'gradient', 'video' ],
                    'selector' => '{{WRAPPER}} .subscribe-form-v2 input.wpcf7-form-control.wpcf7-submit',
                    
                ]
            );
            $this->add_responsive_control(
                'newsletter_icon_hbg',
                [
                    'label' => esc_html__( 'Background Hover Color', 'restlycore' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .subscribe-form-v2 input.wpcf7-form-control.wpcf7-submit:hover' => 'background-color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Border::get_type(),
                [
                    'name' => 'newsletter_icon_border',
                    'selector' => '{{WRAPPER}} .subscribe-form-v2 input.wpcf7-form-control.wpcf7-submit',
                ]
            );

            $this->add_responsive_control(
                'newsletter_icon_radius',
                [
                    'label' => esc_html__( 'Border Radius', 'restlycore' ),
                    'type' => \Elementor\Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                    'selectors' => [
                        '{{WRAPPER}} .subscribe-form-v2 input.wpcf7-form-control.wpcf7-submit' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Box_Shadow::get_type(),
                [
                    'name' => 'newsletter_icon_shadow',
                    'label' => esc_html__( 'Box Shadow', 'restlycore' ),
                    'selector' => '{{WRAPPER}}.subscribe-form-v2 input.wpcf7-form-control.wpcf7-submit',
                ]
            );
            $this->add_responsive_control(
                'newsletter_icon_margin',
                [
                    'label' => esc_html__( 'Margin', 'restlycore' ),
                    'type' => \Elementor\Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                    'selectors' => [
                        '{{WRAPPER}} .subscribe-form-v2 input.wpcf7-form-control.wpcf7-submit' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_responsive_control(
                'newsletter_icon_padding',
                [
                    'label' => esc_html__( 'Padding', 'restlycore' ),
                    'type' => \Elementor\Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                    'selectors' => [
                        '{{WRAPPER}} .subscribe-form-v2 input.wpcf7-form-control.wpcf7-submit' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

            $this->end_controls_tab();
        
        $this->end_controls_tabs();

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
        $this->start_controls_tabs(
            'copyright_section_section_tabs'
        );
        $this->start_controls_tab(
            'copyright_section_normal_tab',
            [
                'label' => esc_html__( 'Box Style', 'restlycore' ),
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
					'{{WRAPPER}} .footer-four-copyright_area' => 'justify-content: {{VALUE}};',
				],
			]
		);
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name'     => 'fbox_backgrounds',
                'label'    => esc_html__( 'Background', 'restlycore' ),
                'types'    => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .footer-four-copyright_area',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'fbox_border',
                'label'    => esc_html__( 'Border', 'restlycore' ),
                'selector' => '{{WRAPPER}} .footer-four-copyright_area',
            ]
        );
        $this->add_responsive_control(
            'fbox_radius',
            [
                'label'      => esc_html__( 'Border Radius', 'restlycore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .footer-four-copyright_area' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name'     => 'fbox_shadow',
                'label'    => esc_html__( 'Box Shadow', 'restlycore' ),
                'selector' => '{{WRAPPER}} .footer-four-copyright_area',
            ]
        );
        $this->add_responsive_control(
            'fbox_margin',
            [
                'label'      => esc_html__( 'Margin', 'restlycore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .footer-four-copyright_area' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'fbox_padding',
            [
                'label'      => esc_html__( 'Padding', 'restlycore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .footer-four-copyright_area' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->start_controls_tab(
            'copyright_section_logo_tab',
            [
                'label' => esc_html__( 'Logo Style', 'restlycore' ),
                'condition' => [
                    'footer_select' => 'logo',
                ],
            ]
        );
        $this->add_responsive_control(
			'max_Image_height',
			[
				'label' => esc_html__( 'Max Height', 'restlycore' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
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
                'default' => [
					'unit' => 'px',
				],
				'selectors' => [
					'{{WRAPPER}} .footer-four-logo-are > img' => 'max-height: {{SIZE}}{{UNIT}};',
				],
			]
		);
        $this->add_responsive_control(
			'Image_height',
			[
				'label' => esc_html__( 'Height', 'restlycore' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
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
                'default' => [
					'unit' => 'px',
				],
				'selectors' => [
					'{{WRAPPER}} .footer-four-logo-are > img' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);
        $this->add_responsive_control(
			'Image_width',
			[
				'label' => esc_html__( 'Width', 'restlycore' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
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
					'{{WRAPPER}} .footer-four-logo-are > img' => 'width: {{SIZE}}{{UNIT}};',
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
                    '{{WRAPPER}} .footer-four-logo-are > img' => 'object-fit: {{VALUE}}',
                ],
            ]
        );
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'restly_image_border',
				'selector' => '{{WRAPPER}} .footer-four-logo-are > img',
			]
		);
		 $this->add_responsive_control(
            'image_border_radius',
            [
                'label' => esc_html__( 'Border Radius', 'restlycore' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .footer-four-logo-are > img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->start_controls_tab(
            'copyright_title',
            [
                'label' => esc_html__( 'Title', 'restlycore' ),
                'condition' => [
                    'footer_select' => 'text',
                ],
            ]
        );
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'Copyright_title_typo',
				'label' => __( 'Typography', 'restlycore' ),
				'selector' => '{{WRAPPER}} .footer-logo-title',
			]
		);
		$this->add_responsive_control(
			'Copyright_title_color',
			[
				'label'       => esc_html__('Color', 'restlycore'),
				'type'        => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .footer-logo-title' => 'color: {{VALUE}};',
				],
			]
		);
        
		$this->add_responsive_control(
			'Copyright_title_margin',
			[
				'label'      => esc_html__( 'Margin', 'restlycore' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .footer-logo-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
        $this->add_responsive_control(
			'Copyright_title_padding',
			[
				'label'      => esc_html__( 'Padding', 'restlycore' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .footer-logo-title' => 'Padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
        $this->end_controls_tab();
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
				'selector' => '{{WRAPPER}} .footer-four-copyright-text',
			]
		);
		$this->add_responsive_control(
			'Copyright_color',
			[
				'label'       => esc_html__('Color', 'restlycore'),
				'type'        => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .footer-four-copyright-text' => 'color: {{VALUE}};',
				],
			]
		);
        $this->add_responsive_control(
			'Copyright_link_color',
			[
				'label'       => esc_html__('Link Color', 'restlycore'),
				'type'        => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .footer-four-copyright-text a' => 'color: {{VALUE}};',
				],
			]
		);
        $this->add_responsive_control(
			'Copyright_link_color_Hover',
			[
				'label'       => esc_html__('Hover Color', 'restlycore'),
				'type'        => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .footer-four-copyright-text a:hover' => 'color: {{VALUE}};',
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
					'{{WRAPPER}} .footer-four-copyright-text' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .footer-four-copyright-text' => 'Padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
        <footer id="colophon" class="site-footer footer-style-four footer-template-four footer-template-builder">

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
                    <div class="footer-four-widget-area">
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

                                            <div class="social-icons">
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
                                            <?php if( $settings['service_section_title'] ){
                                                echo '<h4 class="widget-title">' . esc_html( $settings['service_section_title'] ) . '</h4>';
                                            } ?>
                                            <div class="service-list-widget">
                                                <ul>
                                                    <?php foreach( $settings['service'] as $item ) : ?>
                                                    <li><?php \Elementor\Icons_Manager::render_icon( $item['sercvice_info_icon'], [ 'aria-hidden' => 'true' ] ); ?>
                                                    <?php  $lurl      = $item['button_url']['url'];
                                                        $ltarget   = $item['button_url']['is_external'] ? ' target="_blank"' : '';
                                                        $lnofollow = $item['button_url']['nofollow'] ? ' rel="nofollow"' : '';
                                                        ?>
                                                    <a href="<?php echo esc_url($lurl); ?>" <?php echo $ltarget . $lnofollow;?>> <?php echo esc_html( $item['sercvice_info_list'] ); ?></li></a>
                                                    <?php endforeach; ?>
                                                </ul>
                                            </div>
                                        </div>					
                                    </div>
                                    
                                <?php endif; ?>


                                <?php if( $settings['enable_subscribe'] == 'yes' ) : ?>

                                    <div class="col-xs-12 col-sm-12 <?php echo esc_attr( $column ); ?>">
                                        <div class="widget footer-widtet widget_restly_newsletter_widget">
                                                <?php if( $settings['newsletter_title'] ){
                                                    echo '<h4 class="widget-title">' . esc_html( $settings['newsletter_title'] ) . '</h4>';
                                                } ?>
                                                <div class="company-subscribe-widgets">
                                                    <?php if( $settings['newsletter_dec'] ){ ?>
                                                        <?php echo esc_html($settings['newsletter_dec']); ?>
                                                <?php }?>
                                                </div>
                                                <?php if( $settings['newsletter_code'] ) : ?>
                                                    <div class="subscribe-form-v2">
                                                        <?php echo do_shortcode( $settings['newsletter_code'] ); ?>
                                                    </div>
                                                <?php endif; ?>
                                        </div>					
                                    </div>

                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>

                <?php if( $settings['enable_copyright'] === 'yes' ) : ?>
                    <?php if( $settings['enable_copyright_style'] == 'yes' ){ ?>
                        <div class="footer-four-copyright_area ">
                            <div class="container">
                                <div class="footer-four-copyright-section">
                                    <div class="footer-four-logo-are">
                                        <?php if( $settings['footer_select'] == 'logo' ) : ?>
                                            <?php echo wp_get_attachment_image( $settings['footer_logo']['id'], 'full' ); ?>
                                        <?php  endif; ?>
                                        <?php if( $settings['footer_select'] == 'text' ) : ?>
                                            <?php if ( !empty( $settings['copyright_logo_text'] ) ) : ?>
                                                <h2 class="footer-logo-title"><?php echo esc_html( $settings['copyright_logo_text'] ); ?></h2>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </div>
                                    <?php if ( !empty( $settings['copyright_content'] ) ) : ?>
                                        <div class="footer-four-copyright-text">
                                            <?php echo wp_kses_post( $settings['copyright_content'] ); ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php }else{ ?>
                        <div class="container">
                            <div class="footer-four-copyright-section footer-four-copyright_area">
                                <div class="footer-four-logo-are">
                                    <?php if( $settings['footer_select'] == 'logo' ) : ?>
                                        <?php echo wp_get_attachment_image( $settings['footer_logo']['id'], 'full' ); ?>
                                    <?php  endif; ?>
                                    <?php if( $settings['footer_select'] == 'text' ) : ?>
                                        <?php if ( !empty( $settings['copyright_logo_text'] ) ) : ?>
                                            <h2 class="footer-logo-title"><?php echo esc_html( $settings['copyright_logo_text'] ); ?></h2>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                </div>
                               <?php if ( !empty( $settings['copyright_content'] ) ) : ?>
                                    <div class="footer-four-copyright-text">
                                        <?php echo wp_kses_post( $settings['copyright_content'] ); ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php }; ?>
                <?php endif; ?>

            </div>
        </footer>
        <?php
    }
}
Plugin::instance()->widgets_manager->register( new restly_footer_template_four );