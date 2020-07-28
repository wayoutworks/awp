<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Agility_WP
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'awp' ); ?></a>
	<header id="masthead" class="site-header">
		<nav class="navbar navbar-expand-lg navbar-light" role="navigation">
			<div class="container">
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-controls="bs-example-navbar-collapse-1" aria-expanded="false" aria-label="<?php esc_attr_e( 'Toggle navigation', 'awp' ); ?>">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="site-logo">
					<?php if ( has_custom_logo() ) : ?>
						<?php 
						$awp_custom_logo_id   = get_theme_mod( 'custom_logo' );
						$awp_custom_logo_data = wp_get_attachment_image_src( $awp_custom_logo_id, 'full' );
						$awp_custom_logo_url  = $awp_custom_logo_data[0];
						?>
						<a href="<?php echo esc_url( home_url( '/', 'https' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" rel="home">
							<img src="<?php echo esc_url( $awp_custom_logo_url ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>"/>
						</a>
					<?php else : ?>
						<a class="navbar-brand" title="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" href="<?php echo esc_url( home_url() ); ?>"><?php bloginfo( 'name' ); ?></a>
					<?php endif; ?>
				</div>
					<?php
						wp_nav_menu(
							array(
								'theme_location'    => 'primary',
								'depth'             => 2,
								'container'         => 'div',
								'container_class'   => 'collapse navbar-collapse',
								'container_id'      => 'bs-example-navbar-collapse-1',
								'menu_class'        => 'navbar-nav ml-auto mb-2 mb-lg-0',
								'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
								'walker'            => new WP_Bootstrap_Navwalker(),
							) 
						);
						?>
			</div>
		</nav>

		<div class="header-image" style="background-image: url(<?php header_image(); ?>);">
			<div class="site-branding w-50 mx-auto">
				<h1 class="site-title"><?php bloginfo( 'name' ); ?></h1>
				<p class="site-description"><?php bloginfo( 'description' ); ?></p>
			</div>
		</div>
	</header><!-- #masthead -->
