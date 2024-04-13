<div class="tp-menu-wrapper">
	<div class="tp-menu-area text-center">
		<button class="tp-menu-toggle"><i class="fas fa-times"></i></button>
		<div class="mobile-logo">
			<?php
				if(has_custom_logo()){
					the_custom_logo();
				}else{
					?>
					<h2>
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
							<?php esc_html(bloginfo( 'name' )); ?>
						</a>
					</h2>
					<?php 
				}
			?>
		</div>
		<div class="tp-mobile-menu">
				<?php
					wp_nav_menu(
						array(
							'container'      => false,
							'theme_location' => 'mainmenu',
							'menu_id'        => 'mainmenu',
							'menu_class'     => '',
							'echo'           => true,
							'fallback_cb'    => 'restly_Nav_Walker::fallback',
							'walker'         => new restly_Nav_Walker
						)
					);
				?>
		</div>
	</div>
</div>
<header id="masthead" class="site-header header-one default">
	<div class="main-header">
		<div class="container">
			<nav class="navbar navbar-expand-lg navbar-light main-navigation" id="site-navigation">
				<div class="logo-area">
					<div class="site-branding">
						<?php
						if(has_custom_logo()){
							the_custom_logo();
						}else{
							?>
                                <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                            <?php 
						}
						?>
					</div><!-- .site-branding -->
				</div>
				<div class="navbar-collapse nav-menu main-menu">
					<?php
					wp_nav_menu(
						array(
							'container' => false,
							'theme_location' 	=> 'mainmenu',
							'menu_id'        	=> 'mainmenu',
							'menu_class'		=>'navbar-nav me-auto ms-sm-0 ms-md-0 ms-lg-0 ms-xl-5 mb-lg-0',
							'echo'              => true,
                            'fallback_cb'       => 'restly_Nav_Walker::fallback',
                            'walker'            => new restly_Nav_Walker
						)
					);
					?>
				</div>
			</nav>
		</div>
	</div>
</header><!-- #masthead -->