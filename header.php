<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package _mbbasetheme
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/favicon.ico">
	<link rel="apple-touch-icon" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/apple-touch-icon.png">
	<?php wp_head(); ?>
	<script>
	// some global stuff here
	var mobileMenu = '<?php echo get_stylesheet_directory_uri(); ?>/assets/images/menu-icon.svg';
	var mobileMenuActive = '<?php echo get_stylesheet_directory_uri(); ?>/assets/images/menu-icon-open.svg';
	var play = '<?php echo get_stylesheet_directory_uri(); ?>/assets/images/wmh-play.svg';
	var pause = '<?php echo get_stylesheet_directory_uri(); ?>/assets/images/wmh-stop.svg';
	</script>
</head>

<body <?php body_class(); ?>>
<div class="hfeed site">
	<!--[if lt IE 9]>
	    <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', '_mbbasetheme' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
		<div class="site-branding">
			<h1 class="site-title">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/logo-new.svg" alt="<?php bloginfo( 'name' ); ?> logo">
				</a>
			</h1>
		</div>
<!-- <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/menu-button.svg" alt="mobile nav button" id="mobile-menu-button"> -->
		<!-- img tag for mobile button -->
		<div id="menu-button">
			<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/menu-icon.svg" alt="<?php bloginfo( 'name' ); ?> menu icon">
		</div>
	</header><!-- #masthead -->
	<div class="hidden-menu">
			<nav id="site-navigation" class="main-navigation" role="navigation">
				<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
			</nav>
			<!-- #site-navigation -->
			<!-- img tag for mobile button -->

			<div id="socials">
				<ul>
					<li class="vimeo">
						<a href="#">
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/youtube-icon.svg" alt="<?php bloginfo( 'name' ); ?> logo">
						</a>
					</li>
					<li class="twitter">
						<a href="#">
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/twitter.svg" alt="<?php bloginfo( 'name' ); ?> logo">
						</a>
					</li>
					<li class="facebook">
						<a href="#">
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/facebook.svg" alt="<?php bloginfo( 'name' ); ?> logo">
						</a>
					</li>
				</ul>
			</div>
		</div>
