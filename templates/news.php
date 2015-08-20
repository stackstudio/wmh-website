<?php
/**
 * Template Name: News Page
 *
 * Displays content for portfolio page layouts
 *
 * @package _mbbasetheme
 */

get_header(); ?>
<!-- <div class="post-loader"><div class="load"><div class="loader-inner ball-pulse"></div></div></div> -->
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php
			// The Query
			$paged = get_query_var('paged') ? get_query_var('paged') : 1;
			$args = array(
			   'posts_per_page' => 10,
			   'post_type' => 'post',
			   'paged' => $paged,
			   'order'=> 'DESC',
			   'orderby' => 'date',
			);
			query_posts( $args );
			?>
			<section id="post-list">
			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', 'single-news' ); ?>
				
			<?php endwhile; 
			// end of the loop.
			?>
			<div class="hidden">
			<?php _mbbasetheme_paging_nav(); ?>
			</div>

			<?php
			// Reset Query
			wp_reset_query();
			?>
			</section>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
