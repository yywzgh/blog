<?php
/**
 * The Header of the theme.
 *
 * Displays all of the <head> section and everything up till <main id="main">
 *
 * @package Andorra
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div id="grid-container">
	<div class="clear"></div>
		<?php $andorra_theme_options = andorra_get_options( 'andorra_theme_options' );
		if ($andorra_theme_options['header_top_enable'] == '1') {
			get_template_part( 'top', 'header' );
		} ?>
		<?php if (get_header_image()!='') { ?>
			<div id="header-holder" style="background: url(<?php header_image(); ?>) 0 0 no-repeat; -webkit-background-size: cover; -moz-background-size: cover; -o-background-size: cover; background-size: cover;">
		<?php } else { ?>
			<div id="header-holder">
		<?php } ?>
			<div id ="header-wrap">
      			<nav class="navbar navbar-default">
					<div id="logo">
						<?php if (function_exists( 'has_custom_logo' ) && has_custom_logo()) {
							andorra_the_custom_logo();
						} else { ?>
							<a href="<?php echo esc_url( home_url( '/' ) ) ?>"><?php bloginfo( 'name' ); ?></a>
						<?php }?>
						<?php if ($andorra_theme_options['enable_logo_tagline'] == '1' ) { ?> 
							<h5 class="site-description"><?php bloginfo('description'); ?></h5>
						<?php } ?>
					</div>
        			<div class="navbar-header">
            			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              			<span class="sr-only"><?php esc_html_e('Toggle navigation','andorra');?></span>
              			<span class="icon-bar"></span>
              			<span class="icon-bar"></span>
              			<span class="icon-bar"></span>
            			</button>
          			</div><!--navbar-header-->
          			<div id="navbar" class="navbar-collapse collapse">
					<?php 
					if (has_nav_menu('main_navigation')) {
						
						$andorra_default_menu = array(
    						'theme_location'  => 'main_navigation',
    						'depth'      => 0,
    						'container'  => false,
    						'menu_class' => 'nav navbar-nav',
                			'fallback_cb'       => 'wp_page_menu',
    						'walker'     => new wp_bootstrap_navwalker(),
						);
					
					} else {
						
						$andorra_default_menu = array(
    						'theme_location'  => 'main_navigation',
    						'depth'      => 0,
    						'container'  => false,
    						'menu_class' => 'nav-bar',
                			'fallback_cb'       => 'wp_page_menu',
						);
						
					} 
					
					wp_nav_menu( $andorra_default_menu );
					
					?>
					
          			</div><!--/.nav-collapse -->
      			</nav>
			</div><!--header-wrap-->
		</div><!--header-holder-->