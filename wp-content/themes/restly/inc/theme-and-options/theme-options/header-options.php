<?php
if ( !defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

// Header Setings
CSF::createSection( $restlyThemeOption, array(
    'id'    => 'restly_header_settings',
    'title' => esc_html__( 'Header Settings', 'restly' ),
    'icon'  => 'fa fa-header',
    'fields' => array(

        array(
            'id'         => 'header_type',
            'type'       => 'button_set',
            'title'      =>  esc_html__( 'Select header', 'restly' ),
            'subtitle'   => esc_html__( 'Choose Your Default Or Elementor Header', 'restly' ),
            'options'    => array(
              'headers_default'  => esc_html__( 'Header Default', 'restly' ),
              'headers_elementor' => esc_html__( 'Header Elementor', 'restly' ),
            ),
            'default'    => 'headers_default',
        ),


        // Elementor Header Options 
        array(
			'id'            => 'site_elementor_header',
			'type'          => 'select',
			'title'         => esc_html__( 'Select Header', 'restly' ),
            'subtitle'         => esc_html__( 'Select Elementor Template Header', 'restly' ),
			'empty_message' => esc_html__( 'No Header Template Found. You can create header template from Restly Headers > Add New.', 'restly' ),
			'placeholder'   => esc_html__( 'Select Header', 'restly' ),
            'options'       => 'posts',
			'query_args'    => array(
				'post_type'      => 'restly_header',
				'posts_per_page' => - 1,
			),
			'desc'     => esc_html__( 'Select Your Elementor Site header', 'restly' ),
            'dependency' => array(
                array( 'header_type', '==', 'headers_elementor', 'all'),
            ),
        ),
		array(
			'type'       => 'notice',
			'id'         => 'site_elementor_notice',
			'style'      => 'warning',
			'content' => sprintf(
				'%s <a href="%s" target="_blank">%s</a> %s',
				esc_html__('Custom header selected. You can edit/create Header Template in the', 'restly'),
				admin_url('edit.php?post_type=restly_header'),
				esc_html__('Restly Headers', 'restly'),
				esc_html__('Dashboard tab.', 'restly')
			),
			'dependency' => array(
                array( 'header_type', '==', 'headers_elementor', 'all'),
            ),
		),
    ),
) );

