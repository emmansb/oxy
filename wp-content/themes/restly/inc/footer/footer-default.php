<?php 
$restly_copyright_text = restly_options('restly_copyright_text');

?>
<footer id="colophon" class="site-footer footer-one footer-default">
    <div class="footer-widgets-area">
        <div class="footer-widget-section">
            <div class="restly-footer-widgets">
                <div class="container">
                    <div class="row restly-ftw-box">
                        <?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-3">
                                <?php dynamic_sidebar( 'footer-1' ); ?>
                            </div><!-- .widget-area -->
                        <?php endif; ?>
                        <?php if ( is_active_sidebar( 'footer-2' ) ) : ?>
                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-3">
                                <?php dynamic_sidebar( 'footer-2' ); ?>
                            </div><!-- .widget-area -->
                        <?php endif; ?>	
                        <?php if ( is_active_sidebar( 'footer-3' ) ) : ?>
                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-3">
                                <?php dynamic_sidebar( 'footer-3' ); ?>
                            </div><!-- .widget-area -->
                        <?php endif; ?>
                        <?php if ( is_active_sidebar( 'footer-3' ) ) : ?>
                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-3">
                                <?php dynamic_sidebar( 'footer-4' ); ?>
                            </div><!-- .widget-area -->
                        <?php endif; ?>							
                    </div>
                </div>    
            </div>
        </div>
    </div>
    <div class="copyright-area">
        <div class="container">
            <div class="site-info text-center">
                <?php echo wp_kses($restly_copyright_text,'restly_allowed_html'); ?>
            </div><!-- .site-info -->
        </div>
    </div>
    <div class="to-top" id="back-top" style=""><i class="fas fa-angle-up"></i> </div>
</footer>