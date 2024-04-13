<?php
//Single Post
CSF::createSection( $restlyThemeOption, array(
    'parent' => 'restly_page_options',
    'title'  => esc_html__( 'Page Layout', 'restly' ),
    'icon'   => 'fa fa-pencil',
    'fields' => array(
        array(
            'id'      => 'restly_page_layouts',
            'type'    => 'select',
            'title'   => esc_html__( 'Page Layout', 'restly' ),
            'subtitle'   => esc_html__( ' Select Your Page Layout here', 'restly' ),
            'options' => array(
                'full-witdth'   => esc_html__( 'Full Width', 'restly' ),
                'left-sidebar'  => esc_html__( 'Left Sidebar', 'restly' ),
                'right-sidebar' => esc_html__( 'Right Sidebar', 'restly' ),
            ),
            'default' => 'full-witdth',
            'desc'    => esc_html__( 'Select page layout.', 'restly' ),
        ),
        array(
            'id'      => 'restly_page_sidebars',
            'type'    => 'select',
            'title'   => esc_html__( ' Page Widgets', 'restly' ),
            'subtitle'   => esc_html__( ' Select Your Page Widget here', 'restly' ),
            'options' => 'sidebars',
            'default' => 'sidebar',
            'desc'    => esc_html__( 'Select Your Sidebar widget', 'restly' ),
            'dependency' => array( 'restly_page_layouts', '!=', 'full-witdth', 'all' ),
        ),

        array(
            'id'       => 'restly_page_banner_enable',
            'type'     => 'switcher',
            'title'    => esc_html__( 'Enable Banner', 'restly' ),
            'subtitle'    => esc_html__( 'Select Option for Page Banner', 'restly' ),
            'default'  => true,
            'text_on'  => esc_html__( 'Yes', 'restly' ),
            'text_off' => esc_html__( 'No', 'restly' ),
            'desc'     => esc_html__( 'Enable or disable page banner.', 'restly' ),
        ),
    ),
) );