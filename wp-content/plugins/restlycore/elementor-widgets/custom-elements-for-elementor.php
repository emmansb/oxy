<?php
if (!defined('ABSPATH')) exit; // No access of directly access
class restlyElementorWidget {
    private static $instance = null;
    public static function get_instance() {
        if (!self::$instance) {
            self::$instance = new self;
        }
        return self::$instance;
    }
    
    public function init() {
        add_action('elementor/widgets/register', array($this, 'restly_elementor_widgets'));
        require_once( __DIR__ . '/control/custom-control.php' );
    }
    
    public function restly_elementor_widgets() {
        // Check if the Elementor plugin has been installed / activated.
        if (defined('ELEMENTOR_PATH') && class_exists('Elementor\Widget_Base')) {
            require_once('slider.php');
            require_once('title.php');
            require_once('home-banner.php');
            require_once('home-banner-two.php');
            require_once('service-box.php');
            require_once('service-two.php');
            require_once('service-slider.php');
            require_once('image.php');
            require_once('about-us.php');
            require_once('counter.php');
            require_once('counter-new.php');
            require_once('theme-button.php');
            require_once('work-process.php');
            require_once('pricing-table.php');
            require_once('pricing-table-two.php');
            require_once('pricing-v2.php');
            require_once('pricing-tab-v2.php');
            require_once('pricing-v3.php');
            require_once('portfolio-info.php');
            require_once('contact-info.php');
            require_once('home-portfolio.php');
            require_once('home-blog.php');
            require_once('home-blog-two.php');
            require_once('home-blog-v3.php');
            require_once('home-blog-v4.php');
            require_once('home-blog-v5.php');
            require_once('feature-icon-with-title.php');
            
            require_once('clients-logo.php');
            require_once('team-title.php');
            require_once('team-member.php');
            require_once('mailchip-subscribe.php');
            require_once('our-testimonial.php');
            require_once('testimonial-two.php');
            require_once('testimonial-three.php');
            require_once('testimonial-v4.php');
            require_once('testimonial-v5.php');
            require_once('testimonial-v6.php');
            require_once('portfolio-category.php');
            require_once('contact-info-box.php');
            require_once('dot-shape.php');
            require_once('shape.php');
            require_once('social-icons.php');
            require_once('line.php');
            require_once('tab.php');
            require_once('nav-menu.php');
            require_once('search.php');
            require_once('company-info.php');
            require_once('contact-list.php');
            require_once('subscribe-two.php');
            require_once('recent-post.php');
            require_once('copyright.php');
            require_once('menu-list.php');
            require_once('contact-form7.php');
            require_once('video-button.php');
            require_once('image-deta.php');
            require_once('faq-addon.php');
            if ( class_exists( 'WooCommerce' ) ) {
                require_once('nft-seller.php');
                require_once('nft-Collection.php');
                require_once('nft-products.php');
                require_once('nft-products-menu.php');
            }
            require_once('nft-work-progress.php');
            require_once('jobs-info.php');
            require_once('job-post.php');
            require_once('image-with-shape.php');
            require_once('image-with-shape-v2.php');
            require_once('service-three.php');
            require_once('home-banner-three.php');
            require_once('title-two.php');
            require_once('message.php');
            require_once('feature-icon.php');
            require_once('mobilescreen.php');
            require_once('pricing-v4.php');
            require_once('newsletter-section.php');
            require_once('testimonial-v7.php');
            require_once('counter-v3.php');
            require_once('tab-v2.php');
            require_once('service-four.php');
            require_once('counter-v4.php');
            require_once('portfolio-v2.php');
            require_once('team-v2.php');
            require_once('home-blog-v6.php');
            require_once('reviews.php');
            require_once('list.php');
            require_once('clients-logo-v2.php');
            require_once('cta-button.php');
            require_once('image-v2.php');
            require_once('feature-icon-two.php');
            require_once('service-five.php');
            require_once('ad-slider.php');
            require_once('faq.php');
            require_once('pricing-v5.php');
            require_once('icon-box.php');
            require_once('feature-image.php');
            require_once('testimonial-v8.php');
            require_once('image-v3.php');
            require_once('pricing-v6.php');
            require_once('icon-box-v2.php');
            
            // Header Template 
            require_once('hf-builder/header-template/header-template-one.php');
            require_once('hf-builder/header-template/header-template-two.php');
            require_once('hf-builder/header-template/header-template-three.php');
            require_once('hf-builder/header-template/header-template-four.php');
            require_once('hf-builder/header-template/header-template-five.php');
            require_once('hf-builder/header-template/header-template-six.php');
            require_once('hf-builder/header-template/header-template-seven.php');
            require_once('hf-builder/header-template/header-template-eight.php');
            require_once('hf-builder/header-template/header-template-nine.php');
            require_once('hf-builder/header-template/header-template-ten.php');
            require_once('hf-builder/header-template/header-template-eleven.php');
            require_once('hf-builder/header-template/header-template-twelve.php');
            require_once('hf-builder/header-template/header-template-thirteen.php');
            require_once('hf-builder/header-template/header-template-fourteen.php');

            // Footer Templates
            require_once('hf-builder/footer-template/footer-template-one.php');
            require_once('hf-builder/footer-template/footer-template-two.php');
            require_once('hf-builder/footer-template/footer-template-three.php');
            require_once('hf-builder/footer-template/footer-template-four.php');
            require_once('hf-builder/footer-template/footer-template-five.php');
            require_once('hf-builder/footer-template/footer-template-six.php');
            require_once('hf-builder/footer-template/footer-template-seven.php');

        }
    }
}
restlyElementorWidget::get_instance()->init();

function restly_elementor_widget_categories($elements_manager) {
    $elements_manager->add_category(
        'restly',
        [
            'title' => __('Restly Elements', 'restlycore'),
        ],
    );
    $elements_manager->add_category(
        'restlynft',
        [
            'title' => __('Restly NFT', 'restlycore'),
        ],
    );
    $elements_manager->add_category(
        'restlyhf',
        [
            'title' => __('Restly Header Footer', 'restlycore'),
        ],
    );
}
add_action('elementor/elements/categories_registered', 'restly_elementor_widget_categories');


