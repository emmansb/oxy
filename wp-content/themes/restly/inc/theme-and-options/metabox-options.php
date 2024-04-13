<?php

if ( !defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

//
// Metabox of the PAGE
// Set a unique slug-like ID
//
$restlymetabox = 'restly_metabox';

//
// Create a metabox
//
CSF::createMetabox( $restlymetabox, array(
    'title'        => 'Metabox Options',
    'post_type'    => array( 'page', 'post', 'restly_portfolio', 'restly_team','restly_job' ),
    'show_restore' => true,
) );

//
// Create a section
//
CSF::createSection( $restlymetabox, array(
    'title'  => esc_html__( 'Header', 'restly' ),
    'icon'   => 'fas fa-rocket',
    'fields' => array(


        array(
            'id'         => 'meta_header_type',
            'type'       => 'button_set',
            'title'      =>  esc_html__( 'Select header', 'restly' ),
            'subtitle'   => esc_html__( 'Choose Your Default Or Elementor Header', 'restly' ),
            'options'    => array(
              'meta_header_default'  => esc_html__( 'Header Default', 'restly' ),
              'meta_header_elementor' => esc_html__( 'Header Elementor', 'restly' ),
            ),
            'default'    => 'meta_header_default',
        ),


        array(
			'id'      => 'header_style_meta',
			'type'    => 'select',
			'title'         => esc_html__( 'Select Header', 'restly' ),
            'subtitle'         => esc_html__( 'Select Your Header, we are used Theme Default Header', 'restly' ),
			'placeholder'   => esc_html__( 'Select Header', 'restly' ),
			'empty_message' => esc_html__( 'No header template found. You can create header template from Restly Headers > Add New.', 'restly' ),
			'options'       => 'posts',
			'query_args'    => array(
				'post_type'      => 'restly_header',
				'posts_per_page' => -1,
			),
			'desc'    => esc_html__('Select header for this page', 'restly'),
            'dependency'  => array( 'meta_header_type', '==', 'meta_header_elementor' ),
		),
    ),
) );

// Create layout section
CSF::createSection( $restlymetabox, array(
    'title'  => esc_html__( 'Layout Options', 'restly' ),
    'icon'   => 'fas fa-rocket',
    'fields' => array(
        array(
            'id'       => 'restly_meta_page_enable',
            'type'     => 'switcher',
            'title'    => esc_html__( 'Enable Page Meta Options', 'restly' ),
            'subtitle' => esc_html__( 'Enable page Meta Options. if you need', 'restly' ),
            'default'  => false,
            
        ),
        array(
            'id'          => 'restly_layout_meta',
            'type'        => 'select',
            'title'       => esc_html__( 'Layout', 'restly' ),
            'subtitle'       => esc_html__( 'Select page Layout', 'restly' ),
            'default'     => '',
            'options'     => array(
                ''        => esc_html__( 'Default', 'restly' ),
                'full-width'    => esc_html__( 'Full Width', 'restly' ),
                'left-sidebar'  => esc_html__( 'Left Sidebar', 'restly' ),
                'right-sidebar' => esc_html__( 'Right Sidebar', 'restly' ),
            ),
            'desc'        => esc_html__( 'Select layout', 'restly' ),
            'dependency' => array( 'restly_meta_page_enable', '==', true ),
        ),
        array(
            'id'         => 'restly_sidebar_meta',
            'type'       => 'select',
            'title'      => esc_html__( 'Sidebar', 'restly' ),
            'options'    => 'restly_sidebars',
            'default'  => '',
            'dependency' => array(
                array( 'restly_layout_meta', 'any', 'left-sidebar,right-sidebar' ),
                array( 'restly_meta_page_enable', '==', true ),
            ),
            'desc'       => esc_html__( 'Select sidebar you want to show with this page.', 'restly' ),
        ),
        array(
            'id'       => 'restly_meta_page_navbar',
            'type'     => 'switcher',
            'title'    => esc_html__( 'Enable Pagination', 'restly' ),
            'subtitle' => esc_html__( 'This Options only for Default page', 'restly' ),
            'default'  => false,
            'dependency' => array( 'restly_meta_page_enable', '==', true ),
        ),
        array(
            'id'          => 'restly_meta_page_spacing',
            'type'        => 'spacing',
            'title'       => esc_html__( 'Padding', 'restly' ),
            'subtitle'    => esc_html__( 'Add Page Padding If you need', 'restly' ),
            'output'      => '.site-main.content-area',
            'output_mode' => 'padding',
            'dependency' => array( 'restly_meta_page_enable', '==', true ),
        ),
    ),
) );

// Create a section
CSF::createSection( $restlymetabox, array(
    'title'  => esc_html__( 'Banner / Breadcrumb Area', 'restly' ),
    'icon'   => 'fas fa-rocket',
    'fields' => array(
        array(
            'id'       => 'restly_meta_enable_banner',
            'type'     => 'switcher',
            'title'    => esc_html__( 'Enable Banner', 'restly' ),
            'text_on'  => esc_html__( 'Yes', 'restly' ),
            'text_off' => esc_html__( 'No', 'restly' ),
            'default'  => true,
            'desc'     => esc_html__( 'Enable or disable banner.', 'restly' ),
        ),
        array(
            'id'                    => 'restly_meta_banner_options',
            'type'                  => 'background',
            'title'                 => esc_html__( 'Banner Background', 'restly' ),
            'background_gradient'   => true,
            'background_origin'     => false,
            'background_clip'       => false,
            'background_blend-mode' => false,
            'default'               => array(
                'background-color'              => '',
                'background-gradient-color'     => '',
                'background-gradient-direction' => 'to right',
                'background-size'               => 'cover',
                'background-position'           => 'center center',
                'background-repeat'             => 'no-repeat',
            ),
            'dependency'            => array( 'restly_meta_enable_banner', '==', true ),
            'output'                => '.breadcroumb-area',
            'desc'                  => esc_html__( 'If you use gradient background color (Second Color) then background image will not working. Gradient background priority is higher then background image', 'restly' ),
        ),
        array(
            'id'         => 'restly_meta_banner_title_color',
            'type'       => 'color',
            'title'      => esc_html__( 'Banner Title Color', 'restly' ),
            'output'     => '.breadcroumn-contnt .brea-title',
            'dependency' => array( 'restly_meta_enable_banner', '==', true ),
            'desc'       => esc_html__( 'Select banner title color.', 'restly' ),
        ),

        array(
            'id'         => 'restly_meta_breadcrumb_normal_color',
            'type'       => 'color',
            'title'      => esc_html__( 'Breadcrumb Text Color', 'restly' ),
            'output'     => '.bre-sub span',
            'subtitle'   => esc_html__( 'Breadcrumb Text Color', 'restly' ),
            'dependency' => array( 'restly_meta_enable_banner', '==', true ),
            'desc'       => esc_html__( 'Select breadcrumb text color.', 'restly' ),
        ),

        array(
            'id'         => 'restly_meta_breadcrumb_link_color',
            'type'       => 'link_color',
            'title'      => esc_html__( 'Breadcrumb Link Color', 'restly' ),
            'output'     => array( '.bre-sub span a' ),
            'subtitle'   => esc_html__( 'Breadcrumb Link color', 'restly' ),
            'dependency' => array( 'restly_meta_enable_banner', '==', true ),
            'desc'       => esc_html__( 'Select breadcrumb link and link hover color.', 'restly' ),
        ),

    ),
) );
CSF::createSection( $restlymetabox, array(
    'title'  => esc_html__( 'Footer Settings', 'restly' ),
    'icon'   => 'fas fa-rocket',
    'fields' => array(

        array(
            'id'         => 'meta_footer_type',
            'type'       => 'button_set',
            'title'      =>  esc_html__( 'Select Footer', 'restly' ),
            'subtitle'   => esc_html__( 'Choose Your Default Or Elementor Footer', 'restly' ),
            'options'    => array(
              'meta_footer_default'  => esc_html__( 'Footer Default', 'restly' ),
              'meta_footer_elementor' => esc_html__( 'Footer Elementor', 'restly' ),
            ),
            'default'    => 'meta_footer_default',
        ),

        array(
			'id'      => 'footer_style_meta',
			'type'    => 'select',
			'title'         => esc_html__( 'Select Footer', 'restly' ),
            'subtitle'         => esc_html__( 'Select Your Footer, we are used Theme Default Footer', 'restly' ),
			'placeholder'   => esc_html__( 'Select Footer', 'restly' ),
			'empty_message' => esc_html__( 'No Footer Template Found. You can create footer template from Restly Footers > Add New.', 'restly' ),
			'options'       => 'posts',
			'query_args'    => array(
				'post_type'      => 'restly_footer',
				'posts_per_page' => -1,
			),
			'desc'    => esc_html__( 'Select footer for this page', 'restly' ),
            'dependency'  => array( 'meta_footer_type', '==', 'meta_footer_elementor' ),
		),
    ),
) );
