<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

function restly_register_header_footer_custom_post() {

	// Register Footer Builder Post Type
	register_post_type('restly_header',
		array(
			'labels'       => array(
				'name'                  => esc_html__('Restly Headers', 'restlycore'),
				'singular_name'         => esc_html__('Header', 'restlycore'),
				'add_new_item'          => esc_html__('Add New Header', 'restlycore'),
				'all_items'             => esc_html__('All Headers', 'restlycore'),
				'add_new'               => esc_html__('Add New', 'restlycore'),
				'edit_item'             => esc_html__('Edit Header', 'restlycore'),
			),
			'rewrite'      => array(
				'slug'       => 'header',
				'with_front' => true,
			),
			'hierarchical' => true,
			'public' => true,
			'show_ui' => true,
			'exclude_from_search' => true,
			'publicly_queryable' => true,
			'query_var'          => true,
			'has_archive'        => true,
			'menu_icon'    => 'dashicons-editor-kitchensink',
			'show_in_rest'    => false,
			'supports'     => array('title','thumbnail'),
		)
	);

	// Register Footer Builder Post Type
	register_post_type('restly_footer',
		array(
			'labels'       => array(
				'name'                  => esc_html__('Restly Footers', 'restlycore'),
				'singular_name'         => esc_html__('Footer', 'restlycore'),
				'add_new_item'          => esc_html__('Add New Footer', 'restlycore'),
				'all_items'             => esc_html__('All Footers', 'restlycore'),
				'add_new'               => esc_html__('Add New', 'restlycore'),
				'edit_item'             => esc_html__('Edit Footer', 'restlycore'),
			),
			'rewrite'      => array(
				'slug'       => 'footer',
				'with_front' => true,
			),
			'hierarchical' => true,
			'public' => true,
			'show_ui' => true,
			'exclude_from_search' => true,
			'publicly_queryable' => true,
			'query_var'          => true,
			'has_archive'        => true,
			'menu_icon'    => 'dashicons-editor-kitchensink',
			'show_in_rest'    => false,
			'supports'     => array('title','thumbnail'),
		)
	);

	
}

add_action( 'init', 'restly_register_header_footer_custom_post' );


/**
 *  Footer Canvas
 */
function restly_header_footer_builder_canvas() {
	global $post;

	// Check if its a correct post type/types to apply template
	if ( !in_array( $post->post_type, ['restly_footer','restly_header'] ) || !did_action( 'elementor/loaded' ) ) {
		return;
	}
	// Check that a template is not set already
	if ( '' !== $post->page_template ) {
		return;
	}
	// Make sure its not a page for posts
	if ( get_option( 'page_for_posts' ) === $post->ID ) {
		return;
	}

	//Finally set the page template
	$post->page_template = 'elementor_canvas';
	update_post_meta( $post->ID, '_wp_page_template', 'elementor_canvas' );
}

add_action( 'add_meta_boxes', 'restly_header_footer_builder_canvas', 10 );


add_action( 'elementor/init', function() {
    // Register the 'restly_header' custom post type
    register_post_type( 'restly_header', array(
        'labels' => array(
            'name' => __( 'Restly Headers', 'elementor' ),
            'singular_name' => __( 'Restly Header', 'elementor' ),
        ),
        'public' => true,
        'has_archive' => true,
        'supports' => array( 'title' ),
    ) );
    // Add Elementor support to the 'restly_header' custom post type
    add_post_type_support( 'restly_header', 'elementor' );

    // Register the 'restly_footer' custom post type
    register_post_type( 'restly_footer', array(
        'labels' => array(
            'name' => __( 'Restly Footers', 'elementor' ),
            'singular_name' => __( 'Restly Footer', 'elementor' ),
        ),
        'public' => true,
        'has_archive' => true,
        'supports' => array( 'title' ),
    ) );
    // Add Elementor support to the 'restly_footer' custom post type
    add_post_type_support( 'restly_footer', 'elementor' );
} );
