<?php
/**
 * Template Name: News Page
 *
 * Displays content for portfolio page layouts
 *
 * @package _mbbasetheme
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php
			// The Query
			$args = array(
				'post_type'=> 'post',
				'order'    => 'DESC',
				'posts_per_page' => '10'
			);
			query_posts( $args );
			?>
			<section id="post-list">
			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', 'single-news' ); ?>
				
			<?php endwhile; 
			// end of the loop.
			 _mbbasetheme_post_nav();
			?>
			</section>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
