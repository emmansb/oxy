<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Restly
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php 
	if(is_page() || is_singular('post') || is_singular('restly_portfolio') || is_singular('restly_team') || is_singular('restly_job') && get_post_meta($post->ID, 'restly_metabox', true)) {
        $restlyMeta = get_post_meta($post->ID, 'restly_metabox', true);
    } else {
        $restlyMeta = array();
    }
    $restly_enable_preloader = restly_options('restly_enable_preloader', true);
    $restly_header_styles = restly_options('restly_header_styles');
    
    $header_type = restly_options('header_type', 'headers_default');


    if( $header_type === 'headers_elementor' || is_array( $restlyMeta ) && array_key_exists( 'meta_header_type', $restlyMeta ) && $restlyMeta['meta_header_type'] === 'meta_header_elementor' ){
        
        if ( is_array( $restlyMeta ) && array_key_exists( 'header_style_meta', $restlyMeta ) && $restlyMeta['header_style_meta'] != '' ) {
            $header_query = new WP_Query( [
                'post_type'      => 'restly_header',
                'posts_per_page' => -1,
                'p'              => $restlyMeta['header_style_meta'],
            ] );
    
        } elseif( !empty( restly_options('site_elementor_header') ) ){
            $header_query = new WP_Query( [
                'post_type'      => 'restly_header',
                'posts_per_page' => -1,
                'p'              => restly_options('site_elementor_header'),
            ] );
        }else{
            $header_query = '';
        }
        $header_class = ' ';
    }else{

        if (is_array($restlyMeta) && array_key_exists('restly_meta_select_header', $restlyMeta) && $restlyMeta['restly_meta_select_header'] != 'default' && $restlyMeta['restly_meta_enable_header'] == true ) {
            $selectedHeader = $restlyMeta['restly_meta_select_header'];
        } else if (!empty($restly_header_styles) && class_exists( 'CSF' )) {
            $selectedHeader = restly_options('restly_header_styles');
        } else {
            $selectedHeader = 'default';
        }
        $header_class = $selectedHeader;
    }

	wp_head(); 
    
    ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site demo-<?php echo esc_attr( $header_class); ?>">
    <?php if($restly_enable_preloader == true ) { ?>
    <div class="preloader-area">
        <div class="theme-loader"></div>
    </div>
    <?php } ?>
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'restly' ); ?></a>

	<?php
        if( $header_type === 'headers_elementor' || is_array( $restlyMeta ) && array_key_exists( 'meta_header_type', $restlyMeta ) && $restlyMeta['meta_header_type'] === 'meta_header_elementor' ){
            if(!empty( $header_query ) && $header_query->have_posts() ){
                while ( $header_query->have_posts() ) : $header_query->the_post();
                    the_content();
                endwhile;
                wp_reset_postdata();
            }else{
                get_template_part( 'inc/header/header-default' );
            }
        }else{
            get_template_part( 'inc/header/header-default' );
        } 
    ?>