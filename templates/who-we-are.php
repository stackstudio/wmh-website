<?php
/**
 * Template Name: Who We Are Page
 *
 * Displays content for portfolio page layouts
 *
 * @package _mbbasetheme
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', 'who' ); ?>

			<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
