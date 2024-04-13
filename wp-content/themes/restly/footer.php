<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Restly
 */
if(is_page() || is_singular('post') || is_singular('restly_portfolio') || is_singular('restly_team') && get_post_meta( $post->ID, 'restly_metabox', true)) {
	$restlyMeta = get_post_meta($post->ID, 'restly_metabox', true);
} else {
	$restlyMeta = array();
}

$restly_enable_top_to_bottom = restly_options('restly_enable_top_to_bottom', true);
$restly_enable_ttb_icon = restly_options('restly_enable_ttb_icon','fa fa-angle-up');

$footer_type = restly_options('footer_type');

if( $footer_type === 'footers_elementor' || is_array( $restlyMeta ) && array_key_exists( 'meta_footer_type', $restlyMeta ) && $restlyMeta['meta_footer_type'] === 'meta_footer_elementor' ){

    if ( is_array( $restlyMeta ) && array_key_exists( 'footer_style_meta', $restlyMeta ) && $restlyMeta['footer_style_meta'] != '' ) {
        $footer_query = new WP_Query( [
            'post_type'      => 'restly_footer',
            'posts_per_page' => -1,
            'p'              => $restlyMeta['footer_style_meta'],
        ] );
    
    } elseif(!empty(restly_options('site_elementor_footer'))){
        $footer_query = new WP_Query( [
            'post_type'      => 'restly_footer',
            'posts_per_page' => -1,
            'p'              => restly_options('site_elementor_footer'),
        ] );
    }else{
        $footer_query = '';
    }
} 
?>
<?php 
	if( $footer_type === 'footers_elementor' || is_array( $restlyMeta ) && array_key_exists( 'meta_footer_type', $restlyMeta ) && $restlyMeta['meta_footer_type'] === 'meta_footer_elementor' ){
		if(!empty($footer_query) && $footer_query->have_posts()){
			while ( $footer_query->have_posts() ) : $footer_query->the_post();
					the_content();
				endwhile;
			wp_reset_postdata();
		}
	}else{
		get_template_part('inc/footer/footer','default');
	}
?>

    <?php if($restly_enable_top_to_bottom == true ) : ?>
		<div class="to-top" id="back-top"><i class="<?php echo esc_attr($restly_enable_ttb_icon); ?>"></i></div>
	<?php endif; ?>
	
</div><!-- #page -->
<?php wp_footer(); ?>
</body>
</html>