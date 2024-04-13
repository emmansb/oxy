<?php
if ( !defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}
// Create layout and options section
CSF::createSection( $restlyThemeOption, array(
    'title' => esc_html__( 'Footer Settings', 'restly' ),
    'id'    => 'restly_footer_options',
    'icon'  => 'fa fa-sort-amount-asc',
    'fields' => array(
        array(
            'id'         => 'footer_type',
            'type'       => 'button_set',
            'title'      =>  esc_html__( 'Select Footer', 'restly' ),
            'options'    => array(
              'footers_default'  => esc_html__( 'Footer Default', 'restly' ),
              'footers_elementor' => esc_html__( 'Footer Elementor', 'restly' ),
            ),
            'default'    => 'footers_default',
        ),

        // Elementor Header Options 
        array(
			'id'            => 'site_elementor_footer',
			'type'          => 'select',
			'title'         => esc_html__( 'Select Footer', 'restly' ),
            'subtitle'         => esc_html__( 'Select Elementor Template Footer', 'restly' ),
			'empty_message' => esc_html__( 'No Footer Template Found. You can create Footer template from Restly Footers > Add New.', 'restly' ),
			'placeholder'   => esc_html__( 'Select Footer', 'restly' ),
            'options'       => 'posts',
			'query_args'    => array(
				'post_type'      => 'restly_footer',
				'posts_per_page' => - 1,
			),
			'desc'     => esc_html__( 'Select Your Elementor Site Footer', 'restly' ),
            'dependency' => array(
                array( 'footer_type', '==', 'footers_elementor', 'all'),
            ),
        ),

        array(
			'type'       => 'notice',
			'id'         => 'site_elementor_footer',
			'style'      => 'warning',
			'content' => sprintf(
				'%s <a href="%s" target="_blank">%s</a> %s',
				esc_html__('Custom Footer selected. You can edit/create Footer Template in the', 'restly'),
				admin_url('edit.php?post_type=restly_footer'),
				esc_html__('Restly Footer', 'restly'),
				esc_html__('Dashboard tab.', 'restly')
			),
			'dependency' => array(
                array( 'footer_type', '==', 'footers_elementor', 'all'),
            ),
		),

        array(
            'id'       => 'restly_classic_widget_enable',
            'type'     => 'switcher',
            'title'    => esc_html__('Classic Mode', 'restly'),
            'subtitle'    => esc_html__('if you see any issue on Widget Block editor then enable Classic Mode', 'restly'),
            'default'  => false,
            'text_on'  => esc_html__('Yes', 'restly'),
            'text_off' => esc_html__('No', 'restly'),
            'dependency' => array(
                array( 'footer_type', '==', 'footers_default', 'all'),
            ),
        ),

        array(
            'type'       => 'submessage',
            'style'      => 'info',
            'content'    => esc_html__( 'Widget CSS Options', 'restly' ),
            'dependency' => array( 
                array( 'footer_type', '==', 'footers_default', 'all' ),
            ),
        ),
        array(
            'id'         => 'restly_ft1_title_css',
            'type'       => 'color',
            'title'      => esc_html__( 'Title Color', 'restly' ),
            'subtitle'   => esc_html__( 'Add Color for Widget Title', 'restly' ),
            'output'     => 'h4.widget-title,.subscribe-widget h4.widget-title',
            'dependency' => array( 
                array( 'footer_type', '==', 'footers_default', 'all' ),
            ),
        ),
        array(
            'id'         => 'restly_ft1_dec_css',
            'type'       => 'color',
            'title'      => esc_html__( 'Content Color', 'restly' ),
            'subtitle'   => esc_html__( 'Add Color for Widget Content', 'restly' ),
            'output'     => '.company-info-widget p,.company-contact-widget ul li,.company-subscribe-widget p',
            'dependency' => array( 
                array( 'footer_type', '==', 'footers_default', 'all' ),
            ),
        ),
        array(
            'id'         => 'restly_ft1_link_css',
            'type'       => 'link_color',
            'title'      => esc_html__( 'Link Color', 'restly' ),
            'subtitle'   => esc_html__( 'Add Link Color', 'restly' ),
            'output'     => '.footer-widgets-area .widget ul li a',
            'dependency' => array( 
                array( 'footer_type', '==', 'footers_default', 'all' ),
            ),
        ),
        array(
            'type'       => 'submessage',
            'style'      => 'info',
            'content'    => esc_html__( 'Main Background Options', 'restly' ),
            'dependency' => array( 
                array( 'footer_type', '==', 'footers_default', 'all' ),
            ),
        ),
        array(
            'id'         => 'restly_ft1_bg_css',
            'type'       => 'background',
            'title'      => esc_html__( 'Background', 'restly' ),
            'subtitle'   => esc_html__( 'Add Background color or Image for footer ', 'restly' ),
            'dependency' => array( 
                array( 'footer_type', '==', 'footers_default', 'all' ),
            ),
            'output'     => '.footer-one .footer-widgets-area',
            
        ),
        
        array(
            'type'    => 'submessage',
            'style'   => 'info',
            'content' => esc_html__( 'Copyright', 'restly' ),
            'dependency'  => array( 'footer_type', '==', 'footers_default', 'all' ),
        ),
        array(
            'id'            => 'restly_copyright_text',
            'type'          => 'wp_editor',
            'title'         => esc_html__( 'Copyright Text', 'restly' ),
            'subtitle'      => esc_html__( 'Site copyright text', 'restly' ),
            'desc'          => esc_html__( 'Type site copyright text here.', 'restly' ),
            'tinymce'       => true,
            'quicktags'     => true,
            'media_buttons' => false,
            'height'        => '100px',
            'dependency'  => array( 'footer_type', '==', 'footers_default', 'all' ),
        ),

        array(
            'type'       => 'submessage',
            'style'      => 'info',
            'content'    => esc_html__( 'CopyRight Section CSS', 'restly' ),
            'dependency' => array( 
                array( 'footer_type', '==', 'footers_default', 'all' ),
            ),
        ),
        array(
            'id'         => 'restly_ft1_copyright_text_css',
            'type'       => 'color',
            'title'      => esc_html__( 'Copyright Text Color', 'restly' ),
            'subtitle'   => esc_html__( 'Add Color for Copyright Text', 'restly' ),
            'output'     => '.footer-one .copyright-area p',
            'dependency' => array( 
                array( 'footer_type', '==', 'footers_default', 'all' ),
            ),
        ),
        array(
            'id'         => 'restly_ft1_copyright_link_css',
            'type'       => 'link_color',
            'title'      => esc_html__( 'Link Color', 'restly' ),
            'subtitle'   => esc_html__( 'Add Copyrihgt Link Color', 'restly' ),
            'output'     => '.footer-one .copyright-area .social-icons ul li a',
            'dependency' => array( 
                array( 'footer_type', '==', 'footers_default', 'all' ),
            ),
        ),
        array(
            'id'         => 'restly_ft1_copyright_css',
            'type'       => 'background',
            'title'      => esc_html__( 'Background', 'restly' ),
            'subtitle'   => esc_html__( 'Add CopyRight Background Color', 'restly' ),
            'dependency' => array( 
                array( 'footer_type', '==', 'footers_default', 'all' ),
            ),
            'output'     => '.footer-one .copyright-area',
        ),
    ),
) );

