<?php namespace Elementor;

class restly_footer_template_two extends Widget_Base {

    public function get_name() {

        return 'restly_footer_template_two';
    }

    public function get_title() {
        return esc_html__( 'Restly Footer Two', 'restlycore' );
    }

    public function get_icon() {

        return 'eicon-footer';
    }

    public function get_categories() {
        return ['restlyhf'];
    }
    
    protected function register_controls() {


        // Footer Top Section
        $this->start_controls_section(
            'footer_top_section',
            [
                'label' => esc_html__( 'Footer Top Section', 'restlycore' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        
        $this->add_control(
            'enable_top_footer',
            [
                'label' => esc_html__( 'Enable Top Footer', 'restlycore' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Show', 'restlycore' ),
                'label_off' => esc_html__( 'Hide', 'restlycore' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $repeater2 = new \Elementor\Repeater();
        
        $repeater2->add_control(
            'footer_top_icon',
            [
                'label' => esc_html__( 'Icon', 'restlycore' ),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-phone-alt',
                    'library' => 'fa-solid',
                ],
            ]
        );
        
        $repeater2->add_control(
            'footer_top_label',
            [
                'label' => esc_html__( 'Label', 'restlycore' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Call us', 'restlycore' ),
            ]
        );

        $repeater2->add_control(
            'footer_top_content',
            [
                'label' => esc_html__( 'Content', 'restlycore' ),
                'type' => \Elementor\Controls_Manager::WYSIWYG,
                'default' => __( 'info@example.com', 'restlycore' ),
            ]
        );

        $repeater2->add_responsive_control(
            'item_position',
            [
                'label' => esc_html__( 'Item Position', 'restlycore' ),
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
                    '{{WRAPPER}} {{CURRENT_ITEM}}' => 'justify-content: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'FooterTop',
            [
                'label'   => esc_html__( 'Logo List', 'restlycore' ),
                'type'    => \Elementor\Controls_Manager::REPEATER,
                'fields'  => $repeater2->get_controls(),
                'default' => [
                    [
                        'footer_top_label' => '',
                    ],
                ],
                'title_field' => '{{{ footer_top_label }}}',
                'condition' => [
                    'enable_top_footer' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'footer_top_note',
            [
                'label' => esc_html__( 'Column Control', 'restlycore' ),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        
        $this->add_control(
            'footer_top_desktop_col',
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
            ]
        );

        $this->add_control(
            'footer_top_laptop_col',
            [
                'label'   => __( 'Columns for Laptop', 'restlycore' ),
                'type'    => Controls_Manager::SELECT,
                'default' => 'col-lg-4',
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
            'footer_top_tab_col',
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


        $repeater = new \Elementor\Repeater();
        
        $repeater->add_control(
            'icon',
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
            'content',
            [
                'label' => esc_html__( 'Content', 'restlycore' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'rows' => 5,
                'default' => esc_html__( '1791 Yorkshire Circle Kitty Hawk, NC 279499', 'restlycore' ),
            ]
        );

        $this->add_control(
            'info',
            [
                'label'   => esc_html__( 'Logo List', 'restlycore' ),
                'type'    => \Elementor\Controls_Manager::REPEATER,
                'fields'  => $repeater->get_controls(),
                'default' => [
                    [
                        'content' => esc_html__( '1791 Yorkshire Circle Kitty Hawk, NC 279499', 'restlycore' ),
                    ],
                ],
                'condition' => [
                    'enable_company_info' => 'yes',
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
                'default' => esc_html__( 'Page Links', 'restlycore' ),
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
                        'page_link_text' => esc_html( 'Service' ),
                        'page_links' => '#',
                    ],
                    [
                        'page_link_text' => esc_html( 'Portfolio' ),
                        'page_links' => '#',
                    ],
                    [
                        'page_link_text' => esc_html( 'Contact us' ),
                        'page_links' => '#',
                    ],
                    [
                        'page_link_text' => esc_html( 'Blog us' ),
                        'page_links' => '#',
                    ],
                    [
                        'page_link_text' => esc_html( 'Blog Us' ),
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
                'label' => esc_html__( 'Contact Section', 'restlycore' ),
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
                'default' => esc_html__( 'Contacts', 'restlycore' ),
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
            'contact_info_dec',
            [
                'label' => esc_html__( 'Description', 'restlycore' ),
                'type' => \Elementor\Controls_Manager::WYSIWYG,
                'default' => esc_html__( '1791 Yorkshire Circle Kitty Hawk, NC 27949', 'restlycore' ),
            ]
        );

        $this->add_control(
            'contacts',
            [
                'label'   => esc_html__( 'Contact Info List', 'restlycore' ),
                'type'    => \Elementor\Controls_Manager::REPEATER,
                'fields'  => $repeater->get_controls(),
                'default' => [
                    [
                        'contact_info_dec' => esc_html__( '1791 Yorkshire Circle Kitty Hawk, NC 27949', 'restlycore' ),
                    ],
                ],
                'title_field' => '{{{ contact_info_dec }}}',
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
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'rows' => 8,
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
                'default' => 'col-xl-4',
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
                'default' => 'col-lg-4',
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
            'enable_social',
            [
                'label' => esc_html__( 'Enable Social Link', 'restlycore' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Show', 'restlycore' ),
                'label_off' => esc_html__( 'Hide', 'restlycore' ),
                'return_value' => 'yes',
                'default' => 'yes',
                'condition' => [
                    'enable_copyright' => 'yes',
                ],
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
                ],
                'condition' => [
                    'enable_social' => 'yes',
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
                'selector' => '{{WRAPPER}} .footer-widgets-area',
            ]
        );

        $this->add_control(
            'box_bg_note',
            [
                'label' => esc_html__( ' Background Opacity Option', 'restlycore' ),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'box_bg_opacity',
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .footer-widgets-area:after',
            ]
        );

        $this->add_responsive_control(
            'padding',
            [
                'label' => esc_html__( 'Padding', 'restlycore' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                'selectors' => [
                    '{{WRAPPER}} .footer-widgets-area' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .footer-widgets-area' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();


        // Footer Top section CSS 

        $this->start_controls_section(
            'footer_top_css_options',
            [
                'label' => esc_html__( 'Top Footer', 'restlycore' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        
            $this->add_responsive_control(
                'top_footer_margin',
                [
                    'label' => esc_html__( 'Margin', 'restlycore' ),
                    'type' => \Elementor\Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                    'selectors' => [
                        '{{WRAPPER}} .footer-top-area' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
            $this->add_responsive_control(
                'top_footer_padding',
                [
                    'label' => esc_html__( 'Padding', 'restlycore' ),
                    'type' => \Elementor\Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                    'selectors' => [
                        '{{WRAPPER}} .footer-top-area' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_responsive_control(
                'top_footer_align',
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
                        '{{WRAPPER}} .footer-top-area' => 'text-align: {{VALUE}};',
                    ],
                ]
            );

            $this->start_controls_tabs(
                'top_footer_css_tabs'
            );
            
                $this->start_controls_tab(
                    'top_footer_icon_tab',
                    [
                        'label' => esc_html__( 'Icon', 'restlycore' ),
                    ]
                );
                
                    $this->add_responsive_control(
                        'fttop_icon_width',
                        [
                            'label' => esc_html__( 'Width', 'restlycore' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 200,
                                    'step' => 5,
                                ],
                                '%' => [
                                    'min' => 0,
                                    'max' => 100,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .ft2-icon i' => 'width: {{SIZE}}{{UNIT}};',
                            ],
                        ]
                    );

                    $this->add_responsive_control(
                        'fttop_icon_height',
                        [
                            'label' => esc_html__( 'Height', 'restlycore' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 200,
                                    'step' => 5,
                                ],
                                '%' => [
                                    'min' => 0,
                                    'max' => 100,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .ft2-icon i' => 'height: {{SIZE}}{{UNIT}};',
                            ],
                        ]
                    );

                    $this->add_responsive_control(
                        'fttop_icon_color',
                        [
                            'label' => esc_html__( 'Color', 'restlycore' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .ft2-icon i' => 'color: {{VALUE}}',
                            ],
                        ]
                    );

                    $this->add_responsive_control(
                        'fttop_icon_bg',
                        [
                            'label' => esc_html__( 'Background Color', 'restlycore' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .ft2-icon i' => 'background-color: {{VALUE}}',
                            ],
                        ]
                    );

                    $this->add_group_control(
                        \Elementor\Group_Control_Typography::get_type(),
                        [
                            'name' => 'fttop_icon_typo',
                            'selector' => '{{WRAPPER}} .ft2-icon i',
                        ]
                    );

                    $this->add_group_control(
                        \Elementor\Group_Control_Border::get_type(),
                        [
                            'name' => 'fttop_icon_border',
                            'selector' => '{{WRAPPER}} .ft2-icon i',
                        ]
                    );

                    $this->add_responsive_control(
                        'fttop_icon_radius',
                        [
                            'label' => esc_html__( 'Border Radius', 'restlycore' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                            'selectors' => [
                                '{{WRAPPER}} .ft2-icon i' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ]
                    );

                    $this->add_group_control(
                        \Elementor\Group_Control_Box_Shadow::get_type(),
                        [
                            'name' => 'fttop_icon_shadow',
                            'selector' => '{{WRAPPER}} .ft2-icon i',
                        ]
                    );

                    $this->add_responsive_control(
                        'fttop_icon_margin',
                        [
                            'label' => esc_html__( 'Margin', 'restlycore' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                            'selectors' => [
                                '{{WRAPPER}} .ft2-icon' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ]
                    );

                    $this->add_responsive_control(
                        'fttop_icon_padding',
                        [
                            'label' => esc_html__( 'Padding', 'restlycore' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                            'selectors' => [
                                '{{WRAPPER}} .ft2-icon i' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ]
                    );

                $this->end_controls_tab();
            
                $this->start_controls_tab(
                    'top_footer_label_tab',
                    [
                        'label' => esc_html__( 'Label', 'restlycore' ),
                    ]
                );
            
                $this->add_responsive_control(
                    'topfooter_label_color',
                    [
                        'label' => esc_html__( 'Color', 'restlycore' ),
                        'type' => \Elementor\Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .ft2-content label' => 'color: {{VALUE}}',
                        ],
                    ]
                );

                $this->add_group_control(
                    \Elementor\Group_Control_Typography::get_type(),
                    [
                        'name' => 'topfooter_label_typography',
                        'selector' => '{{WRAPPER}} .ft2-content label',
                    ]
                );

                $this->add_responsive_control(
                    'topfooter_label_margin',
                    [
                        'label' => esc_html__( 'Margin', 'restlycore' ),
                        'type' => \Elementor\Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                        'selectors' => [
                            '{{WRAPPER}} .ft2-content label' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                    ]
                );

                $this->add_responsive_control(
                    'topfooter_label_padding',
                    [
                        'label' => esc_html__( 'Padding', 'restlycore' ),
                        'type' => \Elementor\Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                        'selectors' => [
                            '{{WRAPPER}} .ft2-content label' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                    ]
                );

                $this->end_controls_tab();

                $this->start_controls_tab(
                    'top_footer_dec_tab',
                    [
                        'label' => esc_html__( 'Content', 'restlycore' ),
                    ]
                );
                
                $this->add_group_control(
                    \Elementor\Group_Control_Typography::get_type(),
                    [
                        'name' => 'topfooter_dec_typo',
                        'selector' => '{{WRAPPER}} .ft2-content',
                    ]
                );

                $this->add_responsive_control(
                    'topfooter_dec_color',
                    [
                        'label' => esc_html__( 'Color', 'restlycore' ),
                        'type' => \Elementor\Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .ft2-content' => 'color: {{VALUE}}',
                            '{{WRAPPER}} .ft2-content a' => 'color: {{VALUE}}',
                        ],
                    ]
                );

                $this->add_responsive_control(
                    'topfooter_dec_hcolor',
                    [
                        'label' => esc_html__( 'Hover Color', 'restlycore' ),
                        'type' => \Elementor\Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .ft2-content a:hover' => 'color: {{VALUE}}',
                        ],
                    ]
                );

                $this->add_responsive_control(
                    'topfooter_dec_margin',
                    [
                        'label' => esc_html__( 'Margin', 'restlycore' ),
                        'type' => \Elementor\Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                        'selectors' => [
                            '{{WRAPPER}} .ft2-content' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                    ]
                );

                $this->add_responsive_control(
                    'topfooter_dec_padding',
                    [
                        'label' => esc_html__( 'Padding', 'restlycore' ),
                        'type' => \Elementor\Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                        'selectors' => [
                            '{{WRAPPER}} .ft2-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                    ]
                );

                $this->end_controls_tab();
            
            $this->end_controls_tabs();


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
                // Title css
                $this->start_controls_tab(
                    'company_css_title_tab',
                    [
                        'label' => esc_html__( 'Title', 'restlycore' ),
                        'condition' => [
                            'enable_company_logo!' => 'yes',
                        ],
                    ]
                );
            
                $this->add_group_control(
                    \Elementor\Group_Control_Typography::get_type(),
                    [
                        'name' => 'company_title_typo',
                        'selector' => '{{WRAPPER}} .restly_company_info_widget .widget-title',
                    ]
                );

                $this->add_responsive_control(
                    'company_title_color',
                    [
                        'label' => esc_html__( 'Text Color', 'restlycore' ),
                        'type' => \Elementor\Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .restly_company_info_widget .widget-title' => 'color: {{VALUE}}',
                        ],
                    ]
                );

                $this->add_responsive_control(
                    'company_title_margin',
                    [
                        'label' => esc_html__( 'Margin', 'restlycore' ),
                        'type' => \Elementor\Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                        'selectors' => [
                            '{{WRAPPER}} .restly_company_info_widget .widget-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                    ]
                );

                $this->add_responsive_control(
                    'company_title_padding',
                    [
                        'label' => esc_html__( 'Padding', 'restlycore' ),
                        'type' => \Elementor\Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                        'selectors' => [
                            '{{WRAPPER}} .restly_company_info_widget .widget-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                    ]
                );

                $this->end_controls_tab();
            
                // logo css
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
                        'label' => esc_html__( 'Info', 'restlycore' ),
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
                        'label' => esc_html__( 'Contetn Options', 'restlycore' ),
                        'type' => \Elementor\Controls_Manager::HEADING,
                        'separator' => 'before',
                    ]
                );

                $this->add_responsive_control(
                    'company_info_dec_color',
                    [
                        'label' => esc_html__( 'Color', 'restlycore' ),
                        'type' => \Elementor\Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .company-info-widget ul li' => 'color: {{VALUE}}',
                        ],
                    ]
                );

                $this->add_group_control(
                    \Elementor\Group_Control_Typography::get_type(),
                    [
                        'name' => 'company_info_dec_typo',
                        'selector' => '{{WRAPPER}} .company-info-widget ul li',
                    ]
                );


                $this->add_responsive_control(
                    'company_info_dec_margin',
                    [
                        'label' => esc_html__( 'Margin', 'restlycore' ),
                        'type' => \Elementor\Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                        'selectors' => [
                            '{{WRAPPER}} .company-info-widget ul li' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                    ]
                );

                $this->add_responsive_control(
                    'company_info_dec_padding',
                    [
                        'label' => esc_html__( 'Padding', 'restlycore' ),
                        'type' => \Elementor\Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                        'selectors' => [
                            '{{WRAPPER}} .company-info-widget ul li' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                    ]
                );

                $this->end_controls_tab();
            
            $this->end_controls_tabs();

        $this->end_controls_section();

        // Page List Section 
        $this->start_controls_section(
            'page_link_css_options',
            [
                'label' => esc_html__( 'Page Link Section', 'restlycore' ),
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
                    '{{WRAPPER}} .footer-page-link-section' => 'text-align: {{VALUE}};',
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
                    '{{WRAPPER}} .footer-page-link-section' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .footer-page-link-section' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

            $this->start_controls_tabs(
                'page_link_css_tabs'
            );
            
                $this->start_controls_tab(
                    'page_link_css_title',
                    [
                        'label' => esc_html__( 'Title', 'restlycore' ),
                    ]
                );
                
                    $this->add_group_control(
                        \Elementor\Group_Control_Typography::get_type(),
                        [
                            'name' => 'page_link_title_typo',
                            'selector' => '{{WRAPPER}} .footer-page-link-section .widget-title',
                        ]
                    );
                    $this->add_responsive_control(
                        'page_link_title_color',
                        [
                            'label' => esc_html__( 'Color', 'restlycore' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .footer-page-link-section .widget-title' => 'color: {{VALUE}}',
                            ],
                        ]
                    );
                    $this->add_responsive_control(
                        'page_link_title_margin',
                        [
                            'label' => esc_html__( 'Margin', 'restlycore' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                            'selectors' => [
                                '{{WRAPPER}} .footer-page-link-section .widget-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ]
                    );

                    $this->add_responsive_control(
                        'page_link_title_padding',
                        [
                            'label' => esc_html__( 'Padding', 'restlycore' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                            'selectors' => [
                                '{{WRAPPER}} .footer-page-link-section .widget-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ]
                    );

                $this->end_controls_tab();
            
                $this->start_controls_tab(
                    'Page_Link_css_item',
                    [
                        'label' => esc_html__( 'List', 'restlycore' ),
                    ]
                );
            
                $this->add_group_control(
                    \Elementor\Group_Control_Typography::get_type(),
                    [
                        'name' => 'page_link_item_typo',
                        'selector' => '{{WRAPPER}} .menu-page-link-container ul li a',
                    ]
                );
                $this->add_responsive_control(
                    'page_link_item_color',
                    [
                        'label' => esc_html__( 'Color', 'restlycore' ),
                        'type' => \Elementor\Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .menu-page-link-container ul li a' => 'color: {{VALUE}}',
                        ],
                    ]
                );

                $this->add_responsive_control(
                    'page_link_item_hcolor',
                    [
                        'label' => esc_html__( 'Hover Color', 'restlycore' ),
                        'type' => \Elementor\Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .menu-page-link-container ul li a:hover' => 'color: {{VALUE}}',
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
                            '{{WRAPPER}} .menu-page-link-container ul li' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                            '{{WRAPPER}} .menu-page-link-container ul li' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                'label' => esc_html__( 'Contact Info Section', 'restlycore' ),
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
                    'contact_info_css_title',
                    [
                        'label' => esc_html__( 'Title', 'restlycore' ),
                    ]
                );
                
                    $this->add_group_control(
                        \Elementor\Group_Control_Typography::get_type(),
                        [
                            'name' => 'contact_info_title_typo',
                            'selector' => '{{WRAPPER}} .contact-widget .widget-title',
                        ]
                    );
                    $this->add_responsive_control(
                        'contact_info_title_color',
                        [
                            'label' => esc_html__( 'Color', 'restlycore' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .contact-widget .widget-title' => 'color: {{VALUE}}',
                            ],
                        ]
                    );
                    $this->add_responsive_control(
                        'contact_info_title_margin',
                        [
                            'label' => esc_html__( 'Margin', 'restlycore' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                            'selectors' => [
                                '{{WRAPPER}} .contact-widget .widget-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ]
                    );

                    $this->add_responsive_control(
                        'contact_info_title_padding',
                        [
                            'label' => esc_html__( 'Padding', 'restlycore' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                            'selectors' => [
                                '{{WRAPPER}} .contact-widget .widget-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ]
                    );

                $this->end_controls_tab();
            
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
                            '{{WRAPPER}} .contact-widget .company-contact-widget ul li i' => 'color: {{VALUE}}',
                        ],
                    ]
                );

                $this->add_responsive_control(
                    'contact_info_icon_bg',
                    [
                        'label' => esc_html__( 'Background Color', 'restlycore' ),
                        'type' => \Elementor\Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .contact-widget .company-contact-widget ul li i' => 'background-color: {{VALUE}}',
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
                            '{{WRAPPER}} .contact-widget .company-contact-widget ul li i' => 'width: {{SIZE}}{{UNIT}};',
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
                            '{{WRAPPER}} .contact-widget .company-contact-widget ul li i' => 'height: {{SIZE}}{{UNIT}};',
                        ],
                    ]
                );

                $this->add_group_control(
                    \Elementor\Group_Control_Typography::get_type(),
                    [
                        'name' => 'contact_info_icon_typo',
                        'selector' => '{{WRAPPER}} .contact-widget .company-contact-widget ul li i',
                    ]
                );

                $this->add_responsive_control(
                    'contact_info_icon_radius',
                    [
                        'label' => esc_html__( 'Border Radius', 'restlycore' ),
                        'type' => \Elementor\Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                        'selectors' => [
                            '{{WRAPPER}} .contact-widget .company-contact-widget ul li i' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                            '{{WRAPPER}} .contact-widget .company-contact-widget ul li i' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                            '{{WRAPPER}} .contact-widget .company-contact-widget ul li i' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                    ]
                );

                $this->add_control(
                    'contact_info_list_note',
                    [
                        'label' => esc_html__( 'Contetn Options', 'restlycore' ),
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
                            '{{WRAPPER}} .contact-widget .company-contact-widget ul li' => 'color: {{VALUE}}',
                        ],
                    ]
                );

                $this->add_group_control(
                    \Elementor\Group_Control_Typography::get_type(),
                    [
                        'name' => 'contact_info_dec_typo',
                        'selector' => '{{WRAPPER}} .contact-widget .company-contact-widget ul li',
                    ]
                );


                $this->add_responsive_control(
                    'contact_info_dec_margin',
                    [
                        'label' => esc_html__( 'Margin', 'restlycore' ),
                        'type' => \Elementor\Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                        'selectors' => [
                            '{{WRAPPER}} .contact-widget .company-contact-widget ul li' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                            '{{WRAPPER}} .contact-widget .company-contact-widget ul li' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .subscribe-widget' => 'text-align: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'newsletter_box_bg',
                'types' => [ 'classic', 'gradient', 'video' ],
                'selector' => '{{WRAPPER}} .widget_restly_newsletter_widget .subscribe-widget',
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'newsletter_box_border',
                'selector' => '{{WRAPPER}} .widget_restly_newsletter_widget .subscribe-widget',
            ]
        );

        $this->add_responsive_control(
            'newsletter_box_radius',
            [
                'label' => esc_html__( 'Border Radius', 'restlycore' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                'selectors' => [
                    '{{WRAPPER}} .widget_restly_newsletter_widget .subscribe-widget' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'newsletter_box_shadow',
                'selector' => '{{WRAPPER}} .widget_restly_newsletter_widget .subscribe-widget',
            ]
        );

        $this->add_responsive_control(
            'newsletter_box_margin',
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
            'newsletter_box_padding',
            [
                'label' => esc_html__( 'Padding', 'restlycore' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                'selectors' => [
                    '{{WRAPPER}} .widget_restly_newsletter_widget .subscribe-widget' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->start_controls_tabs(
            'newsletter_css_tabs'
        );
        
            $this->start_controls_tab(
                'newsletter_css_title',
                [
                    'label' => esc_html__( 'Title', 'restlycore' ),
                ]
            );
        
                $this->add_group_control(
                    \Elementor\Group_Control_Typography::get_type(),
                    [
                        'name' => 'newsletter_title_typo',
                        'selector' => '{{WRAPPER}} .subscribe-widget .widget-title',
                    ]
                );
                $this->add_responsive_control(
                    'newsletter_title_color',
                    [
                        'label' => esc_html__( 'Color', 'restlycore' ),
                        'type' => \Elementor\Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .subscribe-widget .widget-title' => 'color: {{VALUE}}',
                        ],
                    ]
                );
                $this->add_responsive_control(
                    'newsletter_title_margin',
                    [
                        'label' => esc_html__( 'Margin', 'restlycore' ),
                        'type' => \Elementor\Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                        'selectors' => [
                            '{{WRAPPER}} .subscribe-widget .widget-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                    ]
                );

                $this->add_responsive_control(
                    'newsletter_title_padding',
                    [
                        'label' => esc_html__( 'Padding', 'restlycore' ),
                        'type' => \Elementor\Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                        'selectors' => [
                            '{{WRAPPER}} .subscribe-widget .widget-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                    ]
                );

            $this->end_controls_tab();
        
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
                        'selector' => '{{WRAPPER}} .company-subscribe-widget p',
                    ]
                );
                $this->add_responsive_control(
                    'newsletter_dec_color',
                    [
                        'label' => esc_html__( 'Color', 'restlycore' ),
                        'type' => \Elementor\Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .company-subscribe-widget p' => 'color: {{VALUE}}',
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
                            '{{WRAPPER}} .company-subscribe-widget p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                            '{{WRAPPER}} .company-subscribe-widget p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    'selector' => '{{WRAPPER}} .subscribe-form .mc4wp-form-fields input[type=email]',
                ]
            );

            $this->add_responsive_control(
                'newsletter_input_color',
                [
                    'label' => esc_html__( 'Text Color', 'restlycore' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .subscribe-form .mc4wp-form-fields input[type=email]' => 'color: {{VALUE}}',
                        '{{WRAPPER}} .subscribe-form .mc4wp-form-fields input::placeholder' => 'color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Background::get_type(),
                [
                    'name' => 'newsletter_input_bg',
                    'types' => [ 'classic', 'gradient'],
                    'selector' => '{{WRAPPER}} .subscribe-form .mc4wp-form-fields input[type=email]',
                ]
            );

            $this->add_responsive_control(
                'newsletter_input_height',
                [
                    'label' => esc_html__( 'Height', 'restlycore' ),
                    'type' => \Elementor\Controls_Manager::SLIDER,
                    'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
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
                        '{{WRAPPER}} .subscribe-form .mc4wp-form-fields input[type=email]' => 'height: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Border::get_type(),
                [
                    'name' => 'newsletter_input_border',
                    'selector' => '{{WRAPPER}} .subscribe-form .mc4wp-form-fields input[type=email]',
                ]
            );

            $this->add_responsive_control(
                'newsletter_input_radius',
                [
                    'label' => esc_html__( 'Border Radius', 'restlycore' ),
                    'type' => \Elementor\Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                    'selectors' => [
                        '{{WRAPPER}} .subscribe-form .mc4wp-form-fields input[type=email]' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_responsive_control(
                'newsletter_input_shadow',
                [
                    'label' => esc_html__( 'Shadow', 'restlycore' ),
                    'type' => \Elementor\Controls_Manager::BOX_SHADOW,
                    'selectors' => [
                        '{{SELECTOR}}' => 'box-shadow: {{HORIZONTAL}}px {{VERTICAL}}px {{BLUR}}px {{SPREAD}}px {{COLOR}};',
                    ],
                ]
            );

            $this->add_responsive_control(
                'newsletter_input_margin',
                [
                    'label' => esc_html__( 'Margin', 'restlycore' ),
                    'type' => \Elementor\Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                    'selectors' => [
                        '{{WRAPPER}} .subscribe-form .mc4wp-form-fields input[type=email]' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                        '{{WRAPPER}} .subscribe-form .mc4wp-form-fields input[type=email]' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
        
            $this->add_responsive_control(
                'newsletter_icon_width',
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
                        '{{WRAPPER}} .subscribe-form .mc4wp-form-fields button' => 'width: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_responsive_control(
                'newsletter_icon_height',
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
                        '{{WRAPPER}} .subscribe-form .mc4wp-form-fields button' => 'height: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_responsive_control(
                'newsletter_icon_color',
                [
                    'label' => esc_html__( 'Icon Color', 'restlycore' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .subscribe-form .mc4wp-form-fields button' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_responsive_control(
                'newsletter_icon_hcolor',
                [
                    'label' => esc_html__( 'Icon hover Color', 'restlycore' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .subscribe-form .mc4wp-form-fields button:hover' => 'color: {{VALUE}}',
                    ],
                ]
            );
            
            $this->add_responsive_control(
                'newsletter_icon_bg',
                [
                    'label' => esc_html__( 'Background Color', 'restlycore' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .subscribe-form .mc4wp-form-fields button' => 'background-color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_responsive_control(
                'newsletter_icon_hbg',
                [
                    'label' => esc_html__( 'Hover Background Color', 'restlycore' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .subscribe-form .mc4wp-form-fields button' => 'background-color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Border::get_type(),
                [
                    'name' => 'newsletter_icon_border',
                    'selector' => '{{WRAPPER}} .subscribe-form .mc4wp-form-fields button',
                ]
            );

            $this->add_responsive_control(
                'newsletter_icon_radius',
                [
                    'label' => esc_html__( 'Border Radius', 'restlycore' ),
                    'type' => \Elementor\Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                    'selectors' => [
                        '{{WRAPPER}} .subscribe-form .mc4wp-form-fields button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_responsive_control(
                'newsletter_icon_shadow',
                [
                    'label' => esc_html__( 'Shadow', 'restlycore' ),
                    'type' => \Elementor\Controls_Manager::BOX_SHADOW,
                    'selectors' => [
                        '{{SELECTOR}} .subscribe-form .mc4wp-form-fields button' => 'box-shadow: {{HORIZONTAL}}px {{VERTICAL}}px {{BLUR}}px {{SPREAD}}px {{COLOR}};',
                    ],
                ]
            );

            $this->add_responsive_control(
                'newsletter_icon_margin',
                [
                    'label' => esc_html__( 'Margin', 'restlycore' ),
                    'type' => \Elementor\Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                    'selectors' => [
                        '{{WRAPPER}} .subscribe-form .mc4wp-form-fields button' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                        '{{WRAPPER}} .subscribe-form .mc4wp-form-fields button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

            $this->end_controls_tab();
        
        $this->end_controls_tabs();

        $this->end_controls_section();

        // Copyright CSS Section 
        $this->start_controls_section(
            'copyright_css_section',
            [
                'label' => esc_html__( 'CopyRight Section', 'restlycore' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'copyright_bg',
                'types' => [ 'classic', 'gradient', 'video' ],
                'selector' => '{{WRAPPER}} .copyright-area',
            ]
        );

        $this->add_responsive_control(
            'copyright_margin',
            [
                'label' => esc_html__( 'Margin', 'restlycore' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                'selectors' => [
                    '{{WRAPPER}} .copyright-area' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'copyright_padding',
            [
                'label' => esc_html__( 'Padding', 'restlycore' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                'selectors' => [
                    '{{WRAPPER}} .copyright-area' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'copyright_border',
                'selector' => '{{WRAPPER}} .copyright-area',
            ]
        );

            $this->start_controls_tabs(
                'copyright_css_tabs'
            );
            
                $this->start_controls_tab(
                    'copyright_social_css_tab',
                    [
                        'label' => esc_html__( 'Social Icon', 'restlycore' ),
                    ]
                );
            
                    $this->add_responsive_control(
                        'social_alignment',
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
                                '{{WRAPPER}} .footer-template-builder .copyright-area .social-icons' => 'text-align: {{VALUE}};',
                            ],
                        ]
                    );
            
                    $this->add_responsive_control(
                        'copyright_social_color',
                        [
                            'label' => esc_html__( 'Color', 'restlycore' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .copyright-area .social-icons ul li a' => 'color: {{VALUE}}',
                            ],
                        ]
                    );

                    $this->add_responsive_control(
                        'copyright_social_hcolor',
                        [
                            'label' => esc_html__( 'Hover Color', 'restlycore' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .copyright-area .social-icons ul li a:hover' => 'color: {{VALUE}}',
                            ],
                        ]
                    );

                    $this->add_group_control(
                        \Elementor\Group_Control_Typography::get_type(),
                        [
                            'name' => 'copyright_social_typo',
                            'selector' => '{{WRAPPER}} .copyright-area .social-icons ul li a',
                        ]
                    );

                    $this->add_responsive_control(
                        'copyright_social_margin',
                        [
                            'label' => esc_html__( 'Margin', 'restlycore' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                            'selectors' => [
                                '{{WRAPPER}} .copyright-area .social-icons ul li' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ]
                    );

                    $this->add_responsive_control(
                        'copyright_social_padding',
                        [
                            'label' => esc_html__( 'Padding', 'restlycore' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                            'selectors' => [
                                '{{WRAPPER}} .copyright-area .social-icons ul li' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ]
                    );

                $this->end_controls_tab();
            
                $this->start_controls_tab(
                    'copyright_text_css_tab',
                    [
                        'label' => esc_html__( 'Copyright', 'restlycore' ),
                    ]
                );
            
                    $this->add_responsive_control(
                        'copy_alignment',
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
                            'default' => 'right',
                            'toggle' => true,
                            'selectors' => [
                                '{{WRAPPER}} .footer-template-builder .copyright-area .site-info' => 'text-align: {{VALUE}};',
                            ],
                        ]
                    );
                    
                    $this->add_responsive_control(
                        'copyright_text_color',
                        [
                            'label' => esc_html__( 'Color', 'restlycore' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .copyright-area .site-info' => 'color: {{VALUE}}',
                                '{{WRAPPER}} .copyright-area .site-info a' => 'color: {{VALUE}}',
                            ],
                        ]
                    );

                    $this->add_responsive_control(
                        'copyright_text_hcolor',
                        [
                            'label' => esc_html__( 'Hover Color', 'restlycore' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .copyright-area .site-info a:hover' => 'color: {{VALUE}}',
                            ],
                        ]
                    );

                    $this->add_group_control(
                        \Elementor\Group_Control_Typography::get_type(),
                        [
                            'name' => 'copyright_text_typo',
                            'selector' => '{{WRAPPER}} .copyright-area .site-info',
                        ]
                    );

                    $this->add_responsive_control(
                        'copyright_text_margin',
                        [
                            'label' => esc_html__( 'Margin', 'restlycore' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                            'selectors' => [
                                '{{WRAPPER}} .copyright-area .site-info' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ]
                    );

                    $this->add_responsive_control(
                        'copyright_text_padding',
                        [
                            'label' => esc_html__( 'Padding', 'restlycore' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                            'selectors' => [
                                '{{WRAPPER}} .copyright-area .site-info' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
        $column2 = $settings['footer_top_desktop_col'] . ' ' . $settings['footer_top_laptop_col'] . ' ' . $settings['footer_top_tab_col'];
        $allowed_html = array(
            'span' => array( 'style' => array(), ),
            'a' => array( 
                'href' => array(), 
                'class' => array(), 
                'title' => array(), 
            ),
        );
        ?>
        <footer id="colophon" class="site-footer footer-two footer-template-two footer-template-builder">

            <div class="footer-widgets-area">

                <?php if( $settings['enable_top_footer'] == 'yes' ) : ?>
                    <div class="footer-top-area">
                        <div class="container">
                            <div class="row">
                                <?php foreach( $settings['FooterTop'] as $item ) : ?>
                                    <div class="col-12 col-sm-6 <?php echo esc_attr( $column2 ); ?> d-flex ft-top-item elementor-repeater-item-<?php echo esc_attr( $item['_id'] ); ?>">
                                        <div class="d-flex align-items-center">
                                            <?php if( $item['footer_top_icon'] ) : ?>
                                                <div class="ft2-icon">
                                                    <?php \Elementor\Icons_Manager::render_icon( $item['footer_top_icon'], [ 'aria-hidden' => 'true' ] ); ?>
                                                </div>
                                            <?php endif; ?>

                                            <div class="ft2-content">
                                                <?php if( $item['footer_top_label'] ){
                                                    echo '<label>'. esc_html( $item['footer_top_label'] ) .'</label>';
                                                } ?>
                                                <?php if( $item['footer_top_content'] ){
                                                    echo wp_kses( $item['footer_top_content'], $allowed_html );
                                                }?>
                                            </div>

                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>

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
                    <div class="container">
                        <div class="row">
                            <?php if( $settings['enable_company_info'] == 'yes' ) : ?>
                            <div class="col-xs-12 col-sm-12 <?php echo esc_attr( $column ); ?>">
                                <div class="restly_company_info_widget">

                                    <?php if( $settings['enable_company_logo'] == 'yes' ) : ?>
                                        <?php echo wp_get_attachment_image( $settings['company_logo']['id'], 'full' ); ?>
                                    <?php else : ?>
                                        <h4 class="widget-title"><?php echo esc_html( $settings['company_title'] ); ?></h4>
                                    <?php endif; ?> 

                                    <div class="company-info-widget">

                                        <?php if( $settings['description'] ) {
                                            echo '<p>' . $settings['description'] . '</p>';
                                        }?>

                                        <?php if( $settings['info'] ) : ?>
                                            <div class="company-contact-widget">
                                                <ul>
                                                    <?php foreach( $settings['info'] as $item ) : ?>
                                                        <li><?php \Elementor\Icons_Manager::render_icon( $item['icon'], [ 'aria-hidden' => 'true' ] ); ?><?php echo esc_html( $item['content'] ); ?></li>
                                                    <?php endforeach; ?>
                                                </ul>
                                            </div>
                                        <?php endif; ?>

                                    </div>
                                </div>
                            </div>
                            <?php endif; ?>

                            <?php if( $settings['page_enable'] == 'yes' ) : ?>
                                <div class="col-xs-12 col-sm-12 <?php echo esc_attr( $column ); ?> restly-footer-justify">
                                    <div class="widget footer-widtet footer-page-link-section">
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
                                        <div class="company-contact-widget">
                                            <ul>
                                                <?php foreach( $settings['contacts'] as $item ) : ?>
                                                <li><?php \Elementor\Icons_Manager::render_icon( $item['contact_info_icon'], [ 'aria-hidden' => 'true' ] ); ?> <?php echo wp_kses_post( $item['contact_info_dec'] ); ?></li>
                                                <?php endforeach; ?>
                                            </ul>
                                        </div>
                                    </div>					
                                </div>
                                
                            <?php endif; ?>


                            <?php if( $settings['enable_subscribe'] == 'yes' ) : ?>

                                <div class="col-xs-12 col-sm-12 <?php echo esc_attr( $column ); ?>">
                                    <div class="widget footer-widtet widget_restly_newsletter_widget">
                                        <div class="subscribe-widget">
                                            <?php if( $settings['newsletter_title'] ){
                                                echo '<h4 class="widget-title">' . esc_html( $settings['newsletter_title'] ) . '</h4>';
                                            } ?>
                                            <div class="company-subscribe-widget">
                                                <?php if( $settings['newsletter_dec'] ){
                                                    echo '<p>' . esc_html( $settings['newsletter_dec'] ) . '</p>';
                                                }?>

                                                <?php if( $settings['newsletter_code'] ) : ?>
                                                <div class="subscribe-form">
                                                    <?php echo do_shortcode( $settings['newsletter_code'] ); ?>
                                                </div>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>					
                                </div>

                            <?php endif; ?>
                        </div>
                    </div>
                <?php endif; ?>

                <?php if( $settings['enable_copyright'] === 'yes' ) : 
                    if( $settings['enable_social'] == 'yes' ){
                        $social_class = 'col-lg-6 col-md-6';
                    }else{
                        $social_class = 'col-lg-12 col-md-12';
                    }
                    
                    if( !empty( $settings['copyright_content'] ) ){
                        $copy_class = 'col-lg-6 col-md-6';
                    }else{
                        $copy_class = 'col-lg-12 col-md-12';
                    }
                ?>
                    <div class="copyright-area">
                        <div class="container">
                            <div class="row">
                                
                                <?php if( $settings['enable_social'] == 'yes' ) : ?>
                                    <div class="col-sm-12 col-12 <?php echo esc_attr( $copy_class ); ?>">
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
                                <?php endif; ?>
                                
                                <?php if( !empty( $settings['copyright_content'] ) ) : ?>
                                    <div class="col-sm-12 col-12 <?php echo esc_attr( $social_class ); ?>">
                                        <div class="site-info "><?php echo wp_kses_post( $settings['copyright_content'] ); ?></div>
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
Plugin::instance()->widgets_manager->register( new restly_footer_template_two );