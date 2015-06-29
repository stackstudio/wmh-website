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
</head>

<body <?php body_class(); ?>>
<?php
$logo = 'logo.png';
?>
<div class="hfeed site">
	<?php// $q = new WP_Query('post_type=case-studies');

//echo "var json=". json_encode($q->get_posts()); ?>
	<!--[if lt IE 9]>
	    <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->

	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', '_mbbasetheme' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
		<div class="site-branding col-1-9">
			<h1 class="site-title">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/logo.svg" alt="<?php bloginfo( 'name' ); ?> logo">
				</a>
			</h1>
		</div>

		<nav id="site-navigation" class="col-3-4 main-navigation" role="navigation">
			<button class="menu-toggle"><?php _e( 'Primary Menu', '_mbbasetheme' ); ?></button>
			<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
		</nav><!-- #site-navigation -->
		<div id="socials">
			<ul>
				<li class="vimeo">
					<a href="#">
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/vimeo.svg" alt="<?php bloginfo( 'name' ); ?> logo">
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
	</header><!-- #masthead -->
