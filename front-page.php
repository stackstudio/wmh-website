<?php
/**
 * The template for displaying the front page.
 *
 * This is the template that displays on the front page only.
 *
 * @package _mbbasetheme
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php
			// lets start getting some data in here once the front-end has been created
			?>

			<?php while ( have_posts() ) : the_post(); ?>
			
				<?php get_template_part( 'content', 'front' ); ?>
			
			<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
