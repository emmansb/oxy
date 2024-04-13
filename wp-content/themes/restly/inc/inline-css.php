<?php
if (class_exists('CSF')) {
    function restly_inline_style() {
        wp_enqueue_style('restly-inline', get_template_directory_uri() . '/assets/css/inline-style.css', array(), '1.0.8', 'all');
 
		$restly_inline = 'body{overflow-x: hidden}';

        $restly_css_editor = restly_options('restly_css_editor');
        $restly_ct_colar = restly_options('restly_ct_colar');
        if (!empty($restly_css_editor)) {
            $restly_inline .= '' . esc_attr($restly_css_editor) . '';
        }
        $restly_ct_colar = restly_options('restly_ct_colar');
        $restly_primary_color = restly_options('restly_primary_color');
        $restly_secondary_color = restly_options('restly_secondary_color');
        if ($restly_ct_colar == true && !empty($restly_primary_color) ) {
            $restly_inline .= '
            .theme-btns,ul.slick-dots li.slick-active button,.navbar ul li a[title]:after,.header-search-popup-content form button,.post-tag-social .share-this-post ul li a,a.post-video,.woocommerce-pagination ul li span.page-numbers.current,nav.navigation.pagination ul li a:hover,nav.navigation.pagination ul li span.current,
            .page-links span.current,.page-links a:hover,.pagination-area ul li a:hover,.pagination-area ul li a.current,nav.navigation.comments-pagination ul li span.page-numbers.current,.comments-area a.page-numbers:hover, .sidebar-widget-area h2.widget-title:after,.sidebar-widget-area h2.widget-title:before,.widget.widget_tag_cloud a:hover,.sidebar-widget-area .widget.widget_archive li:hover .post-count-number,.comment-form input[type="submit"],.post-single.format-quote .post-contents,button.slick-prev.slick-arrow,button.slick-next.slick-arrow,.footer-widgets-area,.sidebar-widget-area .wp-calendar-table tbody td#today,.subscribe-widget,.restly-widget-banner-wrapper:after,.restly-post-pagination nav.navigation.post-navigation .nav-links .nav-previous a:hover,.restly-post-pagination nav.navigation.post-navigation .nav-links .nav-next a:hover,.sidebar-widget-area .widget_rss li cite:before,.author-social-info ul li a,.post-password-form input[type="submit"],button.wp-block-search__button:hover  {background-color:'. esc_attr($restly_primary_color) .'}
            a:hover,.post-tag span.tagcloud a:hover,.post-meta-box ul li i,.share-this-post ul li a:hover i,.post-meta-box ul li a:hover,a.post-video:hover,.widget.widget_rss .rss-date,.widget.widget_rss cite,.sidebar-widget-area ul li a:hover,.sidebar-widget-area .widget.widget_nav_menu a:hover,.sidebar-widget-area .widget.widget_recent_entries li a:hover,.sidebar-widget-area .widget.widget_rss li a:hover,.widget form.search-form .search-button button[type="submit"],.sidebar-widget-area .widget_recent_comments span.comment-author-link a, .comment-reply a:hover,.comment-meta .comment-date,.cform-input.name:after,.cform-input.email:after, .cform-input.website:after,.cform-input.message:before,.page-content .search-form .search-button button:hover,.widget.widget_archive ul li a:before,.widget.widget_categories ul li a:before,.widget.widget_pages ul li a:before,.widget.widget_nav_menu ul li a:before,.sidebar-widget-area .wp-calendar-table tr td a,footer .wp-calendar-table tr td a,.footer-two table td a,.footer-three table td a,restly-widget-post-thum-content>h6>a .recent-post-title:hover,.sidebar-widget-area ul li a:hover,.sticky h2.entry-title a,table td a,.wp-block-archives a:hover,.wp-block-categories a:hover{color:'. esc_attr($restly_primary_color) .'}
            .widget form.search-form input:focus,.widget form.search-form input:focus-visible,blockquote,.comment-form input:focus,.comment-form textarea:focus,.page-content .search-form input.search-field,.mc4wp-form-fields input[type=email],.widget.widget_recent_comments li,.sticky .post-contents {border-color:'. esc_attr($restly_primary_color) .'}
            .navbar ul li a[title]:before{border-left-color:'. esc_attr($restly_primary_color) .'}
            ';
        }
        if ($restly_ct_colar == true && !empty($restly_secondary_color) ) {
            $restly_inline .= '
            .theme-btns:hover,.post-tag-social .share-this-post ul li a:hover,.comment-form input[type="submit"]:hover,button.slick-prev.slick-arrow:hover, button.slick-next.slick-arrow:hover,.mc4wp-form-fields button:hover,.restly-social-widgets ul li a,.restly-widget-banner-wrapper .restly-banner-btn a:hover{background-color:'. esc_attr($restly_secondary_color) .'}
            h1,h2,h3,h4,h5,h6,a,strong,dt, th,.comment-meta .fn,.comment-reply-link,.no-comments,.post-tag label,.post-tag-social .post-share label,.post-tag span.tagcloud a,.post-meta-box ul li a,
            .post-meta-box label,.share-this-post ul li a i,h2.entry-title,.post-details h2.entry-title,.woocommerce-pagination ul li a,nav.navigation.pagination ul li a,nav.navigation.pagination ul li span,.page-links span,
            .page-links a,.pagination-area ul li a, nav.navigation.comments-pagination ul li a,nav.navigation.comments-pagination ul li span.page-numbers.current,
            .woocommerce-pagination ul li span.page-numbers.current,.sidebar-widget-area ul li a, .widget.widget_tag_cloud a,.widget select,.widget select:focus,.sidebar-widget-area .widget.widget_archive li,.sidebar-widget-area .widget.widget_categories li,.sidebar-widget-area .widget.widget_pages li,.sidebar-widget-area .widget.widget_meta li,
            .sidebar-widget-area .widget.widget_recent_entries li a,
            .sidebar-widget-area .widget.widget_rss li a,
            .sidebar-widget-area .widget.widget_text strong,
            .sidebar-widget-area .widget.widget_nav_menu a,.widget ul li>span.number,.post-content blockquote p,blockquote cite,.post-single.format-quote .post-contents h2.entry-title a:hover,.restly-widget-post-thum-content>h6>a.recent-post-title,.sidebar-widget-area ul li a,.blocks-gallery-caption,.wp-block-embed figcaption,.wp-block-image figcaption,figcaption,footer span.wp-calendar-nav-prev a:hover,footer span .wp-calendar-nav-next a:hover,.wp-calendar-table tr td a:hover,.wp-block-archives a,.wp-block-categories a,.sidebar-widget-area h2.widget-title{color:'. esc_attr($restly_secondary_color) .'}
            ';
        }
        wp_add_inline_style('restly-inline', $restly_inline);
    }
}
add_action('wp_enqueue_scripts', 'restly_inline_style');